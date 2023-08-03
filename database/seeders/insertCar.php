<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class insertCar extends Seeder
{
    public function run()
    {
        $faker = faker::create();

        for($i = 0;$i< 100;$i++){
            DB::table('cars')->insert(
                [
                    'code' => $faker->randomNumber(4, true),
                    'name' => $faker->randomElement(['Mehran', 'Corrola', 'Cultas', 'Suzuki', 'Mercendize', 'Benx', 'Ferrari', 'Royal Royce']),
                    'stock' => $faker->numberBetween($min=0, $max=500000),
                    'purchase_price' => $faker->numberBetween($min=0, $max=500000),
                    'rent' => $faker->numberBetween($min=0, $max=500000),
                    'avail' => $faker->randomElement([0, 1]),
                    'customer_id' => $faker->numberBetween($min = 0, $max = 0),
                    'created_at' => now()
                ]);
            }
        
    }
}
