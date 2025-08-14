<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $englishCategories = [
            'Literature', 'Science', 'Technology', 'History', 'Philosophy',
            'Religion', 'Arts', 'Cooking', 'Travel', 'Health',
            'Economics', 'Politics', 'Education', 'Sports', 'Programming'
        ];

        foreach ($englishCategories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    }

