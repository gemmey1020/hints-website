<?php

declare(strict_types=1);

namespace App\Services\Seo\Entities;

class FAQPageEntity extends BaseEntity
{
    /** @var array<array{question: string, answer: string}> */
    private array $items;

    /**
     * @param array<array{question: string, answer: string}> $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items ?: config('seo.faq', []);
    }

    public function getType(): string
    {
        return 'FAQPage';
    }

    public function toArray(): array
    {
        return [
            '@type' => 'FAQPage',
            '@id' => url()->current() . '#faq',
            'mainEntity' => array_map(fn(array $item) => [
                '@type' => 'Question',
                'name' => $item['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $item['answer'],
                ],
            ], $this->items),
        ];
    }
}
