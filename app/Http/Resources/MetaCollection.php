<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MetaCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'metas' => $this->collection,
        ];
    }
} 