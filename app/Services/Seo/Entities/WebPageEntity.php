<?php

declare(strict_types=1);

namespace App\Services\Seo\Entities;

class WebPageEntity extends BaseEntity
{
    private string $name;
    private string $description;

    public function __construct(string $name = '', string $description = '')
    {
        $this->name = $name ?: config('seo.defaults.title', 'Hints Brand Studio');
        $this->description = $description ?: config('seo.defaults.description', '');
    }

    public function getType(): string
    {
        return 'WebPage';
    }

    public function toArray(): array
    {
        return [
            '@type' => 'WebPage',
            '@id' => url()->current() . '#webpage',
            'url' => url()->current(),
            'name' => $this->name,
            'description' => $this->description,
            'inLanguage' => 'en-US',
            'isPartOf' => [
                '@id' => url('/') . '#website',
            ],
            'about' => [
                '@id' => url('/') . '#organization',
            ],
            'speakable' => [
                '@type' => 'SpeakableSpecification',
                'cssSelector' => ['h1', '.hero-description', '.page-intro'],
            ],
        ];
    }
}
