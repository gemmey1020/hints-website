@extends('components.layout')
@section('title', 'Hints | Contact Us')

@section('jsonld')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "ContactPage",
  "name": "Hints Contact Us",
  "url": "{{ url('/vault') }}"
}
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages/vault.css') }}">
<style>
    .contact-bg-pillars {
        position: fixed;
        top: 0; left: 0; width: 100vw; height: 100vh;
        overflow: hidden;
        z-index: 0;
        pointer-events: none;
    }
    .pillar {
        position: absolute;
        top: 0;
        width: 15vw;
        height: 150vh;
        background: linear-gradient(180deg, rgba(0, 240, 255, 0.05) 0%, rgba(41, 111, 247, 0.1) 100%);
        transform: skewX(-15deg);
    }
    .pillar:nth-child(1) { left: 10%; margin-top: -10vh; }
    .pillar:nth-child(2) { left: 35%; margin-top: -20vh; opacity: 0.7; }
    .pillar:nth-child(3) { left: 60%; margin-top: -5vh; opacity: 0.5; }
    .pillar:nth-child(4) { left: 85%; margin-top: -30vh; opacity: 0.8; }

    .vault-hero {
        position: relative;
        z-index: 2;
        padding-top: 20vh;
        text-align: center;
        max-width: 1400px;
        margin: 0 auto;
    }
    .contact-title {
        font-family: 'Bomstad Display', sans-serif;
        font-size: 7rem;
        color: var(--pure-white);
        line-height: 0.9;
        margin-bottom: 20px;
    }
    .contact-details {
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: flex-start;
        flex: 1;
        min-width: 300px;
    }
    .contact-detail-item {
        background: rgba(0,0,0,0.5);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.05);
        padding: 15px 30px;
        font-family: 'Avenir LT Std', sans-serif;
        font-size: 1.2rem;
        color: var(--signal-cyan);
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .contact-detail-label {
        color: rgba(255,255,255,0.5);
        font-size: 0.9rem;
        letter-spacing: 2px;
        text-transform: uppercase;
    }
    
    .contact-form {
        flex: 1;
        min-width: 300px;
        margin: 0;
        background: rgba(0,0,0,0.6);
        backdrop-filter: blur(15px);
        padding: 40px;
        border: 1px solid rgba(255,255,255,0.1);
        text-align: left;
    }
    .form-group {
        margin-bottom: 25px;
    }
    .form-group label {
        display: block;
        font-family: 'Avenir LT Std', sans-serif;
        font-size: 0.9rem;
        color: rgba(255,255,255,0.7);
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 10px;
    }
    .form-control {
        width: 100%;
        background: rgba(255,255,255,0.02);
        border: 1px solid rgba(255,255,255,0.1);
        padding: 15px;
        color: var(--pure-white);
        font-family: 'Avenir LT Std', sans-serif;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        outline: none;
        border-color: var(--signal-cyan);
        box-shadow: 0 0 15px rgba(0, 240, 255, 0.2), inset 0 0 10px rgba(0, 240, 255, 0.1);
    }
    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }
    
    .footer-slogan {
        margin-top: 80px;
        padding-bottom: 50px;
        text-align: center;
    }
    .footer-slogan img {
        height: 50px;
        margin-bottom: 20px;
        filter: drop-shadow(0 0 15px var(--signal-cyan));
    }
</style>
@endsection

@section('content')
<div class="contact-bg-pillars">
    <div class="pillar"></div>
    <div class="pillar"></div>
    <div class="pillar"></div>
    <div class="pillar"></div>
</div>

<header class="vault-hero fade-in">
    <h1 class="contact-title text-gradient" style="font-size: clamp(4rem, 10vw, 7rem);">CONTACT US</h1>
    <p class="sub-heading" style="letter-spacing: 2px;">
        Not every signal is meant to be broadcast.
    </p>
</header>

<section class="section fade-in" style="padding-top: 5vh; position: relative; z-index: 2; display: flex; flex-direction: column; align-items: center; width: 100%;">
    <div class="container" style="max-width: 800px; margin: 0 auto; display: flex; flex-direction: column; align-items: center; gap: 40px; padding: 0 5vw;">
        
        <div class="contact-details fade-in" style="transition-delay: 0.1s; width: 100%; display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-between; gap: 20px;">
            <div class="contact-detail-item" style="flex: 1; justify-content: center;">
                <span class="detail-label">Direct Phone Line</span>
                <span class="detail-value">+20 101 786 9069</span>
            </div>
            <div class="contact-detail-item" style="flex: 1; justify-content: center;">
                <span class="detail-label">Secure System Mail</span>
                <span class="detail-value">hints.studioz@gmail.com</span>
            </div>
        </div>

        <form class="contact-form fade-in" style="transition-delay: 0.2s; width: 100%;" onsubmit="event.preventDefault(); alert('Transmission sequence initiated.');">
            <div class="form-group">
                <label>Identification (Name)</label>
                <input type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Return Signal (Email)</label>
                <input type="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Directive (Message)</label>
                <textarea class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn-luxury" style="width: 100%; border-color: var(--signal-cyan); margin-top: 10px;">
                INITIATE PROTOCOL
            </button>
        </form>
    </div>

    <div class="footer-slogan fade-in" style="transition-delay: 0.3s; margin-top: 80px; width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; padding-bottom: 50px;">
        <img src="{{ asset('transparent_logo_v01.png') }}" alt="H Logo" style="height: 50px; margin-bottom: 20px; filter: drop-shadow(0 0 15px var(--signal-cyan));">
        <h2 style="font-family: 'Hakira', sans-serif; font-size: 2rem; color: var(--pure-white); letter-spacing: 5px; text-align: center;">
            DISCOVER MORE <span style="color: var(--signal-cyan);">// HINTS.SYS</span>
        </h2>
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
