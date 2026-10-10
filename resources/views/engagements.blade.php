@extends('components.layout')
@section('title', 'Hints | Special Bundles (Packages)')

@section('styles')
<style>
    .engagements-hero {
        padding: 20vh 5vw 5vh;
        max-width: 1400px;
        margin: 0 auto;
        text-align: center;
        position: relative;
    }

    .huge-heading {
        font-family: 'Bomstad Display', sans-serif;
        font-size: clamp(3rem, 8vw, 4.5rem);
        line-height: 1.1;
        margin-bottom: 20px;
        color: var(--pure-white);
        letter-spacing: -1px;
    }

    .sub-heading {
        font-family: 'Avenir LT Std', sans-serif;
        font-size: 1.2rem;
        color: rgba(255,255,255,0.6);
        max-width: 800px;
        margin: 0 auto 50px;
        line-height: 1.6;
    }

    .engagements-list {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 5vw 10vw;
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        gap: 40px;
    }

    .engagement-card {
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        padding: 50px;
        position: relative;
        overflow: visible;
        transition: all 0.4s ease;
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 50px;
        align-items: center;
    }

    /* Ambient background glow for the section */
    .engagements-bg-glow {
        position: absolute;
        top: 30%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80vw;
        height: 80vh;
        background: radial-gradient(circle, rgba(0, 240, 255, 0.1) 0%, rgba(6, 95, 70, 0.05) 50%, transparent 70%);
        z-index: 0;
        pointer-events: none;
    }

    /* HUD Corner Handles */
    .engagement-card::before, .engagement-card::after,
    .engagement-card-inner::before, .engagement-card-inner::after {
        content: '';
        position: absolute;
        width: 15px;
        height: 15px;
        border: 4px solid var(--pure-white);
        pointer-events: none;
        transition: border-color 0.4s ease;
        z-index: 5;
    }
    
    .engagement-card::before {
        top: -2px; left: -2px;
        border-right: none; border-bottom: none;
    }
    .engagement-card::after {
        bottom: -2px; right: -2px;
        border-left: none; border-top: none;
    }
    
    .engagement-card .hud-corner-tr {
        position: absolute; top: -2px; right: -2px; width: 15px; height: 15px;
        border: 4px solid var(--pure-white); border-left: none; border-bottom: none;
        transition: border-color 0.4s ease;
        z-index: 5;
    }
    .engagement-card .hud-corner-bl {
        position: absolute; bottom: -2px; left: -2px; width: 15px; height: 15px;
        border: 4px solid var(--pure-white); border-right: none; border-top: none;
        transition: border-color 0.4s ease;
        z-index: 5;
    }

    @media (max-width: 900px) {
        .engagement-card {
            grid-template-columns: 1fr;
            padding: 30px;
            gap: 30px;
        }
    }

    .engagement-card:hover {
        box-shadow: 0 0 30px rgba(0, 240, 255, 0.2), inset 0 0 20px rgba(0, 240, 255, 0.1);
        border-color: rgba(0, 240, 255, 0.5);
    }
    .engagement-card:hover::before, .engagement-card:hover::after,
    .engagement-card:hover .hud-corner-tr, .engagement-card:hover .hud-corner-bl {
        border-color: var(--signal-cyan);
    }

    .engagement-info {
        display: flex;
        flex-direction: column;
    }

    .engagement-title {
        font-family: 'Hakira', sans-serif;
        font-size: 2.5rem;
        color: var(--pure-white);
        margin-bottom: 15px;
    }

    .engagement-price {
        font-family: 'Bomstad Display', sans-serif;
        font-size: 3.5rem;
        color: var(--signal-cyan);
        margin-bottom: 25px;
    }

    .engagement-features {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .engagement-feature-item {
        font-family: 'Avenir LT Std', sans-serif;
        font-size: 1.1rem;
        color: rgba(255,255,255,0.8);
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }
    
    .engagement-feature-item::before {
        content: '❖';
        color: var(--signal-cyan);
        font-size: 1.2rem;
        margin-top: -2px;
    }

    .engagement-cta {
        margin-top: 30px;
        display: inline-block;
    }

</style>
@endsection

@section('content')

<div class="engagements-bg-glow"></div>

<header class="engagements-hero fade-in">
    <h1 class="huge-heading text-gradient">SPECIAL BUNDLES</h1>
    <p class="sub-heading" style="letter-spacing: 2px;">
        Scalable infrastructure for entities ready to assert market dominance.
    </p>
</header>

<div class="engagements-list fade-in delay-1">
    
    <!-- Startup Essentials -->
    <div class="engagement-card">
        <div class="hud-corner-tr"></div>
        <div class="hud-corner-bl"></div>
        <div class="engagement-info">
            <h2 class="engagement-title">Startup Essentials</h2>
            <div class="engagement-price">$950</div>
            <div class="engagement-cta">
                <a href="mailto:hints.studioz@gmail.com?subject=Startup%20Essentials" class="btn-luxury">INITIATE PROTOCOL</a>
            </div>
        </div>
        <div class="engagement-details">
            <ul class="engagement-features">
                <li class="engagement-feature-item">Logo Design</li>
                <li class="engagement-feature-item">Brand Strategy</li>
                <li class="engagement-feature-item">Basic Social Media Designs (5 posts)</li>
                <li class="engagement-feature-item">Company Profile Design</li>
            </ul>
        </div>
    </div>

    <!-- SME Growth -->
    <div class="engagement-card">
        <div class="hud-corner-tr"></div>
        <div class="hud-corner-bl"></div>
        <div class="engagement-info">
            <h2 class="engagement-title">SME Growth</h2>
            <div class="engagement-price">$1,600</div>
            <div class="engagement-cta">
                <a href="mailto:hints.studioz@gmail.com?subject=SME%20Growth" class="btn-luxury">INITIATE PROTOCOL</a>
            </div>
        </div>
        <div class="engagement-details">
            <ul class="engagement-features">
                <li class="engagement-feature-item">Brand Identity Creation</li>
                <li class="engagement-feature-item">Content Strategy</li>
                <li class="engagement-feature-item">Website Content (up to 5 pages)</li>
                <li class="engagement-feature-item">Social Media Videos/GIFs (5 pieces)</li>
                <li class="engagement-feature-item">Packaging Design</li>
            </ul>
        </div>
    </div>

    <!-- Digital Presence -->
    <div class="engagement-card">
        <div class="hud-corner-tr"></div>
        <div class="hud-corner-bl"></div>
        <div class="engagement-info">
            <h2 class="engagement-title">Digital Presence</h2>
            <div class="engagement-price">$2,000</div>
            <div class="engagement-cta">
                <a href="mailto:hints.studioz@gmail.com?subject=Digital%20Presence" class="btn-luxury">INITIATE PROTOCOL</a>
            </div>
        </div>
        <div class="engagement-details">
            <ul class="engagement-features">
                <li class="engagement-feature-item">Web Design</li>
                <li class="engagement-feature-item">UI/UX Designs (App)</li>
                <li class="engagement-feature-item">SEO Services</li>
                <li class="engagement-feature-item">Social Media Designs (10 posts)</li>
                <li class="engagement-feature-item">Website Landing Page</li>
            </ul>
        </div>
    </div>

    <!-- Comprehensive Branding -->
    <div class="engagement-card">
        <div class="hud-corner-tr"></div>
        <div class="hud-corner-bl"></div>
        <div class="engagement-info">
            <h2 class="engagement-title">Comprehensive Branding</h2>
            <div class="engagement-price">$2,750</div>
            <div class="engagement-cta">
                <a href="mailto:hints.studioz@gmail.com?subject=Comprehensive%20Branding" class="btn-luxury">INITIATE PROTOCOL</a>
            </div>
        </div>
        <div class="engagement-details">
            <ul class="engagement-features">
                <li class="engagement-feature-item">Brand Strategy</li>
                <li class="engagement-feature-item">Brand Identity Creation & Guidelines</li>
                <li class="engagement-feature-item">Logo Design & Translation</li>
                <li class="engagement-feature-item">Company Profile Design & Content</li>
                <li class="engagement-feature-item">Stationeries & Packaging Design</li>
                <li class="engagement-feature-item">Social Media Designs (15 posts)</li>
            </ul>
        </div>
    </div>

</div>

@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: "0px 0px -50px 0px" });
        
        document.querySelectorAll('.fade-in').forEach((el) => {
            observer.observe(el);
        });
    });
</script>
@endsection
