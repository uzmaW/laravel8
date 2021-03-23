<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert(
            [
                [
                    'name' => 'Mobiles',
                    'description' => Str::words(50),
                ],
                [
                    'name' => 'Laptops',
                    'description' => Str::words(50),
                ],
                [
                    'name' => 'Electronic Appliances',
                    'description' => Str::words(50),
                ],
                [
                    'name' => 'Fashion',
                    'description' => Str::words(50),
                ],
                [
                    'name' => 'Sports & Specialty',
                    'description' => Str::words(50),
                ],
                [
                    'name' => 'Hotels',
                    'description' => Str::words(50),
                ],
            ]
        );
    }
}
