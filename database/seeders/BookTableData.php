<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BookTableData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('books')->insert([
                'Title' => $faker->title,
                'Author' => $faker->name,
                'Date' => $faker->date,
                'user_id'=>rand(1,10),
                'Category'=>'imaginational'

            ]);
        }
    }
}
