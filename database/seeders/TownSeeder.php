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
