<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
            'name' => '長崎小江スケートパーク',
            'adress' => '長崎県長崎市小江町2734-34',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1,
            'tag_id' => 3,
            'prefecture_id' => 42,
        ]);
        DB::table('places')->insert([
            'name' => '北九州スケートボードパーク',
            'adress' => '福岡県北九州市小倉北区赤坂１',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1,
            'tag_id' => 3,
            'prefecture_id' => 40,
        ]);
        DB::table('places')->insert([
            'name' => 'SB DUNK SKATE PLAZA',
            'adress' => '東京都江東区豊洲6丁目4-1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1,
            'tag_id' => 3,
            'prefecture_id' => 13,
        ]);
        DB::table('places')->insert([
            'name' => '長崎市総合運動公園（かきどまり）',
            'adress' => '長崎県長崎市柿泊町2210',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1,
            'tag_id' => 2,
            'prefecture_id' => 42,
        ]);
    }
}
