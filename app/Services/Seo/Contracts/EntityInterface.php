<?php

declare(strict_types=1);

namespace App\Services\Seo\Contracts;

/**
 * Contract for all Semantic Entities in the SEO Graph.
 * Enables mocking, decoration, and alternative implementations.
 */
interface EntityInterface
{
    /**
     * Returns the Schema.org @type identifier for this entity.
     */
    public function getType(): string;

    /**
     * Convert the Entity into an associative array for JSON-LD representation.
     */
    public function toArray(): array;
}
