<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pincode;
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
        $this->call(ZoneSeeder::class);
        $this->call(DelegationSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(PostalCodeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PincodeSeeder::class);
    }
}
