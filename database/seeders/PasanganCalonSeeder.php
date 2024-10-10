<?php

namespace Database\Seeders;

use App\Models\PasanganCalon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PasanganCalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'norut' => 1,
                'pasangan_calon' => 'Faldin Buton & Sarly Asri',
                'picture' => 'faldin-sarly.png',
                'kategori' => 'bem',
            ],
            [
                'norut' => 2,
                'pasangan_calon' => 'Rahmat Ramadhana Noer & Hikma',
                'picture' => 'rahmat-hikmah.png',
                'kategori' => 'bem',
            ],
            [
                'norut' => 1,
                'pasangan_calon' => 'Eril kurniawan',
                'picture' => 'eril.png',
                'kategori' => 'peter',
            ],
            [
                'norut' => 2,
                'pasangan_calon' => 'Kotak Kosong',
                'picture' => 'kotak-kosong.png',
                'kategori' => 'peter',
            ],
            [
                'norut' => 1,
                'pasangan_calon' => 'M. Rezki',
                'picture' => 'rezki.png',
                'kategori' => 'akt',
            ],
            [
                'norut' => 1,
                'pasangan_calon' => 'Riswandi',
                'picture' => 'riswan.png',
                'kategori' => 'akt',
            ],
        ];

        foreach ($data as $key => $value) {
            PasanganCalon::insert($value);
        }

        // DB::table('pasangan_calons')->insert([
        //     'norut' => 1,
        //     'pasangan_calon' => 'Faldin Buton & Sarly Asri',
        //     'picture' => 'faldin-sarly.png',
        // ],[
        //     'norut' => 2,
        //     'pasangan_calon' => 'Rahmat Ramadhana Noer & Hikma',
        //     'picture' => 'rahmat-hikmah.png',
        // ]);
    }
}
