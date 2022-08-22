<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'koba',
            'email' => 'koba@koba',
            'password' => Hash::make('kobakoba'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
    }
}
