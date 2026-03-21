<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} - Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Outfit:400,500,600,700" rel="stylesheet" />

    <!-- Style -->
    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --glass-bg: rgba(255, 255, 255, 0.08);
            --glass-border: rgba(255, 255, 255, 0.15);
            --glass-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
            --text-color: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0f172a;
            overflow: hidden;
            position: relative;
        }

        /* Animated Background Blobs */
        .blob {
            position: absolute;
            width: 500px;
            height: 500px;
            background: linear-gradient(180deg, rgba(99, 102, 241, 0.3) 0%, rgba(168, 85, 247, 0.3) 100%);
            filter: blur(80px);
            border-radius: 50%;
            z-index: -1;
            animation: move 20s infinite alternate;
        }

        .blob-2 {
            width: 400px;
            height: 400px;
            background: linear-gradient(180deg, rgba(236, 72, 153, 0.2) 0%, rgba(249, 115, 22, 0.2) 100%);
            bottom: -50px;
            right: -50px;
            animation-delay: -5s;
        }

        .blob-3 {
            width: 300px;
            height: 300px;
            background: linear-gradient(180deg, rgba(34, 197, 94, 0.2) 0%, rgba(20, 184, 166, 0.2) 100%);
            top: 10%;
            left: 10%;
            animation-delay: -10s;
        }

        @keyframes move {
            from { transform: translate(-10%, -10%) rotate(0deg); }
            to { transform: translate(10%, 10%) rotate(360deg); }
        }

        /* Abstract Professional Background Image */
        .bg-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069&auto=format&fit=crop') no-repeat center center/cover;
            opacity: 0.12;
            z-index: -2;
        }

        .container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
            perspective: 1000px;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 40px;
            box-shadow: var(--glass-shadow);
            animation: cardAppear 1s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }

        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.05),
                transparent
            );
            transition: 0.5s;
        }

        .glass-card:hover::before {
            left: 100%;
        }

        @keyframes cardAppear {
            from { opacity: 0; transform: translateY(30px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .logo-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: var(--primary);
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
        }

        .logo-icon svg {
            width: 32px;
            height: 32px;
            fill: white;
        }

        h1 {
            color: var(--text-color);
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        p.subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
            margin-top: 8px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        input {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            padding: 12px 16px;
            color: white;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        input:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        .options-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            cursor: pointer;
        }

        .remember-me input {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .forgot-password:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
        }

        .btn-login:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 6px;
        }

        footer {
            margin-top: 30px;
            text-align: center;
            color: rgba(255, 255, 255, 0.4);
            font-size: 12px;
        }

        /* Responsive adjustments */
        @media (max-width: 480px) {
            .glass-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="bg-image"></div>
    <div class="blob"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <div class="container">
        <div class="glass-card">
            <div class="logo-section">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8Z" />
                    </svg>
                </div>
                <h1>Secure Access</h1>
                <p class="subtitle">Please enter your credentials to log in</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autofocus autocomplete="username">
                    </div>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input id="password" type="password" name="password" placeholder="••••••••" required autocomplete="current-password">
                    </div>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="options-row">
                    <label class="remember-me">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
                    @endif
                </div>

                <button type="submit" class="btn-login">
                    Sign In
                </button>
            </form>
        </div>

        <footer>
            &copy; {{ date('Y') }} {{ config('app.name', 'Secure CRM') }}. All rights reserved.
        </footer>
    </div>
</body>
</html>
