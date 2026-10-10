@extends('components.layout')
    @section('title', 'Hints | About Us & Our Values')
    
    @section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/doctrine.css') }}">
    <style>
        /* PDF Spec Implementations */
        .hud-bracket-container {
            position: relative;
            padding: 40px;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            max-width: 800px;
            margin: 0 auto;
            backdrop-filter: blur(10px);
        }
        .hud-bracket-container::before, .hud-bracket-container::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 1.5px solid var(--signal-cyan);
            pointer-events: none;
        }
        .hud-bracket-container::before {
            top: -1.5px; left: -1.5px;
            border-right: none; border-bottom: none;
        }
        .hud-bracket-container::after {
            bottom: -1.5px; right: -1.5px;
            border-left: none; border-top: none;
        }
        
        .hud-bracket-container .hud-bracket-tr {
            position: absolute; top: -1.5px; right: -1.5px; width: 20px; height: 20px;
            border: 1.5px solid var(--signal-cyan); border-left: none; border-bottom: none;
        }
        .hud-bracket-container .hud-bracket-bl {
            position: absolute; bottom: -1.5px; left: -1.5px; width: 20px; height: 20px;
            border: 1.5px solid var(--signal-cyan); border-right: none; border-top: none;
        }

        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
            position: absolute;
            top: 50%; left: 0; width: 100%;
            transform: translateY(-50%) rotate(-5deg);
            z-index: 0;
            opacity: 0.25;
        }
        .marquee-content {
            display: inline-block;
            font-family: 'Bomstad Display', sans-serif;
            font-size: 15vw;
            color: var(--grad-mint);
            animation: marquee 20s linear infinite;
        }
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .diagonal-banner {
            background: linear-gradient(90deg, transparent, rgba(41, 111, 247, 0.8), transparent);
            transform: rotate(-15deg);
            padding: 20px 0;
            margin: 40px 0;
            position: relative;
            z-index: 1;
        }

        /* Editorial Layout Additions */
        .editorial-about {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 60px;
            margin-top: 60px;
            text-align: left;
            align-items: center;
        }
        .about-image-wrapper {
            position: relative;
        }
        .about-image-wrapper img {
            width: 100%;
            border-radius: 4px;
            filter: grayscale(100%);
            transition: filter 0.5s ease;
        }
        .about-image-wrapper:hover img {
            filter: grayscale(0%);
        }
        .about-image-wrapper::after {
            content: '';
            position: absolute;
            top: 20px; left: 20px;
            width: 100%; height: 100%;
            border: 1px solid var(--signal-cyan);
            z-index: -1;
            transition: transform 0.5s ease;
        }
        .about-image-wrapper:hover::after {
            transform: translate(-10px, -10px);
        }

        .director-stance {
            background: rgba(0,0,0,0.4);
            border-left: 3px solid var(--signal-cyan);
            padding: 40px;
            margin: 80px 0;
            position: relative;
        }
        .director-quote {
            font-family: 'Avenir LT Std', sans-serif;
            font-size: 1.5rem;
            font-style: italic;
            color: var(--pure-white);
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .director-name {
            font-family: 'Hakira', sans-serif;
            color: var(--signal-cyan);
            letter-spacing: 2px;
        }

        @media (max-width: 900px) {
            .editorial-about {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .about-image-wrapper::after {
                display: none;
            }
        }

        /* Workspace Masonry */
        .workspace-masonry {
            column-count: 3;
            column-gap: 20px;
            margin: 80px 0;
            width: 100%;
        }
        .workspace-masonry img {
            width: 100%;
            margin-bottom: 20px;
            border-radius: 4px;
            filter: grayscale(80%);
            transition: filter 0.4s ease, transform 0.4s ease;
            break-inside: avoid;
        }
        .workspace-masonry img:hover {
            filter: grayscale(0%);
            transform: scale(1.02);
            z-index: 10;
            position: relative;
        }
        @media (max-width: 900px) {
            .workspace-masonry { column-count: 2; }
        }
        @media (max-width: 600px) {
            .workspace-masonry { column-count: 1; }
        }

        /* Origin Timeline */
        .origin-timeline {
            position: relative;
            max-width: 800px;
            margin: 60px auto 100px;
            padding-left: 40px;
            border-left: 2px solid rgba(0, 243, 255, 0.2);
            text-align: left;
        }
        .timeline-event {
            position: relative;
            margin-bottom: 50px;
        }
        .timeline-event::before {
            content: '';
            position: absolute;
            left: -47px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--signal-cyan);
            box-shadow: 0 0 10px var(--signal-cyan);
        }
        .timeline-date {
            font-family: 'Bomstad Display', sans-serif;
            font-size: 2rem;
            color: var(--pure-white);
            margin-bottom: 10px;
            line-height: 1;
        }
        .timeline-desc {
            font-family: 'Avenir LT Std', sans-serif;
            font-size: 1.1rem;
            color: rgba(255,255,255,0.7);
            line-height: 1.6;
        }
    </style>
    @endsection

    @section('content')
    <!-- SECTION 01 // ABOUT US -->
    <header class="section fade-in" style="padding-bottom: 5vh; min-height: 80vh; position: relative; overflow: hidden; align-items: center; justify-content: center; text-align: center; padding-top: 15vh;">
        
        <div class="container" style="display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative; z-index: 2; width: 90%; max-width: 1200px; margin: 0 auto; text-align: center;">
            
            <!-- Top: Title & Sub-header -->
            <div style="width: 100%; text-align: center;">
                <h1 class="huge-title" style="font-family: 'Bomstad Display', sans-serif; position: relative; z-index: 2; font-size: clamp(4rem, 10vw, 8rem); background: linear-gradient(90deg, var(--signal-cyan), var(--deep-electric)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; display: inline-block;">
                    ABOUT US
                </h1>
                
                <p class="sub-heading" style="margin-top: 20px; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.6; letter-spacing: 2px;">
                    Engine systems that convert raw brand potential into undeniable authority.
                </p>
            </div>

            <!-- Bottom: Editorial Content Box -->
            <div class="editorial-about fade-in delay-1">
                <div class="about-image-wrapper">
                    <img src="{{ asset('hints_editorial_brand_artifacts_v01.png') }}" alt="Abstract HINTS brand strategy materials">
                </div>
                <div>
                    <p style="font-family: 'Avenir LT Std', sans-serif; font-size: 1.15rem; color: rgba(255,255,255,0.85); line-height: 1.9; margin-bottom: 20px;">
                        Hints is a creative agency and studio that prides itself on the fusion of strategic insights and artistic creativity. We do not operate like a factory; we operate like an architectural firm for brands.
                    </p>
                    <p style="font-family: 'Avenir LT Std', sans-serif; font-size: 1.15rem; color: rgba(255,255,255,0.85); line-height: 1.9;">
                        Our brand essence is captured in our logo, which symbolizes a gateway to endless possibilities and the journey of discovering more. The gradient color in the logo represents the spectrum of services we offer, seamlessly blending creativity and strategy to create impactful, real-world results.
                    </p>
                </div>
            </div>
            
            <div class="director-stance fade-in delay-2" style="text-align: left;">
                <p class="director-quote">"We built Hints because we were tired of seeing great brands die at the hands of mediocre execution. Automation has its place, but true market dominance requires a human pulse, raw creativity, and ruthless strategic discipline."</p>
                <span class="director-name">THE HUMANS BEHIND THE SIGNALS</span>
            </div>

            <!-- ORIGIN TIMELINE -->
            <div class="origin-timeline" style="width: 100%;">
                <div class="timeline-event fade-in">
                    <div class="timeline-date">Inception</div>
                    <div class="timeline-desc">Hints was founded with a singular purpose: to reject the template-driven marketing culture and introduce architectural rigor to brand building.</div>
                </div>
                <div class="timeline-event fade-in delay-1">
                    <div class="timeline-date">Expansion</div>
                    <div class="timeline-desc">We integrated deep SEO and IT solutions with our creative core, becoming a full-stack brand engineering studio.</div>
                </div>
                <div class="timeline-event fade-in delay-2">
                    <div class="timeline-date">GLOBAL DELIVERY</div>
                    <div class="timeline-desc">GCC SPECIALISTS with global delivery capability, building brand systems around the realities of each market.</div>
                </div>
            </div>

            <div style="margin-top: 20px; margin-bottom: 60px;" class="fade-in">
                <p style="font-family: 'Hakira', sans-serif; font-size: 1.5rem; letter-spacing: 2px; color: var(--pure-white); margin-bottom: 25px;">DISCOVER MORE</p>
                <a href="{{ route('vault') }}" class="btn-luxury" style="border-color: var(--signal-cyan);">Start an Inquiry</a>
            </div>
            
        </div>
    </header>

    <!-- SECTION 02 // OUR VALUES -->
    <section class="section fade-in" style="align-items: center; justify-content: center; position: relative; overflow: hidden; min-height: 100vh;">
        <!-- Background Marquee -->
        <div class="marquee-container">
            <div class="marquee-content">
                OUR VALUES OUR VALUES OUR VALUES OUR VALUES OUR VALUES OUR VALUES 
            </div>
        </div>

        <div class="container" style="width: 90%; max-width: 1000px; margin: 0 auto; padding: 60px 0; position: relative; z-index: 2;">
            <div class="diagonal-banner" style="text-align: center;">
                <h2 class="huge-title-small" style="font-family: 'Bomstad Display', sans-serif;">OUR VALUES</h2>
            </div>
            
            <p class="sub-heading" style="text-align: center; display: block; margin-bottom: 60px; letter-spacing: 2px;">
                Immutable laws guiding structural execution.
            </p>

            <div class="laws-grid" style="display: flex; flex-direction: column; gap: 30px;">
                <!-- Value 1 -->
                <div class="fade-in delay-1" style="display: flex; align-items: flex-start; gap: 20px; background: rgba(0,0,0,0.4); padding: 30px; border: 1px solid rgba(255,255,255,0.05); backdrop-filter: blur(10px);">
                    <div style="color: var(--pure-white); font-size: 1.5rem; line-height: 1;">★</div>
                    <div>
                        <h3 style="font-family: 'Hakira', sans-serif; font-size: 2rem; color: var(--pure-white); margin-bottom: 10px;">Creativity</h3>
                        <p style="font-family: 'Avenir LT Std', sans-serif; color: rgba(255,255,255,0.7); font-size: 1.1rem; line-height: 1.6;">Embracing innovative thinking and unique solutions.</p>
                    </div>
                </div>

                <!-- Value 2 -->
                <div class="fade-in delay-2" style="display: flex; align-items: flex-start; gap: 20px; background: rgba(0,0,0,0.4); padding: 30px; border: 1px solid rgba(255,255,255,0.05); backdrop-filter: blur(10px);">
                    <div style="color: var(--pure-white); font-size: 1.5rem; line-height: 1;">★</div>
                    <div>
                        <h3 style="font-family: 'Hakira', sans-serif; font-size: 2rem; color: var(--pure-white); margin-bottom: 10px;">Quality</h3>
                        <p style="font-family: 'Avenir LT Std', sans-serif; color: rgba(255,255,255,0.7); font-size: 1.1rem; line-height: 1.6;">Commitment to excellence in every project.</p>
                    </div>
                </div>

                <!-- Value 3 -->
                <div class="fade-in delay-1" style="display: flex; align-items: flex-start; gap: 20px; background: rgba(0,0,0,0.4); padding: 30px; border: 1px solid rgba(255,255,255,0.05); backdrop-filter: blur(10px);">
                    <div style="color: var(--pure-white); font-size: 1.5rem; line-height: 1;">★</div>
                    <div>
                        <h3 style="font-family: 'Hakira', sans-serif; font-size: 2rem; color: var(--pure-white); margin-bottom: 10px;">Integrity</h3>
                        <p style="font-family: 'Avenir LT Std', sans-serif; color: rgba(255,255,255,0.7); font-size: 1.1rem; line-height: 1.6;">Maintaining transparency and trustworthiness in all interactions.</p>
                    </div>
                </div>

                <!-- Value 4 -->
                <div class="fade-in delay-2" style="display: flex; align-items: flex-start; gap: 20px; background: rgba(0,0,0,0.4); padding: 30px; border: 1px solid rgba(255,255,255,0.05); backdrop-filter: blur(10px);">
                    <div style="color: var(--pure-white); font-size: 1.5rem; line-height: 1;">★</div>
                    <div>
                        <h3 style="font-family: 'Hakira', sans-serif; font-size: 2rem; color: var(--pure-white); margin-bottom: 10px;">Passion</h3>
                        <p style="font-family: 'Avenir LT Std', sans-serif; color: rgba(255,255,255,0.7); font-size: 1.1rem; line-height: 1.6;">Driven by a love for what we do and a dedication to our clients' success.</p>
                    </div>
                </div>

                <!-- Value 5 -->
                <div class="fade-in delay-1" style="display: flex; align-items: flex-start; gap: 20px; background: rgba(0,0,0,0.4); padding: 30px; border: 1px solid rgba(255,255,255,0.05); backdrop-filter: blur(10px);">
                    <div style="color: var(--pure-white); font-size: 1.5rem; line-height: 1;">★</div>
                    <div>
                        <h3 style="font-family: 'Hakira', sans-serif; font-size: 2rem; color: var(--pure-white); margin-bottom: 10px;">Collaboration</h3>
                        <p style="font-family: 'Avenir LT Std', sans-serif; color: rgba(255,255,255,0.7); font-size: 1.1rem; line-height: 1.6;">Working closely with clients to achieve shared goals.</p>
                    </div>
                </div>
            </div>
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
