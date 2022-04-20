<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BayiSeeder::class);
        $this->call(PenimbangSeeder::class);
        $this->call(JenisImunisasiSeeder::class);
    
        $this->call(IbuHamilSeeder::class);
        
        $this->call(KaderSeeder::class);
        
        $this->call(ImunisasiSeeder::class);
    }
}
