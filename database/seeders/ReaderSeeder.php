<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ReaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1,100) as $index) {
            DB::table("readers")->insert([
                'name' => $faker->name,
                'birthday' => $faker->date('Y-m-d'),
                'address' => $faker->address,
                'phone' => $faker->numerify('##########'),
            ]);
        }
    }
}
