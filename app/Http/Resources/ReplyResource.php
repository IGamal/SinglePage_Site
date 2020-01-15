<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
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
            'Identifier' => $this->id,
            'Reply' => $this->body,
            'Created' => $this->created_at->diffforhumans(),
            'Question ID' => $this->question_id,
            'User Name' => $this->user->name
        ];
    }
}
