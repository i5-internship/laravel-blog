<?php

use Illuminate\Database\Seeder;

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
//        factory(\App\User::class,1000)->create();


        $faker = \Faker\Factory::create();
        //Get All Users
        $users = \App\User::all();
        // loop user
        foreach ($users as $user) {
            //loop create post
            for ($i = 0; $i < 10; $i++) {
                \App\Post::create(
                    [
                        'user_id' => $user->id,
                        'title' => $faker->name,
                        'description' => $faker->paragraph(20),
                    ]);
            }
        }
    }
}
