<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(\App\Category::class, 10)->create();
        factory(\App\User::class, 10)->create();
//        factory(\App\Post::class)->create();
        $faker = \Faker\Factory::create();
        $users = \App\User::all();
        $categories = \App\Category::all();
        foreach ($users as $user) {
            for ($i = 0; $i < 10; $i++) {
                $post = \App\Post::create([
                    'user_id' => $user->id,
                    'title' => $faker->text(40),
                    'description' => $faker->paragraph(10),
                ]);
                if ($post instanceof \App\Post){
                    foreach ($categories as $category){
                        $post->categories()->sync($category->id);
                    }
                }
            }
        };

//        $categories = \App\Category::all();
//
//        foreach ($categories as $categories){
//
//        }
    }
}
