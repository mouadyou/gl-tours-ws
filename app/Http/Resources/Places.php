<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Places extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
//        dd($this->location);
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "picture" => str_replace("\\", "/", asset("storage" . "/" . $this->picture)),
            "location" => [
                "latitude" => $this->location["coordinates"][0],
                "longitude" => $this->location["coordinates"][1],
            ],
            "ads" => $this->ads,
            "created_at" => $this->created_at->format("Y/m/d H:i:s"),
            "updated_at" => $this->updated_at->format("Y/m/d H:i:s"),
        ];
    }
}
