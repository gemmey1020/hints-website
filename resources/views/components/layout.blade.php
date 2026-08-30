<!DOCTYPE html>
<html lang="en" style="background-color: #000000;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Omega SEO/GEO Engine V4 (Backend — Route-Aware, Config-Driven) -->
    {!! app(App\Services\Seo\AiSeoEngine::class)->renderMetaTags() !!}
    {!! app(App\Services\Seo\AiSeoEngine::class)->renderJsonLd() !!}
    @yield('jsonld')

    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <style>
        /* Global MPA Overrides */
        body {
            background-color: var(--near-black);
            color: var(--pure-white);
            margin: 0;
            overflow-x: clip;
            font-family: 'Avenir LT Std', sans-serif;
        }

        /* Abstract Global Proof Background */
        .abstract-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: radial-gradient(circle at 50% 50%, rgba(116, 244, 255, 0.03) 0%, transparent 60%);
            z-index: -1;
            pointer-events: none;
        }

        /* Force Navbar Display */
        .navbar {
            display: flex !important;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        .navbar.scrolled {
            /* Navbar is always transparent as requested */
            background: transparent;
            border-bottom: none;
        }
        
        .page-content {
            animation: mpaFadeIn 0.8s ease-out forwards;
        }

        @keyframes mpaFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Stealth Overlay Navigation */
        .stealth-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(20px);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .stealth-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }
        .stealth-overlay-links {
            display: flex;
            flex-direction: column;
            gap: 40px;
            text-align: center;
        }
        .stealth-overlay-links a {
            position: relative;
            font-family: 'Bomstad Display', sans-serif;
            font-size: 4rem;
            text-decoration: none;
            text-transform: uppercase;
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: translateY(20px);
            opacity: 0;
            display: inline-block;
        }

        .stealth-overlay.active .stealth-overlay-links a {
            transform: translateY(0);
            opacity: 1;
        }
        .stealth-overlay.active .stealth-overlay-links a:nth-child(1) { transition-delay: 0.1s; }
        .stealth-overlay.active .stealth-overlay-links a:nth-child(2) { transition-delay: 0.2s; }
        .stealth-overlay.active .stealth-overlay-links a:nth-child(3) { transition-delay: 0.3s; }
        .stealth-overlay.active .stealth-overlay-links a:nth-child(4) { transition-delay: 0.4s; }
        .stealth-overlay.active .stealth-overlay-links a:nth-child(5) { transition-delay: 0.5s; }
        .stealth-overlay.active .stealth-overlay-links a:nth-child(6) { transition-delay: 0.6s; }

        .close-overlay-btn {
            position: absolute;
            top: 40px;
            right: 5vw;
            background: transparent;
            border: none;
            color: rgba(255,255,255,0.5);
            font-family: 'Avenir LT Std', sans-serif;
            font-size: 0.9rem;
            letter-spacing: 3px;
            cursor: pointer;
            text-transform: uppercase;
            z-index: 2001;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 5vw;
            width: 100%;
        }

        .menu-btn {
            position: relative;
            background: transparent;
            border: none;
            color: var(--pure-white);
            font-family: 'Avenir LT Std', sans-serif;
            font-size: 0.9rem;
            letter-spacing: 3px;
            cursor: pointer;
            text-transform: uppercase;
            z-index: 2001;
            transition: color 0.3s ease;
        }
        .menu-btn:hover {
            color: var(--signal-cyan);
        }

        /* Menu Aura Effect */
        .menu-aura {
            filter: blur(15px);
            width: 160%;
            height: 160%;
            opacity: 0.7;
            z-index: 1;
        }

        @keyframes pulseLogo {
            0% { transform: scale(1); opacity: 0.3; filter: drop-shadow(0 0 0px var(--signal-cyan)); }
            50% { transform: scale(1.1); opacity: 0.8; filter: drop-shadow(0 0 15px var(--signal-cyan)); }
            100% { transform: scale(1); opacity: 0.3; filter: drop-shadow(0 0 0px var(--signal-cyan)); }
        }
    </style>
    @yield('styles')
    
    <!-- Mobile fixes must load LAST -->
    <link rel="stylesheet" href="{{ asset('css/mobile_fixes.css') }}">
</head>
<body>
    <!-- Global Transition Curtain -->
    <div id="global-transition-curtain" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: #000000; z-index: 9999; transition: opacity 0.6s ease; pointer-events: none; display: flex; align-items: center; justify-content: center;">
        <img src="{{ asset('transparent_logo_v02.png') }}" alt="Hints Mark" style="height: 60px; animation: pulseLogo 2s infinite ease-in-out;">
    </div>

    <div class="abstract-bg"></div>

    <nav class="navbar" id="navbar">
        <div class="nav-content">
            <a href="{{ url('/') }}" class="nav-logo" style="position: relative; display: flex; align-items: center; justify-content: center;">
                <div class="animated-aura" style="width: 120%; height: 120%; opacity: 0.6; filter: blur(20px); z-index: 1;"></div>
                <img src="{{ asset('transparent_logo_v01.png') }}"
                     alt="Hints"
                     style="height: 35px; width: auto; max-width: 200px; position: relative; z-index: 2;"
                     class="nav-logo-img">
            </a>
            <button class="menu-btn hover-brand-container" id="menu-toggle">
                <div class="animated-aura menu-aura"></div>
                <span class="hover-brand-text-white" style="position: relative; z-index: 2;">Menu</span>
            </button>
        </div>
    </nav>

    <!-- Stealth Full-Screen Overlay -->
    <div class="stealth-overlay" id="stealth-overlay">
        <button class="close-overlay-btn hover-brand-container" id="close-overlay">
            <div class="animated-aura menu-aura"></div>
            <span class="hover-brand-text-white" style="position: relative; z-index: 2;">Close [X]</span>
        </button>
        
        <div class="stealth-overlay-links">
            <a href="{{ url('/') }}" class="hover-brand-container"><span class="hover-brand-text">Index</span></a>
            <a href="{{ route('doctrine') }}" class="hover-brand-container"><span class="hover-brand-text">About Us</span></a>
            <a href="{{ route('disciplines') }}" class="hover-brand-container"><span class="hover-brand-text">Creative Sets</span></a>
            <a href="{{ route('engagements') }}" class="hover-brand-container"><span class="hover-brand-text">Special Bundles</span></a>
            <a href="{{ route('archive') }}" class="hover-brand-container"><span class="hover-brand-text">Selected Works</span></a>
            <a href="{{ route('vault') }}" class="hover-brand-container"><span class="hover-brand-text">Contact Us</span></a>
        </div>
    </div>

    <main class="page-content">
        @yield('content')
    </main>

    <footer style="border-top: 1px solid rgba(255, 255, 255, 0.05); padding: 40px 5vw; display: flex; justify-content: space-between; align-items: center; background-color: var(--near-black); position: relative; z-index: 10;">
        <div style="display: flex; align-items: center; gap: 20px;">
            <img src="{{ asset('transparent_logo_v01.png') }}" alt="Hints Mark" style="height: 30px; opacity: 0.5;">
            <span style="font-family: 'Avenir LT Std', sans-serif; font-size: 0.9rem; color: rgba(255,255,255,0.3);">&copy; {{ date('Y') }} Hints Brand Studio. All Rights Reserved.</span>
        </div>
        <div style="display: flex; gap: 30px;">
            <a href="#" class="hover-brand-container" style="color: rgba(255,255,255,0.4); text-decoration: none; font-size: 0.9rem; font-family: 'Avenir LT Std', sans-serif;"><span class="hover-brand-text">Privacy Policy</span></a>
            <a href="#" class="hover-brand-container" style="color: rgba(255,255,255,0.4); text-decoration: none; font-size: 0.9rem; font-family: 'Avenir LT Std', sans-serif;"><span class="hover-brand-text">Terms of Service</span></a>
        </div>
    </footer>

    @yield('scripts')
    <script>
        const navbar = document.getElementById("navbar");
        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });

        const menuBtn = document.getElementById("menu-toggle");
        const closeBtn = document.getElementById("close-overlay");
        const stealthOverlay = document.getElementById("stealth-overlay");

        menuBtn.addEventListener("click", () => {
            stealthOverlay.classList.add("active");
        });

        closeBtn.addEventListener("click", () => {
            stealthOverlay.classList.remove("active");
        });

        // Global Page Transition Logic
        document.addEventListener('DOMContentLoaded', () => {
            const curtain = document.getElementById('global-transition-curtain');
            
            // If the page doesn't have a custom preloader (like the Home Page), fade out the curtain
            if (!window.hasCustomPreloader) {
                setTimeout(() => {
                    curtain.style.opacity = '0';
                }, 100);
            }
        });

        // Intercept internal links for seamless transition
        document.querySelectorAll('a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                // Only intercept internal links, ignore # anchors or external/empty links
                if (href && href.startsWith(window.location.origin) && !href.includes('#')) {
                    // Check if it's the exact same page, if so ignore
                    if (href === window.location.href) return;
                    
                    e.preventDefault();
                    const curtain = document.getElementById('global-transition-curtain');
                    // Fade to black
                    curtain.style.opacity = '1';
                    
                    // Wait for fade, then navigate
                    setTimeout(() => {
                        window.location.href = href;
                    }, 600);
                }
            });
        });
    </script>
</body>
</html>
