<?php

namespace App\DataTransferObjects;

class AddonConfig
{
    public function __construct(
        public readonly string $apiKey,
        public readonly string $region,
        public readonly string $language,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            apiKey: $data['apiKey'],
            region: $data['region'],
            language: $data['language'],
        );
    }

    public function toArray(): array
    {
        return [
            'apiKey' => $this->apiKey,
            'region' => $this->region,
            'language' => $this->language,
        ];
    }
}
