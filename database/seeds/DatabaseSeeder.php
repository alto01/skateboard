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
        $this->call([
            PlacesTableSeeder::class,
            UsersTableSeeder::class,
            PostsTableSeeder::class,
            TagsTableSeeder::class,
            PrefecturesTableSeeder::class,
            ]);
        //$this->call(UsersTableSeeder::class);
    }
}
