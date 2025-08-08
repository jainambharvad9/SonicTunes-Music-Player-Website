@extends("UserLayout.userLayoutMain")

@section("content")
<style>
    .terms-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 60px 20px;
        color: #fff;
        font-family: 'Josefin Sans', sans-serif;
    }

    .terms-container h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
        color: #1db954;
    }

    .terms-container h2 {
        font-size: 1.5rem;
        margin-top: 30px;
        color: #fff;
    }

    .terms-container p {
        margin-bottom: 15px;
        line-height: 1.8;
        color: #ccc;
    }

    .terms-container ul {
        list-style: disc;
        padding-left: 20px;
        margin-bottom: 20px;
        color: #ccc;
    }
</style>

<main class="terms-container">
    <h1>Terms & Conditions</h1>

    <p>Welcome to SonicTunes! By using our platform, you agree to the following terms and conditions. Please read them carefully.</p>

    <h2>1. User Responsibilities</h2>
    <p>All users must comply with our usage guidelines. Do not upload or distribute copyrighted material without proper authorization.</p>

    <h2>2. Intellectual Property</h2>
    <p>All content on this website, including audio, visuals, and code, are either owned by SonicTunes or properly licensed.</p>

    <h2>3. Account & Privacy</h2>
    <ul>
        <li>Users must keep account credentials confidential.</li>
        <li>We do not share personal data with third parties without consent.</li>
    </ul>

    <h2>4. Limitation of Liability</h2>
    <p>SonicTunes is not responsible for any data loss or interruption in service.</p>

    <h2>5. Changes to Terms</h2>
    <p>We may update these terms at any time. Continued use means you accept the updated terms.</p>
</main>
@endsection
