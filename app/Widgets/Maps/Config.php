<?php
/**
 * This file is part of Digital Atlas.
 *
 * Digital Atlas is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Digital Atlas is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */
/**
 * Configuration for the Maps widget. These are the GEO coordinates for each country.
 *
 * @link https://github.com/mledoze/countries
 *
 * @var array
 */
return [
    'map'   =>  [
        /**
         * If you want to find other provides, simply go to the following page:
         * @link https://leaflet-extras.github.io/leaflet-providers/preview/
         *
         * CartoDB offers a free version of English
         */
        'tile_provider'     =>  'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        'tile_copyright'    =>  '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        'zoom'              =>  18,
    ],
    'coords'    =>  [
        'ABW'  =>  [
            'lat'       =>  12.5,
            'long'      =>  -69.96666666,
            'name'      =>  'Aruba',
        ],
        'AFG'  =>  [
            'lat'       =>  33,
            'long'      =>  65,
            'name'      =>  'Islamic Republic of Afghanistan',
        ],
        'AGO'  =>  [
            'lat'       =>  -12.5,
            'long'      =>  18.5,
            'name'      =>  'Republic of Angola',
        ],
        'AIA'  =>  [
            'lat'       =>  18.25,
            'long'      =>  -63.16666666,
            'name'      =>  'Anguilla',
        ],
        'ALA'  =>  [
            'lat'       =>  60.116667,
            'long'      =>  19.9,
            'name'      =>  'Åland Islands',
        ],
        'ALB'  =>  [
            'lat'       =>  41,
            'long'      =>  20,
            'name'      =>  'Republic of Albania',
        ],
        'AND'  =>  [
            'lat'       =>  42.5,
            'long'      =>  1.5,
            'name'      =>  'Principality of Andorra',
        ],
        'ARE'  =>  [
            'lat'       =>  24,
            'long'      =>  54,
            'name'      =>  'United Arab Emirates',
        ],
        'ARG'  =>  [
            'lat'       =>  -34,
            'long'      =>  -64,
            'name'      =>  'Argentine Republic',
        ],
        'ARM'  =>  [
            'lat'       =>  40,
            'long'      =>  45,
            'name'      =>  'Republic of Armenia',
        ],
        'ASM'  =>  [
            'lat'       =>  -14.33333333,
            'long'      =>  -170,
            'name'      =>  'American Samoa',
        ],
        'ATA'  =>  [
            'lat'       =>  -90,
            'long'      =>  0,
            'name'      =>  'Antarctica',
        ],
        'ATF'  =>  [
            'lat'       =>  -49.25,
            'long'      =>  69.167,
            'name'      =>  'Territory of the French Southern and Antarctic Lands',
        ],
        'ATG'  =>  [
            'lat'       =>  17.05,
            'long'      =>  -61.8,
            'name'      =>  'Antigua and Barbuda',
        ],
        'AUS'  =>  [
            'lat'       =>  -27,
            'long'      =>  133,
            'name'      =>  'Commonwealth of Australia',
        ],
        'AUT'  =>  [
            'lat'       =>  47.33333333,
            'long'      =>  13.33333333,
            'name'      =>  'Republic of Austria',
        ],
        'AZE'  =>  [
            'lat'       =>  40.5,
            'long'      =>  47.5,
            'name'      =>  'Republic of Azerbaijan',
        ],
        'BDI'  =>  [
            'lat'       =>  -3.5,
            'long'      =>  30,
            'name'      =>  'Republic of Burundi',
        ],
        'BEL'  =>  [
            'lat'       =>  50.83333333,
            'long'      =>  4,
            'name'      =>  'Kingdom of Belgium',
        ],
        'BEN'  =>  [
            'lat'       =>  9.5,
            'long'      =>  2.25,
            'name'      =>  'Republic of Benin',
        ],
        'BFA'  =>  [
            'lat'       =>  13,
            'long'      =>  -2,
            'name'      =>  'Burkina Faso',
        ],
        'BGD'  =>  [
            'lat'       =>  24,
            'long'      =>  90,
            'name'      =>  'People\'s Republic of Bangladesh',
        ],
        'BGR'  =>  [
            'lat'       =>  43,
            'long'      =>  25,
            'name'      =>  'Republic of Bulgaria',
        ],
        'BHR'  =>  [
            'lat'       =>  26,
            'long'      =>  50.55,
            'name'      =>  'Kingdom of Bahrain',
        ],
        'BHS'  =>  [
            'lat'       =>  24.25,
            'long'      =>  -76,
            'name'      =>  'Commonwealth of the Bahamas',
        ],
        'BIH'  =>  [
            'lat'       =>  44,
            'long'      =>  18,
            'name'      =>  'Bosnia and Herzegovina',
        ],
        'BLM'  =>  [
            'lat'       =>  18.5,
            'long'      =>  -63.41666666,
            'name'      =>  'Collectivity of Saint Barthélemy',
        ],
        'SHN'  =>  [
            'lat'       =>  -15.95,
            'long'      =>  -5.72,
            'name'      =>  'Saint Helena, Ascension and Tristan da Cunha',
        ],
        'BLR'  =>  [
            'lat'       =>  53,
            'long'      =>  28,
            'name'      =>  'Republic of Belarus',
        ],
        'BLZ'  =>  [
            'lat'       =>  17.25,
            'long'      =>  -88.75,
            'name'      =>  'Belize',
        ],
        'BMU'  =>  [
            'lat'       =>  32.33333333,
            'long'      =>  -64.75,
            'name'      =>  'Bermuda',
        ],
        'BOL'  =>  [
            'lat'       =>  -17,
            'long'      =>  -65,
            'name'      =>  'Plurinational State of Bolivia',
        ],
        'BES'  =>  [
            'lat'       =>  12.18,
            'long'      =>  -68.25,
            'name'      =>  'Bonaire, Sint Eustatius and Saba',
        ],
        'BRA'  =>  [
            'lat'       =>  -10,
            'long'      =>  -55,
            'name'      =>  'Federative Republic of Brazil',
        ],
        'BRB'  =>  [
            'lat'       =>  13.16666666,
            'long'      =>  -59.53333333,
            'name'      =>  'Barbados',
        ],
        'BRN'  =>  [
            'lat'       =>  4.5,
            'long'      =>  114.66666666,
            'name'      =>  'Nation of Brunei, Abode of Peace',
        ],
        'BTN'  =>  [
            'lat'       =>  27.5,
            'long'      =>  90.5,
            'name'      =>  'Kingdom of Bhutan',
        ],
        'BVT'  =>  [
            'lat'       =>  -54.43333333,
            'long'      =>  3.4,
            'name'      =>  'Bouvet Island',
        ],
        'BWA'  =>  [
            'lat'       =>  -22,
            'long'      =>  24,
            'name'      =>  'Republic of Botswana',
        ],
        'CAF'  =>  [
            'lat'       =>  7,
            'long'      =>  21,
            'name'      =>  'Central African Republic',
        ],
        'CAN'  =>  [
            'lat'       =>  60,
            'long'      =>  -95,
            'name'      =>  'Canada',
        ],
        'CCK'  =>  [
            'lat'       =>  -12.5,
            'long'      =>  96.83333333,
            'name'      =>  'Territory of the Cocos (Keeling) Islands',
        ],
        'CHE'  =>  [
            'lat'       =>  47,
            'long'      =>  8,
            'name'      =>  'Swiss Confederation',
        ],
        'CHL'  =>  [
            'lat'       =>  -30,
            'long'      =>  -71,
            'name'      =>  'Republic of Chile',
        ],
        'CHN'  =>  [
            'lat'       =>  35,
            'long'      =>  105,
            'name'      =>  'People\'s Republic of China',
        ],
        'CIV'  =>  [
            'lat'       =>  8,
            'long'      =>  -5,
            'name'      =>  'Republic of Côte d\'Ivoire',
        ],
        'CMR'  =>  [
            'lat'       =>  6,
            'long'      =>  12,
            'name'      =>  'Republic of Cameroon',
        ],
        'COD'  =>  [
            'lat'       =>  0,
            'long'      =>  25,
            'name'      =>  'Democratic Republic of the Congo',
        ],
        'COG'  =>  [
            'lat'       =>  -1,
            'long'      =>  15,
            'name'      =>  'Republic of the Congo',
        ],
        'COK'  =>  [
            'lat'       =>  -21.23333333,
            'long'      =>  -159.76666666,
            'name'      =>  'Cook Islands',
        ],
        'COL'  =>  [
            'lat'       =>  4,
            'long'      =>  -72,
            'name'      =>  'Republic of Colombia',
        ],
        'COM'  =>  [
            'lat'       =>  -12.16666666,
            'long'      =>  44.25,
            'name'      =>  'Union of the Comoros',
        ],
        'CPV'  =>  [
            'lat'       =>  16,
            'long'      =>  -24,
            'name'      =>  'Republic of Cabo Verde',
        ],
        'CRI'  =>  [
            'lat'       =>  10,
            'long'      =>  -84,
            'name'      =>  'Republic of Costa Rica',
        ],
        'CUB'  =>  [
            'lat'       =>  21.5,
            'long'      =>  -80,
            'name'      =>  'Republic of Cuba',
        ],
        'CUW'  =>  [
            'lat'       =>  12.116667,
            'long'      =>  -68.933333,
            'name'      =>  'Country of Curaçao',
        ],
        'CXR'  =>  [
            'lat'       =>  -10.5,
            'long'      =>  105.66666666,
            'name'      =>  'Territory of Christmas Island',
        ],
        'CYM'  =>  [
            'lat'       =>  19.5,
            'long'      =>  -80.5,
            'name'      =>  'Cayman Islands',
        ],
        'CYP'  =>  [
            'lat'       =>  35,
            'long'      =>  33,
            'name'      =>  'Republic of Cyprus',
        ],
        'CZE'  =>  [
            'lat'       =>  49.75,
            'long'      =>  15.5,
            'name'      =>  'Czech Republic',
        ],
        'DEU'  =>  [
            'lat'       =>  51,
            'long'      =>  9,
            'name'      =>  'Federal Republic of Germany',
        ],
        'DJI'  =>  [
            'lat'       =>  11.5,
            'long'      =>  43,
            'name'      =>  'Republic of Djibouti',
        ],
        'DMA'  =>  [
            'lat'       =>  15.41666666,
            'long'      =>  -61.33333333,
            'name'      =>  'Commonwealth of Dominica',
        ],
        'DNK'  =>  [
            'lat'       =>  56,
            'long'      =>  10,
            'name'      =>  'Kingdom of Denmark',
        ],
        'DOM'  =>  [
            'lat'       =>  19,
            'long'      =>  -70.66666666,
            'name'      =>  'Dominican Republic',
        ],
        'DZA'  =>  [
            'lat'       =>  28,
            'long'      =>  3,
            'name'      =>  'People\'s Democratic Republic of Algeria',
        ],
        'ECU'  =>  [
            'lat'       =>  -2,
            'long'      =>  -77.5,
            'name'      =>  'Republic of Ecuador',
        ],
        'EGY'  =>  [
            'lat'       =>  27,
            'long'      =>  30,
            'name'      =>  'Arab Republic of Egypt',
        ],
        'ERI'  =>  [
            'lat'       =>  15,
            'long'      =>  39,
            'name'      =>  'State of Eritrea',
        ],
        'ESH'  =>  [
            'lat'       =>  24.5,
            'long'      =>  -13,
            'name'      =>  'Sahrawi Arab Democratic Republic',
        ],
        'ESP'  =>  [
            'lat'       =>  40,
            'long'      =>  -4,
            'name'      =>  'Kingdom of Spain',
        ],
        'EST'  =>  [
            'lat'       =>  59,
            'long'      =>  26,
            'name'      =>  'Republic of Estonia',
        ],
        'ETH'  =>  [
            'lat'       =>  8,
            'long'      =>  38,
            'name'      =>  'Federal Democratic Republic of Ethiopia',
        ],
        'FIN'  =>  [
            'lat'       =>  64,
            'long'      =>  26,
            'name'      =>  'Republic of Finland',
        ],
        'FJI'  =>  [
            'lat'       =>  -18,
            'long'      =>  175,
            'name'      =>  'Republic of Fiji',
        ],
        'FLK'  =>  [
            'lat'       =>  -51.75,
            'long'      =>  -59,
            'name'      =>  'Falkland Islands',
        ],
        'FRA'  =>  [
            'lat'       =>  46,
            'long'      =>  2,
            'name'      =>  'French Republic',
        ],
        'FRO'  =>  [
            'lat'       =>  62,
            'long'      =>  -7,
            'name'      =>  'Faroe Islands',
        ],
        'FSM'  =>  [
            'lat'       =>  6.91666666,
            'long'      =>  158.25,
            'name'      =>  'Federated States of Micronesia',
        ],
        'GAB'  =>  [
            'lat'       =>  -1,
            'long'      =>  11.75,
            'name'      =>  'Gabonese Republic',
        ],
        'GBR'  =>  [
            'lat'       =>  54,
            'long'      =>  -2,
            'name'      =>  'United Kingdom of Great Britain and Northern Ireland',
        ],
        'GEO'  =>  [
            'lat'       =>  42,
            'long'      =>  43.5,
            'name'      =>  'Georgia',
        ],
        'GGY'  =>  [
            'lat'       =>  49.46666666,
            'long'      =>  -2.58333333,
            'name'      =>  'Bailiwick of Guernsey',
        ],
        'GHA'  =>  [
            'lat'       =>  8,
            'long'      =>  -2,
            'name'      =>  'Republic of Ghana',
        ],
        'GIB'  =>  [
            'lat'       =>  36.13333333,
            'long'      =>  -5.35,
            'name'      =>  'Gibraltar',
        ],
        'GIN'  =>  [
            'lat'       =>  11,
            'long'      =>  -10,
            'name'      =>  'Republic of Guinea',
        ],
        'GLP'  =>  [
            'lat'       =>  16.25,
            'long'      =>  -61.583333,
            'name'      =>  'Guadeloupe',
        ],
        'GMB'  =>  [
            'lat'       =>  13.46666666,
            'long'      =>  -16.56666666,
            'name'      =>  'Republic of the Gambia',
        ],
        'GNB'  =>  [
            'lat'       =>  12,
            'long'      =>  -15,
            'name'      =>  'Republic of Guinea-Bissau',
        ],
        'GNQ'  =>  [
            'lat'       =>  2,
            'long'      =>  10,
            'name'      =>  'Republic of Equatorial Guinea',
        ],
        'GRC'  =>  [
            'lat'       =>  39,
            'long'      =>  22,
            'name'      =>  'Hellenic Republic',
        ],
        'GRD'  =>  [
            'lat'       =>  12.11666666,
            'long'      =>  -61.66666666,
            'name'      =>  'Grenada',
        ],
        'GRL'  =>  [
            'lat'       =>  72,
            'long'      =>  -40,
            'name'      =>  'Greenland',
        ],
        'GTM'  =>  [
            'lat'       =>  15.5,
            'long'      =>  -90.25,
            'name'      =>  'Republic of Guatemala',
        ],
        'GUF'  =>  [
            'lat'       =>  4,
            'long'      =>  -53,
            'name'      =>  'Guiana',
        ],
        'GUM'  =>  [
            'lat'       =>  13.46666666,
            'long'      =>  144.78333333,
            'name'      =>  'Guam',
        ],
        'GUY'  =>  [
            'lat'       =>  5,
            'long'      =>  -59,
            'name'      =>  'Co-operative Republic of Guyana',
        ],
        'HKG'  =>  [
            'lat'       =>  22.267,
            'long'      =>  114.188,
            'name'      =>  'Hong Kong Special Administrative Region of the People\'s Republic of China',
        ],
        'HMD'  =>  [
            'lat'       =>  -53.1,
            'long'      =>  72.51666666,
            'name'      =>  'Heard Island and McDonald Islands',
        ],
        'HND'  =>  [
            'lat'       =>  15,
            'long'      =>  -86.5,
            'name'      =>  'Republic of Honduras',
        ],
        'HRV'  =>  [
            'lat'       =>  45.16666666,
            'long'      =>  15.5,
            'name'      =>  'Republic of Croatia',
        ],
        'HTI'  =>  [
            'lat'       =>  19,
            'long'      =>  -72.41666666,
            'name'      =>  'Republic of Haiti',
        ],
        'HUN'  =>  [
            'lat'       =>  47,
            'long'      =>  20,
            'name'      =>  'Hungary',
        ],
        'IDN'  =>  [
            'lat'       =>  -5,
            'long'      =>  120,
            'name'      =>  'Republic of Indonesia',
        ],
        'IMN'  =>  [
            'lat'       =>  54.25,
            'long'      =>  -4.5,
            'name'      =>  'Isle of Man',
        ],
        'IND'  =>  [
            'lat'       =>  20,
            'long'      =>  77,
            'name'      =>  'Republic of India',
        ],
        'IOT'  =>  [
            'lat'       =>  -6,
            'long'      =>  71.5,
            'name'      =>  'British Indian Ocean Territory',
        ],
        'IRL'  =>  [
            'lat'       =>  53,
            'long'      =>  -8,
            'name'      =>  'Republic of Ireland',
        ],
        'IRN'  =>  [
            'lat'       =>  32,
            'long'      =>  53,
            'name'      =>  'Islamic Republic of Iran',
        ],
        'IRQ'  =>  [
            'lat'       =>  33,
            'long'      =>  44,
            'name'      =>  'Republic of Iraq',
        ],
        'ISL'  =>  [
            'lat'       =>  65,
            'long'      =>  -18,
            'name'      =>  'Iceland',
        ],
        'ISR'  =>  [
            'lat'       =>  31.47,
            'long'      =>  35.13,
            'name'      =>  'State of Israel',
        ],
        'ITA'  =>  [
            'lat'       =>  42.83333333,
            'long'      =>  12.83333333,
            'name'      =>  'Italian Republic',
        ],
        'JAM'  =>  [
            'lat'       =>  18.25,
            'long'      =>  -77.5,
            'name'      =>  'Jamaica',
        ],
        'JEY'  =>  [
            'lat'       =>  49.25,
            'long'      =>  -2.16666666,
            'name'      =>  'Bailiwick of Jersey',
        ],
        'JOR'  =>  [
            'lat'       =>  31,
            'long'      =>  36,
            'name'      =>  'Hashemite Kingdom of Jordan',
        ],
        'JPN'  =>  [
            'lat'       =>  36,
            'long'      =>  138,
            'name'      =>  'Japan',
        ],
        'KAZ'  =>  [
            'lat'       =>  48,
            'long'      =>  68,
            'name'      =>  'Republic of Kazakhstan',
        ],
        'KEN'  =>  [
            'lat'       =>  1,
            'long'      =>  38,
            'name'      =>  'Republic of Kenya',
        ],
        'KGZ'  =>  [
            'lat'       =>  41,
            'long'      =>  75,
            'name'      =>  'Kyrgyz Republic',
        ],
        'KHM'  =>  [
            'lat'       =>  13,
            'long'      =>  105,
            'name'      =>  'Kingdom of Cambodia',
        ],
        'KIR'  =>  [
            'lat'       =>  1.41666666,
            'long'      =>  173,
            'name'      =>  'Independent and Sovereign Republic of Kiribati',
        ],
        'KNA'  =>  [
            'lat'       =>  17.33333333,
            'long'      =>  -62.75,
            'name'      =>  'Federation of Saint Christopher and Nevis',
        ],
        'KOR'  =>  [
            'lat'       =>  37,
            'long'      =>  127.5,
            'name'      =>  'Republic of Korea',
        ],
        'UNK'  =>  [
            'lat'       =>  42.666667,
            'long'      =>  21.166667,
            'name'      =>  'Republic of Kosovo',
        ],
        'KWT'  =>  [
            'lat'       =>  29.5,
            'long'      =>  45.75,
            'name'      =>  'State of Kuwait',
        ],
        'LAO'  =>  [
            'lat'       =>  18,
            'long'      =>  105,
            'name'      =>  'Lao People\'s Democratic Republic',
        ],
        'LBN'  =>  [
            'lat'       =>  33.83333333,
            'long'      =>  35.83333333,
            'name'      =>  'Lebanese Republic',
        ],
        'LBR'  =>  [
            'lat'       =>  6.5,
            'long'      =>  -9.5,
            'name'      =>  'Republic of Liberia',
        ],
        'LBY'  =>  [
            'lat'       =>  25,
            'long'      =>  17,
            'name'      =>  'State of Libya',
        ],
        'LCA'  =>  [
            'lat'       =>  13.88333333,
            'long'      =>  -60.96666666,
            'name'      =>  'Saint Lucia',
        ],
        'LIE'  =>  [
            'lat'       =>  47.26666666,
            'long'      =>  9.53333333,
            'name'      =>  'Principality of Liechtenstein',
        ],
        'LKA'  =>  [
            'lat'       =>  7,
            'long'      =>  81,
            'name'      =>  'Democratic Socialist Republic of Sri Lanka',
        ],
        'LSO'  =>  [
            'lat'       =>  -29.5,
            'long'      =>  28.5,
            'name'      =>  'Kingdom of Lesotho',
        ],
        'LTU'  =>  [
            'lat'       =>  56,
            'long'      =>  24,
            'name'      =>  'Republic of Lithuania',
        ],
        'LUX'  =>  [
            'lat'       =>  49.75,
            'long'      =>  6.16666666,
            'name'      =>  'Grand Duchy of Luxembourg',
        ],
        'LVA'  =>  [
            'lat'       =>  57,
            'long'      =>  25,
            'name'      =>  'Republic of Latvia',
        ],
        'MAC'  =>  [
            'lat'       =>  22.16666666,
            'long'      =>  113.55,
            'name'      =>  'Macao Special Administrative Region of the People\'s Republic of China',
        ],
        'MAF'  =>  [
            'lat'       =>  18.08333333,
            'long'      =>  -63.95,
            'name'      =>  'Saint Martin',
        ],
        'MAR'  =>  [
            'lat'       =>  32,
            'long'      =>  -5,
            'name'      =>  'Kingdom of Morocco',
        ],
        'MCO'  =>  [
            'lat'       =>  43.73333333,
            'long'      =>  7.4,
            'name'      =>  'Principality of Monaco',
        ],
        'MDA'  =>  [
            'lat'       =>  47,
            'long'      =>  29,
            'name'      =>  'Republic of Moldova',
        ],
        'MDG'  =>  [
            'lat'       =>  -20,
            'long'      =>  47,
            'name'      =>  'Republic of Madagascar',
        ],
        'MDV'  =>  [
            'lat'       =>  3.25,
            'long'      =>  73,
            'name'      =>  'Republic of the Maldives',
        ],
        'MEX'  =>  [
            'lat'       =>  23,
            'long'      =>  -102,
            'name'      =>  'United Mexican States',
        ],
        'MHL'  =>  [
            'lat'       =>  9,
            'long'      =>  168,
            'name'      =>  'Republic of the Marshall Islands',
        ],
        'MKD'  =>  [
            'lat'       =>  41.83333333,
            'long'      =>  22,
            'name'      =>  'Republic of North Macedonia',
        ],
        'MLI'  =>  [
            'lat'       =>  17,
            'long'      =>  -4,
            'name'      =>  'Republic of Mali',
        ],
        'MLT'  =>  [
            'lat'       =>  35.83333333,
            'long'      =>  14.58333333,
            'name'      =>  'Republic of Malta',
        ],
        'MMR'  =>  [
            'lat'       =>  22,
            'long'      =>  98,
            'name'      =>  'Republic of the Union of Myanmar',
        ],
        'MNE'  =>  [
            'lat'       =>  42.5,
            'long'      =>  19.3,
            'name'      =>  'Montenegro',
        ],
        'MNG'  =>  [
            'lat'       =>  46,
            'long'      =>  105,
            'name'      =>  'Mongolia',
        ],
        'MNP'  =>  [
            'lat'       =>  15.2,
            'long'      =>  145.75,
            'name'      =>  'Commonwealth of the Northern Mariana Islands',
        ],
        'MOZ'  =>  [
            'lat'       =>  -18.25,
            'long'      =>  35,
            'name'      =>  'Republic of Mozambique',
        ],
        'MRT'  =>  [
            'lat'       =>  20,
            'long'      =>  -12,
            'name'      =>  'Islamic Republic of Mauritania',
        ],
        'MSR'  =>  [
            'lat'       =>  16.75,
            'long'      =>  -62.2,
            'name'      =>  'Montserrat',
        ],
        'MTQ'  =>  [
            'lat'       =>  14.666667,
            'long'      =>  -61,
            'name'      =>  'Martinique',
        ],
        'MUS'  =>  [
            'lat'       =>  -20.28333333,
            'long'      =>  57.55,
            'name'      =>  'Republic of Mauritius',
        ],
        'MWI'  =>  [
            'lat'       =>  -13.5,
            'long'      =>  34,
            'name'      =>  'Republic of Malawi',
        ],
        'MYS'  =>  [
            'lat'       =>  2.5,
            'long'      =>  112.5,
            'name'      =>  'Malaysia',
        ],
        'MYT'  =>  [
            'lat'       =>  -12.83333333,
            'long'      =>  45.16666666,
            'name'      =>  'Department of Mayotte',
        ],
        'NAM'  =>  [
            'lat'       =>  -22,
            'long'      =>  17,
            'name'      =>  'Republic of Namibia',
        ],
        'NCL'  =>  [
            'lat'       =>  -21.5,
            'long'      =>  165.5,
            'name'      =>  'New Caledonia',
        ],
        'NER'  =>  [
            'lat'       =>  16,
            'long'      =>  8,
            'name'      =>  'Republic of Niger',
        ],
        'NFK'  =>  [
            'lat'       =>  -29.03333333,
            'long'      =>  167.95,
            'name'      =>  'Territory of Norfolk Island',
        ],
        'NGA'  =>  [
            'lat'       =>  10,
            'long'      =>  8,
            'name'      =>  'Federal Republic of Nigeria',
        ],
        'NIC'  =>  [
            'lat'       =>  13,
            'long'      =>  -85,
            'name'      =>  'Republic of Nicaragua',
        ],
        'NIU'  =>  [
            'lat'       =>  -19.03333333,
            'long'      =>  -169.86666666,
            'name'      =>  'Niue',
        ],
        'NLD'  =>  [
            'lat'       =>  52.5,
            'long'      =>  5.75,
            'name'      =>  'Kingdom of the Netherlands',
        ],
        'NOR'  =>  [
            'lat'       =>  62,
            'long'      =>  10,
            'name'      =>  'Kingdom of Norway',
        ],
        'NPL'  =>  [
            'lat'       =>  28,
            'long'      =>  84,
            'name'      =>  'Federal Democratic Republic of Nepal',
        ],
        'NRU'  =>  [
            'lat'       =>  -0.53333333,
            'long'      =>  166.91666666,
            'name'      =>  'Republic of Nauru',
        ],
        'NZL'  =>  [
            'lat'       =>  -41,
            'long'      =>  174,
            'name'      =>  'New Zealand',
        ],
        'OMN'  =>  [
            'lat'       =>  21,
            'long'      =>  57,
            'name'      =>  'Sultanate of Oman',
        ],
        'PAK'  =>  [
            'lat'       =>  30,
            'long'      =>  70,
            'name'      =>  'Islamic Republic of Pakistan',
        ],
        'PAN'  =>  [
            'lat'       =>  9,
            'long'      =>  -80,
            'name'      =>  'Republic of Panama',
        ],
        'PCN'  =>  [
            'lat'       =>  -25.06666666,
            'long'      =>  -130.1,
            'name'      =>  'Pitcairn Group of Islands',
        ],
        'PER'  =>  [
            'lat'       =>  -10,
            'long'      =>  -76,
            'name'      =>  'Republic of Peru',
        ],
        'PHL'  =>  [
            'lat'       =>  13,
            'long'      =>  122,
            'name'      =>  'Republic of the Philippines',
        ],
        'PLW'  =>  [
            'lat'       =>  7.5,
            'long'      =>  134.5,
            'name'      =>  'Republic of Palau',
        ],
        'PNG'  =>  [
            'lat'       =>  -6,
            'long'      =>  147,
            'name'      =>  'Independent State of Papua New Guinea',
        ],
        'POL'  =>  [
            'lat'       =>  52,
            'long'      =>  20,
            'name'      =>  'Republic of Poland',
        ],
        'PRI'  =>  [
            'lat'       =>  18.25,
            'long'      =>  -66.5,
            'name'      =>  'Commonwealth of Puerto Rico',
        ],
        'PRK'  =>  [
            'lat'       =>  40,
            'long'      =>  127,
            'name'      =>  'Democratic People\'s Republic of Korea',
        ],
        'PRT'  =>  [
            'lat'       =>  39.5,
            'long'      =>  -8,
            'name'      =>  'Portuguese Republic',
        ],
        'PRY'  =>  [
            'lat'       =>  -23,
            'long'      =>  -58,
            'name'      =>  'Republic of Paraguay',
        ],
        'PSE'  =>  [
            'lat'       =>  31.9,
            'long'      =>  35.2,
            'name'      =>  'State of Palestine',
        ],
        'PYF'  =>  [
            'lat'       =>  -15,
            'long'      =>  -140,
            'name'      =>  'French Polynesia',
        ],
        'QAT'  =>  [
            'lat'       =>  25.5,
            'long'      =>  51.25,
            'name'      =>  'State of Qatar',
        ],
        'REU'  =>  [
            'lat'       =>  -21.15,
            'long'      =>  55.5,
            'name'      =>  'Réunion Island',
        ],
        'ROU'  =>  [
            'lat'       =>  46,
            'long'      =>  25,
            'name'      =>  'Romania',
        ],
        'RUS'  =>  [
            'lat'       =>  60,
            'long'      =>  100,
            'name'      =>  'Russian Federation',
        ],
        'RWA'  =>  [
            'lat'       =>  -2,
            'long'      =>  30,
            'name'      =>  'Republic of Rwanda',
        ],
        'SAU'  =>  [
            'lat'       =>  25,
            'long'      =>  45,
            'name'      =>  'Kingdom of Saudi Arabia',
        ],
        'SDN'  =>  [
            'lat'       =>  15,
            'long'      =>  30,
            'name'      =>  'Republic of the Sudan',
        ],
        'SEN'  =>  [
            'lat'       =>  14,
            'long'      =>  -14,
            'name'      =>  'Republic of Senegal',
        ],
        'SGP'  =>  [
            'lat'       =>  1.36666666,
            'long'      =>  103.8,
            'name'      =>  'Republic of Singapore',
        ],
        'SGS'  =>  [
            'lat'       =>  -54.5,
            'long'      =>  -37,
            'name'      =>  'South Georgia and the South Sandwich Islands',
        ],
        'SJM'  =>  [
            'lat'       =>  78,
            'long'      =>  20,
            'name'      =>  'Svalbard og Jan Mayen',
        ],
        'SLB'  =>  [
            'lat'       =>  -8,
            'long'      =>  159,
            'name'      =>  'Solomon Islands',
        ],
        'SLE'  =>  [
            'lat'       =>  8.5,
            'long'      =>  -11.5,
            'name'      =>  'Republic of Sierra Leone',
        ],
        'SLV'  =>  [
            'lat'       =>  13.83333333,
            'long'      =>  -88.91666666,
            'name'      =>  'Republic of El Salvador',
        ],
        'SMR'  =>  [
            'lat'       =>  43.76666666,
            'long'      =>  12.41666666,
            'name'      =>  'Most Serene Republic of San Marino',
        ],
        'SOM'  =>  [
            'lat'       =>  10,
            'long'      =>  49,
            'name'      =>  'Federal Republic of Somalia',
        ],
        'SPM'  =>  [
            'lat'       =>  46.83333333,
            'long'      =>  -56.33333333,
            'name'      =>  'Saint Pierre and Miquelon',
        ],
        'SRB'  =>  [
            'lat'       =>  44,
            'long'      =>  21,
            'name'      =>  'Republic of Serbia',
        ],
        'SSD'  =>  [
            'lat'       =>  7,
            'long'      =>  30,
            'name'      =>  'Republic of South Sudan',
        ],
        'STP'  =>  [
            'lat'       =>  1,
            'long'      =>  7,
            'name'      =>  'Democratic Republic of São Tomé and Príncipe',
        ],
        'SUR'  =>  [
            'lat'       =>  4,
            'long'      =>  -56,
            'name'      =>  'Republic of Suriname',
        ],
        'SVK'  =>  [
            'lat'       =>  48.66666666,
            'long'      =>  19.5,
            'name'      =>  'Slovak Republic',
        ],
        'SVN'  =>  [
            'lat'       =>  46.11666666,
            'long'      =>  14.81666666,
            'name'      =>  'Republic of Slovenia',
        ],
        'SWE'  =>  [
            'lat'       =>  62,
            'long'      =>  15,
            'name'      =>  'Kingdom of Sweden',
        ],
        'SWZ'  =>  [
            'lat'       =>  -26.5,
            'long'      =>  31.5,
            'name'      =>  'Kingdom of Eswatini',
        ],
        'SXM'  =>  [
            'lat'       =>  18.033333,
            'long'      =>  -63.05,
            'name'      =>  'Sint Maarten',
        ],
        'SYC'  =>  [
            'lat'       =>  -4.58333333,
            'long'      =>  55.66666666,
            'name'      =>  'Republic of Seychelles',
        ],
        'SYR'  =>  [
            'lat'       =>  35,
            'long'      =>  38,
            'name'      =>  'Syrian Arab Republic',
        ],
        'TCA'  =>  [
            'lat'       =>  21.75,
            'long'      =>  -71.58333333,
            'name'      =>  'Turks and Caicos Islands',
        ],
        'TCD'  =>  [
            'lat'       =>  15,
            'long'      =>  19,
            'name'      =>  'Republic of Chad',
        ],
        'TGO'  =>  [
            'lat'       =>  8,
            'long'      =>  1.16666666,
            'name'      =>  'Togolese Republic',
        ],
        'THA'  =>  [
            'lat'       =>  15,
            'long'      =>  100,
            'name'      =>  'Kingdom of Thailand',
        ],
        'TJK'  =>  [
            'lat'       =>  39,
            'long'      =>  71,
            'name'      =>  'Republic of Tajikistan',
        ],
        'TKL'  =>  [
            'lat'       =>  -9,
            'long'      =>  -172,
            'name'      =>  'Tokelau',
        ],
        'TKM'  =>  [
            'lat'       =>  40,
            'long'      =>  60,
            'name'      =>  'Turkmenistan',
        ],
        'TLS'  =>  [
            'lat'       =>  -8.83333333,
            'long'      =>  125.91666666,
            'name'      =>  'Democratic Republic of Timor-Leste',
        ],
        'TON'  =>  [
            'lat'       =>  -20,
            'long'      =>  -175,
            'name'      =>  'Kingdom of Tonga',
        ],
        'TTO'  =>  [
            'lat'       =>  11,
            'long'      =>  -61,
            'name'      =>  'Republic of Trinidad and Tobago',
        ],
        'TUN'  =>  [
            'lat'       =>  34,
            'long'      =>  9,
            'name'      =>  'Tunisian Republic',
        ],
        'TUR'  =>  [
            'lat'       =>  39,
            'long'      =>  35,
            'name'      =>  'Republic of Turkey',
        ],
        'TUV'  =>  [
            'lat'       =>  -8,
            'long'      =>  178,
            'name'      =>  'Tuvalu',
        ],
        'TWN'  =>  [
            'lat'       =>  23.5,
            'long'      =>  121,
            'name'      =>  'Republic of China (Taiwan)',
        ],
        'TZA'  =>  [
            'lat'       =>  -6,
            'long'      =>  35,
            'name'      =>  'United Republic of Tanzania',
        ],
        'UGA'  =>  [
            'lat'       =>  1,
            'long'      =>  32,
            'name'      =>  'Republic of Uganda',
        ],
        'UKR'  =>  [
            'lat'       =>  49,
            'long'      =>  32,
            'name'      =>  'Ukraine',
        ],
        'UMI'  =>  [
            'lat'       =>  19.3,
            'long'      =>  166.633333,
            'name'      =>  'United States Minor Outlying Islands',
        ],
        'URY'  =>  [
            'lat'       =>  -33,
            'long'      =>  -56,
            'name'      =>  'Oriental Republic of Uruguay',
        ],
        'USA'  =>  [
            'lat'       =>  38,
            'long'      =>  -97,
            'name'      =>  'United States of America',
        ],
        'UZB'  =>  [
            'lat'       =>  41,
            'long'      =>  64,
            'name'      =>  'Republic of Uzbekistan',
        ],
        'VAT'  =>  [
            'lat'       =>  41.9,
            'long'      =>  12.45,
            'name'      =>  'Vatican City State',
        ],
        'VCT'  =>  [
            'lat'       =>  13.25,
            'long'      =>  -61.2,
            'name'      =>  'Saint Vincent and the Grenadines',
        ],
        'VEN'  =>  [
            'lat'       =>  8,
            'long'      =>  -66,
            'name'      =>  'Bolivarian Republic of Venezuela',
        ],
        'VGB'  =>  [
            'lat'       =>  18.431383,
            'long'      =>  -64.62305,
            'name'      =>  'Virgin Islands',
        ],
        'VIR'  =>  [
            'lat'       =>  18.35,
            'long'      =>  -64.933333,
            'name'      =>  'Virgin Islands of the United States',
        ],
        'VNM'  =>  [
            'lat'       =>  16.16666666,
            'long'      =>  107.83333333,
            'name'      =>  'Socialist Republic of Vietnam',
        ],
        'VUT'  =>  [
            'lat'       =>  -16,
            'long'      =>  167,
            'name'      =>  'Republic of Vanuatu',
        ],
        'WLF'  =>  [
            'lat'       =>  -13.3,
            'long'      =>  -176.2,
            'name'      =>  'Territory of the Wallis and Futuna Islands',
        ],
        'WSM'  =>  [
            'lat'       =>  -13.58333333,
            'long'      =>  -172.33333333,
            'name'      =>  'Independent State of Samoa',
        ],
        'YEM'  =>  [
            'lat'       =>  15,
            'long'      =>  48,
            'name'      =>  'Republic of Yemen',
        ],
        'ZAF'  =>  [
            'lat'       =>  -29,
            'long'      =>  24,
            'name'      =>  'Republic of South Africa',
        ],
        'ZMB'  =>  [
            'lat'       =>  -15,
            'long'      =>  30,
            'name'      =>  'Republic of Zambia',
        ],
        'ZWE'  =>  [
            'lat'       =>  -20,
            'long'      =>  30,
            'name'      =>  'Republic of Zimbabwe',
        ],
    ],
];
