<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            [
                'id' => 1
                ,'name' => 'Sportswear essential'
                ,'description' => 'tshirt for men'
                ,'brand_id' => 1
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
                ,'deleted_at' => null
            ]
            ,[
                'id' => 2
                ,'name' => 'Men\'s Cotton Undershirt'
                ,'description' => 'tshirt for men'
                ,'brand_id' => 2
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
                ,'deleted_at' => null
            ]
            ,[
                'id' => 3
                ,'name' => 'Men\'s Crew-Neck Pima Cotton T-Shirt'
                ,'description' => 'tshirt for men'
                ,'brand_id' => 3
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
                ,'deleted_at' => null
            ]
            ,[
                'id' => 4
                ,'name' => 'Oversized cotton T-shirt with logo'
                ,'description' => 'tshirt for men'
                ,'brand_id' => 4
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
                ,'deleted_at' => null
            ]
            ,[
                'id' => 5
                ,'name' => 'heaven cotton T-shirt with happy'
                ,'description' => 'tshirt for men'
                ,'brand_id' => 4
                ,'created_at' => date('Y-m-d H:i:s')
                ,'updated_at' => date('Y-m-d H:i:s')
                ,'deleted_at' => null
            ]
        ]);

        DB::table('user_product')->insert([
            [
                'user_id' => 1
                ,'product_id' => 1
            ]
            ,[
                'user_id' => 1
                ,'product_id' => 2
            ],[
                'user_id' => 1
                ,'product_id' => 3
            ],[
                'user_id' => 1
                ,'product_id' => 4
            ],[
                'user_id' => 2
                ,'product_id' => 1
            ]
            ,[
                'user_id' => 2
                ,'product_id' => 2
            ],[
                'user_id' => 2
                ,'product_id' => 3
            ],[
                'user_id' => 2
                ,'product_id' => 4
            ]
        ]);
    }
}
