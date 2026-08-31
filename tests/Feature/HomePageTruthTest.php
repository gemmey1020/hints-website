<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTruthTest extends TestCase
{
    public function test_home_uses_a_local_editorial_asset_and_truthful_positioning(): void
    {
        $response = $this->get('/')->assertOk();

        $response->assertSee('hints_editorial_brand_artifacts_v01.png', false);
        $response->assertSee('GCC SPECIALISTS', false);
        $response->assertSee('GLOBAL DELIVERY', false);
        $response->assertSee('STRATEGY', false);
        $response->assertSee('SEO', false);
        $response->assertDontSee('images.unsplash.com', false);
        $response->assertDontSee('onerror=', false);
        $response->assertDontSee('15+', false);
        $response->assertDontSee('$5M+', false);
        $response->assertDontSee('JUUUD MANAGEMENT', false);
        $response->assertDontSee('[Pyramids_Icon.svg]', false);

        $this->assertFileExists(public_path('hints_editorial_brand_artifacts_v01.png'));
    }

    public function test_home_conversion_calls_to_action_route_to_the_vault(): void
    {
        $response = $this->get('/')->assertOk();

        $response->assertSee(route('vault'), false);
        $response->assertSee('Start an Inquiry', false);
        $this->assertSame(2, substr_count($response->getContent(), 'Start an Inquiry'));
    }
}
