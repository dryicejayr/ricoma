<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            [
                'id' => 1
                ,'first_name' => 'John'
                ,'last_name' => 'Doe'
                ,'user_name' => 'johndoe'
                ,'email' => 'johndoe@gmail.com'
                ,'password' => Hash::make('johndoe')
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
                ,'deleted_at' => null
            ]
            ,[
                'id' => 2
                ,'first_name' => 'Jane'
                ,'last_name' => 'Doe'
                ,'user_name' => 'janedoe'
                ,'email' => 'janedoe@gmail.com'
                ,'password' => Hash::make('janedoe')
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
                ,'deleted_at' => null
            ]
        ]);
    }
}
