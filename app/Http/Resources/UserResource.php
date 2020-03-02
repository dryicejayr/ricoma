<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->getId()
            ,'first_name' => $this->getFirstName()
            ,'last_name' => $this->getLastName()
            ,'user_name' => $this->getUserName()
            ,'email' => $this->getEmail() 
        ];
    }
}
