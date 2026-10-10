@extends('components.layout')
@section('title', 'Hints | Selected Works')

@section('jsonld')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "CollectionPage",
  "name": "Hints Selected Works",
  "url": "{{ url('/archive') }}"
}
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages/archive.css') }}">
<style>
    /* Architectural guide lines */
    .guide-lines {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        pointer-events: none;
        z-index: 0;
        background-image: 
            linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 100% 10vh;
    }
    
    .selected-works-header {
        position: relative;
        text-align: center;
        display: inline-block;
    }
    
    .gradient-strip {
        position: absolute;
        top: 20%; left: -25%; width: 150%; height: 50px;
        background: linear-gradient(90deg, var(--signal-cyan), var(--deep-electric));
        z-index: 1;
        opacity: 0.8;
    }
    
    .title-selected {
        font-family: 'Bomstad Display', sans-serif;
        font-size: clamp(3rem, 10vw, 8rem);
        color: var(--pure-white);
        position: relative;
        z-index: 2;
        line-height: 0.9;
        text-transform: uppercase;
    }
    
    .title-works {
        font-family: 'Bomstad Display', sans-serif;
        font-size: clamp(3rem, 10vw, 8rem);
        color: var(--pure-white);
        position: relative;
        z-index: 2;
        line-height: 0.9;
        text-transform: uppercase;
    /* Dynamic Mosaic Grid Layout */
    .portfolio-mosaic-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr); /* 6 columns base */
        grid-auto-rows: 20vh; /* Base height for rows */
        gap: 15px;
        grid-auto-flow: dense; /* Fill in the gaps chaotically */
        width: 100%;
        margin-bottom: 60px;
    }
    
    /* Highly Dramatic Shapes (No basic squares) */
    .shape-2x3 { grid-column: span 2; grid-row: span 3; } /* Very Tall */
    .shape-2x1 { grid-column: span 2; grid-row: span 1; } /* Wide horizontal */
    .shape-3x2 { grid-column: span 3; grid-row: span 2; } /* Large Landscape */
    .shape-4x2 { grid-column: span 4; grid-row: span 2; } /* Cinematic Panorama */
    .shape-4x3 { grid-column: span 4; grid-row: span 3; } /* Massive Feature */

    @media (max-width: 1200px) {
        .portfolio-mosaic-grid { grid-template-columns: repeat(4, 1fr); grid-auto-rows: 15vh; }
        .shape-3x2 { grid-column: span 4; }
        .shape-4x2, .shape-4x3 { grid-column: span 4; }
    }
    @media (max-width: 900px) {
        .portfolio-mosaic-grid { grid-template-columns: repeat(2, 1fr); grid-auto-rows: 15vh; }
        /* Downscale everything to fit a 2-column mobile grid */
        .shape-4x3, .shape-4x2, .shape-3x2, .shape-2x3 { grid-column: span 2; grid-row: span 2; }
        .shape-2x1 { grid-column: span 2; grid-row: span 1; }
    }

    .portfolio-mosaic-item {
        position: relative;
        overflow: hidden;
        border-radius: 4px;
        background: rgba(255,255,255,0.02);
        border: 1px solid rgba(255,255,255,0.05);
        cursor: pointer;
        display: flex; /* Helps with object fit */
    }
    .portfolio-mosaic-item img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* This makes the cropped/zoomed effect work flawlessly */
        display: block;
        filter: grayscale(100%) contrast(1.1);
        transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1), filter 0.6s ease;
        opacity: 0.8;
    }
    .portfolio-mosaic-item:hover img {
        filter: grayscale(0%) contrast(1);
        transform: scale(1.08);
        opacity: 1;
    }
    .portfolio-mosaic-item::after {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        border: 1px solid transparent;
        transition: border-color 0.4s ease;
        pointer-events: none;
    }
    .portfolio-mosaic-item:hover::after {
        border-color: var(--signal-cyan);
    }
</style>
@endsection

@section('content')
<div class="guide-lines"></div>

<header class="section fade-in" style="min-height: 50vh; display: flex; flex-direction: column; align-items: center; justify-content: flex-start; padding-top: 15vh; position: relative; z-index: 2; text-align: center; width: 100%; overflow: hidden;">
    <div class="selected-works-header" style="position: relative;">
        <div class="gradient-strip"></div>
        <div class="title-selected">SELECTED</div>
        <div class="title-works">WORKS</div>
    </div>
    
    <span style="display: block; margin-top: 15px; font-family: 'Avenir LT Std', sans-serif; font-size: 0.9rem; color: rgba(255,255,255,0.4); letter-spacing: 2px; text-transform: uppercase;">Client | Case Archive</span>
    
    <p class="sub-heading" style="margin-top: 40px; letter-spacing: 2px;">
        Signals we have engineered.
    </p>
</header>

<section class="section fade-in" style="padding-top: 0; position: relative; z-index: 2;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; display: flex; flex-direction: column; gap: 40px;">
        
        <div class="portfolio-mosaic-grid">
            @php
                // Dynamically read whatever images exist in the folder (now 8 images)
                $imageFiles = glob(public_path('images/portfolio/*.*'));
                $images = [];
                foreach($imageFiles as $file) {
                    $images[] = asset('images/portfolio/' . basename($file));
                }
                
                // Shuffle them for algorithmic chaos
                shuffle($images);
                
                // Define non-square, highly dramatic shapes (no boring 1x1 or 2x2 squares)
                // 3x2: Wide Landscape
                // 2x3: Tall Portrait
                // 4x2: Cinematic Panorama
                // 2x1: Standard Wide
                $shapes = ['shape-3x2', 'shape-2x3', 'shape-4x2', 'shape-2x1'];
            @endphp
            
            @foreach ($images as $index => $imageUrl)
                @php
                    // Force a massive cinematic block at the beginning
                    if ($index === 0) {
                        $shapeClass = 'shape-4x3';
                    } elseif ($index === 4) {
                        $shapeClass = 'shape-3x2';
                    } else {
                        // Randomly assign one of the dramatic rectangular shapes
                        $shapeClass = $shapes[array_rand($shapes)];
                    }
                @endphp
                <div class="portfolio-mosaic-item {{ $shapeClass }} fade-in">
                    <img src="{{ $imageUrl }}" alt="Hints Portfolio Item" loading="lazy">
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- CTA -->
<section class="section fade-in" style="justify-content: center; text-align: center; min-height: 40vh; position: relative; z-index: 2;">
    <div class="container">
        <h2 class="huge-title-small" style="font-size: 2.5rem; margin-bottom: 30px;">Ready to engineer your signal?</h2>
        <a href="{{ route('vault') }}" class="btn-luxury">Initiate Protocol</a>
    </div>
</section>
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
