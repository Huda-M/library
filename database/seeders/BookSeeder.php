<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();


        $categories = Category::all();


        for ($i = 0; $i < 50; $i++) {
            Book::create([
                'name' => $faker->sentence(3),
                'author' => $faker->name,
                'description' => $faker->paragraph(3),
                'photo' => 'book_cover_' . $faker->numberBetween(1, 10) . '.jpg',
                'available_copies' => $faker->numberBetween(1, 100),
                'price' => $faker->numberBetween(50, 500),
                'publish_year' => $faker->dateTimeBetween('-30 years', 'now')->format('Y-m-d'),
                'user_id' => $faker->randomElement([1, 2]),
                'category_id' => $categories->random()->id,
            ]);
        }
    }
}
