<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Domi Clinic</title>
    <link rel="icon" href="{{ asset('hospital_website/img/domi.png') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'd61fad37f6e5fbabde590e260f3e2018751b3066';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>

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

        :root {
            --primary-color: #2c5282;
            --secondary-color: #3182ce;
            --accent-color: #06923E;
            --text-dark: #2d3748;
            --text-light: #718096;
            --bg-light: #f7fafc;
            --white: #ffffff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        /* ======= PRELOADER STYLES ======= */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out, visibility 0.5s ease-out;
        }

        .preloader.fade-out {
            opacity: 0;
            visibility: hidden;
        }

        .loader-container {
            text-align: center;
            color: var(--white);
            position: relative;
        }

        .logo-container {
            margin-bottom: 3rem;
            animation: logoFloat 3s ease-in-out infinite;
        }

        .preloader .logo {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--white);
            margin-bottom: 1rem;
        }

        .preloader .logo i {
            color: var(--accent-color);
            font-size: 3.5rem;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
        }

        .logo-text {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .tagline {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        .heartbeat-container {
            margin: 2rem 0;
            position: relative;
        }

        .heartbeat-icon {
            font-size: 4rem;
            color: var(--accent-color);
            animation: heartbeat 1.5s ease-in-out infinite;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
        }

        .spinner-container {
            margin: 2rem 0;
            position: relative;
        }

        .medical-spinner {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            position: relative;
        }

        .spinner-ring {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 4px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .spinner-ring:nth-child(1) {
            border-top-color: var(--accent-color);
            animation: spin 2s linear infinite;
        }

        .spinner-ring:nth-child(2) {
            border-right-color: var(--white);
            animation: spin 1.5s linear infinite reverse;
            width: 60px;
            height: 60px;
            top: 10px;
            left: 10px;
        }

        .spinner-ring:nth-child(3) {
            border-bottom-color: var(--accent-color);
            animation: spin 1s linear infinite;
            width: 40px;
            height: 40px;
            top: 20px;
            left: 20px;
        }

        .medical-cross {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.5rem;
            color: var(--white);
            animation: pulse 2s ease-in-out infinite;
        }

        .loading-text {
            margin-top: 2rem;
            font-size: 1.2rem;
            font-weight: 500;
            opacity: 0.9;
            animation: textFade 2s ease-in-out infinite;
        }

        .progress-container {
            width: 300px;
            height: 6px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
            margin: 2rem auto 1rem;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--accent-color) 0%, var(--white) 50%, var(--accent-color) 100%);
            border-radius: 3px;
            animation: progressFill 3s ease-in-out infinite;
        }

        .loading-messages {
            margin-top: 1.5rem;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loading-message {
            font-size: 1rem;
            opacity: 0;
            animation: messageRotate 12s infinite;
            position: absolute;
        }

        .loading-message:nth-child(1) {
            animation-delay: 0s;
        }

        .loading-message:nth-child(2) {
            animation-delay: 3s;
        }

        .loading-message:nth-child(3) {
            animation-delay: 6s;
        }

        .loading-message:nth-child(4) {
            animation-delay: 9s;
        }

        .floating-icons {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .floating-icon {
            position: absolute;
            color: rgba(255, 255, 255, 0.1);
            animation: float 8s ease-in-out infinite;
        }

        .floating-icon:nth-child(1) {
            top: 10%;
            left: 10%;
            font-size: 2rem;
            animation-delay: 0s;
        }

        .floating-icon:nth-child(2) {
            top: 20%;
            right: 15%;
            font-size: 1.5rem;
            animation-delay: 1s;
        }

        .floating-icon:nth-child(3) {
            bottom: 20%;
            left: 15%;
            font-size: 1.8rem;
            animation-delay: 2s;
        }

        .floating-icon:nth-child(4) {
            bottom: 15%;
            right: 10%;
            font-size: 2.2rem;
            animation-delay: 3s;
        }

        .floating-icon:nth-child(5) {
            top: 50%;
            left: 5%;
            font-size: 1.6rem;
            animation-delay: 4s;
        }

        .floating-icon:nth-child(6) {
            top: 60%;
            right: 5%;
            font-size: 1.4rem;
            animation-delay: 5s;
        }

        /* Preloader Animations */
        @keyframes logoFloat {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes heartbeat {

            0%,
            100% {
                transform: scale(1);
            }

            25% {
                transform: scale(1.1);
            }

            50% {
                transform: scale(1);
            }

            75% {
                transform: scale(1.05);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }

            50% {
                opacity: 0.7;
                transform: translate(-50%, -50%) scale(1.1);
            }
        }

        @keyframes textFade {

            0%,
            100% {
                opacity: 0.9;
            }

            50% {
                opacity: 0.6;
            }
        }

        @keyframes progressFill {
            0% {
                width: 0%;
                transform: translateX(-100%);
            }

            50% {
                width: 80%;
                transform: translateX(0%);
            }

            100% {
                width: 100%;
                transform: translateX(20%);
            }
        }

        @keyframes messageRotate {

            0%,
            20% {
                opacity: 0;
                transform: translateY(20px);
            }

            25%,
            75% {
                opacity: 1;
                transform: translateY(0px);
            }

            80%,
            100% {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.1;
            }

            25% {
                transform: translateY(-20px) rotate(90deg);
                opacity: 0.2;
            }

            50% {
                transform: translateY(-30px) rotate(180deg);
                opacity: 0.15;
            }

            75% {
                transform: translateY(-10px) rotate(270deg);
                opacity: 0.1;
            }
        }

        /* ======= END PRELOADER STYLES ======= */
        .auth-container {
            background: #fff;
            padding: 3rem;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 450px;
            overflow-y: auto;
            max-height: 95vh;
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

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            border: 2px solid #e2e8f0;
            font-size: 1rem;
        }

        .form-group input:focus,
        .form-group select:focus {
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
    <div class="preloader" id="preloader">
        <!-- Floating Medical Icons Background -->
        <div class="floating-icons">
            <i class="floating-icon fas fa-stethoscope"></i>
            <i class="floating-icon fas fa-user-md"></i>
            <i class="floating-icon fas fa-pills"></i>
            <i class="floating-icon fas fa-syringe"></i>
            <i class="floating-icon fas fa-heart"></i>
            <i class="floating-icon fas fa-ambulance"></i>
        </div>

        <!-- Main Loader Container -->
        <div class="loader-container">
            <!-- Hospital Logo -->
            <div class="logo-container">
                <div class="logo">
                    <a href="{{ url('/') }}"
                        style="display: flex; flex-direction: row; align-items: center; gap: 0.3rem; text-decoration: none;">
                        <img src="{{ asset('hospital_website/img/domilogo.png') }}" alt="" width="70"
                            height="70">
                        <div class="logo-text">
                            <span style="color: #fff">DOMI CLINIC</span>
                            <p style="font-size:0.5rem; color:#fff">....Bringing health to your doorsteps</p>
                        </div>
                        <style>
                            .logo-text span {
                                font-weight: bold;
                            }

                            .logo-text p {
                                margin: 0;
                            }
                        </style>
                    </a>
                </div>
                <div class="tagline">Excellence in Healthcare</div>
            </div>

            <!-- Animated Heartbeat -->
            <div class="heartbeat-container">
                <i class="fas fa-heartbeat heartbeat-icon"></i>
            </div>

            <!-- Medical Spinner -->
            <div class="spinner-container">
                <div class="medical-spinner">
                    <div class="spinner-ring"></div>
                    <div class="spinner-ring"></div>
                    <div class="spinner-ring"></div>
                    <i class="fas fa-plus medical-cross"></i>
                </div>
            </div>

            <!-- Loading Text -->
            <div class="loading-text">Loading Healthcare Portal...</div>

            <!-- Progress Bar -->
            <div class="progress-container">
                <div class="progress-bar"></div>
            </div>

            <!-- Loading Messages -->
            <div class="loading-messages">
                <div class="loading-message">Connecting to medical services...</div>
                <div class="loading-message">Preparing your health dashboard...</div>
                <div class="loading-message">Securing patient data...</div>
                <div class="loading-message">Almost ready for you...</div>
            </div>
        </div>
    </div>
    <script>
        // Preloader functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Simulate loading process
            let progress = 0;
            const loadingMessages = [
                "Initializing medical systems...",
                "Loading patient data...",
                "Connecting to healthcare network...",
                "Preparing your dashboard...",
                "Finalizing security protocols...",
                "Ready to serve you!"
            ];

            // Optional: Add progress simulation
            const simulateLoading = () => {
                const interval = setInterval(() => {
                    progress += Math.random() * 30;

                    if (progress >= 100) {
                        progress = 100;
                        clearInterval(interval);

                        // Hide preloader after loading is complete
                        setTimeout(() => {
                            hidePreloader();
                        }, 500);
                    }
                }, 300);
            };

            // Hide preloader function
            function hidePreloader() {
                const preloader = document.getElementById('preloader');
                preloader.classList.add('fade-out');

                // Remove preloader from DOM after animation
                setTimeout(() => {
                    preloader.remove();
                    // Trigger any post-load functions here
                    onPageLoaded();
                }, 500);
            }

            // Function to call after preloader is hidden
            function onPageLoaded() {
                // Add any initialization code here
                console.log('MediCare Hospital website loaded successfully');

                // Example: Redirect to main page or initialize app
                // window.location.href = 'dashboard.html';
            }

            // Start the loading simulation
            // Comment out the line below if you want to control hiding manually
            simulateLoading();

            // Manual hide after 5 seconds (fallback)
            setTimeout(() => {
                if (document.getElementById('preloader')) {
                    hidePreloader();
                }
            }, 5000);
        });

        // Function to manually hide preloader (can be called from outside)
        function hidePreloader() {
            const preloader = document.getElementById('preloader');
            if (preloader) {
                preloader.classList.add('fade-out');
                setTimeout(() => {
                    preloader.remove();
                }, 500);
            }
        }

        // Show preloader function (if you need to show it again)
        function showPreloader() {
            const preloader = document.createElement('div');
            preloader.innerHTML = document.querySelector('.preloader').outerHTML;
            document.body.appendChild(preloader);
        }
    </script>
    <div class="auth-container">
        <div class="auth-header">
            <div class="logo">
                <a href="{{ url('/') }}"
                    style="display: flex; flex-direction: column; align-items: center; text-decoration: none;">
                    <img src="{{ asset('hospital_website/img/domilogo.png') }}" alt="" width="70"
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

                        .logo {
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            margin-bottom: 1rem;
                        }
                    </style>
                </a>
            </div>
            <h2>Register</h2>
            <p>Create your patient account to access our services</p>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" class="@error('name') is-invalid @enderror"
                    placeholder="Enter your full name" value="{{ old('name') }}" required autocomplete="name"
                    autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" class="@error('email') is-invalid @enderror" name="email"
                    placeholder="Enter your email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" placeholder="Enter your phone number" required name="phone"
                    value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select required name="gender">
                    <option value="">-- Select Gender --</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" required name="dob" value="{{ old('dob') }}"
                    class="@error('phone') is-invalid @enderror">
                @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="marital-status">Marital Status</label>
                <select id="marital-status" name="marital_status" required value="{{ old('marital_status') }}">
                    <option value="">-- Select Marital Status --</option>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="divorced">Divorced</option>
                    <option value="widowed">Widowed</option>
                    <option value="separated">Separated</option>
                    <option value="engaged">Engaged</option>
                    <option value="other">Other</option>
                </select>

            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="@error('password') is-invalid @enderror"
                    placeholder="Create a password" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" placeholder="Re-enter your password" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
        <div class="extra-links">
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
</body>

</html>
