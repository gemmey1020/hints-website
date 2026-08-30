<?php

declare(strict_types=1);

namespace App\Services\Seo;

use App\Services\Seo\Contracts\EntityInterface;
use App\Services\Seo\Entities\BreadcrumbListEntity;
use App\Services\Seo\Entities\OrganizationEntity;
use App\Services\Seo\Entities\PersonEntity;
use App\Services\Seo\Entities\WebPageEntity;
use App\Services\Seo\Entities\WebSiteEntity;

class AiSeoEngine
{
    private string $title;
    private string $description;
    private string $breadcrumbName = '';

    /** @var array<string, EntityInterface> Keyed registry for entities */
    private array $entities = [];

    public function __construct()
    {
        $this->title = config('seo.defaults.title', 'Hints | The Architecture of Authority');
        $this->description = config('seo.defaults.description', '');
    }

    /**
     * Initialize the default global graph.
     * Called at render-time to ensure URL helpers have HTTP context.
     */
    private function ensureDefaultGraph(): void
    {
        if (!empty($this->entities)) {
            return;
        }

        $this->addEntity('website', new WebSiteEntity());
        $this->addEntity('organization', new OrganizationEntity());
        $this->addEntity('webpage', new WebPageEntity($this->title, $this->description));
        $this->addEntity('breadcrumb', new BreadcrumbListEntity($this->breadcrumbName ?: $this->title));

        // Inject founder Person entities from config
        foreach (PersonEntity::fromConfig() as $index => $personEntity) {
            $this->addEntity('person-' . $index, $personEntity);
        }
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setBreadcrumbName(string $breadcrumbName): self
    {
        $this->breadcrumbName = $breadcrumbName;
        return $this;
    }

    /**
     * Add or replace an entity in the keyed registry.
     */
    public function addEntity(string $key, EntityInterface $entity): self
    {
        $this->entities[$key] = $entity;
        return $this;
    }

    /**
     * Remove an entity by key.
     */
    public function removeEntity(string $key): self
    {
        unset($this->entities[$key]);
        return $this;
    }

    /**
     * Render all meta tags as an HTML string.
     * All values are escaped to prevent XSS.
     */
    public function renderMetaTags(): string
    {
        $this->ensureDefaultGraph();

        $title = e($this->title);
        $desc = e($this->description);
        $image = e(asset(config('seo.organization.logo', 'transparent_logo_v01.png')));
        $imgWidth = e((string) config('seo.organization.logo_width', '1200'));
        $imgHeight = e((string) config('seo.organization.logo_height', '630'));
        $url = e(url()->current());
        $siteName = e(config('seo.organization.name', 'Hints Brand Studio'));

        return <<<HTML
<title>{$title}</title>
<meta name="description" content="{$desc}">

<!-- Semantic SEO & Advanced Crawler Directives -->
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<link rel="canonical" href="{$url}">

<!-- Open Graph / Social Sharing -->
<meta property="og:title" content="{$title}">
<meta property="og:description" content="{$desc}">
<meta property="og:image" content="{$image}">
<meta property="og:image:width" content="{$imgWidth}">
<meta property="og:image:height" content="{$imgHeight}">
<meta property="og:image:alt" content="{$siteName} Logo">
<meta property="og:url" content="{$url}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{$siteName}">

<!-- Social locale: the current public route is English-only. -->
<meta property="og:locale" content="en_US">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{$title}">
<meta name="twitter:description" content="{$desc}">
<meta name="twitter:image" content="{$image}">
<meta name="twitter:image:alt" content="{$siteName} Logo">

<!-- Global Hreflang -->
<link rel="alternate" hreflang="x-default" href="{$url}" />

<!-- Premium UI Directives -->
<meta name="theme-color" content="#000000">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
HTML;
    }

    /**
     * Render the JSON-LD @graph as an HTML script tag.
     */
    public function renderJsonLd(): string
    {
        $this->ensureDefaultGraph();

        $graph = array_values(array_map(
            fn(EntityInterface $entity) => $entity->toArray(),
            $this->entities
        ));

        $payload = [
            '@context' => 'https://schema.org',
            '@graph' => $graph,
        ];

        $json = json_encode(
            $payload,
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );

        return <<<HTML
<!-- Omega SEO/GEO Engine V4 (Backend) -->
<script type="application/ld+json">
{$json}
</script>
HTML;
    }
}
