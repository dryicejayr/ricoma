In the Root Directory i added a file called "Ricoma.postman_collection.json" this file is for POSTMAN
application for BACKEND API Development to Test the API.

before using the APIs, execute "php artisan serve" to run server.

```json
API Routes

"LOGIN TO GET AUTHENTICATION TOKEN"
GET api/authentication
PARAMS
{
    "user_name" : "johndoe"
    ,"password" : "johndoe"
}


"CREATE USER"
GET api/register
PARAMS
{
	"user_name" : "johndoe"
	,"password" : "johndoe"
	,"first_name" : "johndoe"
	,"last_name" : "johndoe"
	,"email" : "test@gmail.com"
}



"CREATE PRODUCTS AND VARIATIONS"
POST api/products
*AUTHENTICATION TOKEN REQUIRED
PARAMS
{
	"name" : "nike tshirt checked mark"
	,"description" : "a teacher optional field"
	,"brand_code" : "NI"
	,"variations" : [
		{
			"size_code" : "XL"
			,"color_code" : "BLK"
		}
		,{
			"size_code" : "L"
			,"color_code" : "BLU"
		}
		,{
			"size_code" : "S"
			,"color_code" : "RED"
		}
	]
}



"DELETE A PRODUCT"
DELETE api/product
*AUTHENTICATION TOKEN REQUIRED
PARAMS
{
	"id" : 1
}



"GET ANY PRODUCT BY ID"
GET api/product/{PRODUCT_ID}



"GET USER PRODUCTS"
GET api/products
*AUTHENTICATION TOKEN REQUIRED

```

