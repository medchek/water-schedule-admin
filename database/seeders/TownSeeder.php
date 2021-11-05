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
                    'name' => 'adrar',
                    'code' => 1001,
                ],
                1 => [
                    'name' => 'tamest',
                    'code' => 1002,
                ],
                2 => [
                    'name' => 'charouine',
                    'code' => 1003,
                ],
                3 => [
                    'name' => 'reggane',
                    'code' => 1004,
                ],
                4 => [
                    'name' => 'in zghmir',
                    'code' => 1005,
                ],
                5 => [
                    'name' => 'tit',
                    'code' => 1006,
                ],
                6 => [
                    'name' => 'ksar kaddour',
                    'code' => 1007,
                ],
                7 => [
                    'name' => 'tsabit',
                    'code' => 1008,
                ],
                8 => [
                    'name' => 'timimoun',
                    'code' => 1009,
                ],
                9 => [
                    'name' => 'ouled saïd',
                    'code' => 1010,
                ],
                10 => [
                    'name' => 'zaouiet kounta',
                    'code' => 1011,
                ],
                11 => [
                    'name' => 'aoulef',
                    'code' => 1012,
                ],
                12 => [
                    'name' => 'tamekten',
                    'code' => 1013,
                ],
                13 => [
                    'name' => 'tamantit',
                    'code' => 1014,
                ],
                14 => [
                    'name' => 'fenoughil',
                    'code' => 1015,
                ],
                15 => [
                    'name' => 'tinerkouk',
                    'code' => 1016,
                ],
                16 => [
                    'name' => 'deldoul',
                    'code' => 1017,
                ],
                17 => [
                    'name' => 'sali',
                    'code' => 1018,
                ],
                18 => [
                    'name' => 'akabli',
                    'code' => 1019,
                ],
                19 => [
                    'name' => 'metarfa',
                    'code' => 1020,
                ],
                20 => [
                    'name' => 'ouled ahmed tammi',
                    'code' => 1021,
                ],
                21 => [
                    'name' => 'bouda',
                    'code' => 1022,
                ],
                22 => [
                    'name' => 'aougrout',
                    'code' => 1023,
                ],
                23 => [
                    'name' => 'talmine',
                    'code' => 1024,
                ],
                24 => [
                    'name' => 'bordj badji mokhtar',
                    'code' => 1025,
                ],
                25 => [
                    'name' => 'sebaa',
                    'code' => 1026,
                ],
                26 => [
                    'name' => 'ouled aïssa',
                    'code' => 1027,
                ],
                27 => [
                    'name' => 'timiaouine',
                    'code' => 1028,
                ],
            ],
            2 => [
                0 => [
                    'name' => 'chlef',
                    'code' => 2001,
                ],
                1 => [
                    'name' => 'ténès',
                    'code' => 2002,
                ],
                2 => [
                    'name' => 'bénairia',
                    'code' => 2003,
                ],
                3 => [
                    'name' => 'el karimia',
                    'code' => 2004,
                ],
                4 => [
                    'name' => 'tadjena',
                    'code' => 2005,
                ],
                5 => [
                    'name' => 'taougrite',
                    'code' => 2006,
                ],
                6 => [
                    'name' => 'beni haoua',
                    'code' => 2007,
                ],
                7 => [
                    'name' => 'sobha',
                    'code' => 2008,
                ],
                8 => [
                    'name' => 'harchoun',
                    'code' => 2009,
                ],
                9 => [
                    'name' => 'ouled fares',
                    'code' => 2010,
                ],
                10 => [
                    'name' => 'sidi akkacha',
                    'code' => 2011,
                ],
                11 => [
                    'name' => 'boukadir',
                    'code' => 2012,
                ],
                12 => [
                    'name' => 'beni rached',
                    'code' => 2013,
                ],
                13 => [
                    'name' => 'talassa',
                    'code' => 2014,
                ],
                14 => [
                    'name' => 'harenfa',
                    'code' => 2015,
                ],
                15 => [
                    'name' => 'oued goussine',
                    'code' => 2016,
                ],
                16 => [
                    'name' => 'dahra',
                    'code' => 2017,
                ],
                17 => [
                    'name' => 'ouled abbes',
                    'code' => 2018,
                ],
                18 => [
                    'name' => 'sendjas',
                    'code' => 2019,
                ],
                19 => [
                    'name' => 'zeboudja',
                    'code' => 2020,
                ],
                20 => [
                    'name' => 'oued sly',
                    'code' => 2021,
                ],
                21 => [
                    'name' => 'abou el hassan',
                    'code' => 2022,
                ],
                22 => [
                    'name' => 'el marsa',
                    'code' => 2023,
                ],
                23 => [
                    'name' => 'chettia',
                    'code' => 2024,
                ],
                24 => [
                    'name' => 'sidi abderrahmane',
                    'code' => 2025,
                ],
                25 => [
                    'name' => 'moussadek',
                    'code' => 2026,
                ],
                26 => [
                    'name' => 'el hadjadj',
                    'code' => 2027,
                ],
                27 => [
                    'name' => 'labiod medjadja',
                    'code' => 2028,
                ],
                28 => [
                    'name' => 'oued fodda',
                    'code' => 2029,
                ],
                29 => [
                    'name' => 'ouled ben abdelkader',
                    'code' => 2030,
                ],
                30 => [
                    'name' => 'bouzeghaia',
                    'code' => 2031,
                ],
                31 => [
                    'name' => 'aïn merane',
                    'code' => 2032,
                ],
                32 => [
                    'name' => 'oum drou',
                    'code' => 2033,
                ],
                33 => [
                    'name' => 'breira',
                    'code' => 2034,
                ],
                34 => [
                    'name' => 'beni bouateb',
                    'code' => 2035,
                ],
            ],
            3 => [
                0 => [
                    'name' => 'laghouat',
                    'code' => 3001,
                ],
                1 => [
                    'name' => 'ksar el hirane',
                    'code' => 3002,
                ],
                2 => [
                    'name' => 'bennasser benchohra',
                    'code' => 3003,
                ],
                3 => [
                    'name' => 'sidi makhlouf',
                    'code' => 3004,
                ],
                4 => [
                    'name' => 'hassi delaa',
                    'code' => 3005,
                ],
                5 => [
                    'name' => 'hassi r\'mel',
                    'code' => 3006,
                ],
                6 => [
                    'name' => 'aïn madhi',
                    'code' => 3007,
                ],
                7 => [
                    'name' => 'tadjemout',
                    'code' => 3008,
                ],
                8 => [
                    'name' => 'kheneg',
                    'code' => 3009,
                ],
                9 => [
                    'name' => 'gueltat sidi saad',
                    'code' => 3010,
                ],
                10 => [
                    'name' => 'aïn sidi ali',
                    'code' => 3011,
                ],
                11 => [
                    'name' => 'beidha',
                    'code' => 3012,
                ],
                12 => [
                    'name' => 'brida',
                    'code' => 3013,
                ],
                13 => [
                    'name' => 'el ghicha',
                    'code' => 3014,
                ],
                14 => [
                    'name' => 'hadj mechri',
                    'code' => 3015,
                ],
                15 => [
                    'name' => 'sebgag',
                    'code' => 3016,
                ],
                16 => [
                    'name' => 'taouiala',
                    'code' => 3017,
                ],
                17 => [
                    'name' => 'tadjrouna',
                    'code' => 3018,
                ],
                18 => [
                    'name' => 'aflou',
                    'code' => 3019,
                ],
                19 => [
                    'name' => 'el assafia',
                    'code' => 3020,
                ],
                20 => [
                    'name' => 'oued morra',
                    'code' => 3021,
                ],
                21 => [
                    'name' => 'oued m\'zi',
                    'code' => 3022,
                ],
                22 => [
                    'name' => 'el houaita',
                    'code' => 3023,
                ],
                23 => [
                    'name' => 'sidi bouzid',
                    'code' => 3024,
                ],
            ],
            4 => [
                0 => [
                    'name' => 'oum el bouaghi',
                    'code' => 4001,
                ],
                1 => [
                    'name' => 'aïn beïda',
                    'code' => 4002,
                ],
                2 => [
                    'name' => 'aïn m\'lila',
                    'code' => 4003,
                ],
                3 => [
                    'name' => 'behir chergui',
                    'code' => 4004,
                ],
                4 => [
                    'name' => 'el amiria',
                    'code' => 4005,
                ],
                5 => [
                    'name' => 'sigus',
                    'code' => 4006,
                ],
                6 => [
                    'name' => 'el belala',
                    'code' => 4007,
                ],
                7 => [
                    'name' => 'aïn babouche',
                    'code' => 4008,
                ],
                8 => [
                    'name' => 'berriche',
                    'code' => 4009,
                ],
                9 => [
                    'name' => 'ouled hamla',
                    'code' => 4010,
                ],
                10 => [
                    'name' => 'dhalaa',
                    'code' => 4011,
                ],
                11 => [
                    'name' => 'aïn kercha',
                    'code' => 4012,
                ],
                12 => [
                    'name' => 'hanchir toumghani',
                    'code' => 4013,
                ],
                13 => [
                    'name' => 'el djazia',
                    'code' => 4014,
                ],
                14 => [
                    'name' => 'aïn diss',
                    'code' => 4015,
                ],
                15 => [
                    'name' => 'fkirina',
                    'code' => 4016,
                ],
                16 => [
                    'name' => 'souk naamane',
                    'code' => 4017,
                ],
                17 => [
                    'name' => 'zorg',
                    'code' => 4018,
                ],
                18 => [
                    'name' => 'el fedjoudj boughrara saoudi',
                    'code' => 4019,
                ],
                19 => [
                    'name' => 'ouled zouaï',
                    'code' => 4020,
                ],
                20 => [
                    'name' => 'bir chouhada',
                    'code' => 4021,
                ],
                21 => [
                    'name' => 'ksar sbahi',
                    'code' => 4022,
                ],
                22 => [
                    'name' => 'oued nini',
                    'code' => 4023,
                ],
                23 => [
                    'name' => 'meskiana',
                    'code' => 4024,
                ],
                24 => [
                    'name' => 'aïn fakroun',
                    'code' => 4025,
                ],
                25 => [
                    'name' => 'rahia',
                    'code' => 4026,
                ],
                26 => [
                    'name' => 'aïn zitoun',
                    'code' => 4027,
                ],
                27 => [
                    'name' => 'ouled gacem',
                    'code' => 4028,
                ],
                28 => [
                    'name' => 'el harmilia',
                    'code' => 4029,
                ],
            ],
            5 => [
                0 => [
                    'name' => 'batna',
                    'code' => 5001,
                ],
                1 => [
                    'name' => 'ghassira',
                    'code' => 5002,
                ],
                2 => [
                    'name' => 'maafa',
                    'code' => 5003,
                ],
                3 => [
                    'name' => 'merouana',
                    'code' => 5004,
                ],
                4 => [
                    'name' => 'seriana',
                    'code' => 5005,
                ],
                5 => [
                    'name' => 'menaa',
                    'code' => 5006,
                ],
                6 => [
                    'name' => 'el madher',
                    'code' => 5007,
                ],
                7 => [
                    'name' => 'tazoult',
                    'code' => 5008,
                ],
                8 => [
                    'name' => 'n\'gaous',
                    'code' => 5009,
                ],
                9 => [
                    'name' => 'guigba',
                    'code' => 5010,
                ],
                10 => [
                    'name' => 'inoughissen',
                    'code' => 5011,
                ],
                11 => [
                    'name' => 'ouyoun el assafir',
                    'code' => 5012,
                ],
                12 => [
                    'name' => 'djerma',
                    'code' => 5013,
                ],
                13 => [
                    'name' => 'bitam',
                    'code' => 5014,
                ],
                14 => [
                    'name' => 'abdelkader azil',
                    'code' => 5015,
                ],
                15 => [
                    'name' => 'arris',
                    'code' => 5016,
                ],
                16 => [
                    'name' => 'kimmel',
                    'code' => 5017,
                ],
                17 => [
                    'name' => 'tilatou',
                    'code' => 5018,
                ],
                18 => [
                    'name' => 'aïn djasser',
                    'code' => 5019,
                ],
                19 => [
                    'name' => 'ouled sellam',
                    'code' => 5020,
                ],
                20 => [
                    'name' => 'tigherghar',
                    'code' => 5021,
                ],
                21 => [
                    'name' => 'aïn yagout',
                    'code' => 5022,
                ],
                22 => [
                    'name' => 'sefiane',
                    'code' => 5024,
                ],
                23 => [
                    'name' => 'fesdis',
                    'code' => 5023,
                ],
                24 => [
                    'name' => 'rahbat',
                    'code' => 5025,
                ],
                25 => [
                    'name' => 'tighanimine',
                    'code' => 5026,
                ],
                26 => [
                    'name' => 'lemsane',
                    'code' => 5027,
                ],
                27 => [
                    'name' => 'ksar bellezma',
                    'code' => 5028,
                ],
                28 => [
                    'name' => 'seggana',
                    'code' => 5029,
                ],
                29 => [
                    'name' => 'ichmoul',
                    'code' => 5030,
                ],
                30 => [
                    'name' => 'foum toub',
                    'code' => 5031,
                ],
                31 => [
                    'name' => 'ben foudhala el hakania',
                    'code' => 5032,
                ],
                32 => [
                    'name' => 'oued el ma',
                    'code' => 5033,
                ],
                33 => [
                    'name' => 'talkhamt',
                    'code' => 5034,
                ],
                34 => [
                    'name' => 'bouzina',
                    'code' => 5035,
                ],
                35 => [
                    'name' => 'chemora',
                    'code' => 5036,
                ],
                36 => [
                    'name' => 'oued chaaba',
                    'code' => 5037,
                ],
                37 => [
                    'name' => 'taxlent',
                    'code' => 5038,
                ],
                38 => [
                    'name' => 'gosbat',
                    'code' => 5039,
                ],
                39 => [
                    'name' => 'ouled aouf',
                    'code' => 5040,
                ],
                40 => [
                    'name' => 'boumagueur',
                    'code' => 5041,
                ],
                41 => [
                    'name' => 'barika',
                    'code' => 5042,
                ],
                42 => [
                    'name' => 'djezar',
                    'code' => 5043,
                ],
                43 => [
                    'name' => 't\'kout',
                    'code' => 5044,
                ],
                44 => [
                    'name' => 'aïn touta',
                    'code' => 5045,
                ],
                45 => [
                    'name' => 'hidoussa',
                    'code' => 5046,
                ],
                46 => [
                    'name' => 'teniet el abed',
                    'code' => 5047,
                ],
                47 => [
                    'name' => 'oued taga',
                    'code' => 5048,
                ],
                48 => [
                    'name' => 'ouled fadel',
                    'code' => 5049,
                ],
                49 => [
                    'name' => 'timgad',
                    'code' => 5050,
                ],
                50 => [
                    'name' => 'ras el aioun',
                    'code' => 5051,
                ],
                51 => [
                    'name' => 'chir',
                    'code' => 5052,
                ],
                52 => [
                    'name' => 'ouled si slimane',
                    'code' => 5053,
                ],
                53 => [
                    'name' => 'zanat el beida',
                    'code' => 5054,
                ],
                54 => [
                    'name' => 'm\'doukel',
                    'code' => 5055,
                ],
                55 => [
                    'name' => 'ouled ammar',
                    'code' => 5056,
                ],
                56 => [
                    'name' => 'el hassi',
                    'code' => 5057,
                ],
                57 => [
                    'name' => 'lazrou',
                    'code' => 5058,
                ],
                58 => [
                    'name' => 'boumia (batna)',
                    'code' => 5059,
                ],
                59 => [
                    'name' => 'boulhilat',
                    'code' => 5060,
                ],
                60 => [
                    'name' => 'larbaâ',
                    'code' => 5061,
                ],
            ],
            6 => [
                0 => [
                    'name' => 'béjaïa',
                    'code' => 6001,
                ],
                1 => [
                    'name' => 'amizour',
                    'code' => 6002,
                ],
                2 => [
                    'name' => 'ferraoun',
                    'code' => 6003,
                ],
                3 => [
                    'name' => 'taourirt ighil',
                    'code' => 6004,
                ],
                4 => [
                    'name' => 'chellata',
                    'code' => 6005,
                ],
                5 => [
                    'name' => 'tamokra',
                    'code' => 6006,
                ],
                6 => [
                    'name' => 'timezrit',
                    'code' => 6007,
                ],
                7 => [
                    'name' => 'souk el ténine',
                    'code' => 6008,
                ],
                8 => [
                    'name' => 'm\'cisna',
                    'code' => 6009,
                ],
                9 => [
                    'name' => 'tinabdher',
                    'code' => 6010,
                ],
                10 => [
                    'name' => 'tichy',
                    'code' => 6011,
                ],
                11 => [
                    'name' => 'semaoun',
                    'code' => 6012,
                ],
                12 => [
                    'name' => 'kendira',
                    'code' => 6013,
                ],
                13 => [
                    'name' => 'tifra',
                    'code' => 6014,
                ],
                14 => [
                    'name' => 'ighram',
                    'code' => 6015,
                ],
                15 => [
                    'name' => 'amalou',
                    'code' => 6016,
                ],
                16 => [
                    'name' => 'ighil ali',
                    'code' => 6017,
                ],
                17 => [
                    'name' => 'fenaïa ilmaten',
                    'code' => 6018,
                ],
                18 => [
                    'name' => 'toudja',
                    'code' => 6019,
                ],
                19 => [
                    'name' => 'darguina',
                    'code' => 6020,
                ],
                20 => [
                    'name' => 'sidi-ayad',
                    'code' => 6021,
                ],
                21 => [
                    'name' => 'aokas',
                    'code' => 6022,
                ],
                22 => [
                    'name' => 'ait djellil',
                    'code' => 6023,
                ],
                23 => [
                    'name' => 'adekar',
                    'code' => 6024,
                ],
                24 => [
                    'name' => 'akbou',
                    'code' => 6025,
                ],
                25 => [
                    'name' => 'seddouk',
                    'code' => 6026,
                ],
                26 => [
                    'name' => 'tazmalt',
                    'code' => 6027,
                ],
                27 => [
                    'name' => 'aït-r\'zine',
                    'code' => 6028,
                ],
                28 => [
                    'name' => 'chemini',
                    'code' => 6029,
                ],
                29 => [
                    'name' => 'souk-oufella',
                    'code' => 6030,
                ],
                30 => [
                    'name' => 'taskriout',
                    'code' => 6031,
                ],
                31 => [
                    'name' => 'tibane',
                    'code' => 6032,
                ],
                32 => [
                    'name' => 'tala hamza',
                    'code' => 6033,
                ],
                33 => [
                    'name' => 'barbacha',
                    'code' => 6034,
                ],
                34 => [
                    'name' => 'aït ksila',
                    'code' => 6035,
                ],
                35 => [
                    'name' => 'ouzellaguen',
                    'code' => 6036,
                ],
                36 => [
                    'name' => 'bouhamza',
                    'code' => 6037,
                ],
                37 => [
                    'name' => 'beni mellikeche',
                    'code' => 6038,
                ],
                38 => [
                    'name' => 'sidi-aïch',
                    'code' => 6039,
                ],
                39 => [
                    'name' => 'el kseur',
                    'code' => 6040,
                ],
                40 => [
                    'name' => 'melbou',
                    'code' => 6041,
                ],
                41 => [
                    'name' => 'akfadou',
                    'code' => 6042,
                ],
                42 => [
                    'name' => 'leflaye',
                    'code' => 6043,
                ],
                43 => [
                    'name' => 'kherrata',
                    'code' => 6044,
                ],
                44 => [
                    'name' => 'draâ el-kaïd',
                    'code' => 6045,
                ],
                45 => [
                    'name' => 'tamridjet',
                    'code' => 6046,
                ],
                46 => [
                    'name' => 'aït-smail',
                    'code' => 6047,
                ],
                47 => [
                    'name' => 'boukhelifa',
                    'code' => 6048,
                ],
                48 => [
                    'name' => 'tizi n\'berber',
                    'code' => 6049,
                ],
                49 => [
                    'name' => 'aït maouche',
                    'code' => 6050,
                ],
                50 => [
                    'name' => 'oued ghir',
                    'code' => 6051,
                ],
                51 => [
                    'name' => 'boudjellil',
                    'code' => 6052,
                ],
            ],
            7 => [
                0 => [
                    'name' => 'aïn naga',
                    'code' => 7001,
                ],
                1 => [
                    'name' => 'aïn zaatout',
                    'code' => 7002,
                ],
                2 => [
                    'name' => 'biskra',
                    'code' => 7003,
                ],
                3 => [
                    'name' => 'bordj ben azzouz',
                    'code' => 7004,
                ],
                4 => [
                    'name' => 'bouchagroune',
                    'code' => 7005,
                ],
                5 => [
                    'name' => 'branis',
                    'code' => 7006,
                ],
                6 => [
                    'name' => 'chetma',
                    'code' => 7007,
                ],
                7 => [
                    'name' => 'djemorah',
                    'code' => 7008,
                ],
                8 => [
                    'name' => 'el feidh',
                    'code' => 7009,
                ],
                9 => [
                    'name' => 'el ghrous',
                    'code' => 70010,
                ],
                10 => [
                    'name' => 'el hadjeb',
                    'code' => 7011,
                ],
                11 => [
                    'name' => 'el haouch',
                    'code' => 7012,
                ],
                12 => [
                    'name' => 'el kantara',
                    'code' => 7013,
                ],
                13 => [
                    'name' => 'el mizaraa',
                    'code' => 7014,
                ],
                14 => [
                    'name' => 'el outaya',
                    'code' => 7015,
                ],
                15 => [
                    'name' => 'foughala',
                    'code' => 7016,
                ],
                16 => [
                    'name' => 'khenguet sidi nadji',
                    'code' => 7017,
                ],
                17 => [
                    'name' => 'lichana',
                    'code' => 7018,
                ],
                18 => [
                    'name' => 'lioua',
                    'code' => 7019,
                ],
                19 => [
                    'name' => 'm\'chouneche',
                    'code' => 7020,
                ],
                20 => [
                    'name' => 'mekhadma',
                    'code' => 7021,
                ],
                21 => [
                    'name' => 'm\'lili',
                    'code' => 7022,
                ],
                22 => [
                    'name' => 'oumache',
                    'code' => 7023,
                ],
                23 => [
                    'name' => 'ourlal',
                    'code' => 7024,
                ],
                24 => [
                    'name' => 'sidi okba',
                    'code' => 7025,
                ],
                25 => [
                    'name' => 'tolga',
                    'code' => 7026,
                ],
                26 => [
                    'name' => 'zeribet el oued',
                    'code' => 7027,
                ],
            ],
            8 => [
                0 => [
                    'name' => 'béchar',
                    'code' => 8001,
                ],
                1 => [
                    'name' => 'erg ferradj',
                    'code' => 8002,
                ],
                2 => [
                    'name' => 'ouled khoudir',
                    'code' => 8003,
                ],
                3 => [
                    'name' => 'meridja',
                    'code' => 8004,
                ],
                4 => [
                    'name' => 'timoudi',
                    'code' => 8005,
                ],
                5 => [
                    'name' => 'lahmar',
                    'code' => 8006,
                ],
                6 => [
                    'name' => 'béni abbès',
                    'code' => 8007,
                ],
                7 => [
                    'name' => 'beni ikhlef',
                    'code' => 8008,
                ],
                8 => [
                    'name' => 'mechraa houari boumedienne',
                    'code' => 8009,
                ],
                9 => [
                    'name' => 'kenadsa',
                    'code' => 8010,
                ],
                10 => [
                    'name' => 'igli',
                    'code' => 8011,
                ],
                11 => [
                    'name' => 'tabelbala',
                    'code' => 8012,
                ],
                12 => [
                    'name' => 'taghit',
                    'code' => 8013,
                ],
                13 => [
                    'name' => 'el ouata',
                    'code' => 8014,
                ],
                14 => [
                    'name' => 'boukais',
                    'code' => 8015,
                ],
                15 => [
                    'name' => 'mougheul',
                    'code' => 80016,
                ],
                16 => [
                    'name' => 'abadla',
                    'code' => 8017,
                ],
                17 => [
                    'name' => 'kerzaz',
                    'code' => 8018,
                ],
                18 => [
                    'name' => 'ksabi',
                    'code' => 8019,
                ],
                19 => [
                    'name' => 'tamtert',
                    'code' => 8020,
                ],
                20 => [
                    'name' => 'beni ounif',
                    'code' => 8021,
                ],
            ],
            9 => [
                0 => [
                    'name' => 'blida',
                    'code' => 9001,
                ],
                1 => [
                    'name' => 'chebli',
                    'code' => 9002,
                ],
                2 => [
                    'name' => 'bouinan',
                    'code' => 9003,
                ],
                3 => [
                    'name' => 'oued alleug',
                    'code' => 9004,
                ],
                4 => [
                    'name' => 'ouled yaïch',
                    'code' => 9007,
                ],
                5 => [
                    'name' => 'chréa',
                    'code' => 9008,
                ],
                6 => [
                    'name' => 'el affroun',
                    'code' => 9010,
                ],
                7 => [
                    'name' => 'chiffa',
                    'code' => 9011,
                ],
                8 => [
                    'name' => 'hammam melouane',
                    'code' => 9012,
                ],
                9 => [
                    'name' => 'benkhelil',
                    'code' => 9013,
                ],
                10 => [
                    'name' => 'soumaa',
                    'code' => 9014,
                ],
                11 => [
                    'name' => 'mouzaia',
                    'code' => 9016,
                ],
                12 => [
                    'name' => 'souhane',
                    'code' => 9017,
                ],
                13 => [
                    'name' => 'meftah',
                    'code' => 9018,
                ],
                14 => [
                    'name' => 'ouled slama',
                    'code' => 9019,
                ],
                15 => [
                    'name' => 'boufarik',
                    'code' => 9020,
                ],
                16 => [
                    'name' => 'larbaa',
                    'code' => 9021,
                ],
                17 => [
                    'name' => 'oued djer',
                    'code' => 9022,
                ],
                18 => [
                    'name' => 'beni tamou',
                    'code' => 9023,
                ],
                19 => [
                    'name' => 'bouarfa',
                    'code' => 9024,
                ],
                20 => [
                    'name' => 'beni mered',
                    'code' => 9025,
                ],
                21 => [
                    'name' => 'bougara',
                    'code' => 9026,
                ],
                22 => [
                    'name' => 'guerouaou',
                    'code' => 9027,
                ],
                23 => [
                    'name' => 'aïn romana',
                    'code' => 9028,
                ],
                24 => [
                    'name' => 'djebabra',
                    'code' => 9029,
                ],
            ],
            10 => [
                0 => [
                    'name' => 'aïn bessem',
                    'code' => 10001,
                ],
                1 => [
                    'name' => 'hanif',
                    'code' => 10002,
                ],
                2 => [
                    'name' => 'aghbalou',
                    'code' => 10003,
                ],
                3 => [
                    'name' => 'aïn el hadjar',
                    'code' => 10004,
                ],
                4 => [
                    'name' => 'ahl el ksar',
                    'code' => 10005,
                ],
                5 => [
                    'name' => 'aïn laloui',
                    'code' => 10006,
                ],
                6 => [
                    'name' => 'ath mansour',
                    'code' => 10007,
                ],
                7 => [
                    'name' => 'aomar',
                    'code' => 10008,
                ],
                8 => [
                    'name' => 'aïn el turc',
                    'code' => 10009,
                ],
                9 => [
                    'name' => 'aït laziz',
                    'code' => 100010,
                ],
                10 => [
                    'name' => 'bouderbala',
                    'code' => 10011,
                ],
                11 => [
                    'name' => 'bechloul',
                    'code' => 10012,
                ],
                12 => [
                    'name' => 'bir ghbalou',
                    'code' => 10013,
                ],
                13 => [
                    'name' => 'boukram',
                    'code' => 10014,
                ],
                14 => [
                    'name' => 'bordj okhriss',
                    'code' => 10015,
                ],
                15 => [
                    'name' => 'bouira',
                    'code' => 10016,
                ],
                16 => [
                    'name' => 'chorfa',
                    'code' => 10017,
                ],
                17 => [
                    'name' => 'dechmia',
                    'code' => 10018,
                ],
                18 => [
                    'name' => 'dirrah',
                    'code' => 10019,
                ],
                19 => [
                    'name' => 'djebahia',
                    'code' => 10020,
                ],
                20 => [
                    'name' => 'el hakimia',
                    'code' => 10021,
                ],
                21 => [
                    'name' => 'el hachimia',
                    'code' => 10022,
                ],
                22 => [
                    'name' => 'el adjiba',
                    'code' => 10023,
                ],
                23 => [
                    'name' => 'el khabouzia',
                    'code' => 10024,
                ],
                24 => [
                    'name' => 'el mokrani',
                    'code' => 10025,
                ],
                25 => [
                    'name' => 'el asnam',
                    'code' => 10026,
                ],
                26 => [
                    'name' => 'guerrouma',
                    'code' => 10027,
                ],
                27 => [
                    'name' => 'haizer',
                    'code' => 10028,
                ],
                28 => [
                    'name' => 'hadjera zerga',
                    'code' => 10029,
                ],
                29 => [
                    'name' => 'kadiria',
                    'code' => 10030,
                ],
                30 => [
                    'name' => 'lakhdaria',
                    'code' => 10031,
                ],
                31 => [
                    'name' => 'm\'chedallah',
                    'code' => 10032,
                ],
                32 => [
                    'name' => 'mezdour',
                    'code' => 10033,
                ],
                33 => [
                    'name' => 'maala',
                    'code' => 10034,
                ],
                34 => [
                    'name' => 'maamora',
                    'code' => 10035,
                ],
                35 => [
                    'name' => 'oued el berdi',
                    'code' => 10036,
                ],
                36 => [
                    'name' => 'ouled rached',
                    'code' => 10037,
                ],
                37 => [
                    'name' => 'raouraoua',
                    'code' => 10038,
                ],
                38 => [
                    'name' => 'ridane',
                    'code' => 10039,
                ],
                39 => [
                    'name' => 'saharidj',
                    'code' => 10040,
                ],
                40 => [
                    'name' => 'sour el ghouzlane',
                    'code' => 10041,
                ],
                41 => [
                    'name' => 'souk el khemis',
                    'code' => 10042,
                ],
                42 => [
                    'name' => 'taguedit',
                    'code' => 10043,
                ],
                43 => [
                    'name' => 'taghzout',
                    'code' => 10044,
                ],
                44 => [
                    'name' => 'zbarbar',
                    'code' => 10045,
                ],
            ],
            11 => [
                0 => [
                    'name' => 'tamanrasset',
                    'code' => 11001,
                ],
                1 => [
                    'name' => 'abalessa',
                    'code' => 11002,
                ],
                2 => [
                    'name' => 'idles',
                    'code' => 11005,
                ],
                3 => [
                    'name' => 'tazrouk',
                    'code' => 11006,
                ],
                4 => [
                    'name' => 'in amguel',
                    'code' => 11009,
                ],
            ],
            12 => [
                0 => [
                    'name' => 'tébessa',
                    'code' => 12001,
                ],
                1 => [
                    'name' => 'bir el-ater',
                    'code' => 12002,
                ],
                2 => [
                    'name' => 'cheria',
                    'code' => 12003,
                ],
                3 => [
                    'name' => 'stah guentis',
                    'code' => 12004,
                ],
                4 => [
                    'name' => 'el aouinet',
                    'code' => 12005,
                ],
                5 => [
                    'name' => 'el houidjbet',
                    'code' => 12006,
                ],
                6 => [
                    'name' => 'safsaf el ouesra',
                    'code' => 12007,
                ],
                7 => [
                    'name' => 'hammamet',
                    'code' => 12008,
                ],
                8 => [
                    'name' => 'negrine',
                    'code' => 12009,
                ],
                9 => [
                    'name' => 'bir mokkadem',
                    'code' => 12010,
                ],
                10 => [
                    'name' => 'el kouif',
                    'code' => 12011,
                ],
                11 => [
                    'name' => 'morsott',
                    'code' => 12012,
                ],
                12 => [
                    'name' => 'el ogla',
                    'code' => 12013,
                ],
                13 => [
                    'name' => 'bir dheb',
                    'code' => 12014,
                ],
                14 => [
                    'name' => 'ogla melha',
                    'code' => 12015,
                ],
                15 => [
                    'name' => 'guorriguer',
                    'code' => 12016,
                ],
                16 => [
                    'name' => 'bekkaria',
                    'code' => 12017,
                ],
                17 => [
                    'name' => 'boukhadra',
                    'code' => 12018,
                ],
                18 => [
                    'name' => 'ouenza',
                    'code' => 12019,
                ],
                19 => [
                    'name' => 'el ma labiodh',
                    'code' => 12020,
                ],
                20 => [
                    'name' => 'oum ali',
                    'code' => 12021,
                ],
                21 => [
                    'name' => 'tlidjene',
                    'code' => 12022,
                ],
                22 => [
                    'name' => 'aïn zerga',
                    'code' => 12023,
                ],
                23 => [
                    'name' => 'el meridj',
                    'code' => 12024,
                ],
                24 => [
                    'name' => 'boulhaf dir',
                    'code' => 12025,
                ],
                25 => [
                    'name' => 'bedjene',
                    'code' => 12026,
                ],
                26 => [
                    'name' => 'el mezeraa',
                    'code' => 12027,
                ],
                27 => [
                    'name' => 'ferkane',
                    'code' => 12028,
                ],
            ],
            13 => [
                0 => [
                    'name' => 'tlemcen',
                    'code' => 13001,
                ],
                1 => [
                    'name' => 'beni mester',
                    'code' => 13002,
                ],
                2 => [
                    'name' => 'aïn tallout',
                    'code' => 13003,
                ],
                3 => [
                    'name' => 'remchi',
                    'code' => 13004,
                ],
                4 => [
                    'name' => 'el fehoul',
                    'code' => 13005,
                ],
                5 => [
                    'name' => 'sabra',
                    'code' => 13006,
                ],
                6 => [
                    'name' => 'ghazaouet',
                    'code' => 13007,
                ],
                7 => [
                    'name' => 'souani',
                    'code' => 13008,
                ],
                8 => [
                    'name' => 'djebala',
                    'code' => 13009,
                ],
                9 => [
                    'name' => 'el gor',
                    'code' => 13010,
                ],
                10 => [
                    'name' => 'oued lakhdar',
                    'code' => 13011,
                ],
                11 => [
                    'name' => 'aïn fezza',
                    'code' => 13012,
                ],
                12 => [
                    'name' => 'ouled mimoun',
                    'code' => 13013,
                ],
                13 => [
                    'name' => 'amieur',
                    'code' => 13014,
                ],
                14 => [
                    'name' => 'aïn youcef',
                    'code' => 13015,
                ],
                15 => [
                    'name' => 'zenata',
                    'code' => 13016,
                ],
                16 => [
                    'name' => 'beni snous',
                    'code' => 13017,
                ],
                17 => [
                    'name' => 'bab el assa',
                    'code' => 13018,
                ],
                18 => [
                    'name' => 'dar yaghmouracene',
                    'code' => 13019,
                ],
                19 => [
                    'name' => 'fellaoucene',
                    'code' => 13020,
                ],
                20 => [
                    'name' => 'azails',
                    'code' => 13021,
                ],
                21 => [
                    'name' => 'sebaa chioukh',
                    'code' => 13022,
                ],
                22 => [
                    'name' => 'terny beni hdiel',
                    'code' => 13023,
                ],
                23 => [
                    'name' => 'bensekrane',
                    'code' => 13024,
                ],
                24 => [
                    'name' => 'aïn nehala',
                    'code' => 13025,
                ],
                25 => [
                    'name' => 'hennaya',
                    'code' => 13026,
                ],
                26 => [
                    'name' => 'maghnia',
                    'code' => 13027,
                ],
                27 => [
                    'name' => 'hammam boughrara',
                    'code' => 13028,
                ],
                28 => [
                    'name' => 'souahlia',
                    'code' => 13029,
                ],
                29 => [
                    'name' => 'msirda fouaga',
                    'code' => 13030,
                ],
                30 => [
                    'name' => 'aïn fetah',
                    'code' => 13031,
                ],
                31 => [
                    'name' => 'el aricha',
                    'code' => 13032,
                ],
                32 => [
                    'name' => 'souk tlata',
                    'code' => 13033,
                ],
                33 => [
                    'name' => 'sidi abdelli',
                    'code' => 13034,
                ],
                34 => [
                    'name' => 'sebdou',
                    'code' => 13035,
                ],
                35 => [
                    'name' => 'beni ouarsous',
                    'code' => 13036,
                ],
                36 => [
                    'name' => 'sidi medjahed',
                    'code' => 13037,
                ],
                37 => [
                    'name' => 'beni boussaid',
                    'code' => 13038,
                ],
                38 => [
                    'name' => 'marsa ben m\'hidi',
                    'code' => 13039,
                ],
                39 => [
                    'name' => 'nedroma',
                    'code' => 13040,
                ],
                40 => [
                    'name' => 'sidi djillali',
                    'code' => 13041,
                ],
                41 => [
                    'name' => 'beni bahdel',
                    'code' => 13042,
                ],
                42 => [
                    'name' => 'el bouihi',
                    'code' => 13043,
                ],
                43 => [
                    'name' => 'honaïne',
                    'code' => 13044,
                ],
                44 => [
                    'name' => 'tienet',
                    'code' => 13045,
                ],
                45 => [
                    'name' => 'ouled riyah',
                    'code' => 13046,
                ],
                46 => [
                    'name' => 'bouhlou',
                    'code' => 13047,
                ],
                47 => [
                    'name' => 'beni khellad',
                    'code' => 13048,
                ],
                48 => [
                    'name' => 'aïn ghoraba',
                    'code' => 13049,
                ],
                49 => [
                    'name' => 'chetouane',
                    'code' => 13050,
                ],
                50 => [
                    'name' => 'mansourah',
                    'code' => 13051,
                ],
                51 => [
                    'name' => 'beni semiel',
                    'code' => 13052,
                ],
                52 => [
                    'name' => 'aïn kebira',
                    'code' => 13053,
                ],
            ],
            14 => [
                0 => [
                    'name' => 'aïn bouchekif',
                    'code' => 14001,
                ],
                1 => [
                    'name' => 'aïn deheb',
                    'code' => 14002,
                ],
                2 => [
                    'name' => 'aïn el hadid',
                    'code' => 14003,
                ],
                3 => [
                    'name' => 'aïn kermes',
                    'code' => 14004,
                ],
                4 => [
                    'name' => 'aïn dzarit',
                    'code' => 14005,
                ],
                5 => [
                    'name' => 'bougara',
                    'code' => 14006,
                ],
                6 => [
                    'name' => 'chehaima',
                    'code' => 14007,
                ],
                7 => [
                    'name' => 'dahmouni',
                    'code' => 14008,
                ],
                8 => [
                    'name' => 'djebilet rosfa',
                    'code' => 14009,
                ],
                9 => [
                    'name' => 'djillali ben amar',
                    'code' => 140010,
                ],
                10 => [
                    'name' => 'faidja',
                    'code' => 14011,
                ],
                11 => [
                    'name' => 'frenda',
                    'code' => 14012,
                ],
                12 => [
                    'name' => 'guertoufa',
                    'code' => 14013,
                ],
                13 => [
                    'name' => 'hamadia',
                    'code' => 14014,
                ],
                14 => [
                    'name' => 'ksar chellala',
                    'code' => 14015,
                ],
                15 => [
                    'name' => 'madna',
                    'code' => 14016,
                ],
                16 => [
                    'name' => 'mahdia',
                    'code' => 14017,
                ],
                17 => [
                    'name' => 'mechraa safa',
                    'code' => 14018,
                ],
                18 => [
                    'name' => 'medrissa',
                    'code' => 14019,
                ],
                19 => [
                    'name' => 'medroussa',
                    'code' => 14020,
                ],
                20 => [
                    'name' => 'meghila',
                    'code' => 14021,
                ],
                21 => [
                    'name' => 'mellakou',
                    'code' => 14022,
                ],
                22 => [
                    'name' => 'nadorah',
                    'code' => 14023,
                ],
                23 => [
                    'name' => 'naima',
                    'code' => 14024,
                ],
                24 => [
                    'name' => 'oued lilli',
                    'code' => 14025,
                ],
                25 => [
                    'name' => 'rahouia',
                    'code' => 14026,
                ],
                26 => [
                    'name' => 'rechaïga',
                    'code' => 14027,
                ],
                27 => [
                    'name' => 'sebaïne',
                    'code' => 14028,
                ],
                28 => [
                    'name' => 'sebt',
                    'code' => 14029,
                ],
                29 => [
                    'name' => 'serghine',
                    'code' => 14030,
                ],
                30 => [
                    'name' => 'si abdelghani',
                    'code' => 14031,
                ],
                31 => [
                    'name' => 'sidi abderahmane',
                    'code' => 14032,
                ],
                32 => [
                    'name' => 'sidi ali mellal',
                    'code' => 14033,
                ],
                33 => [
                    'name' => 'sidi bakhti',
                    'code' => 14034,
                ],
                34 => [
                    'name' => 'sidi hosni',
                    'code' => 14035,
                ],
                35 => [
                    'name' => 'sougueur',
                    'code' => 14036,
                ],
                36 => [
                    'name' => 'tagdemt',
                    'code' => 14037,
                ],
                37 => [
                    'name' => 'takhemaret',
                    'code' => 14038,
                ],
                38 => [
                    'name' => 'tiaret',
                    'code' => 14039,
                ],
                39 => [
                    'name' => 'tidda',
                    'code' => 14040,
                ],
                40 => [
                    'name' => 'tousnina',
                    'code' => 14041,
                ],
                41 => [
                    'name' => 'zmalet el emir abdelkader',
                    'code' => 14042,
                ],
            ],
            15 => [
                0 => [
                    'name' => 'tizi ouzou',
                    'code' => 15001,
                ],
                1 => [
                    'name' => 'ain el hammam',
                    'code' => 15002,
                ],
                2 => [
                    'name' => 'akbil',
                    'code' => 15003,
                ],
                3 => [
                    'name' => 'freha',
                    'code' => 15004,
                ],
                4 => [
                    'name' => 'souamaâ',
                    'code' => 15005,
                ],
                5 => [
                    'name' => 'mechtras',
                    'code' => 15006,
                ],
                6 => [
                    'name' => 'irdjen',
                    'code' => 15007,
                ],
                7 => [
                    'name' => 'timizart',
                    'code' => 15008,
                ],
                8 => [
                    'name' => 'makouda',
                    'code' => 15009,
                ],
                9 => [
                    'name' => 'draâ el mizan',
                    'code' => 15010,
                ],
                10 => [
                    'name' => 'tizi gheniff',
                    'code' => 15011,
                ],
                11 => [
                    'name' => 'bounouh',
                    'code' => 15012,
                ],
                12 => [
                    'name' => 'aït chafâa',
                    'code' => 15013,
                ],
                13 => [
                    'name' => 'frikat',
                    'code' => 15014,
                ],
                14 => [
                    'name' => 'beni aïssi',
                    'code' => 15015,
                ],
                15 => [
                    'name' => 'aït zmenzer',
                    'code' => 15016,
                ],
                16 => [
                    'name' => 'iferhounène',
                    'code' => 15017,
                ],
                17 => [
                    'name' => 'azazga',
                    'code' => 15018,
                ],
                18 => [
                    'name' => 'illoula oumalou',
                    'code' => 15019,
                ],
                19 => [
                    'name' => 'yakouren',
                    'code' => 15020,
                ],
                20 => [
                    'name' => 'larbaâ nath irathen',
                    'code' => 15021,
                ],
                21 => [
                    'name' => 'tizi rached',
                    'code' => 15022,
                ],
                22 => [
                    'name' => 'zekri',
                    'code' => 15023,
                ],
                23 => [
                    'name' => 'ouaguenoun',
                    'code' => 15024,
                ],
                24 => [
                    'name' => 'aïn zaouia',
                    'code' => 15025,
                ],
                25 => [
                    'name' => 'imkiren',
                    'code' => 15026,
                ],
                26 => [
                    'name' => 'aït yahia',
                    'code' => 15027,
                ],
                27 => [
                    'name' => 'aït mahmoud',
                    'code' => 15028,
                ],
                28 => [
                    'name' => 'mâatkas',
                    'code' => 15029,
                ],
                29 => [
                    'name' => 'aït boumahdi',
                    'code' => 15030,
                ],
                30 => [
                    'name' => 'abi youcef',
                    'code' => 15031,
                ],
                31 => [
                    'name' => 'beni douala',
                    'code' => 15032,
                ],
                32 => [
                    'name' => 'illilten',
                    'code' => 15033,
                ],
                33 => [
                    'name' => 'bouzeguène',
                    'code' => 15034,
                ],
                34 => [
                    'name' => 'aït aggouacha',
                    'code' => 15035,
                ],
                35 => [
                    'name' => 'ouadhia',
                    'code' => 15036,
                ],
                36 => [
                    'name' => 'azeffoun',
                    'code' => 15037,
                ],
                37 => [
                    'name' => 'tigzirt',
                    'code' => 15038,
                ],
                38 => [
                    'name' => 'aït aïssa mimoun',
                    'code' => 15039,
                ],
                39 => [
                    'name' => 'boghni',
                    'code' => 15040,
                ],
                40 => [
                    'name' => 'ifigha',
                    'code' => 15041,
                ],
                41 => [
                    'name' => 'aït oumalou',
                    'code' => 15042,
                ],
                42 => [
                    'name' => 'tirmitine',
                    'code' => 15043,
                ],
                43 => [
                    'name' => 'akerrou',
                    'code' => 15044,
                ],
                44 => [
                    'name' => 'yatafen',
                    'code' => 15045,
                ],
                45 => [
                    'name' => 'ath zikki',
                    'code' => 15046,
                ],
                46 => [
                    'name' => 'draâ ben khedda',
                    'code' => 15047,
                ],
                47 => [
                    'name' => 'aït ouacif',
                    'code' => 15048,
                ],
                48 => [
                    'name' => 'idjeur',
                    'code' => 15049,
                ],
                49 => [
                    'name' => 'mekla',
                    'code' => 15050,
                ],
                50 => [
                    'name' => 'tizi n\'tleta',
                    'code' => 15051,
                ],
                51 => [
                    'name' => 'aït yenni',
                    'code' => 15052,
                ],
                52 => [
                    'name' => 'aghribs',
                    'code' => 15053,
                ],
                53 => [
                    'name' => 'iflissen',
                    'code' => 15054,
                ],
                54 => [
                    'name' => 'boudjima',
                    'code' => 15055,
                ],
                55 => [
                    'name' => 'aït yahia moussa',
                    'code' => 15056,
                ],
                56 => [
                    'name' => 'souk el thenine',
                    'code' => 15057,
                ],
                57 => [
                    'name' => 'aït khellili',
                    'code' => 15058,
                ],
                58 => [
                    'name' => 'sidi namane',
                    'code' => 15059,
                ],
                59 => [
                    'name' => 'iboudraren',
                    'code' => 15060,
                ],
                60 => [
                    'name' => 'agouni gueghrane',
                    'code' => 15061,
                ],
                61 => [
                    'name' => 'mizrana',
                    'code' => 15062,
                ],
                62 => [
                    'name' => 'imsouhel',
                    'code' => 15063,
                ],
                63 => [
                    'name' => 'tadmaït',
                    'code' => 15064,
                ],
                64 => [
                    'name' => 'aït bouaddou',
                    'code' => 15065,
                ],
                65 => [
                    'name' => 'assi youcef',
                    'code' => 15066,
                ],
                66 => [
                    'name' => 'aït toudert',
                    'code' => 15067,
                ],
            ],
            16 => [
                0 => [
                    'name' => 'alger-centre',
                    'code' => 16001,
                ],
                1 => [
                    'name' => 'sidi m\'hamed',
                    'code' => 16002,
                ],
                2 => [
                    'name' => 'el madania',
                    'code' => 16003,
                ],
                3 => [
                    'name' => 'belouizdad',
                    'code' => 16004,
                ],
                4 => [
                    'name' => 'bab el oued',
                    'code' => 16005,
                ],
                5 => [
                    'name' => 'bologhine',
                    'code' => 16006,
                ],
                6 => [
                    'name' => 'casbah',
                    'code' => 16007,
                ],
                7 => [
                    'name' => 'oued koriche',
                    'code' => 16008,
                ],
                8 => [
                    'name' => 'bir mourad raïs',
                    'code' => 16009,
                ],
                9 => [
                    'name' => 'el biar',
                    'code' => 16010,
                ],
                10 => [
                    'name' => 'bouzareah',
                    'code' => 16011,
                ],
                11 => [
                    'name' => 'birkhadem',
                    'code' => 16012,
                ],
                12 => [
                    'name' => 'el harrach',
                    'code' => 16013,
                ],
                13 => [
                    'name' => 'baraki',
                    'code' => 16014,
                ],
                14 => [
                    'name' => 'oued smar',
                    'code' => 16015,
                ],
                15 => [
                    'name' => 'bachdjerrah',
                    'code' => 16016,
                ],
                16 => [
                    'name' => 'hussein dey',
                    'code' => 16017,
                ],
                17 => [
                    'name' => 'kouba',
                    'code' => 16018,
                ],
                18 => [
                    'name' => 'bourouba',
                    'code' => 16019,
                ],
                19 => [
                    'name' => 'dar el beïda',
                    'code' => 16020,
                ],
                20 => [
                    'name' => 'bab ezzouar',
                    'code' => 16021,
                ],
                21 => [
                    'name' => 'ben aknoun',
                    'code' => 16022,
                ],
                22 => [
                    'name' => 'dely ibrahim',
                    'code' => 16023,
                ],
                23 => [
                    'name' => 'el hammamet',
                    'code' => 16024,
                ],
                24 => [
                    'name' => 'raïs hamidou',
                    'code' => 16025,
                ],
                25 => [
                    'name' => 'djasr kasentina',
                    'code' => 16026,
                ],
                26 => [
                    'name' => 'el mouradia',
                    'code' => 16027,
                ],
                27 => [
                    'name' => 'hydra',
                    'code' => 16028,
                ],
                28 => [
                    'name' => 'mohammadia',
                    'code' => 16029,
                ],
                29 => [
                    'name' => 'bordj el kiffan',
                    'code' => 16030,
                ],
                30 => [
                    'name' => 'el magharia',
                    'code' => 16031,
                ],
                31 => [
                    'name' => 'beni messous',
                    'code' => 16032,
                ],
                32 => [
                    'name' => 'les eucalyptus',
                    'code' => 16033,
                ],
                33 => [
                    'name' => 'birtouta',
                    'code' => 16034,
                ],
                34 => [
                    'name' => 'tessala el merdja',
                    'code' => 16035,
                ],
                35 => [
                    'name' => 'ouled chebel',
                    'code' => 16036,
                ],
                36 => [
                    'name' => 'sidi moussa',
                    'code' => 16037,
                ],
                37 => [
                    'name' => 'aïn taya',
                    'code' => 16038,
                ],
                38 => [
                    'name' => 'bordj el bahri',
                    'code' => 16039,
                ],
                39 => [
                    'name' => 'el marsa',
                    'code' => 16040,
                ],
                40 => [
                    'name' => 'h\'raoua',
                    'code' => 16041,
                ],
                41 => [
                    'name' => 'rouïba',
                    'code' => 16042,
                ],
                42 => [
                    'name' => 'reghaïa',
                    'code' => 16043,
                ],
                43 => [
                    'name' => 'aïn benian',
                    'code' => 16044,
                ],
                44 => [
                    'name' => 'staoueli',
                    'code' => 16045,
                ],
                45 => [
                    'name' => 'zeralda',
                    'code' => 16046,
                ],
                46 => [
                    'name' => 'mahelma',
                    'code' => 16047,
                ],
                47 => [
                    'name' => 'rahmania',
                    'code' => 16048,
                ],
                48 => [
                    'name' => 'souidania',
                    'code' => 16049,
                ],
                49 => [
                    'name' => 'cheraga',
                    'code' => 16050,
                ],
                50 => [
                    'name' => 'ouled fayet',
                    'code' => 16051,
                ],
                51 => [
                    'name' => 'el achour',
                    'code' => 16052,
                ],
                52 => [
                    'name' => 'draria',
                    'code' => 16053,
                ],
                53 => [
                    'name' => 'douera',
                    'code' => 16054,
                ],
                54 => [
                    'name' => 'baba hassen',
                    'code' => 16055,
                ],
                55 => [
                    'name' => 'khraicia',
                    'code' => 16056,
                ],
                56 => [
                    'name' => 'saoula',
                    'code' => 16057,
                ],
            ],
            17 => [
                0 => [
                    'name' => 'aïn chouhada',
                    'code' => 17001,
                ],
                1 => [
                    'name' => 'aïn el ibel',
                    'code' => 17002,
                ],
                2 => [
                    'name' => 'aïn feka',
                    'code' => 17003,
                ],
                3 => [
                    'name' => 'aïn maabed',
                    'code' => 17004,
                ],
                4 => [
                    'name' => 'aïn oussara',
                    'code' => 17005,
                ],
                5 => [
                    'name' => 'amourah',
                    'code' => 17006,
                ],
                6 => [
                    'name' => 'benhar',
                    'code' => 17007,
                ],
                7 => [
                    'name' => 'beni yagoub',
                    'code' => 17008,
                ],
                8 => [
                    'name' => 'birine',
                    'code' => 17009,
                ],
                9 => [
                    'name' => 'bouira lahdab',
                    'code' => 170010,
                ],
                10 => [
                    'name' => 'charef',
                    'code' => 17011,
                ],
                11 => [
                    'name' => 'dar chioukh',
                    'code' => 17012,
                ],
                12 => [
                    'name' => 'deldoul',
                    'code' => 17013,
                ],
                13 => [
                    'name' => 'djelfa',
                    'code' => 17014,
                ],
                14 => [
                    'name' => 'douis',
                    'code' => 17015,
                ],
                15 => [
                    'name' => 'el guedid',
                    'code' => 17016,
                ],
                16 => [
                    'name' => 'el idrissia',
                    'code' => 17017,
                ],
                17 => [
                    'name' => 'el khemis',
                    'code' => 17018,
                ],
                18 => [
                    'name' => 'faidh el botma',
                    'code' => 17019,
                ],
                19 => [
                    'name' => 'guernini',
                    'code' => 17020,
                ],
                20 => [
                    'name' => 'guettara',
                    'code' => 17021,
                ],
                21 => [
                    'name' => 'had-sahary',
                    'code' => 17022,
                ],
                22 => [
                    'name' => 'hassi bahbah',
                    'code' => 17023,
                ],
                23 => [
                    'name' => 'hassi el euch',
                    'code' => 17024,
                ],
                24 => [
                    'name' => 'hassi fedoul',
                    'code' => 17025,
                ],
                25 => [
                    'name' => 'messaad',
                    'code' => 17026,
                ],
                26 => [
                    'name' => 'm\'liliha',
                    'code' => 17027,
                ],
                27 => [
                    'name' => 'moudjebara',
                    'code' => 17028,
                ],
                28 => [
                    'name' => 'oum laadham',
                    'code' => 17029,
                ],
                29 => [
                    'name' => 'sed rahal',
                    'code' => 17030,
                ],
                30 => [
                    'name' => 'selmana',
                    'code' => 17031,
                ],
                31 => [
                    'name' => 'sidi baizid',
                    'code' => 17032,
                ],
                32 => [
                    'name' => 'sidi ladjel',
                    'code' => 17033,
                ],
                33 => [
                    'name' => 'tadmit',
                    'code' => 17034,
                ],
                34 => [
                    'name' => 'zaafrane',
                    'code' => 17035,
                ],
                35 => [
                    'name' => 'zaccar',
                    'code' => 17036,
                ],
            ],
            18 => [
                0 => [
                    'name' => 'jijel',
                    'code' => 18001,
                ],
                1 => [
                    'name' => 'eraguene',
                    'code' => 18002,
                ],
                2 => [
                    'name' => 'el aouana',
                    'code' => 18003,
                ],
                3 => [
                    'name' => 'ziama mansouriah',
                    'code' => 18004,
                ],
                4 => [
                    'name' => 'taher',
                    'code' => 18005,
                ],
                5 => [
                    'name' => 'emir abdelkader',
                    'code' => 18006,
                ],
                6 => [
                    'name' => 'chekfa',
                    'code' => 18007,
                ],
                7 => [
                    'name' => 'chahna',
                    'code' => 18008,
                ],
                8 => [
                    'name' => 'el milia',
                    'code' => 18009,
                ],
                9 => [
                    'name' => 'sidi maarouf',
                    'code' => 18010,
                ],
                10 => [
                    'name' => 'settara',
                    'code' => 18011,
                ],
                11 => [
                    'name' => 'el ancer',
                    'code' => 18012,
                ],
                12 => [
                    'name' => 'sidi abdelaziz',
                    'code' => 18013,
                ],
                13 => [
                    'name' => 'kaous',
                    'code' => 18014,
                ],
                14 => [
                    'name' => 'ghebala',
                    'code' => 18015,
                ],
                15 => [
                    'name' => 'bouraoui belhadef',
                    'code' => 18016,
                ],
                16 => [
                    'name' => 'djimla',
                    'code' => 18017,
                ],
                17 => [
                    'name' => 'selma benziada',
                    'code' => 18018,
                ],
                18 => [
                    'name' => 'boucif ouled askeur',
                    'code' => 18019,
                ],
                19 => [
                    'name' => 'el kennar nouchfi',
                    'code' => 18020,
                ],
                20 => [
                    'name' => 'ouled yahia khedrouche',
                    'code' => 18021,
                ],
                21 => [
                    'name' => 'boudriaa ben yadjis',
                    'code' => 18022,
                ],
                22 => [
                    'name' => 'kheïri oued adjoul',
                    'code' => 18023,
                ],
                23 => [
                    'name' => 'texenna',
                    'code' => 18024,
                ],
                24 => [
                    'name' => 'djemaa beni habibi',
                    'code' => 18025,
                ],
                25 => [
                    'name' => 'bordj tahar',
                    'code' => 18026,
                ],
                26 => [
                    'name' => 'ouled rabah',
                    'code' => 18027,
                ],
                27 => [
                    'name' => 'ouadjana',
                    'code' => 18028,
                ],
            ],
            19 => [
                0 => [
                    'name' => 'aïn abessa',
                    'code' => 19001,
                ],
                1 => [
                    'name' => 'aïn arnat',
                    'code' => 19002,
                ],
                2 => [
                    'name' => 'aïn azel',
                    'code' => 19003,
                ],
                3 => [
                    'name' => 'aïn el kebira',
                    'code' => 19004,
                ],
                4 => [
                    'name' => 'aïn lahdjar',
                    'code' => 19005,
                ],
                5 => [
                    'name' => 'aïn legradj',
                    'code' => 19006,
                ],
                6 => [
                    'name' => 'aïn oulmene',
                    'code' => 19007,
                ],
                7 => [
                    'name' => 'aïn roua',
                    'code' => 19008,
                ],
                8 => [
                    'name' => 'aïn sebt',
                    'code' => 19009,
                ],
                9 => [
                    'name' => 'aït naoual mezada',
                    'code' => 190010,
                ],
                10 => [
                    'name' => 'aït tizi',
                    'code' => 19011,
                ],
                11 => [
                    'name' => 'beni ouartilene',
                    'code' => 19012,
                ],
                12 => [
                    'name' => 'amoucha',
                    'code' => 19013,
                ],
                13 => [
                    'name' => 'babor',
                    'code' => 19014,
                ],
                14 => [
                    'name' => 'bazer sakhra',
                    'code' => 19015,
                ],
                15 => [
                    'name' => 'beidha bordj',
                    'code' => 19016,
                ],
                16 => [
                    'name' => 'belaa',
                    'code' => 19017,
                ],
                17 => [
                    'name' => 'beni aziz',
                    'code' => 19018,
                ],
                18 => [
                    'name' => 'beni chebana',
                    'code' => 19019,
                ],
                19 => [
                    'name' => 'beni fouda',
                    'code' => 19020,
                ],
                20 => [
                    'name' => 'beni hocine',
                    'code' => 19021,
                ],
                21 => [
                    'name' => 'beni mouhli',
                    'code' => 19022,
                ],
                22 => [
                    'name' => 'bir el arch',
                    'code' => 19023,
                ],
                23 => [
                    'name' => 'bir haddada',
                    'code' => 19024,
                ],
                24 => [
                    'name' => 'bouandas',
                    'code' => 19025,
                ],
                25 => [
                    'name' => 'bougaa',
                    'code' => 19026,
                ],
                26 => [
                    'name' => 'bousselam',
                    'code' => 19027,
                ],
                27 => [
                    'name' => 'boutaleb',
                    'code' => 19028,
                ],
                28 => [
                    'name' => 'dehamcha',
                    'code' => 19029,
                ],
                29 => [
                    'name' => 'djemila',
                    'code' => 19030,
                ],
                30 => [
                    'name' => 'draa kebila',
                    'code' => 19031,
                ],
                31 => [
                    'name' => 'el eulma',
                    'code' => 19032,
                ],
                32 => [
                    'name' => 'el ouldja',
                    'code' => 19033,
                ],
                33 => [
                    'name' => 'el ouricia',
                    'code' => 19034,
                ],
                34 => [
                    'name' => 'guellal',
                    'code' => 19035,
                ],
                35 => [
                    'name' => 'guelta zerka',
                    'code' => 19036,
                ],
                36 => [
                    'name' => 'guenzet',
                    'code' => 19037,
                ],
                37 => [
                    'name' => 'guidjel',
                    'code' => 19038,
                ],
                38 => [
                    'name' => 'hamma',
                    'code' => 19039,
                ],
                39 => [
                    'name' => 'hammam guergour',
                    'code' => 19040,
                ],
                40 => [
                    'name' => 'hammam soukhna',
                    'code' => 19041,
                ],
                41 => [
                    'name' => 'harbil',
                    'code' => 19042,
                ],
                42 => [
                    'name' => 'ksar el abtal',
                    'code' => 19043,
                ],
                43 => [
                    'name' => 'maaouia',
                    'code' => 19044,
                ],
                44 => [
                    'name' => 'maoklane',
                    'code' => 19045,
                ],
                45 => [
                    'name' => 'mezloug',
                    'code' => 19046,
                ],
                46 => [
                    'name' => 'oued el barad',
                    'code' => 19047,
                ],
                47 => [
                    'name' => 'ouled addouane',
                    'code' => 19048,
                ],
                48 => [
                    'name' => 'ouled sabor',
                    'code' => 19049,
                ],
                49 => [
                    'name' => 'ouled si ahmed',
                    'code' => 19050,
                ],
                50 => [
                    'name' => 'ouled tebben',
                    'code' => 19051,
                ],
                51 => [
                    'name' => 'rasfa',
                    'code' => 19052,
                ],
                52 => [
                    'name' => 'salah bey',
                    'code' => 19053,
                ],
                53 => [
                    'name' => 'serdj el ghoul',
                    'code' => 19054,
                ],
                54 => [
                    'name' => 'sétif',
                    'code' => 19055,
                ],
                55 => [
                    'name' => 'tachouda',
                    'code' => 19056,
                ],
                56 => [
                    'name' => 'talaifacene',
                    'code' => 19057,
                ],
                57 => [
                    'name' => 'taya',
                    'code' => 19058,
                ],
                58 => [
                    'name' => 'tella',
                    'code' => 19059,
                ],
                59 => [
                    'name' => 'tizi n\'bechar',
                    'code' => 19060,
                ],
            ],
            20 => [
                0 => [
                    'name' => 'aïn el hadjar',
                    'code' => 20001,
                ],
                1 => [
                    'name' => 'aïn sekhouna',
                    'code' => 20002,
                ],
                2 => [
                    'name' => 'aïn soltane',
                    'code' => 20003,
                ],
                3 => [
                    'name' => 'doui thabet',
                    'code' => 20004,
                ],
                4 => [
                    'name' => 'el hassasna',
                    'code' => 20005,
                ],
                5 => [
                    'name' => 'hounet',
                    'code' => 20006,
                ],
                6 => [
                    'name' => 'maamora',
                    'code' => 20007,
                ],
                7 => [
                    'name' => 'moulay larbi',
                    'code' => 20008,
                ],
                8 => [
                    'name' => 'ouled brahim',
                    'code' => 20009,
                ],
                9 => [
                    'name' => 'ouled khaled',
                    'code' => 200010,
                ],
                10 => [
                    'name' => 'saïda',
                    'code' => 20011,
                ],
                11 => [
                    'name' => 'sidi ahmed',
                    'code' => 20012,
                ],
                12 => [
                    'name' => 'sidi amar',
                    'code' => 20013,
                ],
                13 => [
                    'name' => 'sidi boubekeur',
                    'code' => 20014,
                ],
                14 => [
                    'name' => 'tircine',
                    'code' => 20015,
                ],
                15 => [
                    'name' => 'youb',
                    'code' => 20016,
                ],
            ],
            21 => [
                0 => [
                    'name' => 'aïn bouziane',
                    'code' => 21001,
                ],
                1 => [
                    'name' => 'aïn charchar',
                    'code' => 21002,
                ],
                2 => [
                    'name' => 'aïn kechra',
                    'code' => 21003,
                ],
                3 => [
                    'name' => 'aïn zouit',
                    'code' => 21004,
                ],
                4 => [
                    'name' => 'azzaba',
                    'code' => 21005,
                ],
                5 => [
                    'name' => 'bekkouche lakhdar',
                    'code' => 21006,
                ],
                6 => [
                    'name' => 'bin el ouiden',
                    'code' => 21007,
                ],
                7 => [
                    'name' => 'ben azzouz',
                    'code' => 21008,
                ],
                8 => [
                    'name' => 'beni bechir',
                    'code' => 21009,
                ],
                9 => [
                    'name' => 'beni oulbane',
                    'code' => 210010,
                ],
                10 => [
                    'name' => 'beni zid',
                    'code' => 21011,
                ],
                11 => [
                    'name' => 'bouchtata',
                    'code' => 21012,
                ],
                12 => [
                    'name' => 'cheraia',
                    'code' => 21013,
                ],
                13 => [
                    'name' => 'collo',
                    'code' => 21014,
                ],
                14 => [
                    'name' => 'djendel saadi mohamed',
                    'code' => 21015,
                ],
                15 => [
                    'name' => 'el ghedir',
                    'code' => 21016,
                ],
                16 => [
                    'name' => 'el hadaiek',
                    'code' => 21017,
                ],
                17 => [
                    'name' => 'el harrouch',
                    'code' => 21018,
                ],
                18 => [
                    'name' => 'el marsa',
                    'code' => 21019,
                ],
                19 => [
                    'name' => 'emdjez edchich',
                    'code' => 21020,
                ],
                20 => [
                    'name' => 'es sebt',
                    'code' => 21021,
                ],
                21 => [
                    'name' => 'filfila',
                    'code' => 21022,
                ],
                22 => [
                    'name' => 'hamadi krouma',
                    'code' => 21023,
                ],
                23 => [
                    'name' => 'kanoua',
                    'code' => 21024,
                ],
                24 => [
                    'name' => 'kerkera',
                    'code' => 21025,
                ],
                25 => [
                    'name' => 'kheneg mayoum',
                    'code' => 21026,
                ],
                26 => [
                    'name' => 'oued zehour',
                    'code' => 21027,
                ],
                27 => [
                    'name' => 'ouldja boulballout',
                    'code' => 21028,
                ],
                28 => [
                    'name' => 'ouled attia',
                    'code' => 21029,
                ],
                29 => [
                    'name' => 'ouled hbaba',
                    'code' => 21030,
                ],
                30 => [
                    'name' => 'oum toub',
                    'code' => 21031,
                ],
                31 => [
                    'name' => 'ramdane djamel',
                    'code' => 21032,
                ],
                32 => [
                    'name' => 'salah bouchaour',
                    'code' => 21033,
                ],
                33 => [
                    'name' => 'sidi mezghiche',
                    'code' => 21034,
                ],
                34 => [
                    'name' => 'skikda',
                    'code' => 21035,
                ],
                35 => [
                    'name' => 'tamalous',
                    'code' => 21036,
                ],
                36 => [
                    'name' => 'zerdaza',
                    'code' => 21037,
                ],
                37 => [
                    'name' => 'zitouna',
                    'code' => 21038,
                ],
            ],
            22 => [
                0 => [
                    'name' => 'aïn adden',
                    'code' => 22001,
                ],
                1 => [
                    'name' => 'aïn el berd',
                    'code' => 22002,
                ],
                2 => [
                    'name' => 'aïn kada',
                    'code' => 22003,
                ],
                3 => [
                    'name' => 'aïn thrid',
                    'code' => 22004,
                ],
                4 => [
                    'name' => 'aïn tindamine',
                    'code' => 22005,
                ],
                5 => [
                    'name' => 'amarnas',
                    'code' => 22006,
                ],
                6 => [
                    'name' => 'badredine el mokrani',
                    'code' => 22007,
                ],
                7 => [
                    'name' => 'belarbi',
                    'code' => 22008,
                ],
                8 => [
                    'name' => 'ben badis',
                    'code' => 22009,
                ],
                9 => [
                    'name' => 'benachiba chelia',
                    'code' => 220010,
                ],
                10 => [
                    'name' => 'bir el hammam',
                    'code' => 22011,
                ],
                11 => [
                    'name' => 'boudjebaa el bordj',
                    'code' => 22012,
                ],
                12 => [
                    'name' => 'boukhanafis',
                    'code' => 22013,
                ],
                13 => [
                    'name' => 'chettouane belaila',
                    'code' => 22014,
                ],
                14 => [
                    'name' => 'dhaya',
                    'code' => 22015,
                ],
                15 => [
                    'name' => 'el haçaiba',
                    'code' => 22016,
                ],
                16 => [
                    'name' => 'hassi dahou',
                    'code' => 22017,
                ],
                17 => [
                    'name' => 'hassi zehana',
                    'code' => 22018,
                ],
                18 => [
                    'name' => 'lamtar',
                    'code' => 22019,
                ],
                19 => [
                    'name' => 'makedra',
                    'code' => 22020,
                ],
                20 => [
                    'name' => 'marhoum',
                    'code' => 22021,
                ],
                21 => [
                    'name' => 'm\'cid',
                    'code' => 22022,
                ],
                22 => [
                    'name' => 'merine',
                    'code' => 22023,
                ],
                23 => [
                    'name' => 'mezaourou',
                    'code' => 22024,
                ],
                24 => [
                    'name' => 'mostefa ben brahim',
                    'code' => 22025,
                ],
                25 => [
                    'name' => 'moulay slissen',
                    'code' => 22026,
                ],
                26 => [
                    'name' => 'oued sebaa',
                    'code' => 22027,
                ],
                27 => [
                    'name' => 'oued sefioun',
                    'code' => 22028,
                ],
                28 => [
                    'name' => 'oued taourira',
                    'code' => 22029,
                ],
                29 => [
                    'name' => 'ras el ma',
                    'code' => 22030,
                ],
                30 => [
                    'name' => 'redjem demouche',
                    'code' => 22031,
                ],
                31 => [
                    'name' => 'sehala thaoura',
                    'code' => 22032,
                ],
                32 => [
                    'name' => 'sfisef',
                    'code' => 22033,
                ],
                33 => [
                    'name' => 'sidi ali benyoub',
                    'code' => 22034,
                ],
                34 => [
                    'name' => 'sidi ali boussidi',
                    'code' => 22035,
                ],
                35 => [
                    'name' => 'sidi bel abbes',
                    'code' => 22036,
                ],
                36 => [
                    'name' => 'sidi brahim',
                    'code' => 22037,
                ],
                37 => [
                    'name' => 'sidi chaib',
                    'code' => 22038,
                ],
                38 => [
                    'name' => 'sidi daho des zairs',
                    'code' => 22039,
                ],
                39 => [
                    'name' => 'sidi hamadouche',
                    'code' => 22040,
                ],
                40 => [
                    'name' => 'sidi khaled',
                    'code' => 22041,
                ],
                41 => [
                    'name' => 'sidi lahcene',
                    'code' => 22042,
                ],
                42 => [
                    'name' => 'sidi yacoub',
                    'code' => 22043,
                ],
                43 => [
                    'name' => 'tabia',
                    'code' => 22044,
                ],
                44 => [
                    'name' => 'tafissour',
                    'code' => 22045,
                ],
                45 => [
                    'name' => 'taoudmout',
                    'code' => 22046,
                ],
                46 => [
                    'name' => 'teghalimet',
                    'code' => 22047,
                ],
                47 => [
                    'name' => 'telagh',
                    'code' => 22048,
                ],
                48 => [
                    'name' => 'tenira',
                    'code' => 22049,
                ],
                49 => [
                    'name' => 'tessala',
                    'code' => 22050,
                ],
                50 => [
                    'name' => 'tilmouni',
                    'code' => 22051,
                ],
                51 => [
                    'name' => 'zerouala',
                    'code' => 22052,
                ],
            ],
            23 => [
                0 => [
                    'name' => 'annaba',
                    'code' => 23001,
                ],
                1 => [
                    'name' => 'berrahal',
                    'code' => 23002,
                ],
                2 => [
                    'name' => 'el hadjar',
                    'code' => 23003,
                ],
                3 => [
                    'name' => 'eulma',
                    'code' => 23004,
                ],
                4 => [
                    'name' => 'el bouni',
                    'code' => 23005,
                ],
                5 => [
                    'name' => 'oued el aneb',
                    'code' => 23006,
                ],
                6 => [
                    'name' => 'cheurfa',
                    'code' => 23007,
                ],
                7 => [
                    'name' => 'seraïdi',
                    'code' => 23008,
                ],
                8 => [
                    'name' => 'aïn berda',
                    'code' => 23009,
                ],
                9 => [
                    'name' => 'chetaïbi',
                    'code' => 23010,
                ],
                10 => [
                    'name' => 'sidi amar',
                    'code' => 23011,
                ],
                11 => [
                    'name' => 'treat',
                    'code' => 23012,
                ],
            ],
            24 => [
                0 => [
                    'name' => 'aïn ben beida',
                    'code' => 24001,
                ],
                1 => [
                    'name' => 'aïn larbi',
                    'code' => 24002,
                ],
                2 => [
                    'name' => 'aïn makhlouf',
                    'code' => 24003,
                ],
                3 => [
                    'name' => 'aïn reggada',
                    'code' => 24004,
                ],
                4 => [
                    'name' => 'aïn sandel',
                    'code' => 24005,
                ],
                5 => [
                    'name' => 'belkheir',
                    'code' => 24006,
                ],
                6 => [
                    'name' => 'ben djerrah',
                    'code' => 24007,
                ],
                7 => [
                    'name' => 'beni mezline',
                    'code' => 24008,
                ],
                8 => [
                    'name' => 'bordj sabath',
                    'code' => 24009,
                ],
                9 => [
                    'name' => 'bouhachana',
                    'code' => 240010,
                ],
                10 => [
                    'name' => 'bouhamdane',
                    'code' => 24011,
                ],
                11 => [
                    'name' => 'bouati mahmoud',
                    'code' => 24012,
                ],
                12 => [
                    'name' => 'bouchegouf',
                    'code' => 24013,
                ],
                13 => [
                    'name' => 'boumahra ahmed',
                    'code' => 24014,
                ],
                14 => [
                    'name' => 'dahouara',
                    'code' => 24015,
                ],
                15 => [
                    'name' => 'djeballah khemissi',
                    'code' => 24016,
                ],
                16 => [
                    'name' => 'el fedjoudj',
                    'code' => 24017,
                ],
                17 => [
                    'name' => 'guellat bou sbaa',
                    'code' => 24018,
                ],
                18 => [
                    'name' => 'guelma',
                    'code' => 24019,
                ],
                19 => [
                    'name' => 'hammam debagh',
                    'code' => 24020,
                ],
                20 => [
                    'name' => 'hammam n\'bail',
                    'code' => 24021,
                ],
                21 => [
                    'name' => 'héliopolis',
                    'code' => 24022,
                ],
                22 => [
                    'name' => 'houari boumédiène',
                    'code' => 24023,
                ],
                23 => [
                    'name' => 'khezarra',
                    'code' => 24024,
                ],
                24 => [
                    'name' => 'medjez amar',
                    'code' => 24025,
                ],
                25 => [
                    'name' => 'medjez sfa',
                    'code' => 24026,
                ],
                26 => [
                    'name' => 'nechmaya',
                    'code' => 24027,
                ],
                27 => [
                    'name' => 'oued cheham',
                    'code' => 24028,
                ],
                28 => [
                    'name' => 'oued fragha',
                    'code' => 24029,
                ],
                29 => [
                    'name' => 'oued zenati',
                    'code' => 24030,
                ],
                30 => [
                    'name' => 'ras el agba',
                    'code' => 24031,
                ],
                31 => [
                    'name' => 'roknia',
                    'code' => 24032,
                ],
                32 => [
                    'name' => 'sellaoua announa',
                    'code' => 24033,
                ],
                33 => [
                    'name' => 'tamlouka',
                    'code' => 24034,
                ],
            ],
            25 => [
                0 => [
                    'name' => 'aïn abid',
                    'code' => 25001,
                ],
                1 => [
                    'name' => 'aïn smara',
                    'code' => 25002,
                ],
                2 => [
                    'name' => 'beni hamiden',
                    'code' => 25003,
                ],
                3 => [
                    'name' => 'constantine',
                    'code' => 25004,
                ],
                4 => [
                    'name' => 'didouche mourad',
                    'code' => 25005,
                ],
                5 => [
                    'name' => 'el khroub',
                    'code' => 25006,
                ],
                6 => [
                    'name' => 'hamma bouziane',
                    'code' => 25007,
                ],
                7 => [
                    'name' => 'ibn badis',
                    'code' => 25008,
                ],
                8 => [
                    'name' => 'ibn ziad',
                    'code' => 25009,
                ],
                9 => [
                    'name' => 'messaoud boudjriou',
                    'code' => 250010,
                ],
                10 => [
                    'name' => 'ouled rahmoune',
                    'code' => 25011,
                ],
                11 => [
                    'name' => 'zighoud youcef',
                    'code' => 25012,
                ],
            ],
            26 => [
                0 => [
                    'name' => 'aïn boucif',
                    'code' => 26001,
                ],
                1 => [
                    'name' => 'aïn ouksir',
                    'code' => 26002,
                ],
                2 => [
                    'name' => 'aissaouia',
                    'code' => 26003,
                ],
                3 => [
                    'name' => 'aziz',
                    'code' => 26004,
                ],
                4 => [
                    'name' => 'baata',
                    'code' => 26005,
                ],
                5 => [
                    'name' => 'benchicao',
                    'code' => 26006,
                ],
                6 => [
                    'name' => 'beni slimane',
                    'code' => 26007,
                ],
                7 => [
                    'name' => 'berrouaghia',
                    'code' => 26008,
                ],
                8 => [
                    'name' => 'bir ben laabed',
                    'code' => 26009,
                ],
                9 => [
                    'name' => 'boghar',
                    'code' => 260010,
                ],
                10 => [
                    'name' => 'bou aiche',
                    'code' => 26011,
                ],
                11 => [
                    'name' => 'bouaichoune',
                    'code' => 26012,
                ],
                12 => [
                    'name' => 'bouchrahil',
                    'code' => 26013,
                ],
                13 => [
                    'name' => 'boughezoul',
                    'code' => 26014,
                ],
                14 => [
                    'name' => 'bouskene',
                    'code' => 26015,
                ],
                15 => [
                    'name' => 'chahbounia',
                    'code' => 26016,
                ],
                16 => [
                    'name' => 'chellalet el adhaoura',
                    'code' => 26017,
                ],
                17 => [
                    'name' => 'cheniguel',
                    'code' => 26018,
                ],
                18 => [
                    'name' => 'derrag',
                    'code' => 26019,
                ],
                19 => [
                    'name' => 'deux bassins',
                    'code' => 26020,
                ],
                20 => [
                    'name' => 'djouab',
                    'code' => 26021,
                ],
                21 => [
                    'name' => 'draa essamar',
                    'code' => 26022,
                ],
                22 => [
                    'name' => 'el azizia',
                    'code' => 26023,
                ],
                23 => [
                    'name' => 'el guelb el kebir',
                    'code' => 26024,
                ],
                24 => [
                    'name' => 'el hamdania',
                    'code' => 26025,
                ],
                25 => [
                    'name' => 'el omaria',
                    'code' => 26026,
                ],
                26 => [
                    'name' => 'el ouinet',
                    'code' => 26027,
                ],
                27 => [
                    'name' => 'hannacha',
                    'code' => 26028,
                ],
                28 => [
                    'name' => 'kef lakhdar',
                    'code' => 26029,
                ],
                29 => [
                    'name' => 'khams djouamaa',
                    'code' => 26030,
                ],
                30 => [
                    'name' => 'ksar boukhari',
                    'code' => 26031,
                ],
                31 => [
                    'name' => 'meghraoua',
                    'code' => 26032,
                ],
                32 => [
                    'name' => 'médéa',
                    'code' => 26033,
                ],
                33 => [
                    'name' => 'moudjbar',
                    'code' => 26034,
                ],
                34 => [
                    'name' => 'meftaha',
                    'code' => 26035,
                ],
                35 => [
                    'name' => 'mezerana',
                    'code' => 26036,
                ],
                36 => [
                    'name' => 'mihoub',
                    'code' => 26037,
                ],
                37 => [
                    'name' => 'ouamri',
                    'code' => 26038,
                ],
                38 => [
                    'name' => 'oued harbil',
                    'code' => 26039,
                ],
                39 => [
                    'name' => 'ouled antar',
                    'code' => 26040,
                ],
                40 => [
                    'name' => 'ouled bouachra',
                    'code' => 26041,
                ],
                41 => [
                    'name' => 'ouled brahim',
                    'code' => 26042,
                ],
                42 => [
                    'name' => 'ouled deide',
                    'code' => 26043,
                ],
                43 => [
                    'name' => 'ouled hellal',
                    'code' => 26044,
                ],
                44 => [
                    'name' => 'ouled maaref',
                    'code' => 26045,
                ],
                45 => [
                    'name' => 'oum el djalil',
                    'code' => 26046,
                ],
                46 => [
                    'name' => 'ouzera',
                    'code' => 26047,
                ],
                47 => [
                    'name' => 'rebaia',
                    'code' => 26048,
                ],
                48 => [
                    'name' => 'saneg',
                    'code' => 26049,
                ],
                49 => [
                    'name' => 'sedraia',
                    'code' => 26050,
                ],
                50 => [
                    'name' => 'seghouane',
                    'code' => 26051,
                ],
                51 => [
                    'name' => 'si mahdjoub',
                    'code' => 26052,
                ],
                52 => [
                    'name' => 'sidi damed',
                    'code' => 26053,
                ],
                53 => [
                    'name' => 'sidi errabia',
                    'code' => 26054,
                ],
                54 => [
                    'name' => 'sidi naamane',
                    'code' => 26055,
                ],
                55 => [
                    'name' => 'sidi zahar',
                    'code' => 26056,
                ],
                56 => [
                    'name' => 'sidi ziane',
                    'code' => 26057,
                ],
                57 => [
                    'name' => 'souagui',
                    'code' => 26058,
                ],
                58 => [
                    'name' => 'tablat',
                    'code' => 26059,
                ],
                59 => [
                    'name' => 'tafraout',
                    'code' => 26060,
                ],
                60 => [
                    'name' => 'tamesguida',
                    'code' => 26061,
                ],
                61 => [
                    'name' => 'tizi mahdi',
                    'code' => 26062,
                ],
                62 => [
                    'name' => 'tlatet eddouar',
                    'code' => 26063,
                ],
                63 => [
                    'name' => 'zoubiria',
                    'code' => 26064,
                ],
            ],
            27 => [
                0 => [
                    'name' => 'abdelmalek ramdane',
                    'code' => 27001,
                ],
                1 => [
                    'name' => 'achaacha',
                    'code' => 27002,
                ],
                2 => [
                    'name' => 'aïn boudinar',
                    'code' => 27003,
                ],
                3 => [
                    'name' => 'aïn nouissy',
                    'code' => 27004,
                ],
                4 => [
                    'name' => 'aïn sidi cherif',
                    'code' => 27005,
                ],
                5 => [
                    'name' => 'aïn tedles',
                    'code' => 27006,
                ],
                6 => [
                    'name' => 'blad touahria',
                    'code' => 27007,
                ],
                7 => [
                    'name' => 'bouguirat',
                    'code' => 27008,
                ],
                8 => [
                    'name' => 'el hassiane',
                    'code' => 27009,
                ],
                9 => [
                    'name' => 'fornaka',
                    'code' => 270010,
                ],
                10 => [
                    'name' => 'hadjadj',
                    'code' => 27011,
                ],
                11 => [
                    'name' => 'hassi mameche',
                    'code' => 27012,
                ],
                12 => [
                    'name' => 'khadra',
                    'code' => 27013,
                ],
                13 => [
                    'name' => 'kheireddine',
                    'code' => 27014,
                ],
                14 => [
                    'name' => 'mansourah',
                    'code' => 27015,
                ],
                15 => [
                    'name' => 'mesra',
                    'code' => 27016,
                ],
                16 => [
                    'name' => 'mazagran',
                    'code' => 27017,
                ],
                17 => [
                    'name' => 'mostaganem',
                    'code' => 27018,
                ],
                18 => [
                    'name' => 'nekmaria',
                    'code' => 27019,
                ],
                19 => [
                    'name' => 'oued el kheir',
                    'code' => 27020,
                ],
                20 => [
                    'name' => 'ouled boughalem',
                    'code' => 27021,
                ],
                21 => [
                    'name' => 'ouled maallah',
                    'code' => 27022,
                ],
                22 => [
                    'name' => 'safsaf',
                    'code' => 27023,
                ],
                23 => [
                    'name' => 'sayada',
                    'code' => 27024,
                ],
                24 => [
                    'name' => 'sidi ali',
                    'code' => 27025,
                ],
                25 => [
                    'name' => 'sidi belattar',
                    'code' => 27026,
                ],
                26 => [
                    'name' => 'sidi lakhdar',
                    'code' => 27027,
                ],
                27 => [
                    'name' => 'sirat',
                    'code' => 27028,
                ],
                28 => [
                    'name' => 'souaflia',
                    'code' => 27029,
                ],
                29 => [
                    'name' => 'sour',
                    'code' => 27030,
                ],
                30 => [
                    'name' => 'stidia',
                    'code' => 27031,
                ],
                31 => [
                    'name' => 'tazgait',
                    'code' => 27032,
                ],
            ],
            28 => [
                0 => [
                    'name' => 'aïn el hadjel',
                    'code' => 28001,
                ],
                1 => [
                    'name' => 'aïn el melh',
                    'code' => 28002,
                ],
                2 => [
                    'name' => 'aïn errich',
                    'code' => 28003,
                ],
                3 => [
                    'name' => 'aïn fares',
                    'code' => 28004,
                ],
                4 => [
                    'name' => 'aïn khadra',
                    'code' => 28005,
                ],
                5 => [
                    'name' => 'belaiba',
                    'code' => 28006,
                ],
                6 => [
                    'name' => 'ben srour',
                    'code' => 28007,
                ],
                7 => [
                    'name' => 'beni ilmane',
                    'code' => 28008,
                ],
                8 => [
                    'name' => 'benzouh',
                    'code' => 28009,
                ],
                9 => [
                    'name' => 'berhoum',
                    'code' => 280010,
                ],
                10 => [
                    'name' => 'bir foda',
                    'code' => 28011,
                ],
                11 => [
                    'name' => 'bou saâda',
                    'code' => 28012,
                ],
                12 => [
                    'name' => 'bouti sayah',
                    'code' => 28013,
                ],
                13 => [
                    'name' => 'chellal',
                    'code' => 28014,
                ],
                14 => [
                    'name' => 'dehahna',
                    'code' => 28015,
                ],
                15 => [
                    'name' => 'djebel messaad',
                    'code' => 28016,
                ],
                16 => [
                    'name' => 'el hamel',
                    'code' => 28017,
                ],
                17 => [
                    'name' => 'el houamed',
                    'code' => 28018,
                ],
                18 => [
                    'name' => 'hammam dhalaa',
                    'code' => 28019,
                ],
                19 => [
                    'name' => 'khettouti sed el djir',
                    'code' => 28020,
                ],
                20 => [
                    'name' => 'khoubana',
                    'code' => 28021,
                ],
                21 => [
                    'name' => 'maadid',
                    'code' => 28022,
                ],
                22 => [
                    'name' => 'maarif',
                    'code' => 28023,
                ],
                23 => [
                    'name' => 'magra',
                    'code' => 28024,
                ],
                24 => [
                    'name' => 'm\'cif',
                    'code' => 28025,
                ],
                25 => [
                    'name' => 'medjedel',
                    'code' => 28026,
                ],
                26 => [
                    'name' => 'm\'sila',
                    'code' => 28027,
                ],
                27 => [
                    'name' => 'm\'tarfa',
                    'code' => 28028,
                ],
                28 => [
                    'name' => 'ouanougha',
                    'code' => 28029,
                ],
                29 => [
                    'name' => 'ouled addi guebala',
                    'code' => 28030,
                ],
                30 => [
                    'name' => 'ouled atia',
                    'code' => 28031,
                ],
                31 => [
                    'name' => 'mohammed boudiaf',
                    'code' => 28032,
                ],
                32 => [
                    'name' => 'ouled derradj',
                    'code' => 28033,
                ],
                33 => [
                    'name' => 'ouled madhi',
                    'code' => 28034,
                ],
                34 => [
                    'name' => 'ouled mansour',
                    'code' => 28035,
                ],
                35 => [
                    'name' => 'ouled sidi brahim',
                    'code' => 28036,
                ],
                36 => [
                    'name' => 'ouled slimane',
                    'code' => 28037,
                ],
                37 => [
                    'name' => 'oultem',
                    'code' => 28038,
                ],
                38 => [
                    'name' => 'sidi aïssa',
                    'code' => 28039,
                ],
                39 => [
                    'name' => 'sidi ameur',
                    'code' => 28040,
                ],
                40 => [
                    'name' => 'sidi hadjeres',
                    'code' => 28041,
                ],
                41 => [
                    'name' => 'sidi m\'hamed',
                    'code' => 28042,
                ],
                42 => [
                    'name' => 'slim',
                    'code' => 28043,
                ],
                43 => [
                    'name' => 'souamaa',
                    'code' => 28044,
                ],
                44 => [
                    'name' => 'tamsa',
                    'code' => 28045,
                ],
                45 => [
                    'name' => 'tarmount',
                    'code' => 28046,
                ],
                46 => [
                    'name' => 'zarzour',
                    'code' => 28047,
                ],
            ],
            29 => [
                0 => [
                    'name' => 'aïn fares',
                    'code' => 29001,
                ],
                1 => [
                    'name' => 'aïn fekan',
                    'code' => 29002,
                ],
                2 => [
                    'name' => 'aïn ferah',
                    'code' => 29003,
                ],
                3 => [
                    'name' => 'aïn fras',
                    'code' => 29004,
                ],
                4 => [
                    'name' => 'alaïmia',
                    'code' => 29005,
                ],
                5 => [
                    'name' => 'aouf',
                    'code' => 29006,
                ],
                6 => [
                    'name' => 'beniane',
                    'code' => 29007,
                ],
                7 => [
                    'name' => 'bou hanifia',
                    'code' => 29008,
                ],
                8 => [
                    'name' => 'bou henni',
                    'code' => 29009,
                ],
                9 => [
                    'name' => 'chorfa',
                    'code' => 290010,
                ],
                10 => [
                    'name' => 'el bordj',
                    'code' => 29011,
                ],
                11 => [
                    'name' => 'el gaada',
                    'code' => 29012,
                ],
                12 => [
                    'name' => 'el ghomri',
                    'code' => 29013,
                ],
                13 => [
                    'name' => 'el guettana',
                    'code' => 29014,
                ],
                14 => [
                    'name' => 'el keurt',
                    'code' => 29015,
                ],
                15 => [
                    'name' => 'el menaouer',
                    'code' => 29016,
                ],
                16 => [
                    'name' => 'ferraguig',
                    'code' => 29017,
                ],
                17 => [
                    'name' => 'froha',
                    'code' => 29018,
                ],
                18 => [
                    'name' => 'gharrous',
                    'code' => 29019,
                ],
                19 => [
                    'name' => 'guerdjoum',
                    'code' => 29020,
                ],
                20 => [
                    'name' => 'ghriss',
                    'code' => 29021,
                ],
                21 => [
                    'name' => 'hachem',
                    'code' => 29022,
                ],
                22 => [
                    'name' => 'hacine',
                    'code' => 29023,
                ],
                23 => [
                    'name' => 'khalouia',
                    'code' => 29024,
                ],
                24 => [
                    'name' => 'makdha',
                    'code' => 29025,
                ],
                25 => [
                    'name' => 'mamounia',
                    'code' => 29026,
                ],
                26 => [
                    'name' => 'maoussa',
                    'code' => 29027,
                ],
                27 => [
                    'name' => 'mascara',
                    'code' => 29028,
                ],
                28 => [
                    'name' => 'matemore',
                    'code' => 29029,
                ],
                29 => [
                    'name' => 'mocta douz',
                    'code' => 29030,
                ],
                30 => [
                    'name' => 'mohammadia',
                    'code' => 29031,
                ],
                31 => [
                    'name' => 'nesmoth',
                    'code' => 29032,
                ],
                32 => [
                    'name' => 'oggaz',
                    'code' => 29033,
                ],
                33 => [
                    'name' => 'oued el abtal',
                    'code' => 29034,
                ],
                34 => [
                    'name' => 'oued taria',
                    'code' => 29035,
                ],
                35 => [
                    'name' => 'ras el aïn amirouche',
                    'code' => 29036,
                ],
                36 => [
                    'name' => 'sedjerara',
                    'code' => 29037,
                ],
                37 => [
                    'name' => 'sehailia',
                    'code' => 29038,
                ],
                38 => [
                    'name' => 'sidi abdeldjebar',
                    'code' => 29039,
                ],
                39 => [
                    'name' => 'sidi abdelmoumen',
                    'code' => 29040,
                ],
                40 => [
                    'name' => 'sidi kada',
                    'code' => 29041,
                ],
                41 => [
                    'name' => 'sidi boussaid',
                    'code' => 29042,
                ],
                42 => [
                    'name' => 'sig',
                    'code' => 29043,
                ],
                43 => [
                    'name' => 'tighennif',
                    'code' => 29044,
                ],
                44 => [
                    'name' => 'tizi',
                    'code' => 29045,
                ],
                45 => [
                    'name' => 'zahana',
                    'code' => 29046,
                ],
                46 => [
                    'name' => 'zelmata',
                    'code' => 29047,
                ],
            ],
            30 => [
                0 => [
                    'name' => 'aïn beida',
                    'code' => 30001,
                ],
                1 => [
                    'name' => 'el borma',
                    'code' => 30002,
                ],
                2 => [
                    'name' => 'hassi ben abdellah',
                    'code' => 30003,
                ],
                3 => [
                    'name' => 'hassi messaoud',
                    'code' => 30004,
                ],
                4 => [
                    'name' => 'n\'goussa',
                    'code' => 30005,
                ],
                5 => [
                    'name' => 'ouargla',
                    'code' => 30006,
                ],
                6 => [
                    'name' => 'rouissat',
                    'code' => 30007,
                ],
                7 => [
                    'name' => 'sidi khouiled',
                    'code' => 30008,
                ],
            ],
            31 => [
                0 => [
                    'name' => 'oran',
                    'code' => 31001,
                ],
                1 => [
                    'name' => 'gdyel',
                    'code' => 31002,
                ],
                2 => [
                    'name' => 'bir el djir',
                    'code' => 31003,
                ],
                3 => [
                    'name' => 'hassi bounif',
                    'code' => 31004,
                ],
                4 => [
                    'name' => 'es senia',
                    'code' => 31005,
                ],
                5 => [
                    'name' => 'arzew',
                    'code' => 31006,
                ],
                6 => [
                    'name' => 'bethioua',
                    'code' => 31007,
                ],
                7 => [
                    'name' => 'marsat el hadjadj',
                    'code' => 31008,
                ],
                8 => [
                    'name' => 'aïn el turk',
                    'code' => 31009,
                ],
                9 => [
                    'name' => 'el ançor',
                    'code' => 31010,
                ],
                10 => [
                    'name' => 'oued tlelat',
                    'code' => 31011,
                ],
                11 => [
                    'name' => 'tafraoui',
                    'code' => 31012,
                ],
                12 => [
                    'name' => 'sidi chami',
                    'code' => 31013,
                ],
                13 => [
                    'name' => 'boufatis',
                    'code' => 31014,
                ],
                14 => [
                    'name' => 'mers el kébir',
                    'code' => 31015,
                ],
                15 => [
                    'name' => 'bousfer',
                    'code' => 31016,
                ],
                16 => [
                    'name' => 'el kerma',
                    'code' => 31017,
                ],
                17 => [
                    'name' => 'el braya',
                    'code' => 31018,
                ],
                18 => [
                    'name' => 'hassi ben okba',
                    'code' => 31019,
                ],
                19 => [
                    'name' => 'ben freha',
                    'code' => 31020,
                ],
                20 => [
                    'name' => 'hassi mefsoukh',
                    'code' => 31021,
                ],
                21 => [
                    'name' => 'sidi benyebka',
                    'code' => 31022,
                ],
                22 => [
                    'name' => 'misserghin',
                    'code' => 31023,
                ],
                23 => [
                    'name' => 'boutlelis',
                    'code' => 31024,
                ],
                24 => [
                    'name' => 'aïn el kerma',
                    'code' => 31025,
                ],
                25 => [
                    'name' => 'aïn el bia',
                    'code' => 31026,
                ],
            ],
            32 => [
                0 => [
                    'name' => 'el bayadh',
                    'code' => 32001,
                ],
                1 => [
                    'name' => 'rogassa',
                    'code' => 32002,
                ],
                2 => [
                    'name' => 'stitten',
                    'code' => 32003,
                ],
                3 => [
                    'name' => 'brezina',
                    'code' => 32004,
                ],
                4 => [
                    'name' => 'ghassoul',
                    'code' => 32005,
                ],
                5 => [
                    'name' => 'boualem',
                    'code' => 32006,
                ],
                6 => [
                    'name' => 'el abiodh sidi cheikh',
                    'code' => 32007,
                ],
                7 => [
                    'name' => 'aïn el orak',
                    'code' => 32008,
                ],
                8 => [
                    'name' => 'arbaouat',
                    'code' => 32009,
                ],
                9 => [
                    'name' => 'bougtoub',
                    'code' => 32010,
                ],
                10 => [
                    'name' => 'el kheiter',
                    'code' => 32011,
                ],
                11 => [
                    'name' => 'kef el ahmar',
                    'code' => 32012,
                ],
                12 => [
                    'name' => 'boussemghoun',
                    'code' => 32013,
                ],
                13 => [
                    'name' => 'chellala',
                    'code' => 32014,
                ],
                14 => [
                    'name' => 'kraakda',
                    'code' => 32015,
                ],
                15 => [
                    'name' => 'el bnoud',
                    'code' => 32016,
                ],
                16 => [
                    'name' => 'cheguig',
                    'code' => 32017,
                ],
                17 => [
                    'name' => 'sidi ameur',
                    'code' => 32018,
                ],
                18 => [
                    'name' => 'el mehara',
                    'code' => 32019,
                ],
                19 => [
                    'name' => 'tousmouline',
                    'code' => 32020,
                ],
                20 => [
                    'name' => 'sidi slimane',
                    'code' => 32021,
                ],
                21 => [
                    'name' => 'sidi tifour',
                    'code' => 32022,
                ],
            ],
            33 => [
                0 => [
                    'name' => 'illizi',
                    'code' => 33001,
                ],
                1 => [
                    'name' => 'debdeb',
                    'code' => 33003,
                ],
                2 => [
                    'name' => 'bordj omar driss',
                    'code' => 33004,
                ],
                3 => [
                    'name' => 'in amenas',
                    'code' => 33006,
                ],
            ],
            34 => [
                0 => [
                    'name' => 'aïn taghrout',
                    'code' => 34001,
                ],
                1 => [
                    'name' => 'aïn tesra',
                    'code' => 34002,
                ],
                2 => [
                    'name' => 'belimour',
                    'code' => 34003,
                ],
                3 => [
                    'name' => 'ben daoud',
                    'code' => 34004,
                ],
                4 => [
                    'name' => 'bir kasdali',
                    'code' => 34005,
                ],
                5 => [
                    'name' => 'bordj bou arreridj',
                    'code' => 34006,
                ],
                6 => [
                    'name' => 'bordj ghédir',
                    'code' => 34007,
                ],
                7 => [
                    'name' => 'bordj zemoura',
                    'code' => 34008,
                ],
                8 => [
                    'name' => 'colla',
                    'code' => 34009,
                ],
                9 => [
                    'name' => 'djaafra',
                    'code' => 340010,
                ],
                10 => [
                    'name' => 'el ach',
                    'code' => 34011,
                ],
                11 => [
                    'name' => 'el achir',
                    'code' => 34012,
                ],
                12 => [
                    'name' => 'el anseur',
                    'code' => 34013,
                ],
                13 => [
                    'name' => 'el hamadia',
                    'code' => 34014,
                ],
                14 => [
                    'name' => 'el main',
                    'code' => 34015,
                ],
                15 => [
                    'name' => 'el m\'hir',
                    'code' => 34016,
                ],
                16 => [
                    'name' => 'ghilassa',
                    'code' => 34017,
                ],
                17 => [
                    'name' => 'haraza',
                    'code' => 34018,
                ],
                18 => [
                    'name' => 'hasnaoua',
                    'code' => 34019,
                ],
                19 => [
                    'name' => 'khelil',
                    'code' => 34020,
                ],
                20 => [
                    'name' => 'ksour',
                    'code' => 34021,
                ],
                21 => [
                    'name' => 'mansoura',
                    'code' => 34022,
                ],
                22 => [
                    'name' => 'medjana',
                    'code' => 34023,
                ],
                23 => [
                    'name' => 'ouled brahem',
                    'code' => 34024,
                ],
                24 => [
                    'name' => 'ouled dahmane',
                    'code' => 34025,
                ],
                25 => [
                    'name' => 'ouled sidi brahim',
                    'code' => 34026,
                ],
                26 => [
                    'name' => 'rabta',
                    'code' => 34027,
                ],
                27 => [
                    'name' => 'ras el oued',
                    'code' => 34028,
                ],
                28 => [
                    'name' => 'sidi embarek',
                    'code' => 34029,
                ],
                29 => [
                    'name' => 'tefreg',
                    'code' => 34030,
                ],
                30 => [
                    'name' => 'taglait',
                    'code' => 34031,
                ],
                31 => [
                    'name' => 'teniet en nasr',
                    'code' => 34032,
                ],
                32 => [
                    'name' => 'tassameurt',
                    'code' => 34033,
                ],
                33 => [
                    'name' => 'tixter',
                    'code' => 34034,
                ],
            ],
            35 => [
                0 => [
                    'name' => 'afir',
                    'code' => 35004,
                ],
                1 => [
                    'name' => 'ammal',
                    'code' => 35029,
                ],
                2 => [
                    'name' => 'baghlia',
                    'code' => 35006,
                ],
                3 => [
                    'name' => 'ben choud',
                    'code' => 35027,
                ],
                4 => [
                    'name' => 'beni amrane',
                    'code' => 35030,
                ],
                5 => [
                    'name' => 'bordj menaïel',
                    'code' => 35005,
                ],
                6 => [
                    'name' => 'boudouaou',
                    'code' => 35002,
                ],
                7 => [
                    'name' => 'boudouaou-el-bahri',
                    'code' => 35032,
                ],
                8 => [
                    'name' => 'boumerdes',
                    'code' => 35001,
                ],
                9 => [
                    'name' => 'bouzegza keddara',
                    'code' => 35022,
                ],
                10 => [
                    'name' => 'chabet el ameur',
                    'code' => 35014,
                ],
                11 => [
                    'name' => 'corso',
                    'code' => 35019,
                ],
                12 => [
                    'name' => 'dellys',
                    'code' => 35028,
                ],
                13 => [
                    'name' => 'djinet',
                    'code' => 35009,
                ],
                14 => [
                    'name' => 'el kharrouba',
                    'code' => 35038,
                ],
                15 => [
                    'name' => 'hammedi',
                    'code' => 35036,
                ],
                16 => [
                    'name' => 'issers',
                    'code' => 35010,
                ],
                17 => [
                    'name' => 'khemis el-khechna',
                    'code' => 35037,
                ],
                18 => [
                    'name' => 'larbatache',
                    'code' => 35021,
                ],
                19 => [
                    'name' => 'leghata',
                    'code' => 35035,
                ],
                20 => [
                    'name' => 'naciria',
                    'code' => 35008,
                ],
                21 => [
                    'name' => 'ouled aïssa',
                    'code' => 35026,
                ],
                22 => [
                    'name' => 'ouled hedadj',
                    'code' => 35033,
                ],
                23 => [
                    'name' => 'ouled moussa',
                    'code' => 35020,
                ],
                24 => [
                    'name' => 'si mustapha',
                    'code' => 35012,
                ],
                25 => [
                    'name' => 'sidi daoud',
                    'code' => 35007,
                ],
                26 => [
                    'name' => 'souk el had',
                    'code' => 35031,
                ],
                27 => [
                    'name' => 'taourga',
                    'code' => 35025,
                ],
                28 => [
                    'name' => 'thenia',
                    'code' => 35015,
                ],
                29 => [
                    'name' => 'tidjelabine',
                    'code' => 35013,
                ],
                30 => [
                    'name' => 'timezrit',
                    'code' => 35018,
                ],
                31 => [
                    'name' => 'zemmouri',
                    'code' => 35011,
                ],
            ],
            36 => [
                0 => [
                    'name' => 'aïn el assel',
                    'code' => 36001,
                ],
                1 => [
                    'name' => 'aïn kerma',
                    'code' => 36002,
                ],
                2 => [
                    'name' => 'asfour',
                    'code' => 36003,
                ],
                3 => [
                    'name' => 'ben mehidi',
                    'code' => 36004,
                ],
                4 => [
                    'name' => 'berrihane',
                    'code' => 36005,
                ],
                5 => [
                    'name' => 'besbes',
                    'code' => 36006,
                ],
                6 => [
                    'name' => 'bougous',
                    'code' => 36007,
                ],
                7 => [
                    'name' => 'bouhadjar',
                    'code' => 36008,
                ],
                8 => [
                    'name' => 'bouteldja',
                    'code' => 36009,
                ],
                9 => [
                    'name' => 'chebaita mokhtar',
                    'code' => 360010,
                ],
                10 => [
                    'name' => 'chefia',
                    'code' => 36011,
                ],
                11 => [
                    'name' => 'chihani',
                    'code' => 36012,
                ],
                12 => [
                    'name' => 'dréan',
                    'code' => 36013,
                ],
                13 => [
                    'name' => 'echatt',
                    'code' => 36014,
                ],
                14 => [
                    'name' => 'el aioun',
                    'code' => 36015,
                ],
                15 => [
                    'name' => 'el kala',
                    'code' => 36016,
                ],
                16 => [
                    'name' => 'el tarf',
                    'code' => 36017,
                ],
                17 => [
                    'name' => 'hammam beni salah',
                    'code' => 36018,
                ],
                18 => [
                    'name' => 'lac des oiseaux',
                    'code' => 36019,
                ],
                19 => [
                    'name' => 'oued zitoun',
                    'code' => 36020,
                ],
                20 => [
                    'name' => 'raml souk',
                    'code' => 36021,
                ],
                21 => [
                    'name' => 'souarekh',
                    'code' => 36022,
                ],
                22 => [
                    'name' => 'zerizer',
                    'code' => 36023,
                ],
                23 => [
                    'name' => 'zitouna',
                    'code' => 36024,
                ],
            ],
            37 => [
                0 => [
                    'name' => 'oum el assel',
                    'code' => 37001,
                ],
                1 => [
                    'name' => 'tindouf',
                    'code' => 37002,
                ],
            ],
            38 => [
                0 => [
                    'name' => 'ammari',
                    'code' => 38001,
                ],
                1 => [
                    'name' => 'beni chaib',
                    'code' => 38002,
                ],
                2 => [
                    'name' => 'beni lahcene',
                    'code' => 38003,
                ],
                3 => [
                    'name' => 'boucaid',
                    'code' => 38004,
                ],
                4 => [
                    'name' => 'bordj bou naama',
                    'code' => 38005,
                ],
                5 => [
                    'name' => 'bordj el emir abdelkader',
                    'code' => 38006,
                ],
                6 => [
                    'name' => 'khemisti',
                    'code' => 38007,
                ],
                7 => [
                    'name' => 'larbaâ',
                    'code' => 38008,
                ],
                8 => [
                    'name' => 'lardjem',
                    'code' => 38009,
                ],
                9 => [
                    'name' => 'layoune',
                    'code' => 380010,
                ],
                10 => [
                    'name' => 'lazharia',
                    'code' => 38011,
                ],
                11 => [
                    'name' => 'maacem',
                    'code' => 38012,
                ],
                12 => [
                    'name' => 'melaab',
                    'code' => 38013,
                ],
                13 => [
                    'name' => 'ouled bessem',
                    'code' => 38014,
                ],
                14 => [
                    'name' => 'sidi abed',
                    'code' => 38015,
                ],
                15 => [
                    'name' => 'sidi boutouchent',
                    'code' => 38016,
                ],
                16 => [
                    'name' => 'sidi lantri',
                    'code' => 38017,
                ],
                17 => [
                    'name' => 'sidi slimane',
                    'code' => 38018,
                ],
                18 => [
                    'name' => 'tamalaht',
                    'code' => 38019,
                ],
                19 => [
                    'name' => 'theniet el had',
                    'code' => 38020,
                ],
                20 => [
                    'name' => 'tissemsilt',
                    'code' => 38021,
                ],
                21 => [
                    'name' => 'youssoufia',
                    'code' => 38022,
                ],
            ],
            39 => [
                0 => [
                    'name' => 'el oued',
                    'code' => 39001,
                ],
                1 => [
                    'name' => 'robbah',
                    'code' => 39002,
                ],
                2 => [
                    'name' => 'oued el alenda',
                    'code' => 39003,
                ],
                3 => [
                    'name' => 'bayadha',
                    'code' => 39004,
                ],
                4 => [
                    'name' => 'nakhla',
                    'code' => 39005,
                ],
                5 => [
                    'name' => 'guemar',
                    'code' => 39006,
                ],
                6 => [
                    'name' => 'kouinine',
                    'code' => 39007,
                ],
                7 => [
                    'name' => 'reguiba',
                    'code' => 39008,
                ],
                8 => [
                    'name' => 'hamraia',
                    'code' => 39009,
                ],
                9 => [
                    'name' => 'taghzout',
                    'code' => 39010,
                ],
                10 => [
                    'name' => 'debila',
                    'code' => 39011,
                ],
                11 => [
                    'name' => 'hassani abdelkrim',
                    'code' => 39012,
                ],
                12 => [
                    'name' => 'hassi khalifa',
                    'code' => 39013,
                ],
                13 => [
                    'name' => 'taleb larbi',
                    'code' => 39014,
                ],
                14 => [
                    'name' => 'douar el ma',
                    'code' => 39015,
                ],
                15 => [
                    'name' => 'sidi aoun',
                    'code' => 39016,
                ],
                16 => [
                    'name' => 'trifaoui',
                    'code' => 39017,
                ],
                17 => [
                    'name' => 'magrane',
                    'code' => 39018,
                ],
                18 => [
                    'name' => 'beni guecha',
                    'code' => 39019,
                ],
                19 => [
                    'name' => 'ourmas',
                    'code' => 39020,
                ],
                20 => [
                    'name' => 'el ogla',
                    'code' => 39025,
                ],
                21 => [
                    'name' => 'mih ouansa',
                    'code' => 39026,
                ],
            ],
            40 => [
                0 => [
                    'name' => 'aïn touila',
                    'code' => 40001,
                ],
                1 => [
                    'name' => 'babar',
                    'code' => 40002,
                ],
                2 => [
                    'name' => 'baghai',
                    'code' => 40003,
                ],
                3 => [
                    'name' => 'bouhmama',
                    'code' => 40004,
                ],
                4 => [
                    'name' => 'chechar',
                    'code' => 40005,
                ],
                5 => [
                    'name' => 'chelia',
                    'code' => 40006,
                ],
                6 => [
                    'name' => 'djellal',
                    'code' => 40007,
                ],
                7 => [
                    'name' => 'el hamma',
                    'code' => 40008,
                ],
                8 => [
                    'name' => 'el mahmal',
                    'code' => 40009,
                ],
                9 => [
                    'name' => 'el oueldja',
                    'code' => 400010,
                ],
                10 => [
                    'name' => 'ensigha',
                    'code' => 40011,
                ],
                11 => [
                    'name' => 'kais',
                    'code' => 40012,
                ],
                12 => [
                    'name' => 'khenchela',
                    'code' => 40013,
                ],
                13 => [
                    'name' => 'khirane',
                    'code' => 40014,
                ],
                14 => [
                    'name' => 'm\'sara',
                    'code' => 40015,
                ],
                15 => [
                    'name' => 'm\'toussa',
                    'code' => 40016,
                ],
                16 => [
                    'name' => 'ouled rechache',
                    'code' => 40017,
                ],
                17 => [
                    'name' => 'remila',
                    'code' => 40018,
                ],
                18 => [
                    'name' => 'tamza',
                    'code' => 40019,
                ],
                19 => [
                    'name' => 'taouzient',
                    'code' => 40020,
                ],
                20 => [
                    'name' => 'yabous',
                    'code' => 40021,
                ],
            ],
            41 => [
                0 => [
                    'name' => 'souk ahras',
                    'code' => 41001,
                ],
                1 => [
                    'name' => 'sedrata',
                    'code' => 41002,
                ],
                2 => [
                    'name' => 'hanancha',
                    'code' => 41003,
                ],
                3 => [
                    'name' => 'mechroha',
                    'code' => 41004,
                ],
                4 => [
                    'name' => 'ouled driss',
                    'code' => 41005,
                ],
                5 => [
                    'name' => 'tiffech',
                    'code' => 41006,
                ],
                6 => [
                    'name' => 'zaarouria',
                    'code' => 41007,
                ],
                7 => [
                    'name' => 'taoura',
                    'code' => 41008,
                ],
                8 => [
                    'name' => 'dréa',
                    'code' => 41009,
                ],
                9 => [
                    'name' => 'heddada',
                    'code' => 41010,
                ],
                10 => [
                    'name' => 'khedara',
                    'code' => 41011,
                ],
                11 => [
                    'name' => 'merahna',
                    'code' => 41012,
                ],
                12 => [
                    'name' => 'ouled moumene',
                    'code' => 41013,
                ],
                13 => [
                    'name' => 'bir bou haouch',
                    'code' => 41014,
                ],
                14 => [
                    'name' => 'm\'daourouch',
                    'code' => 41015,
                ],
                15 => [
                    'name' => 'oum el adhaim',
                    'code' => 41016,
                ],
                16 => [
                    'name' => 'aïn zana',
                    'code' => 41017,
                ],
                17 => [
                    'name' => 'aïn soltane',
                    'code' => 41018,
                ],
                18 => [
                    'name' => 'ouillen',
                    'code' => 41019,
                ],
                19 => [
                    'name' => 'sidi fredj',
                    'code' => 41020,
                ],
                20 => [
                    'name' => 'safel el ouiden',
                    'code' => 41021,
                ],
                21 => [
                    'name' => 'ragouba',
                    'code' => 41022,
                ],
                22 => [
                    'name' => 'khemissa',
                    'code' => 41023,
                ],
                23 => [
                    'name' => 'oued keberit',
                    'code' => 41024,
                ],
                24 => [
                    'name' => 'terraguelt',
                    'code' => 41025,
                ],
                25 => [
                    'name' => 'zouabi',
                    'code' => 41026,
                ],
            ],
            42 => [
                0 => [
                    'name' => 'tipaza',
                    'code' => 42001,
                ],
                1 => [
                    'name' => 'menaceur',
                    'code' => 42002,
                ],
                2 => [
                    'name' => 'larhat',
                    'code' => 42003,
                ],
                3 => [
                    'name' => 'douaouda',
                    'code' => 42004,
                ],
                4 => [
                    'name' => 'bourkika',
                    'code' => 42005,
                ],
                5 => [
                    'name' => 'khemisti',
                    'code' => 42006,
                ],
                6 => [
                    'name' => 'aghbal',
                    'code' => 42010,
                ],
                7 => [
                    'name' => 'hadjout',
                    'code' => 42012,
                ],
                8 => [
                    'name' => 'sidi amar',
                    'code' => 42013,
                ],
                9 => [
                    'name' => 'gouraya',
                    'code' => 42014,
                ],
                10 => [
                    'name' => 'nador',
                    'code' => 42015,
                ],
                11 => [
                    'name' => 'chaiba',
                    'code' => 42016,
                ],
                12 => [
                    'name' => 'aïn tagourait',
                    'code' => 42017,
                ],
                13 => [
                    'name' => 'cherchell',
                    'code' => 42022,
                ],
                14 => [
                    'name' => 'damous',
                    'code' => 42023,
                ],
                15 => [
                    'name' => 'merad',
                    'code' => 42024,
                ],
                16 => [
                    'name' => 'fouka',
                    'code' => 42025,
                ],
                17 => [
                    'name' => 'bou ismaïl',
                    'code' => 42026,
                ],
                18 => [
                    'name' => 'ahmar el aïn',
                    'code' => 42027,
                ],
                19 => [
                    'name' => 'bouharoun',
                    'code' => 42030,
                ],
                20 => [
                    'name' => 'sidi ghiles',
                    'code' => 42032,
                ],
                21 => [
                    'name' => 'messelmoun',
                    'code' => 42033,
                ],
                22 => [
                    'name' => 'sidi rached',
                    'code' => 42034,
                ],
                23 => [
                    'name' => 'koléa',
                    'code' => 42035,
                ],
                24 => [
                    'name' => 'attatba',
                    'code' => 42036,
                ],
                25 => [
                    'name' => 'sidi semiane',
                    'code' => 42040,
                ],
                26 => [
                    'name' => 'beni milleuk',
                    'code' => 42041,
                ],
                27 => [
                    'name' => 'hadjeret ennous',
                    'code' => 42042,
                ],
            ],
            43 => [
                0 => [
                    'name' => 'ahmed rachedi',
                    'code' => 43001,
                ],
                1 => [
                    'name' => 'aïn beida harriche',
                    'code' => 43002,
                ],
                2 => [
                    'name' => 'aïn mellouk',
                    'code' => 43003,
                ],
                3 => [
                    'name' => 'aïn tine',
                    'code' => 43004,
                ],
                4 => [
                    'name' => 'amira arrès',
                    'code' => 43005,
                ],
                5 => [
                    'name' => 'benyahia abderrahmane',
                    'code' => 43006,
                ],
                6 => [
                    'name' => 'bouhatem',
                    'code' => 43007,
                ],
                7 => [
                    'name' => 'chelghoum laid',
                    'code' => 43008,
                ],
                8 => [
                    'name' => 'chigara',
                    'code' => 43009,
                ],
                9 => [
                    'name' => 'derradji bousselah',
                    'code' => 430010,
                ],
                10 => [
                    'name' => 'el mechira',
                    'code' => 43011,
                ],
                11 => [
                    'name' => 'elayadi barbes',
                    'code' => 43012,
                ],
                12 => [
                    'name' => 'ferdjioua',
                    'code' => 43013,
                ],
                13 => [
                    'name' => 'grarem gouga',
                    'code' => 43014,
                ],
                14 => [
                    'name' => 'hamala',
                    'code' => 43015,
                ],
                15 => [
                    'name' => 'mila',
                    'code' => 43016,
                ],
                16 => [
                    'name' => 'minar zarza',
                    'code' => 43017,
                ],
                17 => [
                    'name' => 'oued athmania',
                    'code' => 43018,
                ],
                18 => [
                    'name' => 'oued endja',
                    'code' => 43019,
                ],
                19 => [
                    'name' => 'oued seguen',
                    'code' => 43020,
                ],
                20 => [
                    'name' => 'ouled khalouf',
                    'code' => 43021,
                ],
                21 => [
                    'name' => 'rouached',
                    'code' => 43022,
                ],
                22 => [
                    'name' => 'sidi khelifa',
                    'code' => 43023,
                ],
                23 => [
                    'name' => 'sidi merouane',
                    'code' => 43024,
                ],
                24 => [
                    'name' => 'tadjenanet',
                    'code' => 43025,
                ],
                25 => [
                    'name' => 'tassadane haddada',
                    'code' => 43026,
                ],
                26 => [
                    'name' => 'teleghma',
                    'code' => 43027,
                ],
                27 => [
                    'name' => 'terrai bainen',
                    'code' => 43028,
                ],
                28 => [
                    'name' => 'tessala lemtaï',
                    'code' => 43029,
                ],
                29 => [
                    'name' => 'tiberguent',
                    'code' => 43030,
                ],
                30 => [
                    'name' => 'yahia beni guecha',
                    'code' => 43031,
                ],
                31 => [
                    'name' => 'zeghaia',
                    'code' => 43032,
                ],
            ],
            44 => [
                0 => [
                    'name' => 'aïn beniane',
                    'code' => 44001,
                ],
                1 => [
                    'name' => 'aïn bouyahia',
                    'code' => 44002,
                ],
                2 => [
                    'name' => 'aïn defla',
                    'code' => 44003,
                ],
                3 => [
                    'name' => 'aïn lechiekh',
                    'code' => 44004,
                ],
                4 => [
                    'name' => 'aïn soltane',
                    'code' => 44005,
                ],
                5 => [
                    'name' => 'aïn torki',
                    'code' => 44006,
                ],
                6 => [
                    'name' => 'arib',
                    'code' => 44007,
                ],
                7 => [
                    'name' => 'bathia',
                    'code' => 44008,
                ],
                8 => [
                    'name' => 'belaas',
                    'code' => 44009,
                ],
                9 => [
                    'name' => 'ben allal',
                    'code' => 440010,
                ],
                10 => [
                    'name' => 'birbouche',
                    'code' => 44011,
                ],
                11 => [
                    'name' => 'bir ould khelifa',
                    'code' => 44012,
                ],
                12 => [
                    'name' => 'bordj emir khaled',
                    'code' => 44013,
                ],
                13 => [
                    'name' => 'boumedfaa',
                    'code' => 44014,
                ],
                14 => [
                    'name' => 'bourached',
                    'code' => 44015,
                ],
                15 => [
                    'name' => 'djelida',
                    'code' => 44016,
                ],
                16 => [
                    'name' => 'djemaa ouled cheikh',
                    'code' => 44017,
                ],
                17 => [
                    'name' => 'djendel',
                    'code' => 44018,
                ],
                18 => [
                    'name' => 'el abadia',
                    'code' => 44019,
                ],
                19 => [
                    'name' => 'el amra',
                    'code' => 44020,
                ],
                20 => [
                    'name' => 'el attaf',
                    'code' => 44021,
                ],
                21 => [
                    'name' => 'el hassania',
                    'code' => 44022,
                ],
                22 => [
                    'name' => 'el maine',
                    'code' => 44023,
                ],
                23 => [
                    'name' => 'hammam righa',
                    'code' => 44024,
                ],
                24 => [
                    'name' => 'hoceinia',
                    'code' => 44025,
                ],
                25 => [
                    'name' => 'khemis miliana',
                    'code' => 44026,
                ],
                26 => [
                    'name' => 'mekhatria',
                    'code' => 44027,
                ],
                27 => [
                    'name' => 'miliana',
                    'code' => 44028,
                ],
                28 => [
                    'name' => 'oued chorfa',
                    'code' => 44029,
                ],
                29 => [
                    'name' => 'oued djemaa',
                    'code' => 44030,
                ],
                30 => [
                    'name' => 'rouina',
                    'code' => 44031,
                ],
                31 => [
                    'name' => 'sidi lakhdar',
                    'code' => 44032,
                ],
                32 => [
                    'name' => 'tacheta zougagha',
                    'code' => 44033,
                ],
                33 => [
                    'name' => 'tarik ibn ziad',
                    'code' => 44034,
                ],
                34 => [
                    'name' => 'tiberkanine',
                    'code' => 44035,
                ],
                35 => [
                    'name' => 'zeddine',
                    'code' => 44036,
                ],
            ],
            45 => [
                0 => [
                    'name' => 'naâma',
                    'code' => 45001,
                ],
                1 => [
                    'name' => 'mecheria',
                    'code' => 45002,
                ],
                2 => [
                    'name' => 'aïn sefra',
                    'code' => 45003,
                ],
                3 => [
                    'name' => 'tiout',
                    'code' => 45004,
                ],
                4 => [
                    'name' => 'sfissifa',
                    'code' => 45005,
                ],
                5 => [
                    'name' => 'moghrar',
                    'code' => 45006,
                ],
                6 => [
                    'name' => 'assela',
                    'code' => 45007,
                ],
                7 => [
                    'name' => 'djeniene bourezg',
                    'code' => 45008,
                ],
                8 => [
                    'name' => 'aïn ben khelil',
                    'code' => 45009,
                ],
                9 => [
                    'name' => 'makman ben amer',
                    'code' => 450010,
                ],
                10 => [
                    'name' => 'kasdir',
                    'code' => 45011,
                ],
                11 => [
                    'name' => 'el biod',
                    'code' => 45012,
                ],
            ],
            46 => [
                0 => [
                    'name' => 'aghlal',
                    'code' => 46001,
                ],
                1 => [
                    'name' => 'aïn el arbaa',
                    'code' => 46002,
                ],
                2 => [
                    'name' => 'aïn kihal',
                    'code' => 46003,
                ],
                3 => [
                    'name' => 'aïn témouchent',
                    'code' => 46004,
                ],
                4 => [
                    'name' => 'aïn tolba',
                    'code' => 46005,
                ],
                5 => [
                    'name' => 'aoubellil',
                    'code' => 46006,
                ],
                6 => [
                    'name' => 'beni saf',
                    'code' => 46007,
                ],
                7 => [
                    'name' => 'bouzedjar',
                    'code' => 46008,
                ],
                8 => [
                    'name' => 'chaabat el leham',
                    'code' => 46009,
                ],
                9 => [
                    'name' => 'chentouf',
                    'code' => 460010,
                ],
                10 => [
                    'name' => 'el amria',
                    'code' => 46011,
                ],
                11 => [
                    'name' => 'el emir abdelkader',
                    'code' => 46012,
                ],
                12 => [
                    'name' => 'el malah',
                    'code' => 46013,
                ],
                13 => [
                    'name' => 'el messaid',
                    'code' => 46014,
                ],
                14 => [
                    'name' => 'hammam bouhadjar',
                    'code' => 46015,
                ],
                15 => [
                    'name' => 'hassasna',
                    'code' => 46016,
                ],
                16 => [
                    'name' => 'hassi el ghella',
                    'code' => 46017,
                ],
                17 => [
                    'name' => 'oued berkeche',
                    'code' => 46018,
                ],
                18 => [
                    'name' => 'oued sabah',
                    'code' => 46019,
                ],
                19 => [
                    'name' => 'ouled boudjemaa',
                    'code' => 46020,
                ],
                20 => [
                    'name' => 'ouled kihal',
                    'code' => 46021,
                ],
                21 => [
                    'name' => 'oulhaça el gheraba',
                    'code' => 46022,
                ],
                22 => [
                    'name' => 'sidi ben adda',
                    'code' => 46023,
                ],
                23 => [
                    'name' => 'sidi boumedienne',
                    'code' => 46024,
                ],
                24 => [
                    'name' => 'sidi ouriache',
                    'code' => 46025,
                ],
                25 => [
                    'name' => 'sidi safi',
                    'code' => 46026,
                ],
                26 => [
                    'name' => 'tamzoura',
                    'code' => 46027,
                ],
                27 => [
                    'name' => 'terga',
                    'code' => 46028,
                ],
            ],
            47 => [
                0 => [
                    'name' => 'berriane',
                    'code' => 47001,
                ],
                1 => [
                    'name' => 'bounoura',
                    'code' => 47002,
                ],
                2 => [
                    'name' => 'dhayet bendhahoua',
                    'code' => 47003,
                ],
                3 => [
                    'name' => 'el atteuf',
                    'code' => 47004,
                ],
                4 => [
                    'name' => 'el guerrara',
                    'code' => 47005,
                ],
                5 => [
                    'name' => 'ghardaïa',
                    'code' => 47006,
                ],
                6 => [
                    'name' => 'mansoura',
                    'code' => 47007,
                ],
                7 => [
                    'name' => 'metlili',
                    'code' => 47008,
                ],
                8 => [
                    'name' => 'sebseb',
                    'code' => 47009,
                ],
                9 => [
                    'name' => 'zelfana',
                    'code' => 470010,
                ],
            ],
            48 => [
                0 => [
                    'name' => 'aïn rahma',
                    'code' => 48001,
                ],
                1 => [
                    'name' => 'aïn tarek',
                    'code' => 48002,
                ],
                2 => [
                    'name' => '‘aarch meknassa',
                    'code' => 48003,
                ],
                3 => [
                    'name' => 'ammi moussa',
                    'code' => 48004,
                ],
                4 => [
                    'name' => 'belassel bouzegza',
                    'code' => 48005,
                ],
                5 => [
                    'name' => 'bendaoud',
                    'code' => 48006,
                ],
                6 => [
                    'name' => 'beni dergoun',
                    'code' => 48007,
                ],
                7 => [
                    'name' => 'beni zentis',
                    'code' => 48008,
                ],
                8 => [
                    'name' => 'dar ben abdellah',
                    'code' => 48009,
                ],
                9 => [
                    'name' => 'djidioua',
                    'code' => 480010,
                ],
                10 => [
                    'name' => 'el guettar',
                    'code' => 48011,
                ],
                11 => [
                    'name' => 'el hamadna',
                    'code' => 48012,
                ],
                12 => [
                    'name' => 'el hassi',
                    'code' => 48013,
                ],
                13 => [
                    'name' => 'el matmar',
                    'code' => 48014,
                ],
                14 => [
                    'name' => 'el ouldja',
                    'code' => 48015,
                ],
                15 => [
                    'name' => 'had echkalla',
                    'code' => 48016,
                ],
                16 => [
                    'name' => 'hamri',
                    'code' => 48017,
                ],
                17 => [
                    'name' => 'kalaa',
                    'code' => 48018,
                ],
                18 => [
                    'name' => 'lahlef',
                    'code' => 48019,
                ],
                19 => [
                    'name' => 'mazouna',
                    'code' => 48020,
                ],
                20 => [
                    'name' => 'mediouna',
                    'code' => 48021,
                ],
                21 => [
                    'name' => 'mendes',
                    'code' => 48022,
                ],
                22 => [
                    'name' => 'merdja sidi abed',
                    'code' => 48023,
                ],
                23 => [
                    'name' => 'ouarizane',
                    'code' => 48024,
                ],
                24 => [
                    'name' => 'oued essalem',
                    'code' => 48025,
                ],
                25 => [
                    'name' => 'oued rhiou',
                    'code' => 48026,
                ],
                26 => [
                    'name' => 'ouled aiche',
                    'code' => 48027,
                ],
                27 => [
                    'name' => 'oued el djemaa',
                    'code' => 48028,
                ],
                28 => [
                    'name' => 'ouled sidi mihoub',
                    'code' => 48029,
                ],
                29 => [
                    'name' => 'ramka',
                    'code' => 48030,
                ],
                30 => [
                    'name' => 'relizane',
                    'code' => 48031,
                ],
                31 => [
                    'name' => 'sidi khettab',
                    'code' => 48032,
                ],
                32 => [
                    'name' => 'sidi lazreg',
                    'code' => 48033,
                ],
                33 => [
                    'name' => 'sidi m\'hamed ben ali',
                    'code' => 48034,
                ],
                34 => [
                    'name' => 'sidi m\'hamed benaouda',
                    'code' => 48035,
                ],
                35 => [
                    'name' => 'sidi saada',
                    'code' => 48036,
                ],
                36 => [
                    'name' => 'souk el had',
                    'code' => 48037,
                ],
                37 => [
                    'name' => 'yellel',
                    'code' => 48038,
                ],
                38 => [
                    'name' => 'zemmora',
                    'code' => 48039,
                ],
            ],
        ];

        foreach ($townsByWilaya as $wilaya_id => $towns) {
            foreach ($towns as $town) {
                $townEntry = array_merge(['wilaya_id' => (int)$wilaya_id, "protected" => true], $town);
                Town::create($townEntry);
            }
        }

        //
    }
}
