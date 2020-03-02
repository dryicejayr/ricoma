<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('size')->insert([
            [
                'id' => 1
                ,'code' => 'S'
                ,'name' => 'Small'
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ]
            ,[
                'id' => 2
                ,'code' => 'M'
                ,'name' => 'Medium'
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ]
            ,[
                'id' => 3
                ,'code' => 'L'
                ,'name' => 'Large'
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ]
            ,[
                'id' => 4
                ,'code' => 'XL'
                ,'name' => 'Extra Large'
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
