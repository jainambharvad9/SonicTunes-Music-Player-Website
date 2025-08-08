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
            max-width: 500px;
            width: 100%;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .form-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
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
        <div class="glass-form mt-12">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="SonicTunes Logo"
                        class="h-16 sm:h-20 w-auto hover:scale-105 transition duration-300" />
                </a>
            </div>

            <!-- Form Title -->
            <div class="form-title">Contact Us</div>

            <!-- Contact Form -->
            <form action="#" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Your Name" class="form-control" required>
                <input type="email" name="email" placeholder="Your Email" class="form-control" required>
                <input type="text" name="subject" placeholder="Subject" class="form-control" required>
                <textarea name="message" placeholder="Your Message" class="form-control" rows="5" required></textarea>
                <button type="submit" class="form-btn">Send Message</button>
            </form>

        </div>

    </main>
@endsection