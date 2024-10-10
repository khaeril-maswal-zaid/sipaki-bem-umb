<?php

namespace Database\Seeders;

use App\Models\PasanganCalon;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Khaeril Maswal Zaid',
            'prodi' => 'Admin Sipaki',
            'email' => 'muhammadkhaerilzaid@gmail.com',
        ]);

        $this->call([
            PasanganCalonSeeder::class,
        ]);
    }
}
