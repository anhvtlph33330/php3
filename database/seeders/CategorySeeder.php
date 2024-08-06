<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fake = Faker::create();

        for($i=0; $i<10; $i++){
            DB::table('categories')->insert([
                'name' => $fake->text(25),
                'image' => 'https://i.pinimg.com/564x/f9/7f/43/f97f43100f79601db009db9b13c0542f.jpg',
            ]);
        }
    }
}
