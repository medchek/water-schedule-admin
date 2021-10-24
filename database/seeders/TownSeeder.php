<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Town;

class TownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $townsByWilaya = [
            1 => [
                0 => [
                    'name' => 'Adrar',
                    'code' => 101,
                ],
                1 => [
                    'name' => 'Tamest',
                    'code' => 102,
                ],
                2 => [
                    'name' => 'Charouine',
                    'code' => 103,
                ],
                3 => [
                    'name' => 'Reggane',
                    'code' => 104,
                ],
                4 => [
                    'name' => 'In Zghmir',
                    'code' => 105,
                ],
                5 => [
                    'name' => 'Tit',
                    'code' => 106,
                ],
                6 => [
                    'name' => 'Ksar Kaddour',
                    'code' => 107,
                ],
                7 => [
                    'name' => 'Tsabit',
                    'code' => 108,
                ],
                8 => [
                    'name' => 'Timimoun',
                    'code' => 109,
                ],
                9 => [
                    'name' => 'Ouled Saïd',
                    'code' => 110,
                ],
                10 => [
                    'name' => 'Zaouiet Kounta',
                    'code' => 111,
                ],
                11 => [
                    'name' => 'Aoulef',
                    'code' => 112,
                ],
                12 => [
                    'name' => 'Tamekten',
                    'code' => 113,
                ],
                13 => [
                    'name' => 'Tamantit',
                    'code' => 114,
                ],
                14 => [
                    'name' => 'Fenoughil',
                    'code' => 115,
                ],
                15 => [
                    'name' => 'Tinerkouk',
                    'code' => 116,
                ],
                16 => [
                    'name' => 'Deldoul',
                    'code' => 117,
                ],
                17 => [
                    'name' => 'Sali',
                    'code' => 118,
                ],
                18 => [
                    'name' => 'Akabli',
                    'code' => 119,
                ],
                19 => [
                    'name' => 'Metarfa',
                    'code' => 120,
                ],
                20 => [
                    'name' => 'Ouled Ahmed Tammi',
                    'code' => 121,
                ],
                21 => [
                    'name' => 'Bouda',
                    'code' => 122,
                ],
                22 => [
                    'name' => 'Aougrout',
                    'code' => 123,
                ],
                23 => [
                    'name' => 'Talmine',
                    'code' => 124,
                ],
                24 => [
                    'name' => 'Bordj Badji Mokhtar',
                    'code' => 125,
                ],
                25 => [
                    'name' => 'Sebaa',
                    'code' => 126,
                ],
                26 => [
                    'name' => 'Ouled Aïssa',
                    'code' => 127,
                ],
                27 => [
                    'name' => 'Timiaouine',
                    'code' => 128,
                ],
            ],
            2 => [
                0 => [
                    'name' => 'Chlef',
                    'code' => 201,
                ],
                1 => [
                    'name' => 'Ténès',
                    'code' => 202,
                ],
                2 => [
                    'name' => 'Bénairia',
                    'code' => 203,
                ],
                3 => [
                    'name' => 'El Karimia',
                    'code' => 204,
                ],
                4 => [
                    'name' => 'Tadjena',
                    'code' => 205,
                ],
                5 => [
                    'name' => 'Taougrite',
                    'code' => 206,
                ],
                6 => [
                    'name' => 'Beni Haoua',
                    'code' => 207,
                ],
                7 => [
                    'name' => 'Sobha',
                    'code' => 208,
                ],
                8 => [
                    'name' => 'Harchoun',
                    'code' => 209,
                ],
                9 => [
                    'name' => 'Ouled Fares',
                    'code' => 210,
                ],
                10 => [
                    'name' => 'Sidi Akkacha',
                    'code' => 211,
                ],
                11 => [
                    'name' => 'Boukadir',
                    'code' => 212,
                ],
                12 => [
                    'name' => 'Beni Rached',
                    'code' => 213,
                ],
                13 => [
                    'name' => 'Talassa',
                    'code' => 214,
                ],
                14 => [
                    'name' => 'Harenfa',
                    'code' => 215,
                ],
                15 => [
                    'name' => 'Oued Goussine',
                    'code' => 216,
                ],
                16 => [
                    'name' => 'Dahra',
                    'code' => 217,
                ],
                17 => [
                    'name' => 'Ouled Abbes',
                    'code' => 218,
                ],
                18 => [
                    'name' => 'Sendjas',
                    'code' => 219,
                ],
                19 => [
                    'name' => 'Zeboudja',
                    'code' => 220,
                ],
                20 => [
                    'name' => 'Oued Sly',
                    'code' => 221,
                ],
                21 => [
                    'name' => 'Abou El Hassan',
                    'code' => 222,
                ],
                22 => [
                    'name' => 'El Marsa',
                    'code' => 223,
                ],
                23 => [
                    'name' => 'Chettia',
                    'code' => 224,
                ],
                24 => [
                    'name' => 'Sidi Abderrahmane',
                    'code' => 225,
                ],
                25 => [
                    'name' => 'Moussadek',
                    'code' => 226,
                ],
                26 => [
                    'name' => 'El Hadjadj',
                    'code' => 227,
                ],
                27 => [
                    'name' => 'Labiod Medjadja',
                    'code' => 228,
                ],
                28 => [
                    'name' => 'Oued Fodda',
                    'code' => 229,
                ],
                29 => [
                    'name' => 'Ouled Ben Abdelkader',
                    'code' => 230,
                ],
                30 => [
                    'name' => 'Bouzeghaia',
                    'code' => 231,
                ],
                31 => [
                    'name' => 'Aïn Merane',
                    'code' => 232,
                ],
                32 => [
                    'name' => 'Oum Drou',
                    'code' => 233,
                ],
                33 => [
                    'name' => 'Breira',
                    'code' => 234,
                ],
                34 => [
                    'name' => 'Beni Bouateb',
                    'code' => 235,
                ],
            ],
            3 => [
                0 => [
                    'name' => 'Laghouat',
                    'code' => 301,
                ],
                1 => [
                    'name' => 'Ksar El Hirane',
                    'code' => 302,
                ],
                2 => [
                    'name' => 'Bennasser Benchohra',
                    'code' => 303,
                ],
                3 => [
                    'name' => 'Sidi Makhlouf',
                    'code' => 304,
                ],
                4 => [
                    'name' => 'Hassi Delaa',
                    'code' => 305,
                ],
                5 => [
                    'name' => 'Hassi R\'Mel',
                    'code' => 306,
                ],
                6 => [
                    'name' => 'Aïn Madhi',
                    'code' => 307,
                ],
                7 => [
                    'name' => 'Tadjemout',
                    'code' => 308,
                ],
                8 => [
                    'name' => 'Kheneg',
                    'code' => 309,
                ],
                9 => [
                    'name' => 'Gueltat Sidi Saad',
                    'code' => 310,
                ],
                10 => [
                    'name' => 'Aïn Sidi Ali',
                    'code' => 311,
                ],
                11 => [
                    'name' => 'Beidha',
                    'code' => 312,
                ],
                12 => [
                    'name' => 'Brida',
                    'code' => 313,
                ],
                13 => [
                    'name' => 'El Ghicha',
                    'code' => 314,
                ],
                14 => [
                    'name' => 'Hadj Mechri',
                    'code' => 315,
                ],
                15 => [
                    'name' => 'Sebgag',
                    'code' => 316,
                ],
                16 => [
                    'name' => 'Taouiala',
                    'code' => 317,
                ],
                17 => [
                    'name' => 'Tadjrouna',
                    'code' => 318,
                ],
                18 => [
                    'name' => 'Aflou',
                    'code' => 319,
                ],
                19 => [
                    'name' => 'El Assafia',
                    'code' => 320,
                ],
                20 => [
                    'name' => 'Oued Morra',
                    'code' => 321,
                ],
                21 => [
                    'name' => 'Oued M\'Zi',
                    'code' => 322,
                ],
                22 => [
                    'name' => 'El Houaita',
                    'code' => 323,
                ],
                23 => [
                    'name' => 'Sidi Bouzid',
                    'code' => 324,
                ],
            ],
            4 => [
                0 => [
                    'name' => 'Oum el Bouaghi',
                    'code' => 401,
                ],
                1 => [
                    'name' => 'Aïn Beïda',
                    'code' => 402,
                ],
                2 => [
                    'name' => 'Aïn M\'lila',
                    'code' => 403,
                ],
                3 => [
                    'name' => 'Behir Chergui',
                    'code' => 404,
                ],
                4 => [
                    'name' => 'El Amiria',
                    'code' => 405,
                ],
                5 => [
                    'name' => 'Sigus',
                    'code' => 406,
                ],
                6 => [
                    'name' => 'El Belala',
                    'code' => 407,
                ],
                7 => [
                    'name' => 'Aïn Babouche',
                    'code' => 408,
                ],
                8 => [
                    'name' => 'Berriche',
                    'code' => 409,
                ],
                9 => [
                    'name' => 'Ouled Hamla',
                    'code' => 410,
                ],
                10 => [
                    'name' => 'Dhalaa',
                    'code' => 411,
                ],
                11 => [
                    'name' => 'Aïn Kercha',
                    'code' => 412,
                ],
                12 => [
                    'name' => 'Hanchir Toumghani',
                    'code' => 413,
                ],
                13 => [
                    'name' => 'El Djazia',
                    'code' => 414,
                ],
                14 => [
                    'name' => 'Aïn Diss',
                    'code' => 415,
                ],
                15 => [
                    'name' => 'Fkirina',
                    'code' => 416,
                ],
                16 => [
                    'name' => 'Souk Naamane',
                    'code' => 417,
                ],
                17 => [
                    'name' => 'Zorg',
                    'code' => 418,
                ],
                18 => [
                    'name' => 'El Fedjoudj Boughrara Saoudi',
                    'code' => 419,
                ],
                19 => [
                    'name' => 'Ouled Zouaï',
                    'code' => 420,
                ],
                20 => [
                    'name' => 'Bir Chouhada',
                    'code' => 421,
                ],
                21 => [
                    'name' => 'Ksar Sbahi',
                    'code' => 422,
                ],
                22 => [
                    'name' => 'Oued Nini',
                    'code' => 423,
                ],
                23 => [
                    'name' => 'Meskiana',
                    'code' => 424,
                ],
                24 => [
                    'name' => 'Aïn Fakroun',
                    'code' => 425,
                ],
                25 => [
                    'name' => 'Rahia',
                    'code' => 426,
                ],
                26 => [
                    'name' => 'Aïn Zitoun',
                    'code' => 427,
                ],
                27 => [
                    'name' => 'Ouled Gacem',
                    'code' => 428,
                ],
                28 => [
                    'name' => 'El Harmilia',
                    'code' => 429,
                ],
            ],
            5 => [
                0 => [
                    'name' => 'Batna',
                    'code' => 501,
                ],
                1 => [
                    'name' => 'Ghassira',
                    'code' => 502,
                ],
                2 => [
                    'name' => 'Maafa',
                    'code' => 503,
                ],
                3 => [
                    'name' => 'Merouana',
                    'code' => 504,
                ],
                4 => [
                    'name' => 'Seriana',
                    'code' => 505,
                ],
                5 => [
                    'name' => 'Menaa',
                    'code' => 506,
                ],
                6 => [
                    'name' => 'El Madher',
                    'code' => 507,
                ],
                7 => [
                    'name' => 'Tazoult',
                    'code' => 508,
                ],
                8 => [
                    'name' => 'N\'Gaous',
                    'code' => 509,
                ],
                9 => [
                    'name' => 'Guigba',
                    'code' => 510,
                ],
                10 => [
                    'name' => 'Inoughissen',
                    'code' => 511,
                ],
                11 => [
                    'name' => 'Ouyoun El Assafir',
                    'code' => 512,
                ],
                12 => [
                    'name' => 'Djerma',
                    'code' => 513,
                ],
                13 => [
                    'name' => 'Bitam',
                    'code' => 514,
                ],
                14 => [
                    'name' => 'Abdelkader Azil',
                    'code' => 515,
                ],
                15 => [
                    'name' => 'Arris',
                    'code' => 516,
                ],
                16 => [
                    'name' => 'Kimmel',
                    'code' => 517,
                ],
                17 => [
                    'name' => 'Tilatou',
                    'code' => 518,
                ],
                18 => [
                    'name' => 'Aïn Djasser',
                    'code' => 519,
                ],
                19 => [
                    'name' => 'Ouled Sellam',
                    'code' => 520,
                ],
                20 => [
                    'name' => 'Tigherghar',
                    'code' => 521,
                ],
                21 => [
                    'name' => 'Aïn Yagout',
                    'code' => 522,
                ],
                22 => [
                    'name' => 'Sefiane',
                    'code' => 524,
                ],
                23 => [
                    'name' => 'Fesdis',
                    'code' => 523,
                ],
                24 => [
                    'name' => 'Rahbat',
                    'code' => 525,
                ],
                25 => [
                    'name' => 'Tighanimine',
                    'code' => 526,
                ],
                26 => [
                    'name' => 'Lemsane',
                    'code' => 527,
                ],
                27 => [
                    'name' => 'Ksar Bellezma',
                    'code' => 528,
                ],
                28 => [
                    'name' => 'Seggana',
                    'code' => 529,
                ],
                29 => [
                    'name' => 'Ichmoul',
                    'code' => 530,
                ],
                30 => [
                    'name' => 'Foum Toub',
                    'code' => 531,
                ],
                31 => [
                    'name' => 'Ben Foudhala El Hakania',
                    'code' => 532,
                ],
                32 => [
                    'name' => 'Oued El Ma',
                    'code' => 533,
                ],
                33 => [
                    'name' => 'Talkhamt',
                    'code' => 534,
                ],
                34 => [
                    'name' => 'Bouzina',
                    'code' => 535,
                ],
                35 => [
                    'name' => 'Chemora',
                    'code' => 536,
                ],
                36 => [
                    'name' => 'Oued Chaaba',
                    'code' => 537,
                ],
                37 => [
                    'name' => 'Taxlent',
                    'code' => 538,
                ],
                38 => [
                    'name' => 'Gosbat',
                    'code' => 539,
                ],
                39 => [
                    'name' => 'Ouled Aouf',
                    'code' => 540,
                ],
                40 => [
                    'name' => 'Boumagueur',
                    'code' => 541,
                ],
                41 => [
                    'name' => 'Barika',
                    'code' => 542,
                ],
                42 => [
                    'name' => 'Djezar',
                    'code' => 543,
                ],
                43 => [
                    'name' => 'T\'Kout',
                    'code' => 544,
                ],
                44 => [
                    'name' => 'Aïn Touta',
                    'code' => 545,
                ],
                45 => [
                    'name' => 'Hidoussa',
                    'code' => 546,
                ],
                46 => [
                    'name' => 'Teniet El Abed',
                    'code' => 547,
                ],
                47 => [
                    'name' => 'Oued Taga',
                    'code' => 548,
                ],
                48 => [
                    'name' => 'Ouled Fadel',
                    'code' => 549,
                ],
                49 => [
                    'name' => 'Timgad',
                    'code' => 550,
                ],
                50 => [
                    'name' => 'Ras El Aioun',
                    'code' => 551,
                ],
                51 => [
                    'name' => 'Chir',
                    'code' => 552,
                ],
                52 => [
                    'name' => 'Ouled Si Slimane',
                    'code' => 553,
                ],
                53 => [
                    'name' => 'Zanat El Beida',
                    'code' => 554,
                ],
                54 => [
                    'name' => 'M\'doukel',
                    'code' => 555,
                ],
                55 => [
                    'name' => 'Ouled Ammar',
                    'code' => 556,
                ],
                56 => [
                    'name' => 'El Hassi',
                    'code' => 557,
                ],
                57 => [
                    'name' => 'Lazrou',
                    'code' => 558,
                ],
                58 => [
                    'name' => 'Boumia (Batna)',
                    'code' => 559,
                ],
                59 => [
                    'name' => 'Boulhilat',
                    'code' => 560,
                ],
                60 => [
                    'name' => 'Larbaâ',
                    'code' => 561,
                ],
            ],
            6 => [
                0 => [
                    'name' => 'Béjaïa',
                    'code' => 601,
                ],
                1 => [
                    'name' => 'Amizour',
                    'code' => 602,
                ],
                2 => [
                    'name' => 'Ferraoun',
                    'code' => 603,
                ],
                3 => [
                    'name' => 'Taourirt Ighil',
                    'code' => 604,
                ],
                4 => [
                    'name' => 'Chellata',
                    'code' => 605,
                ],
                5 => [
                    'name' => 'Tamokra',
                    'code' => 606,
                ],
                6 => [
                    'name' => 'Timezrit',
                    'code' => 607,
                ],
                7 => [
                    'name' => 'Souk El Ténine',
                    'code' => 608,
                ],
                8 => [
                    'name' => 'M\'cisna',
                    'code' => 609,
                ],
                9 => [
                    'name' => 'Tinabdher',
                    'code' => 610,
                ],
                10 => [
                    'name' => 'Tichy',
                    'code' => 611,
                ],
                11 => [
                    'name' => 'Semaoun',
                    'code' => 612,
                ],
                12 => [
                    'name' => 'Kendira',
                    'code' => 613,
                ],
                13 => [
                    'name' => 'Tifra',
                    'code' => 614,
                ],
                14 => [
                    'name' => 'Ighram',
                    'code' => 615,
                ],
                15 => [
                    'name' => 'Amalou',
                    'code' => 616,
                ],
                16 => [
                    'name' => 'Ighil Ali',
                    'code' => 617,
                ],
                17 => [
                    'name' => 'Fenaïa Ilmaten',
                    'code' => 618,
                ],
                18 => [
                    'name' => 'Toudja',
                    'code' => 619,
                ],
                19 => [
                    'name' => 'Darguina',
                    'code' => 620,
                ],
                20 => [
                    'name' => 'Sidi-Ayad',
                    'code' => 621,
                ],
                21 => [
                    'name' => 'Aokas',
                    'code' => 622,
                ],
                22 => [
                    'name' => 'Ait Djellil',
                    'code' => 623,
                ],
                23 => [
                    'name' => 'Adekar',
                    'code' => 624,
                ],
                24 => [
                    'name' => 'Akbou',
                    'code' => 625,
                ],
                25 => [
                    'name' => 'Seddouk',
                    'code' => 626,
                ],
                26 => [
                    'name' => 'Tazmalt',
                    'code' => 627,
                ],
                27 => [
                    'name' => 'Aït-R\'zine',
                    'code' => 628,
                ],
                28 => [
                    'name' => 'Chemini',
                    'code' => 629,
                ],
                29 => [
                    'name' => 'Souk-Oufella',
                    'code' => 630,
                ],
                30 => [
                    'name' => 'Taskriout',
                    'code' => 631,
                ],
                31 => [
                    'name' => 'Tibane',
                    'code' => 632,
                ],
                32 => [
                    'name' => 'Tala Hamza',
                    'code' => 633,
                ],
                33 => [
                    'name' => 'Barbacha',
                    'code' => 634,
                ],
                34 => [
                    'name' => 'Aït Ksila',
                    'code' => 635,
                ],
                35 => [
                    'name' => 'Ouzellaguen',
                    'code' => 636,
                ],
                36 => [
                    'name' => 'Bouhamza',
                    'code' => 637,
                ],
                37 => [
                    'name' => 'Beni Mellikeche',
                    'code' => 638,
                ],
                38 => [
                    'name' => 'Sidi-Aïch',
                    'code' => 639,
                ],
                39 => [
                    'name' => 'El Kseur',
                    'code' => 640,
                ],
                40 => [
                    'name' => 'Melbou',
                    'code' => 641,
                ],
                41 => [
                    'name' => 'Akfadou',
                    'code' => 642,
                ],
                42 => [
                    'name' => 'Leflaye',
                    'code' => 643,
                ],
                43 => [
                    'name' => 'Kherrata',
                    'code' => 644,
                ],
                44 => [
                    'name' => 'Draâ El-Kaïd',
                    'code' => 645,
                ],
                45 => [
                    'name' => 'Tamridjet',
                    'code' => 646,
                ],
                46 => [
                    'name' => 'Aït-Smail',
                    'code' => 647,
                ],
                47 => [
                    'name' => 'Boukhelifa',
                    'code' => 648,
                ],
                48 => [
                    'name' => 'Tizi N\'Berber',
                    'code' => 649,
                ],
                49 => [
                    'name' => 'Aït Maouche',
                    'code' => 650,
                ],
                50 => [
                    'name' => 'Oued Ghir',
                    'code' => 651,
                ],
                51 => [
                    'name' => 'Boudjellil',
                    'code' => 652,
                ],
            ],
            7 => [
                0 => [
                    'name' => 'Aïn Naga',
                    'code' => 701,
                ],
                1 => [
                    'name' => 'Aïn Zaatout',
                    'code' => 702,
                ],
                2 => [
                    'name' => 'Biskra',
                    'code' => 703,
                ],
                3 => [
                    'name' => 'Bordj Ben Azzouz',
                    'code' => 704,
                ],
                4 => [
                    'name' => 'Bouchagroune',
                    'code' => 705,
                ],
                5 => [
                    'name' => 'Branis',
                    'code' => 706,
                ],
                6 => [
                    'name' => 'Chetma',
                    'code' => 707,
                ],
                7 => [
                    'name' => 'Djemorah',
                    'code' => 708,
                ],
                8 => [
                    'name' => 'El Feidh',
                    'code' => 709,
                ],
                9 => [
                    'name' => 'El Ghrous',
                    'code' => 7010,
                ],
                10 => [
                    'name' => 'El Hadjeb',
                    'code' => 711,
                ],
                11 => [
                    'name' => 'El Haouch',
                    'code' => 712,
                ],
                12 => [
                    'name' => 'El Kantara',
                    'code' => 713,
                ],
                13 => [
                    'name' => 'El Mizaraa',
                    'code' => 714,
                ],
                14 => [
                    'name' => 'El Outaya',
                    'code' => 715,
                ],
                15 => [
                    'name' => 'Foughala',
                    'code' => 716,
                ],
                16 => [
                    'name' => 'Khenguet Sidi Nadji',
                    'code' => 717,
                ],
                17 => [
                    'name' => 'Lichana',
                    'code' => 718,
                ],
                18 => [
                    'name' => 'Lioua',
                    'code' => 719,
                ],
                19 => [
                    'name' => 'M\'Chouneche',
                    'code' => 720,
                ],
                20 => [
                    'name' => 'Mekhadma',
                    'code' => 721,
                ],
                21 => [
                    'name' => 'M\'Lili',
                    'code' => 722,
                ],
                22 => [
                    'name' => 'Oumache',
                    'code' => 723,
                ],
                23 => [
                    'name' => 'Ourlal',
                    'code' => 724,
                ],
                24 => [
                    'name' => 'Sidi Okba',
                    'code' => 725,
                ],
                25 => [
                    'name' => 'Tolga',
                    'code' => 726,
                ],
                26 => [
                    'name' => 'Zeribet El Oued',
                    'code' => 727,
                ],
            ],
            8 => [
                0 => [
                    'name' => 'Béchar',
                    'code' => 801,
                ],
                1 => [
                    'name' => 'Erg Ferradj',
                    'code' => 802,
                ],
                2 => [
                    'name' => 'Ouled Khoudir',
                    'code' => 803,
                ],
                3 => [
                    'name' => 'Meridja',
                    'code' => 804,
                ],
                4 => [
                    'name' => 'Timoudi',
                    'code' => 805,
                ],
                5 => [
                    'name' => 'Lahmar',
                    'code' => 806,
                ],
                6 => [
                    'name' => 'Béni Abbès',
                    'code' => 807,
                ],
                7 => [
                    'name' => 'Beni Ikhlef',
                    'code' => 808,
                ],
                8 => [
                    'name' => 'Mechraa Houari Boumedienne',
                    'code' => 809,
                ],
                9 => [
                    'name' => 'Kenadsa',
                    'code' => 810,
                ],
                10 => [
                    'name' => 'Igli',
                    'code' => 811,
                ],
                11 => [
                    'name' => 'Tabelbala',
                    'code' => 812,
                ],
                12 => [
                    'name' => 'Taghit',
                    'code' => 813,
                ],
                13 => [
                    'name' => 'El Ouata',
                    'code' => 814,
                ],
                14 => [
                    'name' => 'Boukais',
                    'code' => 815,
                ],
                15 => [
                    'name' => 'Mougheul',
                    'code' => 8016,
                ],
                16 => [
                    'name' => 'Abadla',
                    'code' => 817,
                ],
                17 => [
                    'name' => 'Kerzaz',
                    'code' => 818,
                ],
                18 => [
                    'name' => 'Ksabi',
                    'code' => 819,
                ],
                19 => [
                    'name' => 'Tamtert',
                    'code' => 820,
                ],
                20 => [
                    'name' => 'Beni Ounif',
                    'code' => 821,
                ],
            ],
            9 => [
                0 => [
                    'name' => 'Blida',
                    'code' => 901,
                ],
                1 => [
                    'name' => 'Chebli',
                    'code' => 902,
                ],
                2 => [
                    'name' => 'Bouinan',
                    'code' => 903,
                ],
                3 => [
                    'name' => 'Oued Alleug',
                    'code' => 904,
                ],
                4 => [
                    'name' => 'Ouled Yaïch',
                    'code' => 907,
                ],
                5 => [
                    'name' => 'Chréa',
                    'code' => 908,
                ],
                6 => [
                    'name' => 'El Affroun',
                    'code' => 910,
                ],
                7 => [
                    'name' => 'Chiffa',
                    'code' => 911,
                ],
                8 => [
                    'name' => 'Hammam Melouane',
                    'code' => 912,
                ],
                9 => [
                    'name' => 'Benkhelil',
                    'code' => 913,
                ],
                10 => [
                    'name' => 'Soumaa',
                    'code' => 914,
                ],
                11 => [
                    'name' => 'Mouzaia',
                    'code' => 916,
                ],
                12 => [
                    'name' => 'Souhane',
                    'code' => 917,
                ],
                13 => [
                    'name' => 'Meftah',
                    'code' => 918,
                ],
                14 => [
                    'name' => 'Ouled Slama',
                    'code' => 919,
                ],
                15 => [
                    'name' => 'Boufarik',
                    'code' => 920,
                ],
                16 => [
                    'name' => 'Larbaa',
                    'code' => 921,
                ],
                17 => [
                    'name' => 'Oued Djer',
                    'code' => 922,
                ],
                18 => [
                    'name' => 'Beni Tamou',
                    'code' => 923,
                ],
                19 => [
                    'name' => 'Bouarfa',
                    'code' => 924,
                ],
                20 => [
                    'name' => 'Beni Mered',
                    'code' => 925,
                ],
                21 => [
                    'name' => 'Bougara',
                    'code' => 926,
                ],
                22 => [
                    'name' => 'Guerouaou',
                    'code' => 927,
                ],
                23 => [
                    'name' => 'Aïn Romana',
                    'code' => 928,
                ],
                24 => [
                    'name' => 'Djebabra',
                    'code' => 929,
                ],
            ],
            10 => [
                0 => [
                    'name' => 'Aïn Bessem',
                    'code' => 1001,
                ],
                1 => [
                    'name' => 'Hanif',
                    'code' => 1002,
                ],
                2 => [
                    'name' => 'Aghbalou',
                    'code' => 1003,
                ],
                3 => [
                    'name' => 'Aïn El Hadjar',
                    'code' => 1004,
                ],
                4 => [
                    'name' => 'Ahl El Ksar',
                    'code' => 1005,
                ],
                5 => [
                    'name' => 'Aïn Laloui',
                    'code' => 1006,
                ],
                6 => [
                    'name' => 'Ath Mansour',
                    'code' => 1007,
                ],
                7 => [
                    'name' => 'Aomar',
                    'code' => 1008,
                ],
                8 => [
                    'name' => 'Aïn El Turc',
                    'code' => 1009,
                ],
                9 => [
                    'name' => 'Aït Laziz',
                    'code' => 10010,
                ],
                10 => [
                    'name' => 'Bouderbala',
                    'code' => 1011,
                ],
                11 => [
                    'name' => 'Bechloul',
                    'code' => 1012,
                ],
                12 => [
                    'name' => 'Bir Ghbalou',
                    'code' => 1013,
                ],
                13 => [
                    'name' => 'Boukram',
                    'code' => 1014,
                ],
                14 => [
                    'name' => 'Bordj Okhriss',
                    'code' => 1015,
                ],
                15 => [
                    'name' => 'Bouira',
                    'code' => 1016,
                ],
                16 => [
                    'name' => 'Chorfa',
                    'code' => 1017,
                ],
                17 => [
                    'name' => 'Dechmia',
                    'code' => 1018,
                ],
                18 => [
                    'name' => 'Dirrah',
                    'code' => 1019,
                ],
                19 => [
                    'name' => 'Djebahia',
                    'code' => 1020,
                ],
                20 => [
                    'name' => 'El Hakimia',
                    'code' => 1021,
                ],
                21 => [
                    'name' => 'El Hachimia',
                    'code' => 1022,
                ],
                22 => [
                    'name' => 'El Adjiba',
                    'code' => 1023,
                ],
                23 => [
                    'name' => 'El Khabouzia',
                    'code' => 1024,
                ],
                24 => [
                    'name' => 'El Mokrani',
                    'code' => 1025,
                ],
                25 => [
                    'name' => 'El Asnam',
                    'code' => 1026,
                ],
                26 => [
                    'name' => 'Guerrouma',
                    'code' => 1027,
                ],
                27 => [
                    'name' => 'Haizer',
                    'code' => 1028,
                ],
                28 => [
                    'name' => 'Hadjera Zerga',
                    'code' => 1029,
                ],
                29 => [
                    'name' => 'Kadiria',
                    'code' => 1030,
                ],
                30 => [
                    'name' => 'Lakhdaria',
                    'code' => 1031,
                ],
                31 => [
                    'name' => 'M\'Chedallah',
                    'code' => 1032,
                ],
                32 => [
                    'name' => 'Mezdour',
                    'code' => 1033,
                ],
                33 => [
                    'name' => 'Maala',
                    'code' => 1034,
                ],
                34 => [
                    'name' => 'Maamora',
                    'code' => 1035,
                ],
                35 => [
                    'name' => 'Oued El Berdi',
                    'code' => 1036,
                ],
                36 => [
                    'name' => 'Ouled Rached',
                    'code' => 1037,
                ],
                37 => [
                    'name' => 'Raouraoua',
                    'code' => 1038,
                ],
                38 => [
                    'name' => 'Ridane',
                    'code' => 1039,
                ],
                39 => [
                    'name' => 'Saharidj',
                    'code' => 1040,
                ],
                40 => [
                    'name' => 'Sour El Ghouzlane',
                    'code' => 1041,
                ],
                41 => [
                    'name' => 'Souk El Khemis',
                    'code' => 1042,
                ],
                42 => [
                    'name' => 'Taguedit',
                    'code' => 1043,
                ],
                43 => [
                    'name' => 'Taghzout',
                    'code' => 1044,
                ],
                44 => [
                    'name' => 'Zbarbar',
                    'code' => 1045,
                ],
            ],
            11 => [
                0 => [
                    'name' => 'Tamanrasset',
                    'code' => 1101,
                ],
                1 => [
                    'name' => 'Abalessa',
                    'code' => 1102,
                ],
                2 => [
                    'name' => 'Idles',
                    'code' => 1105,
                ],
                3 => [
                    'name' => 'Tazrouk',
                    'code' => 1106,
                ],
                4 => [
                    'name' => 'In Amguel',
                    'code' => 1109,
                ],
            ],
            12 => [
                0 => [
                    'name' => 'Tébessa',
                    'code' => 1201,
                ],
                1 => [
                    'name' => 'Bir el-Ater',
                    'code' => 1202,
                ],
                2 => [
                    'name' => 'Cheria',
                    'code' => 1203,
                ],
                3 => [
                    'name' => 'Stah Guentis',
                    'code' => 1204,
                ],
                4 => [
                    'name' => 'El Aouinet',
                    'code' => 1205,
                ],
                5 => [
                    'name' => 'El Houidjbet',
                    'code' => 1206,
                ],
                6 => [
                    'name' => 'Safsaf El Ouesra',
                    'code' => 1207,
                ],
                7 => [
                    'name' => 'Hammamet',
                    'code' => 1208,
                ],
                8 => [
                    'name' => 'Negrine',
                    'code' => 1209,
                ],
                9 => [
                    'name' => 'Bir Mokkadem',
                    'code' => 1210,
                ],
                10 => [
                    'name' => 'El Kouif',
                    'code' => 1211,
                ],
                11 => [
                    'name' => 'Morsott',
                    'code' => 1212,
                ],
                12 => [
                    'name' => 'El Ogla',
                    'code' => 1213,
                ],
                13 => [
                    'name' => 'Bir Dheb',
                    'code' => 1214,
                ],
                14 => [
                    'name' => 'Ogla Melha',
                    'code' => 1215,
                ],
                15 => [
                    'name' => 'Guorriguer',
                    'code' => 1216,
                ],
                16 => [
                    'name' => 'Bekkaria',
                    'code' => 1217,
                ],
                17 => [
                    'name' => 'Boukhadra',
                    'code' => 1218,
                ],
                18 => [
                    'name' => 'Ouenza',
                    'code' => 1219,
                ],
                19 => [
                    'name' => 'El Ma Labiodh',
                    'code' => 1220,
                ],
                20 => [
                    'name' => 'Oum Ali',
                    'code' => 1221,
                ],
                21 => [
                    'name' => 'Tlidjene',
                    'code' => 1222,
                ],
                22 => [
                    'name' => 'Aïn Zerga',
                    'code' => 1223,
                ],
                23 => [
                    'name' => 'El Meridj',
                    'code' => 1224,
                ],
                24 => [
                    'name' => 'Boulhaf Dir',
                    'code' => 1225,
                ],
                25 => [
                    'name' => 'Bedjene',
                    'code' => 1226,
                ],
                26 => [
                    'name' => 'El Mezeraa',
                    'code' => 1227,
                ],
                27 => [
                    'name' => 'Ferkane',
                    'code' => 1228,
                ],
            ],
            13 => [
                0 => [
                    'name' => 'Tlemcen',
                    'code' => 1301,
                ],
                1 => [
                    'name' => 'Beni Mester',
                    'code' => 1302,
                ],
                2 => [
                    'name' => 'Aïn Tallout',
                    'code' => 1303,
                ],
                3 => [
                    'name' => 'Remchi',
                    'code' => 1304,
                ],
                4 => [
                    'name' => 'El Fehoul',
                    'code' => 1305,
                ],
                5 => [
                    'name' => 'Sabra',
                    'code' => 1306,
                ],
                6 => [
                    'name' => 'Ghazaouet',
                    'code' => 1307,
                ],
                7 => [
                    'name' => 'Souani',
                    'code' => 1308,
                ],
                8 => [
                    'name' => 'Djebala',
                    'code' => 1309,
                ],
                9 => [
                    'name' => 'El Gor',
                    'code' => 1310,
                ],
                10 => [
                    'name' => 'Oued Lakhdar',
                    'code' => 1311,
                ],
                11 => [
                    'name' => 'Aïn Fezza',
                    'code' => 1312,
                ],
                12 => [
                    'name' => 'Ouled Mimoun',
                    'code' => 1313,
                ],
                13 => [
                    'name' => 'Amieur',
                    'code' => 1314,
                ],
                14 => [
                    'name' => 'Aïn Youcef',
                    'code' => 1315,
                ],
                15 => [
                    'name' => 'Zenata',
                    'code' => 1316,
                ],
                16 => [
                    'name' => 'Beni Snous',
                    'code' => 1317,
                ],
                17 => [
                    'name' => 'Bab El Assa',
                    'code' => 1318,
                ],
                18 => [
                    'name' => 'Dar Yaghmouracene',
                    'code' => 1319,
                ],
                19 => [
                    'name' => 'Fellaoucene',
                    'code' => 1320,
                ],
                20 => [
                    'name' => 'Azails',
                    'code' => 1321,
                ],
                21 => [
                    'name' => 'Sebaa Chioukh',
                    'code' => 1322,
                ],
                22 => [
                    'name' => 'Terny Beni Hdiel',
                    'code' => 1323,
                ],
                23 => [
                    'name' => 'Bensekrane',
                    'code' => 1324,
                ],
                24 => [
                    'name' => 'Aïn Nehala',
                    'code' => 1325,
                ],
                25 => [
                    'name' => 'Hennaya',
                    'code' => 1326,
                ],
                26 => [
                    'name' => 'Maghnia',
                    'code' => 1327,
                ],
                27 => [
                    'name' => 'Hammam Boughrara',
                    'code' => 1328,
                ],
                28 => [
                    'name' => 'Souahlia',
                    'code' => 1329,
                ],
                29 => [
                    'name' => 'MSirda Fouaga',
                    'code' => 1330,
                ],
                30 => [
                    'name' => 'Aïn Fetah',
                    'code' => 1331,
                ],
                31 => [
                    'name' => 'El Aricha',
                    'code' => 1332,
                ],
                32 => [
                    'name' => 'Souk Tlata',
                    'code' => 1333,
                ],
                33 => [
                    'name' => 'Sidi Abdelli',
                    'code' => 1334,
                ],
                34 => [
                    'name' => 'Sebdou',
                    'code' => 1335,
                ],
                35 => [
                    'name' => 'Beni Ouarsous',
                    'code' => 1336,
                ],
                36 => [
                    'name' => 'Sidi Medjahed',
                    'code' => 1337,
                ],
                37 => [
                    'name' => 'Beni Boussaid',
                    'code' => 1338,
                ],
                38 => [
                    'name' => 'Marsa Ben M\'Hidi',
                    'code' => 1339,
                ],
                39 => [
                    'name' => 'Nedroma',
                    'code' => 1340,
                ],
                40 => [
                    'name' => 'Sidi Djillali',
                    'code' => 1341,
                ],
                41 => [
                    'name' => 'Beni Bahdel',
                    'code' => 1342,
                ],
                42 => [
                    'name' => 'El Bouihi',
                    'code' => 1343,
                ],
                43 => [
                    'name' => 'Honaïne',
                    'code' => 1344,
                ],
                44 => [
                    'name' => 'Tienet',
                    'code' => 1345,
                ],
                45 => [
                    'name' => 'Ouled Riyah',
                    'code' => 1346,
                ],
                46 => [
                    'name' => 'Bouhlou',
                    'code' => 1347,
                ],
                47 => [
                    'name' => 'Beni Khellad',
                    'code' => 1348,
                ],
                48 => [
                    'name' => 'Aïn Ghoraba',
                    'code' => 1349,
                ],
                49 => [
                    'name' => 'Chetouane',
                    'code' => 1350,
                ],
                50 => [
                    'name' => 'Mansourah',
                    'code' => 1351,
                ],
                51 => [
                    'name' => 'Beni Semiel',
                    'code' => 1352,
                ],
                52 => [
                    'name' => 'Aïn Kebira',
                    'code' => 1353,
                ],
            ],
            14 => [
                0 => [
                    'name' => 'Aïn Bouchekif',
                    'code' => 1401,
                ],
                1 => [
                    'name' => 'Aïn Deheb',
                    'code' => 1402,
                ],
                2 => [
                    'name' => 'Aïn El Hadid',
                    'code' => 1403,
                ],
                3 => [
                    'name' => 'Aïn Kermes',
                    'code' => 1404,
                ],
                4 => [
                    'name' => 'Aïn Dzarit',
                    'code' => 1405,
                ],
                5 => [
                    'name' => 'Bougara',
                    'code' => 1406,
                ],
                6 => [
                    'name' => 'Chehaima',
                    'code' => 1407,
                ],
                7 => [
                    'name' => 'Dahmouni',
                    'code' => 1408,
                ],
                8 => [
                    'name' => 'Djebilet Rosfa',
                    'code' => 1409,
                ],
                9 => [
                    'name' => 'Djillali Ben Amar',
                    'code' => 14010,
                ],
                10 => [
                    'name' => 'Faidja',
                    'code' => 1411,
                ],
                11 => [
                    'name' => 'Frenda',
                    'code' => 1412,
                ],
                12 => [
                    'name' => 'Guertoufa',
                    'code' => 1413,
                ],
                13 => [
                    'name' => 'Hamadia',
                    'code' => 1414,
                ],
                14 => [
                    'name' => 'Ksar Chellala',
                    'code' => 1415,
                ],
                15 => [
                    'name' => 'Madna',
                    'code' => 1416,
                ],
                16 => [
                    'name' => 'Mahdia',
                    'code' => 1417,
                ],
                17 => [
                    'name' => 'Mechraa Safa',
                    'code' => 1418,
                ],
                18 => [
                    'name' => 'Medrissa',
                    'code' => 1419,
                ],
                19 => [
                    'name' => 'Medroussa',
                    'code' => 1420,
                ],
                20 => [
                    'name' => 'Meghila',
                    'code' => 1421,
                ],
                21 => [
                    'name' => 'Mellakou',
                    'code' => 1422,
                ],
                22 => [
                    'name' => 'Nadorah',
                    'code' => 1423,
                ],
                23 => [
                    'name' => 'Naima',
                    'code' => 1424,
                ],
                24 => [
                    'name' => 'Oued Lilli',
                    'code' => 1425,
                ],
                25 => [
                    'name' => 'Rahouia',
                    'code' => 1426,
                ],
                26 => [
                    'name' => 'Rechaïga',
                    'code' => 1427,
                ],
                27 => [
                    'name' => 'Sebaïne',
                    'code' => 1428,
                ],
                28 => [
                    'name' => 'Sebt',
                    'code' => 1429,
                ],
                29 => [
                    'name' => 'Serghine',
                    'code' => 1430,
                ],
                30 => [
                    'name' => 'Si Abdelghani',
                    'code' => 1431,
                ],
                31 => [
                    'name' => 'Sidi Abderahmane',
                    'code' => 1432,
                ],
                32 => [
                    'name' => 'Sidi Ali Mellal',
                    'code' => 1433,
                ],
                33 => [
                    'name' => 'Sidi Bakhti',
                    'code' => 1434,
                ],
                34 => [
                    'name' => 'Sidi Hosni',
                    'code' => 1435,
                ],
                35 => [
                    'name' => 'Sougueur',
                    'code' => 1436,
                ],
                36 => [
                    'name' => 'Tagdemt',
                    'code' => 1437,
                ],
                37 => [
                    'name' => 'Takhemaret',
                    'code' => 1438,
                ],
                38 => [
                    'name' => 'Tiaret',
                    'code' => 1439,
                ],
                39 => [
                    'name' => 'Tidda',
                    'code' => 1440,
                ],
                40 => [
                    'name' => 'Tousnina',
                    'code' => 1441,
                ],
                41 => [
                    'name' => 'Zmalet El Emir Abdelkader',
                    'code' => 1442,
                ],
            ],
            15 => [
                0 => [
                    'name' => 'Tizi Ouzou',
                    'code' => 1501,
                ],
                1 => [
                    'name' => 'Ain El Hammam',
                    'code' => 1502,
                ],
                2 => [
                    'name' => 'Akbil',
                    'code' => 1503,
                ],
                3 => [
                    'name' => 'Freha',
                    'code' => 1504,
                ],
                4 => [
                    'name' => 'Souamaâ',
                    'code' => 1505,
                ],
                5 => [
                    'name' => 'Mechtras',
                    'code' => 1506,
                ],
                6 => [
                    'name' => 'Irdjen',
                    'code' => 1507,
                ],
                7 => [
                    'name' => 'Timizart',
                    'code' => 1508,
                ],
                8 => [
                    'name' => 'Makouda',
                    'code' => 1509,
                ],
                9 => [
                    'name' => 'Draâ El Mizan',
                    'code' => 1510,
                ],
                10 => [
                    'name' => 'Tizi Gheniff',
                    'code' => 1511,
                ],
                11 => [
                    'name' => 'Bounouh',
                    'code' => 1512,
                ],
                12 => [
                    'name' => 'Aït Chafâa',
                    'code' => 1513,
                ],
                13 => [
                    'name' => 'Frikat',
                    'code' => 1514,
                ],
                14 => [
                    'name' => 'Beni Aïssi',
                    'code' => 1515,
                ],
                15 => [
                    'name' => 'Aït Zmenzer',
                    'code' => 1516,
                ],
                16 => [
                    'name' => 'Iferhounène',
                    'code' => 1517,
                ],
                17 => [
                    'name' => 'Azazga',
                    'code' => 1518,
                ],
                18 => [
                    'name' => 'Illoula Oumalou',
                    'code' => 1519,
                ],
                19 => [
                    'name' => 'Yakouren',
                    'code' => 1520,
                ],
                20 => [
                    'name' => 'Larbaâ Nath Irathen',
                    'code' => 1521,
                ],
                21 => [
                    'name' => 'Tizi Rached',
                    'code' => 1522,
                ],
                22 => [
                    'name' => 'Zekri',
                    'code' => 1523,
                ],
                23 => [
                    'name' => 'Ouaguenoun',
                    'code' => 1524,
                ],
                24 => [
                    'name' => 'Aïn Zaouia',
                    'code' => 1525,
                ],
                25 => [
                    'name' => 'Imkiren',
                    'code' => 1526,
                ],
                26 => [
                    'name' => 'Aït Yahia',
                    'code' => 1527,
                ],
                27 => [
                    'name' => 'Aït Mahmoud',
                    'code' => 1528,
                ],
                28 => [
                    'name' => 'Mâatkas',
                    'code' => 1529,
                ],
                29 => [
                    'name' => 'Aït Boumahdi',
                    'code' => 1530,
                ],
                30 => [
                    'name' => 'Abi Youcef',
                    'code' => 1531,
                ],
                31 => [
                    'name' => 'Beni Douala',
                    'code' => 1532,
                ],
                32 => [
                    'name' => 'Illilten',
                    'code' => 1533,
                ],
                33 => [
                    'name' => 'Bouzeguène',
                    'code' => 1534,
                ],
                34 => [
                    'name' => 'Aït Aggouacha',
                    'code' => 1535,
                ],
                35 => [
                    'name' => 'Ouadhia',
                    'code' => 1536,
                ],
                36 => [
                    'name' => 'Azeffoun',
                    'code' => 1537,
                ],
                37 => [
                    'name' => 'Tigzirt',
                    'code' => 1538,
                ],
                38 => [
                    'name' => 'Aït Aïssa Mimoun',
                    'code' => 1539,
                ],
                39 => [
                    'name' => 'Boghni',
                    'code' => 1540,
                ],
                40 => [
                    'name' => 'Ifigha',
                    'code' => 1541,
                ],
                41 => [
                    'name' => 'Aït Oumalou',
                    'code' => 1542,
                ],
                42 => [
                    'name' => 'Tirmitine',
                    'code' => 1543,
                ],
                43 => [
                    'name' => 'Akerrou',
                    'code' => 1544,
                ],
                44 => [
                    'name' => 'Yatafen',
                    'code' => 1545,
                ],
                45 => [
                    'name' => 'Ath Zikki',
                    'code' => 1546,
                ],
                46 => [
                    'name' => 'Draâ Ben Khedda',
                    'code' => 1547,
                ],
                47 => [
                    'name' => 'Aït Ouacif',
                    'code' => 1548,
                ],
                48 => [
                    'name' => 'Idjeur',
                    'code' => 1549,
                ],
                49 => [
                    'name' => 'Mekla',
                    'code' => 1550,
                ],
                50 => [
                    'name' => 'Tizi N\'Tleta',
                    'code' => 1551,
                ],
                51 => [
                    'name' => 'Aït Yenni',
                    'code' => 1552,
                ],
                52 => [
                    'name' => 'Aghribs',
                    'code' => 1553,
                ],
                53 => [
                    'name' => 'Iflissen',
                    'code' => 1554,
                ],
                54 => [
                    'name' => 'Boudjima',
                    'code' => 1555,
                ],
                55 => [
                    'name' => 'Aït Yahia Moussa',
                    'code' => 1556,
                ],
                56 => [
                    'name' => 'Souk El Thenine',
                    'code' => 1557,
                ],
                57 => [
                    'name' => 'Aït Khellili',
                    'code' => 1558,
                ],
                58 => [
                    'name' => 'Sidi Namane',
                    'code' => 1559,
                ],
                59 => [
                    'name' => 'Iboudraren',
                    'code' => 1560,
                ],
                60 => [
                    'name' => 'Agouni Gueghrane',
                    'code' => 1561,
                ],
                61 => [
                    'name' => 'Mizrana',
                    'code' => 1562,
                ],
                62 => [
                    'name' => 'Imsouhel',
                    'code' => 1563,
                ],
                63 => [
                    'name' => 'Tadmaït',
                    'code' => 1564,
                ],
                64 => [
                    'name' => 'Aït Bouaddou',
                    'code' => 1565,
                ],
                65 => [
                    'name' => 'Assi Youcef',
                    'code' => 1566,
                ],
                66 => [
                    'name' => 'Aït Toudert',
                    'code' => 1567,
                ],
            ],
            16 => [
                [
                    'name' => 'Alger-Centre',
                    'code' => 1601,
                ],
                [
                    'name' => 'Sidi M\'Hamed',
                    'code' => 1602,
                ],
                [
                    'name' => 'El Madania',
                    'code' => 1603,
                ],
                [
                    'name' => 'Belouizdad',
                    'code' => 1604,
                ],
                [
                    'name' => 'Bab El Oued',
                    'code' => 1605,
                ],
                [
                    'name' => 'Bologhine',
                    'code' => 1606,
                ],
                [
                    'name' => 'Casbah',
                    'code' => 1607,
                ],
                [
                    'name' => 'Oued Koriche',
                    'code' => 1608,
                ],
                [
                    'name' => 'Bir Mourad Raïs',
                    'code' => 1609,
                ],
                [
                    'name' => 'El Biar',
                    'code' => 1610,
                ],
                [
                    'name' => 'Bouzareah',
                    'code' => 1611,
                ],
                [
                    'name' => 'Birkhadem',
                    'code' => 1612,
                ],
                [
                    'name' => 'El Harrach',
                    'code' => 1613,
                ],
                [
                    'name' => 'Baraki',
                    'code' => 1614,
                ],
                [
                    'name' => 'Oued Smar',
                    'code' => 1615,
                ],
                [
                    'name' => 'Bachdjerrah',
                    'code' => 1616,
                ],
                [
                    'name' => 'Hussein Dey',
                    'code' => 1617,
                ],
                [
                    'name' => 'Kouba',
                    'code' => 1618,
                ],
                [
                    'name' => 'Bourouba',
                    'code' => 1619,
                ],
                [
                    'name' => 'Dar El Beïda',
                    'code' => 1620,
                ],
                [
                    'name' => 'Bab Ezzouar',
                    'code' => 1621,
                ],
                [
                    'name' => 'Ben Aknoun',
                    'code' => 1622,
                ],
                [
                    'name' => 'Dely Ibrahim',
                    'code' => 1623,
                ],
                [
                    'name' => 'El Hammamet',
                    'code' => 1624,
                ],
                [
                    'name' => 'Raïs Hamidou',
                    'code' => 1625,
                ],
                [
                    'name' => 'Djasr Kasentina',
                    'code' => 1626,
                ],
                [
                    'name' => 'El Mouradia',
                    'code' => 1627,
                ],
                [
                    'name' => 'Hydra',
                    'code' => 1628,
                ],
                [
                    'name' => 'Mohammadia',
                    'code' => 1629,
                ],
                [
                    'name' => 'Bordj El Kiffan',
                    'code' => 1630,
                ],
                [
                    'name' => 'El Magharia',
                    'code' => 1631,
                ],
                [
                    'name' => 'Beni Messous',
                    'code' => 1632,
                ],
                [
                    'name' => 'Les Eucalyptus',
                    'code' => 1633,
                ],
                [
                    'name' => 'Birtouta',
                    'code' => 1634,
                ],
                [
                    'name' => 'Tessala El Merdja',
                    'code' => 1635,
                ],
                [
                    'name' => 'Ouled Chebel',
                    'code' => 1636,
                ],
                [
                    'name' => 'Sidi Moussa',
                    'code' => 1637,
                ],
                [
                    'name' => 'Aïn Taya',
                    'code' => 1638,
                ],
                [
                    'name' => 'Bordj El Bahri',
                    'code' => 1639,
                ],
                [
                    'name' => 'El Marsa',
                    'code' => 1640,
                ],
                [
                    'name' => 'H\'raoua',
                    'code' => 1641,
                ],
                [
                    'name' => 'Rouïba',
                    'code' => 1642,
                ],
                [
                    'name' => 'Reghaïa',
                    'code' => 1643,
                ],
                [
                    'name' => 'Aïn Benian',
                    'code' => 1644,
                ],
                [
                    'name' => 'Staoueli',
                    'code' => 1645,
                ],
                [
                    'name' => 'Zeralda',
                    'code' => 1646,
                ],
                [
                    'name' => 'Mahelma',
                    'code' => 1647,
                ],
                [
                    'name' => 'Rahmania',
                    'code' => 1648,
                ],
                [
                    'name' => 'Souidania',
                    'code' => 1649,
                ],
                [
                    'name' => 'Cheraga',
                    'code' => 1650,
                ],
                [
                    'name' => 'Ouled Fayet',
                    'code' => 1651,
                ],
                [
                    'name' => 'El Achour',
                    'code' => 1652,
                ],
                [
                    'name' => 'Draria',
                    'code' => 1653,
                ],
                [
                    'name' => 'Douera',
                    'code' => 1654,
                ],
                [
                    'name' => 'Baba Hassen',
                    'code' => 1655,
                ],
                [
                    'name' => 'Khraicia',
                    'code' => 1656,
                ],
                [
                    'name' => 'Saoula',
                    'code' => 1657,
                ],

            ],
            17 => [
                0 => [
                    'name' => 'Aïn Chouhada',
                    'code' => 1701,
                ],
                1 => [
                    'name' => 'Aïn El Ibel',
                    'code' => 1702,
                ],
                2 => [
                    'name' => 'Aïn Feka',
                    'code' => 1703,
                ],
                3 => [
                    'name' => 'Aïn Maabed',
                    'code' => 1704,
                ],
                4 => [
                    'name' => 'Aïn Oussara',
                    'code' => 1705,
                ],
                5 => [
                    'name' => 'Amourah',
                    'code' => 1706,
                ],
                6 => [
                    'name' => 'Benhar',
                    'code' => 1707,
                ],
                7 => [
                    'name' => 'Beni Yagoub',
                    'code' => 1708,
                ],
                8 => [
                    'name' => 'Birine',
                    'code' => 1709,
                ],
                9 => [
                    'name' => 'Bouira Lahdab',
                    'code' => 17010,
                ],
                10 => [
                    'name' => 'Charef',
                    'code' => 1711,
                ],
                11 => [
                    'name' => 'Dar Chioukh',
                    'code' => 1712,
                ],
                12 => [
                    'name' => 'Deldoul',
                    'code' => 1713,
                ],
                13 => [
                    'name' => 'Djelfa',
                    'code' => 1714,
                ],
                14 => [
                    'name' => 'Douis',
                    'code' => 1715,
                ],
                15 => [
                    'name' => 'El Guedid',
                    'code' => 1716,
                ],
                16 => [
                    'name' => 'El Idrissia',
                    'code' => 1717,
                ],
                17 => [
                    'name' => 'El Khemis',
                    'code' => 1718,
                ],
                18 => [
                    'name' => 'Faidh El Botma',
                    'code' => 1719,
                ],
                19 => [
                    'name' => 'Guernini',
                    'code' => 1720,
                ],
                20 => [
                    'name' => 'Guettara',
                    'code' => 1721,
                ],
                21 => [
                    'name' => 'Had-Sahary',
                    'code' => 1722,
                ],
                22 => [
                    'name' => 'Hassi Bahbah',
                    'code' => 1723,
                ],
                23 => [
                    'name' => 'Hassi El Euch',
                    'code' => 1724,
                ],
                24 => [
                    'name' => 'Hassi Fedoul',
                    'code' => 1725,
                ],
                25 => [
                    'name' => 'Messaad',
                    'code' => 1726,
                ],
                26 => [
                    'name' => 'M\'Liliha',
                    'code' => 1727,
                ],
                27 => [
                    'name' => 'Moudjebara',
                    'code' => 1728,
                ],
                28 => [
                    'name' => 'Oum Laadham',
                    'code' => 1729,
                ],
                29 => [
                    'name' => 'Sed Rahal',
                    'code' => 1730,
                ],
                30 => [
                    'name' => 'Selmana',
                    'code' => 1731,
                ],
                31 => [
                    'name' => 'Sidi Baizid',
                    'code' => 1732,
                ],
                32 => [
                    'name' => 'Sidi Ladjel',
                    'code' => 1733,
                ],
                33 => [
                    'name' => 'Tadmit',
                    'code' => 1734,
                ],
                34 => [
                    'name' => 'Zaafrane',
                    'code' => 1735,
                ],
                35 => [
                    'name' => 'Zaccar',
                    'code' => 1736,
                ],
            ],
            18 => [
                0 => [
                    'name' => 'Jijel',
                    'code' => 1801,
                ],
                1 => [
                    'name' => 'Eraguene',
                    'code' => 1802,
                ],
                2 => [
                    'name' => 'El Aouana',
                    'code' => 1803,
                ],
                3 => [
                    'name' => 'Ziama Mansouriah',
                    'code' => 1804,
                ],
                4 => [
                    'name' => 'Taher',
                    'code' => 1805,
                ],
                5 => [
                    'name' => 'Emir Abdelkader',
                    'code' => 1806,
                ],
                6 => [
                    'name' => 'Chekfa',
                    'code' => 1807,
                ],
                7 => [
                    'name' => 'Chahna',
                    'code' => 1808,
                ],
                8 => [
                    'name' => 'El Milia',
                    'code' => 1809,
                ],
                9 => [
                    'name' => 'Sidi Maarouf',
                    'code' => 1810,
                ],
                10 => [
                    'name' => 'Settara',
                    'code' => 1811,
                ],
                11 => [
                    'name' => 'El Ancer',
                    'code' => 1812,
                ],
                12 => [
                    'name' => 'Sidi Abdelaziz',
                    'code' => 1813,
                ],
                13 => [
                    'name' => 'Kaous',
                    'code' => 1814,
                ],
                14 => [
                    'name' => 'Ghebala',
                    'code' => 1815,
                ],
                15 => [
                    'name' => 'Bouraoui Belhadef',
                    'code' => 1816,
                ],
                16 => [
                    'name' => 'Djimla',
                    'code' => 1817,
                ],
                17 => [
                    'name' => 'Selma Benziada',
                    'code' => 1818,
                ],
                18 => [
                    'name' => 'Boucif Ouled Askeur',
                    'code' => 1819,
                ],
                19 => [
                    'name' => 'El Kennar Nouchfi',
                    'code' => 1820,
                ],
                20 => [
                    'name' => 'Ouled Yahia Khedrouche',
                    'code' => 1821,
                ],
                21 => [
                    'name' => 'Boudriaa Ben Yadjis',
                    'code' => 1822,
                ],
                22 => [
                    'name' => 'Kheïri Oued Adjoul',
                    'code' => 1823,
                ],
                23 => [
                    'name' => 'Texenna',
                    'code' => 1824,
                ],
                24 => [
                    'name' => 'Djemaa Beni Habibi',
                    'code' => 1825,
                ],
                25 => [
                    'name' => 'Bordj Tahar',
                    'code' => 1826,
                ],
                26 => [
                    'name' => 'Ouled Rabah',
                    'code' => 1827,
                ],
                27 => [
                    'name' => 'Ouadjana',
                    'code' => 1828,
                ],
            ],
            19 => [
                0 => [
                    'name' => 'Aïn Abessa',
                    'code' => 1901,
                ],
                1 => [
                    'name' => 'Aïn Arnat',
                    'code' => 1902,
                ],
                2 => [
                    'name' => 'Aïn Azel',
                    'code' => 1903,
                ],
                3 => [
                    'name' => 'Aïn El Kebira',
                    'code' => 1904,
                ],
                4 => [
                    'name' => 'Aïn Lahdjar',
                    'code' => 1905,
                ],
                5 => [
                    'name' => 'Aïn Legradj',
                    'code' => 1906,
                ],
                6 => [
                    'name' => 'Aïn Oulmene',
                    'code' => 1907,
                ],
                7 => [
                    'name' => 'Aïn Roua',
                    'code' => 1908,
                ],
                8 => [
                    'name' => 'Aïn Sebt',
                    'code' => 1909,
                ],
                9 => [
                    'name' => 'Aït Naoual Mezada',
                    'code' => 19010,
                ],
                10 => [
                    'name' => 'Aït Tizi',
                    'code' => 1911,
                ],
                11 => [
                    'name' => 'Beni Ouartilene',
                    'code' => 1912,
                ],
                12 => [
                    'name' => 'Amoucha',
                    'code' => 1913,
                ],
                13 => [
                    'name' => 'Babor',
                    'code' => 1914,
                ],
                14 => [
                    'name' => 'Bazer Sakhra',
                    'code' => 1915,
                ],
                15 => [
                    'name' => 'Beidha Bordj',
                    'code' => 1916,
                ],
                16 => [
                    'name' => 'Belaa',
                    'code' => 1917,
                ],
                17 => [
                    'name' => 'Beni Aziz',
                    'code' => 1918,
                ],
                18 => [
                    'name' => 'Beni Chebana',
                    'code' => 1919,
                ],
                19 => [
                    'name' => 'Beni Fouda',
                    'code' => 1920,
                ],
                20 => [
                    'name' => 'Beni Hocine',
                    'code' => 1921,
                ],
                21 => [
                    'name' => 'Beni Mouhli',
                    'code' => 1922,
                ],
                22 => [
                    'name' => 'Bir El Arch',
                    'code' => 1923,
                ],
                23 => [
                    'name' => 'Bir Haddada',
                    'code' => 1924,
                ],
                24 => [
                    'name' => 'Bouandas',
                    'code' => 1925,
                ],
                25 => [
                    'name' => 'Bougaa',
                    'code' => 1926,
                ],
                26 => [
                    'name' => 'Bousselam',
                    'code' => 1927,
                ],
                27 => [
                    'name' => 'Boutaleb',
                    'code' => 1928,
                ],
                28 => [
                    'name' => 'Dehamcha',
                    'code' => 1929,
                ],
                29 => [
                    'name' => 'Djemila',
                    'code' => 1930,
                ],
                30 => [
                    'name' => 'Draa Kebila',
                    'code' => 1931,
                ],
                31 => [
                    'name' => 'El Eulma',
                    'code' => 1932,
                ],
                32 => [
                    'name' => 'El Ouldja',
                    'code' => 1933,
                ],
                33 => [
                    'name' => 'El Ouricia',
                    'code' => 1934,
                ],
                34 => [
                    'name' => 'Guellal',
                    'code' => 1935,
                ],
                35 => [
                    'name' => 'Guelta Zerka',
                    'code' => 1936,
                ],
                36 => [
                    'name' => 'Guenzet',
                    'code' => 1937,
                ],
                37 => [
                    'name' => 'Guidjel',
                    'code' => 1938,
                ],
                38 => [
                    'name' => 'Hamma',
                    'code' => 1939,
                ],
                39 => [
                    'name' => 'Hammam Guergour',
                    'code' => 1940,
                ],
                40 => [
                    'name' => 'Hammam Soukhna',
                    'code' => 1941,
                ],
                41 => [
                    'name' => 'Harbil',
                    'code' => 1942,
                ],
                42 => [
                    'name' => 'Ksar El Abtal',
                    'code' => 1943,
                ],
                43 => [
                    'name' => 'Maaouia',
                    'code' => 1944,
                ],
                44 => [
                    'name' => 'Maoklane',
                    'code' => 1945,
                ],
                45 => [
                    'name' => 'Mezloug',
                    'code' => 1946,
                ],
                46 => [
                    'name' => 'Oued El Barad',
                    'code' => 1947,
                ],
                47 => [
                    'name' => 'Ouled Addouane',
                    'code' => 1948,
                ],
                48 => [
                    'name' => 'Ouled Sabor',
                    'code' => 1949,
                ],
                49 => [
                    'name' => 'Ouled Si Ahmed',
                    'code' => 1950,
                ],
                50 => [
                    'name' => 'Ouled Tebben',
                    'code' => 1951,
                ],
                51 => [
                    'name' => 'Rasfa',
                    'code' => 1952,
                ],
                52 => [
                    'name' => 'Salah Bey',
                    'code' => 1953,
                ],
                53 => [
                    'name' => 'Serdj El Ghoul',
                    'code' => 1954,
                ],
                54 => [
                    'name' => 'Sétif',
                    'code' => 1955,
                ],
                55 => [
                    'name' => 'Tachouda',
                    'code' => 1956,
                ],
                56 => [
                    'name' => 'Talaifacene',
                    'code' => 1957,
                ],
                57 => [
                    'name' => 'Taya',
                    'code' => 1958,
                ],
                58 => [
                    'name' => 'Tella',
                    'code' => 1959,
                ],
                59 => [
                    'name' => 'Tizi N\'Bechar',
                    'code' => 1960,
                ],
            ],
            20 => [
                0 => [
                    'name' => 'Aïn El Hadjar',
                    'code' => 2001,
                ],
                1 => [
                    'name' => 'Aïn Sekhouna',
                    'code' => 2002,
                ],
                2 => [
                    'name' => 'Aïn Soltane',
                    'code' => 2003,
                ],
                3 => [
                    'name' => 'Doui Thabet',
                    'code' => 2004,
                ],
                4 => [
                    'name' => 'El Hassasna',
                    'code' => 2005,
                ],
                5 => [
                    'name' => 'Hounet',
                    'code' => 2006,
                ],
                6 => [
                    'name' => 'Maamora',
                    'code' => 2007,
                ],
                7 => [
                    'name' => 'Moulay Larbi',
                    'code' => 2008,
                ],
                8 => [
                    'name' => 'Ouled Brahim',
                    'code' => 2009,
                ],
                9 => [
                    'name' => 'Ouled Khaled',
                    'code' => 20010,
                ],
                10 => [
                    'name' => 'Saïda',
                    'code' => 2011,
                ],
                11 => [
                    'name' => 'Sidi Ahmed',
                    'code' => 2012,
                ],
                12 => [
                    'name' => 'Sidi Amar',
                    'code' => 2013,
                ],
                13 => [
                    'name' => 'Sidi Boubekeur',
                    'code' => 2014,
                ],
                14 => [
                    'name' => 'Tircine',
                    'code' => 2015,
                ],
                15 => [
                    'name' => 'Youb',
                    'code' => 2016,
                ],
            ],
            21 => [
                0 => [
                    'name' => 'Aïn Bouziane',
                    'code' => 2101,
                ],
                1 => [
                    'name' => 'Aïn Charchar',
                    'code' => 2102,
                ],
                2 => [
                    'name' => 'Aïn Kechra',
                    'code' => 2103,
                ],
                3 => [
                    'name' => 'Aïn Zouit',
                    'code' => 2104,
                ],
                4 => [
                    'name' => 'Azzaba',
                    'code' => 2105,
                ],
                5 => [
                    'name' => 'Bekkouche Lakhdar',
                    'code' => 2106,
                ],
                6 => [
                    'name' => 'Bin El Ouiden',
                    'code' => 2107,
                ],
                7 => [
                    'name' => 'Ben Azzouz',
                    'code' => 2108,
                ],
                8 => [
                    'name' => 'Beni Bechir',
                    'code' => 2109,
                ],
                9 => [
                    'name' => 'Beni Oulbane',
                    'code' => 21010,
                ],
                10 => [
                    'name' => 'Beni Zid',
                    'code' => 2111,
                ],
                11 => [
                    'name' => 'Bouchtata',
                    'code' => 2112,
                ],
                12 => [
                    'name' => 'Cheraia',
                    'code' => 2113,
                ],
                13 => [
                    'name' => 'Collo',
                    'code' => 2114,
                ],
                14 => [
                    'name' => 'Djendel Saadi Mohamed',
                    'code' => 2115,
                ],
                15 => [
                    'name' => 'El Ghedir',
                    'code' => 2116,
                ],
                16 => [
                    'name' => 'El Hadaiek',
                    'code' => 2117,
                ],
                17 => [
                    'name' => 'El Harrouch',
                    'code' => 2118,
                ],
                18 => [
                    'name' => 'El Marsa',
                    'code' => 2119,
                ],
                19 => [
                    'name' => 'Emdjez Edchich',
                    'code' => 2120,
                ],
                20 => [
                    'name' => 'Es Sebt',
                    'code' => 2121,
                ],
                21 => [
                    'name' => 'Filfila',
                    'code' => 2122,
                ],
                22 => [
                    'name' => 'Hamadi Krouma',
                    'code' => 2123,
                ],
                23 => [
                    'name' => 'Kanoua',
                    'code' => 2124,
                ],
                24 => [
                    'name' => 'Kerkera',
                    'code' => 2125,
                ],
                25 => [
                    'name' => 'Kheneg Mayoum',
                    'code' => 2126,
                ],
                26 => [
                    'name' => 'Oued Zehour',
                    'code' => 2127,
                ],
                27 => [
                    'name' => 'Ouldja Boulballout',
                    'code' => 2128,
                ],
                28 => [
                    'name' => 'Ouled Attia',
                    'code' => 2129,
                ],
                29 => [
                    'name' => 'Ouled Hbaba',
                    'code' => 2130,
                ],
                30 => [
                    'name' => 'Oum Toub',
                    'code' => 2131,
                ],
                31 => [
                    'name' => 'Ramdane Djamel',
                    'code' => 2132,
                ],
                32 => [
                    'name' => 'Salah Bouchaour',
                    'code' => 2133,
                ],
                33 => [
                    'name' => 'Sidi Mezghiche',
                    'code' => 2134,
                ],
                34 => [
                    'name' => 'Skikda',
                    'code' => 2135,
                ],
                35 => [
                    'name' => 'Tamalous',
                    'code' => 2136,
                ],
                36 => [
                    'name' => 'Zerdaza',
                    'code' => 2137,
                ],
                37 => [
                    'name' => 'Zitouna',
                    'code' => 2138,
                ],
            ],
            22 => [
                0 => [
                    'name' => 'Aïn Adden',
                    'code' => 2201,
                ],
                1 => [
                    'name' => 'Aïn El Berd',
                    'code' => 2202,
                ],
                2 => [
                    'name' => 'Aïn Kada',
                    'code' => 2203,
                ],
                3 => [
                    'name' => 'Aïn Thrid',
                    'code' => 2204,
                ],
                4 => [
                    'name' => 'Aïn Tindamine',
                    'code' => 2205,
                ],
                5 => [
                    'name' => 'Amarnas',
                    'code' => 2206,
                ],
                6 => [
                    'name' => 'Badredine El Mokrani',
                    'code' => 2207,
                ],
                7 => [
                    'name' => 'Belarbi',
                    'code' => 2208,
                ],
                8 => [
                    'name' => 'Ben Badis',
                    'code' => 2209,
                ],
                9 => [
                    'name' => 'Benachiba Chelia',
                    'code' => 22010,
                ],
                10 => [
                    'name' => 'Bir El Hammam',
                    'code' => 2211,
                ],
                11 => [
                    'name' => 'Boudjebaa El Bordj',
                    'code' => 2212,
                ],
                12 => [
                    'name' => 'Boukhanafis',
                    'code' => 2213,
                ],
                13 => [
                    'name' => 'Chettouane Belaila',
                    'code' => 2214,
                ],
                14 => [
                    'name' => 'Dhaya',
                    'code' => 2215,
                ],
                15 => [
                    'name' => 'El Haçaiba',
                    'code' => 2216,
                ],
                16 => [
                    'name' => 'Hassi Dahou',
                    'code' => 2217,
                ],
                17 => [
                    'name' => 'Hassi Zehana',
                    'code' => 2218,
                ],
                18 => [
                    'name' => 'Lamtar',
                    'code' => 2219,
                ],
                19 => [
                    'name' => 'Makedra',
                    'code' => 2220,
                ],
                20 => [
                    'name' => 'Marhoum',
                    'code' => 2221,
                ],
                21 => [
                    'name' => 'M\'Cid',
                    'code' => 2222,
                ],
                22 => [
                    'name' => 'Merine',
                    'code' => 2223,
                ],
                23 => [
                    'name' => 'Mezaourou',
                    'code' => 2224,
                ],
                24 => [
                    'name' => 'Mostefa Ben Brahim',
                    'code' => 2225,
                ],
                25 => [
                    'name' => 'Moulay Slissen',
                    'code' => 2226,
                ],
                26 => [
                    'name' => 'Oued Sebaa',
                    'code' => 2227,
                ],
                27 => [
                    'name' => 'Oued Sefioun',
                    'code' => 2228,
                ],
                28 => [
                    'name' => 'Oued Taourira',
                    'code' => 2229,
                ],
                29 => [
                    'name' => 'Ras El Ma',
                    'code' => 2230,
                ],
                30 => [
                    'name' => 'Redjem Demouche',
                    'code' => 2231,
                ],
                31 => [
                    'name' => 'Sehala Thaoura',
                    'code' => 2232,
                ],
                32 => [
                    'name' => 'Sfisef',
                    'code' => 2233,
                ],
                33 => [
                    'name' => 'Sidi Ali Benyoub',
                    'code' => 2234,
                ],
                34 => [
                    'name' => 'Sidi Ali Boussidi',
                    'code' => 2235,
                ],
                35 => [
                    'name' => 'Sidi Bel Abbes',
                    'code' => 2236,
                ],
                36 => [
                    'name' => 'Sidi Brahim',
                    'code' => 2237,
                ],
                37 => [
                    'name' => 'Sidi Chaib',
                    'code' => 2238,
                ],
                38 => [
                    'name' => 'Sidi Daho des Zairs',
                    'code' => 2239,
                ],
                39 => [
                    'name' => 'Sidi Hamadouche',
                    'code' => 2240,
                ],
                40 => [
                    'name' => 'Sidi Khaled',
                    'code' => 2241,
                ],
                41 => [
                    'name' => 'Sidi Lahcene',
                    'code' => 2242,
                ],
                42 => [
                    'name' => 'Sidi Yacoub',
                    'code' => 2243,
                ],
                43 => [
                    'name' => 'Tabia',
                    'code' => 2244,
                ],
                44 => [
                    'name' => 'Tafissour',
                    'code' => 2245,
                ],
                45 => [
                    'name' => 'Taoudmout',
                    'code' => 2246,
                ],
                46 => [
                    'name' => 'Teghalimet',
                    'code' => 2247,
                ],
                47 => [
                    'name' => 'Telagh',
                    'code' => 2248,
                ],
                48 => [
                    'name' => 'Tenira',
                    'code' => 2249,
                ],
                49 => [
                    'name' => 'Tessala',
                    'code' => 2250,
                ],
                50 => [
                    'name' => 'Tilmouni',
                    'code' => 2251,
                ],
                51 => [
                    'name' => 'Zerouala',
                    'code' => 2252,
                ],
            ],
            23 => [
                0 => [
                    'name' => 'Annaba',
                    'code' => 2301,
                ],
                1 => [
                    'name' => 'Berrahal',
                    'code' => 2302,
                ],
                2 => [
                    'name' => 'El Hadjar',
                    'code' => 2303,
                ],
                3 => [
                    'name' => 'Eulma',
                    'code' => 2304,
                ],
                4 => [
                    'name' => 'El Bouni',
                    'code' => 2305,
                ],
                5 => [
                    'name' => 'Oued El Aneb',
                    'code' => 2306,
                ],
                6 => [
                    'name' => 'Cheurfa',
                    'code' => 2307,
                ],
                7 => [
                    'name' => 'Seraïdi',
                    'code' => 2308,
                ],
                8 => [
                    'name' => 'Aïn Berda',
                    'code' => 2309,
                ],
                9 => [
                    'name' => 'Chetaïbi',
                    'code' => 2310,
                ],
                10 => [
                    'name' => 'Sidi Amar',
                    'code' => 2311,
                ],
                11 => [
                    'name' => 'Treat',
                    'code' => 2312,
                ],
            ],
            24 => [
                0 => [
                    'name' => 'Aïn Ben Beida',
                    'code' => 2401,
                ],
                1 => [
                    'name' => 'Aïn Larbi',
                    'code' => 2402,
                ],
                2 => [
                    'name' => 'Aïn Makhlouf',
                    'code' => 2403,
                ],
                3 => [
                    'name' => 'Aïn Reggada',
                    'code' => 2404,
                ],
                4 => [
                    'name' => 'Aïn Sandel',
                    'code' => 2405,
                ],
                5 => [
                    'name' => 'Belkheir',
                    'code' => 2406,
                ],
                6 => [
                    'name' => 'Ben Djerrah',
                    'code' => 2407,
                ],
                7 => [
                    'name' => 'Beni Mezline',
                    'code' => 2408,
                ],
                8 => [
                    'name' => 'Bordj Sabath',
                    'code' => 2409,
                ],
                9 => [
                    'name' => 'Bouhachana',
                    'code' => 24010,
                ],
                10 => [
                    'name' => 'Bouhamdane',
                    'code' => 2411,
                ],
                11 => [
                    'name' => 'Bouati Mahmoud',
                    'code' => 2412,
                ],
                12 => [
                    'name' => 'Bouchegouf',
                    'code' => 2413,
                ],
                13 => [
                    'name' => 'Boumahra Ahmed',
                    'code' => 2414,
                ],
                14 => [
                    'name' => 'Dahouara',
                    'code' => 2415,
                ],
                15 => [
                    'name' => 'Djeballah Khemissi',
                    'code' => 2416,
                ],
                16 => [
                    'name' => 'El Fedjoudj',
                    'code' => 2417,
                ],
                17 => [
                    'name' => 'Guellat Bou Sbaa',
                    'code' => 2418,
                ],
                18 => [
                    'name' => 'Guelma',
                    'code' => 2419,
                ],
                19 => [
                    'name' => 'Hammam Debagh',
                    'code' => 2420,
                ],
                20 => [
                    'name' => 'Hammam N\'Bail',
                    'code' => 2421,
                ],
                21 => [
                    'name' => 'Héliopolis',
                    'code' => 2422,
                ],
                22 => [
                    'name' => 'Houari Boumédiène',
                    'code' => 2423,
                ],
                23 => [
                    'name' => 'Khezarra',
                    'code' => 2424,
                ],
                24 => [
                    'name' => 'Medjez Amar',
                    'code' => 2425,
                ],
                25 => [
                    'name' => 'Medjez Sfa',
                    'code' => 2426,
                ],
                26 => [
                    'name' => 'Nechmaya',
                    'code' => 2427,
                ],
                27 => [
                    'name' => 'Oued Cheham',
                    'code' => 2428,
                ],
                28 => [
                    'name' => 'Oued Fragha',
                    'code' => 2429,
                ],
                29 => [
                    'name' => 'Oued Zenati',
                    'code' => 2430,
                ],
                30 => [
                    'name' => 'Ras El Agba',
                    'code' => 2431,
                ],
                31 => [
                    'name' => 'Roknia',
                    'code' => 2432,
                ],
                32 => [
                    'name' => 'Sellaoua Announa',
                    'code' => 2433,
                ],
                33 => [
                    'name' => 'Tamlouka',
                    'code' => 2434,
                ],
            ],
            25 => [
                0 => [
                    'name' => 'Aïn Abid',
                    'code' => 2501,
                ],
                1 => [
                    'name' => 'Aïn Smara',
                    'code' => 2502,
                ],
                2 => [
                    'name' => 'Beni Hamiden',
                    'code' => 2503,
                ],
                3 => [
                    'name' => 'Constantine',
                    'code' => 2504,
                ],
                4 => [
                    'name' => 'Didouche Mourad',
                    'code' => 2505,
                ],
                5 => [
                    'name' => 'El Khroub',
                    'code' => 2506,
                ],
                6 => [
                    'name' => 'Hamma Bouziane',
                    'code' => 2507,
                ],
                7 => [
                    'name' => 'Ibn Badis',
                    'code' => 2508,
                ],
                8 => [
                    'name' => 'Ibn Ziad',
                    'code' => 2509,
                ],
                9 => [
                    'name' => 'Messaoud Boudjriou',
                    'code' => 25010,
                ],
                10 => [
                    'name' => 'Ouled Rahmoune',
                    'code' => 2511,
                ],
                11 => [
                    'name' => 'Zighoud Youcef',
                    'code' => 2512,
                ],
            ],
            26 => [
                0 => [
                    'name' => 'Aïn Boucif',
                    'code' => 2601,
                ],
                1 => [
                    'name' => 'Aïn Ouksir',
                    'code' => 2602,
                ],
                2 => [
                    'name' => 'Aissaouia',
                    'code' => 2603,
                ],
                3 => [
                    'name' => 'Aziz',
                    'code' => 2604,
                ],
                4 => [
                    'name' => 'Baata',
                    'code' => 2605,
                ],
                5 => [
                    'name' => 'Benchicao',
                    'code' => 2606,
                ],
                6 => [
                    'name' => 'Beni Slimane',
                    'code' => 2607,
                ],
                7 => [
                    'name' => 'Berrouaghia',
                    'code' => 2608,
                ],
                8 => [
                    'name' => 'Bir Ben Laabed',
                    'code' => 2609,
                ],
                9 => [
                    'name' => 'Boghar',
                    'code' => 26010,
                ],
                10 => [
                    'name' => 'Bou Aiche',
                    'code' => 2611,
                ],
                11 => [
                    'name' => 'Bouaichoune',
                    'code' => 2612,
                ],
                12 => [
                    'name' => 'Bouchrahil',
                    'code' => 2613,
                ],
                13 => [
                    'name' => 'Boughezoul',
                    'code' => 2614,
                ],
                14 => [
                    'name' => 'Bouskene',
                    'code' => 2615,
                ],
                15 => [
                    'name' => 'Chahbounia',
                    'code' => 2616,
                ],
                16 => [
                    'name' => 'Chellalet El Adhaoura',
                    'code' => 2617,
                ],
                17 => [
                    'name' => 'Cheniguel',
                    'code' => 2618,
                ],
                18 => [
                    'name' => 'Derrag',
                    'code' => 2619,
                ],
                19 => [
                    'name' => 'Deux Bassins',
                    'code' => 2620,
                ],
                20 => [
                    'name' => 'Djouab',
                    'code' => 2621,
                ],
                21 => [
                    'name' => 'Draa Essamar',
                    'code' => 2622,
                ],
                22 => [
                    'name' => 'El Azizia',
                    'code' => 2623,
                ],
                23 => [
                    'name' => 'El Guelb El Kebir',
                    'code' => 2624,
                ],
                24 => [
                    'name' => 'El Hamdania',
                    'code' => 2625,
                ],
                25 => [
                    'name' => 'El Omaria',
                    'code' => 2626,
                ],
                26 => [
                    'name' => 'El Ouinet',
                    'code' => 2627,
                ],
                27 => [
                    'name' => 'Hannacha',
                    'code' => 2628,
                ],
                28 => [
                    'name' => 'Kef Lakhdar',
                    'code' => 2629,
                ],
                29 => [
                    'name' => 'Khams Djouamaa',
                    'code' => 2630,
                ],
                30 => [
                    'name' => 'Ksar Boukhari',
                    'code' => 2631,
                ],
                31 => [
                    'name' => 'Meghraoua',
                    'code' => 2632,
                ],
                32 => [
                    'name' => 'Médéa',
                    'code' => 2633,
                ],
                33 => [
                    'name' => 'Moudjbar',
                    'code' => 2634,
                ],
                34 => [
                    'name' => 'Meftaha',
                    'code' => 2635,
                ],
                35 => [
                    'name' => 'Mezerana',
                    'code' => 2636,
                ],
                36 => [
                    'name' => 'Mihoub',
                    'code' => 2637,
                ],
                37 => [
                    'name' => 'Ouamri',
                    'code' => 2638,
                ],
                38 => [
                    'name' => 'Oued Harbil',
                    'code' => 2639,
                ],
                39 => [
                    'name' => 'Ouled Antar',
                    'code' => 2640,
                ],
                40 => [
                    'name' => 'Ouled Bouachra',
                    'code' => 2641,
                ],
                41 => [
                    'name' => 'Ouled Brahim',
                    'code' => 2642,
                ],
                42 => [
                    'name' => 'Ouled Deide',
                    'code' => 2643,
                ],
                43 => [
                    'name' => 'Ouled Hellal',
                    'code' => 2644,
                ],
                44 => [
                    'name' => 'Ouled Maaref',
                    'code' => 2645,
                ],
                45 => [
                    'name' => 'Oum El Djalil',
                    'code' => 2646,
                ],
                46 => [
                    'name' => 'Ouzera',
                    'code' => 2647,
                ],
                47 => [
                    'name' => 'Rebaia',
                    'code' => 2648,
                ],
                48 => [
                    'name' => 'Saneg',
                    'code' => 2649,
                ],
                49 => [
                    'name' => 'Sedraia',
                    'code' => 2650,
                ],
                50 => [
                    'name' => 'Seghouane',
                    'code' => 2651,
                ],
                51 => [
                    'name' => 'Si Mahdjoub',
                    'code' => 2652,
                ],
                52 => [
                    'name' => 'Sidi Damed',
                    'code' => 2653,
                ],
                53 => [
                    'name' => 'Sidi Errabia',
                    'code' => 2654,
                ],
                54 => [
                    'name' => 'Sidi Naamane',
                    'code' => 2655,
                ],
                55 => [
                    'name' => 'Sidi Zahar',
                    'code' => 2656,
                ],
                56 => [
                    'name' => 'Sidi Ziane',
                    'code' => 2657,
                ],
                57 => [
                    'name' => 'Souagui',
                    'code' => 2658,
                ],
                58 => [
                    'name' => 'Tablat',
                    'code' => 2659,
                ],
                59 => [
                    'name' => 'Tafraout',
                    'code' => 2660,
                ],
                60 => [
                    'name' => 'Tamesguida',
                    'code' => 2661,
                ],
                61 => [
                    'name' => 'Tizi Mahdi',
                    'code' => 2662,
                ],
                62 => [
                    'name' => 'Tlatet Eddouar',
                    'code' => 2663,
                ],
                63 => [
                    'name' => 'Zoubiria',
                    'code' => 2664,
                ],
            ],
            27 => [
                0 => [
                    'name' => 'Abdelmalek Ramdane',
                    'code' => 2701,
                ],
                1 => [
                    'name' => 'Achaacha',
                    'code' => 2702,
                ],
                2 => [
                    'name' => 'Aïn Boudinar',
                    'code' => 2703,
                ],
                3 => [
                    'name' => 'Aïn Nouissy',
                    'code' => 2704,
                ],
                4 => [
                    'name' => 'Aïn Sidi Cherif',
                    'code' => 2705,
                ],
                5 => [
                    'name' => 'Aïn Tedles',
                    'code' => 2706,
                ],
                6 => [
                    'name' => 'Blad Touahria',
                    'code' => 2707,
                ],
                7 => [
                    'name' => 'Bouguirat',
                    'code' => 2708,
                ],
                8 => [
                    'name' => 'El Hassiane',
                    'code' => 2709,
                ],
                9 => [
                    'name' => 'Fornaka',
                    'code' => 27010,
                ],
                10 => [
                    'name' => 'Hadjadj',
                    'code' => 2711,
                ],
                11 => [
                    'name' => 'Hassi Mameche',
                    'code' => 2712,
                ],
                12 => [
                    'name' => 'Khadra',
                    'code' => 2713,
                ],
                13 => [
                    'name' => 'Kheireddine',
                    'code' => 2714,
                ],
                14 => [
                    'name' => 'Mansourah',
                    'code' => 2715,
                ],
                15 => [
                    'name' => 'Mesra',
                    'code' => 2716,
                ],
                16 => [
                    'name' => 'Mazagran',
                    'code' => 2717,
                ],
                17 => [
                    'name' => 'Mostaganem',
                    'code' => 2718,
                ],
                18 => [
                    'name' => 'Nekmaria',
                    'code' => 2719,
                ],
                19 => [
                    'name' => 'Oued El Kheir',
                    'code' => 2720,
                ],
                20 => [
                    'name' => 'Ouled Boughalem',
                    'code' => 2721,
                ],
                21 => [
                    'name' => 'Ouled Maallah',
                    'code' => 2722,
                ],
                22 => [
                    'name' => 'Safsaf',
                    'code' => 2723,
                ],
                23 => [
                    'name' => 'Sayada',
                    'code' => 2724,
                ],
                24 => [
                    'name' => 'Sidi Ali',
                    'code' => 2725,
                ],
                25 => [
                    'name' => 'Sidi Belattar',
                    'code' => 2726,
                ],
                26 => [
                    'name' => 'Sidi Lakhdar',
                    'code' => 2727,
                ],
                27 => [
                    'name' => 'Sirat',
                    'code' => 2728,
                ],
                28 => [
                    'name' => 'Souaflia',
                    'code' => 2729,
                ],
                29 => [
                    'name' => 'Sour',
                    'code' => 2730,
                ],
                30 => [
                    'name' => 'Stidia',
                    'code' => 2731,
                ],
                31 => [
                    'name' => 'Tazgait',
                    'code' => 2732,
                ],
            ],
            28 => [
                0 => [
                    'name' => 'Aïn El Hadjel',
                    'code' => 2801,
                ],
                1 => [
                    'name' => 'Aïn El Melh',
                    'code' => 2802,
                ],
                2 => [
                    'name' => 'Aïn Errich',
                    'code' => 2803,
                ],
                3 => [
                    'name' => 'Aïn Fares',
                    'code' => 2804,
                ],
                4 => [
                    'name' => 'Aïn Khadra',
                    'code' => 2805,
                ],
                5 => [
                    'name' => 'Belaiba',
                    'code' => 2806,
                ],
                6 => [
                    'name' => 'Ben Srour',
                    'code' => 2807,
                ],
                7 => [
                    'name' => 'Beni Ilmane',
                    'code' => 2808,
                ],
                8 => [
                    'name' => 'Benzouh',
                    'code' => 2809,
                ],
                9 => [
                    'name' => 'Berhoum',
                    'code' => 28010,
                ],
                10 => [
                    'name' => 'Bir Foda',
                    'code' => 2811,
                ],
                11 => [
                    'name' => 'Bou Saâda',
                    'code' => 2812,
                ],
                12 => [
                    'name' => 'Bouti Sayah',
                    'code' => 2813,
                ],
                13 => [
                    'name' => 'Chellal',
                    'code' => 2814,
                ],
                14 => [
                    'name' => 'Dehahna',
                    'code' => 2815,
                ],
                15 => [
                    'name' => 'Djebel Messaad',
                    'code' => 2816,
                ],
                16 => [
                    'name' => 'El Hamel',
                    'code' => 2817,
                ],
                17 => [
                    'name' => 'El Houamed',
                    'code' => 2818,
                ],
                18 => [
                    'name' => 'Hammam Dhalaa',
                    'code' => 2819,
                ],
                19 => [
                    'name' => 'Khettouti Sed El Djir',
                    'code' => 2820,
                ],
                20 => [
                    'name' => 'Khoubana',
                    'code' => 2821,
                ],
                21 => [
                    'name' => 'Maadid',
                    'code' => 2822,
                ],
                22 => [
                    'name' => 'Maarif',
                    'code' => 2823,
                ],
                23 => [
                    'name' => 'Magra',
                    'code' => 2824,
                ],
                24 => [
                    'name' => 'M\'Cif',
                    'code' => 2825,
                ],
                25 => [
                    'name' => 'Medjedel',
                    'code' => 2826,
                ],
                26 => [
                    'name' => 'M\'Sila',
                    'code' => 2827,
                ],
                27 => [
                    'name' => 'M\'Tarfa',
                    'code' => 2828,
                ],
                28 => [
                    'name' => 'Ouanougha',
                    'code' => 2829,
                ],
                29 => [
                    'name' => 'Ouled Addi Guebala',
                    'code' => 2830,
                ],
                30 => [
                    'name' => 'Ouled Atia',
                    'code' => 2831,
                ],
                31 => [
                    'name' => 'Mohammed Boudiaf',
                    'code' => 2832,
                ],
                32 => [
                    'name' => 'Ouled Derradj',
                    'code' => 2833,
                ],
                33 => [
                    'name' => 'Ouled Madhi',
                    'code' => 2834,
                ],
                34 => [
                    'name' => 'Ouled Mansour',
                    'code' => 2835,
                ],
                35 => [
                    'name' => 'Ouled Sidi Brahim',
                    'code' => 2836,
                ],
                36 => [
                    'name' => 'Ouled Slimane',
                    'code' => 2837,
                ],
                37 => [
                    'name' => 'Oultem',
                    'code' => 2838,
                ],
                38 => [
                    'name' => 'Sidi Aïssa',
                    'code' => 2839,
                ],
                39 => [
                    'name' => 'Sidi Ameur',
                    'code' => 2840,
                ],
                40 => [
                    'name' => 'Sidi Hadjeres',
                    'code' => 2841,
                ],
                41 => [
                    'name' => 'Sidi M\'Hamed',
                    'code' => 2842,
                ],
                42 => [
                    'name' => 'Slim',
                    'code' => 2843,
                ],
                43 => [
                    'name' => 'Souamaa',
                    'code' => 2844,
                ],
                44 => [
                    'name' => 'Tamsa',
                    'code' => 2845,
                ],
                45 => [
                    'name' => 'Tarmount',
                    'code' => 2846,
                ],
                46 => [
                    'name' => 'Zarzour',
                    'code' => 2847,
                ],
            ],
            29 => [
                0 => [
                    'name' => 'Aïn Fares',
                    'code' => 2901,
                ],
                1 => [
                    'name' => 'Aïn Fekan',
                    'code' => 2902,
                ],
                2 => [
                    'name' => 'Aïn Ferah',
                    'code' => 2903,
                ],
                3 => [
                    'name' => 'Aïn Fras',
                    'code' => 2904,
                ],
                4 => [
                    'name' => 'Alaïmia',
                    'code' => 2905,
                ],
                5 => [
                    'name' => 'Aouf',
                    'code' => 2906,
                ],
                6 => [
                    'name' => 'Beniane',
                    'code' => 2907,
                ],
                7 => [
                    'name' => 'Bou Hanifia',
                    'code' => 2908,
                ],
                8 => [
                    'name' => 'Bou Henni',
                    'code' => 2909,
                ],
                9 => [
                    'name' => 'Chorfa',
                    'code' => 29010,
                ],
                10 => [
                    'name' => 'El Bordj',
                    'code' => 2911,
                ],
                11 => [
                    'name' => 'El Gaada',
                    'code' => 2912,
                ],
                12 => [
                    'name' => 'El Ghomri',
                    'code' => 2913,
                ],
                13 => [
                    'name' => 'El Guettana',
                    'code' => 2914,
                ],
                14 => [
                    'name' => 'El Keurt',
                    'code' => 2915,
                ],
                15 => [
                    'name' => 'El Menaouer',
                    'code' => 2916,
                ],
                16 => [
                    'name' => 'Ferraguig',
                    'code' => 2917,
                ],
                17 => [
                    'name' => 'Froha',
                    'code' => 2918,
                ],
                18 => [
                    'name' => 'Gharrous',
                    'code' => 2919,
                ],
                19 => [
                    'name' => 'Guerdjoum',
                    'code' => 2920,
                ],
                20 => [
                    'name' => 'Ghriss',
                    'code' => 2921,
                ],
                21 => [
                    'name' => 'Hachem',
                    'code' => 2922,
                ],
                22 => [
                    'name' => 'Hacine',
                    'code' => 2923,
                ],
                23 => [
                    'name' => 'Khalouia',
                    'code' => 2924,
                ],
                24 => [
                    'name' => 'Makdha',
                    'code' => 2925,
                ],
                25 => [
                    'name' => 'Mamounia',
                    'code' => 2926,
                ],
                26 => [
                    'name' => 'Maoussa',
                    'code' => 2927,
                ],
                27 => [
                    'name' => 'Mascara',
                    'code' => 2928,
                ],
                28 => [
                    'name' => 'Matemore',
                    'code' => 2929,
                ],
                29 => [
                    'name' => 'Mocta Douz',
                    'code' => 2930,
                ],
                30 => [
                    'name' => 'Mohammadia',
                    'code' => 2931,
                ],
                31 => [
                    'name' => 'Nesmoth',
                    'code' => 2932,
                ],
                32 => [
                    'name' => 'Oggaz',
                    'code' => 2933,
                ],
                33 => [
                    'name' => 'Oued El Abtal',
                    'code' => 2934,
                ],
                34 => [
                    'name' => 'Oued Taria',
                    'code' => 2935,
                ],
                35 => [
                    'name' => 'Ras El Aïn Amirouche',
                    'code' => 2936,
                ],
                36 => [
                    'name' => 'Sedjerara',
                    'code' => 2937,
                ],
                37 => [
                    'name' => 'Sehailia',
                    'code' => 2938,
                ],
                38 => [
                    'name' => 'Sidi Abdeldjebar',
                    'code' => 2939,
                ],
                39 => [
                    'name' => 'Sidi Abdelmoumen',
                    'code' => 2940,
                ],
                40 => [
                    'name' => 'Sidi Kada',
                    'code' => 2941,
                ],
                41 => [
                    'name' => 'Sidi Boussaid',
                    'code' => 2942,
                ],
                42 => [
                    'name' => 'Sig',
                    'code' => 2943,
                ],
                43 => [
                    'name' => 'Tighennif',
                    'code' => 2944,
                ],
                44 => [
                    'name' => 'Tizi',
                    'code' => 2945,
                ],
                45 => [
                    'name' => 'Zahana',
                    'code' => 2946,
                ],
                46 => [
                    'name' => 'Zelmata',
                    'code' => 2947,
                ],
            ],
            30 => [
                0 => [
                    'name' => 'Aïn Beida',
                    'code' => 3001,
                ],
                1 => [
                    'name' => 'El Borma',
                    'code' => 3002,
                ],
                2 => [
                    'name' => 'Hassi Ben Abdellah',
                    'code' => 3003,
                ],
                3 => [
                    'name' => 'Hassi Messaoud',
                    'code' => 3004,
                ],
                4 => [
                    'name' => 'N\'Goussa',
                    'code' => 3005,
                ],
                5 => [
                    'name' => 'Ouargla',
                    'code' => 3006,
                ],
                6 => [
                    'name' => 'Rouissat',
                    'code' => 3007,
                ],
                7 => [
                    'name' => 'Sidi Khouiled',
                    'code' => 3008,
                ],
            ],
            31 => [
                0 => [
                    'name' => 'Oran',
                    'code' => 3101,
                ],
                1 => [
                    'name' => 'Gdyel',
                    'code' => 3102,
                ],
                2 => [
                    'name' => 'Bir El Djir',
                    'code' => 3103,
                ],
                3 => [
                    'name' => 'Hassi Bounif',
                    'code' => 3104,
                ],
                4 => [
                    'name' => 'Es Senia',
                    'code' => 3105,
                ],
                5 => [
                    'name' => 'Arzew',
                    'code' => 3106,
                ],
                6 => [
                    'name' => 'Bethioua',
                    'code' => 3107,
                ],
                7 => [
                    'name' => 'Marsat El Hadjadj',
                    'code' => 3108,
                ],
                8 => [
                    'name' => 'Aïn El Turk',
                    'code' => 3109,
                ],
                9 => [
                    'name' => 'El Ançor',
                    'code' => 3110,
                ],
                10 => [
                    'name' => 'Oued Tlelat',
                    'code' => 3111,
                ],
                11 => [
                    'name' => 'Tafraoui',
                    'code' => 3112,
                ],
                12 => [
                    'name' => 'Sidi Chami',
                    'code' => 3113,
                ],
                13 => [
                    'name' => 'Boufatis',
                    'code' => 3114,
                ],
                14 => [
                    'name' => 'Mers El Kébir',
                    'code' => 3115,
                ],
                15 => [
                    'name' => 'Bousfer',
                    'code' => 3116,
                ],
                16 => [
                    'name' => 'El Kerma',
                    'code' => 3117,
                ],
                17 => [
                    'name' => 'El Braya',
                    'code' => 3118,
                ],
                18 => [
                    'name' => 'Hassi Ben Okba',
                    'code' => 3119,
                ],
                19 => [
                    'name' => 'Ben Freha',
                    'code' => 3120,
                ],
                20 => [
                    'name' => 'Hassi Mefsoukh',
                    'code' => 3121,
                ],
                21 => [
                    'name' => 'Sidi Benyebka',
                    'code' => 3122,
                ],
                22 => [
                    'name' => 'Misserghin',
                    'code' => 3123,
                ],
                23 => [
                    'name' => 'Boutlelis',
                    'code' => 3124,
                ],
                24 => [
                    'name' => 'Aïn El Kerma',
                    'code' => 3125,
                ],
                25 => [
                    'name' => 'Aïn El Bia',
                    'code' => 3126,
                ],
            ],
            32 => [
                0 => [
                    'name' => 'El Bayadh',
                    'code' => 3201,
                ],
                1 => [
                    'name' => 'Rogassa',
                    'code' => 3202,
                ],
                2 => [
                    'name' => 'Stitten',
                    'code' => 3203,
                ],
                3 => [
                    'name' => 'Brezina',
                    'code' => 3204,
                ],
                4 => [
                    'name' => 'Ghassoul',
                    'code' => 3205,
                ],
                5 => [
                    'name' => 'Boualem',
                    'code' => 3206,
                ],
                6 => [
                    'name' => 'El Abiodh Sidi Cheikh',
                    'code' => 3207,
                ],
                7 => [
                    'name' => 'Aïn El Orak',
                    'code' => 3208,
                ],
                8 => [
                    'name' => 'Arbaouat',
                    'code' => 3209,
                ],
                9 => [
                    'name' => 'Bougtoub',
                    'code' => 3210,
                ],
                10 => [
                    'name' => 'El Kheiter',
                    'code' => 3211,
                ],
                11 => [
                    'name' => 'Kef El Ahmar',
                    'code' => 3212,
                ],
                12 => [
                    'name' => 'Boussemghoun',
                    'code' => 3213,
                ],
                13 => [
                    'name' => 'Chellala',
                    'code' => 3214,
                ],
                14 => [
                    'name' => 'Kraakda',
                    'code' => 3215,
                ],
                15 => [
                    'name' => 'El Bnoud',
                    'code' => 3216,
                ],
                16 => [
                    'name' => 'Cheguig',
                    'code' => 3217,
                ],
                17 => [
                    'name' => 'Sidi Ameur',
                    'code' => 3218,
                ],
                18 => [
                    'name' => 'El Mehara',
                    'code' => 3219,
                ],
                19 => [
                    'name' => 'Tousmouline',
                    'code' => 3220,
                ],
                20 => [
                    'name' => 'Sidi Slimane',
                    'code' => 3221,
                ],
                21 => [
                    'name' => 'Sidi Tifour',
                    'code' => 3222,
                ],
            ],
            33 => [
                0 => [
                    'name' => 'Illizi',
                    'code' => 3301,
                ],
                1 => [
                    'name' => 'Debdeb',
                    'code' => 3303,
                ],
                2 => [
                    'name' => 'Bordj Omar Driss',
                    'code' => 3304,
                ],
                3 => [
                    'name' => 'In Amenas',
                    'code' => 3306,
                ],
            ],
            34 => [
                0 => [
                    'name' => 'Aïn Taghrout',
                    'code' => 3401,
                ],
                1 => [
                    'name' => 'Aïn Tesra',
                    'code' => 3402,
                ],
                2 => [
                    'name' => 'Belimour',
                    'code' => 3403,
                ],
                3 => [
                    'name' => 'Ben Daoud',
                    'code' => 3404,
                ],
                4 => [
                    'name' => 'Bir Kasdali',
                    'code' => 3405,
                ],
                5 => [
                    'name' => 'Bordj Bou Arreridj',
                    'code' => 3406,
                ],
                6 => [
                    'name' => 'Bordj Ghédir',
                    'code' => 3407,
                ],
                7 => [
                    'name' => 'Bordj Zemoura',
                    'code' => 3408,
                ],
                8 => [
                    'name' => 'Colla',
                    'code' => 3409,
                ],
                9 => [
                    'name' => 'Djaafra',
                    'code' => 34010,
                ],
                10 => [
                    'name' => 'El Ach',
                    'code' => 3411,
                ],
                11 => [
                    'name' => 'El Achir',
                    'code' => 3412,
                ],
                12 => [
                    'name' => 'El Anseur',
                    'code' => 3413,
                ],
                13 => [
                    'name' => 'El Hamadia',
                    'code' => 3414,
                ],
                14 => [
                    'name' => 'El Main',
                    'code' => 3415,
                ],
                15 => [
                    'name' => 'El M\'hir',
                    'code' => 3416,
                ],
                16 => [
                    'name' => 'Ghilassa',
                    'code' => 3417,
                ],
                17 => [
                    'name' => 'Haraza',
                    'code' => 3418,
                ],
                18 => [
                    'name' => 'Hasnaoua',
                    'code' => 3419,
                ],
                19 => [
                    'name' => 'Khelil',
                    'code' => 3420,
                ],
                20 => [
                    'name' => 'Ksour',
                    'code' => 3421,
                ],
                21 => [
                    'name' => 'Mansoura',
                    'code' => 3422,
                ],
                22 => [
                    'name' => 'Medjana',
                    'code' => 3423,
                ],
                23 => [
                    'name' => 'Ouled Brahem',
                    'code' => 3424,
                ],
                24 => [
                    'name' => 'Ouled Dahmane',
                    'code' => 3425,
                ],
                25 => [
                    'name' => 'Ouled Sidi Brahim',
                    'code' => 3426,
                ],
                26 => [
                    'name' => 'Rabta',
                    'code' => 3427,
                ],
                27 => [
                    'name' => 'Ras El Oued',
                    'code' => 3428,
                ],
                28 => [
                    'name' => 'Sidi Embarek',
                    'code' => 3429,
                ],
                29 => [
                    'name' => 'Tefreg',
                    'code' => 3430,
                ],
                30 => [
                    'name' => 'Taglait',
                    'code' => 3431,
                ],
                31 => [
                    'name' => 'Teniet En Nasr',
                    'code' => 3432,
                ],
                32 => [
                    'name' => 'Tassameurt',
                    'code' => 3433,
                ],
                33 => [
                    'name' => 'Tixter',
                    'code' => 3434,
                ],
            ],
            35 => [
                0 => [
                    'name' => 'Afir',
                    'code' => 3504,
                ],
                1 => [
                    'name' => 'Ammal',
                    'code' => 3529,
                ],
                2 => [
                    'name' => 'Baghlia',
                    'code' => 3506,
                ],
                3 => [
                    'name' => 'Ben Choud',
                    'code' => 3527,
                ],
                4 => [
                    'name' => 'Beni Amrane',
                    'code' => 3530,
                ],
                5 => [
                    'name' => 'Bordj Menaïel',
                    'code' => 3505,
                ],
                6 => [
                    'name' => 'Boudouaou',
                    'code' => 3502,
                ],
                7 => [
                    'name' => 'Boudouaou-El-Bahri',
                    'code' => 3532,
                ],
                8 => [
                    'name' => 'Boumerdes',
                    'code' => 3501,
                ],
                9 => [
                    'name' => 'Bouzegza Keddara',
                    'code' => 3522,
                ],
                10 => [
                    'name' => 'Chabet el Ameur',
                    'code' => 3514,
                ],
                11 => [
                    'name' => 'Corso',
                    'code' => 3519,
                ],
                12 => [
                    'name' => 'Dellys',
                    'code' => 3528,
                ],
                13 => [
                    'name' => 'Djinet',
                    'code' => 3509,
                ],
                14 => [
                    'name' => 'El Kharrouba',
                    'code' => 3538,
                ],
                15 => [
                    'name' => 'Hammedi',
                    'code' => 3536,
                ],
                16 => [
                    'name' => 'Issers',
                    'code' => 3510,
                ],
                17 => [
                    'name' => 'Khemis El-Khechna',
                    'code' => 3537,
                ],
                18 => [
                    'name' => 'Larbatache',
                    'code' => 3521,
                ],
                19 => [
                    'name' => 'Leghata',
                    'code' => 3535,
                ],
                20 => [
                    'name' => 'Naciria',
                    'code' => 3508,
                ],
                21 => [
                    'name' => 'Ouled Aïssa',
                    'code' => 3526,
                ],
                22 => [
                    'name' => 'Ouled Hedadj',
                    'code' => 3533,
                ],
                23 => [
                    'name' => 'Ouled Moussa',
                    'code' => 3520,
                ],
                24 => [
                    'name' => 'Si Mustapha',
                    'code' => 3512,
                ],
                25 => [
                    'name' => 'Sidi Daoud',
                    'code' => 3507,
                ],
                26 => [
                    'name' => 'Souk El Had',
                    'code' => 3531,
                ],
                27 => [
                    'name' => 'Taourga',
                    'code' => 3525,
                ],
                28 => [
                    'name' => 'Thenia',
                    'code' => 3515,
                ],
                29 => [
                    'name' => 'Tidjelabine',
                    'code' => 3513,
                ],
                30 => [
                    'name' => 'Timezrit',
                    'code' => 3518,
                ],
                31 => [
                    'name' => 'Zemmouri',
                    'code' => 3511,
                ],
            ],
            36 => [
                0 => [
                    'name' => 'Aïn El Assel',
                    'code' => 3601,
                ],
                1 => [
                    'name' => 'Aïn Kerma',
                    'code' => 3602,
                ],
                2 => [
                    'name' => 'Asfour',
                    'code' => 3603,
                ],
                3 => [
                    'name' => 'Ben Mehidi',
                    'code' => 3604,
                ],
                4 => [
                    'name' => 'Berrihane',
                    'code' => 3605,
                ],
                5 => [
                    'name' => 'Besbes',
                    'code' => 3606,
                ],
                6 => [
                    'name' => 'Bougous',
                    'code' => 3607,
                ],
                7 => [
                    'name' => 'Bouhadjar',
                    'code' => 3608,
                ],
                8 => [
                    'name' => 'Bouteldja',
                    'code' => 3609,
                ],
                9 => [
                    'name' => 'Chebaita Mokhtar',
                    'code' => 36010,
                ],
                10 => [
                    'name' => 'Chefia',
                    'code' => 3611,
                ],
                11 => [
                    'name' => 'Chihani',
                    'code' => 3612,
                ],
                12 => [
                    'name' => 'Dréan',
                    'code' => 3613,
                ],
                13 => [
                    'name' => 'Echatt',
                    'code' => 3614,
                ],
                14 => [
                    'name' => 'El Aioun',
                    'code' => 3615,
                ],
                15 => [
                    'name' => 'El Kala',
                    'code' => 3616,
                ],
                16 => [
                    'name' => 'El Tarf',
                    'code' => 3617,
                ],
                17 => [
                    'name' => 'Hammam Beni Salah',
                    'code' => 3618,
                ],
                18 => [
                    'name' => 'Lac des Oiseaux',
                    'code' => 3619,
                ],
                19 => [
                    'name' => 'Oued Zitoun',
                    'code' => 3620,
                ],
                20 => [
                    'name' => 'Raml Souk',
                    'code' => 3621,
                ],
                21 => [
                    'name' => 'Souarekh',
                    'code' => 3622,
                ],
                22 => [
                    'name' => 'Zerizer',
                    'code' => 3623,
                ],
                23 => [
                    'name' => 'Zitouna',
                    'code' => 3624,
                ],
            ],
            37 => [
                0 => [
                    'name' => 'Oum el Assel',
                    'code' => 3701,
                ],
                1 => [
                    'name' => 'Tindouf',
                    'code' => 3702,
                ],
            ],
            38 => [
                0 => [
                    'name' => 'Ammari',
                    'code' => 3801,
                ],
                1 => [
                    'name' => 'Beni Chaib',
                    'code' => 3802,
                ],
                2 => [
                    'name' => 'Beni Lahcene',
                    'code' => 3803,
                ],
                3 => [
                    'name' => 'Boucaid',
                    'code' => 3804,
                ],
                4 => [
                    'name' => 'Bordj Bou Naama',
                    'code' => 3805,
                ],
                5 => [
                    'name' => 'Bordj El Emir Abdelkader',
                    'code' => 3806,
                ],
                6 => [
                    'name' => 'Khemisti',
                    'code' => 3807,
                ],
                7 => [
                    'name' => 'Larbaâ',
                    'code' => 3808,
                ],
                8 => [
                    'name' => 'Lardjem',
                    'code' => 3809,
                ],
                9 => [
                    'name' => 'Layoune',
                    'code' => 38010,
                ],
                10 => [
                    'name' => 'Lazharia',
                    'code' => 3811,
                ],
                11 => [
                    'name' => 'Maacem',
                    'code' => 3812,
                ],
                12 => [
                    'name' => 'Melaab',
                    'code' => 3813,
                ],
                13 => [
                    'name' => 'Ouled Bessem',
                    'code' => 3814,
                ],
                14 => [
                    'name' => 'Sidi Abed',
                    'code' => 3815,
                ],
                15 => [
                    'name' => 'Sidi Boutouchent',
                    'code' => 3816,
                ],
                16 => [
                    'name' => 'Sidi Lantri',
                    'code' => 3817,
                ],
                17 => [
                    'name' => 'Sidi Slimane',
                    'code' => 3818,
                ],
                18 => [
                    'name' => 'Tamalaht',
                    'code' => 3819,
                ],
                19 => [
                    'name' => 'Theniet El Had',
                    'code' => 3820,
                ],
                20 => [
                    'name' => 'Tissemsilt',
                    'code' => 3821,
                ],
                21 => [
                    'name' => 'Youssoufia',
                    'code' => 3822,
                ],
            ],
            39 => [
                0 => [
                    'name' => 'El Oued',
                    'code' => 3901,
                ],
                1 => [
                    'name' => 'Robbah',
                    'code' => 3902,
                ],
                2 => [
                    'name' => 'Oued El Alenda',
                    'code' => 3903,
                ],
                3 => [
                    'name' => 'Bayadha',
                    'code' => 3904,
                ],
                4 => [
                    'name' => 'Nakhla',
                    'code' => 3905,
                ],
                5 => [
                    'name' => 'Guemar',
                    'code' => 3906,
                ],
                6 => [
                    'name' => 'Kouinine',
                    'code' => 3907,
                ],
                7 => [
                    'name' => 'Reguiba',
                    'code' => 3908,
                ],
                8 => [
                    'name' => 'Hamraia',
                    'code' => 3909,
                ],
                9 => [
                    'name' => 'Taghzout',
                    'code' => 3910,
                ],
                10 => [
                    'name' => 'Debila',
                    'code' => 3911,
                ],
                11 => [
                    'name' => 'Hassani Abdelkrim',
                    'code' => 3912,
                ],
                12 => [
                    'name' => 'Hassi Khalifa',
                    'code' => 3913,
                ],
                13 => [
                    'name' => 'Taleb Larbi',
                    'code' => 3914,
                ],
                14 => [
                    'name' => 'Douar El Ma',
                    'code' => 3915,
                ],
                15 => [
                    'name' => 'Sidi Aoun',
                    'code' => 3916,
                ],
                16 => [
                    'name' => 'Trifaoui',
                    'code' => 3917,
                ],
                17 => [
                    'name' => 'Magrane',
                    'code' => 3918,
                ],
                18 => [
                    'name' => 'Beni Guecha',
                    'code' => 3919,
                ],
                19 => [
                    'name' => 'Ourmas',
                    'code' => 3920,
                ],
                20 => [
                    'name' => 'El Ogla',
                    'code' => 3925,
                ],
                21 => [
                    'name' => 'Mih Ouansa',
                    'code' => 3926,
                ],
            ],
            40 => [
                0 => [
                    'name' => 'Aïn Touila',
                    'code' => 4001,
                ],
                1 => [
                    'name' => 'Babar',
                    'code' => 4002,
                ],
                2 => [
                    'name' => 'Baghai',
                    'code' => 4003,
                ],
                3 => [
                    'name' => 'Bouhmama',
                    'code' => 4004,
                ],
                4 => [
                    'name' => 'Chechar',
                    'code' => 4005,
                ],
                5 => [
                    'name' => 'Chelia',
                    'code' => 4006,
                ],
                6 => [
                    'name' => 'Djellal',
                    'code' => 4007,
                ],
                7 => [
                    'name' => 'El Hamma',
                    'code' => 4008,
                ],
                8 => [
                    'name' => 'El Mahmal',
                    'code' => 4009,
                ],
                9 => [
                    'name' => 'El Oueldja',
                    'code' => 40010,
                ],
                10 => [
                    'name' => 'Ensigha',
                    'code' => 4011,
                ],
                11 => [
                    'name' => 'Kais',
                    'code' => 4012,
                ],
                12 => [
                    'name' => 'Khenchela',
                    'code' => 4013,
                ],
                13 => [
                    'name' => 'Khirane',
                    'code' => 4014,
                ],
                14 => [
                    'name' => 'M\'Sara',
                    'code' => 4015,
                ],
                15 => [
                    'name' => 'M\'Toussa',
                    'code' => 4016,
                ],
                16 => [
                    'name' => 'Ouled Rechache',
                    'code' => 4017,
                ],
                17 => [
                    'name' => 'Remila',
                    'code' => 4018,
                ],
                18 => [
                    'name' => 'Tamza',
                    'code' => 4019,
                ],
                19 => [
                    'name' => 'Taouzient',
                    'code' => 4020,
                ],
                20 => [
                    'name' => 'Yabous',
                    'code' => 4021,
                ],
            ],
            41 => [
                0 => [
                    'name' => 'Souk Ahras',
                    'code' => 4101,
                ],
                1 => [
                    'name' => 'Sedrata',
                    'code' => 4102,
                ],
                2 => [
                    'name' => 'Hanancha',
                    'code' => 4103,
                ],
                3 => [
                    'name' => 'Mechroha',
                    'code' => 4104,
                ],
                4 => [
                    'name' => 'Ouled Driss',
                    'code' => 4105,
                ],
                5 => [
                    'name' => 'Tiffech',
                    'code' => 4106,
                ],
                6 => [
                    'name' => 'Zaarouria',
                    'code' => 4107,
                ],
                7 => [
                    'name' => 'Taoura',
                    'code' => 4108,
                ],
                8 => [
                    'name' => 'Dréa',
                    'code' => 4109,
                ],
                9 => [
                    'name' => 'Heddada',
                    'code' => 4110,
                ],
                10 => [
                    'name' => 'Khedara',
                    'code' => 4111,
                ],
                11 => [
                    'name' => 'Merahna',
                    'code' => 4112,
                ],
                12 => [
                    'name' => 'Ouled Moumene',
                    'code' => 4113,
                ],
                13 => [
                    'name' => 'Bir Bou Haouch',
                    'code' => 4114,
                ],
                14 => [
                    'name' => 'M\'daourouch',
                    'code' => 4115,
                ],
                15 => [
                    'name' => 'Oum El Adhaim',
                    'code' => 4116,
                ],
                16 => [
                    'name' => 'Aïn Zana',
                    'code' => 4117,
                ],
                17 => [
                    'name' => 'Aïn Soltane',
                    'code' => 4118,
                ],
                18 => [
                    'name' => 'Ouillen',
                    'code' => 4119,
                ],
                19 => [
                    'name' => 'Sidi Fredj',
                    'code' => 4120,
                ],
                20 => [
                    'name' => 'Safel El Ouiden',
                    'code' => 4121,
                ],
                21 => [
                    'name' => 'Ragouba',
                    'code' => 4122,
                ],
                22 => [
                    'name' => 'Khemissa',
                    'code' => 4123,
                ],
                23 => [
                    'name' => 'Oued Keberit',
                    'code' => 4124,
                ],
                24 => [
                    'name' => 'Terraguelt',
                    'code' => 4125,
                ],
                25 => [
                    'name' => 'Zouabi',
                    'code' => 4126,
                ],
            ],
            42 => [
                0 => [
                    'name' => 'Tipaza',
                    'code' => 4201,
                ],
                1 => [
                    'name' => 'Menaceur',
                    'code' => 4202,
                ],
                2 => [
                    'name' => 'Larhat',
                    'code' => 4203,
                ],
                3 => [
                    'name' => 'Douaouda',
                    'code' => 4204,
                ],
                4 => [
                    'name' => 'Bourkika',
                    'code' => 4205,
                ],
                5 => [
                    'name' => 'Khemisti',
                    'code' => 4206,
                ],
                6 => [
                    'name' => 'Aghbal',
                    'code' => 4210,
                ],
                7 => [
                    'name' => 'Hadjout',
                    'code' => 4212,
                ],
                8 => [
                    'name' => 'Sidi Amar',
                    'code' => 4213,
                ],
                9 => [
                    'name' => 'Gouraya',
                    'code' => 4214,
                ],
                10 => [
                    'name' => 'Nador',
                    'code' => 4215,
                ],
                11 => [
                    'name' => 'Chaiba',
                    'code' => 4216,
                ],
                12 => [
                    'name' => 'Aïn Tagourait',
                    'code' => 4217,
                ],
                13 => [
                    'name' => 'Cherchell',
                    'code' => 4222,
                ],
                14 => [
                    'name' => 'Damous',
                    'code' => 4223,
                ],
                15 => [
                    'name' => 'Merad',
                    'code' => 4224,
                ],
                16 => [
                    'name' => 'Fouka',
                    'code' => 4225,
                ],
                17 => [
                    'name' => 'Bou Ismaïl',
                    'code' => 4226,
                ],
                18 => [
                    'name' => 'Ahmar El Aïn',
                    'code' => 4227,
                ],
                19 => [
                    'name' => 'Bouharoun',
                    'code' => 4230,
                ],
                20 => [
                    'name' => 'Sidi Ghiles',
                    'code' => 4232,
                ],
                21 => [
                    'name' => 'Messelmoun',
                    'code' => 4233,
                ],
                22 => [
                    'name' => 'Sidi Rached',
                    'code' => 4234,
                ],
                23 => [
                    'name' => 'Koléa',
                    'code' => 4235,
                ],
                24 => [
                    'name' => 'Attatba',
                    'code' => 4236,
                ],
                25 => [
                    'name' => 'Sidi Semiane',
                    'code' => 4240,
                ],
                26 => [
                    'name' => 'Beni Milleuk',
                    'code' => 4241,
                ],
                27 => [
                    'name' => 'Hadjeret Ennous',
                    'code' => 4242,
                ],
            ],
            43 => [
                0 => [
                    'name' => 'Ahmed Rachedi',
                    'code' => 4301,
                ],
                1 => [
                    'name' => 'Aïn Beida Harriche',
                    'code' => 4302,
                ],
                2 => [
                    'name' => 'Aïn Mellouk',
                    'code' => 4303,
                ],
                3 => [
                    'name' => 'Aïn Tine',
                    'code' => 4304,
                ],
                4 => [
                    'name' => 'Amira Arrès',
                    'code' => 4305,
                ],
                5 => [
                    'name' => 'Benyahia Abderrahmane',
                    'code' => 4306,
                ],
                6 => [
                    'name' => 'Bouhatem',
                    'code' => 4307,
                ],
                7 => [
                    'name' => 'Chelghoum Laid',
                    'code' => 4308,
                ],
                8 => [
                    'name' => 'Chigara',
                    'code' => 4309,
                ],
                9 => [
                    'name' => 'Derradji Bousselah',
                    'code' => 43010,
                ],
                10 => [
                    'name' => 'El Mechira',
                    'code' => 4311,
                ],
                11 => [
                    'name' => 'Elayadi Barbes',
                    'code' => 4312,
                ],
                12 => [
                    'name' => 'Ferdjioua',
                    'code' => 4313,
                ],
                13 => [
                    'name' => 'Grarem Gouga',
                    'code' => 4314,
                ],
                14 => [
                    'name' => 'Hamala',
                    'code' => 4315,
                ],
                15 => [
                    'name' => 'Mila',
                    'code' => 4316,
                ],
                16 => [
                    'name' => 'Minar Zarza',
                    'code' => 4317,
                ],
                17 => [
                    'name' => 'Oued Athmania',
                    'code' => 4318,
                ],
                18 => [
                    'name' => 'Oued Endja',
                    'code' => 4319,
                ],
                19 => [
                    'name' => 'Oued Seguen',
                    'code' => 4320,
                ],
                20 => [
                    'name' => 'Ouled Khalouf',
                    'code' => 4321,
                ],
                21 => [
                    'name' => 'Rouached',
                    'code' => 4322,
                ],
                22 => [
                    'name' => 'Sidi Khelifa',
                    'code' => 4323,
                ],
                23 => [
                    'name' => 'Sidi Merouane',
                    'code' => 4324,
                ],
                24 => [
                    'name' => 'Tadjenanet',
                    'code' => 4325,
                ],
                25 => [
                    'name' => 'Tassadane Haddada',
                    'code' => 4326,
                ],
                26 => [
                    'name' => 'Teleghma',
                    'code' => 4327,
                ],
                27 => [
                    'name' => 'Terrai Bainen',
                    'code' => 4328,
                ],
                28 => [
                    'name' => 'Tessala Lemtaï',
                    'code' => 4329,
                ],
                29 => [
                    'name' => 'Tiberguent',
                    'code' => 4330,
                ],
                30 => [
                    'name' => 'Yahia Beni Guecha',
                    'code' => 4331,
                ],
                31 => [
                    'name' => 'Zeghaia',
                    'code' => 4332,
                ],
            ],
            44 => [
                0 => [
                    'name' => 'Aïn Beniane',
                    'code' => 4401,
                ],
                1 => [
                    'name' => 'Aïn Bouyahia',
                    'code' => 4402,
                ],
                2 => [
                    'name' => 'Aïn Defla',
                    'code' => 4403,
                ],
                3 => [
                    'name' => 'Aïn Lechiekh',
                    'code' => 4404,
                ],
                4 => [
                    'name' => 'Aïn Soltane',
                    'code' => 4405,
                ],
                5 => [
                    'name' => 'Aïn Torki',
                    'code' => 4406,
                ],
                6 => [
                    'name' => 'Arib',
                    'code' => 4407,
                ],
                7 => [
                    'name' => 'Bathia',
                    'code' => 4408,
                ],
                8 => [
                    'name' => 'Belaas',
                    'code' => 4409,
                ],
                9 => [
                    'name' => 'Ben Allal',
                    'code' => 44010,
                ],
                10 => [
                    'name' => 'Birbouche',
                    'code' => 4411,
                ],
                11 => [
                    'name' => 'Bir Ould Khelifa',
                    'code' => 4412,
                ],
                12 => [
                    'name' => 'Bordj Emir Khaled',
                    'code' => 4413,
                ],
                13 => [
                    'name' => 'Boumedfaa',
                    'code' => 4414,
                ],
                14 => [
                    'name' => 'Bourached',
                    'code' => 4415,
                ],
                15 => [
                    'name' => 'Djelida',
                    'code' => 4416,
                ],
                16 => [
                    'name' => 'Djemaa Ouled Cheikh',
                    'code' => 4417,
                ],
                17 => [
                    'name' => 'Djendel',
                    'code' => 4418,
                ],
                18 => [
                    'name' => 'El Abadia',
                    'code' => 4419,
                ],
                19 => [
                    'name' => 'El Amra',
                    'code' => 4420,
                ],
                20 => [
                    'name' => 'El Attaf',
                    'code' => 4421,
                ],
                21 => [
                    'name' => 'El Hassania',
                    'code' => 4422,
                ],
                22 => [
                    'name' => 'El Maine',
                    'code' => 4423,
                ],
                23 => [
                    'name' => 'Hammam Righa',
                    'code' => 4424,
                ],
                24 => [
                    'name' => 'Hoceinia',
                    'code' => 4425,
                ],
                25 => [
                    'name' => 'Khemis Miliana',
                    'code' => 4426,
                ],
                26 => [
                    'name' => 'Mekhatria',
                    'code' => 4427,
                ],
                27 => [
                    'name' => 'Miliana',
                    'code' => 4428,
                ],
                28 => [
                    'name' => 'Oued Chorfa',
                    'code' => 4429,
                ],
                29 => [
                    'name' => 'Oued Djemaa',
                    'code' => 4430,
                ],
                30 => [
                    'name' => 'Rouina',
                    'code' => 4431,
                ],
                31 => [
                    'name' => 'Sidi Lakhdar',
                    'code' => 4432,
                ],
                32 => [
                    'name' => 'Tacheta Zougagha',
                    'code' => 4433,
                ],
                33 => [
                    'name' => 'Tarik Ibn Ziad',
                    'code' => 4434,
                ],
                34 => [
                    'name' => 'Tiberkanine',
                    'code' => 4435,
                ],
                35 => [
                    'name' => 'Zeddine',
                    'code' => 4436,
                ],
            ],
            45 => [
                0 => [
                    'name' => 'Naâma',
                    'code' => 4501,
                ],
                1 => [
                    'name' => 'Mecheria',
                    'code' => 4502,
                ],
                2 => [
                    'name' => 'Aïn Sefra',
                    'code' => 4503,
                ],
                3 => [
                    'name' => 'Tiout',
                    'code' => 4504,
                ],
                4 => [
                    'name' => 'Sfissifa',
                    'code' => 4505,
                ],
                5 => [
                    'name' => 'Moghrar',
                    'code' => 4506,
                ],
                6 => [
                    'name' => 'Assela',
                    'code' => 4507,
                ],
                7 => [
                    'name' => 'Djeniene Bourezg',
                    'code' => 4508,
                ],
                8 => [
                    'name' => 'Aïn Ben Khelil',
                    'code' => 4509,
                ],
                9 => [
                    'name' => 'Makman Ben Amer',
                    'code' => 45010,
                ],
                10 => [
                    'name' => 'Kasdir',
                    'code' => 4511,
                ],
                11 => [
                    'name' => 'El Biod',
                    'code' => 4512,
                ],
            ],
            46 => [
                0 => [
                    'name' => 'Aghlal',
                    'code' => 4601,
                ],
                1 => [
                    'name' => 'Aïn El Arbaa',
                    'code' => 4602,
                ],
                2 => [
                    'name' => 'Aïn Kihal',
                    'code' => 4603,
                ],
                3 => [
                    'name' => 'Aïn Témouchent',
                    'code' => 4604,
                ],
                4 => [
                    'name' => 'Aïn Tolba',
                    'code' => 4605,
                ],
                5 => [
                    'name' => 'Aoubellil',
                    'code' => 4606,
                ],
                6 => [
                    'name' => 'Beni Saf',
                    'code' => 4607,
                ],
                7 => [
                    'name' => 'Bouzedjar',
                    'code' => 4608,
                ],
                8 => [
                    'name' => 'Chaabat El Leham',
                    'code' => 4609,
                ],
                9 => [
                    'name' => 'Chentouf',
                    'code' => 46010,
                ],
                10 => [
                    'name' => 'El Amria',
                    'code' => 4611,
                ],
                11 => [
                    'name' => 'El Emir Abdelkader',
                    'code' => 4612,
                ],
                12 => [
                    'name' => 'El Malah',
                    'code' => 4613,
                ],
                13 => [
                    'name' => 'El Messaid',
                    'code' => 4614,
                ],
                14 => [
                    'name' => 'Hammam Bouhadjar',
                    'code' => 4615,
                ],
                15 => [
                    'name' => 'Hassasna',
                    'code' => 4616,
                ],
                16 => [
                    'name' => 'Hassi El Ghella',
                    'code' => 4617,
                ],
                17 => [
                    'name' => 'Oued Berkeche',
                    'code' => 4618,
                ],
                18 => [
                    'name' => 'Oued Sabah',
                    'code' => 4619,
                ],
                19 => [
                    'name' => 'Ouled Boudjemaa',
                    'code' => 4620,
                ],
                20 => [
                    'name' => 'Ouled Kihal',
                    'code' => 4621,
                ],
                21 => [
                    'name' => 'Oulhaça El Gheraba',
                    'code' => 4622,
                ],
                22 => [
                    'name' => 'Sidi Ben Adda',
                    'code' => 4623,
                ],
                23 => [
                    'name' => 'Sidi Boumedienne',
                    'code' => 4624,
                ],
                24 => [
                    'name' => 'Sidi Ouriache',
                    'code' => 4625,
                ],
                25 => [
                    'name' => 'Sidi Safi',
                    'code' => 4626,
                ],
                26 => [
                    'name' => 'Tamzoura',
                    'code' => 4627,
                ],
                27 => [
                    'name' => 'Terga',
                    'code' => 4628,
                ],
            ],
            47 => [
                0 => [
                    'name' => 'Berriane',
                    'code' => 4701,
                ],
                1 => [
                    'name' => 'Bounoura',
                    'code' => 4702,
                ],
                2 => [
                    'name' => 'Dhayet Bendhahoua',
                    'code' => 4703,
                ],
                3 => [
                    'name' => 'El Atteuf',
                    'code' => 4704,
                ],
                4 => [
                    'name' => 'El Guerrara',
                    'code' => 4705,
                ],
                5 => [
                    'name' => 'Ghardaïa',
                    'code' => 4706,
                ],
                6 => [
                    'name' => 'Mansoura',
                    'code' => 4707,
                ],
                7 => [
                    'name' => 'Metlili',
                    'code' => 4708,
                ],
                8 => [
                    'name' => 'Sebseb',
                    'code' => 4709,
                ],
                9 => [
                    'name' => 'Zelfana',
                    'code' => 47010,
                ],
            ],
            48 => [
                0 => [
                    'name' => 'Aïn Rahma',
                    'code' => 4801,
                ],
                1 => [
                    'name' => 'Aïn Tarek',
                    'code' => 4802,
                ],
                2 => [
                    'name' => '‘Aarch Meknassa',
                    'code' => 4803,
                ],
                3 => [
                    'name' => 'Ammi Moussa',
                    'code' => 4804,
                ],
                4 => [
                    'name' => 'Belassel Bouzegza',
                    'code' => 4805,
                ],
                5 => [
                    'name' => 'Bendaoud',
                    'code' => 4806,
                ],
                6 => [
                    'name' => 'Beni Dergoun',
                    'code' => 4807,
                ],
                7 => [
                    'name' => 'Beni Zentis',
                    'code' => 4808,
                ],
                8 => [
                    'name' => 'Dar Ben Abdellah',
                    'code' => 4809,
                ],
                9 => [
                    'name' => 'Djidioua',
                    'code' => 48010,
                ],
                10 => [
                    'name' => 'El Guettar',
                    'code' => 4811,
                ],
                11 => [
                    'name' => 'El Hamadna',
                    'code' => 4812,
                ],
                12 => [
                    'name' => 'El Hassi',
                    'code' => 4813,
                ],
                13 => [
                    'name' => 'El Matmar',
                    'code' => 4814,
                ],
                14 => [
                    'name' => 'El Ouldja',
                    'code' => 4815,
                ],
                15 => [
                    'name' => 'Had Echkalla',
                    'code' => 4816,
                ],
                16 => [
                    'name' => 'Hamri',
                    'code' => 4817,
                ],
                17 => [
                    'name' => 'Kalaa',
                    'code' => 4818,
                ],
                18 => [
                    'name' => 'Lahlef',
                    'code' => 4819,
                ],
                19 => [
                    'name' => 'Mazouna',
                    'code' => 4820,
                ],
                20 => [
                    'name' => 'Mediouna',
                    'code' => 4821,
                ],
                21 => [
                    'name' => 'Mendes',
                    'code' => 4822,
                ],
                22 => [
                    'name' => 'Merdja Sidi Abed',
                    'code' => 4823,
                ],
                23 => [
                    'name' => 'Ouarizane',
                    'code' => 4824,
                ],
                24 => [
                    'name' => 'Oued Essalem',
                    'code' => 4825,
                ],
                25 => [
                    'name' => 'Oued Rhiou',
                    'code' => 4826,
                ],
                26 => [
                    'name' => 'Ouled Aiche',
                    'code' => 4827,
                ],
                27 => [
                    'name' => 'Oued El Djemaa',
                    'code' => 4828,
                ],
                28 => [
                    'name' => 'Ouled Sidi Mihoub',
                    'code' => 4829,
                ],
                29 => [
                    'name' => 'Ramka',
                    'code' => 4830,
                ],
                30 => [
                    'name' => 'Relizane',
                    'code' => 4831,
                ],
                31 => [
                    'name' => 'Sidi Khettab',
                    'code' => 4832,
                ],
                32 => [
                    'name' => 'Sidi Lazreg',
                    'code' => 4833,
                ],
                33 => [
                    'name' => 'Sidi M\'Hamed Ben Ali',
                    'code' => 4834,
                ],
                34 => [
                    'name' => 'Sidi M\'Hamed Benaouda',
                    'code' => 4835,
                ],
                35 => [
                    'name' => 'Sidi Saada',
                    'code' => 4836,
                ],
                36 => [
                    'name' => 'Souk El Had',
                    'code' => 4837,
                ],
                37 => [
                    'name' => 'Yellel',
                    'code' => 4838,
                ],
                38 => [
                    'name' => 'Zemmora',
                    'code' => 4839,
                ],
            ]
        ];

        foreach ($townsByWilaya as $wilaya_id => $towns) {
            foreach ($towns as $town) {
                $townEntry = array_merge(['wilaya_id' => (int)$wilaya_id], $town);
                Town::create($townEntry);
            }
        }

        //
    }
}
