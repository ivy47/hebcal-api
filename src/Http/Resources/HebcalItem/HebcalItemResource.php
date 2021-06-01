<?php


namespace Ivy47\HebcalApi\Http\Resources\HebcalItem;


use Illuminate\Http\Resources\Json\JsonResource;

class HebcalItemResource extends JsonResource
{
    public function toArray($request)
    {
        $data = [
            'title' => $this->title,
            'date' => $this->date,
            'category' => $this->category,
            'title_orig' => $this->title_orig,
            'hebrew' => $this->hebrew,
        ];

        if (isset($this->leyning)) {
            $data['leyning'] = $this->leyning;
        }

        if (isset($this->memo)) {
            $data['memo'] = $this->memo;
        }

        if (isset($this->link)) {
            $data['link'] = $this->link;
        }

        return $data;
    }
}