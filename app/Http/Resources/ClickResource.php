<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Url;
use App\Click;
use App\Http\Resources\UrlResource;

class ClickResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         $urls=$this->whenLoaded('urls');
        
         return [
                        'id'=>$this->id,
                        'url_id' =>$this->url_id,
                        'browser' => $this->browser,
                        'platform' => $this->platform,
                        'url'=> new UrlResource($urls),
                ];
    }
}
