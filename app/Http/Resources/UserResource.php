<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        // dd($this->department()->select('name','id')->first());
        return [
            'name' => $this->name,
            'email' => $this->email,
            'id' => $this->id,
            'department' => $this->department
        ];
    }
}
