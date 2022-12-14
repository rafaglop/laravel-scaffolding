<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Schema;

class DelegationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();

        $data = json_decode(file_get_contents(__DIR__ . '/data/delegaciones.json'));

        foreach ($data->delegaciones as $item) {

            $delegation = new \App\Models\Delegation();
            $delegation->id = $item->id;
            $delegation->name = $item->delegacion;
            $delegation->user_id = $item->user_id;
            $delegation->zone_id = $item->zone_id;
            $delegation->save();
        }

        Schema::enableForeignKeyConstraints();
    }
}
