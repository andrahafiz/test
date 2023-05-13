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
            'password' => Hash::make('password')
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
