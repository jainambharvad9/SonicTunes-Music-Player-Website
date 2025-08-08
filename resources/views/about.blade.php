@extends('UserLayout.userLayoutMain')
@push('styles')
<style>
    .about-text-heading span.red {
        color: #1db954;
        font-weight: bold;
    }
    .signature {
        margin-top: 40px;
        text-align: center;
        font-size: 1.5rem;
        color: #1db954;
        font-weight: 600;
    }
</style>
@endpush

@section('content')
<main id="about-one">
    <!-- CUSTOM CURSOR -->
    <div class="cursor scale"></div>
    <div class="cursor-two scale"></div>

    <!-- PRELOADER -->
    <div id="preloader">
        <div class="p">
            <img src="{{ asset('images/headphone.png') }}" alt="headphone">
        </div>
        <div class="p">Use Headphones For The Best Experience.</div>
    </div>

    <!-- ABOUT PAGE CONTENT -->
    <div id="about-one-content">

        <!-- NAVIGATION -->
        <div class="navigation">
            <div class="logo hover" style="top: 90px">
                <a href="/" class="text">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="nav-logo" />
                </a>
            </div>
        </div>
        <br>
        <br>
        <!-- HEADING -->
        <div class="heading">
            <span class="text">ABOUT</span>
        </div>

        <!-- CENTER IMAGE -->
        <div class="center">
            <div class="about-img img">
                <img class="img-parallax" src="{{ asset('images/about-img.jpg') }}" alt="about-img">
            </div>
        </div>

        <!-- ABOUT TEXT -->
        <div class="center">
            <div class="about-text">
                <div class="about-text-heading text-scroll">
                    Welcome to <span class="red">SonicTunes</span> – Your Gateway to Boundless Music.
                </div>
                <div class="about-text-content text-scroll">
                    At SonicTunes, we believe music is more than sound – it's emotion, mood, and connection. Our platform brings together passionate listeners and talented artists through seamless streaming, beautiful UI, and personalized recommendations powered by intelligent technology.
                    <br><br>
                    Whether you're vibing to your favorite genre, discovering rising artists, or curating your perfect playlist, we’re here to soundtrack your life – 24/7. We designed SonicTunes with heart, blending modern tech with a love for melodies.
                    <br><br>
                    So turn up the volume, and let the beats guide your journey.
                </div>
            </div>
        </div>

        <!-- SIGNATURE -->
        <div class="signature">
            <span class="text-scroll">– Team SonicTunes 🎧</span>
        </div>

        <!-- HEADPHONE IMG -->
        <div class="headphone img text">
            <img src="{{ asset('images/headphone.png') }}" title="headphone zone" class="text" alt="headphone">
        </div>

        <!-- PROGRESS BAR -->
        <div class="progress-bar-container fade-in">
            <div class="progressbar"></div>
        </div>
    </div>
</main>
@endsection
