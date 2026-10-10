<?php

declare(strict_types=1);

namespace App\Services\Seo\Entities;

use App\Services\Seo\Contracts\EntityInterface;

/**
 * Base abstract class for all Semantic Entities in the SEO Graph.
 */
abstract class BaseEntity implements EntityInterface
{
    abstract public function getType(): string;

    abstract public function toArray(): array;
}
