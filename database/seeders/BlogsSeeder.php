<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $blogs = [
            [
                'title' => 'Understanding Laravel',
                'description' => 'An introduction to the Laravel framework and its features.',
            ],
            [
                'title' => 'Advanced Eloquent Techniques',
                'description' => 'Explore advanced querying techniques using Laravel\'s Eloquent ORM.',
            ],
            [
                'title' => 'Building RESTful APIs',
                'description' => 'Learn how to build and secure RESTful APIs in Laravel.',
            ],
            [
                'title' => 'Blade Templating Mastery',
                'description' => 'A guide to mastering the Blade templating engine in Laravel.',
            ],
            [
                'title' => 'Laravel Security Best Practices',
                'description' => 'Essential security practices for Laravel applications.',
            ],
            [
                'title' => 'Optimizing Laravel Performance',
                'description' => 'Tips and tricks to optimize the performance of your Laravel apps.',
            ],
            [
                'title' => 'Integrating Third-party Services',
                'description' => 'How to integrate third-party services into your Laravel project.',
            ],
            [
                'title' => 'Working with Laravel Packages',
                'description' => 'Discover how to use and create Laravel packages effectively.',
            ],
            [
                'title' => 'Deploying Laravel to Production',
                'description' => 'Best practices for deploying Laravel applications to production.',
            ],
            [
                'title' => 'Testing with PHPUnit in Laravel',
                'description' => 'An in-depth look at testing Laravel applications using PHPUnit.',
            ],
        ];


        foreach ($blogs as $blog) {
            Blog::create($blog);
        }

    }
}
