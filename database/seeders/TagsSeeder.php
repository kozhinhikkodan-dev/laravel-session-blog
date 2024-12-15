<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $tags = [
            [
                'name' => 'laravel',
            ],
            [
                'name' => 'finance',
            ],
            [
                'name' => 'blog',
            ],
            [
                'name' => 'api',
            ],
            [
                'name' => 'coding',
            ],
           
        ];


        foreach ($tags as $tag) {
            Tag::create($tag);
        }

    }
}
