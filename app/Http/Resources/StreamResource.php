<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StreamResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'availability' => $this->availability,
            'url' => $this->url,
            'name' => $this->name,
            'title' => $this->title,
        ];
    }
} 