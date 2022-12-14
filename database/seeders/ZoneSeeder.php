<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Schema;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();

        $data = json_decode(file_get_contents(__DIR__ . '/data/zones.json'));

        foreach ($data->zones as $item) {
            $zone = new \App\Models\Zone();
            $zone->id = $item->id;
            $zone->name = $item->zone;
            $zone->user_id = $item->boss_id;
            $zone->save();
        }

        Schema::enableForeignKeyConstraints();
    }
}
