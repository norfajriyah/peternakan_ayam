<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        body {
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #007BFF; /* Warna biru */
            color: #fff; /* Warna teks */
        }
        .container {
            text-align: center;
        }
        .button {
            display: inline-block;
            margin: 10px;
            padding: 15px 30px; /* Lebih besar */
            font-size: 18px; /* Lebih besar */
            font-weight: 600;
            color: white;
            background-color: #FF2D20;
            border: none;
            border-radius: 8px; /* Lebih besar */
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #d22b1e;
        }
        .nav-link {
            display: inline-block;
            margin: 10px;
            padding: 15px 30px; /* Lebih besar */
            font-size: 18px; /* Lebih besar */
            font-weight: 600;
            color: white;
            background-color: #0056b3; /* Warna biru yang berbeda */
            border: 1px solid transparent;
            border-radius: 8px; /* Lebih besar */
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .nav-link:hover {
            background-color: #003d80; /* Warna biru yang berbeda saat hover */
        }
        .dark .nav-link {
            color: white;
        }
        .dark .nav-link:hover {
            color: #f0f0f0;
        }
        .caption {
            font-size: 24px; /* Lebih besar */
            margin-bottom: 20px; /* Lebih besar */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="caption">Pengelolaan Data Peternakan Karang Indah Broiler</div>
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-center">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="nav-link"
                        style="background-color: #FF2D20;"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="nav-link"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="nav-link"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
</body>
</html>
