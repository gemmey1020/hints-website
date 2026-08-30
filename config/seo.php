<?php

// SEO/GEO Engine Configuration
// All brand constants centralized here — no hardcoding in PHP classes.

return [

    /*
    |--------------------------------------------------------------------------
    | Organization Identity
    |--------------------------------------------------------------------------
    */
    'organization' => [
        'name' => 'Hints Brand Studio',
        'alternateName' => 'هينتس ستوديو',
        'description' => 'We engineer digital infrastructure and visual authority for Tier-1 enterprises and scaling SMEs.',
        'logo' => 'transparent_logo_v01.png',
        'logo_width' => '1200',
        'logo_height' => '630',
        'priceRange' => '$$$$',
        'areaServed' => ['SA', 'AE', 'QA', 'KW', 'BH', 'OM', 'Global'],
        'availableLanguage' => ['en', 'ar'],
        'knowsAbout' => [
            'Brand Engineering',
            'Digital Transformation',
            'UI/UX Architecture',
            'Corporate Rebranding',
            'B2B Growth Strategy',
            'تصميم واجهات المستخدم',
            'بناء العلامات التجارية',
            'تجربة المستخدم',
            'التحول الرقمي',
            'هوية بصرية',
        ],
        'sameAs' => [
            'https://www.linkedin.com/company/hints-brand-studio',
            // Add more as they become available:
            // 'https://www.instagram.com/hintsbrandstudio',
            // 'https://www.behance.net/hintsbrandstudio',
            // 'https://clutch.co/profile/hints-brand-studio',
        ],
        'contactPoint' => [
            'telephone' => '+966-000-000000',
            'contactType' => 'customer service',
            'email' => 'hello@hintsbrandstudio.com',
            'availableLanguage' => ['English', 'Arabic']
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Founders (Person Entities)
    |--------------------------------------------------------------------------
    */
    'founders' => [
        [
            'name' => 'Jemy',
            'jobTitle' => 'Founder & CEO',
            'sameAs' => [
                // 'https://www.linkedin.com/in/jemy',
            ],
        ],
        [
            'name' => 'Obay',
            'jobTitle' => 'Co-Founder & Creative Director',
            'sameAs' => [
                // 'https://www.linkedin.com/in/obay',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Meta Tags
    |--------------------------------------------------------------------------
    */
    'defaults' => [
        'title' => 'Hints | The Architecture of Authority',
        'description' => 'A global brand engineering studio. We build digital infrastructure for Tier-1 enterprises and high-growth SMEs.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Per-Route SEO Overrides
    |--------------------------------------------------------------------------
    | Maps Laravel route names to page-specific titles, descriptions,
    | and additional entity types to inject into the JSON-LD graph.
    |
    | Supported entity keys: 'about_page', 'offer_catalog', 'service_list', 'faq'
    */
    'routes' => [
        'home' => [
            'title' => 'Hints | The Architecture of Authority',
            'description' => 'A global brand engineering studio. We engineer systems that convert raw brand potential into undeniable authority.',
            'breadcrumb_name' => 'Home',
            'entities' => [],
        ],
        'doctrine' => [
            'title' => 'Hints | About Us & Our Values',
            'description' => 'Discover the philosophy, values, and engineering doctrine behind Hints Brand Studio.',
            'breadcrumb_name' => 'Doctrine',
            'entities' => ['about_page'],
        ],
        'disciplines' => [
            'title' => 'Hints | Creative Sets (Services & Pricing)',
            'description' => 'Explore our creative disciplines: Brand Engineering, UI/UX Architecture, Digital Transformation, and B2B Growth.',
            'breadcrumb_name' => 'Disciplines',
            'entities' => ['service_list'],
        ],
        'engagements' => [
            'title' => 'Hints | Special Bundles (Packages)',
            'description' => 'Premium engagement packages designed for enterprises and scaling SMEs seeking high-impact brand transformation.',
            'breadcrumb_name' => 'Engagements',
            'entities' => ['offer_catalog'],
        ],
        'archive' => [
            'title' => 'Hints | Archive',
            'description' => 'Selected work and case studies from Hints Brand Studio.',
            'breadcrumb_name' => 'Archive',
            'entities' => [],
        ],
        'vault' => [
            'title' => 'Hints | The Vault',
            'description' => 'Exclusive resources and insights from Hints Brand Studio.',
            'breadcrumb_name' => 'Vault',
            'entities' => [],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | FAQ Data (For FAQPage Schema)
    |--------------------------------------------------------------------------
    */
    'faq' => [
        [
            'question' => 'What does Hints Brand Studio do?',
            'answer' => 'We are a global brand engineering studio that builds digital infrastructure, visual identity systems, and UI/UX architecture for Tier-1 enterprises and high-growth SMEs.',
        ],
        [
            'question' => 'Do you work with companies in Saudi Arabia and the Gulf?',
            'answer' => 'Yes. We serve clients across the entire GCC region including Saudi Arabia, UAE, Qatar, Kuwait, Bahrain, and Oman, with a focus on high-ticket B2B engagements.',
        ],
        [
            'question' => 'What is your pricing model?',
            'answer' => 'We operate on a premium pricing model ($$$$) reflecting the enterprise-grade quality of our deliverables. Each engagement is custom-scoped after a discovery call.',
        ],
        [
            'question' => 'What makes Hints different from other agencies?',
            'answer' => 'We do not sell templates or generic marketing. We engineer complete brand systems — from visual identity to digital infrastructure — built for authority and scale.',
        ],
        [
            'question' => 'How do I start working with Hints?',
            'answer' => 'Begin with a discovery call. We assess your brand landscape, define scope, and deliver a custom proposal. No cookie-cutter packages.',
        ],
    ],

];
