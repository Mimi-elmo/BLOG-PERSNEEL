<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
       $categories = ['Laravel', 'PHP', 'DevOps', 'JavaScript'];
        $categoryIds = [];

        foreach ($categories as $categoryName) {        
             $categoryIds[] = Category::firstOrCreate([
             'name' => $categoryName
             ])->id;
            }


        $user = User::create([
        'name' => 'Test User',
        'email' => fake()->unique()->safeEmail(),
        'password' => 'password',
        ]);

        $articles = [
            ['title' => 'Getting Started with Laravel', 'content' => 'Laravel is amazing...', 'status' => 'published', 'published_at' => now(), 'category_id' => $categoryIds[0], 'user_id' => $user->id],
            ['title' => 'Laravel Eloquent Tips', 'content' => 'Eloquent tips and tricks...', 'status' => 'published', 'published_at' => now(), 'category_id' => $categoryIds[0], 'user_id' => $user->id],
            ['title' => 'PHP 8 Features', 'content' => 'New PHP 8 features...', 'status' => 'published', 'published_at' => now(), 'category_id' => $categoryIds[1], 'user_id' => $user->id],
            ['title' => 'Docker for Beginners', 'content' => 'Docker basics...', 'status' => 'draft', 'published_at' => null, 'category_id' => $categoryIds[2], 'user_id' => $user->id],
            ['title' => 'JavaScript ES6 Guide', 'content' => 'ES6 features...', 'status' => 'published', 'published_at' => now(), 'category_id' => $categoryIds[3], 'user_id' => $user->id],
            ['title' => 'CI/CD Pipeline Setup', 'content' => 'Setting up pipelines...', 'status' => 'draft', 'published_at' => null, 'category_id' => $categoryIds[2], 'user_id' => $user->id],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
