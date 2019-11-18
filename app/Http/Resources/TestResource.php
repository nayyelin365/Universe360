<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
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
            "language" => $this->languages->language_name,
                "key" => $this->keys->key_name,
                "value" => $this->key_description,
                "audio" => $this->language_audio,
        ];
    }
}
