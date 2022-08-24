<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => '初級者',
        ]);
        DB::table('tags')->insert([
            'name' => '中級者',
        ]);
        DB::table('tags')->insert([
            'name' => '上級者',
        ]);
    }
}
