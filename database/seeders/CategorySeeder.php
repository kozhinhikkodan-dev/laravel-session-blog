<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $categories = [
            [
                'name' => 'Laravel',
            ],
            [
                'name' => 'PHP',
            ],
            [
                'name' => 'Javascript',
            ],
            [
                'name' => 'React',
            ],
            [
                'name' => 'Vue',
            ],
            [
                'name' => 'Angular',
            ]
        ];


        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
