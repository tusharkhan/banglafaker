#!/usr/bin/env python3
"""
Builds Lib/data/locations.php from two MIT-licensed datasets:

  - nuhil/bangladesh-geocode                        (divisions, districts, upazilas, unions)
    https://github.com/nuhil/bangladesh-geocode
  - TanjidulIslamToha/bangladesh-postal-codes-database  (thanas, post offices, post codes)
    https://github.com/TanjidulIslamToha/bangladesh-postal-codes-database

Usage:
  python3 scripts/build-locations.py <geocode-dir> <postal-csv> [output]

  <geocode-dir>  folder with divisions.csv, districts.csv, upazilas.csv, unions.csv
                 (from the geocode repo's */<name>.csv files)
  <postal-csv>   variations/bn/postcodes-bn.csv from the postal repo
  [output]       defaults to Lib/data/locations.php

Names are cleaned (NFC normalised, stray direction marks removed, whitespace
collapsed) so every name has exactly one encoding. The script refuses to
write the file if the result fails any sanity check.
"""

import csv
import os
import re
import sys
import unicodedata

SOURCES = {
    'geocode': 'nuhil/bangladesh-geocode@5622f68bd07a98e076edcf8100bf0db6a75b9854',
    'postal': 'TanjidulIslamToha/bangladesh-postal-codes-database@a0c000d35def7fefa84a59484c63e556edcfb667',
}

# The two datasets spell one district differently; use the district's own spelling.
# A few postal names are acronyms in Latin letters; write them in Bangla letters.
ALIASES = {
    'মুন্সিগঞ্জ': 'মুন্সীগঞ্জ',
    'B.O.F': 'বি.ও.এফ',
    'B.R.R': 'বি.আর.আর',
    'LN মিলস': 'এলএন মিলস',
    'UMC জুট মিলস': 'ইউএমসি জুট মিলস',
}

# Postal names sometimes end with the office type (sub office, upazila post
# office, ...). That's a classification, not part of the name, so drop it -
# except a railway station office, which keeps its meaning in Bangla.
OFFICE_TYPE = re.compile(r'\s+(T\.?S\.?O|S\.?O|U\.?P\.?O|Upo|H\.?O|E?D\.?E?S\.?O|Acc)\.?$', re.IGNORECASE)
RAILWAY_STATION = re.compile(r'\s+R\.S\.?$')

BANGLA_NAME = re.compile(r'^[ঀ-৿‌‍ ,.()\-]+$')


def clean(name):
    name = unicodedata.normalize('NFC', name)
    name = re.sub(r'[‎‏﻿]', '', name)
    name = re.sub(r'\s+', ' ', name).strip()
    name = OFFICE_TYPE.sub('', name)
    name = RAILWAY_STATION.sub(' রেলস্টেশন', name)
    return ALIASES.get(name, name)


def rows(path):
    with open(path, encoding='utf-8') as f:
        return list(csv.reader(f))


def unique(items):
    return list(dict.fromkeys(items))


def build(geocode_dir, postal_csv):
    divisions = {r[0]: clean(r[2]) for r in rows(os.path.join(geocode_dir, 'divisions.csv'))}
    districts = {r[0]: (clean(r[3]), r[1]) for r in rows(os.path.join(geocode_dir, 'districts.csv'))}
    upazilas = {r[0]: (clean(r[3]), r[1]) for r in rows(os.path.join(geocode_dir, 'upazilas.csv'))}

    data = {'divisions': {name: [] for name in divisions.values()}, 'districts': {}}

    for district, division_id in districts.values():
        data['divisions'][divisions[division_id]].append(district)
        data['districts'][district] = {'division': divisions[division_id], 'upazilas': {}, 'thanas': {}}

    for upazila, district_id in upazilas.values():
        data['districts'][districts[district_id][0]]['upazilas'][upazila] = []

    for r in rows(os.path.join(geocode_dir, 'unions.csv')):
        upazila, district_id = upazilas[r[1]]
        data['districts'][districts[district_id][0]]['upazilas'][upazila].append(clean(r[3]))

    with open(postal_csv, encoding='utf-8') as f:
        for r in csv.DictReader(f):
            district = clean(r['district'])
            if district not in data['districts']:
                sys.exit(f'Postal district not in geocode data: {district}')
            thanas = data['districts'][district]['thanas']
            thanas.setdefault(clean(r['thana']), []).append([clean(r['suboffice']), r['postcode'].strip()])

    for district in data['districts'].values():
        for upazila, unions in district['upazilas'].items():
            district['upazilas'][upazila] = unique(unions)
        for thana, offices in district['thanas'].items():
            district['thanas'][thana] = [list(o) for o in unique(tuple(o) for o in offices)]

    return data


def check(data):
    districts = data['districts']
    counts = {
        'divisions': len(data['divisions']),
        'districts': len(districts),
        'upazilas': sum(len(d['upazilas']) for d in districts.values()),
        'unions': sum(len(u) for d in districts.values() for u in d['upazilas'].values()),
        'thanas': sum(len(d['thanas']) for d in districts.values()),
        'post offices': sum(len(o) for d in districts.values() for o in d['thanas'].values()),
    }

    problems = []
    if counts['divisions'] != 8:
        problems.append('expected 8 divisions')
    if counts['districts'] != 64:
        problems.append('expected 64 districts')

    names = list(data['divisions']) + list(districts)
    for d in districts.values():
        names += list(d['upazilas']) + [u for us in d['upazilas'].values() for u in us] + list(d['thanas'])
        names += [o[0] for os_ in d['thanas'].values() for o in os_]
        if not d['thanas']:
            problems.append(f'district without post codes: {d}')
        for offices in d['thanas'].values():
            problems += [f'bad post code {o[1]}' for o in offices if not re.fullmatch(r'\d{4}', o[1])]

    problems += [f'not a clean Bangla name: {n!r}' for n in names if not BANGLA_NAME.match(n)]

    return counts, problems


def php(value, indent=0):
    pad = '    ' * indent
    if isinstance(value, dict):
        items = ''.join(f"{pad}    {php(k)} => {php(v, indent + 1)},\n" for k, v in value.items())
        return '[\n' + items + pad + ']'
    if isinstance(value, list):
        if all(isinstance(v, str) for v in value):
            return '[' + ', '.join(php(v) for v in value) + ']'
        return '[\n' + ''.join(f'{pad}    {php(v, indent + 1)},\n' for v in value) + pad + ']'
    return "'" + value.replace('\\', '\\\\').replace("'", "\\'") + "'"


def main():
    if len(sys.argv) < 3:
        sys.exit(__doc__)

    output = sys.argv[3] if len(sys.argv) > 3 else os.path.join(os.path.dirname(__file__), '..', 'Lib', 'data', 'locations.php')
    data = build(sys.argv[1], sys.argv[2])
    counts, problems = check(data)

    if problems:
        sys.exit('Refusing to write:\n  ' + '\n  '.join(problems[:20]))

    header = (
        "<?php\n\n"
        "/*\n"
        " * Generated by scripts/build-locations.py - do not edit by hand.\n"
        " *\n"
        f" * Divisions, districts, upazilas, unions: {SOURCES['geocode']}\n"
        " *   Copyright (c) 2014 Nuhil Mehdy, MIT License\n"
        f" * Thanas, post offices, post codes: {SOURCES['postal']}\n"
        " *   Copyright (c) 2025 Tanjidul Islam Toha, MIT License\n"
        " * See Lib/data/LICENSES.md for the full license texts.\n"
        " *\n"
        " * " + ', '.join(f'{v} {k}' for k, v in counts.items()) + "\n"
        " */\n\n"
    )

    with open(output, 'w', encoding='utf-8') as f:
        f.write(header + 'return ' + php(data) + ';\n')

    print('Wrote', os.path.normpath(output))
    for k, v in counts.items():
        print(f'  {k}: {v}')


if __name__ == '__main__':
    main()
