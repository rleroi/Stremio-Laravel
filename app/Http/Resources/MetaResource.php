<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MetaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'year' => $this->year,
            'poster' => $this->poster,
            'posterShape' => $this->posterShape,
            'banner' => $this->banner,
            'logo' => $this->logo,
            'background' => $this->background,
            'isFree' => $this->isFree,
            'type' => $this->type,
        ];
    }
} 