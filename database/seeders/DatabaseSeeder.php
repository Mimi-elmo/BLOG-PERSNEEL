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
                'name' => $categoryName,
            ])->id;
        }

        $user = User::create([
            'name' => 'John Blogger',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
        ]);

        $articles = [
            [
                'title' => 'Getting Started with Laravel 11',
                'content' => "Laravel 11 introduces a fresh approach to building modern PHP applications. In this comprehensive guide, we'll explore the new features and improvements that make development even more enjoyable.\n\n## What's New in Laravel 11\n\n### Simplified Application Structure\n\nOne of the most notable changes is the streamlined application structure. The default directory structure is now cleaner, with optional directories that can be added as needed.\n\n### Improved Artisan Commands\n\nThe artisan commands have been refined to be more intuitive. New developers will find it easier to get started with the framework.\n\n### Enhanced Performance\n\nLaravel 11 brings significant performance improvements out of the box. The routing system has been optimized, and there's better support for application monitoring.\n\n## Getting Started\n\nTo create a new Laravel 11 project, run:\n\n```bash\ncomposer create-project laravel/laravel my-app\n```\n\nThen configure your database and start the development server.\n\n## Conclusion\n\nLaravel 11 continues the tradition of making PHP development enjoyable and productive.",
                'status' => 'published',
                'published_at' => now(),
                'category_id' => $categoryIds[0],
                'user_id' => $user->id,
            ],
            [
                'title' => 'Mastering Eloquent Relationships',
                'content' => "Eloquent is Laravel's powerful ORM that makes database interactions a breeze. In this article, we'll dive deep into relationships and how to use them effectively.\n\n## One-to-One Relationships\n\nThe simplest relationship type. Use the hasOne and belongsTo methods to define it.\n\n## One-to-Many Relationships\n\nPerfect for scenarios like a blog post with multiple comments. Use hasMany and belongsTo.\n\n## Many-to-Many Relationships\n\nMore complex but incredibly useful. Requires a pivot table. Perfect for user roles, tags, and categories.\n\n## Polymorphic Relationships\n\nAdvanced relationships that allow a model to belong to multiple other models on a single association.\n\n## Tips for Optimal Performance\n\n1. Always use eager loading with with() to avoid N+1 queries\n2. Use lazy loading only when necessary\n3. Index your foreign key columns\n4. Consider using query scopes for reusable query logic",
                'status' => 'published',
                'published_at' => now(),
                'category_id' => $categoryIds[0],
                'user_id' => $user->id,
            ],
            [
                'title' => 'PHP 8.4: New Features You Should Know',
                'content' => "PHP 8.4 brings exciting new features that improve developer experience and performance. Let's explore what's new.\n\n## Property Hooks\n\nProperty hooks allow you to define validation and computation logic directly in your class properties.\n\n## Asymmetric Visibility\n\nNow you can have different visibility for getters and setters.\n\n## Improved JSON Validation\n\nNew functions for better JSON handling.\n\n## Performance Improvements\n\nPHP 8.4 includes JIT improvements and memory optimizations.\n\n## Migrating to PHP 8.4\n\nMost PHP 8.3 code will work without changes, but always test thoroughly.",
                'status' => 'published',
                'published_at' => now(),
                'category_id' => $categoryIds[1],
                'user_id' => $user->id,
            ],
            [
                'title' => 'Docker Fundamentals for Developers',
                'content' => "Docker has become an essential tool in modern development workflows. This guide covers the fundamentals you need to get started.\n\n## What is Docker?\n\nDocker is a platform for developing, shipping, and running applications in containers. Containers are lightweight and include everything needed to run the software.\n\n## Key Concepts\n\n### Images\n\nTemplates for containers. Defined in Dockerfile.\n\n### Containers\n\nRunning instances of images.\n\n### Volumes\n\nPersistent data storage.\n\n### Networks\n\nCommunication between containers.\n\n## Basic Commands\n\n- docker build -t my-app .\n- docker run -p 8080:80 my-app\n- docker ps\n- docker stop container_id\n\n## Docker Compose\n\nFor multi-container applications, Docker Compose is invaluable.\n\n## Best Practices\n\n1. Use official images when possible\n2. Keep images small with multi-stage builds\n3. Never store secrets in images\n4. Use volumes for persistent data",
                'status' => 'draft',
                'published_at' => null,
                'category_id' => $categoryIds[2],
                'user_id' => $user->id,
            ],
            [
                'title' => 'Modern JavaScript: ES6+ Features',
                'content' => "JavaScript has evolved significantly. Let's explore the modern features that make JS more powerful and readable.\n\n## Arrow Functions\n\nCleaner syntax for functions.\n\n## Destructuring\n\nEasily extract values from arrays and objects.\n\n## Async/Await\n\nCleaner asynchronous code.\n\n## Spread Operator\n\nCombine arrays and objects.\n\n## Optional Chaining and Nullish Coalescing\n\nSafely access nested properties.\n\n\n## Modules\n\nModern ES6 modules for better code organization.\n\n## Modern Tools\n\nUse Vite for fast development, TypeScript for type safety, and ESLint for code quality.",
                'status' => 'published',
                'published_at' => now(),
                'category_id' => $categoryIds[3],
                'user_id' => $user->id,
            ],
            [
                'title' => 'Building a CI/CD Pipeline with GitHub Actions',
                'content' => "Continuous Integration and Continuous Deployment are essential for modern development. Let's build a complete pipeline.\n\n## What is CI/CD?\n\nCI automatically tests and builds code changes. CD automatically deploys to production.\n\n## GitHub Actions Basics\n\nWorkflows are defined in .github/workflows/ directory.\n\n\n## Basic Workflow Structure\n\n- Trigger on push and pull requests\n- Run tests on multiple Node versions\n- Deploy on success\n\n## Deployment Job\n\nDeploy to production after tests pass.\n\n\n## Best Practices\n\n1. Keep workflows fast with caching\n2. Use environment protection rules\n3. Automate rollbacks on failure\n4. Monitor deployment metrics\n\n## Advanced Features\n\n- Matrix builds for multiple configurations\n- Manual approval gates\n- Self-hosted runners for specific needs",
                'status' => 'draft',
                'published_at' => null,
                'category_id' => $categoryIds[2],
                'user_id' => $user->id,
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
