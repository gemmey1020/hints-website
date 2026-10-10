<?php

declare(strict_types=1);

namespace App\Services\Seo\Entities;

class PersonEntity extends BaseEntity
{
    private int $index;
    private string $name;
    private string $jobTitle;
    private array $sameAs;

    public function __construct(int $index, string $name, string $jobTitle, array $sameAs = [])
    {
        $this->index = $index;
        $this->name = $name;
        $this->jobTitle = $jobTitle;
        $this->sameAs = $sameAs;
    }

    public function getType(): string
    {
        return 'Person';
    }

    public function toArray(): array
    {
        $entity = [
            '@type' => 'Person',
            '@id' => url('/') . '#person-' . $this->index,
            'name' => $this->name,
            'jobTitle' => $this->jobTitle,
            'worksFor' => [
                '@id' => url('/') . '#organization',
            ],
        ];

        if (!empty($this->sameAs)) {
            $entity['sameAs'] = $this->sameAs;
        }

        return $entity;
    }

    /**
     * Factory: build PersonEntity instances from config.
     * @return PersonEntity[]
     */
    public static function fromConfig(): array
    {
        $founders = config('seo.founders', []);
        $entities = [];

        foreach ($founders as $index => $founder) {
            $entities[] = new self(
                $index,
                $founder['name'],
                $founder['jobTitle'],
                $founder['sameAs'] ?? [],
            );
        }

        return $entities;
    }
}
