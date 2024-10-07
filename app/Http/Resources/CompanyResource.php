<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'pan' => $this->pan,
            'reg_no' => $this->name,
            'email' => $this->email,
            'youtube' => $this->youtube,
            'facebook' => $this->facebook,
            'logo' => asset($this->logo),
            'website' => $this->website,
            'published_at' => nepaliDate($this->created_at),
            'edited_at' => nepaliDate($this->updated_at),
        ];
    }
}
