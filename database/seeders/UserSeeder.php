<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Zone;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Importación de usuarios internos
        $data = json_decode(file_get_contents(__DIR__ . '/data/users.json'));
        foreach ($data->users as $item) {

            $user = new User();
            $user->id = $item->id;
            $user->name = mb_strtoupper($item->name);
            $user->email = $item->email;
            $user->delegation_id = $item->delegacion_id;
            $user->password = '$2y$10$Hy4MklXF.XdAt3nc.ATXhekrA6Z2R2/hFDQva0PKezwa9KssLmPGO';
            $user->save();
        }

        // Usuario administrador
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@beonww.com';
        $user->password = bcrypt('Eventos1234');
        $user->save();
    }
}
