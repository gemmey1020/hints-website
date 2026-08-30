<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeoTruthTest extends TestCase
{
    public function test_home_graph_omits_unsupported_faq_search_and_local_presence_claims(): void
    {
        $graph = $this->graphFor('/');
        $types = array_map(static fn (array $entity) => $entity['@type'] ?? null, $graph);
        $encoded = json_encode($graph, JSON_THROW_ON_ERROR);

        $this->assertNotContains('FAQPage', $types);
        $this->assertStringNotContainsString('SearchAction', $encoded);
        $this->assertStringNotContainsString('GeoCircle', $encoded);
    }

    public function test_vault_emits_its_contact_page_schema(): void
    {
        $scripts = $this->jsonLdScriptsFor('/vault');

        $this->assertContains('ContactPage', array_map(
            static fn (array $payload) => $payload['@type'] ?? null,
            $scripts,
        ));
    }

    public function test_english_page_does_not_advertise_an_unimplemented_arabic_social_variant(): void
    {
        $response = $this->get('/')->assertOk();

        $response->assertDontSee('property="og:locale:alternate" content="ar_SA"', false);
    }

    public function test_disciplines_schema_matches_the_six_visible_service_categories(): void
    {
        $services = $this->entityFor('/disciplines', '#services');
        $names = array_map(
            static fn (array $offer) => $offer['itemOffered']['name'] ?? null,
            $services['itemListElement'] ?? [],
        );

        $this->assertSame([
            'Brand Strategy & Identity',
            'Content Creation & Strategy',
            'Social Media & Digital Marketing',
            'Graphic & Web Design',
            'Promotional & Print Materials',
            'SEO & IT Solutions',
        ], $names);
    }

    public function test_engagement_schema_matches_the_four_visible_usd_bundles(): void
    {
        $bundles = $this->entityFor('/engagements', '#bundles');
        $names = array_map(
            static fn (array $offer) => $offer['name'] ?? null,
            $bundles['itemListElement'] ?? [],
        );
        $prices = array_map(
            static fn (array $offer) => $offer['price'] ?? null,
            $bundles['itemListElement'] ?? [],
        );
        $currencies = array_map(
            static fn (array $offer) => $offer['priceCurrency'] ?? null,
            $bundles['itemListElement'] ?? [],
        );

        $this->assertSame([
            'Startup Essentials',
            'SME Growth',
            'Digital Presence',
            'Comprehensive Branding',
        ], $names);
        $this->assertSame(['950', '1600', '2000', '2750'], $prices);
        $this->assertSame(['USD', 'USD', 'USD', 'USD'], $currencies);
    }

    /** @return array<int, array<string, mixed>> */
    private function graphFor(string $uri): array
    {
        foreach ($this->jsonLdScriptsFor($uri) as $payload) {
            if (isset($payload['@graph'])) {
                return $payload['@graph'];
            }
        }

        $this->fail("No JSON-LD graph was rendered for {$uri}.");
    }

    /** @return array<string, mixed> */
    private function entityFor(string $uri, string $fragment): array
    {
        foreach ($this->graphFor($uri) as $entity) {
            if (str_ends_with($entity['@id'] ?? '', $fragment)) {
                return $entity;
            }
        }

        $this->fail("No JSON-LD entity ending with {$fragment} was rendered for {$uri}.");
    }

    /** @return array<int, array<string, mixed>> */
    private function jsonLdScriptsFor(string $uri): array
    {
        $response = $this->get($uri)->assertOk();
        preg_match_all(
            '#<script type="application/ld\+json">\s*(.*?)\s*</script>#s',
            $response->getContent(),
            $matches,
        );

        return array_map(
            static fn (string $json): array => json_decode($json, true, 512, JSON_THROW_ON_ERROR),
            $matches[1],
        );
    }
}
