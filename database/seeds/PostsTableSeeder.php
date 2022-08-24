<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('posts')->insert([
            'body' => 'test1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1,
        ]);
        DB::table('posts')->insert([
            'body' => 'test2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1,
        ]);
        DB::table('posts')->insert([
            'body' => 'test3',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1,
        ]);
    }
}
