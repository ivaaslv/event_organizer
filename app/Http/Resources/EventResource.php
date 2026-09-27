<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'title'=> $this->title,
            'slug'=> $this->slug,
            'description'=> $this->description,
            'speaker_name'=> $this->speaker_name,
            'location'=> $this->location,
            'start_date'=> $this->start_date ? $this->start_date->format('Y-m-d H:i:s') : null, // biar format nya tu tanggal
            'end_date'=> $this->end_date ? $this->end_date->format('Y-m-d H:i:s') : null,
            'quota'=> $this->quota,
            'banner_image'=> $this->banner_image ? asset('storage/' . $this->banner_image) : null, // Jika banner_image menyimpan nama file/path di storage (misal: events/poster.jpg), ubah menjadi URL lengkap menggunakan asset('storage/' . $this->banner_image).
            'status'=> $this->status,

            'category'=> new CategoryResource($this->whenLoaded('category')), // whenLoaded ini nampilin seluruh category, kaya nama, id dll

            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
