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
        //
        DB::table('users')->insert([
            'UserID' => 1,
            'username' => "ferdiebergado",            
            'password' => bcrypt('alingfely'),
            'role' => 1,
        ]);
        DB::table('users')->insert([
            'UserID' => 3,
            'username' => "bld.tld",            
            'password' => bcrypt('depedtld'),
            'role' => 3,
        ]);
    }
}
