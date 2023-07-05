<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // Roles:


        // open users.json file on /database/seeders/data
        $json = file_get_contents(base_path('database/seeders/data/users.json'));
        // decode json
        $data = json_decode($json);
        $users = $data[2]->data;

        // insert data to database
        foreach ($users as $item) {
            $user = User::create([
                'name' => $item->display_name,
                'email' => $item->user_email,
                'password' => bcrypt('Eventos1234'),
            ]);

            $user->assignRole('admin');
        }
    }
}
