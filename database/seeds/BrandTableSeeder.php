<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brand')->insert([
            [
                'id' => 1
                ,'code' => 'NI'
                ,'name' => 'Nike'
                ,'logo_url' => 'nike.png'
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ]
            ,[
                'id' => 2
                ,'code' => 'TH'
                ,'name' => 'Tommy Hilfiger'
                ,'logo_url' => 'tommy.png'
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ]
            ,[
                'id' => 3
                ,'code' => 'LC'
                ,'name' => 'Lacoste'
                ,'logo_url' => 'lacost.png'
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ]
            ,[
                'id' => 4
                ,'code' => 'GU'
                ,'name' => 'Gucci'
                ,'logo_url' => 'gucci.png'
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
