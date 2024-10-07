<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'nep_title' => $this->nep_title,
            'slug' => $this->slug,
            'published_at' => nepaliDate($this->created_at),
            'posts' => PostResource::collection($this->posts),
        ];
    }
}
