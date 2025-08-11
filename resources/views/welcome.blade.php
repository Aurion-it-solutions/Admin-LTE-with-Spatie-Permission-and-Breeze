<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Consultancy Login</title>
<style>
    body {
        background:
            linear-gradient(135deg, rgba(78,84,200,0.7), rgba(143,148,251,0.7)),
            url('https://images.pexels.com/photos/4347366/pexels-photo-4347366.jpeg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .login-card {
        max-width: 400px;
        width: 100%;
        background: #fff;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        animation: fadeIn 0.8s ease-in-out;
    }

    .login-card h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        font-weight: 700;
        color: #4e54c8;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    label {
        font-weight: 500;
        margin-bottom: 0.4rem;
        display: inline-block;
        color: #333;
    }

    input[type="email"], input[type="password"] {
        width: 100%;
        padding: 0.8rem;
        border-radius: 8px;
        border: 1px solid #ccc;
        transition: all 0.3s ease;
        font-size: 1rem;
    }

    input:focus {
        outline: none;
        border-color: #4e54c8;
        box-shadow: 0 0 5px rgba(78, 84, 200, 0.5);
    }

    .btn-primary {
        width: 100%;
        background: linear-gradient(135deg, #4e54c8, #8f94fb);
        color: #fff;
        padding: 0.8rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s ease;
        font-size: 1rem;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #3e44b8, #7f84eb);
    }

    .login-footer {
        text-align: center;
        margin-top: 1rem;
        font-size: 0.9rem;
    }

    .login-footer a {
        color: #4e54c8;
        text-decoration: none;
        font-weight: 500;
    }

    .login-footer a:hover {
        text-decoration: underline;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
</head>
<body>
<div class="login-card">
    <h2>Student Consultancy Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
                <div style="color: #e3342f; font-size: 0.9em;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            @error('password')
                <div style="color: #e3342f; font-size: 0.9em;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-group">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
            </label>
        </div>

        <button class="btn-primary" type="submit">Login</button>

        <div class="login-footer">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            @endif
        </div>
    </form>
</div>

</body>
</html>
