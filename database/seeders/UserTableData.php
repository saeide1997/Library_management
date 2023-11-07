<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class UserTableData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        foreach (range(1,10) as $index){
            DB::table('users')->insert([
                'Name'=>$faker->name,
                'Gender'=>'woman',
                'Email'=>$faker->email,
                'password'=>$faker->password,
                'Phone'=>rand(11111,99999),
                'book_id'=>rand(1,10)

            ]);
        }
    }
}
