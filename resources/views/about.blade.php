<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Domi Clinic</title>
    <link rel="icon" href="{{ asset('hospital_website/img/domi.png') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = 'd61fad37f6e5fbabde590e260f3e2018751b3066';
        window.smartsupp || (function(d) {
            var s, c, o = smartsupp = function() {
                o._.push(arguments)
            };
            o._ = [];
            s = d.getElementsByTagName('script')[0];
            c = d.createElement('script');
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.async = true;
            c.src = 'https://www.smartsuppchat.com/loader.js?';
            s.parentNode.insertBefore(c, s);
        })(document);
    </script>
    <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            scroll-behavior: smooth;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
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

        /* Header & Navigation */
        .header {
            background: var(--white);
            box-shadow: var(--shadow);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .logo i {
            color: var(--accent-color);
            font-size: 2rem;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--primary-color);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn-primary {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary-color);
            cursor: pointer;
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: var(--white);
            padding: 120px 0 80px;
            margin-top: 80px;
            text-align: center;
        }

        .page-header h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .page-header p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
            opacity: 0.8;
        }

        .breadcrumb a {
            color: var(--white);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* About Sections */
        .about-intro {
            padding: 5rem 0;
            background: var(--white);
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .about-text h2 {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .about-text p {
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 1.5rem;
        }

        .about-image {
            text-align: center;
        }

        .about-image img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: var(--shadow-lg);
        }

        /* Mission Vision Values */
        .mission-section {
            padding: 5rem 0;
            background: var(--bg-light);
        }

        .mission-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .mission-card {
            background: var(--white);
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .mission-card:hover {
            transform: translateY(-5px);
        }

        .mission-card i {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 1.5rem;
        }

        .mission-card h3 {
            font-size: 1.8rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .mission-card p {
            color: var(--text-light);
            font-size: 1rem;
        }

        /* Team Section */
        .team-section {
            padding: 5rem 0;
            background: var(--white);
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-header h2 {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .section-header p {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .team-card {
            background: var(--white);
            border-radius: 15px;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .team-image {
            width: 100%;
            height: 250px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 4rem;
        }

        .team-info {
            padding: 1.5rem;
            text-align: center;
        }

        .team-info h3 {
            font-size: 1.3rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .team-info .specialty {
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .team-info p {
            color: var(--text-light);
            font-size: 0.95rem;
            margin-bottom: 1rem;
        }

        .team-social {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .team-social a {
            color: var(--text-light);
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .team-social a:hover {
            color: var(--primary-color);
        }

        /* Why Choose Us */
        .why-choose {
            padding: 5rem 0;
            background: var(--bg-light);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-3px);
        }

        .feature-icon {
            background: linear-gradient(135deg, var(--accent-color), #00b894);
            color: var(--white);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .feature-content h3 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .feature-content p {
            color: var(--text-light);
        }

        /* Awards Section */
        .awards-section {
            padding: 5rem 0;
            background: var(--white);
        }

        .awards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .award-card {
            background: var(--bg-light);
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .award-card:hover {
            transform: scale(1.05);
        }

        .award-card i {
            font-size: 3rem;
            color: #ffd700;
            margin-bottom: 1rem;
        }

        .award-card h3 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .award-card p {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Call to Action */
        .cta-section {
            background: var(--primary-color);
            color: var(--white);
            padding: 4rem 0;
            text-align: center;
        }

        .cta-content h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .cta-content p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-accent {
            background: var(--accent-color);
            color: var(--white);
        }

        .btn-accent:hover {
            background: #00b894;
            transform: translateY(-2px);
        }

        /* Footer */
        .footer {
            background: var(--text-dark);
            color: var(--white);
            padding: 3rem 0 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            color: var(--accent-color);
        }

        .footer-section p,
        .footer-section a {
            color: #a0aec0;
            text-decoration: none;
            margin-bottom: 0.5rem;
            display: block;
        }

        .footer-section a:hover {
            color: var(--accent-color);
        }

        .footer-bottom {
            border-top: 1px solid #4a5568;
            padding-top: 1rem;
            text-align: center;
            color: #a0aec0;
        }

        /* Animation Classes */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }

            nav {
                padding-inline: 1rem !important;
            }

            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--white);
                flex-direction: column;
                padding: 1rem;
                box-shadow: var(--shadow);
            }

            .nav-links.active {
                display: flex;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .about-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .about-text h2 {
                font-size: 2rem;
            }

            .mission-grid,
            .team-grid,
            .features-grid,
            .awards-grid {
                grid-template-columns: 1fr;
            }

            .feature-card {
                flex-direction: column;
                text-align: center;
            }

            .cta-content h2 {
                font-size: 2rem;
            }

            /* Preloader Mobile Responsive */
            .preloader .logo {
                font-size: 2rem;
                flex-direction: column;
                gap: 0.5rem;
            }

            .preloader .logo i {
                font-size: 2.5rem;
            }

            .tagline {
                font-size: 1rem;
            }

            .medical-spinner {
                width: 60px;
                height: 60px;
            }

            .spinner-ring:nth-child(2) {
                width: 45px;
                height: 45px;
                top: 7.5px;
                left: 7.5px;
            }

            .spinner-ring:nth-child(3) {
                width: 30px;
                height: 30px;
                top: 15px;
                left: 15px;
            }

            .progress-container {
                width: 250px;
            }

            .loading-text {
                font-size: 1rem;
            }

            .floating-icon {
                font-size: 1.2rem !important;
            }
        }

        /* Print Styles */
        @media print {
            .preloader {
                display: none !important;
            }
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
    <!-- Header -->
    <header class="header">
        <nav class="nav container">
            <div class="logo">
                <a href="{{ url('/') }}"
                    style="display: flex; flex-direction: row; align-items: center; gap: 0.3rem; text-decoration: none;">
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
                    </style>
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact_us') }}">Contact</a></li>
                <li><a href="{{ route('doctors') }}">Doctors</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}" class="btn"
                        style="background-color: #06923E; color:#fff;">Register</a></li>
            </ul>
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
    </header>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>About Domi Clinic</h1>
            <p>Learn about our commitment to providing exceptional healthcare services with compassion, expertise, and
                state-of-the-art technology.</p>
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="fas fa-chevron-right"></i>
                <span>About Us</span>
            </div>
        </div>
    </section>

    <!-- About Introduction -->
    <section class="about-intro">
        <div class="container">
            <div class="about-content">
                <div class="about-text fade-in">
                    <h2>Leading Healthcare Excellence</h2>
                    <p>For over 25 years, Domi Clinic has been at the forefront of medical innovation and patient care.
                        We are dedicated to providing comprehensive healthcare services that combine cutting-edge
                        technology with compassionate human touch.</p>
                    <p>Our team of highly qualified medical professionals, state-of-the-art facilities, and
                        patient-centered approach make us the trusted choice for families across the region. We believe
                        that quality healthcare should be accessible to everyone, and we work tirelessly to make that
                        vision a reality.</p>
                    <p>From routine check-ups to complex surgical procedures, we offer a full spectrum of medical
                        services designed to meet the diverse health needs of our community.</p>
                </div>
                <div class="about-image fade-in">
                    <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Hospital Interior">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission, Vision, Values -->
    <section class="mission-section">
        <div class="container">
            <div class="section-header">
                <h2>Our Foundation</h2>
                <p>Built on strong values and guided by our mission to provide exceptional healthcare to every patient
                    we serve.</p>
            </div>
            <div class="mission-grid">
                <div class="mission-card fade-in">
                    <i class="fas fa-bullseye"></i>
                    <h3>Our Mission</h3>
                    <p>To provide comprehensive, compassionate, and high-quality healthcare services that improve the
                        health and well-being of the communities we serve, while advancing medical knowledge through
                        research and education.</p>
                </div>
                <div class="mission-card fade-in">
                    <i class="fas fa-eye"></i>
                    <h3>Our Vision</h3>
                    <p>To be the leading healthcare provider in the region, recognized for clinical excellence,
                        innovation, and exceptional patient experience, while making quality healthcare accessible to
                        all.</p>
                </div>
                <div class="mission-card fade-in">
                    <i class="fas fa-heart"></i>
                    <h3>Our Values</h3>
                    <p>Compassion, Integrity, Excellence, Innovation, Respect, and Collaboration. These values guide
                        every interaction and decision we make in our commitment to patient care and community service.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Medical Team -->
    <section class="team-section">
        <div class="container">
            <div class="section-header">
                <h2>Our Expert Medical Team</h2>
                <p>Meet our dedicated healthcare professionals who bring years of experience and expertise to provide
                    you with the best possible care.</p>
            </div>
            <div class="team-grid">
                @foreach ($doctors as $doctor)
                    <div class="team-card fade-in">
                        <div class="team-image">
                            @if ($doctor->image == null)
                                <i class="fas fa-user-md"></i>
                            @else
                                <img src="{{ asset('storage/doctors/' . $doctor->image) }}" alt="Doctor Image"
                                    style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
                            @endif
                        </div>
                        <div class="team-info">
                            <h3>Dr. {{ $doctor->name }}</h3>
                            <div class="specialty">{{ $doctor->position }}</div>
                            <p>{{ $doctor->description }}</p>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-choose">
        <div class="container">
            <div class="section-header">
                <h2>Why Choose Domi Clinic</h2>
                <p>Discover what sets us apart and makes us the preferred choice for quality healthcare in the region.
                </p>
            </div>
            <div class="features-grid">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Accredited Excellence</h3>
                        <p>Fully accredited facility meeting international standards for quality and safety in
                            healthcare delivery.</p>
                    </div>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-microscope"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Advanced Technology</h3>
                        <p>State-of-the-art medical equipment and cutting-edge technology for accurate diagnosis and
                            effective treatment.</p>
                    </div>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="feature-content">
                        <h3>24/7 Emergency Care</h3>
                        <p>Round-the-clock emergency services with immediate response and critical care capabilities.
                        </p>
                    </div>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Compassionate Care</h3>
                        <p>Patient-centered approach with personalized attention and support throughout your healthcare
                            journey.</p>
                    </div>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Affordable Healthcare</h3>
                        <p>Competitive pricing and flexible payment options to make quality healthcare accessible to
                            all.</p>
                    </div>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Insurance Accepted</h3>
                        <p>Wide range of insurance plans accepted, with dedicated staff to help with claims and
                            coverage.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Awards and Recognitions -->
    <section class="awards-section">
        <div class="container">
            <div class="section-header">
                <h2>Awards & Recognition</h2>
                <p>Our commitment to excellence has been recognized through various prestigious awards and
                    certifications.</p>
            </div>
            <div class="awards-grid">
                <div class="award-card fade-in">
                    <i class="fas fa-trophy"></i>
                    <h3>Hospital of the Year 2025</h3>
                    <p>Healthcare Excellence Awards</p>
                </div>
                <div class="award-card fade-in">
                    <i class="fas fa-medal"></i>
                    <h3>Patient Safety Award</h3>
                    <p>National Patient Safety Foundation</p>
                </div>
                <div class="award-card fade-in">
                    <i class="fas fa-award"></i>
                    <h3>Top Employer 2025</h3>
                    <p>Healthcare Industry Recognition</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Experience Excellence in Healthcare</h2>
                <p>Join thousands of satisfied patients who have trusted us with their health. Register today and become
                    part of the MediCare family.</p>
                <a href="{{ route('login') }}" class="btn btn-accent">Get Your Health Card Today</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="logo">
                        <a href="{{ url('/') }}"
                            style="display: flex; flex-direction: row; align-items: center; gap: 0.3rem; text-decoration: none;">
                            <img src="{{ asset('hospital_website/img/domilogo.png') }}" alt=""
                                width="70" height="70">
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
                            </style>
                        </a>
                    </div>
                    <p>Providing quality healthcare services with compassion and excellence. Your health and well-being
                        are our top priorities.</p>
                    <div style="margin-top: 1rem; display:flex">
                        <a href="https://www.facebook.com/share/19kKHfobWy/" target="_blank">
                            <i class="fab fa-facebook" style="margin-right: 1rem; font-size: 1.2rem;"></i>
                        </a>
                        <a href="https://www.tiktok.com/@domi.clinic.and.ma?_t=ZS-90Ngmpktiu0&_r=1" target="_blank">
                            <i class="fab fa-tiktok" style="margin-right: 1rem; font-size: 1.2rem;"></i>
                        </a>
                        <a href="https://www.instagram.com/ikefunaprincess?igsh=MWI3bDhhbXR2b2lhbg==" target="_blank">
                            <i class="fab fa-instagram" style="margin-right: 1rem; font-size: 1.2rem;"></i>
                        </a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ route('services') }}">Services</a>
                    <a href="{{ route('about') }}">About Us</a>
                    <a href="{{ route('contact_us') }}">Contact</a>
                    <a href="{{ route('doctors') }}">Doctors</a>
                    <a href="{{ route('register') }}">Patient Registration</a>
                </div>
                <div class="footer-section">
                    <h3>Services</h3>
                    <a href="{{ route('antenatal_clinic') }}">Antenatal Clinic</a>
                    <a href="{{ route('pediatrics') }}">Pediatric</a>
                    <a href="{{ route('geriatrics') }}">Geriatrics</a>
                    <a href="{{ route('lab') }}">Laboratory Services</a>
                    <a href="{{ route('ultrasound') }}">Ultrasound</a>
                    <a href="{{ route('blood_banking') }}">Blood Banking and Donation</a>
                    <a href="{{ route('immunization') }}">Immunization</a>
                    <a href="{{ route('drug_dispensary') }}">Drug dispensary</a>
                    <a href="{{ route('free_hiv_and_pregnancy_test') }}">Free Hiv and Pregnancy Test</a>
                    <a href="{{ route('24_hours_emergency_clinic') }}">24 Hours Emergency Clinic</a>
                    <a href="{{ route('consultations') }}">Consultations</a>
                    <a href="{{ route('eye_clinic') }}">Eye Clinic</a>
                </div>
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <a href="https://maps.app.goo.gl/oy9c1B77GSjBtyfT7" target="_blank">
                        <p><i class="fas fa-map-marker-alt"></i>1 Obika Street, 3-3 Nkwelle Ezunaka, By Uju Bus-Stop,
                            Oyi 435115, Anambra</p>
                    </a>
                    <a href="tel:+2347062491804" target="_blank">
                        <p><i class="fas fa-phone"></i> +2347062491804</p>
                    </a>
                    <a href="mailto:info@domiclinic.net" target="_blank">
                        <p><i class="fas fa-envelope"></i> info@domiclinic.net</p>
                    </a>
                    <p><i class="fas fa-clock"></i> 24/7 Emergency Services</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Domi Clinic Hospital. All rights reserved. | Privacy Policy | Terms of Service | built by
                    <a href="https://solotech-ai-ltd.com/" target="_blank">SoloTech.AI LTD.</a></p>
            </div>
        </div>
    </footer>
    <script>
        // Global variables
        let currentUser = null;
        const API_BASE_URL = '/api'; // Change this to your Laravel API base URL

        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        }
        // Animation Functions
        function initializeAnimations() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.fade-in').forEach(el => {
                observer.observe(el);
            });
        }

        // Counter Animation
        function initializeCounters() {
            const counters = [{
                    id: 'patients-count',
                    target: 15000,
                    suffix: '+'
                },
                {
                    id: 'doctors-count',
                    target: 50,
                    suffix: '+'
                },
                {
                    id: 'experience-count',
                    target: 25,
                    suffix: '+'
                },
                {
                    id: 'awards-count',
                    target: 30,
                    suffix: '+'
                }
            ];

            const statsSection = document.querySelector('.stats');
            let hasAnimated = false;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !hasAnimated) {
                        hasAnimated = true;
                        counters.forEach(counter => {
                            animateCounter(counter.id, counter.target, counter.suffix);
                        });
                    }
                });
            });

            if (statsSection) {
                observer.observe(statsSection);
            }
        }

        function animateCounter(elementId, target, suffix = '') {
            const element = document.getElementById(elementId);
            if (!element) return;

            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current) + suffix;
            }, 40);
        }


        // Check authentication status
        function checkAuthStatus() {
            const token = localStorage.getItem('authToken');
            const userStr = localStorage.getItem('currentUser');

            if (token && userStr) {
                currentUser = JSON.parse(userStr);
                updateAuthUI();
            }
        }
    </script>
</body>

</html>
