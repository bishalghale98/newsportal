<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'image' => asset($this->image),
            'title' => $this->title,
            'description' => $this->description,
            'views' => $this->views,
            'published_at' => nepaliDate($this->created_at),
            // 'published_at' => $this->created_at->format('Y M d'), for english date formated
            'updated_at' => nepaliDate($this->updated_at),
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
        ];
    }
}
