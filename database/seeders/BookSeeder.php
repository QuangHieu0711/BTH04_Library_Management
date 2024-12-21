<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo Faker instance
        $faker = Faker::create();

        // Chèn 100 sách vào bảng books
        foreach (range(1, 100) as $index) {
            DB::table('books')->insert([
                'name' => $faker->sentence(3),
                'author' => $faker->name(),
                'category' => $faker->word(),
                'year' => $faker->year(),
                'quantity' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}
