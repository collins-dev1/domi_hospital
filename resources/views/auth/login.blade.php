<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Domi Clinic</title>
    <link rel="icon" href="{{asset('hospital_website/img/domi.png')}}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #2c5282, #3182ce);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .auth-container {
            background: #fff;
            padding: 3rem;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .auth-header i {
            font-size: 2rem;
            color: #00d4aa;
        }

        .auth-header h2 {
            margin: 0.5rem 0;
            color: #06923E;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.3rem;
            font-weight: 600;
            color: #06923E;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            border: 2px solid #e2e8f0;
            font-size: 1rem;
        }

        .form-group input:focus {
            border-color: #06923E;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 8px;
            background: #06923E;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .btn:hover {
            background: #3182ce;
        }

        .extra-links {
            text-align: center;
            margin-top: 1rem;
        }

        .extra-links a {
            color: #2c5282;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .extra-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <div class="auth-header">
            <div class="logo">
                <a href="{{ url('/') }}"
                    style="display: flex; flex-direction: column; align-items: center; text-decoration: none;">
                    <img src="{{ asset('hospital_website/img/domi.png') }}" alt="" width="70"
                        height="70">
                    <div class="logo-text">
                        <span>DOMI CLINIC</span>
                        <p style="font-size:0.5rem">....Bringing health to your doorsteps</p>
                    </div>
                    <style>
                        .logo-text span {
                            font-weight: bold;
                            color: #06923E;
                        }
                        .logo-text p {
                            margin: 0;
                            color: #06923E;
                        }

                        .logo{
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            margin-bottom: 1rem;
                        }
                    </style>
                </a>
            </div>
            <h2>Login</h2>
            <p>Please sign in to access your account</p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" placeholder="Enter your email" required
                    class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                    autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" placeholder="Enter your password" required
                    class="@error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="extra-links">
            <p><a href="#">Forgot Password?</a></p>
            <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
</body>

</html>
