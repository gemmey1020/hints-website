@extends('components.layout')
@section('title', 'Hints | Creative Sets (Services & Pricing)')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages/disciplines.css') }}">
<style>
    .creative-sets-header {
        position: relative;
        min-height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 40px;
    }
    .box-creative {
        background: linear-gradient(135deg, var(--signal-cyan), var(--deep-electric));
        padding: 10px 30px;
        color: var(--near-black);
        font-family: 'Bomstad Display', sans-serif;
        font-size: clamp(3rem, 10vw, 7rem);
        line-height: 1;
        position: relative;
        z-index: 1;
    }
    .box-sets {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 10px 30px;
        color: var(--pure-white);
        font-family: 'Bomstad Display', sans-serif;
        font-size: clamp(2.5rem, 8vw, 6rem);
        line-height: 1;
        position: absolute;
        top: 60%;
        left: 40%;
        z-index: 3;
        transform: rotate(-12deg);
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }
    .star-icon {
        position: absolute;
        color: var(--pure-white);
        font-size: 1.5rem;
        animation: pulseLogo 3s infinite ease-in-out;
    }
    
    .discipline-card {
        background: rgba(0,0,0,0.4);
        border: 1px solid rgba(255,255,255,0.05);
        padding: 40px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        position: relative;
    }
    .discipline-header {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 20px;
    }
    .discipline-huge-num {
        font-family: 'Avenir LT Std', sans-serif;
        font-size: 5rem;
        line-height: 1;
        padding-top: 10px;
        font-weight: 900;
        background: linear-gradient(135deg, var(--signal-cyan), var(--deep-electric));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .discipline-title {
        font-family: 'Avenir LT Std', sans-serif;
        font-size: 1.4rem;
        font-weight: bold;
        color: var(--pure-white);
        line-height: 1.2;
        margin-top: 5px;
    }
    .service-items {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 30px;
    }
    .service-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        font-family: 'Avenir LT Std', sans-serif;
        font-size: 1.05rem;
        color: rgba(255,255,255,0.9);
        border-bottom: 1px solid rgba(255,255,255,0.1);
        transition: border-color 0.3s ease;
    }
    .service-item:hover {
        border-bottom-color: var(--signal-cyan);
    }
    .service-price {
        color: var(--signal-cyan);
        font-weight: bold;
        margin-left: 5px;
    }
</style>
@endsection

@section('content')
<!-- SECTION 03 // CREATIVE SETS -->
<header class="disciplines-hero fade-in" style="min-height: 50vh; justify-content: flex-end; padding-bottom: 50px; align-items: flex-start; text-align: left; padding-left: 5vw; padding-right: 5vw; width: 100%; max-width: 1400px; margin-left: auto; margin-right: auto;">
    
    <div class="creative-sets-header" style="margin-left: 0;">
        <div class="star-icon" style="top: -20px; left: -20px;">★</div>
        <div class="star-icon" style="bottom: -20px; right: -20px; animation-delay: 1s;">★</div>
        
        <div class="box-creative">CREATIVE</div>
        <div class="box-sets">SETS</div>
    </div>

    <p style="font-family: 'Avenir LT Std', sans-serif; font-size: 1.2rem; letter-spacing: 2px; text-transform: uppercase; color: rgba(255,255,255,0.6); margin-top: 30px; max-width: 600px;">
        We do not offer services. We deploy disciplines.
    </p>
</header>

<section class="discipline-grid" style="padding-top: 20px;">
    <!-- Discipline 01 -->
    <div class="discipline-card fade-in">
        <div class="discipline-header">
            <div class="discipline-huge-num">1</div>
            <h2 class="discipline-title">Brand Strategy<br>& Identity</h2>
        </div>
        <div class="service-items">
            <div class="service-item">Brand Strategy <span class="service-price">($400)</span></div>
            <div class="service-item">Brand Identity Creation <span class="service-price">($650)</span></div>
            <div class="service-item">Guidelines <span class="service-price">($300)</span></div>
            <div class="service-item">Logo Design <span class="service-price">($300)</span></div>
            <div class="service-item">Logo Translation <span class="service-price">($100)</span></div>
            <div class="service-item">Company Profile Design <span class="service-price">($275)</span></div>
            <div class="service-item">Company Profile Content <span class="service-price">($200)</span></div>
        </div>
    </div>

    <!-- Discipline 02 -->
    <div class="discipline-card fade-in" style="transition-delay: 0.1s;">
        <div class="discipline-header">
            <div class="discipline-huge-num">2</div>
            <h2 class="discipline-title">Content Creation<br>& Strategy</h2>
        </div>
        <div class="service-items">
            <div class="service-item">Content Strategy <span class="service-price">($350)</span></div>
            <div class="service-item">Website Content <span class="service-price">($325)</span></div>
            <div class="service-item">Branded Content <span class="service-price">($275)</span></div>
            <div class="service-item">Profile Content <span class="service-price">($200)</span></div>
            <div class="service-item">Marketing Strategy <span class="service-price">($500)</span></div>
        </div>
    </div>

    <!-- Discipline 03 -->
    <div class="discipline-card fade-in">
        <div class="discipline-header">
            <div class="discipline-huge-num">3</div>
            <h2 class="discipline-title">Social Media<br>& Digital Marketing</h2>
        </div>
        <div class="service-items">
            <div class="service-item">Social Media Designs <span class="service-price">($150)</span></div>
            <div class="service-item">Videos/GIFs (4) <span class="service-price">($200)</span></div>
            <div class="service-item">SEO Services <span class="service-price">($275)</span></div>
            <div class="service-item">Media Buying <span class="service-price">(Variable*)</span></div>
            <div class="service-item">Video Editing <span class="service-price">(Variable*)</span></div>
            <div class="service-item">Reels Editing (10) <span class="service-price">($500)</span></div>
        </div>
    </div>

    <!-- Discipline 04 -->
    <div class="discipline-card fade-in" style="transition-delay: 0.1s;">
        <div class="discipline-header">
            <div class="discipline-huge-num">4</div>
            <h2 class="discipline-title">Graphic<br>& Web Design</h2>
        </div>
        <div class="service-items">
            <div class="service-item">Packaging Design <span class="service-price">($225)</span></div>
            <div class="service-item">UI/UX Designs <span class="service-price">($550)</span></div>
            <div class="service-item">Web Design <span class="service-price">($650)</span></div>
            <div class="service-item">Landing Page <span class="service-price">($250)</span></div>
        </div>
    </div>

    <!-- Discipline 05 -->
    <div class="discipline-card fade-in">
        <div class="discipline-header">
            <div class="discipline-huge-num">5</div>
            <h2 class="discipline-title">Promotional<br>& Print Materials</h2>
        </div>
        <div class="service-items">
            <div class="service-item">Stationeries <span class="service-price">($100)</span></div>
            <div class="service-item">Stickers <span class="service-price">($75)</span></div>
            <div class="service-item">Booth Design <span class="service-price">($300)</span></div>
            <div class="service-item">Giveaways/Gifts <span class="service-price">($200)</span></div>
        </div>
    </div>

    <!-- Discipline 06 -->
    <div class="discipline-card fade-in" style="transition-delay: 0.1s;">
        <div class="discipline-header">
            <div class="discipline-huge-num">6</div>
            <h2 class="discipline-title">SEO<br>& IT Solutions</h2>
        </div>
        <div class="service-items">
            <div class="service-item">SEO Services <span class="service-price">($275)</span></div>
            <div class="service-item">IT Solutions <span class="service-price">($400)</span></div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section fade-in" style="justify-content: center; text-align: center; min-height: 40vh;">
    <div class="container">
        <h2 class="huge-title-small" style="font-size: 2.5rem; margin-bottom: 30px;">Identify your requirements.</h2>
        <a href="{{ route('engagements') }}" class="btn-luxury">View Special Bundles</a>
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
