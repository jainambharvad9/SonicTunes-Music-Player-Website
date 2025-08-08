@extends('UserLayout.userLayoutMain')

@section('content')
    <style>
        body {
            background: url('../images/blog-bg.JPG') no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }

        /* Optional dark overlay */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: -1;
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

        .nav-logo {
            width: 90px;
            height: 90px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .nav-logo:hover {
            transform: scale(1.05);
        }
    </style>

    <main class="min-h-screen flex items-center justify-center px-4 py-12">
        <!-- CUSTOM CURSOR -->
        <div class="cursor scale"></div>
        <div class="cursor-two scale"></div>
        <!-- CUSTOM CURSOR -->


        <!-- PRELOADER -->
        <div id="preloader">
            <div class="p">
                <img src="{{ asset('images/headphone.png') }}" alt="headphone">
                Use Headphone For Better Experience
            </div>
        </div>
        <!-- PRELOADER -->



 
        <div class="scrolling-part">

        </div>
 
        <div class="glass-form">
            <!-- Logo Section -->
            <div class="flex justify-center mb-6">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="SonicTunes Logo"
                        class="nav-logo h-16 sm:h-20 w-auto hover:scale-105 transition duration-300" />
                </a>
            </div>

            <!-- Title -->
            <div class="form-title">Create Your Account</div>

            <!-- Form -->
            <form method="POST" action="{{ route('adduser', ['id' => 1]) }}">
                @csrf
                <input type="text" name="name" placeholder="Name" class="form-control" required>
                <input type="email" name="email" placeholder="Email" class="form-control" required>
                <input type="password" name="password" placeholder="Password" class="form-control" required>
                <button type="submit" class="form-btn">Register</button>

                <div class="text-sm text-center mt-3">
                    Already have an account? <a href="{{ route('login') }}" class="text-green-400 hover:underline">Login</a>
                </div>
            </form>
        </div>
    </main>
@endsection