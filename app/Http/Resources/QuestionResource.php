<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'Title' => $this->title,
            'Path' => $this->path,
            'Body' => $this->body,
            'Created' => $this->created_at->diffforhumans(),
            'User Name' => $this->user->name
        ];
    }
}
