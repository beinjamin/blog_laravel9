<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory(5)->create();

        User::factory(5)->create() ->each(function($user) use ($categories)
        {
        Post::factory(rand(1,4))->create([
            'user_id' => $user->id,
            'category_id ' => ($categories->random(1)->first())->id
        ]);
        });
    }
}
