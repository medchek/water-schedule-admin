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
                    'ar_name' => 'أدرار',
                    'code' => '1001',
                ],
                1 => [
                    'name' => 'tamest',
                    'ar_name' => 'تامست',
                    'code' => '1002',
                ],
                2 => [
                    'name' => 'charouine',
                    'ar_name' => 'شروين',
                    'code' => '1003',
                ],
                3 => [
                    'name' => 'reggane',
                    'ar_name' => 'رقان',
                    'code' => '1004',
                ],
                4 => [
                    'name' => 'in zghmir',
                    'ar_name' => 'ان زقمير',
                    'code' => '1005',
                ],
                5 => [
                    'name' => 'tit',
                    'ar_name' => 'تيط',
                    'code' => '1006',
                ],
                6 => [
                    'name' => 'ksar kaddour',
                    'ar_name' => 'قصر قدور',
                    'code' => '1007',
                ],
                7 => [
                    'name' => 'tsabit',
                    'ar_name' => 'تسابيت',
                    'code' => '1008',
                ],
                8 => [
                    'name' => 'timimoun',
                    'ar_name' => 'تيميمون',
                    'code' => '1009',
                ],
                9 => [
                    'name' => 'ouled saïd',
                    'ar_name' => 'أوالد السعيد',
                    'code' => '1010',
                ],
                10 => [
                    'name' => 'zaouiet kounta',
                    'ar_name' => 'زاوية كنتة',
                    'code' => '1011',
                ],
                11 => [
                    'name' => 'aoulef',
                    'ar_name' => 'أولف',
                    'code' => '1012',
                ],
                12 => [
                    'name' => 'tamekten',
                    'ar_name' => 'تمقطن',
                    'code' => '1013',
                ],
                13 => [
                    'name' => 'tamantit',
                    'ar_name' => 'تمنطيط',
                    'code' => '1014',
                ],
                14 => [
                    'name' => 'fenoughil',
                    'ar_name' => 'فنوغيل',
                    'code' => '1015',
                ],
                15 => [
                    'name' => 'tinerkouk',
                    'ar_name' => 'تينركوك',
                    'code' => '1016',
                ],
                16 => [
                    'name' => 'deldoul',
                    'ar_name' => 'دلدول',
                    'code' => '1017',
                ],
                17 => [
                    'name' => 'sali',
                    'ar_name' => 'سالى',
                    'code' => '1018',
                ],
                18 => [
                    'name' => 'akabli',
                    'ar_name' => 'أقبلى',
                    'code' => '1019',
                ],
                19 => [
                    'name' => 'metarfa',
                    'ar_name' => 'الطارفة',
                    'code' => '1020',
                ],
                20 => [
                    'name' => 'ouled ahmed tammi',
                    'ar_name' => 'أوالد أحمد تيمى',
                    'code' => '1021',
                ],
                21 => [
                    'name' => 'bouda',
                    'ar_name' => 'بودة',
                    'code' => '1022',
                ],
                22 => [
                    'name' => 'aougrout',
                    'ar_name' => 'أوقروت',
                    'code' => '1023',
                ],
                23 => [
                    'name' => 'talmine',
                    'ar_name' => 'طلمين',
                    'code' => '1024',
                ],
                24 => [
                    'name' => 'sebaa',
                    'ar_name' => 'السبع',
                    'code' => '1025',
                ],
                25 => [
                    'name' => 'ouled aïssa',
                    'ar_name' => 'أوالد عيسى',
                    'code' => '1026',
                ],
                26 => [
                    'name' => 'timiaouine',
                    'ar_name' => 'تيمياوين',
                    'code' => '1027',
                ],
            ],
            2 => [
                0 => [
                    'name' => 'chlef',
                    'ar_name' => 'الشلف',
                    'code' => '2001',
                ],
                1 => [
                    'name' => 'ténès',
                    'ar_name' => 'تنس',
                    'code' => '2002',
                ],
                2 => [
                    'name' => 'bénairia',
                    'ar_name' => 'بنايرية',
                    'code' => '2003',
                ],
                3 => [
                    'name' => 'el karimia',
                    'ar_name' => 'الكريمية',
                    'code' => '2004',
                ],
                4 => [
                    'name' => 'tadjena',
                    'ar_name' => 'تأجنة',
                    'code' => '2005',
                ],
                5 => [
                    'name' => 'taougrite',
                    'ar_name' => 'تاوقريت',
                    'code' => '2006',
                ],
                6 => [
                    'name' => 'beni haoua',
                    'ar_name' => 'بنى حواء',
                    'code' => '2007',
                ],
                7 => [
                    'name' => 'sobha',
                    'ar_name' => 'صبحة',
                    'code' => '2008',
                ],
                8 => [
                    'name' => 'harchoun',
                    'ar_name' => 'حرشون',
                    'code' => '2009',
                ],
                9 => [
                    'name' => 'ouled fares',
                    'ar_name' => 'أولاد فارس',
                    'code' => '2010',
                ],
                10 => [
                    'name' => 'sidi akkacha',
                    'ar_name' => 'سيدى عكاشة',
                    'code' => '2011',
                ],
                11 => [
                    'name' => 'boukadir',
                    'ar_name' => 'بوقادير',
                    'code' => '2012',
                ],
                12 => [
                    'name' => 'beni rached',
                    'ar_name' => 'بنى راشد',
                    'code' => '2013',
                ],
                13 => [
                    'name' => 'talassa',
                    'ar_name' => 'تلعصة',
                    'code' => '2014',
                ],
                14 => [
                    'name' => 'harenfa',
                    'ar_name' => 'الھرنفة',
                    'code' => '2015',
                ],
                15 => [
                    'name' => 'oued goussine',
                    'ar_name' => 'وادى قوسين',
                    'code' => '2016',
                ],
                16 => [
                    'name' => 'dahra',
                    'ar_name' => 'الظھرة',
                    'code' => '2017',
                ],
                17 => [
                    'name' => 'ouled abbes',
                    'ar_name' => 'أولاد عباس',
                    'code' => '2018',
                ],
                18 => [
                    'name' => 'sendjas',
                    'ar_name' => 'السنجاس',
                    'code' => '2019',
                ],
                19 => [
                    'name' => 'zeboudja',
                    'ar_name' => 'الزبوجة',
                    'code' => '2020',
                ],
                20 => [
                    'name' => 'oued sly',
                    'ar_name' => 'وادى سلى',
                    'code' => '2021',
                ],
                21 => [
                    'name' => 'abou el hassan',
                    'ar_name' => 'أبو الحسن',
                    'code' => '2022',
                ],
                22 => [
                    'name' => 'el marsa',
                    'ar_name' => 'المرسى',
                    'code' => '2023',
                ],
                23 => [
                    'name' => 'chettia',
                    'ar_name' => 'الشطية',
                    'code' => '2024',
                ],
                24 => [
                    'name' => 'sidi abderrahmane',
                    'ar_name' => 'سيدي عبد الرحمان',
                    'code' => '2025',
                ],
                25 => [
                    'name' => 'moussadek',
                    'ar_name' => 'مصدق',
                    'code' => '2026',
                ],
                26 => [
                    'name' => 'el hadjadj',
                    'ar_name' => 'الحجاج',
                    'code' => '2027',
                ],
                27 => [
                    'name' => 'labiod medjadja',
                    'ar_name' => 'الابيض مجاجة',
                    'code' => '2028',
                ],
                28 => [
                    'name' => 'oued fodda',
                    'ar_name' => 'وادى الفضة',
                    'code' => '2029',
                ],
                29 => [
                    'name' => 'ouled ben abdelkader',
                    'ar_name' => 'أولاد بن عبد القادر',
                    'code' => '2030',
                ],
                30 => [
                    'name' => 'bouzeghaia',
                    'ar_name' => 'بوزغاية',
                    'code' => '2031',
                ],
                31 => [
                    'name' => 'aïn merane',
                    'ar_name' => 'عين مران',
                    'code' => '2032',
                ],
                32 => [
                    'name' => 'oum drou',
                    'ar_name' => 'أم الذروع',
                    'code' => '2033',
                ],
                33 => [
                    'name' => 'breira',
                    'ar_name' => 'بريرة',
                    'code' => '2034',
                ],
                34 => [
                    'name' => 'beni bouateb',
                    'ar_name' => 'بنى بوعتاب',
                    'code' => '2035',
                ],
            ],
            3 => [
                0 => [
                    'name' => 'laghouat',
                    'ar_name' => 'الأغواط',
                    'code' => '3001',
                ],
                1 => [
                    'name' => 'ksar el hirane',
                    'ar_name' => 'قصر الحيران',
                    'code' => '3002',
                ],
                2 => [
                    'name' => 'bennasser benchohra',
                    'ar_name' => 'بن ناصر بن شهرة',
                    'code' => '3003',
                ],
                3 => [
                    'name' => 'sidi makhlouf',
                    'ar_name' => 'سيدي مخلوف',
                    'code' => '3004',
                ],
                4 => [
                    'name' => 'hassi delaa',
                    'ar_name' => 'حاسي دلاعة',
                    'code' => '3005',
                ],
                5 => [
                    'name' => 'hassi r\'mel',
                    'ar_name' => 'حاسي الرمل',
                    'code' => '3006',
                ],
                6 => [
                    'name' => 'aïn madhi',
                    'ar_name' => 'عين ماضي',
                    'code' => '3007',
                ],
                7 => [
                    'name' => 'tadjemout',
                    'ar_name' => 'تاجموت',
                    'code' => '3008',
                ],
                8 => [
                    'name' => 'kheneg',
                    'ar_name' => 'الخنق',
                    'code' => '3009',
                ],
                9 => [
                    'name' => 'gueltat sidi saad',
                    'ar_name' => 'قلتة سيدي سعد',
                    'code' => '3010',
                ],
                10 => [
                    'name' => 'aïn sidi ali',
                    'ar_name' => 'عين سيدي علي',
                    'code' => '3011',
                ],
                11 => [
                    'name' => 'beidha',
                    'ar_name' => 'البيضاء',
                    'code' => '3012',
                ],
                12 => [
                    'name' => 'brida',
                    'ar_name' => 'بريدة',
                    'code' => '3013',
                ],
                13 => [
                    'name' => 'el ghicha',
                    'ar_name' => 'الغيشة',
                    'code' => '3014',
                ],
                14 => [
                    'name' => 'hadj mechri',
                    'ar_name' => 'الحاج المشري',
                    'code' => '3015',
                ],
                15 => [
                    'name' => 'sebgag',
                    'ar_name' => 'سبقاق',
                    'code' => '3016',
                ],
                16 => [
                    'name' => 'taouiala',
                    'ar_name' => 'تاويالة',
                    'code' => '3017',
                ],
                17 => [
                    'name' => 'tadjrouna',
                    'ar_name' => 'تاجرونة',
                    'code' => '3018',
                ],
                18 => [
                    'name' => 'aflou',
                    'ar_name' => 'آفلو',
                    'code' => '3019',
                ],
                19 => [
                    'name' => 'el assafia',
                    'ar_name' => 'العسافية',
                    'code' => '3020',
                ],
                20 => [
                    'name' => 'oued morra',
                    'ar_name' => 'وادي مرة',
                    'code' => '3021',
                ],
                21 => [
                    'name' => 'oued m\'zi',
                    'ar_name' => 'وادي مزي',
                    'code' => '3022',
                ],
                22 => [
                    'name' => 'el houaita',
                    'ar_name' => 'الحوايطة',
                    'code' => '3023',
                ],
                23 => [
                    'name' => 'sidi bouzid',
                    'ar_name' => 'سيدي بوزيد',
                    'code' => '3024',
                ],
            ],
            4 => [
                0 => [
                    'name' => 'oum el bouaghi',
                    'ar_name' => 'أم البواقي',
                    'code' => '4001',
                ],
                1 => [
                    'name' => 'aïn beïda',
                    'ar_name' => 'عين البيضاء',
                    'code' => '4002',
                ],
                2 => [
                    'name' => 'aïn m\'lila',
                    'ar_name' => 'عين مليلة',
                    'code' => '4003',
                ],
                3 => [
                    'name' => 'behir chergui',
                    'ar_name' => 'بحير شرقي',
                    'code' => '4004',
                ],
                4 => [
                    'name' => 'el amiria',
                    'ar_name' => 'العامرية',
                    'code' => '4005',
                ],
                5 => [
                    'name' => 'sigus',
                    'ar_name' => 'سيقوس',
                    'code' => '4006',
                ],
                6 => [
                    'name' => 'el belala',
                    'ar_name' => 'البلالة',
                    'code' => '4007',
                ],
                7 => [
                    'name' => 'aïn babouche',
                    'ar_name' => 'عين بابوش',
                    'code' => '4008',
                ],
                8 => [
                    'name' => 'berriche',
                    'ar_name' => 'بريش',
                    'code' => '4009',
                ],
                9 => [
                    'name' => 'ouled hamla',
                    'ar_name' => 'أولاد حملة',
                    'code' => '4010',
                ],
                10 => [
                    'name' => 'dhalaa',
                    'ar_name' => 'الضلعة',
                    'code' => '4011',
                ],
                11 => [
                    'name' => 'aïn kercha',
                    'ar_name' => 'عين كرشة',
                    'code' => '4012',
                ],
                12 => [
                    'name' => 'hanchir toumghani',
                    'ar_name' => 'هنشير تومغني',
                    'code' => '4013',
                ],
                13 => [
                    'name' => 'el djazia',
                    'ar_name' => 'الجازية',
                    'code' => '4014',
                ],
                14 => [
                    'name' => 'aïn diss',
                    'ar_name' => 'عين الديس',
                    'code' => '4015',
                ],
                15 => [
                    'name' => 'fkirina',
                    'ar_name' => 'فكرينة',
                    'code' => '4016',
                ],
                16 => [
                    'name' => 'souk naamane',
                    'ar_name' => 'سوق نعمان',
                    'code' => '4017',
                ],
                17 => [
                    'name' => 'zorg',
                    'ar_name' => 'الزرق',
                    'code' => '4018',
                ],
                18 => [
                    'name' => 'el fedjoudj boughrara saoudi',
                    'ar_name' => 'الفجوج بوغرارة سعودي',
                    'code' => '4019',
                ],
                19 => [
                    'name' => 'ouled zouaï',
                    'ar_name' => 'أولاد زواي',
                    'code' => '4020',
                ],
                20 => [
                    'name' => 'bir chouhada',
                    'ar_name' => 'بئر الشهداء',
                    'code' => '4021',
                ],
                21 => [
                    'name' => 'ksar sbahi',
                    'ar_name' => 'قصر صباحي',
                    'code' => '4022',
                ],
                22 => [
                    'name' => 'oued nini',
                    'ar_name' => 'وادي نيني',
                    'code' => '4023',
                ],
                23 => [
                    'name' => 'meskiana',
                    'ar_name' => 'مسكيانة',
                    'code' => '4024',
                ],
                24 => [
                    'name' => 'aïn fakroun',
                    'ar_name' => 'عين فكرون',
                    'code' => '4025',
                ],
                25 => [
                    'name' => 'rahia',
                    'ar_name' => 'الراحية',
                    'code' => '4026',
                ],
                26 => [
                    'name' => 'aïn zitoun',
                    'ar_name' => 'عين الزيتون',
                    'code' => '4027',
                ],
                27 => [
                    'name' => 'ouled gacem',
                    'ar_name' => 'أولاد قاسم',
                    'code' => '4028',
                ],
                28 => [
                    'name' => 'el harmilia',
                    'ar_name' => 'الحرميلية',
                    'code' => '4029',
                ],
            ],
            5 => [
                0 => [
                    'name' => 'aïn djasser',
                    'ar_name' => 'عين جاسر',
                    'code' => '5001',
                ],
                1 => [
                    'name' => 'aïn touta',
                    'ar_name' => 'عين التوتة',
                    'code' => '5002',
                ],
                2 => [
                    'name' => 'aïn yagout',
                    'ar_name' => 'عين ياقوت',
                    'code' => '5003',
                ],
                3 => [
                    'name' => 'amantan',
                    'ar_name' => 'أمنطان',
                    'code' => '5004',
                ],
                4 => [
                    'name' => 'amdoukal',
                    'ar_name' => 'أمدوكال',
                    'code' => '5005',
                ],
                5 => [
                    'name' => 'arris',
                    'ar_name' => 'آريس',
                    'code' => '5006',
                ],
                6 => [
                    'name' => 'ngaous',
                    'ar_name' => 'نقاوس',
                    'code' => '5007',
                ],
                7 => [
                    'name' => 'batna',
                    'ar_name' => 'باتنة',
                    'code' => '5008',
                ],
                8 => [
                    'name' => 'ben foudhala el hakania',
                    'ar_name' => 'بني فضالة الحقانية',
                    'code' => '5009',
                ],
                9 => [
                    'name' => 'bitam',
                    'ar_name' => 'بيطام',
                    'code' => '5010',
                ],
                10 => [
                    'name' => 'boulhilat',
                    'ar_name' => 'بولهيلات',
                    'code' => '5011',
                ],
                11 => [
                    'name' => 'boumagueur',
                    'ar_name' => 'بومقر',
                    'code' => '5012',
                ],
                12 => [
                    'name' => 'boumia',
                    'ar_name' => 'بومية',
                    'code' => '5013',
                ],
                13 => [
                    'name' => 'bouzina',
                    'ar_name' => 'بوزينة',
                    'code' => '5014',
                ],
                14 => [
                    'name' => 'djerma',
                    'ar_name' => 'جرمة ',
                    'code' => '5015',
                ],
                15 => [
                    'name' => 'djezzar',
                    'ar_name' => 'الجزار',
                    'code' => '5016',
                ],
                16 => [
                    'name' => 'el hassi',
                    'ar_name' => 'الحاسي',
                    'code' => '5017',
                ],
                17 => [
                    'name' => 'el madher',
                    'ar_name' => 'المعذر',
                    'code' => '5018',
                ],
                18 => [
                    'name' => 'fesdis',
                    'ar_name' => 'فسديس',
                    'code' => '5019',
                ],
                19 => [
                    'name' => 'foum toub',
                    'ar_name' => 'فم الطوب',
                    'code' => '5020',
                ],
                20 => [
                    'name' => 'ghassira',
                    'ar_name' => 'غسيرة',
                    'code' => '5021',
                ],
                21 => [
                    'name' => 'chemora',
                    'ar_name' => 'الشمرة',
                    'code' => '5022',
                ],
                22 => [
                    'name' => 'gosbat',
                    'ar_name' => 'القصبات',
                    'code' => '5023',
                ],
                23 => [
                    'name' => 'guigba',
                    'ar_name' => 'القيقبة',
                    'code' => '5024',
                ],
                24 => [
                    'name' => 'hidoussa',
                    'ar_name' => 'حيدوسة',
                    'code' => '5025',
                ],
                25 => [
                    'name' => 'ichmoul',
                    'ar_name' => 'إشمول',
                    'code' => '5026',
                ],
                26 => [
                    'name' => 'inoughissen',
                    'ar_name' => 'إينوغيسن',
                    'code' => '5027',
                ],
                27 => [
                    'name' => 'kimmel',
                    'ar_name' => 'كيمل',
                    'code' => '5028',
                ],
                28 => [
                    'name' => 'ksar bellezma',
                    'ar_name' => 'قصر بلزمة',
                    'code' => '5029',
                ],
                29 => [
                    'name' => 'larbaâ',
                    'ar_name' => 'لارباع',
                    'code' => '5030',
                ],
                30 => [
                    'name' => 'lazrou',
                    'ar_name' => 'لازرو',
                    'code' => '5031',
                ],
                31 => [
                    'name' => 'lemsane',
                    'ar_name' => 'لمسان',
                    'code' => '5032',
                ],
                32 => [
                    'name' => 'mâafa',
                    'ar_name' => 'معافة',
                    'code' => '5033',
                ],
                33 => [
                    'name' => 'menâa',
                    'ar_name' => 'منعة',
                    'code' => '5034',
                ],
                34 => [
                    'name' => 'merouana',
                    'ar_name' => 'مروانة',
                    'code' => '5035',
                ],
                35 => [
                    'name' => 'metkaouak',
                    'ar_name' => 'متكعوك',
                    'code' => '5036',
                ],
                36 => [
                    'name' => 'n\'gaous',
                    'ar_name' => 'نقاوس',
                    'code' => '5037',
                ],
                37 => [
                    'name' => 'chir',
                    'ar_name' => 'شير',
                    'code' => '5038',
                ],
                38 => [
                    'name' => 'oued chaâba',
                    'ar_name' => 'وادي الشعبة',
                    'code' => '5039',
                ],
                39 => [
                    'name' => 'oued el ma',
                    'ar_name' => 'وادي الماء',
                    'code' => '5040',
                ],
                40 => [
                    'name' => 'oued taga',
                    'ar_name' => 'وادي الطاقة',
                    'code' => '5041',
                ],
                41 => [
                    'name' => 'ouled ammar',
                    'ar_name' => 'أولاد عمار',
                    'code' => '5042',
                ],
                42 => [
                    'name' => 'ouled aouf',
                    'ar_name' => 'أولاد عوف',
                    'code' => '5043',
                ],
                43 => [
                    'name' => 'ouled fadel',
                    'ar_name' => 'أولاد فاضل',
                    'code' => '5044',
                ],
                44 => [
                    'name' => 'ouled sellam',
                    'ar_name' => 'أولاد سلام',
                    'code' => '5045',
                ],
                45 => [
                    'name' => 'ouled si slimane',
                    'ar_name' => 'أولاد سي سليمان',
                    'code' => '5046',
                ],
                46 => [
                    'name' => 'ouyoun el assafir',
                    'ar_name' => 'عيون العصافير',
                    'code' => '5047',
                ],
                47 => [
                    'name' => 'rahbat',
                    'ar_name' => 'الرحبات',
                    'code' => '5048',
                ],
                48 => [
                    'name' => 'ras el aioun',
                    'ar_name' => 'رأس العيون',
                    'code' => '5049',
                ],
                49 => [
                    'name' => 'sefiane',
                    'ar_name' => 'سفيان',
                    'code' => '5050',
                ],
                50 => [
                    'name' => 'seggana',
                    'ar_name' => 'سقانة',
                    'code' => '5051',
                ],
                51 => [
                    'name' => 'seriana',
                    'ar_name' => 'سريانة',
                    'code' => '5052',
                ],
                52 => [
                    'name' => 'talkhamt',
                    'ar_name' => 'تالخمت',
                    'code' => '5053',
                ],
                53 => [
                    'name' => 'taxlent',
                    'ar_name' => 'تاكسلانت',
                    'code' => '5054',
                ],
                54 => [
                    'name' => 'tazoult',
                    'ar_name' => 'تازولت',
                    'code' => '5055',
                ],
                55 => [
                    'name' => 'teniet el abed',
                    'ar_name' => 'ثنية العابد',
                    'code' => '5056',
                ],
                56 => [
                    'name' => 'tighanimine',
                    'ar_name' => 'تيغانمين',
                    'code' => '5057',
                ],
                57 => [
                    'name' => 'tigherghar',
                    'ar_name' => 'تيغرغار',
                    'code' => '5058',
                ],
                58 => [
                    'name' => 'tilatou',
                    'ar_name' => 'تيلاطو',
                    'code' => '5059',
                ],
                59 => [
                    'name' => 'timgad',
                    'ar_name' => 'تيمقاد',
                    'code' => '5060',
                ],
                60 => [
                    'name' => 'tkout',
                    'ar_name' => 'تكوت',
                    'code' => '5061',
                ],
                61 => [
                    'name' => 'zana el beida',
                    'ar_name' => 'زانة البيضاء',
                    'code' => '5062',
                ],
            ],
            6 => [
                0 => [
                    'name' => 'béjaïa',
                    'ar_name' => 'بجاية',
                    'code' => '6001',
                ],
                1 => [
                    'name' => 'amizour',
                    'ar_name' => 'أميزور',
                    'code' => '6002',
                ],
                2 => [
                    'name' => 'ferraoun',
                    'ar_name' => 'فرعون',
                    'code' => '6003',
                ],
                3 => [
                    'name' => 'taourirt ighil',
                    'ar_name' => 'تاوريرت آغيل',
                    'code' => '6004',
                ],
                4 => [
                    'name' => 'chellata',
                    'ar_name' => 'شلاطة',
                    'code' => '6005',
                ],
                5 => [
                    'name' => 'tamokra',
                    'ar_name' => 'تمقرة',
                    'code' => '6006',
                ],
                6 => [
                    'name' => 'timezrit',
                    'ar_name' => 'تيمزريت',
                    'code' => '6007',
                ],
                7 => [
                    'name' => 'souk el ténine',
                    'ar_name' => 'سوق الاثنين',
                    'code' => '6008',
                ],
                8 => [
                    'name' => 'm\'cisna',
                    'ar_name' => 'مسيسنة',
                    'code' => '6009',
                ],
                9 => [
                    'name' => 'tinabdher',
                    'ar_name' => 'تينبذار',
                    'code' => '6010',
                ],
                10 => [
                    'name' => 'tichy',
                    'ar_name' => 'تيشي',
                    'code' => '6011',
                ],
                11 => [
                    'name' => 'semaoun',
                    'ar_name' => 'سمعون',
                    'code' => '6012',
                ],
                12 => [
                    'name' => 'kendira',
                    'ar_name' => 'كنديرة',
                    'code' => '6013',
                ],
                13 => [
                    'name' => 'tifra',
                    'ar_name' => 'تيفرة',
                    'code' => '6014',
                ],
                14 => [
                    'name' => 'ighram',
                    'ar_name' => 'آغرام',
                    'code' => '6015',
                ],
                15 => [
                    'name' => 'amalou',
                    'ar_name' => 'أمالو',
                    'code' => '6016',
                ],
                16 => [
                    'name' => 'ighil ali',
                    'ar_name' => 'إغيل علي',
                    'code' => '6017',
                ],
                17 => [
                    'name' => 'fenaïa ilmaten',
                    'ar_name' => 'فناية الماثن',
                    'code' => '6018',
                ],
                18 => [
                    'name' => 'toudja',
                    'ar_name' => 'توجة',
                    'code' => '6019',
                ],
                19 => [
                    'name' => 'darguina',
                    'ar_name' => 'درقينة',
                    'code' => '6020',
                ],
                20 => [
                    'name' => 'sidi ayad',
                    'ar_name' => 'سيدي عياد',
                    'code' => '6021',
                ],
                21 => [
                    'name' => 'aokas',
                    'ar_name' => 'أوقاس',
                    'code' => '6022',
                ],
                22 => [
                    'name' => 'beni djellil',
                    'ar_name' => 'بني جليل',
                    'code' => '6023',
                ],
                23 => [
                    'name' => 'adekar',
                    'ar_name' => 'آدكار',
                    'code' => '6024',
                ],
                24 => [
                    'name' => 'akbou',
                    'ar_name' => 'أقبو',
                    'code' => '6025',
                ],
                25 => [
                    'name' => 'seddouk',
                    'ar_name' => 'صدوق',
                    'code' => '6026',
                ],
                26 => [
                    'name' => 'tazmalt',
                    'ar_name' => 'تازمالت',
                    'code' => '6027',
                ],
                27 => [
                    'name' => 'aït r\'zine',
                    'ar_name' => 'آيت أرزين',
                    'code' => '6028',
                ],
                28 => [
                    'name' => 'chemini',
                    'ar_name' => 'شميني',
                    'code' => '6029',
                ],
                29 => [
                    'name' => 'souk oufella',
                    'ar_name' => 'سوق أوفلة',
                    'code' => '6030',
                ],
                30 => [
                    'name' => 'taskriout',
                    'ar_name' => 'تاسكريوت',
                    'code' => '6031',
                ],
                31 => [
                    'name' => 'tibane',
                    'ar_name' => 'طيبان',
                    'code' => '6032',
                ],
                32 => [
                    'name' => 'tala hamza',
                    'ar_name' => 'تالة حمزة',
                    'code' => '6033',
                ],
                33 => [
                    'name' => 'barbacha',
                    'ar_name' => 'برباشة',
                    'code' => '6034',
                ],
                34 => [
                    'name' => 'beni ksila',
                    'ar_name' => 'بني كسيلة',
                    'code' => '6035',
                ],
                35 => [
                    'name' => 'ouzellaguen',
                    'ar_name' => 'أوزلاقن',
                    'code' => '6036',
                ],
                36 => [
                    'name' => 'bouhamza',
                    'ar_name' => 'بوحمزة',
                    'code' => '6037',
                ],
                37 => [
                    'name' => 'beni mellikeche',
                    'ar_name' => 'بني مليكش',
                    'code' => '6038',
                ],
                38 => [
                    'name' => 'sidi aïch',
                    'ar_name' => 'سيدي عيش',
                    'code' => '6039',
                ],
                39 => [
                    'name' => 'el kseur',
                    'ar_name' => 'القصر',
                    'code' => '6040',
                ],
                40 => [
                    'name' => 'melbou',
                    'ar_name' => 'ملبو',
                    'code' => '6041',
                ],
                41 => [
                    'name' => 'akfadou',
                    'ar_name' => 'أكفادو',
                    'code' => '6042',
                ],
                42 => [
                    'name' => 'leflaye',
                    'ar_name' => 'لفلاي',
                    'code' => '6043',
                ],
                43 => [
                    'name' => 'kherrata',
                    'ar_name' => 'خراطة',
                    'code' => '6044',
                ],
                44 => [
                    'name' => 'draâ el-kaïd',
                    'ar_name' => 'ذراع القايد',
                    'code' => '6045',
                ],
                45 => [
                    'name' => 'tamridjet',
                    'ar_name' => 'تامريجت',
                    'code' => '6046',
                ],
                46 => [
                    'name' => 'aït smail',
                    'ar_name' => 'آيت سماعيل',
                    'code' => '6047',
                ],
                47 => [
                    'name' => 'boukhelifa',
                    'ar_name' => 'بوخليفة',
                    'code' => '6048',
                ],
                48 => [
                    'name' => 'tizi n\'berber',
                    'ar_name' => 'تيزي أنبربار',
                    'code' => '6049',
                ],
                49 => [
                    'name' => 'beni maouche',
                    'ar_name' => 'بني معوش',
                    'code' => '6050',
                ],
                50 => [
                    'name' => 'oued ghir',
                    'ar_name' => 'وادي غير',
                    'code' => '6051',
                ],
                51 => [
                    'name' => 'boudjellil',
                    'ar_name' => 'بوجليل',
                    'code' => '6052',
                ],
            ],
            7 => [
                0 => [
                    'name' => 'aïn naga',
                    'ar_name' => 'عين الناقة',
                    'code' => '7001',
                ],
                1 => [
                    'name' => 'aïn zaatout',
                    'ar_name' => 'عين زعطوط',
                    'code' => '7002',
                ],
                2 => [
                    'name' => 'biskra',
                    'ar_name' => 'بسكرة',
                    'code' => '7003',
                ],
                3 => [
                    'name' => 'bordj ben azzouz',
                    'ar_name' => 'برج بن عزوز',
                    'code' => '7004',
                ],
                4 => [
                    'name' => 'bouchagroune',
                    'ar_name' => 'بوشقرون',
                    'code' => '7005',
                ],
                5 => [
                    'name' => 'branis',
                    'ar_name' => 'البرانيس',
                    'code' => '7006',
                ],
                6 => [
                    'name' => 'chetma',
                    'ar_name' => 'شتمة',
                    'code' => '7007',
                ],
                7 => [
                    'name' => 'djemorah',
                    'ar_name' => 'جمورة',
                    'code' => '7008',
                ],
                8 => [
                    'name' => 'el feidh',
                    'ar_name' => 'الفيض',
                    'code' => '7009',
                ],
                9 => [
                    'name' => 'el ghrous',
                    'ar_name' => 'الغروس',
                    'code' => '7010',
                ],
                10 => [
                    'name' => 'el hadjeb',
                    'ar_name' => 'الحاجب',
                    'code' => '7011',
                ],
                11 => [
                    'name' => 'el haouch',
                    'ar_name' => 'الحوش',
                    'code' => '7012',
                ],
                12 => [
                    'name' => 'el kantara',
                    'ar_name' => 'القنطرة',
                    'code' => '7013',
                ],
                13 => [
                    'name' => 'el mizaraa',
                    'ar_name' => 'المزيرعة',
                    'code' => '7014',
                ],
                14 => [
                    'name' => 'el outaya',
                    'ar_name' => 'لوطاية',
                    'code' => '7015',
                ],
                15 => [
                    'name' => 'foughala',
                    'ar_name' => 'فوغالة',
                    'code' => '7016',
                ],
                16 => [
                    'name' => 'khenguet sidi nadji',
                    'ar_name' => 'خنقة سيدي ناجي',
                    'code' => '7017',
                ],
                17 => [
                    'name' => 'lichana',
                    'ar_name' => 'ليشانة',
                    'code' => '7018',
                ],
                18 => [
                    'name' => 'lioua',
                    'ar_name' => 'ليوة',
                    'code' => '7019',
                ],
                19 => [
                    'name' => 'm\'chouneche',
                    'ar_name' => 'مشونش',
                    'code' => '7020',
                ],
                20 => [
                    'name' => 'mekhadma',
                    'ar_name' => 'مخادمة',
                    'code' => '7021',
                ],
                21 => [
                    'name' => 'm\'lili',
                    'ar_name' => 'مليلي',
                    'code' => '7022',
                ],
                22 => [
                    'name' => 'oumache',
                    'ar_name' => 'أوماش',
                    'code' => '7023',
                ],
                23 => [
                    'name' => 'ourlal',
                    'ar_name' => 'أورلال',
                    'code' => '7024',
                ],
                24 => [
                    'name' => 'sidi okba',
                    'ar_name' => 'سيدي عقبة',
                    'code' => '7025',
                ],
                25 => [
                    'name' => 'tolga',
                    'ar_name' => 'طولقة',
                    'code' => '7026',
                ],
                26 => [
                    'name' => 'zeribet el oued',
                    'ar_name' => 'زريبة الوادي',
                    'code' => '7027',
                ],
            ],
            8 => [
                0 => [
                    'name' => 'béchar',
                    'ar_name' => 'بشار',
                    'code' => '8001',
                ],
                1 => [
                    'name' => 'erg ferradj',
                    'ar_name' => 'عرق فراج',
                    'code' => '8002',
                ],
                2 => [
                    'name' => 'ouled khoudir',
                    'ar_name' => 'أولاد خضير',
                    'code' => '8003',
                ],
                3 => [
                    'name' => 'meridja',
                    'ar_name' => 'مريجة',
                    'code' => '8004',
                ],
                4 => [
                    'name' => 'timoudi',
                    'ar_name' => 'تيمودي',
                    'code' => '8005',
                ],
                5 => [
                    'name' => 'lahmar',
                    'ar_name' => 'لحمر',
                    'code' => '8006',
                ],
                6 => [
                    'name' => 'beni ikhlef',
                    'ar_name' => 'بني يخلف',
                    'code' => '8007',
                ],
                7 => [
                    'name' => 'mechraa houari boumedienne',
                    'ar_name' => 'مشرع هواري بومدين',
                    'code' => '8008',
                ],
                8 => [
                    'name' => 'kenadsa',
                    'ar_name' => 'القنادسة',
                    'code' => '8009',
                ],
                9 => [
                    'name' => 'igli',
                    'ar_name' => 'إقلي',
                    'code' => '8010',
                ],
                10 => [
                    'name' => 'tabelbala',
                    'ar_name' => 'تبلبالة',
                    'code' => '8011',
                ],
                11 => [
                    'name' => 'taghit',
                    'ar_name' => 'تاغيت',
                    'code' => '8012',
                ],
                12 => [
                    'name' => 'el ouata',
                    'ar_name' => 'الواتة',
                    'code' => '8013',
                ],
                13 => [
                    'name' => 'boukais',
                    'ar_name' => 'بوكايس',
                    'code' => '8014',
                ],
                14 => [
                    'name' => 'mougheul',
                    'ar_name' => 'موغل',
                    'code' => '8015',
                ],
                15 => [
                    'name' => 'abadla',
                    'ar_name' => 'العبادلة',
                    'code' => '8016',
                ],
                16 => [
                    'name' => 'kerzaz',
                    'ar_name' => 'كرزاز',
                    'code' => '8017',
                ],
                17 => [
                    'name' => 'ksabi',
                    'ar_name' => 'القصابي',
                    'code' => '8018',
                ],
                18 => [
                    'name' => 'tamtert',
                    'ar_name' => 'تامترت',
                    'code' => '8019',
                ],
                19 => [
                    'name' => 'beni ounif',
                    'ar_name' => 'بني ونيف',
                    'code' => '8020',
                ],
            ],
            9 => [
                0 => [
                    'name' => 'blida',
                    'ar_name' => 'البليدة',
                    'code' => '9001',
                ],
                1 => [
                    'name' => 'chebli',
                    'ar_name' => 'الشبلي',
                    'code' => '9002',
                ],
                2 => [
                    'name' => 'bouinan',
                    'ar_name' => 'بوينان',
                    'code' => '9003',
                ],
                3 => [
                    'name' => 'oued el alleug',
                    'ar_name' => 'وادي العلايق',
                    'code' => '9004',
                ],
                4 => [
                    'name' => 'ouled yaïch',
                    'ar_name' => 'أولاد يعيش',
                    'code' => '9005',
                ],
                5 => [
                    'name' => 'chréa',
                    'ar_name' => 'الشريعة',
                    'code' => '9006',
                ],
                6 => [
                    'name' => 'el affroun',
                    'ar_name' => 'العفرون',
                    'code' => '9007',
                ],
                7 => [
                    'name' => 'chiffa',
                    'ar_name' => 'الشفة',
                    'code' => '9008',
                ],
                8 => [
                    'name' => 'hammam melouane',
                    'ar_name' => 'حمام ملوان',
                    'code' => '9009',
                ],
                9 => [
                    'name' => 'ben khelil',
                    'ar_name' => 'بن خليل',
                    'code' => '9010',
                ],
                10 => [
                    'name' => 'soumaa',
                    'ar_name' => 'الصومعة',
                    'code' => '9011',
                ],
                11 => [
                    'name' => 'mouzaia',
                    'ar_name' => 'موزاية',
                    'code' => '9012',
                ],
                12 => [
                    'name' => 'souhane',
                    'ar_name' => 'صوحان',
                    'code' => '9013',
                ],
                13 => [
                    'name' => 'meftah',
                    'ar_name' => 'مفتاح',
                    'code' => '9014',
                ],
                14 => [
                    'name' => 'ouled slama',
                    'ar_name' => 'أولاد السلامة',
                    'code' => '9015',
                ],
                15 => [
                    'name' => 'boufarik',
                    'ar_name' => 'بوفاريك',
                    'code' => '9016',
                ],
                16 => [
                    'name' => 'larbaa',
                    'ar_name' => 'الأربعاء',
                    'code' => '9017',
                ],
                17 => [
                    'name' => 'oued djer',
                    'ar_name' => 'واد جر',
                    'code' => '9018',
                ],
                18 => [
                    'name' => 'beni tamou',
                    'ar_name' => 'بني تامو',
                    'code' => '9019',
                ],
                19 => [
                    'name' => 'bouarfa',
                    'ar_name' => 'بوعرفة',
                    'code' => '9020',
                ],
                20 => [
                    'name' => 'beni mered',
                    'ar_name' => 'بني مراد',
                    'code' => '9021',
                ],
                21 => [
                    'name' => 'bougara',
                    'ar_name' => 'بوقرة',
                    'code' => '9022',
                ],
                22 => [
                    'name' => 'guerouaou',
                    'ar_name' => 'قرواو',
                    'code' => '9023',
                ],
                23 => [
                    'name' => 'aïn romana',
                    'ar_name' => 'عين الرمانة',
                    'code' => '9024',
                ],
                24 => [
                    'name' => 'djebabra',
                    'ar_name' => 'الجبابرة',
                    'code' => '9025',
                ],
            ],
            10 => [
                0 => [
                    'name' => 'aïn bessem',
                    'ar_name' => 'عين بسام',
                    'code' => '10001',
                ],
                1 => [
                    'name' => 'hanif',
                    'ar_name' => 'الحانيف',
                    'code' => '10002',
                ],
                2 => [
                    'name' => 'aghbalou',
                    'ar_name' => 'أغبالو',
                    'code' => '10003',
                ],
                3 => [
                    'name' => 'aïn el hadjar',
                    'ar_name' => 'عين الحجر',
                    'code' => '10004',
                ],
                4 => [
                    'name' => 'ahl el ksar',
                    'ar_name' => 'أهل القصر',
                    'code' => '10005',
                ],
                5 => [
                    'name' => 'aïn laloui',
                    'ar_name' => 'عين العلوي',
                    'code' => '10006',
                ],
                6 => [
                    'name' => 'ath mansour',
                    'ar_name' => 'آث منصور',
                    'code' => '10007',
                ],
                7 => [
                    'name' => 'aomar',
                    'ar_name' => 'عومار',
                    'code' => '10008',
                ],
                8 => [
                    'name' => 'aïn el turc',
                    'ar_name' => 'عين الترك',
                    'code' => '10009',
                ],
                9 => [
                    'name' => 'aït laziz',
                    'ar_name' => 'آيت لعزيز',
                    'code' => '10010',
                ],
                10 => [
                    'name' => 'bouderbala',
                    'ar_name' => 'بودربالة',
                    'code' => '10011',
                ],
                11 => [
                    'name' => 'bechloul',
                    'ar_name' => 'بشلول',
                    'code' => '10012',
                ],
                12 => [
                    'name' => 'bir ghbalou',
                    'ar_name' => 'بئر غبالو',
                    'code' => '10013',
                ],
                13 => [
                    'name' => 'boukram',
                    'ar_name' => 'بوكرام',
                    'code' => '10014',
                ],
                14 => [
                    'name' => 'bordj okhriss',
                    'ar_name' => 'برج أوخريص',
                    'code' => '10015',
                ],
                15 => [
                    'name' => 'bouira',
                    'ar_name' => 'البويرة',
                    'code' => '10016',
                ],
                16 => [
                    'name' => 'chorfa',
                    'ar_name' => 'الشرفة',
                    'code' => '10017',
                ],
                17 => [
                    'name' => 'dechmia',
                    'ar_name' => 'الدشمية',
                    'code' => '10018',
                ],
                18 => [
                    'name' => 'dirrah',
                    'ar_name' => 'ديرة',
                    'code' => '10019',
                ],
                19 => [
                    'name' => 'djebahia',
                    'ar_name' => 'الجباحية',
                    'code' => '10020',
                ],
                20 => [
                    'name' => 'el hakimia',
                    'ar_name' => 'الحاكمية',
                    'code' => '10021',
                ],
                21 => [
                    'name' => 'el hachimia',
                    'ar_name' => 'الهاشمية',
                    'code' => '10022',
                ],
                22 => [
                    'name' => 'el adjiba',
                    'ar_name' => 'العجيبة',
                    'code' => '10023',
                ],
                23 => [
                    'name' => 'el khabouzia',
                    'ar_name' => 'الخبوزية',
                    'code' => '10024',
                ],
                24 => [
                    'name' => 'el mokrani',
                    'ar_name' => 'المقراني',
                    'code' => '10025',
                ],
                25 => [
                    'name' => 'el asnam',
                    'ar_name' => 'الأصنام',
                    'code' => '10026',
                ],
                26 => [
                    'name' => 'guerrouma',
                    'ar_name' => 'قرومة',
                    'code' => '10027',
                ],
                27 => [
                    'name' => 'haizer',
                    'ar_name' => 'حيزر',
                    'code' => '10028',
                ],
                28 => [
                    'name' => 'hadjera zerga',
                    'ar_name' => 'الحجرة الزرقاء',
                    'code' => '10029',
                ],
                29 => [
                    'name' => 'kadiria',
                    'ar_name' => 'قادرية',
                    'code' => '10030',
                ],
                30 => [
                    'name' => 'lakhdaria',
                    'ar_name' => 'الأخضرية',
                    'code' => '10031',
                ],
                31 => [
                    'name' => 'm\'chedallah',
                    'ar_name' => 'مشد الله',
                    'code' => '10032',
                ],
                32 => [
                    'name' => 'mezdour',
                    'ar_name' => 'مسدور',
                    'code' => '10033',
                ],
                33 => [
                    'name' => 'maala',
                    'ar_name' => 'معالة',
                    'code' => '10034',
                ],
                34 => [
                    'name' => 'maamora',
                    'ar_name' => 'المعمورة',
                    'code' => '10035',
                ],
                35 => [
                    'name' => 'oued el berdi',
                    'ar_name' => 'وادي البردي',
                    'code' => '10036',
                ],
                36 => [
                    'name' => 'ouled rached',
                    'ar_name' => 'أولاد راشد',
                    'code' => '10037',
                ],
                37 => [
                    'name' => 'raouraoua',
                    'ar_name' => 'الروراوة',
                    'code' => '10038',
                ],
                38 => [
                    'name' => 'ridane',
                    'ar_name' => 'ريدان',
                    'code' => '10039',
                ],
                39 => [
                    'name' => 'saharidj',
                    'ar_name' => 'الصھاريج',
                    'code' => '10040',
                ],
                40 => [
                    'name' => 'sour el ghouzlane',
                    'ar_name' => 'سور الغزلان',
                    'code' => '10041',
                ],
                41 => [
                    'name' => 'souk el khemis',
                    'ar_name' => 'سوق الخميس',
                    'code' => '10042',
                ],
                42 => [
                    'name' => 'taguedit',
                    'ar_name' => 'تاقديت',
                    'code' => '10043',
                ],
                43 => [
                    'name' => 'taghzout',
                    'ar_name' => 'تاغزوت',
                    'code' => '10044',
                ],
                44 => [
                    'name' => 'zbarbar',
                    'ar_name' => 'الزبربر',
                    'code' => '10045',
                ],
            ],
            11 => [
                0 => [
                    'name' => 'tamanrasset',
                    'ar_name' => 'تامنراست',
                    'code' => '11001',
                ],
                1 => [
                    'name' => 'abalessa',
                    'ar_name' => 'أبلسة',
                    'code' => '11002',
                ],
                2 => [
                    'name' => 'idles',
                    'ar_name' => 'إدلس',
                    'code' => '11003',
                ],
                3 => [
                    'name' => 'tazrouk',
                    'ar_name' => 'تاظروك',
                    'code' => '11004',
                ],
                4 => [
                    'name' => 'in amguel',
                    'ar_name' => 'عين امقل',
                    'code' => '11005',
                ],
            ],
            12 => [
                0 => [
                    'name' => 'tébessa',
                    'ar_name' => 'تبسة',
                    'code' => '12001',
                ],
                1 => [
                    'name' => 'bir el ater',
                    'ar_name' => 'بئر العاتر',
                    'code' => '12002',
                ],
                2 => [
                    'name' => 'cheria',
                    'ar_name' => 'الشريعة',
                    'code' => '12003',
                ],
                3 => [
                    'name' => 'stah guentis',
                    'ar_name' => 'سطح قنطيس',
                    'code' => '12004',
                ],
                4 => [
                    'name' => 'el aouinet',
                    'ar_name' => 'العوينات',
                    'code' => '12005',
                ],
                5 => [
                    'name' => 'el houidjbet',
                    'ar_name' => 'الحويجبات',
                    'code' => '12006',
                ],
                6 => [
                    'name' => 'safsaf el ouesra',
                    'ar_name' => 'صفصاف الوسرة',
                    'code' => '12007',
                ],
                7 => [
                    'name' => 'hammamet',
                    'ar_name' => 'الحمامات',
                    'code' => '12008',
                ],
                8 => [
                    'name' => 'negrine',
                    'ar_name' => 'نقرين',
                    'code' => '12009',
                ],
                9 => [
                    'name' => 'bir mokkadem',
                    'ar_name' => 'بئر مقدم',
                    'code' => '12010',
                ],
                10 => [
                    'name' => 'el kouif',
                    'ar_name' => 'الكويف',
                    'code' => '12011',
                ],
                11 => [
                    'name' => 'morsott',
                    'ar_name' => 'مرسط',
                    'code' => '12012',
                ],
                12 => [
                    'name' => 'el ogla',
                    'ar_name' => 'العقلة',
                    'code' => '12013',
                ],
                13 => [
                    'name' => 'bir dheb',
                    'ar_name' => 'بئر الذهب',
                    'code' => '12014',
                ],
                14 => [
                    'name' => 'el ogla melha',
                    'ar_name' => 'العقلة المالحة',
                    'code' => '12015',
                ],
                15 => [
                    'name' => 'guorriguer',
                    'ar_name' => 'قريقر',
                    'code' => '12016',
                ],
                16 => [
                    'name' => 'bekkaria',
                    'ar_name' => 'بكارية',
                    'code' => '12017',
                ],
                17 => [
                    'name' => 'boukhadra',
                    'ar_name' => 'بوخضرة',
                    'code' => '12018',
                ],
                18 => [
                    'name' => 'ouenza',
                    'ar_name' => 'الونزة',
                    'code' => '12019',
                ],
                19 => [
                    'name' => 'el ma labiodh',
                    'ar_name' => 'الماء الأبيض',
                    'code' => '12020',
                ],
                20 => [
                    'name' => 'oum ali',
                    'ar_name' => 'أم علي',
                    'code' => '12021',
                ],
                21 => [
                    'name' => 'tlidjene',
                    'ar_name' => 'ثليجان',
                    'code' => '12022',
                ],
                22 => [
                    'name' => 'aïn zerga',
                    'ar_name' => 'عين الزرقاء',
                    'code' => '12023',
                ],
                23 => [
                    'name' => 'el meridj',
                    'ar_name' => 'المريج',
                    'code' => '12024',
                ],
                24 => [
                    'name' => 'boulhaf dir',
                    'ar_name' => 'بولحاف الدير',
                    'code' => '12025',
                ],
                25 => [
                    'name' => 'bedjene',
                    'ar_name' => 'بجن',
                    'code' => '12026',
                ],
                26 => [
                    'name' => 'el mezeraa',
                    'ar_name' => 'المزرعة',
                    'code' => '12027',
                ],
                27 => [
                    'name' => 'ferkane',
                    'ar_name' => 'فركان',
                    'code' => '12028',
                ],
            ],
            13 => [
                0 => [
                    'name' => 'tlemcen',
                    'ar_name' => 'تلمسان',
                    'code' => '13001',
                ],
                1 => [
                    'name' => 'beni mester',
                    'ar_name' => 'بني مستار',
                    'code' => '13002',
                ],
                2 => [
                    'name' => 'aïn tallout',
                    'ar_name' => 'عين تالوت',
                    'code' => '13003',
                ],
                3 => [
                    'name' => 'remchi',
                    'ar_name' => 'الرمشي',
                    'code' => '13004',
                ],
                4 => [
                    'name' => 'el fehoul',
                    'ar_name' => 'الفحول',
                    'code' => '13005',
                ],
                5 => [
                    'name' => 'sabra',
                    'ar_name' => 'صبرة',
                    'code' => '13006',
                ],
                6 => [
                    'name' => 'ghazaouet',
                    'ar_name' => 'الغزوات',
                    'code' => '13007',
                ],
                7 => [
                    'name' => 'souani',
                    'ar_name' => 'السواني',
                    'code' => '13008',
                ],
                8 => [
                    'name' => 'djebala',
                    'ar_name' => 'جبالة',
                    'code' => '13009',
                ],
                9 => [
                    'name' => 'el gor',
                    'ar_name' => 'القور',
                    'code' => '13010',
                ],
                10 => [
                    'name' => 'oued lakhdar',
                    'ar_name' => 'الواد الأخضر',
                    'code' => '13011',
                ],
                11 => [
                    'name' => 'aïn fezza',
                    'ar_name' => 'عين فزة',
                    'code' => '13012',
                ],
                12 => [
                    'name' => 'ouled mimoun',
                    'ar_name' => 'أولاد ميمون',
                    'code' => '13013',
                ],
                13 => [
                    'name' => 'amieur',
                    'ar_name' => 'عمير',
                    'code' => '13014',
                ],
                14 => [
                    'name' => 'aïn youcef',
                    'ar_name' => 'عين يوسف',
                    'code' => '13015',
                ],
                15 => [
                    'name' => 'zenata',
                    'ar_name' => 'زناتة',
                    'code' => '13016',
                ],
                16 => [
                    'name' => 'beni snous',
                    'ar_name' => 'بني سنوس',
                    'code' => '13017',
                ],
                17 => [
                    'name' => 'bab el assa',
                    'ar_name' => 'باب العسة',
                    'code' => '13018',
                ],
                18 => [
                    'name' => 'dar yaghmouracene',
                    'ar_name' => 'دار يغمراسن',
                    'code' => '13019',
                ],
                19 => [
                    'name' => 'fellaoucene',
                    'ar_name' => 'فلاوسن',
                    'code' => '13020',
                ],
                20 => [
                    'name' => 'azails',
                    'ar_name' => 'العزايل',
                    'code' => '13021',
                ],
                21 => [
                    'name' => 'sebaa chioukh',
                    'ar_name' => 'السبعة شيوخ',
                    'code' => '13022',
                ],
                22 => [
                    'name' => 'terni beni hdiel',
                    'ar_name' => 'تيرني بني ھديل',
                    'code' => '13023',
                ],
                23 => [
                    'name' => 'bensekrane',
                    'ar_name' => 'بن سكران',
                    'code' => '13024',
                ],
                24 => [
                    'name' => 'aïn nehala',
                    'ar_name' => 'عين نحالة',
                    'code' => '13025',
                ],
                25 => [
                    'name' => 'hennaya',
                    'ar_name' => 'الحناية',
                    'code' => '13026',
                ],
                26 => [
                    'name' => 'maghnia',
                    'ar_name' => 'مغنية',
                    'code' => '13027',
                ],
                27 => [
                    'name' => 'hammam boughrara',
                    'ar_name' => 'حمام بوغرارة',
                    'code' => '13028',
                ],
                28 => [
                    'name' => 'souahlia',
                    'ar_name' => 'السواحلية',
                    'code' => '13029',
                ],
                29 => [
                    'name' => 'msirda fouaga',
                    'ar_name' => 'مسيردة الفواقة',
                    'code' => '13030',
                ],
                30 => [
                    'name' => 'aïn fetah',
                    'ar_name' => 'عين فتاح',
                    'code' => '13031',
                ],
                31 => [
                    'name' => 'el aricha',
                    'ar_name' => 'العريشة',
                    'code' => '13032',
                ],
                32 => [
                    'name' => 'souk tlata',
                    'ar_name' => 'سوق الثلاثاء',
                    'code' => '13033',
                ],
                33 => [
                    'name' => 'sidi abdelli',
                    'ar_name' => 'سيدي العبدلي',
                    'code' => '13034',
                ],
                34 => [
                    'name' => 'sebdou',
                    'ar_name' => 'سبدو',
                    'code' => '13035',
                ],
                35 => [
                    'name' => 'beni ouarsous',
                    'ar_name' => 'بني ورسوس',
                    'code' => '13036',
                ],
                36 => [
                    'name' => 'sidi medjahed',
                    'ar_name' => 'سيدي مجاهد',
                    'code' => '13037',
                ],
                37 => [
                    'name' => 'beni boussaid',
                    'ar_name' => 'بني بوسعيد',
                    'code' => '13038',
                ],
                38 => [
                    'name' => 'marsa ben m\'hidi',
                    'ar_name' => 'مرسى بن مهيدي',
                    'code' => '13039',
                ],
                39 => [
                    'name' => 'nedroma',
                    'ar_name' => 'ندرومة',
                    'code' => '13040',
                ],
                40 => [
                    'name' => 'sidi djillali',
                    'ar_name' => 'سيدي الجيلالي',
                    'code' => '13041',
                ],
                41 => [
                    'name' => 'beni bahdel',
                    'ar_name' => 'بني بهدل',
                    'code' => '13042',
                ],
                42 => [
                    'name' => 'el bouihi',
                    'ar_name' => 'البويهي',
                    'code' => '13043',
                ],
                43 => [
                    'name' => 'honaïne',
                    'ar_name' => 'هنين',
                    'code' => '13044',
                ],
                44 => [
                    'name' => 'tienet',
                    'ar_name' => 'تيانت',
                    'code' => '13045',
                ],
                45 => [
                    'name' => 'ouled riyah',
                    'ar_name' => 'أولاد رياح',
                    'code' => '13046',
                ],
                46 => [
                    'name' => 'bouhlou',
                    'ar_name' => 'بوحلو',
                    'code' => '13047',
                ],
                47 => [
                    'name' => 'beni khellad',
                    'ar_name' => 'بني خلاد',
                    'code' => '13048',
                ],
                48 => [
                    'name' => 'aïn ghoraba',
                    'ar_name' => 'عين غرابة',
                    'code' => '13049',
                ],
                49 => [
                    'name' => 'chetouane',
                    'ar_name' => 'شتوان',
                    'code' => '13050',
                ],
                50 => [
                    'name' => 'mansourah',
                    'ar_name' => 'المنصورة',
                    'code' => '13051',
                ],
                51 => [
                    'name' => 'beni semiel',
                    'ar_name' => 'بني صميل',
                    'code' => '13052',
                ],
                52 => [
                    'name' => 'aïn kebira',
                    'ar_name' => 'عين الكبيرة',
                    'code' => '13053',
                ],
            ],
            14 => [
                0 => [
                    'name' => 'aïn bouchekif',
                    'ar_name' => 'عين بوشقيف',
                    'code' => '14001',
                ],
                1 => [
                    'name' => 'aïn deheb',
                    'ar_name' => 'عين الذهب',
                    'code' => '14002',
                ],
                2 => [
                    'name' => 'aïn el hadid',
                    'ar_name' => 'عين الحديد',
                    'code' => '14003',
                ],
                3 => [
                    'name' => 'aïn kermes',
                    'ar_name' => 'عين كرمس',
                    'code' => '14004',
                ],
                4 => [
                    'name' => 'aïn dzarit',
                    'ar_name' => 'عين دزاريت',
                    'code' => '14005',
                ],
                5 => [
                    'name' => 'bougara',
                    'ar_name' => 'بوقرة',
                    'code' => '14006',
                ],
                6 => [
                    'name' => 'chehaima',
                    'ar_name' => 'شحيمة',
                    'code' => '14007',
                ],
                7 => [
                    'name' => 'dahmouni',
                    'ar_name' => 'دحموني',
                    'code' => '14008',
                ],
                8 => [
                    'name' => 'djebilet rosfa',
                    'ar_name' => 'جبيلة الرصفاء',
                    'code' => '14009',
                ],
                9 => [
                    'name' => 'djillali ben amar',
                    'ar_name' => 'جيلالي بن عمار',
                    'code' => '14010',
                ],
                10 => [
                    'name' => 'faidja',
                    'ar_name' => 'الفايجة',
                    'code' => '14011',
                ],
                11 => [
                    'name' => 'frenda',
                    'ar_name' => 'فرندة',
                    'code' => '14012',
                ],
                12 => [
                    'name' => 'guertoufa',
                    'ar_name' => 'قرطوفة',
                    'code' => '14013',
                ],
                13 => [
                    'name' => 'hamadia',
                    'ar_name' => 'حمادية',
                    'code' => '14014',
                ],
                14 => [
                    'name' => 'ksar chellala',
                    'ar_name' => 'قصر الشلالة',
                    'code' => '14015',
                ],
                15 => [
                    'name' => 'madna',
                    'ar_name' => 'مادنة',
                    'code' => '14016',
                ],
                16 => [
                    'name' => 'mahdia',
                    'ar_name' => 'مهدية',
                    'code' => '14017',
                ],
                17 => [
                    'name' => 'mechraa safa',
                    'ar_name' => 'مشرع الصفاء',
                    'code' => '14018',
                ],
                18 => [
                    'name' => 'medrissa',
                    'ar_name' => 'مدريسة',
                    'code' => '14019',
                ],
                19 => [
                    'name' => 'medroussa',
                    'ar_name' => 'مدروسة',
                    'code' => '14020',
                ],
                20 => [
                    'name' => 'meghila',
                    'ar_name' => 'مغيلة',
                    'code' => '14021',
                ],
                21 => [
                    'name' => 'mellakou',
                    'ar_name' => 'ملاكو',
                    'code' => '14022',
                ],
                22 => [
                    'name' => 'nadorah',
                    'ar_name' => 'الناظورة',
                    'code' => '14023',
                ],
                23 => [
                    'name' => 'naima',
                    'ar_name' => 'النعيمة',
                    'code' => '14024',
                ],
                24 => [
                    'name' => 'oued lilli',
                    'ar_name' => 'وادي ليلي',
                    'code' => '14025',
                ],
                25 => [
                    'name' => 'rahouia',
                    'ar_name' => 'الرحوية',
                    'code' => '14026',
                ],
                26 => [
                    'name' => 'rechaïga',
                    'ar_name' => 'الرشايقة',
                    'code' => '14027',
                ],
                27 => [
                    'name' => 'sebaïne',
                    'ar_name' => 'سبعين',
                    'code' => '14028',
                ],
                28 => [
                    'name' => 'sebt',
                    'ar_name' => 'السبت',
                    'code' => '14029',
                ],
                29 => [
                    'name' => 'serghine',
                    'ar_name' => 'سرغين',
                    'code' => '14030',
                ],
                30 => [
                    'name' => 'si abdelghani',
                    'ar_name' => 'سي عبد الغني',
                    'code' => '14031',
                ],
                31 => [
                    'name' => 'sidi abderahmane',
                    'ar_name' => 'سيدي عبد الرحمان',
                    'code' => '14032',
                ],
                32 => [
                    'name' => 'sidi ali mellal',
                    'ar_name' => 'سيدي علي ملال',
                    'code' => '14033',
                ],
                33 => [
                    'name' => 'sidi bakhti',
                    'ar_name' => 'سيدي بختي',
                    'code' => '14034',
                ],
                34 => [
                    'name' => 'sidi hosni',
                    'ar_name' => 'سيدي حسني',
                    'code' => '14035',
                ],
                35 => [
                    'name' => 'sougueur',
                    'ar_name' => 'السوقر',
                    'code' => '14036',
                ],
                36 => [
                    'name' => 'tagdemt',
                    'ar_name' => 'تاقدمت',
                    'code' => '14037',
                ],
                37 => [
                    'name' => 'takhemaret',
                    'ar_name' => 'تاخمرت',
                    'code' => '14038',
                ],
                38 => [
                    'name' => 'tiaret',
                    'ar_name' => 'تيارت',
                    'code' => '14039',
                ],
                39 => [
                    'name' => 'tidda',
                    'ar_name' => 'تيدة',
                    'code' => '14040',
                ],
                40 => [
                    'name' => 'tousnina',
                    'ar_name' => 'توسنينة',
                    'code' => '14041',
                ],
                41 => [
                    'name' => 'zmalet el emir abdelkader',
                    'ar_name' => 'زمالة الأمير عبد القادر',
                    'code' => '14042',
                ],
            ],
            15 => [
                0 => [
                    'name' => 'tizi ouzou',
                    'ar_name' => 'تيزي وزو',
                    'code' => '15001',
                ],
                1 => [
                    'name' => 'ain el hammam',
                    'ar_name' => 'عين الحمام',
                    'code' => '15002',
                ],
                2 => [
                    'name' => 'akbil',
                    'ar_name' => 'أقبيل',
                    'code' => '15003',
                ],
                3 => [
                    'name' => 'freha',
                    'ar_name' => 'فريحة',
                    'code' => '15004',
                ],
                4 => [
                    'name' => 'souamaâ',
                    'ar_name' => 'الصوامع',
                    'code' => '15005',
                ],
                5 => [
                    'name' => 'mechtras',
                    'ar_name' => 'مشطراس',
                    'code' => '15006',
                ],
                6 => [
                    'name' => 'irdjen',
                    'ar_name' => 'إرجن',
                    'code' => '15007',
                ],
                7 => [
                    'name' => 'timizart',
                    'ar_name' => 'تيميزارت',
                    'code' => '15008',
                ],
                8 => [
                    'name' => 'makouda',
                    'ar_name' => 'ماكودة',
                    'code' => '15009',
                ],
                9 => [
                    'name' => 'draâ el mizan',
                    'ar_name' => 'ذراع الميزان',
                    'code' => '15010',
                ],
                10 => [
                    'name' => 'tizi gheniff',
                    'ar_name' => 'تيزي غنيف',
                    'code' => '15011',
                ],
                11 => [
                    'name' => 'bounouh',
                    'ar_name' => 'بونوح',
                    'code' => '15012',
                ],
                12 => [
                    'name' => 'aït chafâa',
                    'ar_name' => 'أيت شفعة',
                    'code' => '15013',
                ],
                13 => [
                    'name' => 'frikat',
                    'ar_name' => 'فريقات',
                    'code' => '15014',
                ],
                14 => [
                    'name' => 'beni aïssi',
                    'ar_name' => 'بني عيسي',
                    'code' => '15015',
                ],
                15 => [
                    'name' => 'beni zmenzer',
                    'ar_name' => 'بني زمنزر',
                    'code' => '15016',
                ],
                16 => [
                    'name' => 'iferhounène',
                    'ar_name' => 'إيفرحونن',
                    'code' => '15017',
                ],
                17 => [
                    'name' => 'azazga',
                    'ar_name' => 'عزازقة',
                    'code' => '15018',
                ],
                18 => [
                    'name' => 'illoula oumalou',
                    'ar_name' => 'إيلولة أمالو',
                    'code' => '15019',
                ],
                19 => [
                    'name' => 'yakouren',
                    'ar_name' => 'إعكوران',
                    'code' => '15020',
                ],
                20 => [
                    'name' => 'larbaâ nath irathen',
                    'ar_name' => 'الأربعاء نايث إيراثن',
                    'code' => '15021',
                ],
                21 => [
                    'name' => 'tizi rached',
                    'ar_name' => 'تيزي راشد',
                    'code' => '15022',
                ],
                22 => [
                    'name' => 'zekri',
                    'ar_name' => 'زكري',
                    'code' => '15023',
                ],
                23 => [
                    'name' => 'ouaguenoun',
                    'ar_name' => 'واقنون',
                    'code' => '15024',
                ],
                24 => [
                    'name' => 'aïn zaouia',
                    'ar_name' => 'عين الزاوية',
                    'code' => '15025',
                ],
                25 => [
                    'name' => 'm\'kira',
                    'ar_name' => 'مكيرة',
                    'code' => '15026',
                ],
                26 => [
                    'name' => 'aït yahia',
                    'ar_name' => 'أيت يحي',
                    'code' => '15027',
                ],
                27 => [
                    'name' => 'aït mahmoud',
                    'ar_name' => 'أيت محمود',
                    'code' => '15028',
                ],
                28 => [
                    'name' => 'mâatkas',
                    'ar_name' => 'المعاتقة',
                    'code' => '15029',
                ],
                29 => [
                    'name' => 'aït boumahdi',
                    'ar_name' => 'أيت بومهدي',
                    'code' => '15030',
                ],
                30 => [
                    'name' => 'abi youcef',
                    'ar_name' => 'أبي يوسف',
                    'code' => '15031',
                ],
                31 => [
                    'name' => 'beni douala',
                    'ar_name' => 'بني دوالة',
                    'code' => '15032',
                ],
                32 => [
                    'name' => 'illilten',
                    'ar_name' => 'إليلتن',
                    'code' => '15033',
                ],
                33 => [
                    'name' => 'bouzeguène',
                    'ar_name' => 'بوزقن',
                    'code' => '15034',
                ],
                34 => [
                    'name' => 'aït aggouacha',
                    'ar_name' => 'أيت قواشة',
                    'code' => '15035',
                ],
                35 => [
                    'name' => 'ouadhia',
                    'ar_name' => 'واضية',
                    'code' => '15036',
                ],
                36 => [
                    'name' => 'azeffoun',
                    'ar_name' => 'أزفون',
                    'code' => '15037',
                ],
                37 => [
                    'name' => 'tigzirt',
                    'ar_name' => 'تيقزيرت',
                    'code' => '15038',
                ],
                38 => [
                    'name' => 'aït aïssa mimoun',
                    'ar_name' => 'آيت عيسى ميمون',
                    'code' => '15039',
                ],
                39 => [
                    'name' => 'boghni',
                    'ar_name' => 'بوغني',
                    'code' => '15040',
                ],
                40 => [
                    'name' => 'ifigha',
                    'ar_name' => 'إيفيغاء',
                    'code' => '15041',
                ],
                41 => [
                    'name' => 'aït oumalou',
                    'ar_name' => 'أيت أومالو',
                    'code' => '15042',
                ],
                42 => [
                    'name' => 'tirmitine',
                    'ar_name' => 'تيرمتين',
                    'code' => '15043',
                ],
                43 => [
                    'name' => 'akerrou',
                    'ar_name' => 'أقرو',
                    'code' => '15044',
                ],
                44 => [
                    'name' => 'yatafen',
                    'ar_name' => 'يطافن',
                    'code' => '15045',
                ],
                45 => [
                    'name' => 'beni ziki',
                    'ar_name' => 'بني زيكي',
                    'code' => '15046',
                ],
                46 => [
                    'name' => 'draâ ben khedda',
                    'ar_name' => 'ذراع بن خدة',
                    'code' => '15047',
                ],
                47 => [
                    'name' => 'ouacifs ',
                    'ar_name' => 'واسيف',
                    'code' => '15048',
                ],
                48 => [
                    'name' => 'idjeur',
                    'ar_name' => 'إجر',
                    'code' => '15049',
                ],
                49 => [
                    'name' => 'mekla',
                    'ar_name' => 'مقلع',
                    'code' => '15050',
                ],
                50 => [
                    'name' => 'tizi n\'thleta',
                    'ar_name' => 'تيزي نثلاثة',
                    'code' => '15051',
                ],
                51 => [
                    'name' => 'beni yenni',
                    'ar_name' => 'بني يني',
                    'code' => '15052',
                ],
                52 => [
                    'name' => 'aghrib',
                    'ar_name' => 'أغريب',
                    'code' => '15053',
                ],
                53 => [
                    'name' => 'iflissen',
                    'ar_name' => 'إفليسن',
                    'code' => '15054',
                ],
                54 => [
                    'name' => 'boudjima',
                    'ar_name' => 'بوجيمة',
                    'code' => '15055',
                ],
                55 => [
                    'name' => 'aït yahia moussa',
                    'ar_name' => 'أيت يحي موسى',
                    'code' => '15056',
                ],
                56 => [
                    'name' => 'souk el thenine',
                    'ar_name' => 'سوق الاثنين',
                    'code' => '15057',
                ],
                57 => [
                    'name' => 'aït khellili',
                    'ar_name' => 'أيت خليلي',
                    'code' => '15058',
                ],
                58 => [
                    'name' => 'sidi nâamane',
                    'ar_name' => 'سيدي نعمان',
                    'code' => '15059',
                ],
                59 => [
                    'name' => 'iboudraren',
                    'ar_name' => 'إبودرارن',
                    'code' => '15060',
                ],
                60 => [
                    'name' => 'agouni gueghrane',
                    'ar_name' => 'أقني قغران',
                    'code' => '15061',
                ],
                61 => [
                    'name' => 'mizrana',
                    'ar_name' => 'مزرانة',
                    'code' => '15062',
                ],
                62 => [
                    'name' => 'imsouhel',
                    'ar_name' => 'أمسوحال',
                    'code' => '15063',
                ],
                63 => [
                    'name' => 'tadmaït',
                    'ar_name' => 'تادمايت',
                    'code' => '15064',
                ],
                64 => [
                    'name' => 'aït bouaddou',
                    'ar_name' => 'أيت بوعدو',
                    'code' => '15065',
                ],
                65 => [
                    'name' => 'assi youcef',
                    'ar_name' => 'أسي يوسف',
                    'code' => '15066',
                ],
                66 => [
                    'name' => 'aït toudert',
                    'ar_name' => 'أيت تودرت',
                    'code' => '15067',
                ],
            ],
            16 => [
                0 => [
                    'name' => 'alger-centre',
                    'ar_name' => 'الجزائر الوسطى',
                    'code' => '16001',
                ],
                1 => [
                    'name' => 'sidi m\'hamed',
                    'ar_name' => 'سيدي امحمد',
                    'code' => '16002',
                ],
                2 => [
                    'name' => 'el madania',
                    'ar_name' => 'المدنية',
                    'code' => '16003',
                ],
                3 => [
                    'name' => 'belouizdad',
                    'ar_name' => 'محمد بلوزداد',
                    'code' => '16004',
                ],
                4 => [
                    'name' => 'bab el oued',
                    'ar_name' => 'باب الواد',
                    'code' => '16005',
                ],
                5 => [
                    'name' => 'bologhine',
                    'ar_name' => '	بولوغين',
                    'code' => '16006',
                ],
                6 => [
                    'name' => 'casbah',
                    'ar_name' => 'القصبة',
                    'code' => '16007',
                ],
                7 => [
                    'name' => 'oued koriche',
                    'ar_name' => 'وادي قريش',
                    'code' => '16008',
                ],
                8 => [
                    'name' => 'bir mourad raïs',
                    'ar_name' => 'بير مراد رايس',
                    'code' => '16009',
                ],
                9 => [
                    'name' => 'el biar',
                    'ar_name' => 'الأبيار',
                    'code' => '16010',
                ],
                10 => [
                    'name' => 'bouzareah',
                    'ar_name' => 'بوزريعة',
                    'code' => '16011',
                ],
                11 => [
                    'name' => 'birkhadem',
                    'ar_name' => 'بئر خادم',
                    'code' => '16012',
                ],
                12 => [
                    'name' => 'el harrach',
                    'ar_name' => 'الحراش',
                    'code' => '16013',
                ],
                13 => [
                    'name' => 'baraki',
                    'ar_name' => 'براقي',
                    'code' => '16014',
                ],
                14 => [
                    'name' => 'oued smar',
                    'ar_name' => 'وادي السمار',
                    'code' => '16015',
                ],
                15 => [
                    'name' => 'bachdjerrah',
                    'ar_name' => 'باش جراح',
                    'code' => '16016',
                ],
                16 => [
                    'name' => 'hussein dey',
                    'ar_name' => 'حسين داي',
                    'code' => '16017',
                ],
                17 => [
                    'name' => 'kouba',
                    'ar_name' => 'القبة',
                    'code' => '16018',
                ],
                18 => [
                    'name' => 'bourouba',
                    'ar_name' => 'بوروبة',
                    'code' => '16019',
                ],
                19 => [
                    'name' => 'dar el beïda',
                    'ar_name' => 'الدار البيضاء',
                    'code' => '16020',
                ],
                20 => [
                    'name' => 'bab ezzouar',
                    'ar_name' => 'باب الزوار',
                    'code' => '16021',
                ],
                21 => [
                    'name' => 'ben aknoun',
                    'ar_name' => 'بن عكنون',
                    'code' => '16022',
                ],
                22 => [
                    'name' => 'dely ibrahim',
                    'ar_name' => 'دالي إبراهيم',
                    'code' => '16023',
                ],
                23 => [
                    'name' => 'el hammamet',
                    'ar_name' => 'الحمامات',
                    'code' => '16024',
                ],
                24 => [
                    'name' => 'raïs hamidou',
                    'ar_name' => 'رايس حميدو',
                    'code' => '16025',
                ],
                25 => [
                    'name' => 'djasr kasentina',
                    'ar_name' => 'جسر قسنطينة',
                    'code' => '16026',
                ],
                26 => [
                    'name' => 'el mouradia',
                    'ar_name' => 'المرادية',
                    'code' => '16027',
                ],
                27 => [
                    'name' => 'hydra',
                    'ar_name' => 'حيدرة',
                    'code' => '16028',
                ],
                28 => [
                    'name' => 'mohammadia',
                    'ar_name' => 'المحمدية',
                    'code' => '16029',
                ],
                29 => [
                    'name' => 'bordj el kiffan',
                    'ar_name' => 'برج الكيفان',
                    'code' => '16030',
                ],
                30 => [
                    'name' => 'el magharia',
                    'ar_name' => 'المقرية',
                    'code' => '16031',
                ],
                31 => [
                    'name' => 'beni messous',
                    'ar_name' => 'بني مسوس',
                    'code' => '16032',
                ],
                32 => [
                    'name' => 'les eucalyptus',
                    'ar_name' => 'کالیتوس',
                    'code' => '16033',
                ],
                33 => [
                    'name' => 'birtouta',
                    'ar_name' => 'بئر توتة',
                    'code' => '16034',
                ],
                34 => [
                    'name' => 'tessala el merdja',
                    'ar_name' => 'تسالة المرجة',
                    'code' => '16035',
                ],
                35 => [
                    'name' => 'ouled chebel',
                    'ar_name' => 'أولاد شبل',
                    'code' => '16036',
                ],
                36 => [
                    'name' => 'sidi moussa',
                    'ar_name' => 'سيدي موسى',
                    'code' => '16037',
                ],
                37 => [
                    'name' => 'aïn taya',
                    'ar_name' => 'عين طاية',
                    'code' => '16038',
                ],
                38 => [
                    'name' => 'bordj el bahri',
                    'ar_name' => 'برج البحري',
                    'code' => '16039',
                ],
                39 => [
                    'name' => 'el marsa',
                    'ar_name' => 'المرسى',
                    'code' => '16040',
                ],
                40 => [
                    'name' => 'h\'raoua',
                    'ar_name' => 'هراوة',
                    'code' => '16041',
                ],
                41 => [
                    'name' => 'rouïba',
                    'ar_name' => 'الرويبة',
                    'code' => '16042',
                ],
                42 => [
                    'name' => 'reghaïa',
                    'ar_name' => 'الرغاية',
                    'code' => '16043',
                ],
                43 => [
                    'name' => 'aïn benian',
                    'ar_name' => 'عين البنيان',
                    'code' => '16044',
                ],
                44 => [
                    'name' => 'staoueli',
                    'ar_name' => 'سطاوالي',
                    'code' => '16045',
                ],
                45 => [
                    'name' => 'zeralda',
                    'ar_name' => 'زرالدة',
                    'code' => '16046',
                ],
                46 => [
                    'name' => 'mahelma',
                    'ar_name' => 'المحالمة',
                    'code' => '16047',
                ],
                47 => [
                    'name' => 'rahmania',
                    'ar_name' => 'الرحمانية',
                    'code' => '16048',
                ],
                48 => [
                    'name' => 'souidania',
                    'ar_name' => 'السويدانية',
                    'code' => '16049',
                ],
                49 => [
                    'name' => 'cheraga',
                    'ar_name' => 'الشراقة',
                    'code' => '16050',
                ],
                50 => [
                    'name' => 'ouled fayet',
                    'ar_name' => 'أولاد فايت',
                    'code' => '16051',
                ],
                51 => [
                    'name' => 'el achour',
                    'ar_name' => '	العاشور',
                    'code' => '16052',
                ],
                52 => [
                    'name' => 'draria',
                    'ar_name' => 'درارية',
                    'code' => '16053',
                ],
                53 => [
                    'name' => 'douera',
                    'ar_name' => 'الدويرة',
                    'code' => '16054',
                ],
                54 => [
                    'name' => 'baba hassen',
                    'ar_name' => 'بابا حسن',
                    'code' => '16055',
                ],
                55 => [
                    'name' => 'khraicia',
                    'ar_name' => 'خرايسية',
                    'code' => '16056',
                ],
                56 => [
                    'name' => 'saoula',
                    'ar_name' => 'السحاولة',
                    'code' => '16057',
                ],
            ],
            17 => [
                0 => [
                    'name' => 'aïn chouhada',
                    'ar_name' => 'عين الشهداء',
                    'code' => '17001',
                ],
                1 => [
                    'name' => 'aïn el ibel',
                    'ar_name' => 'عين الابل',
                    'code' => '17002',
                ],
                2 => [
                    'name' => 'aïn feka',
                    'ar_name' => 'عين أفقه',
                    'code' => '17003',
                ],
                3 => [
                    'name' => 'aïn maabed',
                    'ar_name' => 'عين معبد',
                    'code' => '17004',
                ],
                4 => [
                    'name' => 'aïn oussara',
                    'ar_name' => 'عين وسارة',
                    'code' => '17005',
                ],
                5 => [
                    'name' => 'amourah',
                    'ar_name' => 'عمورة',
                    'code' => '17006',
                ],
                6 => [
                    'name' => 'benhar',
                    'ar_name' => 'بنهار',
                    'code' => '17007',
                ],
                7 => [
                    'name' => 'beni yagoub',
                    'ar_name' => 'بن يعقوب',
                    'code' => '17008',
                ],
                8 => [
                    'name' => 'birine',
                    'ar_name' => 'البيرين',
                    'code' => '17009',
                ],
                9 => [
                    'name' => 'bouira lahdab',
                    'ar_name' => 'بويرة الأحداب',
                    'code' => '17010',
                ],
                10 => [
                    'name' => 'charef',
                    'ar_name' => 'الشارف',
                    'code' => '17011',
                ],
                11 => [
                    'name' => 'dar chioukh',
                    'ar_name' => 'دار الشيوخ',
                    'code' => '17012',
                ],
                12 => [
                    'name' => 'deldoul',
                    'ar_name' => 'دلدول',
                    'code' => '17013',
                ],
                13 => [
                    'name' => 'djelfa',
                    'ar_name' => 'الجلفة',
                    'code' => '17014',
                ],
                14 => [
                    'name' => 'douis',
                    'ar_name' => 'الدويس',
                    'code' => '17015',
                ],
                15 => [
                    'name' => 'el guedid',
                    'ar_name' => 'القديد',
                    'code' => '17016',
                ],
                16 => [
                    'name' => 'el idrissia',
                    'ar_name' => 'الإدريسية',
                    'code' => '17017',
                ],
                17 => [
                    'name' => 'el khemis',
                    'ar_name' => 'الخميس',
                    'code' => '17018',
                ],
                18 => [
                    'name' => 'faidh el botma',
                    'ar_name' => 'فيض البطمة',
                    'code' => '17019',
                ],
                19 => [
                    'name' => 'guernini',
                    'ar_name' => 'القرنيني',
                    'code' => '17020',
                ],
                20 => [
                    'name' => 'guettara',
                    'ar_name' => 'قطارة',
                    'code' => '17021',
                ],
                21 => [
                    'name' => 'had-sahary',
                    'ar_name' => 'حد الصحاري',
                    'code' => '17022',
                ],
                22 => [
                    'name' => 'hassi bahbah',
                    'ar_name' => 'حاسي بحبح',
                    'code' => '17023',
                ],
                23 => [
                    'name' => 'hassi el euch',
                    'ar_name' => 'حاسي العش',
                    'code' => '17024',
                ],
                24 => [
                    'name' => 'hassi fedoul',
                    'ar_name' => 'حاسي فدول',
                    'code' => '17025',
                ],
                25 => [
                    'name' => 'messaad',
                    'ar_name' => 'مسعد',
                    'code' => '17026',
                ],
                26 => [
                    'name' => 'm\'liliha',
                    'ar_name' => 'مليليحة',
                    'code' => '17027',
                ],
                27 => [
                    'name' => 'moudjebara',
                    'ar_name' => 'مجبارة',
                    'code' => '17028',
                ],
                28 => [
                    'name' => 'oum laadham',
                    'ar_name' => 'أم العظام',
                    'code' => '17029',
                ],
                29 => [
                    'name' => 'sed rahal',
                    'ar_name' => 'سد رحال',
                    'code' => '17030',
                ],
                30 => [
                    'name' => 'selmana',
                    'ar_name' => 'سلمانة',
                    'code' => '17031',
                ],
                31 => [
                    'name' => 'sidi baizid',
                    'ar_name' => 'سيدي بايزيد',
                    'code' => '17032',
                ],
                32 => [
                    'name' => 'sidi ladjel',
                    'ar_name' => 'سيدي لعجال',
                    'code' => '17033',
                ],
                33 => [
                    'name' => 'tadmit',
                    'ar_name' => 'تعضميت',
                    'code' => '17034',
                ],
                34 => [
                    'name' => 'zaafrane',
                    'ar_name' => 'الزعفران',
                    'code' => '17035',
                ],
                35 => [
                    'name' => 'zaccar',
                    'ar_name' => 'زكار',
                    'code' => '17036',
                ],
            ],
            18 => [
                0 => [
                    'name' => 'jijel',
                    'ar_name' => 'جيجل',
                    'code' => '18001',
                ],
                1 => [
                    'name' => 'eraguene',
                    'ar_name' => 'إيراقن سويسي',
                    'code' => '18002',
                ],
                2 => [
                    'name' => 'el aouana',
                    'ar_name' => 'العوانة',
                    'code' => '18003',
                ],
                3 => [
                    'name' => 'ziama mansouriah',
                    'ar_name' => 'زيامة منصورية',
                    'code' => '18004',
                ],
                4 => [
                    'name' => 'taher',
                    'ar_name' => 'الطاهير',
                    'code' => '18005',
                ],
                5 => [
                    'name' => 'emir abdelkader',
                    'ar_name' => 'الأمير عبد القادر',
                    'code' => '18006',
                ],
                6 => [
                    'name' => 'chekfa',
                    'ar_name' => 'الشقفة',
                    'code' => '18007',
                ],
                7 => [
                    'name' => 'chahna',
                    'ar_name' => 'الشحنة',
                    'code' => '18008',
                ],
                8 => [
                    'name' => 'el milia',
                    'ar_name' => 'الميلية',
                    'code' => '18009',
                ],
                9 => [
                    'name' => 'sidi maarouf',
                    'ar_name' => 'سيدي معروف',
                    'code' => '18010',
                ],
                10 => [
                    'name' => 'settara',
                    'ar_name' => 'السطارة',
                    'code' => '18011',
                ],
                11 => [
                    'name' => 'el ancer',
                    'ar_name' => 'العنصر',
                    'code' => '18012',
                ],
                12 => [
                    'name' => 'sidi abdelaziz',
                    'ar_name' => 'سيدي عبد العزيز',
                    'code' => '18013',
                ],
                13 => [
                    'name' => 'kaous',
                    'ar_name' => 'قاوس',
                    'code' => '18014',
                ],
                14 => [
                    'name' => 'ghebala',
                    'ar_name' => 'غبالة',
                    'code' => '18015',
                ],
                15 => [
                    'name' => 'bouraoui belhadef',
                    'ar_name' => 'بوراوي بلهادف',
                    'code' => '18016',
                ],
                16 => [
                    'name' => 'djimla',
                    'ar_name' => 'جيملة',
                    'code' => '18017',
                ],
                17 => [
                    'name' => 'selma benziada',
                    'ar_name' => 'سلمى بن زيادة',
                    'code' => '18018',
                ],
                18 => [
                    'name' => 'boucif ouled askeur',
                    'ar_name' => 'بوسيف أولاد عسكر',
                    'code' => '18019',
                ],
                19 => [
                    'name' => 'el kennar nouchfi',
                    'ar_name' => 'القنار',
                    'code' => '18020',
                ],
                20 => [
                    'name' => 'ouled yahia khedrouche',
                    'ar_name' => 'أولاد يحيى خدروش',
                    'code' => '18021',
                ],
                21 => [
                    'name' => 'boudriaa ben yadjis',
                    'ar_name' => 'بودريعة بن ياجيس',
                    'code' => '18022',
                ],
                22 => [
                    'name' => 'kheïri oued adjoul',
                    'ar_name' => 'خيري وادي العجول',
                    'code' => '18023',
                ],
                23 => [
                    'name' => 'texenna',
                    'ar_name' => 'تاكسنة',
                    'code' => '18024',
                ],
                24 => [
                    'name' => 'djemaa beni habibi',
                    'ar_name' => 'الجمعة بني حبيبي',
                    'code' => '18025',
                ],
                25 => [
                    'name' => 'bordj tahar',
                    'ar_name' => 'برج الطهر',
                    'code' => '18026',
                ],
                26 => [
                    'name' => 'ouled rabah',
                    'ar_name' => 'أولاد رابح',
                    'code' => '18027',
                ],
                27 => [
                    'name' => 'ouadjana',
                    'ar_name' => 'وجانة',
                    'code' => '18028',
                ],
            ],
            19 => [
                0 => [
                    'name' => 'aïn abessa',
                    'ar_name' => 'عين عباسة',
                    'code' => '19001',
                ],
                1 => [
                    'name' => 'aïn arnat',
                    'ar_name' => 'عين أرنات',
                    'code' => '19002',
                ],
                2 => [
                    'name' => 'aïn azel',
                    'ar_name' => 'عين آزال',
                    'code' => '19003',
                ],
                3 => [
                    'name' => 'aïn el kebira',
                    'ar_name' => 'عين الكبيرة',
                    'code' => '19004',
                ],
                4 => [
                    'name' => 'aïn lahdjar',
                    'ar_name' => 'عين الحجر',
                    'code' => '19005',
                ],
                5 => [
                    'name' => 'aïn legradj',
                    'ar_name' => 'عين لقراج',
                    'code' => '19006',
                ],
                6 => [
                    'name' => 'aïn oulmene',
                    'ar_name' => 'عين ولمان',
                    'code' => '19007',
                ],
                7 => [
                    'name' => 'aïn roua',
                    'ar_name' => 'عين الروى',
                    'code' => '19008',
                ],
                8 => [
                    'name' => 'aïn sebt',
                    'ar_name' => 'عين السبت',
                    'code' => '19009',
                ],
                9 => [
                    'name' => 'aït naoual mezada',
                    'ar_name' => 'آيت نوال مزادة',
                    'code' => '19010',
                ],
                10 => [
                    'name' => 'aït tizi',
                    'ar_name' => 'آيت تيزي',
                    'code' => '19011',
                ],
                11 => [
                    'name' => 'beni ouartilene',
                    'ar_name' => 'بني ورتيلان',
                    'code' => '19012',
                ],
                12 => [
                    'name' => 'amoucha',
                    'ar_name' => 'عموشة',
                    'code' => '19013',
                ],
                13 => [
                    'name' => 'babor',
                    'ar_name' => 'بابور',
                    'code' => '19014',
                ],
                14 => [
                    'name' => 'bazer sakhra',
                    'ar_name' => 'بازر الصخرة',
                    'code' => '19015',
                ],
                15 => [
                    'name' => 'beidha bordj',
                    'ar_name' => 'بيضاء برج',
                    'code' => '19016',
                ],
                16 => [
                    'name' => 'belaa',
                    'ar_name' => 'بلاعة',
                    'code' => '19017',
                ],
                17 => [
                    'name' => 'beni aziz',
                    'ar_name' => 'بني عزيز',
                    'code' => '19018',
                ],
                18 => [
                    'name' => 'beni chebana',
                    'ar_name' => 'بني شبانة',
                    'code' => '19019',
                ],
                19 => [
                    'name' => 'beni fouda',
                    'ar_name' => 'بني فودة',
                    'code' => '19020',
                ],
                20 => [
                    'name' => 'beni hocine',
                    'ar_name' => 'بني حسين',
                    'code' => '19021',
                ],
                21 => [
                    'name' => 'beni mouhli',
                    'ar_name' => 'بني محلي',
                    'code' => '19022',
                ],
                22 => [
                    'name' => 'bir el arch',
                    'ar_name' => 'بئر العرش',
                    'code' => '19023',
                ],
                23 => [
                    'name' => 'bir haddada',
                    'ar_name' => 'بئر حدادة',
                    'code' => '19024',
                ],
                24 => [
                    'name' => 'bouandas',
                    'ar_name' => 'بوعنداس',
                    'code' => '19025',
                ],
                25 => [
                    'name' => 'bougaa',
                    'ar_name' => 'بوقاعة',
                    'code' => '19026',
                ],
                26 => [
                    'name' => 'bousselam',
                    'ar_name' => 'بوسلام',
                    'code' => '19027',
                ],
                27 => [
                    'name' => 'boutaleb',
                    'ar_name' => 'بوطالب',
                    'code' => '19028',
                ],
                28 => [
                    'name' => 'dehamcha',
                    'ar_name' => 'الدهامشة',
                    'code' => '19029',
                ],
                29 => [
                    'name' => 'djemila',
                    'ar_name' => 'جميلة',
                    'code' => '19030',
                ],
                30 => [
                    'name' => 'draa kebila',
                    'ar_name' => 'ذراع قبيلة',
                    'code' => '19031',
                ],
                31 => [
                    'name' => 'el eulma',
                    'ar_name' => 'العلمة',
                    'code' => '19032',
                ],
                32 => [
                    'name' => 'el ouldja',
                    'ar_name' => 'الولجة',
                    'code' => '19033',
                ],
                33 => [
                    'name' => 'el ouricia',
                    'ar_name' => 'الأوريسية',
                    'code' => '19034',
                ],
                34 => [
                    'name' => 'guellal',
                    'ar_name' => 'قلال',
                    'code' => '19035',
                ],
                35 => [
                    'name' => 'guelta zerka',
                    'ar_name' => 'القلتة الزرقاء',
                    'code' => '19036',
                ],
                36 => [
                    'name' => 'guenzet',
                    'ar_name' => 'قنزات',
                    'code' => '19037',
                ],
                37 => [
                    'name' => 'guidjel',
                    'ar_name' => 'قجال',
                    'code' => '19038',
                ],
                38 => [
                    'name' => 'hamma',
                    'ar_name' => 'الحامة',
                    'code' => '19039',
                ],
                39 => [
                    'name' => 'hammam guergour',
                    'ar_name' => 'حمام قرقور',
                    'code' => '19040',
                ],
                40 => [
                    'name' => 'hammam soukhna',
                    'ar_name' => 'حمام السخنة',
                    'code' => '19041',
                ],
                41 => [
                    'name' => 'harbil',
                    'ar_name' => 'حربيل',
                    'code' => '19042',
                ],
                42 => [
                    'name' => 'ksar el abtal',
                    'ar_name' => 'قصر الأبطال',
                    'code' => '19043',
                ],
                43 => [
                    'name' => 'maaouia',
                    'ar_name' => 'معاوية',
                    'code' => '19044',
                ],
                44 => [
                    'name' => 'maoklane',
                    'ar_name' => 'ماوكلان',
                    'code' => '19045',
                ],
                45 => [
                    'name' => 'mezloug',
                    'ar_name' => 'مزلوق',
                    'code' => '19046',
                ],
                46 => [
                    'name' => 'oued el barad',
                    'ar_name' => 'واد البارد',
                    'code' => '19047',
                ],
                47 => [
                    'name' => 'ouled addouane',
                    'ar_name' => 'أولاد عدوان',
                    'code' => '19048',
                ],
                48 => [
                    'name' => 'ouled sabor',
                    'ar_name' => 'أولاد صابر',
                    'code' => '19049',
                ],
                49 => [
                    'name' => 'ouled si ahmed',
                    'ar_name' => 'أولاد سي أحمد',
                    'code' => '19050',
                ],
                50 => [
                    'name' => 'ouled tebben',
                    'ar_name' => 'أولاد تبان',
                    'code' => '19051',
                ],
                51 => [
                    'name' => 'rasfa',
                    'ar_name' => 'الرصفة',
                    'code' => '19052',
                ],
                52 => [
                    'name' => 'salah bey',
                    'ar_name' => 'صالح باي',
                    'code' => '19053',
                ],
                53 => [
                    'name' => 'serdj el ghoul',
                    'ar_name' => 'سرج الغول',
                    'code' => '19054',
                ],
                54 => [
                    'name' => 'sétif',
                    'ar_name' => 'سطيف',
                    'code' => '19055',
                ],
                55 => [
                    'name' => 'tachouda',
                    'ar_name' => 'تاشودة',
                    'code' => '19056',
                ],
                56 => [
                    'name' => 'talaifacene',
                    'ar_name' => 'تالة ايفاسن',
                    'code' => '19057',
                ],
                57 => [
                    'name' => 'taya',
                    'ar_name' => 'الطاية',
                    'code' => '19058',
                ],
                58 => [
                    'name' => 'tella',
                    'ar_name' => 'التلة',
                    'code' => '19059',
                ],
                59 => [
                    'name' => 'tizi n\'bechar',
                    'ar_name' => 'تيزي نبشار',
                    'code' => '19060',
                ],
            ],
            20 => [
                0 => [
                    'name' => 'aïn el hadjar',
                    'ar_name' => 'عين الحجر',
                    'code' => '20001',
                ],
                1 => [
                    'name' => 'aïn sekhouna',
                    'ar_name' => 'عين السخونة',
                    'code' => '20002',
                ],
                2 => [
                    'name' => 'aïn soltane',
                    'ar_name' => 'عين سلطان',
                    'code' => '20003',
                ],
                3 => [
                    'name' => 'doui thabet',
                    'ar_name' => 'ذوي ثابت',
                    'code' => '20004',
                ],
                4 => [
                    'name' => 'el hassasna',
                    'ar_name' => 'الحساسنة',
                    'code' => '20005',
                ],
                5 => [
                    'name' => 'hounet',
                    'ar_name' => 'هونة',
                    'code' => '20006',
                ],
                6 => [
                    'name' => 'maamora',
                    'ar_name' => 'المعمورة',
                    'code' => '20007',
                ],
                7 => [
                    'name' => 'moulay larbi',
                    'ar_name' => 'مولاي لعربي',
                    'code' => '20008',
                ],
                8 => [
                    'name' => 'ouled brahim',
                    'ar_name' => 'أولاد إبراهيم',
                    'code' => '20009',
                ],
                9 => [
                    'name' => 'ouled khaled',
                    'ar_name' => 'أولاد خالد',
                    'code' => '20010',
                ],
                10 => [
                    'name' => 'saïda',
                    'ar_name' => 'سعيدة',
                    'code' => '20011',
                ],
                11 => [
                    'name' => 'sidi ahmed',
                    'ar_name' => 'سیدی احمد',
                    'code' => '20012',
                ],
                12 => [
                    'name' => 'sidi amar',
                    'ar_name' => 'سيدي اعمر',
                    'code' => '20013',
                ],
                13 => [
                    'name' => 'sidi boubekeur',
                    'ar_name' => 'سيدي بوبكر',
                    'code' => '20014',
                ],
                14 => [
                    'name' => 'tircine',
                    'ar_name' => 'تيرسين',
                    'code' => '20015',
                ],
                15 => [
                    'name' => 'youb',
                    'ar_name' => 'يوب',
                    'code' => '20016',
                ],
            ],
            21 => [
                0 => [
                    'name' => 'aïn bouziane',
                    'ar_name' => 'عين بوزيان',
                    'code' => '21001',
                ],
                1 => [
                    'name' => 'aïn charchar',
                    'ar_name' => 'عين شرشار',
                    'code' => '21002',
                ],
                2 => [
                    'name' => 'aïn kechra',
                    'ar_name' => 'عين قشرة',
                    'code' => '21003',
                ],
                3 => [
                    'name' => 'aïn zouit',
                    'ar_name' => 'عين زويت',
                    'code' => '21004',
                ],
                4 => [
                    'name' => 'azzaba',
                    'ar_name' => 'عزابة',
                    'code' => '21005',
                ],
                5 => [
                    'name' => 'bekkouche lakhdar',
                    'ar_name' => 'بكوش لخضر',
                    'code' => '21006',
                ],
                6 => [
                    'name' => 'bin el ouiden',
                    'ar_name' => 'بين الويدان',
                    'code' => '21007',
                ],
                7 => [
                    'name' => 'ben azzouz',
                    'ar_name' => 'بن عزوز',
                    'code' => '21008',
                ],
                8 => [
                    'name' => 'beni bechir',
                    'ar_name' => 'بني بشير',
                    'code' => '21009',
                ],
                9 => [
                    'name' => 'beni oulbane',
                    'ar_name' => 'بني ولبان',
                    'code' => '21010',
                ],
                10 => [
                    'name' => 'beni zid',
                    'ar_name' => 'بني زيد',
                    'code' => '21011',
                ],
                11 => [
                    'name' => 'bouchtata',
                    'ar_name' => 'بوشطاطة',
                    'code' => '21012',
                ],
                12 => [
                    'name' => 'cheraia',
                    'ar_name' => 'الشرايع',
                    'code' => '21013',
                ],
                13 => [
                    'name' => 'collo',
                    'ar_name' => 'القل',
                    'code' => '21014',
                ],
                14 => [
                    'name' => 'djendel saadi mohamed',
                    'ar_name' => 'جندل',
                    'code' => '21015',
                ],
                15 => [
                    'name' => 'el ghedir',
                    'ar_name' => 'لغدير',
                    'code' => '21016',
                ],
                16 => [
                    'name' => 'el hadaiek',
                    'ar_name' => 'الحدائق',
                    'code' => '21017',
                ],
                17 => [
                    'name' => 'el harrouch',
                    'ar_name' => 'الحروش',
                    'code' => '21018',
                ],
                18 => [
                    'name' => 'el marsa',
                    'ar_name' => 'المرسى',
                    'code' => '21019',
                ],
                19 => [
                    'name' => 'emdjez edchich',
                    'ar_name' => 'أمجاز الدشيش',
                    'code' => '21020',
                ],
                20 => [
                    'name' => 'es sebt',
                    'ar_name' => 'السبت',
                    'code' => '21021',
                ],
                21 => [
                    'name' => 'filfila',
                    'ar_name' => 'فلفلة',
                    'code' => '21022',
                ],
                22 => [
                    'name' => 'hamadi krouma',
                    'ar_name' => 'حمادي كرومة',
                    'code' => '21023',
                ],
                23 => [
                    'name' => 'kanoua',
                    'ar_name' => 'قنواع',
                    'code' => '21024',
                ],
                24 => [
                    'name' => 'kerkera',
                    'ar_name' => 'الكركرة',
                    'code' => '21025',
                ],
                25 => [
                    'name' => 'kheneg mayoum',
                    'ar_name' => 'خناق مايون',
                    'code' => '21026',
                ],
                26 => [
                    'name' => 'oued zehour',
                    'ar_name' => 'وادي الزهور',
                    'code' => '21027',
                ],
                27 => [
                    'name' => 'ouldja boulballout',
                    'ar_name' => 'الوجلة بوالبلوط',
                    'code' => '21028',
                ],
                28 => [
                    'name' => 'ouled attia',
                    'ar_name' => 'أولاد عطية',
                    'code' => '21029',
                ],
                29 => [
                    'name' => 'ouled hbaba',
                    'ar_name' => 'أولاد أحبابة',
                    'code' => '21030',
                ],
                30 => [
                    'name' => 'oum toub',
                    'ar_name' => 'أم الطوب',
                    'code' => '21031',
                ],
                31 => [
                    'name' => 'ramdane djamel',
                    'ar_name' => 'رمضان جمال',
                    'code' => '21032',
                ],
                32 => [
                    'name' => 'salah bouchaour',
                    'ar_name' => 'صالح بوالشعور',
                    'code' => '21033',
                ],
                33 => [
                    'name' => 'sidi mezghiche',
                    'ar_name' => 'سيدي مزغيش',
                    'code' => '21034',
                ],
                34 => [
                    'name' => 'skikda',
                    'ar_name' => 'سكيكدة',
                    'code' => '21035',
                ],
                35 => [
                    'name' => 'tamalous',
                    'ar_name' => 'تمالوس',
                    'code' => '21036',
                ],
                36 => [
                    'name' => 'zerdaza',
                    'ar_name' => 'زردازة',
                    'code' => '21037',
                ],
                37 => [
                    'name' => 'zitouna',
                    'ar_name' => 'زيتونة',
                    'code' => '21038',
                ],
            ],
            22 => [
                0 => [
                    'name' => 'aïn adden',
                    'ar_name' => 'عين أدان',
                    'code' => '22001',
                ],
                1 => [
                    'name' => 'aïn el berd',
                    'ar_name' => 'عين البرد',
                    'code' => '22002',
                ],
                2 => [
                    'name' => 'aïn kada',
                    'ar_name' => 'عين قادة',
                    'code' => '22003',
                ],
                3 => [
                    'name' => 'aïn thrid',
                    'ar_name' => 'عين الثريد',
                    'code' => '22004',
                ],
                4 => [
                    'name' => 'aïn tindamine',
                    'ar_name' => 'عين تندامين',
                    'code' => '22005',
                ],
                5 => [
                    'name' => 'amarnas',
                    'ar_name' => 'العمارنة',
                    'code' => '22006',
                ],
                6 => [
                    'name' => 'badredine el mokrani',
                    'ar_name' => 'بدر الدين المقراني',
                    'code' => '22007',
                ],
                7 => [
                    'name' => 'belarbi',
                    'ar_name' => 'بلعربي',
                    'code' => '22008',
                ],
                8 => [
                    'name' => 'ben badis',
                    'ar_name' => 'بن باديس',
                    'code' => '22009',
                ],
                9 => [
                    'name' => 'benachiba chelia',
                    'ar_name' => 'بن عشيبة شلية',
                    'code' => '22010',
                ],
                10 => [
                    'name' => 'bir el hammam',
                    'ar_name' => 'بئر الحمام',
                    'code' => '22011',
                ],
                11 => [
                    'name' => 'boudjebaa el bordj',
                    'ar_name' => 'بوجبهة البرج',
                    'code' => '22012',
                ],
                12 => [
                    'name' => 'boukhanafis',
                    'ar_name' => 'بوخنيفيس',
                    'code' => '22013',
                ],
                13 => [
                    'name' => 'chettouane belaila',
                    'ar_name' => 'شيطوان بليلة',
                    'code' => '22014',
                ],
                14 => [
                    'name' => 'dhaya',
                    'ar_name' => 'الضاية',
                    'code' => '22015',
                ],
                15 => [
                    'name' => 'el haçaiba',
                    'ar_name' => 'الحصيبة',
                    'code' => '22016',
                ],
                16 => [
                    'name' => 'hassi dahou',
                    'ar_name' => 'حاسي دحو',
                    'code' => '22017',
                ],
                17 => [
                    'name' => 'hassi zehana',
                    'ar_name' => 'حاسي زهانة',
                    'code' => '22018',
                ],
                18 => [
                    'name' => 'lamtar',
                    'ar_name' => 'لمطار',
                    'code' => '22019',
                ],
                19 => [
                    'name' => 'makedra',
                    'ar_name' => 'مقدرة',
                    'code' => '22020',
                ],
                20 => [
                    'name' => 'marhoum',
                    'ar_name' => 'مرحوم',
                    'code' => '22021',
                ],
                21 => [
                    'name' => 'm\'cid',
                    'ar_name' => 'مسيد',
                    'code' => '22022',
                ],
                22 => [
                    'name' => 'merine',
                    'ar_name' => 'مرين',
                    'code' => '22023',
                ],
                23 => [
                    'name' => 'mezaourou',
                    'ar_name' => 'مزاورو',
                    'code' => '22024',
                ],
                24 => [
                    'name' => 'mostefa ben brahim',
                    'ar_name' => 'مصطفى بن إبراهيم',
                    'code' => '22025',
                ],
                25 => [
                    'name' => 'moulay slissen',
                    'ar_name' => 'مولاي سليسن',
                    'code' => '22026',
                ],
                26 => [
                    'name' => 'oued sebaa',
                    'ar_name' => 'واد السبع',
                    'code' => '22027',
                ],
                27 => [
                    'name' => 'oued sefioun',
                    'ar_name' => 'واد سفيون',
                    'code' => '22028',
                ],
                28 => [
                    'name' => 'oued taourira',
                    'ar_name' => 'واد تاوريرة',
                    'code' => '22029',
                ],
                29 => [
                    'name' => 'ras el ma',
                    'ar_name' => 'رأس الماء',
                    'code' => '22030',
                ],
                30 => [
                    'name' => 'redjem demouche',
                    'ar_name' => 'رجم دموش',
                    'code' => '22031',
                ],
                31 => [
                    'name' => 'sehala thaoura',
                    'ar_name' => 'سهالة ثاورة',
                    'code' => '22032',
                ],
                32 => [
                    'name' => 'sfisef',
                    'ar_name' => 'سفيزف',
                    'code' => '22033',
                ],
                33 => [
                    'name' => 'sidi ali benyoub',
                    'ar_name' => 'سيدي علي بن يوب',
                    'code' => '22034',
                ],
                34 => [
                    'name' => 'sidi ali boussidi',
                    'ar_name' => 'سيدي علي بوسيدي',
                    'code' => '22035',
                ],
                35 => [
                    'name' => 'sidi bel abbes',
                    'ar_name' => 'سيدي بلعباس',
                    'code' => '22036',
                ],
                36 => [
                    'name' => 'sidi brahim',
                    'ar_name' => 'سيدي إبراهيم',
                    'code' => '22037',
                ],
                37 => [
                    'name' => 'sidi chaib',
                    'ar_name' => 'سيدي شعيب',
                    'code' => '22038',
                ],
                38 => [
                    'name' => 'sidi daho des zairs',
                    'ar_name' => 'سيدي دحو الزائر',
                    'code' => '22039',
                ],
                39 => [
                    'name' => 'sidi hamadouche',
                    'ar_name' => 'سيدي حمادوش',
                    'code' => '22040',
                ],
                40 => [
                    'name' => 'sidi khaled',
                    'ar_name' => 'سيدي خالد',
                    'code' => '22041',
                ],
                41 => [
                    'name' => 'sidi lahcene',
                    'ar_name' => 'سيدي لحسن',
                    'code' => '22042',
                ],
                42 => [
                    'name' => 'sidi yacoub',
                    'ar_name' => 'سيدي يعقوب',
                    'code' => '22043',
                ],
                43 => [
                    'name' => 'tabia',
                    'ar_name' => 'طابية',
                    'code' => '22044',
                ],
                44 => [
                    'name' => 'tafissour',
                    'ar_name' => 'تفسور',
                    'code' => '22045',
                ],
                45 => [
                    'name' => 'taoudmout',
                    'ar_name' => 'تاودموت',
                    'code' => '22046',
                ],
                46 => [
                    'name' => 'teghalimet',
                    'ar_name' => 'تغاليمت',
                    'code' => '22047',
                ],
                47 => [
                    'name' => 'telagh',
                    'ar_name' => 'تلاغ',
                    'code' => '22048',
                ],
                48 => [
                    'name' => 'tenira',
                    'ar_name' => 'تنيرة',
                    'code' => '22049',
                ],
                49 => [
                    'name' => 'tessala',
                    'ar_name' => 'تسالة',
                    'code' => '22050',
                ],
                50 => [
                    'name' => 'tilmouni',
                    'ar_name' => 'تلموني',
                    'code' => '22051',
                ],
                51 => [
                    'name' => 'zerouala',
                    'ar_name' => 'زروالة',
                    'code' => '22052',
                ],
            ],
            23 => [
                0 => [
                    'name' => 'annaba',
                    'ar_name' => 'عنابة',
                    'code' => '23001',
                ],
                1 => [
                    'name' => 'berrahal',
                    'ar_name' => 'برحال',
                    'code' => '23002',
                ],
                2 => [
                    'name' => 'el hadjar',
                    'ar_name' => 'الحجار',
                    'code' => '23003',
                ],
                3 => [
                    'name' => 'eulma',
                    'ar_name' => 'العلمة',
                    'code' => '23004',
                ],
                4 => [
                    'name' => 'el bouni',
                    'ar_name' => 'البوني',
                    'code' => '23005',
                ],
                5 => [
                    'name' => 'oued el aneb',
                    'ar_name' => 'وادي العنب',
                    'code' => '23006',
                ],
                6 => [
                    'name' => 'cheurfa',
                    'ar_name' => 'الشرفة',
                    'code' => '23007',
                ],
                7 => [
                    'name' => 'seraïdi',
                    'ar_name' => 'سرايدي',
                    'code' => '23008',
                ],
                8 => [
                    'name' => 'aïn berda',
                    'ar_name' => 'عين الباردة',
                    'code' => '23009',
                ],
                9 => [
                    'name' => 'chetaïbi',
                    'ar_name' => 'شطايبي',
                    'code' => '23010',
                ],
                10 => [
                    'name' => 'sidi amar',
                    'ar_name' => 'سيدي عمار',
                    'code' => '23011',
                ],
                11 => [
                    'name' => 'treat',
                    'ar_name' => 'تريعات',
                    'code' => '23012',
                ],
            ],
            24 => [
                0 => [
                    'name' => 'aïn ben beida',
                    'ar_name' => 'عين بن بيضاء',
                    'code' => '24001',
                ],
                1 => [
                    'name' => 'aïn larbi',
                    'ar_name' => 'عين العربي',
                    'code' => '24002',
                ],
                2 => [
                    'name' => 'aïn makhlouf',
                    'ar_name' => 'عين مخلوف',
                    'code' => '24003',
                ],
                3 => [
                    'name' => 'aïn reggada',
                    'ar_name' => 'عين رقادة',
                    'code' => '24004',
                ],
                4 => [
                    'name' => 'aïn sandel',
                    'ar_name' => 'عين صندل',
                    'code' => '24005',
                ],
                5 => [
                    'name' => 'belkheir',
                    'ar_name' => 'بلخير',
                    'code' => '24006',
                ],
                6 => [
                    'name' => 'ben djerrah',
                    'ar_name' => 'بن جراح',
                    'code' => '24007',
                ],
                7 => [
                    'name' => 'beni mezline',
                    'ar_name' => 'بني مزلين',
                    'code' => '24008',
                ],
                8 => [
                    'name' => 'bordj sabath',
                    'ar_name' => 'برج صباط',
                    'code' => '24009',
                ],
                9 => [
                    'name' => 'bouhachana',
                    'ar_name' => 'بوحشانة',
                    'code' => '24010',
                ],
                10 => [
                    'name' => 'bouhamdane',
                    'ar_name' => 'بوحمدان',
                    'code' => '24011',
                ],
                11 => [
                    'name' => 'bouati mahmoud',
                    'ar_name' => 'بوعاطي محمود',
                    'code' => '24012',
                ],
                12 => [
                    'name' => 'bouchegouf',
                    'ar_name' => 'بوشقوف',
                    'code' => '24013',
                ],
                13 => [
                    'name' => 'boumahra ahmed',
                    'ar_name' => 'بومهرة أحمد',
                    'code' => '24014',
                ],
                14 => [
                    'name' => 'dahouara',
                    'ar_name' => 'الدهوارة',
                    'code' => '24015',
                ],
                15 => [
                    'name' => 'djeballah khemissi',
                    'ar_name' => 'جبالة لخميسي',
                    'code' => '24016',
                ],
                16 => [
                    'name' => 'el fedjoudj',
                    'ar_name' => 'الفجوج',
                    'code' => '24017',
                ],
                17 => [
                    'name' => 'guellat bou sbaa',
                    'ar_name' => 'قلعة بوصبع',
                    'code' => '24018',
                ],
                18 => [
                    'name' => 'guelma',
                    'ar_name' => 'قالمة',
                    'code' => '24019',
                ],
                19 => [
                    'name' => 'hammam debagh',
                    'ar_name' => 'حمام دباغ',
                    'code' => '24020',
                ],
                20 => [
                    'name' => 'hammam n\'bail',
                    'ar_name' => 'حمام النبايل',
                    'code' => '24021',
                ],
                21 => [
                    'name' => 'héliopolis',
                    'ar_name' => 'هيليوبوليس',
                    'code' => '24022',
                ],
                22 => [
                    'name' => 'houari boumédiène',
                    'ar_name' => 'هواري بومدين',
                    'code' => '24023',
                ],
                23 => [
                    'name' => 'khezarra',
                    'ar_name' => 'لخزارة',
                    'code' => '24024',
                ],
                24 => [
                    'name' => 'medjez amar',
                    'ar_name' => 'مجاز عمار',
                    'code' => '24025',
                ],
                25 => [
                    'name' => 'medjez sfa',
                    'ar_name' => 'مجاز الصفاء',
                    'code' => '24026',
                ],
                26 => [
                    'name' => 'nechmaya',
                    'ar_name' => 'نشماية',
                    'code' => '24027',
                ],
                27 => [
                    'name' => 'oued cheham',
                    'ar_name' => 'وادي الشحم',
                    'code' => '24028',
                ],
                28 => [
                    'name' => 'oued fragha',
                    'ar_name' => 'وادي فراغة',
                    'code' => '24029',
                ],
                29 => [
                    'name' => 'oued zenati',
                    'ar_name' => 'وادي الزناتي',
                    'code' => '24030',
                ],
                30 => [
                    'name' => 'ras el agba',
                    'ar_name' => 'راس العقبة',
                    'code' => '24031',
                ],
                31 => [
                    'name' => 'roknia',
                    'ar_name' => 'الركنية',
                    'code' => '24032',
                ],
                32 => [
                    'name' => 'sellaoua announa',
                    'ar_name' => 'سلاوة عنونة',
                    'code' => '24033',
                ],
                33 => [
                    'name' => 'tamlouka',
                    'ar_name' => 'تاملوكة',
                    'code' => '24034',
                ],
            ],
            25 => [
                0 => [
                    'name' => 'aïn abid',
                    'ar_name' => 'عين عبيد',
                    'code' => '25001',
                ],
                1 => [
                    'name' => 'aïn smara',
                    'ar_name' => 'عين سمارة',
                    'code' => '25002',
                ],
                2 => [
                    'name' => 'beni hamiden',
                    'ar_name' => 'بني حميدان',
                    'code' => '25003',
                ],
                3 => [
                    'name' => 'constantine',
                    'ar_name' => 'قسنطينة',
                    'code' => '25004',
                ],
                4 => [
                    'name' => 'didouche mourad',
                    'ar_name' => 'ديدوش مراد',
                    'code' => '25005',
                ],
                5 => [
                    'name' => 'el khroub',
                    'ar_name' => 'الخروب',
                    'code' => '25006',
                ],
                6 => [
                    'name' => 'hamma bouziane',
                    'ar_name' => 'حامة بوزيان',
                    'code' => '25007',
                ],
                7 => [
                    'name' => 'ibn badis',
                    'ar_name' => 'ابن باديس',
                    'code' => '25008',
                ],
                8 => [
                    'name' => 'ibn ziad',
                    'ar_name' => 'ابن زياد',
                    'code' => '25009',
                ],
                9 => [
                    'name' => 'messaoud boudjriou',
                    'ar_name' => 'مسعود بوجريو',
                    'code' => '25010',
                ],
                10 => [
                    'name' => 'ouled rahmoune',
                    'ar_name' => 'أولاد رحمون',
                    'code' => '25011',
                ],
                11 => [
                    'name' => 'zighoud youcef',
                    'ar_name' => 'زيغود يوسف',
                    'code' => '25012',
                ],
            ],
            26 => [
                0 => [
                    'name' => 'aïn boucif',
                    'ar_name' => 'عين بوسيف',
                    'code' => '26001',
                ],
                1 => [
                    'name' => 'aïn ouksir',
                    'ar_name' => 'عين القصير',
                    'code' => '26002',
                ],
                2 => [
                    'name' => 'aissaouia',
                    'ar_name' => 'العيساوية',
                    'code' => '26003',
                ],
                3 => [
                    'name' => 'aziz',
                    'ar_name' => 'عزيز',
                    'code' => '26004',
                ],
                4 => [
                    'name' => 'baata',
                    'ar_name' => 'بعطة',
                    'code' => '26005',
                ],
                5 => [
                    'name' => 'benchicao',
                    'ar_name' => 'بن شكاو',
                    'code' => '26006',
                ],
                6 => [
                    'name' => 'beni slimane',
                    'ar_name' => 'بني سليمان',
                    'code' => '26007',
                ],
                7 => [
                    'name' => 'berrouaghia',
                    'ar_name' => 'البرواقية',
                    'code' => '26008',
                ],
                8 => [
                    'name' => 'bir ben laabed',
                    'ar_name' => 'بئر بن عابد',
                    'code' => '26009',
                ],
                9 => [
                    'name' => 'boghar',
                    'ar_name' => 'بوغار',
                    'code' => '26010',
                ],
                10 => [
                    'name' => 'bou aiche',
                    'ar_name' => 'بوعيش',
                    'code' => '26011',
                ],
                11 => [
                    'name' => 'bouaichoune',
                    'ar_name' => 'بوعيشون',
                    'code' => '26012',
                ],
                12 => [
                    'name' => 'bouchrahil',
                    'ar_name' => 'بوشراحيل',
                    'code' => '26013',
                ],
                13 => [
                    'name' => 'boughezoul',
                    'ar_name' => 'بوغزول',
                    'code' => '26014',
                ],
                14 => [
                    'name' => 'bouskene',
                    'ar_name' => 'بوسكن',
                    'code' => '26015',
                ],
                15 => [
                    'name' => 'chahbounia',
                    'ar_name' => 'الشهبونية',
                    'code' => '26016',
                ],
                16 => [
                    'name' => 'chellalet el adhaoura',
                    'ar_name' => 'شلالة العذاورة',
                    'code' => '26017',
                ],
                17 => [
                    'name' => 'cheniguel',
                    'ar_name' => 'شنيقل',
                    'code' => '26018',
                ],
                18 => [
                    'name' => 'derrag',
                    'ar_name' => 'دراق',
                    'code' => '26019',
                ],
                19 => [
                    'name' => 'deux bassins',
                    'ar_name' => 'فج الحوضين',
                    'code' => '26020',
                ],
                20 => [
                    'name' => 'djouab',
                    'ar_name' => 'جواب',
                    'code' => '26021',
                ],
                21 => [
                    'name' => 'draa essamar',
                    'ar_name' => 'ذراع السمار',
                    'code' => '26022',
                ],
                22 => [
                    'name' => 'el azizia',
                    'ar_name' => 'العزيزية',
                    'code' => '26023',
                ],
                23 => [
                    'name' => 'el guelb el kebir',
                    'ar_name' => 'القلب الكبير',
                    'code' => '26024',
                ],
                24 => [
                    'name' => 'el hamdania',
                    'ar_name' => 'الحمدانية',
                    'code' => '26025',
                ],
                25 => [
                    'name' => 'el omaria',
                    'ar_name' => 'العمارية',
                    'code' => '26026',
                ],
                26 => [
                    'name' => 'el ouinet',
                    'ar_name' => 'العوينات',
                    'code' => '26027',
                ],
                27 => [
                    'name' => 'hannacha',
                    'ar_name' => 'حناشة',
                    'code' => '26028',
                ],
                28 => [
                    'name' => 'kef lakhdar',
                    'ar_name' => 'الكاف الأخضر',
                    'code' => '26029',
                ],
                29 => [
                    'name' => 'khams djouamaa',
                    'ar_name' => 'خمس جوامع',
                    'code' => '26030',
                ],
                30 => [
                    'name' => 'ksar boukhari',
                    'ar_name' => 'قصر البخاري',
                    'code' => '26031',
                ],
                31 => [
                    'name' => 'meghraoua',
                    'ar_name' => 'مغراوة',
                    'code' => '26032',
                ],
                32 => [
                    'name' => 'médéa',
                    'ar_name' => 'المدية',
                    'code' => '26033',
                ],
                33 => [
                    'name' => 'moudjbar',
                    'ar_name' => 'مجبر',
                    'code' => '26034',
                ],
                34 => [
                    'name' => 'meftaha',
                    'ar_name' => 'المفاتحة',
                    'code' => '26035',
                ],
                35 => [
                    'name' => 'mezerana',
                    'ar_name' => 'مزغنة',
                    'code' => '26036',
                ],
                36 => [
                    'name' => 'mihoub',
                    'ar_name' => 'ميهوب',
                    'code' => '26037',
                ],
                37 => [
                    'name' => 'ouamri',
                    'ar_name' => 'وامري',
                    'code' => '26038',
                ],
                38 => [
                    'name' => 'oued harbil',
                    'ar_name' => 'وادي حربيل',
                    'code' => '26039',
                ],
                39 => [
                    'name' => 'ouled antar',
                    'ar_name' => 'أولاد عنتر',
                    'code' => '26040',
                ],
                40 => [
                    'name' => 'ouled bouachra',
                    'ar_name' => 'أولاد بوعشرة',
                    'code' => '26041',
                ],
                41 => [
                    'name' => 'ouled brahim',
                    'ar_name' => 'أولاد إبراهيم',
                    'code' => '26042',
                ],
                42 => [
                    'name' => 'ouled deide',
                    'ar_name' => 'أولاد دايد',
                    'code' => '26043',
                ],
                43 => [
                    'name' => 'ouled hellal',
                    'ar_name' => 'أولاد هلال',
                    'code' => '26044',
                ],
                44 => [
                    'name' => 'ouled maaref',
                    'ar_name' => 'أولاد معرف',
                    'code' => '26045',
                ],
                45 => [
                    'name' => 'oum el djalil',
                    'ar_name' => 'أم الجليل',
                    'code' => '26046',
                ],
                46 => [
                    'name' => 'ouzera',
                    'ar_name' => 'وزرة',
                    'code' => '26047',
                ],
                47 => [
                    'name' => 'rebaia',
                    'ar_name' => 'الربعية',
                    'code' => '26048',
                ],
                48 => [
                    'name' => 'saneg',
                    'ar_name' => 'سانق',
                    'code' => '26049',
                ],
                49 => [
                    'name' => 'sedraia',
                    'ar_name' => 'سدراية',
                    'code' => '26050',
                ],
                50 => [
                    'name' => 'seghouane',
                    'ar_name' => 'سغوان',
                    'code' => '26051',
                ],
                51 => [
                    'name' => 'si mahdjoub',
                    'ar_name' => 'سي المحجوب',
                    'code' => '26052',
                ],
                52 => [
                    'name' => 'sidi damed',
                    'ar_name' => 'سيدي دامد',
                    'code' => '26053',
                ],
                53 => [
                    'name' => 'sidi errabia',
                    'ar_name' => 'سيدي الربيع',
                    'code' => '26054',
                ],
                54 => [
                    'name' => 'sidi naamane',
                    'ar_name' => 'سيدي نعمان',
                    'code' => '26055',
                ],
                55 => [
                    'name' => 'sidi zahar',
                    'ar_name' => 'سيدي زهار',
                    'code' => '26056',
                ],
                56 => [
                    'name' => 'sidi ziane',
                    'ar_name' => 'سيدي زيان',
                    'code' => '26057',
                ],
                57 => [
                    'name' => 'souagui',
                    'ar_name' => 'السواقي',
                    'code' => '26058',
                ],
                58 => [
                    'name' => 'tablat',
                    'ar_name' => 'تابلاط',
                    'code' => '26059',
                ],
                59 => [
                    'name' => 'tafraout',
                    'ar_name' => 'تافراوت',
                    'code' => '26060',
                ],
                60 => [
                    'name' => 'tamesguida',
                    'ar_name' => 'تمزقيدة',
                    'code' => '26061',
                ],
                61 => [
                    'name' => 'tizi mahdi',
                    'ar_name' => 'تيزي المهدي',
                    'code' => '26062',
                ],
                62 => [
                    'name' => 'tlatet eddouar',
                    'ar_name' => 'ثلاثة الدوائر',
                    'code' => '26063',
                ],
                63 => [
                    'name' => 'zoubiria',
                    'ar_name' => 'الزبيرية',
                    'code' => '26064',
                ],
            ],
            27 => [
                0 => [
                    'name' => 'abdelmalek ramdane',
                    'ar_name' => 'بن عبد المالك رمضان',
                    'code' => '27001',
                ],
                1 => [
                    'name' => 'achaacha',
                    'ar_name' => 'عشعاشة',
                    'code' => '27002',
                ],
                2 => [
                    'name' => 'aïn boudinar',
                    'ar_name' => 'عين بودينار',
                    'code' => '27003',
                ],
                3 => [
                    'name' => 'aïn nouissy',
                    'ar_name' => 'عين النويصي',
                    'code' => '27004',
                ],
                4 => [
                    'name' => 'aïn sidi cherif',
                    'ar_name' => 'عين سيدي شريف',
                    'code' => '27005',
                ],
                5 => [
                    'name' => 'aïn tedles',
                    'ar_name' => 'عين تادلس',
                    'code' => '27006',
                ],
                6 => [
                    'name' => 'blad touahria',
                    'ar_name' => 'الطواهرية',
                    'code' => '27007',
                ],
                7 => [
                    'name' => 'bouguirat',
                    'ar_name' => 'بوقيرات',
                    'code' => '27008',
                ],
                8 => [
                    'name' => 'el hassiane',
                    'ar_name' => 'الحسيان',
                    'code' => '27009',
                ],
                9 => [
                    'name' => 'fornaka',
                    'ar_name' => 'فرناكة',
                    'code' => '27010',
                ],
                10 => [
                    'name' => 'hadjadj',
                    'ar_name' => 'حجاج',
                    'code' => '27011',
                ],
                11 => [
                    'name' => 'hassi mameche',
                    'ar_name' => 'حاسي مماش',
                    'code' => '27012',
                ],
                12 => [
                    'name' => 'khadra',
                    'ar_name' => 'خضرة',
                    'code' => '27013',
                ],
                13 => [
                    'name' => 'kheireddine',
                    'ar_name' => 'خير الدين',
                    'code' => '27014',
                ],
                14 => [
                    'name' => 'mansourah',
                    'ar_name' => 'منصورة',
                    'code' => '27015',
                ],
                15 => [
                    'name' => 'mesra',
                    'ar_name' => 'ماسرة',
                    'code' => '27016',
                ],
                16 => [
                    'name' => 'mazagran',
                    'ar_name' => 'مزغران',
                    'code' => '27017',
                ],
                17 => [
                    'name' => 'mostaganem',
                    'ar_name' => 'مستغانم',
                    'code' => '27018',
                ],
                18 => [
                    'name' => 'nekmaria',
                    'ar_name' => 'نقمارية',
                    'code' => '27019',
                ],
                19 => [
                    'name' => 'oued el kheir',
                    'ar_name' => 'واد الخير',
                    'code' => '27020',
                ],
                20 => [
                    'name' => 'ouled boughalem',
                    'ar_name' => 'أولاد بوغالم',
                    'code' => '27021',
                ],
                21 => [
                    'name' => 'ouled maallah',
                    'ar_name' => 'أولاد مع الله',
                    'code' => '27022',
                ],
                22 => [
                    'name' => 'safsaf',
                    'ar_name' => 'الصفصاف',
                    'code' => '27023',
                ],
                23 => [
                    'name' => 'sayada',
                    'ar_name' => 'صيادة',
                    'code' => '27024',
                ],
                24 => [
                    'name' => 'sidi ali',
                    'ar_name' => 'سيدي علي',
                    'code' => '27025',
                ],
                25 => [
                    'name' => 'sidi belattar',
                    'ar_name' => 'سيدي بلعطار',
                    'code' => '27026',
                ],
                26 => [
                    'name' => 'sidi lakhdar',
                    'ar_name' => 'سيدي لخضر',
                    'code' => '27027',
                ],
                27 => [
                    'name' => 'sirat',
                    'ar_name' => 'سيرات',
                    'code' => '27028',
                ],
                28 => [
                    'name' => 'souaflia',
                    'ar_name' => 'السوافلية',
                    'code' => '27029',
                ],
                29 => [
                    'name' => 'sour',
                    'ar_name' => 'الصور',
                    'code' => '27030',
                ],
                30 => [
                    'name' => 'stidia',
                    'ar_name' => 'ستيدية',
                    'code' => '27031',
                ],
                31 => [
                    'name' => 'tazgait',
                    'ar_name' => 'تازقايت',
                    'code' => '27032',
                ],
            ],
            28 => [
                0 => [
                    'name' => 'aïn el hadjel',
                    'ar_name' => 'عين الحجل',
                    'code' => '28001',
                ],
                1 => [
                    'name' => 'aïn el melh',
                    'ar_name' => 'عين الملح',
                    'code' => '28002',
                ],
                2 => [
                    'name' => 'aïn errich',
                    'ar_name' => 'عين الريش',
                    'code' => '28003',
                ],
                3 => [
                    'name' => 'aïn fares',
                    'ar_name' => 'عين فارس',
                    'code' => '28004',
                ],
                4 => [
                    'name' => 'aïn khadra',
                    'ar_name' => 'عين الخضراء',
                    'code' => '28005',
                ],
                5 => [
                    'name' => 'belaiba',
                    'ar_name' => 'بلعايبة',
                    'code' => '28006',
                ],
                6 => [
                    'name' => 'ben srour',
                    'ar_name' => 'بن سرور',
                    'code' => '28007',
                ],
                7 => [
                    'name' => 'beni ilmane',
                    'ar_name' => 'بني يلمان',
                    'code' => '28008',
                ],
                8 => [
                    'name' => 'benzouh',
                    'ar_name' => 'بنزوه',
                    'code' => '28009',
                ],
                9 => [
                    'name' => 'berhoum',
                    'ar_name' => 'برهوم',
                    'code' => '28010',
                ],
                10 => [
                    'name' => 'bir foda',
                    'ar_name' => 'بئر الفضة',
                    'code' => '28011',
                ],
                11 => [
                    'name' => 'bou saâda',
                    'ar_name' => 'بوسعادة',
                    'code' => '28012',
                ],
                12 => [
                    'name' => 'bouti sayah',
                    'ar_name' => 'بوطي السايح',
                    'code' => '28013',
                ],
                13 => [
                    'name' => 'chellal',
                    'ar_name' => 'شلال',
                    'code' => '28014',
                ],
                14 => [
                    'name' => 'dehahna',
                    'ar_name' => 'الدهاهنة',
                    'code' => '28015',
                ],
                15 => [
                    'name' => 'djebel messaad',
                    'ar_name' => 'جبل أمساعد',
                    'code' => '28016',
                ],
                16 => [
                    'name' => 'el hamel',
                    'ar_name' => 'الهامل',
                    'code' => '28017',
                ],
                17 => [
                    'name' => 'el houamed',
                    'ar_name' => 'الحوامد',
                    'code' => '28018',
                ],
                18 => [
                    'name' => 'hammam dhalaa',
                    'ar_name' => 'حمام الضلعة',
                    'code' => '28019',
                ],
                19 => [
                    'name' => 'khettouti sed el djir',
                    'ar_name' => 'خطوطي سد الجير',
                    'code' => '28020',
                ],
                20 => [
                    'name' => 'khoubana',
                    'ar_name' => 'خبانة',
                    'code' => '28021',
                ],
                21 => [
                    'name' => 'maadid',
                    'ar_name' => 'المعاضيد',
                    'code' => '28022',
                ],
                22 => [
                    'name' => 'maarif',
                    'ar_name' => 'المعاريف',
                    'code' => '28023',
                ],
                23 => [
                    'name' => 'magra',
                    'ar_name' => 'مقرة',
                    'code' => '28024',
                ],
                24 => [
                    'name' => 'm\'cif',
                    'ar_name' => 'مسيف',
                    'code' => '28025',
                ],
                25 => [
                    'name' => 'medjedel',
                    'ar_name' => 'مجدل',
                    'code' => '28026',
                ],
                26 => [
                    'name' => 'm\'sila',
                    'ar_name' => 'المسيلة',
                    'code' => '28027',
                ],
                27 => [
                    'name' => 'm\'tarfa',
                    'ar_name' => 'المطارفة',
                    'code' => '28028',
                ],
                28 => [
                    'name' => 'ouanougha',
                    'ar_name' => 'ونوغة',
                    'code' => '28029',
                ],
                29 => [
                    'name' => 'ouled addi guebala',
                    'ar_name' => 'أولاد عدي القبالة',
                    'code' => '28030',
                ],
                30 => [
                    'name' => 'ouled atia',
                    'ar_name' => 'أولاد عطية',
                    'code' => '28031',
                ],
                31 => [
                    'name' => 'mohammed boudiaf',
                    'ar_name' => 'محمد بوضياف',
                    'code' => '28032',
                ],
                32 => [
                    'name' => 'ouled derradj',
                    'ar_name' => 'أولاد دراج',
                    'code' => '28033',
                ],
                33 => [
                    'name' => 'ouled madhi',
                    'ar_name' => 'أولاد ماضي',
                    'code' => '28034',
                ],
                34 => [
                    'name' => 'ouled mansour',
                    'ar_name' => 'أولاد منصور',
                    'code' => '28035',
                ],
                35 => [
                    'name' => 'ouled sidi brahim',
                    'ar_name' => 'أولاد سيدي إبراهيم',
                    'code' => '28036',
                ],
                36 => [
                    'name' => 'ouled slimane',
                    'ar_name' => 'أولاد سليمان',
                    'code' => '28037',
                ],
                37 => [
                    'name' => 'oultem',
                    'ar_name' => 'أولتام',
                    'code' => '28038',
                ],
                38 => [
                    'name' => 'sidi aïssa',
                    'ar_name' => 'سيدي عيسى',
                    'code' => '28039',
                ],
                39 => [
                    'name' => 'sidi ameur',
                    'ar_name' => 'سيدي عامر',
                    'code' => '28040',
                ],
                40 => [
                    'name' => 'sidi hadjeres',
                    'ar_name' => 'سيدي هجرس',
                    'code' => '28041',
                ],
                41 => [
                    'name' => 'sidi m\'hamed',
                    'ar_name' => 'سيدي امحمد',
                    'code' => '28042',
                ],
                42 => [
                    'name' => 'slim',
                    'ar_name' => 'سليم',
                    'code' => '28043',
                ],
                43 => [
                    'name' => 'souamaa',
                    'ar_name' => 'الصوامع',
                    'code' => '28044',
                ],
                44 => [
                    'name' => 'tamsa',
                    'ar_name' => 'تامسة',
                    'code' => '28045',
                ],
                45 => [
                    'name' => 'tarmount',
                    'ar_name' => 'تارمونت',
                    'code' => '28046',
                ],
                46 => [
                    'name' => 'zarzour',
                    'ar_name' => 'الزرزور',
                    'code' => '28047',
                ],
            ],
            29 => [
                0 => [
                    'name' => 'aïn fares',
                    'ar_name' => 'عين فارس',
                    'code' => '29001',
                ],
                1 => [
                    'name' => 'aïn fekan',
                    'ar_name' => 'عين فكان',
                    'code' => '29002',
                ],
                2 => [
                    'name' => 'aïn ferah',
                    'ar_name' => 'عين فراح',
                    'code' => '29003',
                ],
                3 => [
                    'name' => 'aïn fras',
                    'ar_name' => 'عين افرص',
                    'code' => '29004',
                ],
                4 => [
                    'name' => 'alaïmia',
                    'ar_name' => 'العلايمية',
                    'code' => '29005',
                ],
                5 => [
                    'name' => 'aouf',
                    'ar_name' => 'عوف',
                    'code' => '29006',
                ],
                6 => [
                    'name' => 'beniane',
                    'ar_name' => 'البنيان',
                    'code' => '29007',
                ],
                7 => [
                    'name' => 'bou hanifia',
                    'ar_name' => 'بوحنيفية',
                    'code' => '29008',
                ],
                8 => [
                    'name' => 'bou henni',
                    'ar_name' => 'بوهني',
                    'code' => '29009',
                ],
                9 => [
                    'name' => 'chorfa',
                    'ar_name' => 'الشرفة',
                    'code' => '29010',
                ],
                10 => [
                    'name' => 'el bordj',
                    'ar_name' => 'البرج',
                    'code' => '29011',
                ],
                11 => [
                    'name' => 'el gaada',
                    'ar_name' => 'القعدة',
                    'code' => '29012',
                ],
                12 => [
                    'name' => 'el ghomri',
                    'ar_name' => 'الغمري',
                    'code' => '29013',
                ],
                13 => [
                    'name' => 'el guettana',
                    'ar_name' => 'القيطنة',
                    'code' => '29014',
                ],
                14 => [
                    'name' => 'el keurt',
                    'ar_name' => 'القرط',
                    'code' => '29015',
                ],
                15 => [
                    'name' => 'el menaouer',
                    'ar_name' => 'المنور',
                    'code' => '29016',
                ],
                16 => [
                    'name' => 'ferraguig',
                    'ar_name' => 'فراقيق',
                    'code' => '29017',
                ],
                17 => [
                    'name' => 'froha',
                    'ar_name' => 'فروحة',
                    'code' => '29018',
                ],
                18 => [
                    'name' => 'gharrous',
                    'ar_name' => 'غروس',
                    'code' => '29019',
                ],
                19 => [
                    'name' => 'guerdjoum',
                    'ar_name' => 'قرجوم',
                    'code' => '29020',
                ],
                20 => [
                    'name' => 'ghriss',
                    'ar_name' => 'غريس',
                    'code' => '29021',
                ],
                21 => [
                    'name' => 'hachem',
                    'ar_name' => 'الهاشم',
                    'code' => '29022',
                ],
                22 => [
                    'name' => 'hacine',
                    'ar_name' => 'حسين',
                    'code' => '29023',
                ],
                23 => [
                    'name' => 'khalouia',
                    'ar_name' => 'خلوية',
                    'code' => '29024',
                ],
                24 => [
                    'name' => 'makdha',
                    'ar_name' => 'ماقضة',
                    'code' => '29025',
                ],
                25 => [
                    'name' => 'mamounia',
                    'ar_name' => 'المامونية',
                    'code' => '29026',
                ],
                26 => [
                    'name' => 'maoussa',
                    'ar_name' => 'ماوسة',
                    'code' => '29027',
                ],
                27 => [
                    'name' => 'mascara',
                    'ar_name' => 'معسكر',
                    'code' => '29028',
                ],
                28 => [
                    'name' => 'matemore',
                    'ar_name' => 'مطمور',
                    'code' => '29029',
                ],
                29 => [
                    'name' => 'mocta douz',
                    'ar_name' => 'مقطع دوز',
                    'code' => '29030',
                ],
                30 => [
                    'name' => 'mohammadia',
                    'ar_name' => 'المحمدية',
                    'code' => '29031',
                ],
                31 => [
                    'name' => 'nesmoth',
                    'ar_name' => 'نسموط',
                    'code' => '29032',
                ],
                32 => [
                    'name' => 'oggaz',
                    'ar_name' => 'عقاز',
                    'code' => '29033',
                ],
                33 => [
                    'name' => 'oued el abtal',
                    'ar_name' => 'وادي الأبطال',
                    'code' => '29034',
                ],
                34 => [
                    'name' => 'oued taria',
                    'ar_name' => 'وادي تاغية',
                    'code' => '29035',
                ],
                35 => [
                    'name' => 'ras el aïn amirouche',
                    'ar_name' => 'رأس عين عميروش',
                    'code' => '29036',
                ],
                36 => [
                    'name' => 'sedjerara',
                    'ar_name' => 'سجرارة',
                    'code' => '29037',
                ],
                37 => [
                    'name' => 'sehailia',
                    'ar_name' => 'السحايلية',
                    'code' => '29038',
                ],
                38 => [
                    'name' => 'sidi abdeldjebar',
                    'ar_name' => 'سيدي عبد الجبار',
                    'code' => '29039',
                ],
                39 => [
                    'name' => 'sidi abdelmoumen',
                    'ar_name' => 'سيدي عبد المؤمن',
                    'code' => '29040',
                ],
                40 => [
                    'name' => 'sidi kada',
                    'ar_name' => 'سيدي قادة',
                    'code' => '29041',
                ],
                41 => [
                    'name' => 'sidi boussaid',
                    'ar_name' => 'سيدي بوسعيد',
                    'code' => '29042',
                ],
                42 => [
                    'name' => 'sig',
                    'ar_name' => 'سيق',
                    'code' => '29043',
                ],
                43 => [
                    'name' => 'tighennif',
                    'ar_name' => 'تيغنيف',
                    'code' => '29044',
                ],
                44 => [
                    'name' => 'tizi',
                    'ar_name' => 'تيزي',
                    'code' => '29045',
                ],
                45 => [
                    'name' => 'zahana',
                    'ar_name' => 'زهانة',
                    'code' => '29046',
                ],
                46 => [
                    'name' => 'zelmata',
                    'ar_name' => 'زلامطة',
                    'code' => '29047',
                ],
            ],
            30 => [
                0 => [
                    'name' => 'aïn beida',
                    'ar_name' => 'ﻋﻴﻦ اﻟﺒﻴﻀﺎء',
                    'code' => '30001',
                ],
                1 => [
                    'name' => 'el borma',
                    'ar_name' => 'اﻟﺒﺮﻣﺔ',
                    'code' => '30002',
                ],
                2 => [
                    'name' => 'hassi ben abdellah',
                    'ar_name' => 'ﺣﺎﺳﻲ ﺑﻦ ﻋﺒﺪ اﷲ',
                    'code' => '30003',
                ],
                3 => [
                    'name' => 'hassi messaoud',
                    'ar_name' => 'حاسي مسعود',
                    'code' => '30004',
                ],
                4 => [
                    'name' => 'n\'goussa',
                    'ar_name' => 'ﻧﻘﻮﺳﺔ',
                    'code' => '30005',
                ],
                5 => [
                    'name' => 'ouargla',
                    'ar_name' => 'ورقلة',
                    'code' => '30006',
                ],
                6 => [
                    'name' => 'rouissat',
                    'ar_name' => 'اﻟﺮوﻳﺴﺎت',
                    'code' => '30007',
                ],
                7 => [
                    'name' => 'sidi khouiled',
                    'ar_name' => 'ﺳﻴﺪي ﺧﻮﻳﻠﺪ',
                    'code' => '30008',
                ],
                8 => [
                    'name' => 'el hadjira',
                    'ar_name' => 'اﻟﺤﺠﻴﺮة',
                    'code' => '30009',
                ],
                9 => [
                    'name' => 'el allia',
                    'ar_name' => 'اﻟﻌﺎﻟﻴﺔ',
                    'code' => '30010',
                ],
            ],
            31 => [
                0 => [
                    'name' => 'oran',
                    'ar_name' => 'وهران',
                    'code' => '31001',
                ],
                1 => [
                    'name' => 'gdyel',
                    'ar_name' => 'قديل',
                    'code' => '31002',
                ],
                2 => [
                    'name' => 'bir el djir',
                    'ar_name' => 'بئر الجير',
                    'code' => '31003',
                ],
                3 => [
                    'name' => 'hassi bounif',
                    'ar_name' => 'حاسي بونيف',
                    'code' => '31004',
                ],
                4 => [
                    'name' => 'es senia',
                    'ar_name' => 'السانية',
                    'code' => '31005',
                ],
                5 => [
                    'name' => 'arzew',
                    'ar_name' => 'أرزيو',
                    'code' => '31006',
                ],
                6 => [
                    'name' => 'bethioua',
                    'ar_name' => 'بطيوة',
                    'code' => '31007',
                ],
                7 => [
                    'name' => 'marsa el hadjadj',
                    'ar_name' => 'مرسى الحجاج',
                    'code' => '31008',
                ],
                8 => [
                    'name' => 'aïn el turk',
                    'ar_name' => 'عين الترك',
                    'code' => '31009',
                ],
                9 => [
                    'name' => 'el ançor',
                    'ar_name' => 'العنصر',
                    'code' => '31010',
                ],
                10 => [
                    'name' => 'oued tlelat',
                    'ar_name' => 'وادي تليلات',
                    'code' => '31011',
                ],
                11 => [
                    'name' => 'tafraoui',
                    'ar_name' => 'طفراوي',
                    'code' => '31012',
                ],
                12 => [
                    'name' => 'sidi el chahmi',
                    'ar_name' => 'سيدي الشحمي',
                    'code' => '31013',
                ],
                13 => [
                    'name' => 'boufatis',
                    'ar_name' => 'بوفاطيس',
                    'code' => '31014',
                ],
                14 => [
                    'name' => 'mers el kébir',
                    'ar_name' => 'المرسى الكبير',
                    'code' => '31015',
                ],
                15 => [
                    'name' => 'bousfer',
                    'ar_name' => 'بوسفر',
                    'code' => '31016',
                ],
                16 => [
                    'name' => 'el kerma',
                    'ar_name' => 'الكرمة',
                    'code' => '31017',
                ],
                17 => [
                    'name' => 'el braya',
                    'ar_name' => 'البرية',
                    'code' => '31018',
                ],
                18 => [
                    'name' => 'hassi ben okba',
                    'ar_name' => 'حاسي بن عقبة',
                    'code' => '31019',
                ],
                19 => [
                    'name' => 'ben freha',
                    'ar_name' => 'بن فريحة',
                    'code' => '31020',
                ],
                20 => [
                    'name' => 'hassi mefsoukh',
                    'ar_name' => 'حاسي مفسوخ',
                    'code' => '31021',
                ],
                21 => [
                    'name' => 'sidi benyebka',
                    'ar_name' => 'سيدي بن يبقى',
                    'code' => '31022',
                ],
                22 => [
                    'name' => 'misserghin',
                    'ar_name' => 'مسرغين',
                    'code' => '31023',
                ],
                23 => [
                    'name' => 'boutlelis',
                    'ar_name' => 'بوتليليس',
                    'code' => '31024',
                ],
                24 => [
                    'name' => 'aïn el kerma',
                    'ar_name' => 'عين الكرمة',
                    'code' => '31025',
                ],
                25 => [
                    'name' => 'aïn el bia',
                    'ar_name' => 'عين البية',
                    'code' => '31026',
                ],
            ],
            32 => [
                0 => [
                    'name' => 'el bayadh',
                    'ar_name' => 'البيض',
                    'code' => '32001',
                ],
                1 => [
                    'name' => 'rogassa',
                    'ar_name' => 'الرقاصة',
                    'code' => '32002',
                ],
                2 => [
                    'name' => 'stitten',
                    'ar_name' => 'ستيتن',
                    'code' => '32003',
                ],
                3 => [
                    'name' => 'brezina',
                    'ar_name' => 'بريزينة',
                    'code' => '32004',
                ],
                4 => [
                    'name' => 'ghassoul',
                    'ar_name' => 'الغاسول',
                    'code' => '32005',
                ],
                5 => [
                    'name' => 'boualem',
                    'ar_name' => 'بوعلام',
                    'code' => '32006',
                ],
                6 => [
                    'name' => 'el abiodh sidi cheikh',
                    'ar_name' => 'الأبيض سيدي الشيخ',
                    'code' => '32007',
                ],
                7 => [
                    'name' => 'aïn el orak',
                    'ar_name' => 'عين العراك',
                    'code' => '32008',
                ],
                8 => [
                    'name' => 'arbaouat',
                    'ar_name' => 'أربوات',
                    'code' => '32009',
                ],
                9 => [
                    'name' => 'bougtoub',
                    'ar_name' => 'بوقطب',
                    'code' => '32010',
                ],
                10 => [
                    'name' => 'el kheiter',
                    'ar_name' => 'الخيثر',
                    'code' => '32011',
                ],
                11 => [
                    'name' => 'kef lahmar',
                    'ar_name' => 'كاف لحمر',
                    'code' => '32012',
                ],
                12 => [
                    'name' => 'boussemghoun',
                    'ar_name' => 'بوسمغون',
                    'code' => '32013',
                ],
                13 => [
                    'name' => 'chellala',
                    'ar_name' => 'الشلالة',
                    'code' => '32014',
                ],
                14 => [
                    'name' => 'kraakda',
                    'ar_name' => 'كراكدة',
                    'code' => '32015',
                ],
                15 => [
                    'name' => 'el bnoud',
                    'ar_name' => 'البنود',
                    'code' => '32016',
                ],
                16 => [
                    'name' => 'cheguig',
                    'ar_name' => 'شقيق',
                    'code' => '32017',
                ],
                17 => [
                    'name' => 'sidi ameur',
                    'ar_name' => 'سيدي عمر',
                    'code' => '32018',
                ],
                18 => [
                    'name' => 'el mehara',
                    'ar_name' => 'المحرة',
                    'code' => '32019',
                ],
                19 => [
                    'name' => 'tousmouline',
                    'ar_name' => 'توسمولين',
                    'code' => '32020',
                ],
                20 => [
                    'name' => 'sidi slimane',
                    'ar_name' => 'سيدي سليمان',
                    'code' => '32021',
                ],
                21 => [
                    'name' => 'sidi tifour',
                    'ar_name' => 'سيدي طيفور',
                    'code' => '32022',
                ],
            ],
            33 => [
                0 => [
                    'name' => 'illizi',
                    'ar_name' => 'ﻳﻠﻴﺰى',
                    'code' => '33001',
                ],
                1 => [
                    'name' => 'debdeb',
                    'ar_name' => 'دبدب',
                    'code' => '33002',
                ],
                2 => [
                    'name' => 'bordj omar driss',
                    'ar_name' => 'برج عمار إدريس',
                    'code' => '33003',
                ],
                3 => [
                    'name' => 'in amenas',
                    'ar_name' => 'إن أمناس',
                    'code' => '33004',
                ],
            ],
            34 => [
                0 => [
                    'name' => 'aïn taghrout',
                    'ar_name' => 'عين تاغروت',
                    'code' => '34001',
                ],
                1 => [
                    'name' => 'aïn tesra',
                    'ar_name' => 'عين تسرة',
                    'code' => '34002',
                ],
                2 => [
                    'name' => 'belimour',
                    'ar_name' => 'بليمور',
                    'code' => '34003',
                ],
                3 => [
                    'name' => 'ben daoud',
                    'ar_name' => 'بن داود',
                    'code' => '34004',
                ],
                4 => [
                    'name' => 'bir kasdali',
                    'ar_name' => 'بئر قصد علي',
                    'code' => '34005',
                ],
                5 => [
                    'name' => 'bordj bou arreridj',
                    'ar_name' => 'برج بوعريريج',
                    'code' => '34006',
                ],
                6 => [
                    'name' => 'bordj ghédir',
                    'ar_name' => 'برج الغدير',
                    'code' => '34007',
                ],
                7 => [
                    'name' => 'bordj zemoura',
                    'ar_name' => 'برج زمورة',
                    'code' => '34008',
                ],
                8 => [
                    'name' => 'colla',
                    'ar_name' => 'القلة',
                    'code' => '34009',
                ],
                9 => [
                    'name' => 'djaafra',
                    'ar_name' => 'الجعافرة',
                    'code' => '34010',
                ],
                10 => [
                    'name' => 'el ach',
                    'ar_name' => 'العش',
                    'code' => '34011',
                ],
                11 => [
                    'name' => 'el achir',
                    'ar_name' => 'اليشير',
                    'code' => '34012',
                ],
                12 => [
                    'name' => 'el anseur',
                    'ar_name' => 'العناصر',
                    'code' => '34013',
                ],
                13 => [
                    'name' => 'el hamadia',
                    'ar_name' => 'الحمادية',
                    'code' => '34014',
                ],
                14 => [
                    'name' => 'el main',
                    'ar_name' => 'الماين',
                    'code' => '34015',
                ],
                15 => [
                    'name' => 'el m\'hir',
                    'ar_name' => 'المهير',
                    'code' => '34016',
                ],
                16 => [
                    'name' => 'ghilassa',
                    'ar_name' => 'غيلاسة',
                    'code' => '34017',
                ],
                17 => [
                    'name' => 'haraza',
                    'ar_name' => 'حرازة',
                    'code' => '34018',
                ],
                18 => [
                    'name' => 'hasnaoua',
                    'ar_name' => 'حسناوة',
                    'code' => '34019',
                ],
                19 => [
                    'name' => 'khelil',
                    'ar_name' => 'خليل',
                    'code' => '34020',
                ],
                20 => [
                    'name' => 'ksour',
                    'ar_name' => 'القصور',
                    'code' => '34021',
                ],
                21 => [
                    'name' => 'mansoura',
                    'ar_name' => 'المنصورة',
                    'code' => '34022',
                ],
                22 => [
                    'name' => 'medjana',
                    'ar_name' => 'مجانة',
                    'code' => '34023',
                ],
                23 => [
                    'name' => 'ouled brahem',
                    'ar_name' => 'أولاد براهم',
                    'code' => '34024',
                ],
                24 => [
                    'name' => 'ouled dahmane',
                    'ar_name' => 'أولاد دحمان',
                    'code' => '34025',
                ],
                25 => [
                    'name' => 'ouled sidi brahim',
                    'ar_name' => 'أولاد سيدي إبراهيم',
                    'code' => '34026',
                ],
                26 => [
                    'name' => 'rabta',
                    'ar_name' => 'الرابطة',
                    'code' => '34027',
                ],
                27 => [
                    'name' => 'ras el oued',
                    'ar_name' => 'رأس الوادي',
                    'code' => '34028',
                ],
                28 => [
                    'name' => 'sidi embarek',
                    'ar_name' => 'سيدي امبارك',
                    'code' => '34029',
                ],
                29 => [
                    'name' => 'tefreg',
                    'ar_name' => 'تفرق',
                    'code' => '34030',
                ],
                30 => [
                    'name' => 'taglait',
                    'ar_name' => 'تقلعيت',
                    'code' => '34031',
                ],
                31 => [
                    'name' => 'teniet en nasr',
                    'ar_name' => 'ثنية النصر',
                    'code' => '34032',
                ],
                32 => [
                    'name' => 'tassameurt',
                    'ar_name' => 'تاسمرت',
                    'code' => '34033',
                ],
                33 => [
                    'name' => 'tixter',
                    'ar_name' => 'تكستار',
                    'code' => '34034',
                ],
            ],
            35 => [
                0 => [
                    'name' => 'afir',
                    'ar_name' => 'اعفير',
                    'code' => '35001',
                ],
                1 => [
                    'name' => 'ammal',
                    'ar_name' => 'عمال',
                    'code' => '35002',
                ],
                2 => [
                    'name' => 'baghlia',
                    'ar_name' => 'بغلية',
                    'code' => '35003',
                ],
                3 => [
                    'name' => 'ben choud',
                    'ar_name' => 'بن شود',
                    'code' => '35004',
                ],
                4 => [
                    'name' => 'beni amrane',
                    'ar_name' => 'بني عمران',
                    'code' => '35005',
                ],
                5 => [
                    'name' => 'bordj menaïel',
                    'ar_name' => 'برج منايل',
                    'code' => '35006',
                ],
                6 => [
                    'name' => 'boudouaou',
                    'ar_name' => 'بودواو',
                    'code' => '35007',
                ],
                7 => [
                    'name' => 'boudouaou-el-bahri',
                    'ar_name' => 'بودواو البحري',
                    'code' => '35008',
                ],
                8 => [
                    'name' => 'boumerdes',
                    'ar_name' => 'بومرداس',
                    'code' => '35009',
                ],
                9 => [
                    'name' => 'bouzegza keddara',
                    'ar_name' => 'قدارة',
                    'code' => '35010',
                ],
                10 => [
                    'name' => 'chabet el ameur',
                    'ar_name' => 'شعبة العامر',
                    'code' => '35011',
                ],
                11 => [
                    'name' => 'corso',
                    'ar_name' => 'قورصو',
                    'code' => '35012',
                ],
                12 => [
                    'name' => 'dellys',
                    'ar_name' => 'دلس',
                    'code' => '35013',
                ],
                13 => [
                    'name' => 'djinet',
                    'ar_name' => 'جنات',
                    'code' => '35014',
                ],
                14 => [
                    'name' => 'el kharrouba',
                    'ar_name' => 'الخروبة',
                    'code' => '35015',
                ],
                15 => [
                    'name' => 'hammedi',
                    'ar_name' => 'حمادي',
                    'code' => '35016',
                ],
                16 => [
                    'name' => 'issers',
                    'ar_name' => 'يسر',
                    'code' => '35017',
                ],
                17 => [
                    'name' => 'khemis el-khechna',
                    'ar_name' => 'خميس الخشنة',
                    'code' => '35018',
                ],
                18 => [
                    'name' => 'larbatache',
                    'ar_name' => 'الأربعطاش',
                    'code' => '35019',
                ],
                19 => [
                    'name' => 'leghata',
                    'ar_name' => 'لقاطة',
                    'code' => '35020',
                ],
                20 => [
                    'name' => 'naciria',
                    'ar_name' => 'الناصرية',
                    'code' => '35021',
                ],
                21 => [
                    'name' => 'ouled aïssa',
                    'ar_name' => 'أولاد عيسى',
                    'code' => '35022',
                ],
                22 => [
                    'name' => 'ouled hedadj',
                    'ar_name' => 'أولاد هداج',
                    'code' => '35023',
                ],
                23 => [
                    'name' => 'ouled moussa',
                    'ar_name' => 'أولاد موسى',
                    'code' => '35024',
                ],
                24 => [
                    'name' => 'si mustapha',
                    'ar_name' => 'سي مصطفى',
                    'code' => '35025',
                ],
                25 => [
                    'name' => 'sidi daoud',
                    'ar_name' => 'سيدي داود',
                    'code' => '35026',
                ],
                26 => [
                    'name' => 'souk el had',
                    'ar_name' => 'سوق الحد',
                    'code' => '35027',
                ],
                27 => [
                    'name' => 'taourga',
                    'ar_name' => 'تاورقة',
                    'code' => '35028',
                ],
                28 => [
                    'name' => 'thenia',
                    'ar_name' => 'الثنية',
                    'code' => '35029',
                ],
                29 => [
                    'name' => 'tidjelabine',
                    'ar_name' => 'تجلابين',
                    'code' => '35030',
                ],
                30 => [
                    'name' => 'timezrit',
                    'ar_name' => 'تيمزريت',
                    'code' => '35031',
                ],
                31 => [
                    'name' => 'zemmouri',
                    'ar_name' => 'زموري',
                    'code' => '35032',
                ],
            ],
            36 => [
                0 => [
                    'name' => 'aïn el assel',
                    'ar_name' => 'عين العسل',
                    'code' => '36001',
                ],
                1 => [
                    'name' => 'aïn kerma',
                    'ar_name' => 'عين الكرمة',
                    'code' => '36002',
                ],
                2 => [
                    'name' => 'asfour',
                    'ar_name' => 'عصفور',
                    'code' => '36003',
                ],
                3 => [
                    'name' => 'ben mehidi',
                    'ar_name' => 'بن مهيدي',
                    'code' => '36004',
                ],
                4 => [
                    'name' => 'berrihane',
                    'ar_name' => 'بريحان',
                    'code' => '36005',
                ],
                5 => [
                    'name' => 'besbes',
                    'ar_name' => 'البسباس',
                    'code' => '36006',
                ],
                6 => [
                    'name' => 'bougous',
                    'ar_name' => 'بوقوس',
                    'code' => '36007',
                ],
                7 => [
                    'name' => 'bouhadjar',
                    'ar_name' => 'بوحجار',
                    'code' => '36008',
                ],
                8 => [
                    'name' => 'bouteldja',
                    'ar_name' => 'بوثلجة',
                    'code' => '36009',
                ],
                9 => [
                    'name' => 'chebaita mokhtar',
                    'ar_name' => 'شبيطة مختار',
                    'code' => '36010',
                ],
                10 => [
                    'name' => 'chefia',
                    'ar_name' => 'الشافية',
                    'code' => '36011',
                ],
                11 => [
                    'name' => 'chihani',
                    'ar_name' => 'الشيحاني',
                    'code' => '36012',
                ],
                12 => [
                    'name' => 'dréan',
                    'ar_name' => 'الذرعان',
                    'code' => '36013',
                ],
                13 => [
                    'name' => 'echatt',
                    'ar_name' => 'الشط',
                    'code' => '36014',
                ],
                14 => [
                    'name' => 'el aioun',
                    'ar_name' => 'العيون',
                    'code' => '36015',
                ],
                15 => [
                    'name' => 'el kala',
                    'ar_name' => 'القالة',
                    'code' => '36016',
                ],
                16 => [
                    'name' => 'el tarf',
                    'ar_name' => 'الطارف',
                    'code' => '36017',
                ],
                17 => [
                    'name' => 'hammam beni salah',
                    'ar_name' => 'حمام بني صالح',
                    'code' => '36018',
                ],
                18 => [
                    'name' => 'lac des oiseaux',
                    'ar_name' => 'بحيرة الطيور',
                    'code' => '36019',
                ],
                19 => [
                    'name' => 'oued zitoun',
                    'ar_name' => 'واد الزيتون',
                    'code' => '36020',
                ],
                20 => [
                    'name' => 'raml souk',
                    'ar_name' => 'رمل السوق',
                    'code' => '36021',
                ],
                21 => [
                    'name' => 'souarekh',
                    'ar_name' => 'السوارخ',
                    'code' => '36022',
                ],
                22 => [
                    'name' => 'zerizer',
                    'ar_name' => 'زريزر',
                    'code' => '36023',
                ],
                23 => [
                    'name' => 'zitouna',
                    'ar_name' => 'الزيتونة',
                    'code' => '36024',
                ],
            ],
            37 => [
                0 => [
                    'name' => 'oum el assel',
                    'ar_name' => 'أم العسل',
                    'code' => '37001',
                ],
                1 => [
                    'name' => 'tindouf',
                    'ar_name' => 'تندوف',
                    'code' => '37002',
                ],
            ],
            38 => [
                0 => [
                    'name' => 'ammari',
                    'ar_name' => 'عماري',
                    'code' => '38001',
                ],
                1 => [
                    'name' => 'beni chaib',
                    'ar_name' => 'بني شعيب',
                    'code' => '38002',
                ],
                2 => [
                    'name' => 'beni lahcene',
                    'ar_name' => 'بني لحسن',
                    'code' => '38003',
                ],
                3 => [
                    'name' => 'boucaid',
                    'ar_name' => 'بوقايد',
                    'code' => '38004',
                ],
                4 => [
                    'name' => 'bordj bou naama',
                    'ar_name' => 'برج بونعامة',
                    'code' => '38005',
                ],
                5 => [
                    'name' => 'bordj el emir abdelkader',
                    'ar_name' => 'برج الأمير عبد القادر',
                    'code' => '38006',
                ],
                6 => [
                    'name' => 'khemisti',
                    'ar_name' => 'خميستي',
                    'code' => '38007',
                ],
                7 => [
                    'name' => 'larbaâ',
                    'ar_name' => 'الأربعاء',
                    'code' => '38008',
                ],
                8 => [
                    'name' => 'lardjem',
                    'ar_name' => 'لرجام',
                    'code' => '38009',
                ],
                9 => [
                    'name' => 'layoune',
                    'ar_name' => 'العيون',
                    'code' => '38010',
                ],
                10 => [
                    'name' => 'lazharia',
                    'ar_name' => 'الأزهرية',
                    'code' => '38011',
                ],
                11 => [
                    'name' => 'maacem',
                    'ar_name' => 'المعاصم',
                    'code' => '38012',
                ],
                12 => [
                    'name' => 'melaab',
                    'ar_name' => 'الملعب',
                    'code' => '38013',
                ],
                13 => [
                    'name' => 'ouled bessem',
                    'ar_name' => 'أولاد بسام',
                    'code' => '38014',
                ],
                14 => [
                    'name' => 'sidi abed',
                    'ar_name' => 'سيدي عابد',
                    'code' => '38015',
                ],
                15 => [
                    'name' => 'sidi boutouchent',
                    'ar_name' => 'سيدي بوتشنت',
                    'code' => '38016',
                ],
                16 => [
                    'name' => 'sidi lantri',
                    'ar_name' => 'سيدي العنتري',
                    'code' => '38017',
                ],
                17 => [
                    'name' => 'sidi slimane',
                    'ar_name' => 'سيدي سليمان',
                    'code' => '38018',
                ],
                18 => [
                    'name' => 'tamalaht',
                    'ar_name' => 'تملاحت',
                    'code' => '38019',
                ],
                19 => [
                    'name' => 'theniet el had',
                    'ar_name' => 'ثنية الأحد',
                    'code' => '38020',
                ],
                20 => [
                    'name' => 'tissemsilt',
                    'ar_name' => 'تيسمسيلت',
                    'code' => '38021',
                ],
                21 => [
                    'name' => 'youssoufia',
                    'ar_name' => 'اليوسفية',
                    'code' => '38022',
                ],
            ],
            39 => [
                0 => [
                    'name' => 'el oued',
                    'ar_name' => 'الوادي',
                    'code' => '39001',
                ],
                1 => [
                    'name' => 'robbah',
                    'ar_name' => 'الرباح',
                    'code' => '39002',
                ],
                2 => [
                    'name' => 'oued el alenda',
                    'ar_name' => 'وادي العلندة',
                    'code' => '39003',
                ],
                3 => [
                    'name' => 'bayadha',
                    'ar_name' => 'البياضة',
                    'code' => '39004',
                ],
                4 => [
                    'name' => 'nakhla',
                    'ar_name' => 'النخلة',
                    'code' => '39005',
                ],
                5 => [
                    'name' => 'guemar',
                    'ar_name' => 'قمار',
                    'code' => '39006',
                ],
                6 => [
                    'name' => 'kouinine',
                    'ar_name' => 'كوينين',
                    'code' => '39007',
                ],
                7 => [
                    'name' => 'reguiba',
                    'ar_name' => 'الرقيبة',
                    'code' => '39008',
                ],
                8 => [
                    'name' => 'hamraia',
                    'ar_name' => 'الحمراية',
                    'code' => '39009',
                ],
                9 => [
                    'name' => 'taghzout',
                    'ar_name' => 'تغزوت',
                    'code' => '39010',
                ],
                10 => [
                    'name' => 'debila',
                    'ar_name' => 'الدبيلة',
                    'code' => '39011',
                ],
                11 => [
                    'name' => 'hassani abdelkrim',
                    'ar_name' => 'حساني عبد الكريم',
                    'code' => '39012',
                ],
                12 => [
                    'name' => 'hassi khalifa',
                    'ar_name' => 'حاسي خليفة',
                    'code' => '39013',
                ],
                13 => [
                    'name' => 'taleb larbi',
                    'ar_name' => 'طالب العربي',
                    'code' => '39014',
                ],
                14 => [
                    'name' => 'douar el ma',
                    'ar_name' => 'دوار الماء',
                    'code' => '39015',
                ],
                15 => [
                    'name' => 'sidi aoun',
                    'ar_name' => 'سيدي عون',
                    'code' => '39016',
                ],
                16 => [
                    'name' => 'trifaoui',
                    'ar_name' => 'الطريفاوي',
                    'code' => '39017',
                ],
                17 => [
                    'name' => 'magrane',
                    'ar_name' => 'المقرن',
                    'code' => '39018',
                ],
                18 => [
                    'name' => 'ben guecha',
                    'ar_name' => 'بن قشة',
                    'code' => '39019',
                ],
                19 => [
                    'name' => 'ourmes',
                    'ar_name' => 'ورماس',
                    'code' => '39020',
                ],
                20 => [
                    'name' => 'el ogla',
                    'ar_name' => 'العقلة',
                    'code' => '39021',
                ],
                21 => [
                    'name' => 'mih ouansa',
                    'ar_name' => 'أميه ونسة',
                    'code' => '39022',
                ],
            ],
            40 => [
                0 => [
                    'name' => 'aïn touila',
                    'ar_name' => 'عين الطويلة',
                    'code' => '40001',
                ],
                1 => [
                    'name' => 'babar',
                    'ar_name' => 'بابار',
                    'code' => '40002',
                ],
                2 => [
                    'name' => 'baghai',
                    'ar_name' => 'بغاي',
                    'code' => '40003',
                ],
                3 => [
                    'name' => 'bouhmama',
                    'ar_name' => 'بوحمامة',
                    'code' => '40004',
                ],
                4 => [
                    'name' => 'chechar',
                    'ar_name' => 'ششار',
                    'code' => '40005',
                ],
                5 => [
                    'name' => 'chelia',
                    'ar_name' => 'شلية',
                    'code' => '40006',
                ],
                6 => [
                    'name' => 'el hamma',
                    'ar_name' => 'الحامة',
                    'code' => '40007',
                ],
                7 => [
                    'name' => 'el mahmal',
                    'ar_name' => 'المحمل',
                    'code' => '40008',
                ],
                8 => [
                    'name' => 'el oueldja',
                    'ar_name' => 'الولجة',
                    'code' => '40009',
                ],
                9 => [
                    'name' => 'ensigha',
                    'ar_name' => 'أنسيغة',
                    'code' => '40010',
                ],
                10 => [
                    'name' => 'kais',
                    'ar_name' => 'قايس',
                    'code' => '40011',
                ],
                11 => [
                    'name' => 'khenchela',
                    'ar_name' => 'خنشلة',
                    'code' => '40012',
                ],
                12 => [
                    'name' => 'khirane',
                    'ar_name' => 'خيران',
                    'code' => '40013',
                ],
                13 => [
                    'name' => 'm\'sara',
                    'ar_name' => 'أمصارة',
                    'code' => '40014',
                ],
                14 => [
                    'name' => 'm\'toussa',
                    'ar_name' => 'متوسة',
                    'code' => '40015',
                ],
                15 => [
                    'name' => 'ouled rechache',
                    'ar_name' => 'أولاد رشاش',
                    'code' => '40016',
                ],
                16 => [
                    'name' => 'remila',
                    'ar_name' => 'الرميلة',
                    'code' => '40017',
                ],
                17 => [
                    'name' => 'tamza',
                    'ar_name' => 'طامزة',
                    'code' => '40018',
                ],
                18 => [
                    'name' => 'taouzient',
                    'ar_name' => 'تاوزيانت',
                    'code' => '40019',
                ],
                19 => [
                    'name' => 'yabous',
                    'ar_name' => 'يابوس',
                    'code' => '40020',
                ],
            ],
            41 => [
                0 => [
                    'name' => 'souk ahras',
                    'ar_name' => 'سوق أهراس',
                    'code' => '41001',
                ],
                1 => [
                    'name' => 'sedrata',
                    'ar_name' => 'سدراتة',
                    'code' => '41002',
                ],
                2 => [
                    'name' => 'hanancha',
                    'ar_name' => 'الحنانشة',
                    'code' => '41003',
                ],
                3 => [
                    'name' => 'mechroha',
                    'ar_name' => 'المشروحة',
                    'code' => '41004',
                ],
                4 => [
                    'name' => 'ouled driss',
                    'ar_name' => 'أولاد إدريس',
                    'code' => '41005',
                ],
                5 => [
                    'name' => 'tiffech',
                    'ar_name' => 'تيفاش',
                    'code' => '41006',
                ],
                6 => [
                    'name' => 'zaarouria',
                    'ar_name' => 'الزعرورية',
                    'code' => '41007',
                ],
                7 => [
                    'name' => 'taoura',
                    'ar_name' => 'تاورة',
                    'code' => '41008',
                ],
                8 => [
                    'name' => 'dréa',
                    'ar_name' => 'الدريعة',
                    'code' => '41009',
                ],
                9 => [
                    'name' => 'heddada',
                    'ar_name' => 'الحدادة',
                    'code' => '41010',
                ],
                10 => [
                    'name' => 'khedara',
                    'ar_name' => 'الخضارة',
                    'code' => '41011',
                ],
                11 => [
                    'name' => 'merahna',
                    'ar_name' => 'المراهنة',
                    'code' => '41012',
                ],
                12 => [
                    'name' => 'ouled moumene',
                    'ar_name' => 'أولاد مؤمن',
                    'code' => '41013',
                ],
                13 => [
                    'name' => 'bir bou haouch',
                    'ar_name' => 'بئر بوحوش',
                    'code' => '41014',
                ],
                14 => [
                    'name' => 'm\'daourouch',
                    'ar_name' => 'مداوروش',
                    'code' => '41015',
                ],
                15 => [
                    'name' => 'oum el adhaim',
                    'ar_name' => 'أم العظائم',
                    'code' => '41016',
                ],
                16 => [
                    'name' => 'aïn zana',
                    'ar_name' => 'عين زانة',
                    'code' => '41017',
                ],
                17 => [
                    'name' => 'aïn soltane',
                    'ar_name' => 'عين سلطان',
                    'code' => '41018',
                ],
                18 => [
                    'name' => 'ouillen',
                    'ar_name' => 'ويلان',
                    'code' => '41019',
                ],
                19 => [
                    'name' => 'sidi fredj',
                    'ar_name' => 'سيدي فرج',
                    'code' => '41020',
                ],
                20 => [
                    'name' => 'سافل الويدان',
                    'ar_name' => 'null',
                    'code' => '41021',
                ],
                21 => [
                    'name' => 'ragouba',
                    'ar_name' => 'الراقوبة',
                    'code' => '41022',
                ],
                22 => [
                    'name' => 'khemissa',
                    'ar_name' => 'خميسة',
                    'code' => '41023',
                ],
                23 => [
                    'name' => 'oued keberit',
                    'ar_name' => 'وادي الكبريت',
                    'code' => '41024',
                ],
                24 => [
                    'name' => 'terraguelt',
                    'ar_name' => 'ترقالت',
                    'code' => '41025',
                ],
                25 => [
                    'name' => 'zouabi',
                    'ar_name' => 'الزوابي',
                    'code' => '41026',
                ],
            ],
            42 => [
                0 => [
                    'name' => 'tipaza',
                    'ar_name' => 'تيبازة',
                    'code' => '42001',
                ],
                1 => [
                    'name' => 'menaceur',
                    'ar_name' => 'مناصر',
                    'code' => '42002',
                ],
                2 => [
                    'name' => 'larhat',
                    'ar_name' => 'لارهاط',
                    'code' => '42003',
                ],
                3 => [
                    'name' => 'douaouda',
                    'ar_name' => 'دواودة',
                    'code' => '42004',
                ],
                4 => [
                    'name' => 'bourkika',
                    'ar_name' => 'بورقيقة',
                    'code' => '42005',
                ],
                5 => [
                    'name' => 'khemisti',
                    'ar_name' => 'خميستي',
                    'code' => '42006',
                ],
                6 => [
                    'name' => 'aghbal',
                    'ar_name' => 'أغبال',
                    'code' => '42007',
                ],
                7 => [
                    'name' => 'hadjout',
                    'ar_name' => 'حجوط',
                    'code' => '42008',
                ],
                8 => [
                    'name' => 'sidi amar',
                    'ar_name' => 'سيدي عمار',
                    'code' => '42009',
                ],
                9 => [
                    'name' => 'gouraya',
                    'ar_name' => 'قوراية',
                    'code' => '42010',
                ],
                10 => [
                    'name' => 'nador',
                    'ar_name' => 'الناظور',
                    'code' => '42011',
                ],
                11 => [
                    'name' => 'chaiba',
                    'ar_name' => 'الشعيبة',
                    'code' => '42012',
                ],
                12 => [
                    'name' => 'aïn tagourait',
                    'ar_name' => 'عين تقورايت',
                    'code' => '42013',
                ],
                13 => [
                    'name' => 'cherchell',
                    'ar_name' => 'شرشال',
                    'code' => '42014',
                ],
                14 => [
                    'name' => 'damous',
                    'ar_name' => 'الداموس',
                    'code' => '42015',
                ],
                15 => [
                    'name' => 'merad',
                    'ar_name' => 'مراد',
                    'code' => '42016',
                ],
                16 => [
                    'name' => 'fouka',
                    'ar_name' => 'فوكة',
                    'code' => '42017',
                ],
                17 => [
                    'name' => 'bou ismaïl',
                    'ar_name' => 'بو إسماعيل',
                    'code' => '42018',
                ],
                18 => [
                    'name' => 'ahmar el aïn',
                    'ar_name' => 'حمر العين',
                    'code' => '42019',
                ],
                19 => [
                    'name' => 'bouharoun',
                    'ar_name' => 'بوهارون',
                    'code' => '42020',
                ],
                20 => [
                    'name' => 'sidi ghiles',
                    'ar_name' => 'سيدي غيلاس',
                    'code' => '42021',
                ],
                21 => [
                    'name' => 'messelmoun',
                    'ar_name' => 'مسلمون',
                    'code' => '42022',
                ],
                22 => [
                    'name' => 'sidi rached',
                    'ar_name' => 'سيدي راشد',
                    'code' => '42023',
                ],
                23 => [
                    'name' => 'koléa',
                    'ar_name' => 'القليعة',
                    'code' => '42024',
                ],
                24 => [
                    'name' => 'attatba',
                    'ar_name' => 'حطاطبة',
                    'code' => '42025',
                ],
                25 => [
                    'name' => 'sidi semiane',
                    'ar_name' => 'سيدي سميان',
                    'code' => '42026',
                ],
                26 => [
                    'name' => 'beni milleuk',
                    'ar_name' => 'بني مليك',
                    'code' => '42027',
                ],
                27 => [
                    'name' => 'hadjeret ennous',
                    'ar_name' => 'حجرة النصs',
                    'code' => '42028',
                ],
            ],
            43 => [
                0 => [
                    'name' => 'ahmed rachedi',
                    'ar_name' => 'أحمد راشدي',
                    'code' => '43001',
                ],
                1 => [
                    'name' => 'aïn beida harriche',
                    'ar_name' => 'عين البيضاء حريش',
                    'code' => '43002',
                ],
                2 => [
                    'name' => 'aïn mellouk',
                    'ar_name' => 'عين الملوك',
                    'code' => '43003',
                ],
                3 => [
                    'name' => 'aïn tine',
                    'ar_name' => 'عين التين',
                    'code' => '43004',
                ],
                4 => [
                    'name' => 'amira arrès',
                    'ar_name' => 'عميرة أراس',
                    'code' => '43005',
                ],
                5 => [
                    'name' => 'benyahia abderrahmane',
                    'ar_name' => 'بن يحيى عبد الرحمان',
                    'code' => '43006',
                ],
                6 => [
                    'name' => 'bouhatem',
                    'ar_name' => 'بوحاتم',
                    'code' => '43007',
                ],
                7 => [
                    'name' => 'chelghoum laid',
                    'ar_name' => 'شلغوم العيد',
                    'code' => '43008',
                ],
                8 => [
                    'name' => 'chigara',
                    'ar_name' => 'الشيقارة',
                    'code' => '43009',
                ],
                9 => [
                    'name' => 'derradji bousselah',
                    'ar_name' => 'دراحي بوصلاح',
                    'code' => '43010',
                ],
                10 => [
                    'name' => 'el mechira',
                    'ar_name' => 'المشيرة',
                    'code' => '43011',
                ],
                11 => [
                    'name' => 'elayadi barbes',
                    'ar_name' => 'العياضي برباس',
                    'code' => '43012',
                ],
                12 => [
                    'name' => 'ferdjioua',
                    'ar_name' => 'فرجيوة',
                    'code' => '43013',
                ],
                13 => [
                    'name' => 'grarem gouga',
                    'ar_name' => 'القرارم قوقة',
                    'code' => '43014',
                ],
                14 => [
                    'name' => 'hamala',
                    'ar_name' => 'حمالة',
                    'code' => '43015',
                ],
                15 => [
                    'name' => 'mila',
                    'ar_name' => 'ميلة',
                    'code' => '43016',
                ],
                16 => [
                    'name' => 'minar zarza',
                    'ar_name' => 'مينار زارزة',
                    'code' => '43017',
                ],
                17 => [
                    'name' => 'oued athmania',
                    'ar_name' => 'وادي العثمانية',
                    'code' => '43018',
                ],
                18 => [
                    'name' => 'oued endja',
                    'ar_name' => 'وادي النجاء',
                    'code' => '43019',
                ],
                19 => [
                    'name' => 'oued seguen',
                    'ar_name' => 'وادي سقان',
                    'code' => '43020',
                ],
                20 => [
                    'name' => 'ouled khalouf',
                    'ar_name' => 'أولاد خلوف',
                    'code' => '43021',
                ],
                21 => [
                    'name' => 'rouached',
                    'ar_name' => 'الرواشد',
                    'code' => '43022',
                ],
                22 => [
                    'name' => 'sidi khelifa',
                    'ar_name' => 'سيدي خليفة',
                    'code' => '43023',
                ],
                23 => [
                    'name' => 'sidi merouane',
                    'ar_name' => 'سيدي مروان',
                    'code' => '43024',
                ],
                24 => [
                    'name' => 'tadjenanet',
                    'ar_name' => 'تاجنانت',
                    'code' => '43025',
                ],
                25 => [
                    'name' => 'tassadane haddada',
                    'ar_name' => 'تسدان حدادة',
                    'code' => '43026',
                ],
                26 => [
                    'name' => 'teleghma',
                    'ar_name' => 'التلاغمة',
                    'code' => '43027',
                ],
                27 => [
                    'name' => 'terrai bainen',
                    'ar_name' => 'ترعي باينان',
                    'code' => '43028',
                ],
                28 => [
                    'name' => 'tessala lemtaï',
                    'ar_name' => 'تسالة لمطاعي',
                    'code' => '43029',
                ],
                29 => [
                    'name' => 'tiberguent',
                    'ar_name' => 'تبرقنت',
                    'code' => '43030',
                ],
                30 => [
                    'name' => 'yahia beni guecha',
                    'ar_name' => 'يحيى بن قشة',
                    'code' => '43031',
                ],
                31 => [
                    'name' => 'zeghaia',
                    'ar_name' => 'زغاية',
                    'code' => '43032',
                ],
            ],
            44 => [
                0 => [
                    'name' => 'aïn beniane',
                    'ar_name' => 'عين بنيان',
                    'code' => '44001',
                ],
                1 => [
                    'name' => 'aïn bouyahia',
                    'ar_name' => 'عين بويحيى',
                    'code' => '44002',
                ],
                2 => [
                    'name' => 'aïn defla',
                    'ar_name' => 'عين الدفلى',
                    'code' => '44003',
                ],
                3 => [
                    'name' => 'aïn lechiekh',
                    'ar_name' => 'عين لشياخ',
                    'code' => '44004',
                ],
                4 => [
                    'name' => 'aïn soltane',
                    'ar_name' => 'عين سلطان',
                    'code' => '44005',
                ],
                5 => [
                    'name' => 'aïn torki',
                    'ar_name' => 'عين تركي',
                    'code' => '44006',
                ],
                6 => [
                    'name' => 'arib',
                    'ar_name' => 'عريب',
                    'code' => '44007',
                ],
                7 => [
                    'name' => 'bathia',
                    'ar_name' => 'بطحية',
                    'code' => '44008',
                ],
                8 => [
                    'name' => 'belaas',
                    'ar_name' => 'بلعاص',
                    'code' => '44009',
                ],
                9 => [
                    'name' => 'ben allal',
                    'ar_name' => 'بن علال',
                    'code' => '44010',
                ],
                10 => [
                    'name' => 'birbouche',
                    'ar_name' => 'بربوش',
                    'code' => '44011',
                ],
                11 => [
                    'name' => 'bir ould khelifa',
                    'ar_name' => 'بئر ولد خليفة',
                    'code' => '44012',
                ],
                12 => [
                    'name' => 'bordj emir khaled',
                    'ar_name' => 'برج الأمير خالد',
                    'code' => '44013',
                ],
                13 => [
                    'name' => 'boumedfaa',
                    'ar_name' => 'بومدفع',
                    'code' => '44014',
                ],
                14 => [
                    'name' => 'bourached',
                    'ar_name' => 'بوراشد',
                    'code' => '44015',
                ],
                15 => [
                    'name' => 'djelida',
                    'ar_name' => 'جليدة',
                    'code' => '44016',
                ],
                16 => [
                    'name' => 'djemaa ouled cheikh',
                    'ar_name' => 'جمعة ولاد الشيخ',
                    'code' => '44017',
                ],
                17 => [
                    'name' => 'djendel',
                    'ar_name' => 'جندل',
                    'code' => '44018',
                ],
                18 => [
                    'name' => 'el abadia',
                    'ar_name' => 'العبادية',
                    'code' => '44019',
                ],
                19 => [
                    'name' => 'el amra',
                    'ar_name' => 'العامرة',
                    'code' => '44020',
                ],
                20 => [
                    'name' => 'el attaf',
                    'ar_name' => 'العطاف',
                    'code' => '44021',
                ],
                21 => [
                    'name' => 'el hassania',
                    'ar_name' => 'الحسنية',
                    'code' => '44022',
                ],
                22 => [
                    'name' => 'el maine',
                    'ar_name' => 'الماين',
                    'code' => '44023',
                ],
                23 => [
                    'name' => 'hammam righa',
                    'ar_name' => 'حمام ريغة',
                    'code' => '44024',
                ],
                24 => [
                    'name' => 'hoceinia',
                    'ar_name' => 'الحسينية',
                    'code' => '44025',
                ],
                25 => [
                    'name' => 'khemis miliana',
                    'ar_name' => 'خميس مليانة',
                    'code' => '44026',
                ],
                26 => [
                    'name' => 'mekhatria',
                    'ar_name' => 'المخاطرية',
                    'code' => '44027',
                ],
                27 => [
                    'name' => 'miliana',
                    'ar_name' => 'مليانة',
                    'code' => '44028',
                ],
                28 => [
                    'name' => 'oued chorfa',
                    'ar_name' => 'واد الشرفاء',
                    'code' => '44029',
                ],
                29 => [
                    'name' => 'oued djemaa',
                    'ar_name' => 'وادي الجمعة',
                    'code' => '44030',
                ],
                30 => [
                    'name' => 'rouina',
                    'ar_name' => 'الروينة',
                    'code' => '44031',
                ],
                31 => [
                    'name' => 'sidi lakhdar',
                    'ar_name' => 'سيدي الأخضر',
                    'code' => '44032',
                ],
                32 => [
                    'name' => 'tacheta zougagha',
                    'ar_name' => 'تاشتة زقاغة',
                    'code' => '44033',
                ],
                33 => [
                    'name' => 'tarik ibn ziad',
                    'ar_name' => 'طارق بن زياد',
                    'code' => '44034',
                ],
                34 => [
                    'name' => 'tiberkanine',
                    'ar_name' => 'تيبركانين',
                    'code' => '44035',
                ],
                35 => [
                    'name' => 'zeddine',
                    'ar_name' => 'زدين',
                    'code' => '44036',
                ],
            ],
            45 => [
                0 => [
                    'name' => 'naâma',
                    'ar_name' => 'النعامة',
                    'code' => '45001',
                ],
                1 => [
                    'name' => 'mecheria',
                    'ar_name' => 'المشرية',
                    'code' => '45002',
                ],
                2 => [
                    'name' => 'aïn sefra',
                    'ar_name' => 'عين الصفراء',
                    'code' => '45003',
                ],
                3 => [
                    'name' => 'tiout',
                    'ar_name' => 'تيوت',
                    'code' => '45004',
                ],
                4 => [
                    'name' => 'sfissifa',
                    'ar_name' => 'صفيصيفة',
                    'code' => '45005',
                ],
                5 => [
                    'name' => 'moghrar',
                    'ar_name' => 'مغرار',
                    'code' => '45006',
                ],
                6 => [
                    'name' => 'assela',
                    'ar_name' => 'عسلة',
                    'code' => '45007',
                ],
                7 => [
                    'name' => 'djeniene bourezg',
                    'ar_name' => 'جنين بورزق',
                    'code' => '45008',
                ],
                8 => [
                    'name' => 'aïn ben khelil',
                    'ar_name' => 'عين بن خليل',
                    'code' => '45009',
                ],
                9 => [
                    'name' => 'makman ben amer',
                    'ar_name' => 'مكمن بن عمار',
                    'code' => '45010',
                ],
                10 => [
                    'name' => 'kasdir',
                    'ar_name' => 'القصدير',
                    'code' => '45011',
                ],
                11 => [
                    'name' => 'el biod',
                    'ar_name' => 'البيوض',
                    'code' => '45012',
                ],
            ],
            46 => [
                0 => [
                    'name' => 'aghlal',
                    'ar_name' => 'آغلال',
                    'code' => '46001',
                ],
                1 => [
                    'name' => 'aïn el arbaa',
                    'ar_name' => 'عين الأربعاءعين الأربعاء',
                    'code' => '46002',
                ],
                2 => [
                    'name' => 'aïn kihal',
                    'ar_name' => 'عين الكيحل',
                    'code' => '46003',
                ],
                3 => [
                    'name' => 'aïn témouchent',
                    'ar_name' => 'عين تموشنت',
                    'code' => '46004',
                ],
                4 => [
                    'name' => 'aïn tolba',
                    'ar_name' => 'عين الطلبة',
                    'code' => '46005',
                ],
                5 => [
                    'name' => 'aoubellil',
                    'ar_name' => 'عقب الليل',
                    'code' => '46006',
                ],
                6 => [
                    'name' => 'beni saf',
                    'ar_name' => 'بني صاف',
                    'code' => '46007',
                ],
                7 => [
                    'name' => 'bouzedjar',
                    'ar_name' => 'بوزجار',
                    'code' => '46008',
                ],
                8 => [
                    'name' => 'chaabat el leham',
                    'ar_name' => 'شعبة اللحم',
                    'code' => '46009',
                ],
                9 => [
                    'name' => 'chentouf',
                    'ar_name' => 'شنتوف',
                    'code' => '46010',
                ],
                10 => [
                    'name' => 'el amria',
                    'ar_name' => 'العامرية',
                    'code' => '46011',
                ],
                11 => [
                    'name' => 'el emir abdelkader',
                    'ar_name' => 'الأمير عبد القادر',
                    'code' => '46012',
                ],
                12 => [
                    'name' => 'el malah',
                    'ar_name' => 'المالح',
                    'code' => '46013',
                ],
                13 => [
                    'name' => 'el messaid',
                    'ar_name' => 'امسعيد',
                    'code' => '46014',
                ],
                14 => [
                    'name' => 'hammam bouhadjar',
                    'ar_name' => 'حمام بوحجر',
                    'code' => '46015',
                ],
                15 => [
                    'name' => 'hassasna',
                    'ar_name' => 'الحساسنة',
                    'code' => '46016',
                ],
                16 => [
                    'name' => 'hassi el ghella',
                    'ar_name' => 'حاسي الغلة',
                    'code' => '46017',
                ],
                17 => [
                    'name' => 'oued berkeche',
                    'ar_name' => 'وادي برقش',
                    'code' => '46018',
                ],
                18 => [
                    'name' => 'oued sabah',
                    'ar_name' => 'وادي الصباح',
                    'code' => '46019',
                ],
                19 => [
                    'name' => 'ouled boudjemaa',
                    'ar_name' => 'اولاد بوجمعة',
                    'code' => '46020',
                ],
                20 => [
                    'name' => 'ouled kihal',
                    'ar_name' => 'اولاد الكيحل',
                    'code' => '46021',
                ],
                21 => [
                    'name' => 'oulhaça el gheraba',
                    'ar_name' => 'ولهاصة',
                    'code' => '46022',
                ],
                22 => [
                    'name' => 'sidi ben adda',
                    'ar_name' => 'سيدي بن عدة',
                    'code' => '46023',
                ],
                23 => [
                    'name' => 'sidi boumedienne',
                    'ar_name' => 'سيدي بومدين',
                    'code' => '46024',
                ],
                24 => [
                    'name' => 'sidi ouriache',
                    'ar_name' => 'سيدي أورياش',
                    'code' => '46025',
                ],
                25 => [
                    'name' => 'sidi safi',
                    'ar_name' => 'سيدي الصافي',
                    'code' => '46026',
                ],
                26 => [
                    'name' => 'tamzoura',
                    'ar_name' => 'تامزوغة',
                    'code' => '46027',
                ],
                27 => [
                    'name' => 'terga',
                    'ar_name' => 'تارقة',
                    'code' => '46028',
                ],
            ],
            47 => [
                0 => [
                    'name' => 'berriane',
                    'ar_name' => 'بريان',
                    'code' => '47001',
                ],
                1 => [
                    'name' => 'bounoura',
                    'ar_name' => 'بنورة',
                    'code' => '47002',
                ],
                2 => [
                    'name' => 'dhayet bendhahoua',
                    'ar_name' => 'ضاية بن ضحوة',
                    'code' => '47003',
                ],
                3 => [
                    'name' => 'el atteuf',
                    'ar_name' => 'العطف',
                    'code' => '47004',
                ],
                4 => [
                    'name' => 'el guerrara',
                    'ar_name' => 'القرارة',
                    'code' => '47005',
                ],
                5 => [
                    'name' => 'ghardaïa',
                    'ar_name' => 'غرداية',
                    'code' => '47006',
                ],
                6 => [
                    'name' => 'mansoura',
                    'ar_name' => 'منصورة',
                    'code' => '47007',
                ],
                7 => [
                    'name' => 'metlili',
                    'ar_name' => 'متليلي',
                    'code' => '47008',
                ],
                8 => [
                    'name' => 'sebseb',
                    'ar_name' => 'سبسب',
                    'code' => '47009',
                ],
                9 => [
                    'name' => 'zelfana',
                    'ar_name' => 'زلفانة',
                    'code' => '47010',
                ],
            ],
            48 => [
                0 => [
                    'name' => 'aïn rahma',
                    'ar_name' => 'عين الرحمة',
                    'code' => '48001',
                ],
                1 => [
                    'name' => 'aïn tarek',
                    'ar_name' => 'عين طارق',
                    'code' => '48002',
                ],
                2 => [
                    'name' => 'ammi moussa',
                    'ar_name' => 'عمي موسى',
                    'code' => '48003',
                ],
                3 => [
                    'name' => 'belassel bouzegza',
                    'ar_name' => 'بلعسل بوزغزة ',
                    'code' => '48004',
                ],
                4 => [
                    'name' => 'bendaoud',
                    'ar_name' => 'بن داود',
                    'code' => '48005',
                ],
                5 => [
                    'name' => 'beni dergoun',
                    'ar_name' => 'بني درقن',
                    'code' => '48006',
                ],
                6 => [
                    'name' => 'beni zentis',
                    'ar_name' => 'بني زنطيس',
                    'code' => '48007',
                ],
                7 => [
                    'name' => 'dar ben abdellah',
                    'ar_name' => 'دار بن عبد الله',
                    'code' => '48008',
                ],
                8 => [
                    'name' => 'djidioua',
                    'ar_name' => 'جديوية',
                    'code' => '48009',
                ],
                9 => [
                    'name' => 'el guettar',
                    'ar_name' => 'القطار',
                    'code' => '48010',
                ],
                10 => [
                    'name' => 'el hamadna',
                    'ar_name' => 'الحمادنة',
                    'code' => '48011',
                ],
                11 => [
                    'name' => 'el hassi',
                    'ar_name' => 'الحاسي',
                    'code' => '48012',
                ],
                12 => [
                    'name' => 'el matmar',
                    'ar_name' => 'المطمر',
                    'code' => '48013',
                ],
                13 => [
                    'name' => 'el ouldja',
                    'ar_name' => 'الولجة',
                    'code' => '48014',
                ],
                14 => [
                    'name' => 'had echkalla',
                    'ar_name' => 'حد الشكالة',
                    'code' => '48015',
                ],
                15 => [
                    'name' => 'hamri',
                    'ar_name' => 'حمري',
                    'code' => '48016',
                ],
                16 => [
                    'name' => 'kalaa',
                    'ar_name' => 'القلعة',
                    'code' => '48017',
                ],
                17 => [
                    'name' => 'lahlef',
                    'ar_name' => 'لحلاف',
                    'code' => '48018',
                ],
                18 => [
                    'name' => 'mazouna',
                    'ar_name' => 'مازونة',
                    'code' => '48019',
                ],
                19 => [
                    'name' => 'mediouna',
                    'ar_name' => 'مديونة',
                    'code' => '48020',
                ],
                20 => [
                    'name' => 'mendes',
                    'ar_name' => 'منداس',
                    'code' => '48021',
                ],
                21 => [
                    'name' => 'merdja sidi abed',
                    'ar_name' => 'مرجة سيدي عابد',
                    'code' => '48022',
                ],
                22 => [
                    'name' => 'ouarizane',
                    'ar_name' => 'واريزان',
                    'code' => '48023',
                ],
                23 => [
                    'name' => 'oued essalem',
                    'ar_name' => 'واد السلام',
                    'code' => '48024',
                ],
                24 => [
                    'name' => 'oued rhiou',
                    'ar_name' => 'وادي ارهيو',
                    'code' => '48025',
                ],
                25 => [
                    'name' => 'ouled aiche',
                    'ar_name' => 'أولاد يعيش',
                    'code' => '48026',
                ],
                26 => [
                    'name' => 'oued el djemaa',
                    'ar_name' => 'واد الجمعة',
                    'code' => '48027',
                ],
                27 => [
                    'name' => 'ouled sidi mihoub',
                    'ar_name' => 'أولاد سيدي الميهوب',
                    'code' => '48028',
                ],
                28 => [
                    'name' => 'ramka',
                    'ar_name' => 'الرمكة',
                    'code' => '48029',
                ],
                29 => [
                    'name' => 'relizane',
                    'ar_name' => 'غليزان',
                    'code' => '48030',
                ],
                30 => [
                    'name' => 'sidi khettab',
                    'ar_name' => 'سيدي خطاب',
                    'code' => '48031',
                ],
                31 => [
                    'name' => 'sidi lazreg',
                    'ar_name' => 'سيدي لزرق',
                    'code' => '48032',
                ],
                32 => [
                    'name' => 'sidi m\'hamed ben ali',
                    'ar_name' => 'سيدي امحمد بن علي',
                    'code' => '48033',
                ],
                33 => [
                    'name' => 'sidi m\'hamed benaouda',
                    'ar_name' => 'سيدي محمد بن عودة',
                    'code' => '48034',
                ],
                34 => [
                    'name' => 'sidi saada',
                    'ar_name' => 'سيدي سعادة',
                    'code' => '48035',
                ],
                35 => [
                    'name' => 'souk el had',
                    'ar_name' => 'سوق الحد',
                    'code' => '48036',
                ],
                36 => [
                    'name' => 'yellel',
                    'ar_name' => 'يلل',
                    'code' => '48037',
                ],
                37 => [
                    'name' => 'zemmora',
                    'ar_name' => 'زمورة',
                    'code' => '48038',
                ],
            ],
            49 => [
                0 => [
                    'name' => 'aougrout',
                    'ar_name' => 'أوﻗﺮت',
                    'code' => '49001',
                ],
                1 => [
                    'name' => 'charouine',
                    'ar_name' => 'ﺷﺮوﻳﻦ',
                    'code' => '49002',
                ],
                2 => [
                    'name' => 'deldoul',
                    'ar_name' => 'دﻟﺪول',
                    'code' => '49003',
                ],
                3 => [
                    'name' => 'ksar kaddour',
                    'ar_name' => 'قصر قدور',
                    'code' => '49004',
                ],
                4 => [
                    'name' => 'metarfa',
                    'ar_name' => 'المطارفة',
                    'code' => '49005',
                ],
                5 => [
                    'name' => 'ouled aïssa',
                    'ar_name' => 'وﻻد ﻋﻴﺴﻰ',
                    'code' => '49006',
                ],
                6 => [
                    'name' => 'ouled saïd',
                    'ar_name' => 'أولاد السعيد',
                    'code' => '49007',
                ],
                7 => [
                    'name' => 'talmine',
                    'ar_name' => 'ﻃﺎﻟﻤﻴﻦ',
                    'code' => '49008',
                ],
                8 => [
                    'name' => 'timimoun',
                    'ar_name' => 'ﺗﻴﻤﻴﻤﻮن',
                    'code' => '49009',
                ],
                9 => [
                    'name' => 'tinerkouk',
                    'ar_name' => 'تينركوك',
                    'code' => '49010',
                ],
            ],
            50 => [
                0 => [
                    'name' => 'bordj badji mokhtar',
                    'ar_name' => 'ﺑﺮج ﺑﺎﺟﻰ ﻣﺨﺘﺎر',
                    'code' => '50001',
                ],
                1 => [
                    'name' => 'timiaouine',
                    'ar_name' => 'ﺗﻴﻤﻴﺎوﻳﻦ',
                    'code' => '50002',
                ],
            ],
            51 => [
                0 => [
                    'name' => 'besbes',
                    'ar_name' => 'البسباس',
                    'code' => '51001',
                ],
                1 => [
                    'name' => 'ech chaïba',
                    'ar_name' => 'الشعيبة',
                    'code' => '51002',
                ],
                2 => [
                    'name' => 'doucen',
                    'ar_name' => 'الدوسن',
                    'code' => '51003',
                ],
                3 => [
                    'name' => 'ouled djellal',
                    'ar_name' => 'أولاد جلال',
                    'code' => '51004',
                ],
                4 => [
                    'name' => 'sidi khaled',
                    'ar_name' => 'سيدي خالد',
                    'code' => '51005',
                ],
                5 => [
                    'name' => 'ras el miaad',
                    'ar_name' => 'راس الميعاد',
                    'code' => '51006',
                ],
            ],
            52 => [
                0 => [
                    'name' => 'béni abbès',
                    'ar_name' => 'بني عباس',
                    'code' => '52001',
                ],
                1 => [
                    'name' => 'beni ikhlef',
                    'ar_name' => 'بني يخلف',
                    'code' => '52002',
                ],
                2 => [
                    'name' => 'el ouata',
                    'ar_name' => 'الواتة',
                    'code' => '52003',
                ],
                3 => [
                    'name' => 'igli',
                    'ar_name' => 'إقلي',
                    'code' => '52004',
                ],
                4 => [
                    'name' => 'kerzaz',
                    'ar_name' => 'كرزاز',
                    'code' => '52005',
                ],
                5 => [
                    'name' => 'ksabi',
                    'ar_name' => 'القصابي',
                    'code' => '52006',
                ],
                6 => [
                    'name' => 'oulad khodeir',
                    'ar_name' => 'أولاد خضير',
                    'code' => '52007',
                ],
                7 => [
                    'name' => 'tabelbala',
                    'ar_name' => 'تبلبالة',
                    'code' => '52008',
                ],
                8 => [
                    'name' => 'tamtert',
                    'ar_name' => 'تامترت',
                    'code' => '52009',
                ],
                9 => [
                    'name' => 'timoudi',
                    'ar_name' => 'تيمودي',
                    'code' => '52010',
                ],
            ],
            53 => [
                0 => [
                    'name' => 'in salah',
                    'ar_name' => 'عين صالح',
                    'code' => '53001',
                ],
                1 => [
                    'name' => 'foggaret ezzaouia',
                    'ar_name' => 'فقارة الزوى',
                    'code' => '53002',
                ],
                2 => [
                    'name' => 'in ghar',
                    'ar_name' => 'إن غار',
                    'code' => '53003',
                ],
            ],
            54 => [
                0 => [
                    'name' => 'in guezzam',
                    'ar_name' => 'عين قزام',
                    'code' => '54001',
                ],
                1 => [
                    'name' => 'tin zaouatine',
                    'ar_name' => 'تين زاوتين',
                    'code' => '54002',
                ],
            ],
            55 => [
                0 => [
                    'name' => 'benaceur',
                    'ar_name' => 'ﺑﻦ ﻧﺎﺻﺮ',
                    'code' => '55001',
                ],
                1 => [
                    'name' => 'blidet amor',
                    'ar_name' => 'ﺑﻠﻴﺪة ﻋﺎﻣﺮ',
                    'code' => '55002',
                ],
                2 => [
                    'name' => 'el allia',
                    'ar_name' => 'العالية',
                    'code' => '55003',
                ],
                3 => [
                    'name' => 'el hadjira',
                    'ar_name' => 'الحجيرة',
                    'code' => '55004',
                ],
                4 => [
                    'name' => 'megarine',
                    'ar_name' => 'اﻟﻤﻘﺎرﻳﻦ',
                    'code' => '55005',
                ],
                5 => [
                    'name' => 'm\'naguer',
                    'ar_name' => 'اﻟﻤﻨﻘﺮ',
                    'code' => '55006',
                ],
                6 => [
                    'name' => 'nezla',
                    'ar_name' => 'ﻧﺰﻟﺔ',
                    'code' => '55007',
                ],
                7 => [
                    'name' => 'sidi slimane',
                    'ar_name' => 'ﺳﻴﺪي ﺳﻠﻴﻤﺎن',
                    'code' => '55008',
                ],
                8 => [
                    'name' => 'taibet',
                    'ar_name' => 'اﻟﻄﻴﺒﺎت',
                    'code' => '55009',
                ],
                9 => [
                    'name' => 'temacine',
                    'ar_name' => 'ﺗﻤﺎﺳﻴﻦ',
                    'code' => '55010',
                ],
                10 => [
                    'name' => 'tebesbest',
                    'ar_name' => 'ﺗﻴﺒسﺴﺖ',
                    'code' => '55011',
                ],
                11 => [
                    'name' => 'touggourt',
                    'ar_name' => 'تقرت',
                    'code' => '55012',
                ],
                12 => [
                    'name' => 'zaouia el abidia',
                    'ar_name' => 'ﻟﺰاوﻳﺔ اﻟﻌﺎﺑﺪﻳﺔ',
                    'code' => '55013',
                ],
            ],
            56 => [
                0 => [
                    'name' => 'djanet',
                    'ar_name' => 'ﺟﺎﻧﺖ',
                    'code' => '56001',
                ],
                1 => [
                    'name' => 'bordj el gaouas',
                    'ar_name' => 'ﺑﺮ ج اﻟﺤﻮاس',
                    'code' => '56002',
                ],
            ],
            57 => [
                0 => [
                    'name' => 'djamaa',
                    'ar_name' => 'جامعة',
                    'code' => '57001',
                ],
                1 => [
                    'name' => 'el m\'ghair',
                    'ar_name' => 'المغير',
                    'code' => '57002',
                ],
                2 => [
                    'name' => 'merara',
                    'ar_name' => 'المرارة',
                    'code' => '57003',
                ],
                3 => [
                    'name' => 'oum touyour',
                    'ar_name' => 'أم الطيور',
                    'code' => '57004',
                ],
                4 => [
                    'name' => 'sidi amrane',
                    'ar_name' => 'سيدي عمران',
                    'code' => '57005',
                ],
                5 => [
                    'name' => 'sidi khellil',
                    'ar_name' => 'سيدي خليل',
                    'code' => '57006',
                ],
                6 => [
                    'name' => 'still',
                    'ar_name' => 'سطيل',
                    'code' => '57007',
                ],
                7 => [
                    'name' => 'tendla',
                    'ar_name' => 'تندلة',
                    'code' => '57008',
                ],
            ],
            58 => [
                0 => [
                    'name' => 'el menia',
                    'ar_name' => 'المنيعة',
                    'code' => '58001',
                ],
                1 => [
                    'name' => 'hassi gara',
                    'ar_name' => 'حاسي القارة',
                    'code' => '58002',
                ],
                2 => [
                    'name' => 'hassi fehal',
                    'ar_name' => 'حاسي الفحل',
                    'code' => '58003',
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
