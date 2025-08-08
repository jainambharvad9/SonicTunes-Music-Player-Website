@extends('UserLayout.userLayoutMain')

@section('content')
<style>
    body {
        background: url('../images/blog-bg.JPG') no-repeat center center fixed;
        background-size: cover;
    }
    .glass-form {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 16px;
        padding: 2rem;
        color: white;
        max-width: 400px;
        width: 100%;
    }
    .form-title {
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 1.2rem;
        text-align: center;
    }
    .form-control {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
        padding: 0.8rem;
        border-radius: 6px;
        width: 100%;
        margin-bottom: 1rem;
    }
    .form-control::placeholder {
        color: #ccc;
    }
    .form-btn {
        background-color: #1db954;
        color: black;
        font-weight: bold;
        padding: 0.75rem;
        width: 100%;
        border: none;
        border-radius: 6px;
        transition: 0.3s;
    }
    .form-btn:hover {
        background-color: #1ed760;
    }
</style>

<main class="flex justify-center items-center min-h-screen px-4">    
        <!-- CUSTOM CURSOR -->
        <div class="cursor scale"></div>
        <div class="cursor-two scale"></div>
        <!-- CUSTOM CURSOR -->

        {{-- <!-- PRELOADER -->
        <div id="preloader">
            <div class="p">
                <img src="images/headphone.png" alt="headphone">
                Use Headphone For Better Experience
            </div>
        </div>
        <!-- PRELOADER -->
        --}}
        
        <div class="scrolling-part">
            
        </div>
        
        <div class="glass-form">

            <!-- Logo Section -->
            <div class="flex justify-center mb-6">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="SonicTunes Logo"
                         class="h-16 sm:h-20 w-auto hover:scale-105 transition duration-300" />
                </a>
            </div>
    
            <!-- Title -->
            <div class="form-title">Login to SonicTunes</div>
    
            <!-- Form -->
            <form method="POST" action="{{ route('log') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" class="form-control" required>
                <input type="password" name="password" placeholder="Password" class="form-control" required>
                <button type="submit" class="form-btn">Login</button>
                <div class="text-sm text-center mt-3">
                    Don’t have an account? <a href="{{ route('register') }}" class="text-green-400 hover:underline">Register</a>
                </div>
            </form>
        </div>
    

</main>
@endsection
