<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class insertCarsData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();

        for($i = 0;$i< 50;$i++){
            DB::table('customers')->insert(
                [
                    'name' => $faker->randomElement(['haroon', 'adil', 'ahmed', 'muzamil', 'mudasir', 'rayan', 'awais', 'john', 'hashir' , 'saad' , 'rauf' , 'chohdary' , 'waqar' , 'muaz' , 'muhammad' , 'fayaz' , 'ali' , 'ramzan' , 'umar' , 'hafeez' , 'afzal' , 'iqbal']),
                    'reference' => $faker->randomNumber(5, true),
                    'created_at' => now()
                ]);
            }
    }
}
