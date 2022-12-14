<?php

namespace Database\Seeders;

use App\Models\PostalCode;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostalCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
            $table->unsignedBigInteger('province_id');
            $table->string('locality');
            $table->string('postal_code')->unique();
            $table->string('lat');
            $table->string('lon');
        */
        $data = json_decode(file_get_contents(__DIR__ . '/data/cp.json'));
        foreach ($data as $item) {

            $province = Province::where('name', $item->provincia)->firstOrFail();
            $postalCode = new PostalCode();
            $postalCode->locality = $item->poblacion;
            $postalCode->province_id = $province->id;
            $postalCode->postal_code = $item->codigopostalid;
            $postalCode->lat = $item->lat;
            $postalCode->lon = $item->lon;
            $postalCode->save();
        }
    }
}
