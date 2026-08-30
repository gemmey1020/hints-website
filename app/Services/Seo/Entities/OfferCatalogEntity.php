<?php

declare(strict_types=1);

namespace App\Services\Seo\Entities;

class OfferCatalogEntity extends BaseEntity
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
            '@id' => url('/engagements') . '#bundles',
            'name' => $config['name'] . ' Special Bundles',
            'url' => url('/engagements'),
            'provider' => [
                '@id' => url('/') . '#organization',
            ],
            'description' => 'Premium engagement packages designed for enterprises and scaling SMEs seeking high-impact brand transformation.',
            'itemListElement' => [
                [
                    '@type' => 'Offer',
                    'name' => 'Startup Essentials',
                    'price' => '950',
                    'priceCurrency' => 'USD',
                ],
                [
                    '@type' => 'Offer',
                    'name' => 'SME Growth',
                    'price' => '1600',
                    'priceCurrency' => 'USD',
                ],
                [
                    '@type' => 'Offer',
                    'name' => 'Digital Presence',
                    'price' => '2000',
                    'priceCurrency' => 'USD',
                ],
                [
                    '@type' => 'Offer',
                    'name' => 'Comprehensive Branding',
                    'price' => '2750',
                    'priceCurrency' => 'USD',
                ],
            ],
        ];
    }
}
