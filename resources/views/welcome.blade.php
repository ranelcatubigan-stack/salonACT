<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="{{ asset('css/welstyle.css') }}">
    
    <title>Glow & Grace Salon</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,700|poppins:300,400,600" rel="stylesheet" />
</head>

<body class="welcome-body">
    <div class="overlay">
        <header class="main-header">
            @if (Route::has('login'))
                <nav class="nav-links">
                    @auth
                        <a href="{{ url('/services') }}" class="nav-item">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-item">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-item btn-register">Join Now</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="hero-section">
            <div class="hero-content">
                <h1>Glow & Grace</h1>
                <p class="subtitle">Experience luxury treatments tailored to you.</p>
                <div class="cta-buttons">
                    <a href="{{ route('register') }}" class="btn-primary">Book an Appointment</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>