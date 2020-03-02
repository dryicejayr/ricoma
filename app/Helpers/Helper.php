<?php
use App\Brand;
use App\Size;
use App\Color;
use App\Product;
use App\ProductVariation;

/**
 * SKU FORMAT [2LTR BRAND_CODE][2LTR SIZE_CODE][3LTR COLOR_CODE]-[SEQUENCE ID]
 */
if(! function_exists('generate_sku')){
    function generate_sku(Brand $brand, Size $size, Color $color){
        $product = Product::latest()->first();
        $sequence = str_pad($product->getId(),4,'0',STR_PAD_LEFT);

        $sku = $brand->getCode().$size->getCode().$color->getCode().'-'.$sequence;

        do{
            $found = ProductVariation::sku($sku)->count();  
        }while($found>0);

        return $sku;
    }
}

if(! function_exists('MessageResponse')){
	function MessageResponse($message,$code=200){
		if( !is_array($message) && !is_object($message)){
			$message = [ $message ];
		}
		return response()->json([
			'code' => $code
			,'message' => $message
		], $code);
	}
}