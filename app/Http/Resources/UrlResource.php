<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UrlResource extends JsonResource
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
                "type" =>'urls',
                'id' =>$this->id,
                 'attributes'=>
                    ['created_at' =>date('Y-m-d- H:i', strtotime($this->created_at)),
                      'original_url' =>$this->original_url,
                      'short_url' =>$this->short_url,
                      'clicks'=> $this->clicks_count
                    ],
                    'relationships' =>
                        ['clicks'=>['data'=>[ClickResource::collection($this->whenLoaded('clicksList'))]]],
                    
            ];
    }
}
