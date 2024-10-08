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
            ],
            [
                'norut' => 2,
                'pasangan_calon' => 'Rahmat Ramadhana Noer & Hikma',
                'picture' => 'rahmat-hikmah.png',
            ]
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
