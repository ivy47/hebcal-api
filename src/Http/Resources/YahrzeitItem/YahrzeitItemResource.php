<?php


namespace Ivy47\HebcalApi\Http\Resources\YahrzeitItem;


use Illuminate\Http\Resources\Json\JsonResource;

class YahrzeitItemResource extends JsonResource
{
    public function toArray($request)
    {
        $data = [
            'title' => $this->title,
            'date' => $this->date,
        ];

        if (isset($this->memo)) {
            $data['memo'] = $this->memo;
        }

        return $data;
    }
}