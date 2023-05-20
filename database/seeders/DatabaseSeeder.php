<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create()

        \App\Models\Customer::create([
            'name' => 'Bojonegara',
            'username' => 'autem',
            'password' => Hash::make('password'),
            'email' => 'autem@gmail.com'
        ]);
        \App\Models\Customer::create([
            'name' => 'Medan',
            'username' => 'medan',
            'password' => Hash::make('password'),
            'email' => 'medan@gmail.com'
        ]);
        \App\Models\Mcs::create([
            'name' => 'MCS',
            'username' => 'mcs',
            'password' => Hash::make('password')
        ]);
        \App\Models\RSCM::create([
            'name' => 'RSCM',
            'username' => 'rscm',
            'password' => Hash::make('password')
        ]);

        \App\Models\Gas::create([
            'availability' => 100,
            'period' => now()->format('Y-m-d'),
            'status' => 0
        ]);
        // $this->call([
        //     RtSeeder::class,
        //     RwSeeder::class,
        //     PekerjaanSeeder::class,
        //     PendidikanSeeder::class,
        //     DaerahSeeder::class,
        //     GolonganDarahSeeder::class,
        //     UtilSeeder::class,
        //     KategoriKegiatanSeeder::class,
        //     KategoriFasilitasUmumSeeder::class,
        //     KegiatanSeeder::class,
        //     FasilitasSeeder::class,
        //     PengumumanSeeder::class,
        //     AgamaSeeder::class,
        //     WargaSeeder::class,
        //     StatusHubunganSeeder::class,
        // ]);
    }
}
