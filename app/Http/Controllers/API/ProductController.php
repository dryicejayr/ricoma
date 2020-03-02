<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\createProduct;
use App\Http\Requests\API\deleteProduct;
use App\Http\Requests\API\getProductByID;
use App\Http\Resources\ProductResource;
use App\Http\Resources\UserProductsResources;
use App\Product;
use App\Brand;
use App\Color;
use App\Size;
use App\ProductVariation;
use App\UserProductVariation;
use App\Exceptions\NoContentException;

class ProductController extends Controller
{

    /**
     * Create a Product
     * @param String Name
     * @param String Description
     * @param String Brand Code
     * @param Array Variations
     * @param Array Variations -> String Size Code
     * @param Array Variations -> String Color Code    
     * @return ProductResouce
     */
    public function createProduct(createProduct $request){
        $user = $request->user();
        try{
            \DB::beginTransaction();
            $brand = Brand::code($request->input('brand_code'))->first();
            $product = new Product;
            $product->setName($request->input('name'));
            $product->setDescription($request->input('description'));
            $product->setBrand($brand);
            $product->save();
            $variations = $request->input('variations');
            foreach($variations as $variation){
                $size = Size::code($variation['size_code'])->first();              
                $color = Color::code($variation['color_code'])->first();
                
                $variation = new ProductVariation;
                $variation->setSKU(generate_sku($brand, $size, $color));
                $variation->setProduct($product);
                $variation->setSize($size);
                $variation->setColor($color);
                $variation->save();
            }

            /** ASSOCIATE PRODUCT CREATED TO USER */
            $user->setUserProduct($product);

            \DB::commit();
          
            return new ProductResource($product);  

        }catch(\Exception $e){
            \DB::rollBack();
            report($e);
            throw new \Exception(config('messages.DEFAULT_ERROR'));
        }   
    }

    /**
     * Delete a Product
     * @param int|string productID/SKU   
     * @return Object MessageAlert
     */
    public function deleteProduct(deleteProduct $request){
        $userProduct = $request->user()->getUserProducts($request->input('id'));
        
        if(!$userProduct || !$userProduct->count()){
            throw new \Exception(config('messages.PRODUCT_NOT_FOUND_ON_USER'));
        }
        
        $userProduct->getProduct()->delete();
        $userProduct->delete();

        return MessageResponse(config('messages.REMOVE_PRODUCT_SUCCESS'));
    }

    /**
     * Get Product By Product ID/SKU
     * @param int|string productID/SKU
     * @return ProductResouce
     */
    public function getProductByID($id){
        $product = Product::find($id);
        if(!$product){
            throw new NoContentException();
        }
        return new ProductResource($product);  
    }

    /**
     * Get Products by User
     * @param user auth
     * @return UserProductsResources
     */
    public function getProducts(Request $request){
        $userProducts = $request->user()->getUserProducts();
        
        return new UserProductsResources($userProducts);
    }
}
