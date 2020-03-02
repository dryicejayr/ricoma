<?php

use Illuminate\Database\Seeder;

class ProductVariationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 
            NIKE S BLACK 
            NIKE M BLACK 
            NIKE L BLACK 
            NIKE XL BLACK
            NIKE S WHITE 
            NIKE M WHITE 
            NIKE L WHITE 
            NIKE XL WHITE
            NIKE S RED 
            NIKE M RED 
            NIKE L RED 
            NIKE XL RED 
            NIKE S RED 
            NIKE M RED 
            NIKE L RED 
            NIKE XL RED   
        */
        $variations = [
            [ 'size_id' => 1 ,'color_id' => 1 ] 
            ,[ 'size_id' => 2 ,'color_id' => 1 ] 
            ,[ 'size_id' => 1 ,'color_id' => 2 ] 
            ,[ 'size_id' => 3 ,'color_id' => 2 ]
            ,[ 'size_id' => 3 ,'color_id' => 3 ] 
            ,[ 'size_id' => 4 ,'color_id' => 3 ] 
            ,[ 'size_id' => 1 ,'color_id' => 4 ] 
            ,[ 'size_id' => 4 ,'color_id' => 4 ] 
        ];
        
        $productsIds = [1,2,3,4,5];
        $brandsIds = [1,2,3,4];

        foreach($productsIds as $productsId){
            foreach($brandsIds as $brandsId){
                foreach($variations as $variation){
                    $insert = [
                        'sku' => $brandsId.'-'.$variation['size_id'].'-'.$variation['color_id'].rand(0,100).rand(111,999)
                        ,'product_id' => $productsId
                        ,'size_id' => $variation['size_id']
                        ,'color_id' => $variation['color_id']
                        ,'created_at' => date('Y-m-d H:i:s')
                        ,'updated_at' => date('Y-m-d H:i:s')
                        ,'deleted_at' => null
                    ];
                    DB::table('product_variation')->insert($insert);
                }
            }
        } 
    }
}
