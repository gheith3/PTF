<?php

namespace Database\Seeders;

use App\Models\PlacesType;
use Illuminate\Database\Seeder;

class PlacesTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ["ar" => "مقهى", "en" => "Coffee Shop"],
            ["ar" => "مطعم", "en" => "Restaurant"],
            ["ar" => "مكتبة", "en" => "Library"]
        ];
        foreach ($types as $type) {
           $place = PlacesType::create([
               'name' => $type,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
