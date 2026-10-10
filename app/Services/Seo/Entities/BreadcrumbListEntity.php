<?php

declare(strict_types=1);

namespace App\Services\Seo\Entities;

class BreadcrumbListEntity extends BaseEntity
{
    private string $currentTitle;

    public function __construct(string $currentTitle = '')
    {
        $this->currentTitle = $currentTitle ?: config('seo.defaults.title', 'Hints');
    }

    public function getType(): string
    {
        return 'BreadcrumbList';
    }

    public function toArray(): array
    {
        $items = [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => config('seo.organization.name', 'Hints Brand Studio'),
                'item' => url('/'),
            ],
        ];

        // Add current page as second breadcrumb if not homepage
        $current = url()->current();
        if ($current !== url('/') && $current !== url('/') . '/') {
            $items[] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => $this->currentTitle,
                'item' => $current,
            ];
        }

        return [
            '@type' => 'BreadcrumbList',
            '@id' => url()->current() . '#breadcrumb',
            'itemListElement' => $items,
        ];
    }
}
