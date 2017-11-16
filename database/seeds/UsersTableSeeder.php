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
            'name' => 'do van chieu',
            'email' => 'karaoke@admin.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
