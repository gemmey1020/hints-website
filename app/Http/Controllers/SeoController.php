<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SeoController extends Controller
{
    /**
     * Generate dynamic sitemap.xml from config/seo.php routes.
     */
    public function sitemap(): Response
    {
        $routes = config('seo.routes', []);
        
        // Remove routes that might not be indexable, or just include all.
        // We will include all keys in the config that correspond to valid route names.
        $urls = [];
        foreach (array_keys($routes) as $routeName) {
            try {
                $urls[] = route($routeName);
            } catch (\Exception $e) {
                // Route not defined, skip
                continue;
            }
        }

        return response()->view('seo.sitemap', ['urls' => $urls])
            ->header('Content-Type', 'text/xml');
    }
}
