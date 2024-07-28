<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->text(35),
                'poster' => $faker->text(40),
                'intro' => $faker->text(50),
                'release_date' => $faker->date(),
                'genre_id' => rand(1,5),
            ]);
        }
    }
}
