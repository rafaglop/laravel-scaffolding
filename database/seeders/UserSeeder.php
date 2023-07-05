<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // open users.json file on /database/seeders/data
        $json = file_get_contents(base_path('database/seeders/data/users.json'));
        // decode json
        $data = json_decode($json);
        $users = $data[2]->data;

        // insert data to database
        foreach ($users as $item) {
            dd($users, $item);
        }
    }
}
