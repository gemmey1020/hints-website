<?php

declare(strict_types=1);

namespace App\Services\Seo\Entities;

class OrganizationEntity extends BaseEntity
{
    public function getType(): string
    {
        return 'Organization';
    }

    public function toArray(): array
    {
        $config = config('seo.organization');
        $founders = config('seo.founders', []);

        $entity = [
            '@type' => ['Organization', 'ProfessionalService'],
            '@id' => url('/') . '#organization',
            'name' => $config['name'],
            'alternateName' => $config['alternateName'],
            'url' => url('/'),
            'logo' => [
                '@type' => 'ImageObject',
                '@id' => url('/') . '#logo',
                'url' => asset($config['logo']),
            ],
            'image' => asset($config['logo']),
            'description' => $config['description'],
            'priceRange' => $config['priceRange'],
            'areaServed' => $this->buildAreaServed($config),
            'availableLanguage' => $config['availableLanguage'],
            'knowsAbout' => $config['knowsAbout'],
            'sameAs' => $config['sameAs'],
        ];

        // Inject founder references if defined
        if (!empty($founders)) {
            $entity['founder'] = array_map(fn(int $i) => [
                '@id' => url('/') . '#person-' . $i,
            ], array_keys($founders));
        }

        return $entity;
    }

    /**
     * Build areaServed with GeoCoordinates for hostile local SEO targeting.
     */
    private function buildAreaServed(array $config): array
    {
        $areas = [];

        // Add GeoCircle entries with exact coordinates
        foreach ($config['geo'] ?? [] as $geo) {
            $areas[] = [
                '@type' => 'GeoCircle',
                'geoMidpoint' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => $geo['lat'],
                    'longitude' => $geo['lng'],
                ],
                'geoRadius' => '200000', // 200km radius
            ];
        }

        // Also add country codes for broader signals
        foreach ($config['areaServed'] as $code) {
            if ($code !== 'Global') {
                $areas[] = [
                    '@type' => 'Country',
                    'name' => $code,
                ];
            }
        }

        return $areas;
    }
}
