<?php

use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('color')->insert([
            [
                'id' => 1
                ,'code' => 'BLK'
                ,'name' => 'Black'
                ,'hex' => '#000'
                ,'image' => null //base64 Content for images
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ]
            ,[
                'id' => 2
                ,'code' => 'WHT'
                ,'name' => 'White'
                ,'hex' => '#fff'
                ,'image' => null //base64 Content for images
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ]
            ,[
                'id' => 3
                ,'code' => 'RED'
                ,'name' => 'Red'
                ,'hex' => '#ff0000'
                ,'image' => null //base64 Content for images
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ]
            ,[
                'id' => 4
                ,'code' => 'BLU'
                ,'name' => 'Blue'
                ,'hex' => '#0000ff'
                ,'image' => null //base64 Content for images
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
