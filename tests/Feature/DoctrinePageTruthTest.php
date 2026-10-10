<?php

namespace Tests\Feature;

use Tests\TestCase;

class DoctrinePageTruthTest extends TestCase
{
    public function test_doctrine_uses_local_media_and_truthful_global_positioning(): void
    {
        $response = $this->get('/doctrine')->assertOk();

        $response->assertSee('hints_editorial_brand_artifacts_v01.png', false);
        $response->assertSee('GCC SPECIALISTS', false);
        $response->assertSee('GLOBAL DELIVERY', false);
        $response->assertDontSee('images.unsplash.com', false);
        $response->assertDontSee('onerror=', false);
        $response->assertDontSee('multi-million dollar returns', false);
    }

    public function test_doctrine_primary_call_to_action_routes_to_the_vault(): void
    {
        $response = $this->get('/doctrine')->assertOk();

        $response->assertSee('Start an Inquiry', false);
        $response->assertSee(route('vault'), false);
    }
}
