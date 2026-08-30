<?php

declare(strict_types=1);

namespace App\Services\Seo\Entities;

class WebSiteEntity extends BaseEntity
{
    public function getType(): string
    {
        return 'WebSite';
    }

    public function toArray(): array
    {
        $config = config('seo.organization');

        return [
            '@type' => 'WebSite',
            '@id' => url('/') . '#website',
            'url' => url('/'),
            'name' => $config['name'],
            'description' => 'The Architecture of Authority. A global brand engineering studio.',
            'publisher' => [
                '@id' => url('/') . '#organization'
            ],
            'inLanguage' => 'en-US',
        ];
    }
}
