<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\Seo\AiSeoEngine;
use App\Services\Seo\Entities\AboutPageEntity;
use App\Services\Seo\Entities\FAQPageEntity;
use App\Services\Seo\Entities\OfferCatalogEntity;
use App\Services\Seo\Entities\ServiceListEntity;

class AiSeoServiceProvider extends ServiceProvider
{
    /**
     * Entity class map: config key => Entity class
     */
    private const ENTITY_MAP = [
        'about_page' => AboutPageEntity::class,
        'offer_catalog' => OfferCatalogEntity::class,
        'service_list' => ServiceListEntity::class,
        'faq' => FAQPageEntity::class,
    ];

    /**
     * Register the AiSeoEngine as a Singleton.
     */
    public function register(): void
    {
        $this->app->singleton(AiSeoEngine::class, function () {
            return new AiSeoEngine();
        });
    }

    /**
     * Bootstrap: wire the Engine to the View layer via a Composer.
     * Reads the current route name and injects per-page SEO overrides
     * from config/seo.php.
     */
    public function boot(): void
    {
        View::composer('components.layout', function ($view) {
            $engine = $this->app->make(AiSeoEngine::class);
            $routeName = request()->route()?->getName();

            // 1. Try route-specific config
            $routeConfig = config("seo.routes.{$routeName}");

            if ($routeConfig) {
                // Override title and description from config
                if (!empty($routeConfig['title'])) {
                    $engine->setTitle($routeConfig['title']);
                }
                if (!empty($routeConfig['description'])) {
                    $engine->setDescription($routeConfig['description']);
                }
                if (!empty($routeConfig['breadcrumb_name'])) {
                    $engine->setBreadcrumbName($routeConfig['breadcrumb_name']);
                }

                // Inject route-specific entities
                foreach ($routeConfig['entities'] ?? [] as $entityKey) {
                    if (isset(self::ENTITY_MAP[$entityKey])) {
                        $class = self::ENTITY_MAP[$entityKey];
                        $engine->addEntity($entityKey, new $class());
                    }
                }
            }

            // 2. Fallback: if a child view defined @section('title'), use it
            if (\View::hasSection('title')) {
                $sectionTitle = trim(\View::getSection('title'));
                if ($sectionTitle) {
                    $engine->setTitle($sectionTitle);
                }
            }
        });
    }
}
