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
                    'code' => 1001,
                ],
                1 => [
                    'name' => 'Tamest',
                    'code' => 1002,
                ],
                2 => [
                    'name' => 'Charouine',
                    'code' => 1003,
                ],
                3 => [
                    'name' => 'Reggane',
                    'code' => 1004,
                ],
                4 => [
                    'name' => 'In Zghmir',
                    'code' => 1005,
                ],
                5 => [
                    'name' => 'Tit',
                    'code' => 1006,
                ],
                6 => [
                    'name' => 'Ksar Kaddour',
                    'code' => 1007,
                ],
                7 => [
                    'name' => 'Tsabit',
                    'code' => 1008,
                ],
                8 => [
                    'name' => 'Timimoun',
                    'code' => 1009,
                ],
                9 => [
                    'name' => 'Ouled Saïd',
                    'code' => 1010,
                ],
                10 => [
                    'name' => 'Zaouiet Kounta',
                    'code' => 1011,
                ],
                11 => [
                    'name' => 'Aoulef',
                    'code' => 1012,
                ],
                12 => [
                    'name' => 'Tamekten',
                    'code' => 1013,
                ],
                13 => [
                    'name' => 'Tamantit',
                    'code' => 1014,
                ],
                14 => [
                    'name' => 'Fenoughil',
                    'code' => 1015,
                ],
                15 => [
                    'name' => 'Tinerkouk',
                    'code' => 1016,
                ],
                16 => [
                    'name' => 'Deldoul',
                    'code' => 1017,
                ],
                17 => [
                    'name' => 'Sali',
                    'code' => 1018,
                ],
                18 => [
                    'name' => 'Akabli',
                    'code' => 1019,
                ],
                19 => [
                    'name' => 'Metarfa',
                    'code' => 1020,
                ],
                20 => [
                    'name' => 'Ouled Ahmed Tammi',
                    'code' => 1021,
                ],
                21 => [
                    'name' => 'Bouda',
                    'code' => 1022,
                ],
                22 => [
                    'name' => 'Aougrout',
                    'code' => 1023,
                ],
                23 => [
                    'name' => 'Talmine',
                    'code' => 1024,
                ],
                24 => [
                    'name' => 'Bordj Badji Mokhtar',
                    'code' => 1025,
                ],
                25 => [
                    'name' => 'Sebaa',
                    'code' => 1026,
                ],
                26 => [
                    'name' => 'Ouled Aïssa',
                    'code' => 1027,
                ],
                27 => [
                    'name' => 'Timiaouine',
                    'code' => 1028,
                ],
            ],
            2 => [
                0 => [
                    'name' => 'Chlef',
                    'code' => 2001,
                ],
                1 => [
                    'name' => 'Ténès',
                    'code' => 2002,
                ],
                2 => [
                    'name' => 'Bénairia',
                    'code' => 2003,
                ],
                3 => [
                    'name' => 'El Karimia',
                    'code' => 2004,
                ],
                4 => [
                    'name' => 'Tadjena',
                    'code' => 2005,
                ],
                5 => [
                    'name' => 'Taougrite',
                    'code' => 2006,
                ],
                6 => [
                    'name' => 'Beni Haoua',
                    'code' => 2007,
                ],
                7 => [
                    'name' => 'Sobha',
                    'code' => 2008,
                ],
                8 => [
                    'name' => 'Harchoun',
                    'code' => 2009,
                ],
                9 => [
                    'name' => 'Ouled Fares',
                    'code' => 2010,
                ],
                10 => [
                    'name' => 'Sidi Akkacha',
                    'code' => 2011,
                ],
                11 => [
                    'name' => 'Boukadir',
                    'code' => 2012,
                ],
                12 => [
                    'name' => 'Beni Rached',
                    'code' => 2013,
                ],
                13 => [
                    'name' => 'Talassa',
                    'code' => 2014,
                ],
                14 => [
                    'name' => 'Harenfa',
                    'code' => 2015,
                ],
                15 => [
                    'name' => 'Oued Goussine',
                    'code' => 2016,
                ],
                16 => [
                    'name' => 'Dahra',
                    'code' => 2017,
                ],
                17 => [
                    'name' => 'Ouled Abbes',
                    'code' => 2018,
                ],
                18 => [
                    'name' => 'Sendjas',
                    'code' => 2019,
                ],
                19 => [
                    'name' => 'Zeboudja',
                    'code' => 2020,
                ],
                20 => [
                    'name' => 'Oued Sly',
                    'code' => 2021,
                ],
                21 => [
                    'name' => 'Abou El Hassan',
                    'code' => 2022,
                ],
                22 => [
                    'name' => 'El Marsa',
                    'code' => 2023,
                ],
                23 => [
                    'name' => 'Chettia',
                    'code' => 2024,
                ],
                24 => [
                    'name' => 'Sidi Abderrahmane',
                    'code' => 2025,
                ],
                25 => [
                    'name' => 'Moussadek',
                    'code' => 2026,
                ],
                26 => [
                    'name' => 'El Hadjadj',
                    'code' => 2027,
                ],
                27 => [
                    'name' => 'Labiod Medjadja',
                    'code' => 2028,
                ],
                28 => [
                    'name' => 'Oued Fodda',
                    'code' => 2029,
                ],
                29 => [
                    'name' => 'Ouled Ben Abdelkader',
                    'code' => 2030,
                ],
                30 => [
                    'name' => 'Bouzeghaia',
                    'code' => 2031,
                ],
                31 => [
                    'name' => 'Aïn Merane',
                    'code' => 2032,
                ],
                32 => [
                    'name' => 'Oum Drou',
                    'code' => 2033,
                ],
                33 => [
                    'name' => 'Breira',
                    'code' => 2034,
                ],
                34 => [
                    'name' => 'Beni Bouateb',
                    'code' => 2035,
                ],
            ],
            3 => [
                0 => [
                    'name' => 'Laghouat',
                    'code' => 3001,
                ],
                1 => [
                    'name' => 'Ksar El Hirane',
                    'code' => 3002,
                ],
                2 => [
                    'name' => 'Bennasser Benchohra',
                    'code' => 3003,
                ],
                3 => [
                    'name' => 'Sidi Makhlouf',
                    'code' => 3004,
                ],
                4 => [
                    'name' => 'Hassi Delaa',
                    'code' => 3005,
                ],
                5 => [
                    'name' => 'Hassi R\'Mel',
                    'code' => 3006,
                ],
                6 => [
                    'name' => 'Aïn Madhi',
                    'code' => 3007,
                ],
                7 => [
                    'name' => 'Tadjemout',
                    'code' => 3008,
                ],
                8 => [
                    'name' => 'Kheneg',
                    'code' => 3009,
                ],
                9 => [
                    'name' => 'Gueltat Sidi Saad',
                    'code' => 3010,
                ],
                10 => [
                    'name' => 'Aïn Sidi Ali',
                    'code' => 3011,
                ],
                11 => [
                    'name' => 'Beidha',
                    'code' => 3012,
                ],
                12 => [
                    'name' => 'Brida',
                    'code' => 3013,
                ],
                13 => [
                    'name' => 'El Ghicha',
                    'code' => 3014,
                ],
                14 => [
                    'name' => 'Hadj Mechri',
                    'code' => 3015,
                ],
                15 => [
                    'name' => 'Sebgag',
                    'code' => 3016,
                ],
                16 => [
                    'name' => 'Taouiala',
                    'code' => 3017,
                ],
                17 => [
                    'name' => 'Tadjrouna',
                    'code' => 3018,
                ],
                18 => [
                    'name' => 'Aflou',
                    'code' => 3019,
                ],
                19 => [
                    'name' => 'El Assafia',
                    'code' => 3020,
                ],
                20 => [
                    'name' => 'Oued Morra',
                    'code' => 3021,
                ],
                21 => [
                    'name' => 'Oued M\'Zi',
                    'code' => 3022,
                ],
                22 => [
                    'name' => 'El Houaita',
                    'code' => 3023,
                ],
                23 => [
                    'name' => 'Sidi Bouzid',
                    'code' => 3024,
                ],
            ],
            4 => [
                0 => [
                    'name' => 'Oum el Bouaghi',
                    'code' => 4001,
                ],
                1 => [
                    'name' => 'Aïn Beïda',
                    'code' => 4002,
                ],
                2 => [
                    'name' => 'Aïn M\'lila',
                    'code' => 4003,
                ],
                3 => [
                    'name' => 'Behir Chergui',
                    'code' => 4004,
                ],
                4 => [
                    'name' => 'El Amiria',
                    'code' => 4005,
                ],
                5 => [
                    'name' => 'Sigus',
                    'code' => 4006,
                ],
                6 => [
                    'name' => 'El Belala',
                    'code' => 4007,
                ],
                7 => [
                    'name' => 'Aïn Babouche',
                    'code' => 4008,
                ],
                8 => [
                    'name' => 'Berriche',
                    'code' => 4009,
                ],
                9 => [
                    'name' => 'Ouled Hamla',
                    'code' => 4010,
                ],
                10 => [
                    'name' => 'Dhalaa',
                    'code' => 4011,
                ],
                11 => [
                    'name' => 'Aïn Kercha',
                    'code' => 4012,
                ],
                12 => [
                    'name' => 'Hanchir Toumghani',
                    'code' => 4013,
                ],
                13 => [
                    'name' => 'El Djazia',
                    'code' => 4014,
                ],
                14 => [
                    'name' => 'Aïn Diss',
                    'code' => 4015,
                ],
                15 => [
                    'name' => 'Fkirina',
                    'code' => 4016,
                ],
                16 => [
                    'name' => 'Souk Naamane',
                    'code' => 4017,
                ],
                17 => [
                    'name' => 'Zorg',
                    'code' => 4018,
                ],
                18 => [
                    'name' => 'El Fedjoudj Boughrara Saoudi',
                    'code' => 4019,
                ],
                19 => [
                    'name' => 'Ouled Zouaï',
                    'code' => 4020,
                ],
                20 => [
                    'name' => 'Bir Chouhada',
                    'code' => 4021,
                ],
                21 => [
                    'name' => 'Ksar Sbahi',
                    'code' => 4022,
                ],
                22 => [
                    'name' => 'Oued Nini',
                    'code' => 4023,
                ],
                23 => [
                    'name' => 'Meskiana',
                    'code' => 4024,
                ],
                24 => [
                    'name' => 'Aïn Fakroun',
                    'code' => 4025,
                ],
                25 => [
                    'name' => 'Rahia',
                    'code' => 4026,
                ],
                26 => [
                    'name' => 'Aïn Zitoun',
                    'code' => 4027,
                ],
                27 => [
                    'name' => 'Ouled Gacem',
                    'code' => 4028,
                ],
                28 => [
                    'name' => 'El Harmilia',
                    'code' => 4029,
                ],
            ],
            5 => [
                0 => [
                    'name' => 'Batna',
                    'code' => 5001,
                ],
                1 => [
                    'name' => 'Ghassira',
                    'code' => 5002,
                ],
                2 => [
                    'name' => 'Maafa',
                    'code' => 5003,
                ],
                3 => [
                    'name' => 'Merouana',
                    'code' => 5004,
                ],
                4 => [
                    'name' => 'Seriana',
                    'code' => 5005,
                ],
                5 => [
                    'name' => 'Menaa',
                    'code' => 5006,
                ],
                6 => [
                    'name' => 'El Madher',
                    'code' => 5007,
                ],
                7 => [
                    'name' => 'Tazoult',
                    'code' => 5008,
                ],
                8 => [
                    'name' => 'N\'Gaous',
                    'code' => 5009,
                ],
                9 => [
                    'name' => 'Guigba',
                    'code' => 5010,
                ],
                10 => [
                    'name' => 'Inoughissen',
                    'code' => 5011,
                ],
                11 => [
                    'name' => 'Ouyoun El Assafir',
                    'code' => 5012,
                ],
                12 => [
                    'name' => 'Djerma',
                    'code' => 5013,
                ],
                13 => [
                    'name' => 'Bitam',
                    'code' => 5014,
                ],
                14 => [
                    'name' => 'Abdelkader Azil',
                    'code' => 5015,
                ],
                15 => [
                    'name' => 'Arris',
                    'code' => 5016,
                ],
                16 => [
                    'name' => 'Kimmel',
                    'code' => 5017,
                ],
                17 => [
                    'name' => 'Tilatou',
                    'code' => 5018,
                ],
                18 => [
                    'name' => 'Aïn Djasser',
                    'code' => 5019,
                ],
                19 => [
                    'name' => 'Ouled Sellam',
                    'code' => 5020,
                ],
                20 => [
                    'name' => 'Tigherghar',
                    'code' => 5021,
                ],
                21 => [
                    'name' => 'Aïn Yagout',
                    'code' => 5022,
                ],
                22 => [
                    'name' => 'Sefiane',
                    'code' => 5024,
                ],
                23 => [
                    'name' => 'Fesdis',
                    'code' => 5023,
                ],
                24 => [
                    'name' => 'Rahbat',
                    'code' => 5025,
                ],
                25 => [
                    'name' => 'Tighanimine',
                    'code' => 5026,
                ],
                26 => [
                    'name' => 'Lemsane',
                    'code' => 5027,
                ],
                27 => [
                    'name' => 'Ksar Bellezma',
                    'code' => 5028,
                ],
                28 => [
                    'name' => 'Seggana',
                    'code' => 5029,
                ],
                29 => [
                    'name' => 'Ichmoul',
                    'code' => 5030,
                ],
                30 => [
                    'name' => 'Foum Toub',
                    'code' => 5031,
                ],
                31 => [
                    'name' => 'Ben Foudhala El Hakania',
                    'code' => 5032,
                ],
                32 => [
                    'name' => 'Oued El Ma',
                    'code' => 5033,
                ],
                33 => [
                    'name' => 'Talkhamt',
                    'code' => 5034,
                ],
                34 => [
                    'name' => 'Bouzina',
                    'code' => 5035,
                ],
                35 => [
                    'name' => 'Chemora',
                    'code' => 5036,
                ],
                36 => [
                    'name' => 'Oued Chaaba',
                    'code' => 5037,
                ],
                37 => [
                    'name' => 'Taxlent',
                    'code' => 5038,
                ],
                38 => [
                    'name' => 'Gosbat',
                    'code' => 5039,
                ],
                39 => [
                    'name' => 'Ouled Aouf',
                    'code' => 5040,
                ],
                40 => [
                    'name' => 'Boumagueur',
                    'code' => 5041,
                ],
                41 => [
                    'name' => 'Barika',
                    'code' => 5042,
                ],
                42 => [
                    'name' => 'Djezar',
                    'code' => 5043,
                ],
                43 => [
                    'name' => 'T\'Kout',
                    'code' => 5044,
                ],
                44 => [
                    'name' => 'Aïn Touta',
                    'code' => 5045,
                ],
                45 => [
                    'name' => 'Hidoussa',
                    'code' => 5046,
                ],
                46 => [
                    'name' => 'Teniet El Abed',
                    'code' => 5047,
                ],
                47 => [
                    'name' => 'Oued Taga',
                    'code' => 5048,
                ],
                48 => [
                    'name' => 'Ouled Fadel',
                    'code' => 5049,
                ],
                49 => [
                    'name' => 'Timgad',
                    'code' => 5050,
                ],
                50 => [
                    'name' => 'Ras El Aioun',
                    'code' => 5051,
                ],
                51 => [
                    'name' => 'Chir',
                    'code' => 5052,
                ],
                52 => [
                    'name' => 'Ouled Si Slimane',
                    'code' => 5053,
                ],
                53 => [
                    'name' => 'Zanat El Beida',
                    'code' => 5054,
                ],
                54 => [
                    'name' => 'M\'doukel',
                    'code' => 5055,
                ],
                55 => [
                    'name' => 'Ouled Ammar',
                    'code' => 5056,
                ],
                56 => [
                    'name' => 'El Hassi',
                    'code' => 5057,
                ],
                57 => [
                    'name' => 'Lazrou',
                    'code' => 5058,
                ],
                58 => [
                    'name' => 'Boumia (Batna)',
                    'code' => 5059,
                ],
                59 => [
                    'name' => 'Boulhilat',
                    'code' => 5060,
                ],
                60 => [
                    'name' => 'Larbaâ',
                    'code' => 5061,
                ],
            ],
            6 => [
                0 => [
                    'name' => 'Béjaïa',
                    'code' => 6001,
                ],
                1 => [
                    'name' => 'Amizour',
                    'code' => 6002,
                ],
                2 => [
                    'name' => 'Ferraoun',
                    'code' => 6003,
                ],
                3 => [
                    'name' => 'Taourirt Ighil',
                    'code' => 6004,
                ],
                4 => [
                    'name' => 'Chellata',
                    'code' => 6005,
                ],
                5 => [
                    'name' => 'Tamokra',
                    'code' => 6006,
                ],
                6 => [
                    'name' => 'Timezrit',
                    'code' => 6007,
                ],
                7 => [
                    'name' => 'Souk El Ténine',
                    'code' => 6008,
                ],
                8 => [
                    'name' => 'M\'cisna',
                    'code' => 6009,
                ],
                9 => [
                    'name' => 'Tinabdher',
                    'code' => 6010,
                ],
                10 => [
                    'name' => 'Tichy',
                    'code' => 6011,
                ],
                11 => [
                    'name' => 'Semaoun',
                    'code' => 6012,
                ],
                12 => [
                    'name' => 'Kendira',
                    'code' => 6013,
                ],
                13 => [
                    'name' => 'Tifra',
                    'code' => 6014,
                ],
                14 => [
                    'name' => 'Ighram',
                    'code' => 6015,
                ],
                15 => [
                    'name' => 'Amalou',
                    'code' => 6016,
                ],
                16 => [
                    'name' => 'Ighil Ali',
                    'code' => 6017,
                ],
                17 => [
                    'name' => 'Fenaïa Ilmaten',
                    'code' => 6018,
                ],
                18 => [
                    'name' => 'Toudja',
                    'code' => 6019,
                ],
                19 => [
                    'name' => 'Darguina',
                    'code' => 6020,
                ],
                20 => [
                    'name' => 'Sidi-Ayad',
                    'code' => 6021,
                ],
                21 => [
                    'name' => 'Aokas',
                    'code' => 6022,
                ],
                22 => [
                    'name' => 'Ait Djellil',
                    'code' => 6023,
                ],
                23 => [
                    'name' => 'Adekar',
                    'code' => 6024,
                ],
                24 => [
                    'name' => 'Akbou',
                    'code' => 6025,
                ],
                25 => [
                    'name' => 'Seddouk',
                    'code' => 6026,
                ],
                26 => [
                    'name' => 'Tazmalt',
                    'code' => 6027,
                ],
                27 => [
                    'name' => 'Aït-R\'zine',
                    'code' => 6028,
                ],
                28 => [
                    'name' => 'Chemini',
                    'code' => 6029,
                ],
                29 => [
                    'name' => 'Souk-Oufella',
                    'code' => 6030,
                ],
                30 => [
                    'name' => 'Taskriout',
                    'code' => 6031,
                ],
                31 => [
                    'name' => 'Tibane',
                    'code' => 6032,
                ],
                32 => [
                    'name' => 'Tala Hamza',
                    'code' => 6033,
                ],
                33 => [
                    'name' => 'Barbacha',
                    'code' => 6034,
                ],
                34 => [
                    'name' => 'Aït Ksila',
                    'code' => 6035,
                ],
                35 => [
                    'name' => 'Ouzellaguen',
                    'code' => 6036,
                ],
                36 => [
                    'name' => 'Bouhamza',
                    'code' => 6037,
                ],
                37 => [
                    'name' => 'Beni Mellikeche',
                    'code' => 6038,
                ],
                38 => [
                    'name' => 'Sidi-Aïch',
                    'code' => 6039,
                ],
                39 => [
                    'name' => 'El Kseur',
                    'code' => 6040,
                ],
                40 => [
                    'name' => 'Melbou',
                    'code' => 6041,
                ],
                41 => [
                    'name' => 'Akfadou',
                    'code' => 6042,
                ],
                42 => [
                    'name' => 'Leflaye',
                    'code' => 6043,
                ],
                43 => [
                    'name' => 'Kherrata',
                    'code' => 6044,
                ],
                44 => [
                    'name' => 'Draâ El-Kaïd',
                    'code' => 6045,
                ],
                45 => [
                    'name' => 'Tamridjet',
                    'code' => 6046,
                ],
                46 => [
                    'name' => 'Aït-Smail',
                    'code' => 6047,
                ],
                47 => [
                    'name' => 'Boukhelifa',
                    'code' => 6048,
                ],
                48 => [
                    'name' => 'Tizi N\'Berber',
                    'code' => 6049,
                ],
                49 => [
                    'name' => 'Aït Maouche',
                    'code' => 6050,
                ],
                50 => [
                    'name' => 'Oued Ghir',
                    'code' => 6051,
                ],
                51 => [
                    'name' => 'Boudjellil',
                    'code' => 6052,
                ],
            ],
            7 => [
                0 => [
                    'name' => 'Aïn Naga',
                    'code' => 7001,
                ],
                1 => [
                    'name' => 'Aïn Zaatout',
                    'code' => 7002,
                ],
                2 => [
                    'name' => 'Biskra',
                    'code' => 7003,
                ],
                3 => [
                    'name' => 'Bordj Ben Azzouz',
                    'code' => 7004,
                ],
                4 => [
                    'name' => 'Bouchagroune',
                    'code' => 7005,
                ],
                5 => [
                    'name' => 'Branis',
                    'code' => 7006,
                ],
                6 => [
                    'name' => 'Chetma',
                    'code' => 7007,
                ],
                7 => [
                    'name' => 'Djemorah',
                    'code' => 7008,
                ],
                8 => [
                    'name' => 'El Feidh',
                    'code' => 7009,
                ],
                9 => [
                    'name' => 'El Ghrous',
                    'code' => 70010,
                ],
                10 => [
                    'name' => 'El Hadjeb',
                    'code' => 7011,
                ],
                11 => [
                    'name' => 'El Haouch',
                    'code' => 7012,
                ],
                12 => [
                    'name' => 'El Kantara',
                    'code' => 7013,
                ],
                13 => [
                    'name' => 'El Mizaraa',
                    'code' => 7014,
                ],
                14 => [
                    'name' => 'El Outaya',
                    'code' => 7015,
                ],
                15 => [
                    'name' => 'Foughala',
                    'code' => 7016,
                ],
                16 => [
                    'name' => 'Khenguet Sidi Nadji',
                    'code' => 7017,
                ],
                17 => [
                    'name' => 'Lichana',
                    'code' => 7018,
                ],
                18 => [
                    'name' => 'Lioua',
                    'code' => 7019,
                ],
                19 => [
                    'name' => 'M\'Chouneche',
                    'code' => 7020,
                ],
                20 => [
                    'name' => 'Mekhadma',
                    'code' => 7021,
                ],
                21 => [
                    'name' => 'M\'Lili',
                    'code' => 7022,
                ],
                22 => [
                    'name' => 'Oumache',
                    'code' => 7023,
                ],
                23 => [
                    'name' => 'Ourlal',
                    'code' => 7024,
                ],
                24 => [
                    'name' => 'Sidi Okba',
                    'code' => 7025,
                ],
                25 => [
                    'name' => 'Tolga',
                    'code' => 7026,
                ],
                26 => [
                    'name' => 'Zeribet El Oued',
                    'code' => 7027,
                ],
            ],
            8 => [
                0 => [
                    'name' => 'Béchar',
                    'code' => 8001,
                ],
                1 => [
                    'name' => 'Erg Ferradj',
                    'code' => 8002,
                ],
                2 => [
                    'name' => 'Ouled Khoudir',
                    'code' => 8003,
                ],
                3 => [
                    'name' => 'Meridja',
                    'code' => 8004,
                ],
                4 => [
                    'name' => 'Timoudi',
                    'code' => 8005,
                ],
                5 => [
                    'name' => 'Lahmar',
                    'code' => 8006,
                ],
                6 => [
                    'name' => 'Béni Abbès',
                    'code' => 8007,
                ],
                7 => [
                    'name' => 'Beni Ikhlef',
                    'code' => 8008,
                ],
                8 => [
                    'name' => 'Mechraa Houari Boumedienne',
                    'code' => 8009,
                ],
                9 => [
                    'name' => 'Kenadsa',
                    'code' => 8010,
                ],
                10 => [
                    'name' => 'Igli',
                    'code' => 8011,
                ],
                11 => [
                    'name' => 'Tabelbala',
                    'code' => 8012,
                ],
                12 => [
                    'name' => 'Taghit',
                    'code' => 8013,
                ],
                13 => [
                    'name' => 'El Ouata',
                    'code' => 8014,
                ],
                14 => [
                    'name' => 'Boukais',
                    'code' => 8015,
                ],
                15 => [
                    'name' => 'Mougheul',
                    'code' => 80016,
                ],
                16 => [
                    'name' => 'Abadla',
                    'code' => 8017,
                ],
                17 => [
                    'name' => 'Kerzaz',
                    'code' => 8018,
                ],
                18 => [
                    'name' => 'Ksabi',
                    'code' => 8019,
                ],
                19 => [
                    'name' => 'Tamtert',
                    'code' => 8020,
                ],
                20 => [
                    'name' => 'Beni Ounif',
                    'code' => 8021,
                ],
            ],
            9 => [
                0 => [
                    'name' => 'Blida',
                    'code' => 9001,
                ],
                1 => [
                    'name' => 'Chebli',
                    'code' => 9002,
                ],
                2 => [
                    'name' => 'Bouinan',
                    'code' => 9003,
                ],
                3 => [
                    'name' => 'Oued Alleug',
                    'code' => 9004,
                ],
                4 => [
                    'name' => 'Ouled Yaïch',
                    'code' => 9007,
                ],
                5 => [
                    'name' => 'Chréa',
                    'code' => 9008,
                ],
                6 => [
                    'name' => 'El Affroun',
                    'code' => 9010,
                ],
                7 => [
                    'name' => 'Chiffa',
                    'code' => 9011,
                ],
                8 => [
                    'name' => 'Hammam Melouane',
                    'code' => 9012,
                ],
                9 => [
                    'name' => 'Benkhelil',
                    'code' => 9013,
                ],
                10 => [
                    'name' => 'Soumaa',
                    'code' => 9014,
                ],
                11 => [
                    'name' => 'Mouzaia',
                    'code' => 9016,
                ],
                12 => [
                    'name' => 'Souhane',
                    'code' => 9017,
                ],
                13 => [
                    'name' => 'Meftah',
                    'code' => 9018,
                ],
                14 => [
                    'name' => 'Ouled Slama',
                    'code' => 9019,
                ],
                15 => [
                    'name' => 'Boufarik',
                    'code' => 9020,
                ],
                16 => [
                    'name' => 'Larbaa',
                    'code' => 9021,
                ],
                17 => [
                    'name' => 'Oued Djer',
                    'code' => 9022,
                ],
                18 => [
                    'name' => 'Beni Tamou',
                    'code' => 9023,
                ],
                19 => [
                    'name' => 'Bouarfa',
                    'code' => 9024,
                ],
                20 => [
                    'name' => 'Beni Mered',
                    'code' => 9025,
                ],
                21 => [
                    'name' => 'Bougara',
                    'code' => 9026,
                ],
                22 => [
                    'name' => 'Guerouaou',
                    'code' => 9027,
                ],
                23 => [
                    'name' => 'Aïn Romana',
                    'code' => 9028,
                ],
                24 => [
                    'name' => 'Djebabra',
                    'code' => 9029,
                ],
            ],
            10 => [
                0 => [
                    'name' => 'Aïn Bessem',
                    'code' => 10001,
                ],
                1 => [
                    'name' => 'Hanif',
                    'code' => 10002,
                ],
                2 => [
                    'name' => 'Aghbalou',
                    'code' => 10003,
                ],
                3 => [
                    'name' => 'Aïn El Hadjar',
                    'code' => 10004,
                ],
                4 => [
                    'name' => 'Ahl El Ksar',
                    'code' => 10005,
                ],
                5 => [
                    'name' => 'Aïn Laloui',
                    'code' => 10006,
                ],
                6 => [
                    'name' => 'Ath Mansour',
                    'code' => 10007,
                ],
                7 => [
                    'name' => 'Aomar',
                    'code' => 10008,
                ],
                8 => [
                    'name' => 'Aïn El Turc',
                    'code' => 10009,
                ],
                9 => [
                    'name' => 'Aït Laziz',
                    'code' => 100010,
                ],
                10 => [
                    'name' => 'Bouderbala',
                    'code' => 10011,
                ],
                11 => [
                    'name' => 'Bechloul',
                    'code' => 10012,
                ],
                12 => [
                    'name' => 'Bir Ghbalou',
                    'code' => 10013,
                ],
                13 => [
                    'name' => 'Boukram',
                    'code' => 10014,
                ],
                14 => [
                    'name' => 'Bordj Okhriss',
                    'code' => 10015,
                ],
                15 => [
                    'name' => 'Bouira',
                    'code' => 10016,
                ],
                16 => [
                    'name' => 'Chorfa',
                    'code' => 10017,
                ],
                17 => [
                    'name' => 'Dechmia',
                    'code' => 10018,
                ],
                18 => [
                    'name' => 'Dirrah',
                    'code' => 10019,
                ],
                19 => [
                    'name' => 'Djebahia',
                    'code' => 10020,
                ],
                20 => [
                    'name' => 'El Hakimia',
                    'code' => 10021,
                ],
                21 => [
                    'name' => 'El Hachimia',
                    'code' => 10022,
                ],
                22 => [
                    'name' => 'El Adjiba',
                    'code' => 10023,
                ],
                23 => [
                    'name' => 'El Khabouzia',
                    'code' => 10024,
                ],
                24 => [
                    'name' => 'El Mokrani',
                    'code' => 10025,
                ],
                25 => [
                    'name' => 'El Asnam',
                    'code' => 10026,
                ],
                26 => [
                    'name' => 'Guerrouma',
                    'code' => 10027,
                ],
                27 => [
                    'name' => 'Haizer',
                    'code' => 10028,
                ],
                28 => [
                    'name' => 'Hadjera Zerga',
                    'code' => 10029,
                ],
                29 => [
                    'name' => 'Kadiria',
                    'code' => 10030,
                ],
                30 => [
                    'name' => 'Lakhdaria',
                    'code' => 10031,
                ],
                31 => [
                    'name' => 'M\'Chedallah',
                    'code' => 10032,
                ],
                32 => [
                    'name' => 'Mezdour',
                    'code' => 10033,
                ],
                33 => [
                    'name' => 'Maala',
                    'code' => 10034,
                ],
                34 => [
                    'name' => 'Maamora',
                    'code' => 10035,
                ],
                35 => [
                    'name' => 'Oued El Berdi',
                    'code' => 10036,
                ],
                36 => [
                    'name' => 'Ouled Rached',
                    'code' => 10037,
                ],
                37 => [
                    'name' => 'Raouraoua',
                    'code' => 10038,
                ],
                38 => [
                    'name' => 'Ridane',
                    'code' => 10039,
                ],
                39 => [
                    'name' => 'Saharidj',
                    'code' => 10040,
                ],
                40 => [
                    'name' => 'Sour El Ghouzlane',
                    'code' => 10041,
                ],
                41 => [
                    'name' => 'Souk El Khemis',
                    'code' => 10042,
                ],
                42 => [
                    'name' => 'Taguedit',
                    'code' => 10043,
                ],
                43 => [
                    'name' => 'Taghzout',
                    'code' => 10044,
                ],
                44 => [
                    'name' => 'Zbarbar',
                    'code' => 10045,
                ],
            ],
            11 => [
                0 => [
                    'name' => 'Tamanrasset',
                    'code' => 11001,
                ],
                1 => [
                    'name' => 'Abalessa',
                    'code' => 11002,
                ],
                2 => [
                    'name' => 'Idles',
                    'code' => 11005,
                ],
                3 => [
                    'name' => 'Tazrouk',
                    'code' => 11006,
                ],
                4 => [
                    'name' => 'In Amguel',
                    'code' => 11009,
                ],
            ],
            12 => [
                0 => [
                    'name' => 'Tébessa',
                    'code' => 12001,
                ],
                1 => [
                    'name' => 'Bir el-Ater',
                    'code' => 12002,
                ],
                2 => [
                    'name' => 'Cheria',
                    'code' => 12003,
                ],
                3 => [
                    'name' => 'Stah Guentis',
                    'code' => 12004,
                ],
                4 => [
                    'name' => 'El Aouinet',
                    'code' => 12005,
                ],
                5 => [
                    'name' => 'El Houidjbet',
                    'code' => 12006,
                ],
                6 => [
                    'name' => 'Safsaf El Ouesra',
                    'code' => 12007,
                ],
                7 => [
                    'name' => 'Hammamet',
                    'code' => 12008,
                ],
                8 => [
                    'name' => 'Negrine',
                    'code' => 12009,
                ],
                9 => [
                    'name' => 'Bir Mokkadem',
                    'code' => 12010,
                ],
                10 => [
                    'name' => 'El Kouif',
                    'code' => 12011,
                ],
                11 => [
                    'name' => 'Morsott',
                    'code' => 12012,
                ],
                12 => [
                    'name' => 'El Ogla',
                    'code' => 12013,
                ],
                13 => [
                    'name' => 'Bir Dheb',
                    'code' => 12014,
                ],
                14 => [
                    'name' => 'Ogla Melha',
                    'code' => 12015,
                ],
                15 => [
                    'name' => 'Guorriguer',
                    'code' => 12016,
                ],
                16 => [
                    'name' => 'Bekkaria',
                    'code' => 12017,
                ],
                17 => [
                    'name' => 'Boukhadra',
                    'code' => 12018,
                ],
                18 => [
                    'name' => 'Ouenza',
                    'code' => 12019,
                ],
                19 => [
                    'name' => 'El Ma Labiodh',
                    'code' => 12020,
                ],
                20 => [
                    'name' => 'Oum Ali',
                    'code' => 12021,
                ],
                21 => [
                    'name' => 'Tlidjene',
                    'code' => 12022,
                ],
                22 => [
                    'name' => 'Aïn Zerga',
                    'code' => 12023,
                ],
                23 => [
                    'name' => 'El Meridj',
                    'code' => 12024,
                ],
                24 => [
                    'name' => 'Boulhaf Dir',
                    'code' => 12025,
                ],
                25 => [
                    'name' => 'Bedjene',
                    'code' => 12026,
                ],
                26 => [
                    'name' => 'El Mezeraa',
                    'code' => 12027,
                ],
                27 => [
                    'name' => 'Ferkane',
                    'code' => 12028,
                ],
            ],
            13 => [
                0 => [
                    'name' => 'Tlemcen',
                    'code' => 13001,
                ],
                1 => [
                    'name' => 'Beni Mester',
                    'code' => 13002,
                ],
                2 => [
                    'name' => 'Aïn Tallout',
                    'code' => 13003,
                ],
                3 => [
                    'name' => 'Remchi',
                    'code' => 13004,
                ],
                4 => [
                    'name' => 'El Fehoul',
                    'code' => 13005,
                ],
                5 => [
                    'name' => 'Sabra',
                    'code' => 13006,
                ],
                6 => [
                    'name' => 'Ghazaouet',
                    'code' => 13007,
                ],
                7 => [
                    'name' => 'Souani',
                    'code' => 13008,
                ],
                8 => [
                    'name' => 'Djebala',
                    'code' => 13009,
                ],
                9 => [
                    'name' => 'El Gor',
                    'code' => 13010,
                ],
                10 => [
                    'name' => 'Oued Lakhdar',
                    'code' => 13011,
                ],
                11 => [
                    'name' => 'Aïn Fezza',
                    'code' => 13012,
                ],
                12 => [
                    'name' => 'Ouled Mimoun',
                    'code' => 13013,
                ],
                13 => [
                    'name' => 'Amieur',
                    'code' => 13014,
                ],
                14 => [
                    'name' => 'Aïn Youcef',
                    'code' => 13015,
                ],
                15 => [
                    'name' => 'Zenata',
                    'code' => 13016,
                ],
                16 => [
                    'name' => 'Beni Snous',
                    'code' => 13017,
                ],
                17 => [
                    'name' => 'Bab El Assa',
                    'code' => 13018,
                ],
                18 => [
                    'name' => 'Dar Yaghmouracene',
                    'code' => 13019,
                ],
                19 => [
                    'name' => 'Fellaoucene',
                    'code' => 13020,
                ],
                20 => [
                    'name' => 'Azails',
                    'code' => 13021,
                ],
                21 => [
                    'name' => 'Sebaa Chioukh',
                    'code' => 13022,
                ],
                22 => [
                    'name' => 'Terny Beni Hdiel',
                    'code' => 13023,
                ],
                23 => [
                    'name' => 'Bensekrane',
                    'code' => 13024,
                ],
                24 => [
                    'name' => 'Aïn Nehala',
                    'code' => 13025,
                ],
                25 => [
                    'name' => 'Hennaya',
                    'code' => 13026,
                ],
                26 => [
                    'name' => 'Maghnia',
                    'code' => 13027,
                ],
                27 => [
                    'name' => 'Hammam Boughrara',
                    'code' => 13028,
                ],
                28 => [
                    'name' => 'Souahlia',
                    'code' => 13029,
                ],
                29 => [
                    'name' => 'MSirda Fouaga',
                    'code' => 13030,
                ],
                30 => [
                    'name' => 'Aïn Fetah',
                    'code' => 13031,
                ],
                31 => [
                    'name' => 'El Aricha',
                    'code' => 13032,
                ],
                32 => [
                    'name' => 'Souk Tlata',
                    'code' => 13033,
                ],
                33 => [
                    'name' => 'Sidi Abdelli',
                    'code' => 13034,
                ],
                34 => [
                    'name' => 'Sebdou',
                    'code' => 13035,
                ],
                35 => [
                    'name' => 'Beni Ouarsous',
                    'code' => 13036,
                ],
                36 => [
                    'name' => 'Sidi Medjahed',
                    'code' => 13037,
                ],
                37 => [
                    'name' => 'Beni Boussaid',
                    'code' => 13038,
                ],
                38 => [
                    'name' => 'Marsa Ben M\'Hidi',
                    'code' => 13039,
                ],
                39 => [
                    'name' => 'Nedroma',
                    'code' => 13040,
                ],
                40 => [
                    'name' => 'Sidi Djillali',
                    'code' => 13041,
                ],
                41 => [
                    'name' => 'Beni Bahdel',
                    'code' => 13042,
                ],
                42 => [
                    'name' => 'El Bouihi',
                    'code' => 13043,
                ],
                43 => [
                    'name' => 'Honaïne',
                    'code' => 13044,
                ],
                44 => [
                    'name' => 'Tienet',
                    'code' => 13045,
                ],
                45 => [
                    'name' => 'Ouled Riyah',
                    'code' => 13046,
                ],
                46 => [
                    'name' => 'Bouhlou',
                    'code' => 13047,
                ],
                47 => [
                    'name' => 'Beni Khellad',
                    'code' => 13048,
                ],
                48 => [
                    'name' => 'Aïn Ghoraba',
                    'code' => 13049,
                ],
                49 => [
                    'name' => 'Chetouane',
                    'code' => 13050,
                ],
                50 => [
                    'name' => 'Mansourah',
                    'code' => 13051,
                ],
                51 => [
                    'name' => 'Beni Semiel',
                    'code' => 13052,
                ],
                52 => [
                    'name' => 'Aïn Kebira',
                    'code' => 13053,
                ],
            ],
            14 => [
                0 => [
                    'name' => 'Aïn Bouchekif',
                    'code' => 14001,
                ],
                1 => [
                    'name' => 'Aïn Deheb',
                    'code' => 14002,
                ],
                2 => [
                    'name' => 'Aïn El Hadid',
                    'code' => 14003,
                ],
                3 => [
                    'name' => 'Aïn Kermes',
                    'code' => 14004,
                ],
                4 => [
                    'name' => 'Aïn Dzarit',
                    'code' => 14005,
                ],
                5 => [
                    'name' => 'Bougara',
                    'code' => 14006,
                ],
                6 => [
                    'name' => 'Chehaima',
                    'code' => 14007,
                ],
                7 => [
                    'name' => 'Dahmouni',
                    'code' => 14008,
                ],
                8 => [
                    'name' => 'Djebilet Rosfa',
                    'code' => 14009,
                ],
                9 => [
                    'name' => 'Djillali Ben Amar',
                    'code' => 140010,
                ],
                10 => [
                    'name' => 'Faidja',
                    'code' => 14011,
                ],
                11 => [
                    'name' => 'Frenda',
                    'code' => 14012,
                ],
                12 => [
                    'name' => 'Guertoufa',
                    'code' => 14013,
                ],
                13 => [
                    'name' => 'Hamadia',
                    'code' => 14014,
                ],
                14 => [
                    'name' => 'Ksar Chellala',
                    'code' => 14015,
                ],
                15 => [
                    'name' => 'Madna',
                    'code' => 14016,
                ],
                16 => [
                    'name' => 'Mahdia',
                    'code' => 14017,
                ],
                17 => [
                    'name' => 'Mechraa Safa',
                    'code' => 14018,
                ],
                18 => [
                    'name' => 'Medrissa',
                    'code' => 14019,
                ],
                19 => [
                    'name' => 'Medroussa',
                    'code' => 14020,
                ],
                20 => [
                    'name' => 'Meghila',
                    'code' => 14021,
                ],
                21 => [
                    'name' => 'Mellakou',
                    'code' => 14022,
                ],
                22 => [
                    'name' => 'Nadorah',
                    'code' => 14023,
                ],
                23 => [
                    'name' => 'Naima',
                    'code' => 14024,
                ],
                24 => [
                    'name' => 'Oued Lilli',
                    'code' => 14025,
                ],
                25 => [
                    'name' => 'Rahouia',
                    'code' => 14026,
                ],
                26 => [
                    'name' => 'Rechaïga',
                    'code' => 14027,
                ],
                27 => [
                    'name' => 'Sebaïne',
                    'code' => 14028,
                ],
                28 => [
                    'name' => 'Sebt',
                    'code' => 14029,
                ],
                29 => [
                    'name' => 'Serghine',
                    'code' => 14030,
                ],
                30 => [
                    'name' => 'Si Abdelghani',
                    'code' => 14031,
                ],
                31 => [
                    'name' => 'Sidi Abderahmane',
                    'code' => 14032,
                ],
                32 => [
                    'name' => 'Sidi Ali Mellal',
                    'code' => 14033,
                ],
                33 => [
                    'name' => 'Sidi Bakhti',
                    'code' => 14034,
                ],
                34 => [
                    'name' => 'Sidi Hosni',
                    'code' => 14035,
                ],
                35 => [
                    'name' => 'Sougueur',
                    'code' => 14036,
                ],
                36 => [
                    'name' => 'Tagdemt',
                    'code' => 14037,
                ],
                37 => [
                    'name' => 'Takhemaret',
                    'code' => 14038,
                ],
                38 => [
                    'name' => 'Tiaret',
                    'code' => 14039,
                ],
                39 => [
                    'name' => 'Tidda',
                    'code' => 14040,
                ],
                40 => [
                    'name' => 'Tousnina',
                    'code' => 14041,
                ],
                41 => [
                    'name' => 'Zmalet El Emir Abdelkader',
                    'code' => 14042,
                ],
            ],
            15 => [
                0 => [
                    'name' => 'Tizi Ouzou',
                    'code' => 15001,
                ],
                1 => [
                    'name' => 'Ain El Hammam',
                    'code' => 15002,
                ],
                2 => [
                    'name' => 'Akbil',
                    'code' => 15003,
                ],
                3 => [
                    'name' => 'Freha',
                    'code' => 15004,
                ],
                4 => [
                    'name' => 'Souamaâ',
                    'code' => 15005,
                ],
                5 => [
                    'name' => 'Mechtras',
                    'code' => 15006,
                ],
                6 => [
                    'name' => 'Irdjen',
                    'code' => 15007,
                ],
                7 => [
                    'name' => 'Timizart',
                    'code' => 15008,
                ],
                8 => [
                    'name' => 'Makouda',
                    'code' => 15009,
                ],
                9 => [
                    'name' => 'Draâ El Mizan',
                    'code' => 15010,
                ],
                10 => [
                    'name' => 'Tizi Gheniff',
                    'code' => 15011,
                ],
                11 => [
                    'name' => 'Bounouh',
                    'code' => 15012,
                ],
                12 => [
                    'name' => 'Aït Chafâa',
                    'code' => 15013,
                ],
                13 => [
                    'name' => 'Frikat',
                    'code' => 15014,
                ],
                14 => [
                    'name' => 'Beni Aïssi',
                    'code' => 15015,
                ],
                15 => [
                    'name' => 'Aït Zmenzer',
                    'code' => 15016,
                ],
                16 => [
                    'name' => 'Iferhounène',
                    'code' => 15017,
                ],
                17 => [
                    'name' => 'Azazga',
                    'code' => 15018,
                ],
                18 => [
                    'name' => 'Illoula Oumalou',
                    'code' => 15019,
                ],
                19 => [
                    'name' => 'Yakouren',
                    'code' => 15020,
                ],
                20 => [
                    'name' => 'Larbaâ Nath Irathen',
                    'code' => 15021,
                ],
                21 => [
                    'name' => 'Tizi Rached',
                    'code' => 15022,
                ],
                22 => [
                    'name' => 'Zekri',
                    'code' => 15023,
                ],
                23 => [
                    'name' => 'Ouaguenoun',
                    'code' => 15024,
                ],
                24 => [
                    'name' => 'Aïn Zaouia',
                    'code' => 15025,
                ],
                25 => [
                    'name' => 'Imkiren',
                    'code' => 15026,
                ],
                26 => [
                    'name' => 'Aït Yahia',
                    'code' => 15027,
                ],
                27 => [
                    'name' => 'Aït Mahmoud',
                    'code' => 15028,
                ],
                28 => [
                    'name' => 'Mâatkas',
                    'code' => 15029,
                ],
                29 => [
                    'name' => 'Aït Boumahdi',
                    'code' => 15030,
                ],
                30 => [
                    'name' => 'Abi Youcef',
                    'code' => 15031,
                ],
                31 => [
                    'name' => 'Beni Douala',
                    'code' => 15032,
                ],
                32 => [
                    'name' => 'Illilten',
                    'code' => 15033,
                ],
                33 => [
                    'name' => 'Bouzeguène',
                    'code' => 15034,
                ],
                34 => [
                    'name' => 'Aït Aggouacha',
                    'code' => 15035,
                ],
                35 => [
                    'name' => 'Ouadhia',
                    'code' => 15036,
                ],
                36 => [
                    'name' => 'Azeffoun',
                    'code' => 15037,
                ],
                37 => [
                    'name' => 'Tigzirt',
                    'code' => 15038,
                ],
                38 => [
                    'name' => 'Aït Aïssa Mimoun',
                    'code' => 15039,
                ],
                39 => [
                    'name' => 'Boghni',
                    'code' => 15040,
                ],
                40 => [
                    'name' => 'Ifigha',
                    'code' => 15041,
                ],
                41 => [
                    'name' => 'Aït Oumalou',
                    'code' => 15042,
                ],
                42 => [
                    'name' => 'Tirmitine',
                    'code' => 15043,
                ],
                43 => [
                    'name' => 'Akerrou',
                    'code' => 15044,
                ],
                44 => [
                    'name' => 'Yatafen',
                    'code' => 15045,
                ],
                45 => [
                    'name' => 'Ath Zikki',
                    'code' => 15046,
                ],
                46 => [
                    'name' => 'Draâ Ben Khedda',
                    'code' => 15047,
                ],
                47 => [
                    'name' => 'Aït Ouacif',
                    'code' => 15048,
                ],
                48 => [
                    'name' => 'Idjeur',
                    'code' => 15049,
                ],
                49 => [
                    'name' => 'Mekla',
                    'code' => 15050,
                ],
                50 => [
                    'name' => 'Tizi N\'Tleta',
                    'code' => 15051,
                ],
                51 => [
                    'name' => 'Aït Yenni',
                    'code' => 15052,
                ],
                52 => [
                    'name' => 'Aghribs',
                    'code' => 15053,
                ],
                53 => [
                    'name' => 'Iflissen',
                    'code' => 15054,
                ],
                54 => [
                    'name' => 'Boudjima',
                    'code' => 15055,
                ],
                55 => [
                    'name' => 'Aït Yahia Moussa',
                    'code' => 15056,
                ],
                56 => [
                    'name' => 'Souk El Thenine',
                    'code' => 15057,
                ],
                57 => [
                    'name' => 'Aït Khellili',
                    'code' => 15058,
                ],
                58 => [
                    'name' => 'Sidi Namane',
                    'code' => 15059,
                ],
                59 => [
                    'name' => 'Iboudraren',
                    'code' => 15060,
                ],
                60 => [
                    'name' => 'Agouni Gueghrane',
                    'code' => 15061,
                ],
                61 => [
                    'name' => 'Mizrana',
                    'code' => 15062,
                ],
                62 => [
                    'name' => 'Imsouhel',
                    'code' => 15063,
                ],
                63 => [
                    'name' => 'Tadmaït',
                    'code' => 15064,
                ],
                64 => [
                    'name' => 'Aït Bouaddou',
                    'code' => 15065,
                ],
                65 => [
                    'name' => 'Assi Youcef',
                    'code' => 15066,
                ],
                66 => [
                    'name' => 'Aït Toudert',
                    'code' => 15067,
                ],
            ],
            16 => [
                0 => [
                    'name' => 'Alger-Centre',
                    'code' => 16001,
                ],
                1 => [
                    'name' => 'Sidi M\'Hamed',
                    'code' => 16002,
                ],
                2 => [
                    'name' => 'El Madania',
                    'code' => 16003,
                ],
                3 => [
                    'name' => 'Belouizdad',
                    'code' => 16004,
                ],
                4 => [
                    'name' => 'Bab El Oued',
                    'code' => 16005,
                ],
                5 => [
                    'name' => 'Bologhine',
                    'code' => 16006,
                ],
                6 => [
                    'name' => 'Casbah',
                    'code' => 16007,
                ],
                7 => [
                    'name' => 'Oued Koriche',
                    'code' => 16008,
                ],
                8 => [
                    'name' => 'Bir Mourad Raïs',
                    'code' => 16009,
                ],
                9 => [
                    'name' => 'El Biar',
                    'code' => 16010,
                ],
                10 => [
                    'name' => 'Bouzareah',
                    'code' => 16011,
                ],
                11 => [
                    'name' => 'Birkhadem',
                    'code' => 16012,
                ],
                12 => [
                    'name' => 'El Harrach',
                    'code' => 16013,
                ],
                13 => [
                    'name' => 'Baraki',
                    'code' => 16014,
                ],
                14 => [
                    'name' => 'Oued Smar',
                    'code' => 16015,
                ],
                15 => [
                    'name' => 'Bachdjerrah',
                    'code' => 16016,
                ],
                16 => [
                    'name' => 'Hussein Dey',
                    'code' => 16017,
                ],
                17 => [
                    'name' => 'Kouba',
                    'code' => 16018,
                ],
                18 => [
                    'name' => 'Bourouba',
                    'code' => 16019,
                ],
                19 => [
                    'name' => 'Dar El Beïda',
                    'code' => 16020,
                ],
                20 => [
                    'name' => 'Bab Ezzouar',
                    'code' => 16021,
                ],
                21 => [
                    'name' => 'Ben Aknoun',
                    'code' => 16022,
                ],
                22 => [
                    'name' => 'Dely Ibrahim',
                    'code' => 16023,
                ],
                23 => [
                    'name' => 'El Hammamet',
                    'code' => 16024,
                ],
                24 => [
                    'name' => 'Raïs Hamidou',
                    'code' => 16025,
                ],
                25 => [
                    'name' => 'Djasr Kasentina',
                    'code' => 16026,
                ],
                26 => [
                    'name' => 'El Mouradia',
                    'code' => 16027,
                ],
                27 => [
                    'name' => 'Hydra',
                    'code' => 16028,
                ],
                28 => [
                    'name' => 'Mohammadia',
                    'code' => 16029,
                ],
                29 => [
                    'name' => 'Bordj El Kiffan',
                    'code' => 16030,
                ],
                30 => [
                    'name' => 'El Magharia',
                    'code' => 16031,
                ],
                31 => [
                    'name' => 'Beni Messous',
                    'code' => 16032,
                ],
                32 => [
                    'name' => 'Les Eucalyptus',
                    'code' => 16033,
                ],
                33 => [
                    'name' => 'Birtouta',
                    'code' => 16034,
                ],
                34 => [
                    'name' => 'Tessala El Merdja',
                    'code' => 16035,
                ],
                35 => [
                    'name' => 'Ouled Chebel',
                    'code' => 16036,
                ],
                36 => [
                    'name' => 'Sidi Moussa',
                    'code' => 16037,
                ],
                37 => [
                    'name' => 'Aïn Taya',
                    'code' => 16038,
                ],
                38 => [
                    'name' => 'Bordj El Bahri',
                    'code' => 16039,
                ],
                39 => [
                    'name' => 'El Marsa',
                    'code' => 16040,
                ],
                40 => [
                    'name' => 'H\'raoua',
                    'code' => 16041,
                ],
                41 => [
                    'name' => 'Rouïba',
                    'code' => 16042,
                ],
                42 => [
                    'name' => 'Reghaïa',
                    'code' => 16043,
                ],
                43 => [
                    'name' => 'Aïn Benian',
                    'code' => 16044,
                ],
                44 => [
                    'name' => 'Staoueli',
                    'code' => 16045,
                ],
                45 => [
                    'name' => 'Zeralda',
                    'code' => 16046,
                ],
                46 => [
                    'name' => 'Mahelma',
                    'code' => 16047,
                ],
                47 => [
                    'name' => 'Rahmania',
                    'code' => 16048,
                ],
                48 => [
                    'name' => 'Souidania',
                    'code' => 16049,
                ],
                49 => [
                    'name' => 'Cheraga',
                    'code' => 16050,
                ],
                50 => [
                    'name' => 'Ouled Fayet',
                    'code' => 16051,
                ],
                51 => [
                    'name' => 'El Achour',
                    'code' => 16052,
                ],
                52 => [
                    'name' => 'Draria',
                    'code' => 16053,
                ],
                53 => [
                    'name' => 'Douera',
                    'code' => 16054,
                ],
                54 => [
                    'name' => 'Baba Hassen',
                    'code' => 16055,
                ],
                55 => [
                    'name' => 'Khraicia',
                    'code' => 16056,
                ],
                56 => [
                    'name' => 'Saoula',
                    'code' => 16057,
                ],
            ],
            17 => [
                0 => [
                    'name' => 'Aïn Chouhada',
                    'code' => 17001,
                ],
                1 => [
                    'name' => 'Aïn El Ibel',
                    'code' => 17002,
                ],
                2 => [
                    'name' => 'Aïn Feka',
                    'code' => 17003,
                ],
                3 => [
                    'name' => 'Aïn Maabed',
                    'code' => 17004,
                ],
                4 => [
                    'name' => 'Aïn Oussara',
                    'code' => 17005,
                ],
                5 => [
                    'name' => 'Amourah',
                    'code' => 17006,
                ],
                6 => [
                    'name' => 'Benhar',
                    'code' => 17007,
                ],
                7 => [
                    'name' => 'Beni Yagoub',
                    'code' => 17008,
                ],
                8 => [
                    'name' => 'Birine',
                    'code' => 17009,
                ],
                9 => [
                    'name' => 'Bouira Lahdab',
                    'code' => 170010,
                ],
                10 => [
                    'name' => 'Charef',
                    'code' => 17011,
                ],
                11 => [
                    'name' => 'Dar Chioukh',
                    'code' => 17012,
                ],
                12 => [
                    'name' => 'Deldoul',
                    'code' => 17013,
                ],
                13 => [
                    'name' => 'Djelfa',
                    'code' => 17014,
                ],
                14 => [
                    'name' => 'Douis',
                    'code' => 17015,
                ],
                15 => [
                    'name' => 'El Guedid',
                    'code' => 17016,
                ],
                16 => [
                    'name' => 'El Idrissia',
                    'code' => 17017,
                ],
                17 => [
                    'name' => 'El Khemis',
                    'code' => 17018,
                ],
                18 => [
                    'name' => 'Faidh El Botma',
                    'code' => 17019,
                ],
                19 => [
                    'name' => 'Guernini',
                    'code' => 17020,
                ],
                20 => [
                    'name' => 'Guettara',
                    'code' => 17021,
                ],
                21 => [
                    'name' => 'Had-Sahary',
                    'code' => 17022,
                ],
                22 => [
                    'name' => 'Hassi Bahbah',
                    'code' => 17023,
                ],
                23 => [
                    'name' => 'Hassi El Euch',
                    'code' => 17024,
                ],
                24 => [
                    'name' => 'Hassi Fedoul',
                    'code' => 17025,
                ],
                25 => [
                    'name' => 'Messaad',
                    'code' => 17026,
                ],
                26 => [
                    'name' => 'M\'Liliha',
                    'code' => 17027,
                ],
                27 => [
                    'name' => 'Moudjebara',
                    'code' => 17028,
                ],
                28 => [
                    'name' => 'Oum Laadham',
                    'code' => 17029,
                ],
                29 => [
                    'name' => 'Sed Rahal',
                    'code' => 17030,
                ],
                30 => [
                    'name' => 'Selmana',
                    'code' => 17031,
                ],
                31 => [
                    'name' => 'Sidi Baizid',
                    'code' => 17032,
                ],
                32 => [
                    'name' => 'Sidi Ladjel',
                    'code' => 17033,
                ],
                33 => [
                    'name' => 'Tadmit',
                    'code' => 17034,
                ],
                34 => [
                    'name' => 'Zaafrane',
                    'code' => 17035,
                ],
                35 => [
                    'name' => 'Zaccar',
                    'code' => 17036,
                ],
            ],
            18 => [
                0 => [
                    'name' => 'Jijel',
                    'code' => 18001,
                ],
                1 => [
                    'name' => 'Eraguene',
                    'code' => 18002,
                ],
                2 => [
                    'name' => 'El Aouana',
                    'code' => 18003,
                ],
                3 => [
                    'name' => 'Ziama Mansouriah',
                    'code' => 18004,
                ],
                4 => [
                    'name' => 'Taher',
                    'code' => 18005,
                ],
                5 => [
                    'name' => 'Emir Abdelkader',
                    'code' => 18006,
                ],
                6 => [
                    'name' => 'Chekfa',
                    'code' => 18007,
                ],
                7 => [
                    'name' => 'Chahna',
                    'code' => 18008,
                ],
                8 => [
                    'name' => 'El Milia',
                    'code' => 18009,
                ],
                9 => [
                    'name' => 'Sidi Maarouf',
                    'code' => 18010,
                ],
                10 => [
                    'name' => 'Settara',
                    'code' => 18011,
                ],
                11 => [
                    'name' => 'El Ancer',
                    'code' => 18012,
                ],
                12 => [
                    'name' => 'Sidi Abdelaziz',
                    'code' => 18013,
                ],
                13 => [
                    'name' => 'Kaous',
                    'code' => 18014,
                ],
                14 => [
                    'name' => 'Ghebala',
                    'code' => 18015,
                ],
                15 => [
                    'name' => 'Bouraoui Belhadef',
                    'code' => 18016,
                ],
                16 => [
                    'name' => 'Djimla',
                    'code' => 18017,
                ],
                17 => [
                    'name' => 'Selma Benziada',
                    'code' => 18018,
                ],
                18 => [
                    'name' => 'Boucif Ouled Askeur',
                    'code' => 18019,
                ],
                19 => [
                    'name' => 'El Kennar Nouchfi',
                    'code' => 18020,
                ],
                20 => [
                    'name' => 'Ouled Yahia Khedrouche',
                    'code' => 18021,
                ],
                21 => [
                    'name' => 'Boudriaa Ben Yadjis',
                    'code' => 18022,
                ],
                22 => [
                    'name' => 'Kheïri Oued Adjoul',
                    'code' => 18023,
                ],
                23 => [
                    'name' => 'Texenna',
                    'code' => 18024,
                ],
                24 => [
                    'name' => 'Djemaa Beni Habibi',
                    'code' => 18025,
                ],
                25 => [
                    'name' => 'Bordj Tahar',
                    'code' => 18026,
                ],
                26 => [
                    'name' => 'Ouled Rabah',
                    'code' => 18027,
                ],
                27 => [
                    'name' => 'Ouadjana',
                    'code' => 18028,
                ],
            ],
            19 => [
                0 => [
                    'name' => 'Aïn Abessa',
                    'code' => 19001,
                ],
                1 => [
                    'name' => 'Aïn Arnat',
                    'code' => 19002,
                ],
                2 => [
                    'name' => 'Aïn Azel',
                    'code' => 19003,
                ],
                3 => [
                    'name' => 'Aïn El Kebira',
                    'code' => 19004,
                ],
                4 => [
                    'name' => 'Aïn Lahdjar',
                    'code' => 19005,
                ],
                5 => [
                    'name' => 'Aïn Legradj',
                    'code' => 19006,
                ],
                6 => [
                    'name' => 'Aïn Oulmene',
                    'code' => 19007,
                ],
                7 => [
                    'name' => 'Aïn Roua',
                    'code' => 19008,
                ],
                8 => [
                    'name' => 'Aïn Sebt',
                    'code' => 19009,
                ],
                9 => [
                    'name' => 'Aït Naoual Mezada',
                    'code' => 190010,
                ],
                10 => [
                    'name' => 'Aït Tizi',
                    'code' => 19011,
                ],
                11 => [
                    'name' => 'Beni Ouartilene',
                    'code' => 19012,
                ],
                12 => [
                    'name' => 'Amoucha',
                    'code' => 19013,
                ],
                13 => [
                    'name' => 'Babor',
                    'code' => 19014,
                ],
                14 => [
                    'name' => 'Bazer Sakhra',
                    'code' => 19015,
                ],
                15 => [
                    'name' => 'Beidha Bordj',
                    'code' => 19016,
                ],
                16 => [
                    'name' => 'Belaa',
                    'code' => 19017,
                ],
                17 => [
                    'name' => 'Beni Aziz',
                    'code' => 19018,
                ],
                18 => [
                    'name' => 'Beni Chebana',
                    'code' => 19019,
                ],
                19 => [
                    'name' => 'Beni Fouda',
                    'code' => 19020,
                ],
                20 => [
                    'name' => 'Beni Hocine',
                    'code' => 19021,
                ],
                21 => [
                    'name' => 'Beni Mouhli',
                    'code' => 19022,
                ],
                22 => [
                    'name' => 'Bir El Arch',
                    'code' => 19023,
                ],
                23 => [
                    'name' => 'Bir Haddada',
                    'code' => 19024,
                ],
                24 => [
                    'name' => 'Bouandas',
                    'code' => 19025,
                ],
                25 => [
                    'name' => 'Bougaa',
                    'code' => 19026,
                ],
                26 => [
                    'name' => 'Bousselam',
                    'code' => 19027,
                ],
                27 => [
                    'name' => 'Boutaleb',
                    'code' => 19028,
                ],
                28 => [
                    'name' => 'Dehamcha',
                    'code' => 19029,
                ],
                29 => [
                    'name' => 'Djemila',
                    'code' => 19030,
                ],
                30 => [
                    'name' => 'Draa Kebila',
                    'code' => 19031,
                ],
                31 => [
                    'name' => 'El Eulma',
                    'code' => 19032,
                ],
                32 => [
                    'name' => 'El Ouldja',
                    'code' => 19033,
                ],
                33 => [
                    'name' => 'El Ouricia',
                    'code' => 19034,
                ],
                34 => [
                    'name' => 'Guellal',
                    'code' => 19035,
                ],
                35 => [
                    'name' => 'Guelta Zerka',
                    'code' => 19036,
                ],
                36 => [
                    'name' => 'Guenzet',
                    'code' => 19037,
                ],
                37 => [
                    'name' => 'Guidjel',
                    'code' => 19038,
                ],
                38 => [
                    'name' => 'Hamma',
                    'code' => 19039,
                ],
                39 => [
                    'name' => 'Hammam Guergour',
                    'code' => 19040,
                ],
                40 => [
                    'name' => 'Hammam Soukhna',
                    'code' => 19041,
                ],
                41 => [
                    'name' => 'Harbil',
                    'code' => 19042,
                ],
                42 => [
                    'name' => 'Ksar El Abtal',
                    'code' => 19043,
                ],
                43 => [
                    'name' => 'Maaouia',
                    'code' => 19044,
                ],
                44 => [
                    'name' => 'Maoklane',
                    'code' => 19045,
                ],
                45 => [
                    'name' => 'Mezloug',
                    'code' => 19046,
                ],
                46 => [
                    'name' => 'Oued El Barad',
                    'code' => 19047,
                ],
                47 => [
                    'name' => 'Ouled Addouane',
                    'code' => 19048,
                ],
                48 => [
                    'name' => 'Ouled Sabor',
                    'code' => 19049,
                ],
                49 => [
                    'name' => 'Ouled Si Ahmed',
                    'code' => 19050,
                ],
                50 => [
                    'name' => 'Ouled Tebben',
                    'code' => 19051,
                ],
                51 => [
                    'name' => 'Rasfa',
                    'code' => 19052,
                ],
                52 => [
                    'name' => 'Salah Bey',
                    'code' => 19053,
                ],
                53 => [
                    'name' => 'Serdj El Ghoul',
                    'code' => 19054,
                ],
                54 => [
                    'name' => 'Sétif',
                    'code' => 19055,
                ],
                55 => [
                    'name' => 'Tachouda',
                    'code' => 19056,
                ],
                56 => [
                    'name' => 'Talaifacene',
                    'code' => 19057,
                ],
                57 => [
                    'name' => 'Taya',
                    'code' => 19058,
                ],
                58 => [
                    'name' => 'Tella',
                    'code' => 19059,
                ],
                59 => [
                    'name' => 'Tizi N\'Bechar',
                    'code' => 19060,
                ],
            ],
            20 => [
                0 => [
                    'name' => 'Aïn El Hadjar',
                    'code' => 20001,
                ],
                1 => [
                    'name' => 'Aïn Sekhouna',
                    'code' => 20002,
                ],
                2 => [
                    'name' => 'Aïn Soltane',
                    'code' => 20003,
                ],
                3 => [
                    'name' => 'Doui Thabet',
                    'code' => 20004,
                ],
                4 => [
                    'name' => 'El Hassasna',
                    'code' => 20005,
                ],
                5 => [
                    'name' => 'Hounet',
                    'code' => 20006,
                ],
                6 => [
                    'name' => 'Maamora',
                    'code' => 20007,
                ],
                7 => [
                    'name' => 'Moulay Larbi',
                    'code' => 20008,
                ],
                8 => [
                    'name' => 'Ouled Brahim',
                    'code' => 20009,
                ],
                9 => [
                    'name' => 'Ouled Khaled',
                    'code' => 200010,
                ],
                10 => [
                    'name' => 'Saïda',
                    'code' => 20011,
                ],
                11 => [
                    'name' => 'Sidi Ahmed',
                    'code' => 20012,
                ],
                12 => [
                    'name' => 'Sidi Amar',
                    'code' => 20013,
                ],
                13 => [
                    'name' => 'Sidi Boubekeur',
                    'code' => 20014,
                ],
                14 => [
                    'name' => 'Tircine',
                    'code' => 20015,
                ],
                15 => [
                    'name' => 'Youb',
                    'code' => 20016,
                ],
            ],
            21 => [
                0 => [
                    'name' => 'Aïn Bouziane',
                    'code' => 21001,
                ],
                1 => [
                    'name' => 'Aïn Charchar',
                    'code' => 21002,
                ],
                2 => [
                    'name' => 'Aïn Kechra',
                    'code' => 21003,
                ],
                3 => [
                    'name' => 'Aïn Zouit',
                    'code' => 21004,
                ],
                4 => [
                    'name' => 'Azzaba',
                    'code' => 21005,
                ],
                5 => [
                    'name' => 'Bekkouche Lakhdar',
                    'code' => 21006,
                ],
                6 => [
                    'name' => 'Bin El Ouiden',
                    'code' => 21007,
                ],
                7 => [
                    'name' => 'Ben Azzouz',
                    'code' => 21008,
                ],
                8 => [
                    'name' => 'Beni Bechir',
                    'code' => 21009,
                ],
                9 => [
                    'name' => 'Beni Oulbane',
                    'code' => 210010,
                ],
                10 => [
                    'name' => 'Beni Zid',
                    'code' => 21011,
                ],
                11 => [
                    'name' => 'Bouchtata',
                    'code' => 21012,
                ],
                12 => [
                    'name' => 'Cheraia',
                    'code' => 21013,
                ],
                13 => [
                    'name' => 'Collo',
                    'code' => 21014,
                ],
                14 => [
                    'name' => 'Djendel Saadi Mohamed',
                    'code' => 21015,
                ],
                15 => [
                    'name' => 'El Ghedir',
                    'code' => 21016,
                ],
                16 => [
                    'name' => 'El Hadaiek',
                    'code' => 21017,
                ],
                17 => [
                    'name' => 'El Harrouch',
                    'code' => 21018,
                ],
                18 => [
                    'name' => 'El Marsa',
                    'code' => 21019,
                ],
                19 => [
                    'name' => 'Emdjez Edchich',
                    'code' => 21020,
                ],
                20 => [
                    'name' => 'Es Sebt',
                    'code' => 21021,
                ],
                21 => [
                    'name' => 'Filfila',
                    'code' => 21022,
                ],
                22 => [
                    'name' => 'Hamadi Krouma',
                    'code' => 21023,
                ],
                23 => [
                    'name' => 'Kanoua',
                    'code' => 21024,
                ],
                24 => [
                    'name' => 'Kerkera',
                    'code' => 21025,
                ],
                25 => [
                    'name' => 'Kheneg Mayoum',
                    'code' => 21026,
                ],
                26 => [
                    'name' => 'Oued Zehour',
                    'code' => 21027,
                ],
                27 => [
                    'name' => 'Ouldja Boulballout',
                    'code' => 21028,
                ],
                28 => [
                    'name' => 'Ouled Attia',
                    'code' => 21029,
                ],
                29 => [
                    'name' => 'Ouled Hbaba',
                    'code' => 21030,
                ],
                30 => [
                    'name' => 'Oum Toub',
                    'code' => 21031,
                ],
                31 => [
                    'name' => 'Ramdane Djamel',
                    'code' => 21032,
                ],
                32 => [
                    'name' => 'Salah Bouchaour',
                    'code' => 21033,
                ],
                33 => [
                    'name' => 'Sidi Mezghiche',
                    'code' => 21034,
                ],
                34 => [
                    'name' => 'Skikda',
                    'code' => 21035,
                ],
                35 => [
                    'name' => 'Tamalous',
                    'code' => 21036,
                ],
                36 => [
                    'name' => 'Zerdaza',
                    'code' => 21037,
                ],
                37 => [
                    'name' => 'Zitouna',
                    'code' => 21038,
                ],
            ],
            22 => [
                0 => [
                    'name' => 'Aïn Adden',
                    'code' => 22001,
                ],
                1 => [
                    'name' => 'Aïn El Berd',
                    'code' => 22002,
                ],
                2 => [
                    'name' => 'Aïn Kada',
                    'code' => 22003,
                ],
                3 => [
                    'name' => 'Aïn Thrid',
                    'code' => 22004,
                ],
                4 => [
                    'name' => 'Aïn Tindamine',
                    'code' => 22005,
                ],
                5 => [
                    'name' => 'Amarnas',
                    'code' => 22006,
                ],
                6 => [
                    'name' => 'Badredine El Mokrani',
                    'code' => 22007,
                ],
                7 => [
                    'name' => 'Belarbi',
                    'code' => 22008,
                ],
                8 => [
                    'name' => 'Ben Badis',
                    'code' => 22009,
                ],
                9 => [
                    'name' => 'Benachiba Chelia',
                    'code' => 220010,
                ],
                10 => [
                    'name' => 'Bir El Hammam',
                    'code' => 22011,
                ],
                11 => [
                    'name' => 'Boudjebaa El Bordj',
                    'code' => 22012,
                ],
                12 => [
                    'name' => 'Boukhanafis',
                    'code' => 22013,
                ],
                13 => [
                    'name' => 'Chettouane Belaila',
                    'code' => 22014,
                ],
                14 => [
                    'name' => 'Dhaya',
                    'code' => 22015,
                ],
                15 => [
                    'name' => 'El Haçaiba',
                    'code' => 22016,
                ],
                16 => [
                    'name' => 'Hassi Dahou',
                    'code' => 22017,
                ],
                17 => [
                    'name' => 'Hassi Zehana',
                    'code' => 22018,
                ],
                18 => [
                    'name' => 'Lamtar',
                    'code' => 22019,
                ],
                19 => [
                    'name' => 'Makedra',
                    'code' => 22020,
                ],
                20 => [
                    'name' => 'Marhoum',
                    'code' => 22021,
                ],
                21 => [
                    'name' => 'M\'Cid',
                    'code' => 22022,
                ],
                22 => [
                    'name' => 'Merine',
                    'code' => 22023,
                ],
                23 => [
                    'name' => 'Mezaourou',
                    'code' => 22024,
                ],
                24 => [
                    'name' => 'Mostefa Ben Brahim',
                    'code' => 22025,
                ],
                25 => [
                    'name' => 'Moulay Slissen',
                    'code' => 22026,
                ],
                26 => [
                    'name' => 'Oued Sebaa',
                    'code' => 22027,
                ],
                27 => [
                    'name' => 'Oued Sefioun',
                    'code' => 22028,
                ],
                28 => [
                    'name' => 'Oued Taourira',
                    'code' => 22029,
                ],
                29 => [
                    'name' => 'Ras El Ma',
                    'code' => 22030,
                ],
                30 => [
                    'name' => 'Redjem Demouche',
                    'code' => 22031,
                ],
                31 => [
                    'name' => 'Sehala Thaoura',
                    'code' => 22032,
                ],
                32 => [
                    'name' => 'Sfisef',
                    'code' => 22033,
                ],
                33 => [
                    'name' => 'Sidi Ali Benyoub',
                    'code' => 22034,
                ],
                34 => [
                    'name' => 'Sidi Ali Boussidi',
                    'code' => 22035,
                ],
                35 => [
                    'name' => 'Sidi Bel Abbes',
                    'code' => 22036,
                ],
                36 => [
                    'name' => 'Sidi Brahim',
                    'code' => 22037,
                ],
                37 => [
                    'name' => 'Sidi Chaib',
                    'code' => 22038,
                ],
                38 => [
                    'name' => 'Sidi Daho des Zairs',
                    'code' => 22039,
                ],
                39 => [
                    'name' => 'Sidi Hamadouche',
                    'code' => 22040,
                ],
                40 => [
                    'name' => 'Sidi Khaled',
                    'code' => 22041,
                ],
                41 => [
                    'name' => 'Sidi Lahcene',
                    'code' => 22042,
                ],
                42 => [
                    'name' => 'Sidi Yacoub',
                    'code' => 22043,
                ],
                43 => [
                    'name' => 'Tabia',
                    'code' => 22044,
                ],
                44 => [
                    'name' => 'Tafissour',
                    'code' => 22045,
                ],
                45 => [
                    'name' => 'Taoudmout',
                    'code' => 22046,
                ],
                46 => [
                    'name' => 'Teghalimet',
                    'code' => 22047,
                ],
                47 => [
                    'name' => 'Telagh',
                    'code' => 22048,
                ],
                48 => [
                    'name' => 'Tenira',
                    'code' => 22049,
                ],
                49 => [
                    'name' => 'Tessala',
                    'code' => 22050,
                ],
                50 => [
                    'name' => 'Tilmouni',
                    'code' => 22051,
                ],
                51 => [
                    'name' => 'Zerouala',
                    'code' => 22052,
                ],
            ],
            23 => [
                0 => [
                    'name' => 'Annaba',
                    'code' => 23001,
                ],
                1 => [
                    'name' => 'Berrahal',
                    'code' => 23002,
                ],
                2 => [
                    'name' => 'El Hadjar',
                    'code' => 23003,
                ],
                3 => [
                    'name' => 'Eulma',
                    'code' => 23004,
                ],
                4 => [
                    'name' => 'El Bouni',
                    'code' => 23005,
                ],
                5 => [
                    'name' => 'Oued El Aneb',
                    'code' => 23006,
                ],
                6 => [
                    'name' => 'Cheurfa',
                    'code' => 23007,
                ],
                7 => [
                    'name' => 'Seraïdi',
                    'code' => 23008,
                ],
                8 => [
                    'name' => 'Aïn Berda',
                    'code' => 23009,
                ],
                9 => [
                    'name' => 'Chetaïbi',
                    'code' => 23010,
                ],
                10 => [
                    'name' => 'Sidi Amar',
                    'code' => 23011,
                ],
                11 => [
                    'name' => 'Treat',
                    'code' => 23012,
                ],
            ],
            24 => [
                0 => [
                    'name' => 'Aïn Ben Beida',
                    'code' => 24001,
                ],
                1 => [
                    'name' => 'Aïn Larbi',
                    'code' => 24002,
                ],
                2 => [
                    'name' => 'Aïn Makhlouf',
                    'code' => 24003,
                ],
                3 => [
                    'name' => 'Aïn Reggada',
                    'code' => 24004,
                ],
                4 => [
                    'name' => 'Aïn Sandel',
                    'code' => 24005,
                ],
                5 => [
                    'name' => 'Belkheir',
                    'code' => 24006,
                ],
                6 => [
                    'name' => 'Ben Djerrah',
                    'code' => 24007,
                ],
                7 => [
                    'name' => 'Beni Mezline',
                    'code' => 24008,
                ],
                8 => [
                    'name' => 'Bordj Sabath',
                    'code' => 24009,
                ],
                9 => [
                    'name' => 'Bouhachana',
                    'code' => 240010,
                ],
                10 => [
                    'name' => 'Bouhamdane',
                    'code' => 24011,
                ],
                11 => [
                    'name' => 'Bouati Mahmoud',
                    'code' => 24012,
                ],
                12 => [
                    'name' => 'Bouchegouf',
                    'code' => 24013,
                ],
                13 => [
                    'name' => 'Boumahra Ahmed',
                    'code' => 24014,
                ],
                14 => [
                    'name' => 'Dahouara',
                    'code' => 24015,
                ],
                15 => [
                    'name' => 'Djeballah Khemissi',
                    'code' => 24016,
                ],
                16 => [
                    'name' => 'El Fedjoudj',
                    'code' => 24017,
                ],
                17 => [
                    'name' => 'Guellat Bou Sbaa',
                    'code' => 24018,
                ],
                18 => [
                    'name' => 'Guelma',
                    'code' => 24019,
                ],
                19 => [
                    'name' => 'Hammam Debagh',
                    'code' => 24020,
                ],
                20 => [
                    'name' => 'Hammam N\'Bail',
                    'code' => 24021,
                ],
                21 => [
                    'name' => 'Héliopolis',
                    'code' => 24022,
                ],
                22 => [
                    'name' => 'Houari Boumédiène',
                    'code' => 24023,
                ],
                23 => [
                    'name' => 'Khezarra',
                    'code' => 24024,
                ],
                24 => [
                    'name' => 'Medjez Amar',
                    'code' => 24025,
                ],
                25 => [
                    'name' => 'Medjez Sfa',
                    'code' => 24026,
                ],
                26 => [
                    'name' => 'Nechmaya',
                    'code' => 24027,
                ],
                27 => [
                    'name' => 'Oued Cheham',
                    'code' => 24028,
                ],
                28 => [
                    'name' => 'Oued Fragha',
                    'code' => 24029,
                ],
                29 => [
                    'name' => 'Oued Zenati',
                    'code' => 24030,
                ],
                30 => [
                    'name' => 'Ras El Agba',
                    'code' => 24031,
                ],
                31 => [
                    'name' => 'Roknia',
                    'code' => 24032,
                ],
                32 => [
                    'name' => 'Sellaoua Announa',
                    'code' => 24033,
                ],
                33 => [
                    'name' => 'Tamlouka',
                    'code' => 24034,
                ],
            ],
            25 => [
                0 => [
                    'name' => 'Aïn Abid',
                    'code' => 25001,
                ],
                1 => [
                    'name' => 'Aïn Smara',
                    'code' => 25002,
                ],
                2 => [
                    'name' => 'Beni Hamiden',
                    'code' => 25003,
                ],
                3 => [
                    'name' => 'Constantine',
                    'code' => 25004,
                ],
                4 => [
                    'name' => 'Didouche Mourad',
                    'code' => 25005,
                ],
                5 => [
                    'name' => 'El Khroub',
                    'code' => 25006,
                ],
                6 => [
                    'name' => 'Hamma Bouziane',
                    'code' => 25007,
                ],
                7 => [
                    'name' => 'Ibn Badis',
                    'code' => 25008,
                ],
                8 => [
                    'name' => 'Ibn Ziad',
                    'code' => 25009,
                ],
                9 => [
                    'name' => 'Messaoud Boudjriou',
                    'code' => 250010,
                ],
                10 => [
                    'name' => 'Ouled Rahmoune',
                    'code' => 25011,
                ],
                11 => [
                    'name' => 'Zighoud Youcef',
                    'code' => 25012,
                ],
            ],
            26 => [
                0 => [
                    'name' => 'Aïn Boucif',
                    'code' => 26001,
                ],
                1 => [
                    'name' => 'Aïn Ouksir',
                    'code' => 26002,
                ],
                2 => [
                    'name' => 'Aissaouia',
                    'code' => 26003,
                ],
                3 => [
                    'name' => 'Aziz',
                    'code' => 26004,
                ],
                4 => [
                    'name' => 'Baata',
                    'code' => 26005,
                ],
                5 => [
                    'name' => 'Benchicao',
                    'code' => 26006,
                ],
                6 => [
                    'name' => 'Beni Slimane',
                    'code' => 26007,
                ],
                7 => [
                    'name' => 'Berrouaghia',
                    'code' => 26008,
                ],
                8 => [
                    'name' => 'Bir Ben Laabed',
                    'code' => 26009,
                ],
                9 => [
                    'name' => 'Boghar',
                    'code' => 260010,
                ],
                10 => [
                    'name' => 'Bou Aiche',
                    'code' => 26011,
                ],
                11 => [
                    'name' => 'Bouaichoune',
                    'code' => 26012,
                ],
                12 => [
                    'name' => 'Bouchrahil',
                    'code' => 26013,
                ],
                13 => [
                    'name' => 'Boughezoul',
                    'code' => 26014,
                ],
                14 => [
                    'name' => 'Bouskene',
                    'code' => 26015,
                ],
                15 => [
                    'name' => 'Chahbounia',
                    'code' => 26016,
                ],
                16 => [
                    'name' => 'Chellalet El Adhaoura',
                    'code' => 26017,
                ],
                17 => [
                    'name' => 'Cheniguel',
                    'code' => 26018,
                ],
                18 => [
                    'name' => 'Derrag',
                    'code' => 26019,
                ],
                19 => [
                    'name' => 'Deux Bassins',
                    'code' => 26020,
                ],
                20 => [
                    'name' => 'Djouab',
                    'code' => 26021,
                ],
                21 => [
                    'name' => 'Draa Essamar',
                    'code' => 26022,
                ],
                22 => [
                    'name' => 'El Azizia',
                    'code' => 26023,
                ],
                23 => [
                    'name' => 'El Guelb El Kebir',
                    'code' => 26024,
                ],
                24 => [
                    'name' => 'El Hamdania',
                    'code' => 26025,
                ],
                25 => [
                    'name' => 'El Omaria',
                    'code' => 26026,
                ],
                26 => [
                    'name' => 'El Ouinet',
                    'code' => 26027,
                ],
                27 => [
                    'name' => 'Hannacha',
                    'code' => 26028,
                ],
                28 => [
                    'name' => 'Kef Lakhdar',
                    'code' => 26029,
                ],
                29 => [
                    'name' => 'Khams Djouamaa',
                    'code' => 26030,
                ],
                30 => [
                    'name' => 'Ksar Boukhari',
                    'code' => 26031,
                ],
                31 => [
                    'name' => 'Meghraoua',
                    'code' => 26032,
                ],
                32 => [
                    'name' => 'Médéa',
                    'code' => 26033,
                ],
                33 => [
                    'name' => 'Moudjbar',
                    'code' => 26034,
                ],
                34 => [
                    'name' => 'Meftaha',
                    'code' => 26035,
                ],
                35 => [
                    'name' => 'Mezerana',
                    'code' => 26036,
                ],
                36 => [
                    'name' => 'Mihoub',
                    'code' => 26037,
                ],
                37 => [
                    'name' => 'Ouamri',
                    'code' => 26038,
                ],
                38 => [
                    'name' => 'Oued Harbil',
                    'code' => 26039,
                ],
                39 => [
                    'name' => 'Ouled Antar',
                    'code' => 26040,
                ],
                40 => [
                    'name' => 'Ouled Bouachra',
                    'code' => 26041,
                ],
                41 => [
                    'name' => 'Ouled Brahim',
                    'code' => 26042,
                ],
                42 => [
                    'name' => 'Ouled Deide',
                    'code' => 26043,
                ],
                43 => [
                    'name' => 'Ouled Hellal',
                    'code' => 26044,
                ],
                44 => [
                    'name' => 'Ouled Maaref',
                    'code' => 26045,
                ],
                45 => [
                    'name' => 'Oum El Djalil',
                    'code' => 26046,
                ],
                46 => [
                    'name' => 'Ouzera',
                    'code' => 26047,
                ],
                47 => [
                    'name' => 'Rebaia',
                    'code' => 26048,
                ],
                48 => [
                    'name' => 'Saneg',
                    'code' => 26049,
                ],
                49 => [
                    'name' => 'Sedraia',
                    'code' => 26050,
                ],
                50 => [
                    'name' => 'Seghouane',
                    'code' => 26051,
                ],
                51 => [
                    'name' => 'Si Mahdjoub',
                    'code' => 26052,
                ],
                52 => [
                    'name' => 'Sidi Damed',
                    'code' => 26053,
                ],
                53 => [
                    'name' => 'Sidi Errabia',
                    'code' => 26054,
                ],
                54 => [
                    'name' => 'Sidi Naamane',
                    'code' => 26055,
                ],
                55 => [
                    'name' => 'Sidi Zahar',
                    'code' => 26056,
                ],
                56 => [
                    'name' => 'Sidi Ziane',
                    'code' => 26057,
                ],
                57 => [
                    'name' => 'Souagui',
                    'code' => 26058,
                ],
                58 => [
                    'name' => 'Tablat',
                    'code' => 26059,
                ],
                59 => [
                    'name' => 'Tafraout',
                    'code' => 26060,
                ],
                60 => [
                    'name' => 'Tamesguida',
                    'code' => 26061,
                ],
                61 => [
                    'name' => 'Tizi Mahdi',
                    'code' => 26062,
                ],
                62 => [
                    'name' => 'Tlatet Eddouar',
                    'code' => 26063,
                ],
                63 => [
                    'name' => 'Zoubiria',
                    'code' => 26064,
                ],
            ],
            27 => [
                0 => [
                    'name' => 'Abdelmalek Ramdane',
                    'code' => 27001,
                ],
                1 => [
                    'name' => 'Achaacha',
                    'code' => 27002,
                ],
                2 => [
                    'name' => 'Aïn Boudinar',
                    'code' => 27003,
                ],
                3 => [
                    'name' => 'Aïn Nouissy',
                    'code' => 27004,
                ],
                4 => [
                    'name' => 'Aïn Sidi Cherif',
                    'code' => 27005,
                ],
                5 => [
                    'name' => 'Aïn Tedles',
                    'code' => 27006,
                ],
                6 => [
                    'name' => 'Blad Touahria',
                    'code' => 27007,
                ],
                7 => [
                    'name' => 'Bouguirat',
                    'code' => 27008,
                ],
                8 => [
                    'name' => 'El Hassiane',
                    'code' => 27009,
                ],
                9 => [
                    'name' => 'Fornaka',
                    'code' => 270010,
                ],
                10 => [
                    'name' => 'Hadjadj',
                    'code' => 27011,
                ],
                11 => [
                    'name' => 'Hassi Mameche',
                    'code' => 27012,
                ],
                12 => [
                    'name' => 'Khadra',
                    'code' => 27013,
                ],
                13 => [
                    'name' => 'Kheireddine',
                    'code' => 27014,
                ],
                14 => [
                    'name' => 'Mansourah',
                    'code' => 27015,
                ],
                15 => [
                    'name' => 'Mesra',
                    'code' => 27016,
                ],
                16 => [
                    'name' => 'Mazagran',
                    'code' => 27017,
                ],
                17 => [
                    'name' => 'Mostaganem',
                    'code' => 27018,
                ],
                18 => [
                    'name' => 'Nekmaria',
                    'code' => 27019,
                ],
                19 => [
                    'name' => 'Oued El Kheir',
                    'code' => 27020,
                ],
                20 => [
                    'name' => 'Ouled Boughalem',
                    'code' => 27021,
                ],
                21 => [
                    'name' => 'Ouled Maallah',
                    'code' => 27022,
                ],
                22 => [
                    'name' => 'Safsaf',
                    'code' => 27023,
                ],
                23 => [
                    'name' => 'Sayada',
                    'code' => 27024,
                ],
                24 => [
                    'name' => 'Sidi Ali',
                    'code' => 27025,
                ],
                25 => [
                    'name' => 'Sidi Belattar',
                    'code' => 27026,
                ],
                26 => [
                    'name' => 'Sidi Lakhdar',
                    'code' => 27027,
                ],
                27 => [
                    'name' => 'Sirat',
                    'code' => 27028,
                ],
                28 => [
                    'name' => 'Souaflia',
                    'code' => 27029,
                ],
                29 => [
                    'name' => 'Sour',
                    'code' => 27030,
                ],
                30 => [
                    'name' => 'Stidia',
                    'code' => 27031,
                ],
                31 => [
                    'name' => 'Tazgait',
                    'code' => 27032,
                ],
            ],
            28 => [
                0 => [
                    'name' => 'Aïn El Hadjel',
                    'code' => 28001,
                ],
                1 => [
                    'name' => 'Aïn El Melh',
                    'code' => 28002,
                ],
                2 => [
                    'name' => 'Aïn Errich',
                    'code' => 28003,
                ],
                3 => [
                    'name' => 'Aïn Fares',
                    'code' => 28004,
                ],
                4 => [
                    'name' => 'Aïn Khadra',
                    'code' => 28005,
                ],
                5 => [
                    'name' => 'Belaiba',
                    'code' => 28006,
                ],
                6 => [
                    'name' => 'Ben Srour',
                    'code' => 28007,
                ],
                7 => [
                    'name' => 'Beni Ilmane',
                    'code' => 28008,
                ],
                8 => [
                    'name' => 'Benzouh',
                    'code' => 28009,
                ],
                9 => [
                    'name' => 'Berhoum',
                    'code' => 280010,
                ],
                10 => [
                    'name' => 'Bir Foda',
                    'code' => 28011,
                ],
                11 => [
                    'name' => 'Bou Saâda',
                    'code' => 28012,
                ],
                12 => [
                    'name' => 'Bouti Sayah',
                    'code' => 28013,
                ],
                13 => [
                    'name' => 'Chellal',
                    'code' => 28014,
                ],
                14 => [
                    'name' => 'Dehahna',
                    'code' => 28015,
                ],
                15 => [
                    'name' => 'Djebel Messaad',
                    'code' => 28016,
                ],
                16 => [
                    'name' => 'El Hamel',
                    'code' => 28017,
                ],
                17 => [
                    'name' => 'El Houamed',
                    'code' => 28018,
                ],
                18 => [
                    'name' => 'Hammam Dhalaa',
                    'code' => 28019,
                ],
                19 => [
                    'name' => 'Khettouti Sed El Djir',
                    'code' => 28020,
                ],
                20 => [
                    'name' => 'Khoubana',
                    'code' => 28021,
                ],
                21 => [
                    'name' => 'Maadid',
                    'code' => 28022,
                ],
                22 => [
                    'name' => 'Maarif',
                    'code' => 28023,
                ],
                23 => [
                    'name' => 'Magra',
                    'code' => 28024,
                ],
                24 => [
                    'name' => 'M\'Cif',
                    'code' => 28025,
                ],
                25 => [
                    'name' => 'Medjedel',
                    'code' => 28026,
                ],
                26 => [
                    'name' => 'M\'Sila',
                    'code' => 28027,
                ],
                27 => [
                    'name' => 'M\'Tarfa',
                    'code' => 28028,
                ],
                28 => [
                    'name' => 'Ouanougha',
                    'code' => 28029,
                ],
                29 => [
                    'name' => 'Ouled Addi Guebala',
                    'code' => 28030,
                ],
                30 => [
                    'name' => 'Ouled Atia',
                    'code' => 28031,
                ],
                31 => [
                    'name' => 'Mohammed Boudiaf',
                    'code' => 28032,
                ],
                32 => [
                    'name' => 'Ouled Derradj',
                    'code' => 28033,
                ],
                33 => [
                    'name' => 'Ouled Madhi',
                    'code' => 28034,
                ],
                34 => [
                    'name' => 'Ouled Mansour',
                    'code' => 28035,
                ],
                35 => [
                    'name' => 'Ouled Sidi Brahim',
                    'code' => 28036,
                ],
                36 => [
                    'name' => 'Ouled Slimane',
                    'code' => 28037,
                ],
                37 => [
                    'name' => 'Oultem',
                    'code' => 28038,
                ],
                38 => [
                    'name' => 'Sidi Aïssa',
                    'code' => 28039,
                ],
                39 => [
                    'name' => 'Sidi Ameur',
                    'code' => 28040,
                ],
                40 => [
                    'name' => 'Sidi Hadjeres',
                    'code' => 28041,
                ],
                41 => [
                    'name' => 'Sidi M\'Hamed',
                    'code' => 28042,
                ],
                42 => [
                    'name' => 'Slim',
                    'code' => 28043,
                ],
                43 => [
                    'name' => 'Souamaa',
                    'code' => 28044,
                ],
                44 => [
                    'name' => 'Tamsa',
                    'code' => 28045,
                ],
                45 => [
                    'name' => 'Tarmount',
                    'code' => 28046,
                ],
                46 => [
                    'name' => 'Zarzour',
                    'code' => 28047,
                ],
            ],
            29 => [
                0 => [
                    'name' => 'Aïn Fares',
                    'code' => 29001,
                ],
                1 => [
                    'name' => 'Aïn Fekan',
                    'code' => 29002,
                ],
                2 => [
                    'name' => 'Aïn Ferah',
                    'code' => 29003,
                ],
                3 => [
                    'name' => 'Aïn Fras',
                    'code' => 29004,
                ],
                4 => [
                    'name' => 'Alaïmia',
                    'code' => 29005,
                ],
                5 => [
                    'name' => 'Aouf',
                    'code' => 29006,
                ],
                6 => [
                    'name' => 'Beniane',
                    'code' => 29007,
                ],
                7 => [
                    'name' => 'Bou Hanifia',
                    'code' => 29008,
                ],
                8 => [
                    'name' => 'Bou Henni',
                    'code' => 29009,
                ],
                9 => [
                    'name' => 'Chorfa',
                    'code' => 290010,
                ],
                10 => [
                    'name' => 'El Bordj',
                    'code' => 29011,
                ],
                11 => [
                    'name' => 'El Gaada',
                    'code' => 29012,
                ],
                12 => [
                    'name' => 'El Ghomri',
                    'code' => 29013,
                ],
                13 => [
                    'name' => 'El Guettana',
                    'code' => 29014,
                ],
                14 => [
                    'name' => 'El Keurt',
                    'code' => 29015,
                ],
                15 => [
                    'name' => 'El Menaouer',
                    'code' => 29016,
                ],
                16 => [
                    'name' => 'Ferraguig',
                    'code' => 29017,
                ],
                17 => [
                    'name' => 'Froha',
                    'code' => 29018,
                ],
                18 => [
                    'name' => 'Gharrous',
                    'code' => 29019,
                ],
                19 => [
                    'name' => 'Guerdjoum',
                    'code' => 29020,
                ],
                20 => [
                    'name' => 'Ghriss',
                    'code' => 29021,
                ],
                21 => [
                    'name' => 'Hachem',
                    'code' => 29022,
                ],
                22 => [
                    'name' => 'Hacine',
                    'code' => 29023,
                ],
                23 => [
                    'name' => 'Khalouia',
                    'code' => 29024,
                ],
                24 => [
                    'name' => 'Makdha',
                    'code' => 29025,
                ],
                25 => [
                    'name' => 'Mamounia',
                    'code' => 29026,
                ],
                26 => [
                    'name' => 'Maoussa',
                    'code' => 29027,
                ],
                27 => [
                    'name' => 'Mascara',
                    'code' => 29028,
                ],
                28 => [
                    'name' => 'Matemore',
                    'code' => 29029,
                ],
                29 => [
                    'name' => 'Mocta Douz',
                    'code' => 29030,
                ],
                30 => [
                    'name' => 'Mohammadia',
                    'code' => 29031,
                ],
                31 => [
                    'name' => 'Nesmoth',
                    'code' => 29032,
                ],
                32 => [
                    'name' => 'Oggaz',
                    'code' => 29033,
                ],
                33 => [
                    'name' => 'Oued El Abtal',
                    'code' => 29034,
                ],
                34 => [
                    'name' => 'Oued Taria',
                    'code' => 29035,
                ],
                35 => [
                    'name' => 'Ras El Aïn Amirouche',
                    'code' => 29036,
                ],
                36 => [
                    'name' => 'Sedjerara',
                    'code' => 29037,
                ],
                37 => [
                    'name' => 'Sehailia',
                    'code' => 29038,
                ],
                38 => [
                    'name' => 'Sidi Abdeldjebar',
                    'code' => 29039,
                ],
                39 => [
                    'name' => 'Sidi Abdelmoumen',
                    'code' => 29040,
                ],
                40 => [
                    'name' => 'Sidi Kada',
                    'code' => 29041,
                ],
                41 => [
                    'name' => 'Sidi Boussaid',
                    'code' => 29042,
                ],
                42 => [
                    'name' => 'Sig',
                    'code' => 29043,
                ],
                43 => [
                    'name' => 'Tighennif',
                    'code' => 29044,
                ],
                44 => [
                    'name' => 'Tizi',
                    'code' => 29045,
                ],
                45 => [
                    'name' => 'Zahana',
                    'code' => 29046,
                ],
                46 => [
                    'name' => 'Zelmata',
                    'code' => 29047,
                ],
            ],
            30 => [
                0 => [
                    'name' => 'Aïn Beida',
                    'code' => 30001,
                ],
                1 => [
                    'name' => 'El Borma',
                    'code' => 30002,
                ],
                2 => [
                    'name' => 'Hassi Ben Abdellah',
                    'code' => 30003,
                ],
                3 => [
                    'name' => 'Hassi Messaoud',
                    'code' => 30004,
                ],
                4 => [
                    'name' => 'N\'Goussa',
                    'code' => 30005,
                ],
                5 => [
                    'name' => 'Ouargla',
                    'code' => 30006,
                ],
                6 => [
                    'name' => 'Rouissat',
                    'code' => 30007,
                ],
                7 => [
                    'name' => 'Sidi Khouiled',
                    'code' => 30008,
                ],
            ],
            31 => [
                0 => [
                    'name' => 'Oran',
                    'code' => 31001,
                ],
                1 => [
                    'name' => 'Gdyel',
                    'code' => 31002,
                ],
                2 => [
                    'name' => 'Bir El Djir',
                    'code' => 31003,
                ],
                3 => [
                    'name' => 'Hassi Bounif',
                    'code' => 31004,
                ],
                4 => [
                    'name' => 'Es Senia',
                    'code' => 31005,
                ],
                5 => [
                    'name' => 'Arzew',
                    'code' => 31006,
                ],
                6 => [
                    'name' => 'Bethioua',
                    'code' => 31007,
                ],
                7 => [
                    'name' => 'Marsat El Hadjadj',
                    'code' => 31008,
                ],
                8 => [
                    'name' => 'Aïn El Turk',
                    'code' => 31009,
                ],
                9 => [
                    'name' => 'El Ançor',
                    'code' => 31010,
                ],
                10 => [
                    'name' => 'Oued Tlelat',
                    'code' => 31011,
                ],
                11 => [
                    'name' => 'Tafraoui',
                    'code' => 31012,
                ],
                12 => [
                    'name' => 'Sidi Chami',
                    'code' => 31013,
                ],
                13 => [
                    'name' => 'Boufatis',
                    'code' => 31014,
                ],
                14 => [
                    'name' => 'Mers El Kébir',
                    'code' => 31015,
                ],
                15 => [
                    'name' => 'Bousfer',
                    'code' => 31016,
                ],
                16 => [
                    'name' => 'El Kerma',
                    'code' => 31017,
                ],
                17 => [
                    'name' => 'El Braya',
                    'code' => 31018,
                ],
                18 => [
                    'name' => 'Hassi Ben Okba',
                    'code' => 31019,
                ],
                19 => [
                    'name' => 'Ben Freha',
                    'code' => 31020,
                ],
                20 => [
                    'name' => 'Hassi Mefsoukh',
                    'code' => 31021,
                ],
                21 => [
                    'name' => 'Sidi Benyebka',
                    'code' => 31022,
                ],
                22 => [
                    'name' => 'Misserghin',
                    'code' => 31023,
                ],
                23 => [
                    'name' => 'Boutlelis',
                    'code' => 31024,
                ],
                24 => [
                    'name' => 'Aïn El Kerma',
                    'code' => 31025,
                ],
                25 => [
                    'name' => 'Aïn El Bia',
                    'code' => 31026,
                ],
            ],
            32 => [
                0 => [
                    'name' => 'El Bayadh',
                    'code' => 32001,
                ],
                1 => [
                    'name' => 'Rogassa',
                    'code' => 32002,
                ],
                2 => [
                    'name' => 'Stitten',
                    'code' => 32003,
                ],
                3 => [
                    'name' => 'Brezina',
                    'code' => 32004,
                ],
                4 => [
                    'name' => 'Ghassoul',
                    'code' => 32005,
                ],
                5 => [
                    'name' => 'Boualem',
                    'code' => 32006,
                ],
                6 => [
                    'name' => 'El Abiodh Sidi Cheikh',
                    'code' => 32007,
                ],
                7 => [
                    'name' => 'Aïn El Orak',
                    'code' => 32008,
                ],
                8 => [
                    'name' => 'Arbaouat',
                    'code' => 32009,
                ],
                9 => [
                    'name' => 'Bougtoub',
                    'code' => 32010,
                ],
                10 => [
                    'name' => 'El Kheiter',
                    'code' => 32011,
                ],
                11 => [
                    'name' => 'Kef El Ahmar',
                    'code' => 32012,
                ],
                12 => [
                    'name' => 'Boussemghoun',
                    'code' => 32013,
                ],
                13 => [
                    'name' => 'Chellala',
                    'code' => 32014,
                ],
                14 => [
                    'name' => 'Kraakda',
                    'code' => 32015,
                ],
                15 => [
                    'name' => 'El Bnoud',
                    'code' => 32016,
                ],
                16 => [
                    'name' => 'Cheguig',
                    'code' => 32017,
                ],
                17 => [
                    'name' => 'Sidi Ameur',
                    'code' => 32018,
                ],
                18 => [
                    'name' => 'El Mehara',
                    'code' => 32019,
                ],
                19 => [
                    'name' => 'Tousmouline',
                    'code' => 32020,
                ],
                20 => [
                    'name' => 'Sidi Slimane',
                    'code' => 32021,
                ],
                21 => [
                    'name' => 'Sidi Tifour',
                    'code' => 32022,
                ],
            ],
            33 => [
                0 => [
                    'name' => 'Illizi',
                    'code' => 33001,
                ],
                1 => [
                    'name' => 'Debdeb',
                    'code' => 33003,
                ],
                2 => [
                    'name' => 'Bordj Omar Driss',
                    'code' => 33004,
                ],
                3 => [
                    'name' => 'In Amenas',
                    'code' => 33006,
                ],
            ],
            34 => [
                0 => [
                    'name' => 'Aïn Taghrout',
                    'code' => 34001,
                ],
                1 => [
                    'name' => 'Aïn Tesra',
                    'code' => 34002,
                ],
                2 => [
                    'name' => 'Belimour',
                    'code' => 34003,
                ],
                3 => [
                    'name' => 'Ben Daoud',
                    'code' => 34004,
                ],
                4 => [
                    'name' => 'Bir Kasdali',
                    'code' => 34005,
                ],
                5 => [
                    'name' => 'Bordj Bou Arreridj',
                    'code' => 34006,
                ],
                6 => [
                    'name' => 'Bordj Ghédir',
                    'code' => 34007,
                ],
                7 => [
                    'name' => 'Bordj Zemoura',
                    'code' => 34008,
                ],
                8 => [
                    'name' => 'Colla',
                    'code' => 34009,
                ],
                9 => [
                    'name' => 'Djaafra',
                    'code' => 340010,
                ],
                10 => [
                    'name' => 'El Ach',
                    'code' => 34011,
                ],
                11 => [
                    'name' => 'El Achir',
                    'code' => 34012,
                ],
                12 => [
                    'name' => 'El Anseur',
                    'code' => 34013,
                ],
                13 => [
                    'name' => 'El Hamadia',
                    'code' => 34014,
                ],
                14 => [
                    'name' => 'El Main',
                    'code' => 34015,
                ],
                15 => [
                    'name' => 'El M\'hir',
                    'code' => 34016,
                ],
                16 => [
                    'name' => 'Ghilassa',
                    'code' => 34017,
                ],
                17 => [
                    'name' => 'Haraza',
                    'code' => 34018,
                ],
                18 => [
                    'name' => 'Hasnaoua',
                    'code' => 34019,
                ],
                19 => [
                    'name' => 'Khelil',
                    'code' => 34020,
                ],
                20 => [
                    'name' => 'Ksour',
                    'code' => 34021,
                ],
                21 => [
                    'name' => 'Mansoura',
                    'code' => 34022,
                ],
                22 => [
                    'name' => 'Medjana',
                    'code' => 34023,
                ],
                23 => [
                    'name' => 'Ouled Brahem',
                    'code' => 34024,
                ],
                24 => [
                    'name' => 'Ouled Dahmane',
                    'code' => 34025,
                ],
                25 => [
                    'name' => 'Ouled Sidi Brahim',
                    'code' => 34026,
                ],
                26 => [
                    'name' => 'Rabta',
                    'code' => 34027,
                ],
                27 => [
                    'name' => 'Ras El Oued',
                    'code' => 34028,
                ],
                28 => [
                    'name' => 'Sidi Embarek',
                    'code' => 34029,
                ],
                29 => [
                    'name' => 'Tefreg',
                    'code' => 34030,
                ],
                30 => [
                    'name' => 'Taglait',
                    'code' => 34031,
                ],
                31 => [
                    'name' => 'Teniet En Nasr',
                    'code' => 34032,
                ],
                32 => [
                    'name' => 'Tassameurt',
                    'code' => 34033,
                ],
                33 => [
                    'name' => 'Tixter',
                    'code' => 34034,
                ],
            ],
            35 => [
                0 => [
                    'name' => 'Afir',
                    'code' => 35004,
                ],
                1 => [
                    'name' => 'Ammal',
                    'code' => 35029,
                ],
                2 => [
                    'name' => 'Baghlia',
                    'code' => 35006,
                ],
                3 => [
                    'name' => 'Ben Choud',
                    'code' => 35027,
                ],
                4 => [
                    'name' => 'Beni Amrane',
                    'code' => 35030,
                ],
                5 => [
                    'name' => 'Bordj Menaïel',
                    'code' => 35005,
                ],
                6 => [
                    'name' => 'Boudouaou',
                    'code' => 35002,
                ],
                7 => [
                    'name' => 'Boudouaou-El-Bahri',
                    'code' => 35032,
                ],
                8 => [
                    'name' => 'Boumerdes',
                    'code' => 35001,
                ],
                9 => [
                    'name' => 'Bouzegza Keddara',
                    'code' => 35022,
                ],
                10 => [
                    'name' => 'Chabet el Ameur',
                    'code' => 35014,
                ],
                11 => [
                    'name' => 'Corso',
                    'code' => 35019,
                ],
                12 => [
                    'name' => 'Dellys',
                    'code' => 35028,
                ],
                13 => [
                    'name' => 'Djinet',
                    'code' => 35009,
                ],
                14 => [
                    'name' => 'El Kharrouba',
                    'code' => 35038,
                ],
                15 => [
                    'name' => 'Hammedi',
                    'code' => 35036,
                ],
                16 => [
                    'name' => 'Issers',
                    'code' => 35010,
                ],
                17 => [
                    'name' => 'Khemis El-Khechna',
                    'code' => 35037,
                ],
                18 => [
                    'name' => 'Larbatache',
                    'code' => 35021,
                ],
                19 => [
                    'name' => 'Leghata',
                    'code' => 35035,
                ],
                20 => [
                    'name' => 'Naciria',
                    'code' => 35008,
                ],
                21 => [
                    'name' => 'Ouled Aïssa',
                    'code' => 35026,
                ],
                22 => [
                    'name' => 'Ouled Hedadj',
                    'code' => 35033,
                ],
                23 => [
                    'name' => 'Ouled Moussa',
                    'code' => 35020,
                ],
                24 => [
                    'name' => 'Si Mustapha',
                    'code' => 35012,
                ],
                25 => [
                    'name' => 'Sidi Daoud',
                    'code' => 35007,
                ],
                26 => [
                    'name' => 'Souk El Had',
                    'code' => 35031,
                ],
                27 => [
                    'name' => 'Taourga',
                    'code' => 35025,
                ],
                28 => [
                    'name' => 'Thenia',
                    'code' => 35015,
                ],
                29 => [
                    'name' => 'Tidjelabine',
                    'code' => 35013,
                ],
                30 => [
                    'name' => 'Timezrit',
                    'code' => 35018,
                ],
                31 => [
                    'name' => 'Zemmouri',
                    'code' => 35011,
                ],
            ],
            36 => [
                0 => [
                    'name' => 'Aïn El Assel',
                    'code' => 36001,
                ],
                1 => [
                    'name' => 'Aïn Kerma',
                    'code' => 36002,
                ],
                2 => [
                    'name' => 'Asfour',
                    'code' => 36003,
                ],
                3 => [
                    'name' => 'Ben Mehidi',
                    'code' => 36004,
                ],
                4 => [
                    'name' => 'Berrihane',
                    'code' => 36005,
                ],
                5 => [
                    'name' => 'Besbes',
                    'code' => 36006,
                ],
                6 => [
                    'name' => 'Bougous',
                    'code' => 36007,
                ],
                7 => [
                    'name' => 'Bouhadjar',
                    'code' => 36008,
                ],
                8 => [
                    'name' => 'Bouteldja',
                    'code' => 36009,
                ],
                9 => [
                    'name' => 'Chebaita Mokhtar',
                    'code' => 360010,
                ],
                10 => [
                    'name' => 'Chefia',
                    'code' => 36011,
                ],
                11 => [
                    'name' => 'Chihani',
                    'code' => 36012,
                ],
                12 => [
                    'name' => 'Dréan',
                    'code' => 36013,
                ],
                13 => [
                    'name' => 'Echatt',
                    'code' => 36014,
                ],
                14 => [
                    'name' => 'El Aioun',
                    'code' => 36015,
                ],
                15 => [
                    'name' => 'El Kala',
                    'code' => 36016,
                ],
                16 => [
                    'name' => 'El Tarf',
                    'code' => 36017,
                ],
                17 => [
                    'name' => 'Hammam Beni Salah',
                    'code' => 36018,
                ],
                18 => [
                    'name' => 'Lac des Oiseaux',
                    'code' => 36019,
                ],
                19 => [
                    'name' => 'Oued Zitoun',
                    'code' => 36020,
                ],
                20 => [
                    'name' => 'Raml Souk',
                    'code' => 36021,
                ],
                21 => [
                    'name' => 'Souarekh',
                    'code' => 36022,
                ],
                22 => [
                    'name' => 'Zerizer',
                    'code' => 36023,
                ],
                23 => [
                    'name' => 'Zitouna',
                    'code' => 36024,
                ],
            ],
            37 => [
                0 => [
                    'name' => 'Oum el Assel',
                    'code' => 37001,
                ],
                1 => [
                    'name' => 'Tindouf',
                    'code' => 37002,
                ],
            ],
            38 => [
                0 => [
                    'name' => 'Ammari',
                    'code' => 38001,
                ],
                1 => [
                    'name' => 'Beni Chaib',
                    'code' => 38002,
                ],
                2 => [
                    'name' => 'Beni Lahcene',
                    'code' => 38003,
                ],
                3 => [
                    'name' => 'Boucaid',
                    'code' => 38004,
                ],
                4 => [
                    'name' => 'Bordj Bou Naama',
                    'code' => 38005,
                ],
                5 => [
                    'name' => 'Bordj El Emir Abdelkader',
                    'code' => 38006,
                ],
                6 => [
                    'name' => 'Khemisti',
                    'code' => 38007,
                ],
                7 => [
                    'name' => 'Larbaâ',
                    'code' => 38008,
                ],
                8 => [
                    'name' => 'Lardjem',
                    'code' => 38009,
                ],
                9 => [
                    'name' => 'Layoune',
                    'code' => 380010,
                ],
                10 => [
                    'name' => 'Lazharia',
                    'code' => 38011,
                ],
                11 => [
                    'name' => 'Maacem',
                    'code' => 38012,
                ],
                12 => [
                    'name' => 'Melaab',
                    'code' => 38013,
                ],
                13 => [
                    'name' => 'Ouled Bessem',
                    'code' => 38014,
                ],
                14 => [
                    'name' => 'Sidi Abed',
                    'code' => 38015,
                ],
                15 => [
                    'name' => 'Sidi Boutouchent',
                    'code' => 38016,
                ],
                16 => [
                    'name' => 'Sidi Lantri',
                    'code' => 38017,
                ],
                17 => [
                    'name' => 'Sidi Slimane',
                    'code' => 38018,
                ],
                18 => [
                    'name' => 'Tamalaht',
                    'code' => 38019,
                ],
                19 => [
                    'name' => 'Theniet El Had',
                    'code' => 38020,
                ],
                20 => [
                    'name' => 'Tissemsilt',
                    'code' => 38021,
                ],
                21 => [
                    'name' => 'Youssoufia',
                    'code' => 38022,
                ],
            ],
            39 => [
                0 => [
                    'name' => 'El Oued',
                    'code' => 39001,
                ],
                1 => [
                    'name' => 'Robbah',
                    'code' => 39002,
                ],
                2 => [
                    'name' => 'Oued El Alenda',
                    'code' => 39003,
                ],
                3 => [
                    'name' => 'Bayadha',
                    'code' => 39004,
                ],
                4 => [
                    'name' => 'Nakhla',
                    'code' => 39005,
                ],
                5 => [
                    'name' => 'Guemar',
                    'code' => 39006,
                ],
                6 => [
                    'name' => 'Kouinine',
                    'code' => 39007,
                ],
                7 => [
                    'name' => 'Reguiba',
                    'code' => 39008,
                ],
                8 => [
                    'name' => 'Hamraia',
                    'code' => 39009,
                ],
                9 => [
                    'name' => 'Taghzout',
                    'code' => 39010,
                ],
                10 => [
                    'name' => 'Debila',
                    'code' => 39011,
                ],
                11 => [
                    'name' => 'Hassani Abdelkrim',
                    'code' => 39012,
                ],
                12 => [
                    'name' => 'Hassi Khalifa',
                    'code' => 39013,
                ],
                13 => [
                    'name' => 'Taleb Larbi',
                    'code' => 39014,
                ],
                14 => [
                    'name' => 'Douar El Ma',
                    'code' => 39015,
                ],
                15 => [
                    'name' => 'Sidi Aoun',
                    'code' => 39016,
                ],
                16 => [
                    'name' => 'Trifaoui',
                    'code' => 39017,
                ],
                17 => [
                    'name' => 'Magrane',
                    'code' => 39018,
                ],
                18 => [
                    'name' => 'Beni Guecha',
                    'code' => 39019,
                ],
                19 => [
                    'name' => 'Ourmas',
                    'code' => 39020,
                ],
                20 => [
                    'name' => 'El Ogla',
                    'code' => 39025,
                ],
                21 => [
                    'name' => 'Mih Ouansa',
                    'code' => 39026,
                ],
            ],
            40 => [
                0 => [
                    'name' => 'Aïn Touila',
                    'code' => 40001,
                ],
                1 => [
                    'name' => 'Babar',
                    'code' => 40002,
                ],
                2 => [
                    'name' => 'Baghai',
                    'code' => 40003,
                ],
                3 => [
                    'name' => 'Bouhmama',
                    'code' => 40004,
                ],
                4 => [
                    'name' => 'Chechar',
                    'code' => 40005,
                ],
                5 => [
                    'name' => 'Chelia',
                    'code' => 40006,
                ],
                6 => [
                    'name' => 'Djellal',
                    'code' => 40007,
                ],
                7 => [
                    'name' => 'El Hamma',
                    'code' => 40008,
                ],
                8 => [
                    'name' => 'El Mahmal',
                    'code' => 40009,
                ],
                9 => [
                    'name' => 'El Oueldja',
                    'code' => 400010,
                ],
                10 => [
                    'name' => 'Ensigha',
                    'code' => 40011,
                ],
                11 => [
                    'name' => 'Kais',
                    'code' => 40012,
                ],
                12 => [
                    'name' => 'Khenchela',
                    'code' => 40013,
                ],
                13 => [
                    'name' => 'Khirane',
                    'code' => 40014,
                ],
                14 => [
                    'name' => 'M\'Sara',
                    'code' => 40015,
                ],
                15 => [
                    'name' => 'M\'Toussa',
                    'code' => 40016,
                ],
                16 => [
                    'name' => 'Ouled Rechache',
                    'code' => 40017,
                ],
                17 => [
                    'name' => 'Remila',
                    'code' => 40018,
                ],
                18 => [
                    'name' => 'Tamza',
                    'code' => 40019,
                ],
                19 => [
                    'name' => 'Taouzient',
                    'code' => 40020,
                ],
                20 => [
                    'name' => 'Yabous',
                    'code' => 40021,
                ],
            ],
            41 => [
                0 => [
                    'name' => 'Souk Ahras',
                    'code' => 41001,
                ],
                1 => [
                    'name' => 'Sedrata',
                    'code' => 41002,
                ],
                2 => [
                    'name' => 'Hanancha',
                    'code' => 41003,
                ],
                3 => [
                    'name' => 'Mechroha',
                    'code' => 41004,
                ],
                4 => [
                    'name' => 'Ouled Driss',
                    'code' => 41005,
                ],
                5 => [
                    'name' => 'Tiffech',
                    'code' => 41006,
                ],
                6 => [
                    'name' => 'Zaarouria',
                    'code' => 41007,
                ],
                7 => [
                    'name' => 'Taoura',
                    'code' => 41008,
                ],
                8 => [
                    'name' => 'Dréa',
                    'code' => 41009,
                ],
                9 => [
                    'name' => 'Heddada',
                    'code' => 41010,
                ],
                10 => [
                    'name' => 'Khedara',
                    'code' => 41011,
                ],
                11 => [
                    'name' => 'Merahna',
                    'code' => 41012,
                ],
                12 => [
                    'name' => 'Ouled Moumene',
                    'code' => 41013,
                ],
                13 => [
                    'name' => 'Bir Bou Haouch',
                    'code' => 41014,
                ],
                14 => [
                    'name' => 'M\'daourouch',
                    'code' => 41015,
                ],
                15 => [
                    'name' => 'Oum El Adhaim',
                    'code' => 41016,
                ],
                16 => [
                    'name' => 'Aïn Zana',
                    'code' => 41017,
                ],
                17 => [
                    'name' => 'Aïn Soltane',
                    'code' => 41018,
                ],
                18 => [
                    'name' => 'Ouillen',
                    'code' => 41019,
                ],
                19 => [
                    'name' => 'Sidi Fredj',
                    'code' => 41020,
                ],
                20 => [
                    'name' => 'Safel El Ouiden',
                    'code' => 41021,
                ],
                21 => [
                    'name' => 'Ragouba',
                    'code' => 41022,
                ],
                22 => [
                    'name' => 'Khemissa',
                    'code' => 41023,
                ],
                23 => [
                    'name' => 'Oued Keberit',
                    'code' => 41024,
                ],
                24 => [
                    'name' => 'Terraguelt',
                    'code' => 41025,
                ],
                25 => [
                    'name' => 'Zouabi',
                    'code' => 41026,
                ],
            ],
            42 => [
                0 => [
                    'name' => 'Tipaza',
                    'code' => 42001,
                ],
                1 => [
                    'name' => 'Menaceur',
                    'code' => 42002,
                ],
                2 => [
                    'name' => 'Larhat',
                    'code' => 42003,
                ],
                3 => [
                    'name' => 'Douaouda',
                    'code' => 42004,
                ],
                4 => [
                    'name' => 'Bourkika',
                    'code' => 42005,
                ],
                5 => [
                    'name' => 'Khemisti',
                    'code' => 42006,
                ],
                6 => [
                    'name' => 'Aghbal',
                    'code' => 42010,
                ],
                7 => [
                    'name' => 'Hadjout',
                    'code' => 42012,
                ],
                8 => [
                    'name' => 'Sidi Amar',
                    'code' => 42013,
                ],
                9 => [
                    'name' => 'Gouraya',
                    'code' => 42014,
                ],
                10 => [
                    'name' => 'Nador',
                    'code' => 42015,
                ],
                11 => [
                    'name' => 'Chaiba',
                    'code' => 42016,
                ],
                12 => [
                    'name' => 'Aïn Tagourait',
                    'code' => 42017,
                ],
                13 => [
                    'name' => 'Cherchell',
                    'code' => 42022,
                ],
                14 => [
                    'name' => 'Damous',
                    'code' => 42023,
                ],
                15 => [
                    'name' => 'Merad',
                    'code' => 42024,
                ],
                16 => [
                    'name' => 'Fouka',
                    'code' => 42025,
                ],
                17 => [
                    'name' => 'Bou Ismaïl',
                    'code' => 42026,
                ],
                18 => [
                    'name' => 'Ahmar El Aïn',
                    'code' => 42027,
                ],
                19 => [
                    'name' => 'Bouharoun',
                    'code' => 42030,
                ],
                20 => [
                    'name' => 'Sidi Ghiles',
                    'code' => 42032,
                ],
                21 => [
                    'name' => 'Messelmoun',
                    'code' => 42033,
                ],
                22 => [
                    'name' => 'Sidi Rached',
                    'code' => 42034,
                ],
                23 => [
                    'name' => 'Koléa',
                    'code' => 42035,
                ],
                24 => [
                    'name' => 'Attatba',
                    'code' => 42036,
                ],
                25 => [
                    'name' => 'Sidi Semiane',
                    'code' => 42040,
                ],
                26 => [
                    'name' => 'Beni Milleuk',
                    'code' => 42041,
                ],
                27 => [
                    'name' => 'Hadjeret Ennous',
                    'code' => 42042,
                ],
            ],
            43 => [
                0 => [
                    'name' => 'Ahmed Rachedi',
                    'code' => 43001,
                ],
                1 => [
                    'name' => 'Aïn Beida Harriche',
                    'code' => 43002,
                ],
                2 => [
                    'name' => 'Aïn Mellouk',
                    'code' => 43003,
                ],
                3 => [
                    'name' => 'Aïn Tine',
                    'code' => 43004,
                ],
                4 => [
                    'name' => 'Amira Arrès',
                    'code' => 43005,
                ],
                5 => [
                    'name' => 'Benyahia Abderrahmane',
                    'code' => 43006,
                ],
                6 => [
                    'name' => 'Bouhatem',
                    'code' => 43007,
                ],
                7 => [
                    'name' => 'Chelghoum Laid',
                    'code' => 43008,
                ],
                8 => [
                    'name' => 'Chigara',
                    'code' => 43009,
                ],
                9 => [
                    'name' => 'Derradji Bousselah',
                    'code' => 430010,
                ],
                10 => [
                    'name' => 'El Mechira',
                    'code' => 43011,
                ],
                11 => [
                    'name' => 'Elayadi Barbes',
                    'code' => 43012,
                ],
                12 => [
                    'name' => 'Ferdjioua',
                    'code' => 43013,
                ],
                13 => [
                    'name' => 'Grarem Gouga',
                    'code' => 43014,
                ],
                14 => [
                    'name' => 'Hamala',
                    'code' => 43015,
                ],
                15 => [
                    'name' => 'Mila',
                    'code' => 43016,
                ],
                16 => [
                    'name' => 'Minar Zarza',
                    'code' => 43017,
                ],
                17 => [
                    'name' => 'Oued Athmania',
                    'code' => 43018,
                ],
                18 => [
                    'name' => 'Oued Endja',
                    'code' => 43019,
                ],
                19 => [
                    'name' => 'Oued Seguen',
                    'code' => 43020,
                ],
                20 => [
                    'name' => 'Ouled Khalouf',
                    'code' => 43021,
                ],
                21 => [
                    'name' => 'Rouached',
                    'code' => 43022,
                ],
                22 => [
                    'name' => 'Sidi Khelifa',
                    'code' => 43023,
                ],
                23 => [
                    'name' => 'Sidi Merouane',
                    'code' => 43024,
                ],
                24 => [
                    'name' => 'Tadjenanet',
                    'code' => 43025,
                ],
                25 => [
                    'name' => 'Tassadane Haddada',
                    'code' => 43026,
                ],
                26 => [
                    'name' => 'Teleghma',
                    'code' => 43027,
                ],
                27 => [
                    'name' => 'Terrai Bainen',
                    'code' => 43028,
                ],
                28 => [
                    'name' => 'Tessala Lemtaï',
                    'code' => 43029,
                ],
                29 => [
                    'name' => 'Tiberguent',
                    'code' => 43030,
                ],
                30 => [
                    'name' => 'Yahia Beni Guecha',
                    'code' => 43031,
                ],
                31 => [
                    'name' => 'Zeghaia',
                    'code' => 43032,
                ],
            ],
            44 => [
                0 => [
                    'name' => 'Aïn Beniane',
                    'code' => 44001,
                ],
                1 => [
                    'name' => 'Aïn Bouyahia',
                    'code' => 44002,
                ],
                2 => [
                    'name' => 'Aïn Defla',
                    'code' => 44003,
                ],
                3 => [
                    'name' => 'Aïn Lechiekh',
                    'code' => 44004,
                ],
                4 => [
                    'name' => 'Aïn Soltane',
                    'code' => 44005,
                ],
                5 => [
                    'name' => 'Aïn Torki',
                    'code' => 44006,
                ],
                6 => [
                    'name' => 'Arib',
                    'code' => 44007,
                ],
                7 => [
                    'name' => 'Bathia',
                    'code' => 44008,
                ],
                8 => [
                    'name' => 'Belaas',
                    'code' => 44009,
                ],
                9 => [
                    'name' => 'Ben Allal',
                    'code' => 440010,
                ],
                10 => [
                    'name' => 'Birbouche',
                    'code' => 44011,
                ],
                11 => [
                    'name' => 'Bir Ould Khelifa',
                    'code' => 44012,
                ],
                12 => [
                    'name' => 'Bordj Emir Khaled',
                    'code' => 44013,
                ],
                13 => [
                    'name' => 'Boumedfaa',
                    'code' => 44014,
                ],
                14 => [
                    'name' => 'Bourached',
                    'code' => 44015,
                ],
                15 => [
                    'name' => 'Djelida',
                    'code' => 44016,
                ],
                16 => [
                    'name' => 'Djemaa Ouled Cheikh',
                    'code' => 44017,
                ],
                17 => [
                    'name' => 'Djendel',
                    'code' => 44018,
                ],
                18 => [
                    'name' => 'El Abadia',
                    'code' => 44019,
                ],
                19 => [
                    'name' => 'El Amra',
                    'code' => 44020,
                ],
                20 => [
                    'name' => 'El Attaf',
                    'code' => 44021,
                ],
                21 => [
                    'name' => 'El Hassania',
                    'code' => 44022,
                ],
                22 => [
                    'name' => 'El Maine',
                    'code' => 44023,
                ],
                23 => [
                    'name' => 'Hammam Righa',
                    'code' => 44024,
                ],
                24 => [
                    'name' => 'Hoceinia',
                    'code' => 44025,
                ],
                25 => [
                    'name' => 'Khemis Miliana',
                    'code' => 44026,
                ],
                26 => [
                    'name' => 'Mekhatria',
                    'code' => 44027,
                ],
                27 => [
                    'name' => 'Miliana',
                    'code' => 44028,
                ],
                28 => [
                    'name' => 'Oued Chorfa',
                    'code' => 44029,
                ],
                29 => [
                    'name' => 'Oued Djemaa',
                    'code' => 44030,
                ],
                30 => [
                    'name' => 'Rouina',
                    'code' => 44031,
                ],
                31 => [
                    'name' => 'Sidi Lakhdar',
                    'code' => 44032,
                ],
                32 => [
                    'name' => 'Tacheta Zougagha',
                    'code' => 44033,
                ],
                33 => [
                    'name' => 'Tarik Ibn Ziad',
                    'code' => 44034,
                ],
                34 => [
                    'name' => 'Tiberkanine',
                    'code' => 44035,
                ],
                35 => [
                    'name' => 'Zeddine',
                    'code' => 44036,
                ],
            ],
            45 => [
                0 => [
                    'name' => 'Naâma',
                    'code' => 45001,
                ],
                1 => [
                    'name' => 'Mecheria',
                    'code' => 45002,
                ],
                2 => [
                    'name' => 'Aïn Sefra',
                    'code' => 45003,
                ],
                3 => [
                    'name' => 'Tiout',
                    'code' => 45004,
                ],
                4 => [
                    'name' => 'Sfissifa',
                    'code' => 45005,
                ],
                5 => [
                    'name' => 'Moghrar',
                    'code' => 45006,
                ],
                6 => [
                    'name' => 'Assela',
                    'code' => 45007,
                ],
                7 => [
                    'name' => 'Djeniene Bourezg',
                    'code' => 45008,
                ],
                8 => [
                    'name' => 'Aïn Ben Khelil',
                    'code' => 45009,
                ],
                9 => [
                    'name' => 'Makman Ben Amer',
                    'code' => 450010,
                ],
                10 => [
                    'name' => 'Kasdir',
                    'code' => 45011,
                ],
                11 => [
                    'name' => 'El Biod',
                    'code' => 45012,
                ],
            ],
            46 => [
                0 => [
                    'name' => 'Aghlal',
                    'code' => 46001,
                ],
                1 => [
                    'name' => 'Aïn El Arbaa',
                    'code' => 46002,
                ],
                2 => [
                    'name' => 'Aïn Kihal',
                    'code' => 46003,
                ],
                3 => [
                    'name' => 'Aïn Témouchent',
                    'code' => 46004,
                ],
                4 => [
                    'name' => 'Aïn Tolba',
                    'code' => 46005,
                ],
                5 => [
                    'name' => 'Aoubellil',
                    'code' => 46006,
                ],
                6 => [
                    'name' => 'Beni Saf',
                    'code' => 46007,
                ],
                7 => [
                    'name' => 'Bouzedjar',
                    'code' => 46008,
                ],
                8 => [
                    'name' => 'Chaabat El Leham',
                    'code' => 46009,
                ],
                9 => [
                    'name' => 'Chentouf',
                    'code' => 460010,
                ],
                10 => [
                    'name' => 'El Amria',
                    'code' => 46011,
                ],
                11 => [
                    'name' => 'El Emir Abdelkader',
                    'code' => 46012,
                ],
                12 => [
                    'name' => 'El Malah',
                    'code' => 46013,
                ],
                13 => [
                    'name' => 'El Messaid',
                    'code' => 46014,
                ],
                14 => [
                    'name' => 'Hammam Bouhadjar',
                    'code' => 46015,
                ],
                15 => [
                    'name' => 'Hassasna',
                    'code' => 46016,
                ],
                16 => [
                    'name' => 'Hassi El Ghella',
                    'code' => 46017,
                ],
                17 => [
                    'name' => 'Oued Berkeche',
                    'code' => 46018,
                ],
                18 => [
                    'name' => 'Oued Sabah',
                    'code' => 46019,
                ],
                19 => [
                    'name' => 'Ouled Boudjemaa',
                    'code' => 46020,
                ],
                20 => [
                    'name' => 'Ouled Kihal',
                    'code' => 46021,
                ],
                21 => [
                    'name' => 'Oulhaça El Gheraba',
                    'code' => 46022,
                ],
                22 => [
                    'name' => 'Sidi Ben Adda',
                    'code' => 46023,
                ],
                23 => [
                    'name' => 'Sidi Boumedienne',
                    'code' => 46024,
                ],
                24 => [
                    'name' => 'Sidi Ouriache',
                    'code' => 46025,
                ],
                25 => [
                    'name' => 'Sidi Safi',
                    'code' => 46026,
                ],
                26 => [
                    'name' => 'Tamzoura',
                    'code' => 46027,
                ],
                27 => [
                    'name' => 'Terga',
                    'code' => 46028,
                ],
            ],
            47 => [
                0 => [
                    'name' => 'Berriane',
                    'code' => 47001,
                ],
                1 => [
                    'name' => 'Bounoura',
                    'code' => 47002,
                ],
                2 => [
                    'name' => 'Dhayet Bendhahoua',
                    'code' => 47003,
                ],
                3 => [
                    'name' => 'El Atteuf',
                    'code' => 47004,
                ],
                4 => [
                    'name' => 'El Guerrara',
                    'code' => 47005,
                ],
                5 => [
                    'name' => 'Ghardaïa',
                    'code' => 47006,
                ],
                6 => [
                    'name' => 'Mansoura',
                    'code' => 47007,
                ],
                7 => [
                    'name' => 'Metlili',
                    'code' => 47008,
                ],
                8 => [
                    'name' => 'Sebseb',
                    'code' => 47009,
                ],
                9 => [
                    'name' => 'Zelfana',
                    'code' => 470010,
                ],
            ],
            48 => [
                0 => [
                    'name' => 'Aïn Rahma',
                    'code' => 48001,
                ],
                1 => [
                    'name' => 'Aïn Tarek',
                    'code' => 48002,
                ],
                2 => [
                    'name' => '‘Aarch Meknassa',
                    'code' => 48003,
                ],
                3 => [
                    'name' => 'Ammi Moussa',
                    'code' => 48004,
                ],
                4 => [
                    'name' => 'Belassel Bouzegza',
                    'code' => 48005,
                ],
                5 => [
                    'name' => 'Bendaoud',
                    'code' => 48006,
                ],
                6 => [
                    'name' => 'Beni Dergoun',
                    'code' => 48007,
                ],
                7 => [
                    'name' => 'Beni Zentis',
                    'code' => 48008,
                ],
                8 => [
                    'name' => 'Dar Ben Abdellah',
                    'code' => 48009,
                ],
                9 => [
                    'name' => 'Djidioua',
                    'code' => 480010,
                ],
                10 => [
                    'name' => 'El Guettar',
                    'code' => 48011,
                ],
                11 => [
                    'name' => 'El Hamadna',
                    'code' => 48012,
                ],
                12 => [
                    'name' => 'El Hassi',
                    'code' => 48013,
                ],
                13 => [
                    'name' => 'El Matmar',
                    'code' => 48014,
                ],
                14 => [
                    'name' => 'El Ouldja',
                    'code' => 48015,
                ],
                15 => [
                    'name' => 'Had Echkalla',
                    'code' => 48016,
                ],
                16 => [
                    'name' => 'Hamri',
                    'code' => 48017,
                ],
                17 => [
                    'name' => 'Kalaa',
                    'code' => 48018,
                ],
                18 => [
                    'name' => 'Lahlef',
                    'code' => 48019,
                ],
                19 => [
                    'name' => 'Mazouna',
                    'code' => 48020,
                ],
                20 => [
                    'name' => 'Mediouna',
                    'code' => 48021,
                ],
                21 => [
                    'name' => 'Mendes',
                    'code' => 48022,
                ],
                22 => [
                    'name' => 'Merdja Sidi Abed',
                    'code' => 48023,
                ],
                23 => [
                    'name' => 'Ouarizane',
                    'code' => 48024,
                ],
                24 => [
                    'name' => 'Oued Essalem',
                    'code' => 48025,
                ],
                25 => [
                    'name' => 'Oued Rhiou',
                    'code' => 48026,
                ],
                26 => [
                    'name' => 'Ouled Aiche',
                    'code' => 48027,
                ],
                27 => [
                    'name' => 'Oued El Djemaa',
                    'code' => 48028,
                ],
                28 => [
                    'name' => 'Ouled Sidi Mihoub',
                    'code' => 48029,
                ],
                29 => [
                    'name' => 'Ramka',
                    'code' => 48030,
                ],
                30 => [
                    'name' => 'Relizane',
                    'code' => 48031,
                ],
                31 => [
                    'name' => 'Sidi Khettab',
                    'code' => 48032,
                ],
                32 => [
                    'name' => 'Sidi Lazreg',
                    'code' => 48033,
                ],
                33 => [
                    'name' => 'Sidi M\'Hamed Ben Ali',
                    'code' => 48034,
                ],
                34 => [
                    'name' => 'Sidi M\'Hamed Benaouda',
                    'code' => 48035,
                ],
                35 => [
                    'name' => 'Sidi Saada',
                    'code' => 48036,
                ],
                36 => [
                    'name' => 'Souk El Had',
                    'code' => 48037,
                ],
                37 => [
                    'name' => 'Yellel',
                    'code' => 48038,
                ],
                38 => [
                    'name' => 'Zemmora',
                    'code' => 48039,
                ],
            ],
        ];

        foreach ($townsByWilaya as $wilaya_id => $towns) {
            foreach ($towns as $town) {
                $townEntry = array_merge(['wilaya_id' => (int)$wilaya_id, 'protected' => true], $town);
                Town::create($townEntry);
            }
        }

        //
    }
}
