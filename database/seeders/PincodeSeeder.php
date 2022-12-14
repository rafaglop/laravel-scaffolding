<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pincode;

class PincodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/data/pincodes.json'));
        foreach ($data->pincodes as $item) {
            $pincode = new Pincode();
            $pincode->code = $item->pincode;
            $pincode->group = 'alimen';
            $pincode->type = 'tostada';
            $pincode->save();
        }
    }
}
