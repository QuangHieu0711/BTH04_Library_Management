<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        {
            // Tạo Faker instance
            $faker = Faker::create();
    
            // Chèn 100 sách vào bảng borrows
            foreach (range(1, 100) as $index) {
                DB::table('borrows')->insert([
                    'reader_id' => $faker->numberBetween(1, 100),
                    'book_id' => $faker->numberBetween(1, 100),
                    'borrow_date' => $faker->date(),
                    'return_date' => $faker->date(),
                    'status' => $faker->numberBetween(0, 1),
                ]);
            }
        }
    }
}
