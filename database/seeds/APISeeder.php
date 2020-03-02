<?php

use Illuminate\Database\Seeder;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Str;

class APISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Create a user */
        $username = Str::random(10);
        $password = Str::random(10);
        
        $user = $this->apiCalls(
            '/api/user'
            ,[
                'first_name' => Str::random(10)
                ,'last_name' => Str::random(10)
                ,'email' => Str::random(10)
                ,'user_name' => $username
                ,'password' => $password
            ]
        );

        /** LOGIN USER TO GET AUTHENTICATION */
        $login = $this->apiCalls(
                '/api/authentication'
                ,[
                    'user_name' => $username
                    ,'password' => $password
                ]
        );
        
    }

    public function apiCalls($endPoint='', $data=[],$token=null){
        try{
            $headers = [
                'headers' => [
                    'Accept' => 'application/json; charset=utf-8'
                ]
            ];
            if(!$token){
                $headers['headers']['Authorization'] = "Bearer {$token}";
            }
            $client = new HttpClient();
            $response = $client->post(config('app.url').$endPoint, [ 'json' => $data ]);
            
            $statusCode = $response->getStatusCode();
            $content = $response->getBody()->getContents();
            
            \Log::info("content {$content} statuscode {$statusCode}");
            return json_decode($content, true);
        }catch(ClientException $e){
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            \Log::error(print_r($responseBodyAsString, true));
        }catch(\Exception $e){
            \Log::error("Error " . $e->getMessage());
        }
    }
}
