<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\LikeResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'status' => $this->status,
            'user' => new UserResource($this->whenLoaded('user')),
            'likes' => new LikeResource($this->whenLoaded('likes')),
        ];
    }
}
