<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'panelId'=>$this->panelId,
            'title'=>$this->title,
            'description'=>$this->description,
            'sort'=>$this->sort,
            'active'=>$this->active,
            'addedAt'=>$this->addedAt,
            'panelName'=>$this->panelName,
            'panelSlug'=>$this->panelSlug

        ];
    }
}
