<?php


namespace Ivy47\HebcalApi\Http\Resources\HebcalItem;


use Illuminate\Http\Resources\Json\JsonResource;

class HebcalItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'date' => $this->date,
            'category' => $this->category,
            'title_orig' => $this->title_orig,
            'hebrew' => $this->hebrew,
            'leyning' => $this->leyning,
            'memo' => $this->memo,
            'link' => $this->link
        ];
    }
}