@extends('components.layout')
    @section('title', 'Hints | The Architecture of Authority')
    
    @section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
    <style>
        /* Anti-AI Credibility Injection Styles */
        
        /* 1. Trust Marquee */
        .trust-marquee {
            width: 100%;
            padding: 40px 0;
            background: var(--near-black);
            border-top: 1px solid rgba(255,255,255,0.05);
            border-bottom: 1px solid rgba(255,255,255,0.05);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .trust-title {
            font-family: 'Avenir LT Std', sans-serif;
            font-size: 0.8rem;
            letter-spacing: 4px;
            color: rgba(255,255,255,0.4);
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        .trust-track {
            display: flex;
            width: max-content;
            animation: marquee 25s linear infinite;
        }
        .trust-logo {
            font-family: 'Bomstad Display', sans-serif;
            font-size: clamp(1rem, 2vw, 1.35rem);
            color: rgba(255,255,255,0.55);
            margin: 0 28px;
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }
        .trust-logo:hover {
            opacity: 1;
            color: var(--signal-cyan);
        }

        /* 2. Editorial Manifesto */
        .editorial-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 80vh;
            background: #000;
        }
        .editorial-image-pane {
            position: relative;
            overflow: hidden;
        }
        .editorial-image-pane img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.78;
            filter: grayscale(25%) contrast(1.12);
            transition: all 0.6s ease;
        }
        .editorial-image-pane:hover img {
            filter: grayscale(0%) contrast(1.1);
            opacity: 0.9;
        }
        .editorial-text-pane {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 8vw 6vw;
            border-left: 1px solid rgba(255,255,255,0.1);
        }
        .manifesto-title {
            font-family: 'Hakira', sans-serif;
            font-size: clamp(2rem, 4vw, 4rem);
            color: var(--pure-white);
            margin-bottom: 30px;
            line-height: 1.1;
        }
        .manifesto-body {
            font-family: 'Avenir LT Std', sans-serif;
            font-size: 1.15rem;
            color: rgba(255,255,255,0.7);
            line-height: 1.8;
            margin-bottom: 40px;
        }

        /* 3. The Process Grid */
        .process-section {
            padding: 10vh 5vw;
            background: linear-gradient(180deg, var(--near-black) 0%, #000 100%);
        }
        .process-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2vw;
            max-width: 1400px;
            margin: 60px auto 0;
        }
        .process-card {
            border: 1px solid rgba(255,255,255,0.05);
            background: rgba(255,255,255,0.01);
            padding: 40px;
            backdrop-filter: blur(10px);
            position: relative;
            transition: all 0.4s ease;
        }
        .process-card:hover {
            border-color: var(--signal-cyan);
            background: rgba(0,240,255,0.02);
            transform: translateY(-5px);
        }
        .process-num {
            font-family: 'Bomstad Display', sans-serif;
            font-size: 4rem;
            color: rgba(255,255,255,0.1);
            position: absolute;
            top: 20px; right: 20px;
            line-height: 1;
        }
        .process-card:hover .process-num {
            color: rgba(0,240,255,0.2);
        }
        .process-title {
            font-family: 'Hakira', sans-serif;
            font-size: 1.5rem;
            color: var(--pure-white);
            margin-bottom: 15px;
            margin-top: 30px;
        }
        .process-desc {
            font-family: 'Avenir LT Std', sans-serif;
            color: rgba(255,255,255,0.6);
            line-height: 1.6;
        }
        
        @media (max-width: 900px) {
            .editorial-section { grid-template-columns: 1fr; }
            .editorial-image-pane { height: 50vh; }
            .process-grid { grid-template-columns: 1fr; }
            .sticky-showcase { flex-direction: column; }
            .sticky-left { 
                position: relative !important; 
                width: 100% !important; 
                top: 0 !important; 
                margin-bottom: 40px; 
                padding-right: 0 !important; 
            }
            .sticky-right { width: 100% !important; }
            .stats-grid { grid-template-columns: 1fr; }
            .hover-brand-text { font-size: 1.5rem !important; }
            .discipline-num { font-size: 1.2rem !important; }
            .huge-title { font-size: 3rem !important; }
            .trust-marquee { padding: 28px 0; }
            .trust-title { padding: 0 5vw; text-align: center; line-height: 1.5; }
            .trust-logo { margin: 0 18px; }
            .testimonial-section { padding: 12vh 7vw; }
            .testimonial-quote { font-size: clamp(1.8rem, 9vw, 3rem); }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Video Hero Additions */
        .hero-video-bg {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: 0;
            transform: translateX(-50%) translateY(-50%);
            object-fit: cover;
            filter: grayscale(100%) contrast(1.2);
            opacity: 0.3;
        }
        .hero-bg-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(180deg, rgba(0,0,0,0.7) 0%, #000 100%);
            z-index: 1;
        }

        /* Stats Grid */
        .stats-section {
            padding: 80px 5vw;
            background: #000;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }
        .stat-card {
            border: 1px solid rgba(255,255,255,0.05);
            padding: 40px;
            text-align: center;
            background: rgba(255,255,255,0.02);
            transition: transform 0.4s ease, border-color 0.4s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            border-color: var(--signal-cyan);
            background: rgba(0,240,255,0.03);
        }
        .stat-number {
            font-family: 'Bomstad Display', sans-serif;
            font-size: clamp(3rem, 8vw, 5rem);
            background: linear-gradient(90deg, var(--signal-cyan), var(--deep-electric));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }
        .stat-label {
            font-family: 'Hakira', sans-serif;
            color: rgba(255,255,255,0.6);
            letter-spacing: 2px;
            font-size: 0.9rem;
        }

        /* Sticky Showcase */
        .sticky-showcase {
            display: flex;
            align-items: flex-start;
            padding: 10vh 5vw;
            background: var(--near-black);
            position: relative;
        }
        .sticky-left {
            position: sticky;
            top: 20vh;
            width: 40%;
            padding-right: 5vw;
        }
        .sticky-right {
            width: 60%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Testimonial Slider */
        .testimonial-section {
            padding: 15vh 5vw;
            background: #000;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.05);
        }
        .testimonial-quote {
            font-family: 'Bomstad Display', sans-serif;
            font-size: clamp(2rem, 5vw, 4rem);
            color: var(--pure-white);
            max-width: 1200px;
            margin: 0 auto 30px;
            line-height: 1.2;
        }
        .testimonial-author {
            font-family: 'Hakira', sans-serif;
            color: var(--signal-cyan);
            letter-spacing: 2px;
            font-size: 1.2rem;
        }
    </style>
    @endsection

    @section('content')
    <!-- SYSTEM BOOT PRELOADER -->
    <div id="home-preloader">
        <div class="preloader-terminal">
            <span id="terminal-text"></span><span class="cursor-blink"></span>
        </div>
    </div>

    <section class="hero" id="hero" style="height: 100vh; position: relative;">
        <div class="hero-bg-glow" style="z-index: 2;"></div>

        <div class="hero-content" style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; width: 100%; height: 100%; z-index: 10;">
            <div class="hero-logo-wrapper" style="display: flex; align-items: center; justify-content: center; position: relative; z-index: 2;">
                <div class="animated-aura aura-hero"></div>
                <img src="{{ asset('transparent_logo_v01.png') }}"
                     alt="Hints"
                     style="width: 65vw; max-width: 800px; height: auto; position: relative; z-index: 2;"
                     class="glowing-logo">
            </div>
            <h1 class="hero-statement" style="margin-top: 3vh; position: relative; z-index: 3; max-width: 800px; margin-left: auto; margin-right: auto;">
                We engineer systems that convert raw brand potential into undeniable authority.
            </h1>
            <div class="fade-in delay-2" style="margin-top: 4vh; position: relative; z-index: 10;">
                <a href="{{ route('vault') }}" class="btn-luxury"><span class="btn-text">Start an Inquiry</span></a>
            </div>
        </div>
    </section>

    <!-- POSITIONING SIGNALS -->
    <div class="trust-marquee fade-in delay-2">
        <h4 class="trust-title">BUILT FOR AMBITIOUS MARKETS</h4>
        <div class="trust-track">
            @for($i=0; $i<2; $i++)
            <div class="trust-logo">GCC SPECIALISTS</div>
            <div class="trust-logo">GLOBAL DELIVERY</div>
            <div class="trust-logo">STRATEGY-LED BRAND SYSTEMS</div>
            @endfor
        </div>
    </div>

    <!-- OPERATING PRINCIPLES -->
    <section class="stats-section fade-in">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">GCC</div>
                <div class="stat-label">MARKET SPECIALISTS</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">GLOBAL</div>
                <div class="stat-label">DELIVERY CAPABILITY</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">HUMAN</div>
                <div class="stat-label">LED BRAND THINKING</div>
            </div>
        </div>
    </section>

    <!-- 01.5 TABLE OF CONTENT -->
    <section id="toc" class="section fade-in" style="min-height: 80vh; background: var(--near-black); padding: 10vh 5vw;">
        <div class="container toc-layout">
            <div class="toc-title-wrapper">
                <h2 class="toc-title text-gradient" style="font-family: 'Bomstad Display', sans-serif;">INDEX</h2>
            </div>
            <div class="toc-grid">
                <a href="{{ route('doctrine') }}" class="toc-item hover-brand-container" style="text-decoration: none;">
                    <span class="toc-num">01.</span>
                    <span class="toc-name hover-brand-text">ABOUT US</span>
                </a>
                <a href="{{ route('doctrine') }}#values" class="toc-item hover-brand-container" style="text-decoration: none;">
                    <span class="toc-num">02.</span>
                    <span class="toc-name hover-brand-text">OUR VALUES</span>
                </a>
                <a href="{{ route('disciplines') }}" class="toc-item hover-brand-container" style="text-decoration: none;">
                    <span class="toc-num">03.</span>
                    <span class="toc-name hover-brand-text">CREATIVE SETS</span>
                </a>
                <a href="{{ route('engagements') }}" class="toc-item hover-brand-container" style="text-decoration: none;">
                    <span class="toc-num">04.</span>
                    <span class="toc-name hover-brand-text">SPECIAL BUNDLES</span>
                </a>
                <a href="{{ route('archive') }}" class="toc-item hover-brand-container" style="text-decoration: none;">
                    <span class="toc-num">05.</span>
                    <span class="toc-name hover-brand-text">SELECTED WORKS</span>
                </a>
                <a href="{{ route('vault') }}" class="toc-item hover-brand-container" style="text-decoration: none;">
                    <span class="toc-num">06.</span>
                    <span class="toc-name hover-brand-text">CONTACT US</span>
                </a>
            </div>
        </div>
    </section>

    <!-- EDITORIAL MANIFESTO SECTION (Anti-AI Injection) -->
    <section class="editorial-section">
        <div class="editorial-image-pane fade-in">
            <img src="{{ asset('hints_editorial_brand_artifacts_v01.png') }}" alt="Abstract HINTS brand strategy materials">
        </div>
        <div class="editorial-text-pane fade-in delay-1">
            <h2 class="manifesto-title">We don't use templates.<br>We don't cut corners.</h2>
            <p class="manifesto-body">
                In an era saturated with automated mediocrity and formulaic designs, true brand authority is scarce. 
                <br><br>
                Hints is a collective of human creatives, strategists, and structural engineers. We build bespoke brand architectures—tailored perfectly to your market realities. Most brands compete on the surface. We build ecosystems that make competition <span class="text-gradient">irrelevant</span>.
            </p>
            <a href="{{ route('doctrine') }}" class="btn-luxury" style="align-self: flex-start;"><span class="btn-text">Read The Doctrine</span></a>
        </div>
    </section>

    <!-- THE PROCESS GRID (Anti-AI Injection) -->
    <section class="process-section">
        <div style="text-align: center;">
            <h2 class="huge-title-small text-gradient">METHODOLOGY</h2>
            <p class="sub-heading" style="margin-top: 15px; letter-spacing: 2px;">How we engineer dominance.</p>
        </div>
        <div class="process-grid">
            <div class="process-card fade-in">
                <div class="process-num">01</div>
                <h3 class="process-title">Discovery & Strategy</h3>
                <p class="process-desc">We interrogate your market positioning, auditing competitors and identifying whitespace. Every creative decision is anchored in cold, hard strategic reality.</p>
            </div>
            <div class="process-card fade-in delay-1">
                <div class="process-num">02</div>
                <h3 class="process-title">Architectural Design</h3>
                <p class="process-desc">Our creative team designs the visual and structural assets of your brand. From logo translation to complex digital UI, we build the framework.</p>
            </div>
            <div class="process-card fade-in delay-2">
                <div class="process-num">03</div>
                <h3 class="process-title">Deployment</h3>
                <p class="process-desc">We execute across all required mediums—web, print, and social ecosystems—ensuring your brand signal is broadcast with absolute clarity.</p>
            </div>
        </div>
    </section>

    <!-- 03. THE DISCIPLINES (STICKY SHOWCASE) -->
    <section class="sticky-showcase">
        <div class="sticky-left fade-in">
            <h2 class="huge-title-small">OUR<br><span class="text-gradient">DISCIPLINES</span></h2>
            <p class="sub-heading" style="margin-top:20px; font-size:1.1rem; text-align: left; margin-left: 0;">We don't offer services. We deploy disciplines. Each one is a precise instrument designed to build authority and dominate markets.</p>
            <a href="{{ route('disciplines') }}" class="btn-luxury" style="margin-top: 30px;"><span class="btn-text">Explore All</span></a>
        </div>
        <div class="sticky-right">
            <a href="{{ route('disciplines') }}" style="text-decoration: none; color: inherit;">
                <div class="discipline-item hover-brand-container fade-in" style="width: 100%; padding: 40px; border: 1px solid rgba(255,255,255,0.05); background: rgba(0,0,0,0.3); transition: all 0.4s ease;">
                    <span class="discipline-num" style="font-size: 2rem;">01.</span> <span class="hover-brand-text" style="font-size: 2.5rem; display: block; margin-top: 10px;">Brand Strategy & Identity</span>
                </div>
            </a>
            <a href="{{ route('disciplines') }}" style="text-decoration: none; color: inherit;">
                <div class="discipline-item hover-brand-container fade-in" style="width: 100%; padding: 40px; border: 1px solid rgba(255,255,255,0.05); background: rgba(0,0,0,0.3); transition: all 0.4s ease;">
                    <span class="discipline-num" style="font-size: 2rem;">02.</span> <span class="hover-brand-text" style="font-size: 2.5rem; display: block; margin-top: 10px;">Content Creation & Strategy</span>
                </div>
            </a>
            <a href="{{ route('disciplines') }}" style="text-decoration: none; color: inherit;">
                <div class="discipline-item hover-brand-container fade-in" style="width: 100%; padding: 40px; border: 1px solid rgba(255,255,255,0.05); background: rgba(0,0,0,0.3); transition: all 0.4s ease;">
                    <span class="discipline-num" style="font-size: 2rem;">03.</span> <span class="hover-brand-text" style="font-size: 2.5rem; display: block; margin-top: 10px;">Social Media & Digital Marketing</span>
                </div>
            </a>
            <a href="{{ route('disciplines') }}" style="text-decoration: none; color: inherit;">
                <div class="discipline-item hover-brand-container fade-in" style="width: 100%; padding: 40px; border: 1px solid rgba(255,255,255,0.05); background: rgba(0,0,0,0.3); transition: all 0.4s ease;">
                    <span class="discipline-num" style="font-size: 2rem;">04.</span> <span class="hover-brand-text" style="font-size: 2.5rem; display: block; margin-top: 10px;">Graphic & Web Design</span>
                </div>
            </a>
            <a href="{{ route('disciplines') }}" style="text-decoration: none; color: inherit;">
                <div class="discipline-item hover-brand-container fade-in" style="width: 100%; padding: 40px; border: 1px solid rgba(255,255,255,0.05); background: rgba(0,0,0,0.3); transition: all 0.4s ease;">
                    <span class="discipline-num" style="font-size: 2rem;">05.</span> <span class="hover-brand-text" style="font-size: 2.5rem; display: block; margin-top: 10px;">Promotional & Print Materials</span>
                </div>
            </a>
            <a href="{{ route('disciplines') }}" style="text-decoration: none; color: inherit;">
                <div class="discipline-item hover-brand-container fade-in" style="width: 100%; padding: 40px; border: 1px solid rgba(255,255,255,0.05); background: rgba(0,0,0,0.3); transition: all 0.4s ease;">
                    <span class="discipline-num" style="font-size: 2rem;">06.</span> <span class="hover-brand-text" style="font-size: 2.5rem; display: block; margin-top: 10px;">SEO & IT Solutions</span>
                </div>
            </a>
        </div>
    </section>

    <!-- BRAND STANCE -->
    <section class="testimonial-section fade-in">
        <h2 class="testimonial-quote">Strategy before aesthetics.<br>Systems before surface.</h2>
        <div class="testimonial-author">THE HINTS STANDARD</div>
    </section>

    <!-- 03.5 THE KINETIC LOCALIZATION MARQUEE -->
    <section class="kinetic-marquee-wrapper">
        <div class="kinetic-marquee-container">
            <!-- TOP TAPE: Market positioning (Left to Right) -->
            <div class="marquee-tape marquee-tape-top">
                @for ($i = 0; $i < 2; $i++)
                <div class="marquee-content">
                    <div class="marquee-item">GCC SPECIALISTS</div>
                    <div class="marquee-item">GLOBAL DELIVERY</div>
                    <div class="marquee-item">BUILT FOR AMBITIOUS MARKETS</div>
                </div>
                @endfor
            </div>

            <!-- BOTTOM TAPE: Capabilities (Right to Left) -->
            <div class="marquee-tape marquee-tape-bottom">
                @for ($i = 0; $i < 2; $i++)
                <div class="marquee-content">
                    <div class="marquee-item">STRATEGY</div>
                    <div class="marquee-item">IDENTITY</div>
                    <div class="marquee-item">CONTENT</div>
                    <div class="marquee-item">DIGITAL</div>
                    <div class="marquee-item">WEB</div>
                    <div class="marquee-item">SEO</div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- 06. THE VAULT CTA -->
    <section class="gateway-cta">
        <p class="cta-warning">For brands ready to build with intent.</p>
        <h2 class="stance-title" style="font-size: 3rem; margin-bottom: 40px;">Build your authority.</h2>
        <a href="{{ route('vault') }}" class="btn-luxury"><span class="btn-text">Start an Inquiry</span></a>
    </section>
@endsection

@section('scripts')
<script>
    // Flag this page as having a custom preloader so layout.blade.php doesn't fade the global curtain itself
    window.hasCustomPreloader = true;
    
    document.addEventListener('DOMContentLoaded', () => {
        const preloader = document.getElementById('home-preloader');
        const terminalText = document.getElementById('terminal-text');
        const globalCurtain = document.getElementById('global-transition-curtain');
        
        // Hide global curtain immediately since our preloader is covering the screen
        if (globalCurtain) globalCurtain.style.display = 'none';
        
        // Check session storage so we don't annoy the user on every visit
        if (!sessionStorage.getItem('hints_system_booted')) {
            const text = "INITIALIZING KINETIC ASSET...";
            let i = 0;
            
            // Start typing after a short delay
            setTimeout(() => {
                const typeWriter = setInterval(() => {
                    terminalText.innerHTML += text.charAt(i);
                    i++;
                    if (i >= text.length) {
                        clearInterval(typeWriter);
                        // Wait a bit, then fade out
                        setTimeout(() => {
                            preloader.style.opacity = '0';
                            setTimeout(() => {
                                preloader.style.display = 'none';
                                sessionStorage.setItem('hints_system_booted', 'true');
                            }, 800);
                        }, 600);
                    }
                }, 70); // typing speed
            }, 500);
        } else {
            // Already booted this session, just fade out immediately
            preloader.style.display = 'none';
        }
        
        // Custom Kinetic Cursor Logic — DESKTOP ONLY
        const isTouchDevice = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0);
        if (!isTouchDevice) {
            const cursor = document.getElementById('discipline-cursor');
            const disciplineLinks = document.querySelectorAll('.discipline-list a');
            
            let mouseX = 0, mouseY = 0;
            let isHovering = false;

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
                if(isHovering) {
                    cursor.style.left = mouseX + 'px';
                    cursor.style.top = mouseY + 'px';
                }
            });

            disciplineLinks.forEach(link => {
                link.addEventListener('mouseenter', () => {
                    isHovering = true;
                    link.classList.add('cursor-hide-native');
                    cursor.style.display = 'block';
                    cursor.style.left = mouseX + 'px';
                    cursor.style.top = mouseY + 'px';
                    // Trigger reflow for animation
                    void cursor.offsetWidth;
                    cursor.classList.add('active');
                });
                link.addEventListener('mouseleave', () => {
                    isHovering = false;
                    link.classList.remove('cursor-hide-native');
                    cursor.classList.remove('active');
                    setTimeout(() => {
                        if(!isHovering) cursor.style.display = 'none';
                    }, 200);
                });
            });
        }
    });
</script>
@endsection
