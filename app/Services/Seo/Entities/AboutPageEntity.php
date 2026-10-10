<?php

declare(strict_types=1);

namespace App\Services\Seo\Entities;

class AboutPageEntity extends BaseEntity
{
    public function getType(): string
    {
        return 'AboutPage';
    }

    public function toArray(): array
    {
        return [
            '@type' => 'AboutPage',
            '@id' => url('/doctrine') . '#about',
            'name' => 'About Us & Our Values - ' . config('seo.organization.name'),
            'url' => url('/doctrine'),
            'description' => 'Discover the philosophy, values, and engineering doctrine behind Hints Brand Studio.',
            'mainEntity' => [
                '@id' => url('/') . '#organization',
            ],
        ];
    }
}
