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
            'Question_ID' => $this->question_id,
            'Question_Slug' => $this->question->slug,
            'Like_Count' => $this->like->count(),
            'Liked' => !! $this->like->where('user_id', auth()->id())->count(),
            'UserName' => $this->user->name,
            'User_Id' => $this->user_id,
        ];
    }
}
