<?php

declare(strict_types=1);

namespace App\Services\Seo\Entities;

class ServiceListEntity extends BaseEntity
{
    public function getType(): string
    {
        return 'OfferCatalog';
    }

    public function toArray(): array
    {
        $config = config('seo.organization');

        return [
            '@type' => 'OfferCatalog',
            '@id' => url('/disciplines') . '#services',
            'name' => $config['name'] . ' Creative Sets',
            'url' => url('/disciplines'),
            'provider' => [
                '@id' => url('/') . '#organization',
            ],
            'itemListElement' => [
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Brand Strategy & Identity',
                    ],
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Content Creation & Strategy',
                    ],
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Social Media & Digital Marketing',
                    ],
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Graphic & Web Design',
                    ],
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'Promotional & Print Materials',
                    ],
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => 'SEO & IT Solutions',
                    ],
                ],
            ],
        ];
    }
}
