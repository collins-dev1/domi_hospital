<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Doctors - Domi Clinic</title>
    <link rel="icon" href="{{asset('hospital_website/img/domi.png')}}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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

        .loading-message:nth-child(1) { animation-delay: 0s; }
        .loading-message:nth-child(2) { animation-delay: 3s; }
        .loading-message:nth-child(3) { animation-delay: 6s; }
        .loading-message:nth-child(4) { animation-delay: 9s; }

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
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes heartbeat {
            0%, 100% {
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
            0%, 100% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
            50% {
                opacity: 0.7;
                transform: translate(-50%, -50%) scale(1.1);
            }
        }

        @keyframes textFade {
            0%, 100% {
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
            0%, 20% {
                opacity: 0;
                transform: translateY(20px);
            }
            25%, 75% {
                opacity: 1;
                transform: translateY(0px);
            }
            80%, 100% {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        @keyframes float {
            0%, 100% {
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

        .btn-accent {
            background: var(--accent-color);
            color: var(--white);
        }

        .btn-accent:hover {
            background: #00b894;
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-outline:hover {
            background: var(--primary-color);
            color: var(--white);
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
            padding: 120px 0 60px;
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

        /* Filter Section */
        .filter-section {
            background: var(--white);
            padding: 2rem 0;
            box-shadow: var(--shadow);
            position: sticky;
            top: 80px;
            z-index: 100;
        }

        .filter-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.5rem 1.5rem;
            border: 2px solid var(--primary-color);
            background: transparent;
            color: var(--primary-color);
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--primary-color);
            color: var(--white);
        }

        /* Stats Section */
        .stats-section {
            background: var(--bg-light);
            padding: 3rem 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .stat-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
        }

        .stat-card i {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        .stat-card h3 {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .stat-card p {
            color: var(--text-light);
            font-weight: 500;
        }

        /* Doctors Section */
        .doctors-section {
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

        .doctors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .doctor-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
        }

        .doctor-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .doctor-image {
            height: 300px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .doctor-image i {
            font-size: 8rem;
            color: rgba(255, 255, 255, 0.3);
        }

        .doctor-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .availability-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--accent-color);
            color: var(--white);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .availability-badge.busy {
            background: #e53e3e;
        }

        .availability-badge.offline {
            background: var(--text-light);
        }

        .doctor-info {
            padding: 2rem;
        }

        .doctor-info h3 {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .doctor-specialty {
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .doctor-credentials {
            background: var(--bg-light);
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .credential-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
            font-size: 0.9rem;
        }

        .credential-item:last-child {
            margin-bottom: 0;
        }

        .credential-item i {
            color: var(--accent-color);
            font-size: 1rem;
        }

        .doctor-languages {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .language-tag {
            background: var(--primary-color);
            color: var(--white);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
        }

        .doctor-rating {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .stars {
            color: #ffd700;
            font-size: 1.2rem;
        }

        .rating-text {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .doctor-actions {
            display: flex;
            gap: 1rem;
        }

        .doctor-actions .btn {
            flex: 1;
            padding: 0.75rem;
            font-size: 0.9rem;
        }

        /* Doctor Profile Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
        }

        .modal-content {
            background: var(--white);
            margin: 2% auto;
            padding: 0;
            border-radius: 20px;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: var(--white);
            padding: 2rem;
            border-radius: 20px 20px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            margin: 0;
            font-size: 1.8rem;
        }

        .close {
            background: none;
            border: none;
            color: var(--white);
            font-size: 2rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: background 0.3s ease;
        }

        .close:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .modal-body {
            padding: 2rem;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .profile-image {
            text-align: center;
        }

        .profile-image-placeholder {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .profile-image-placeholder i {
            font-size: 6rem;
            color: rgba(255, 255, 255, 0.5);
        }

        .profile-details h4 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .detail-grid {
            display: grid;
            gap: 1rem;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .detail-item i {
            color: var(--accent-color);
            width: 20px;
        }

        .bio-section {
            margin-bottom: 2rem;
        }

        .bio-section h4 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .schedule-section {
            background: var(--bg-light);
            padding: 1.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .schedule-day {
            background: var(--white);
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
        }

        .schedule-day h5 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        /* Featured Doctors */
        .featured-section {
            background: var(--bg-light);
            padding: 5rem 0;
        }

        .featured-doctors {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .featured-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }

        .featured-card:hover {
            transform: translateY(-5px);
        }

        .featured-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .featured-avatar i {
            font-size: 3rem;
            color: rgba(255, 255, 255, 0.7);
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }

            nav{
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

            .doctors-grid {
                grid-template-columns: 1fr;
            }

            .filter-container {
                flex-direction: column;
                gap: 0.5rem;
            }

            .doctor-actions {
                flex-direction: column;
                gap: 0.5rem;
            }

            .profile-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .modal-content {
                margin: 5% 10px;
                max-width: none;
            }
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
                <li><a href="{{ route('register') }}" class="btn" style="background-color: #06923E; color:#fff;">Register</a></li>
            </ul>
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
    </header>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Our Medical Experts</h1>
            <p>Meet our team of highly qualified doctors and healthcare professionals dedicated to providing exceptional medical care with compassion and expertise.</p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-card fade-in">
                    <i class="fas fa-user-md"></i>
                    <h3 id="total-doctors">50</h3>
                    <p>Expert Doctors</p>
                </div>
                <div class="stat-card fade-in">
                    <i class="fas fa-award"></i>
                    <h3>25+</h3>
                    <p>Years Combined Experience</p>
                </div>
                <div class="stat-card fade-in">
                    <i class="fas fa-hospital"></i>
                    <h3>12</h3>
                    <p>Specialized Departments</p>
                </div>
                <div class="stat-card fade-in">
                    <i class="fas fa-star"></i>
                    <h3>4.9</h3>
                    <p>Average Rating</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Doctors -->
    <section class="featured-section">
        <div class="container">
            <div class="section-header">
                <h2>Department Heads</h2>
                <p>Leading specialists heading our various medical departments</p>
            </div>
            <div class="featured-doctors">
                <div class="featured-card fade-in">
                    <div class="featured-avatar">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h3>Dr. Sarah Johnson</h3>
                    <p class="doctor-specialty">Chief of Cardiology</p>
                    <div class="doctor-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-text">5.0 (89 reviews)</span>
                    </div>
                    <p>Leading cardiac surgeon with 20+ years of experience in complex heart procedures.</p>
                </div>
                <div class="featured-card fade-in">
                    <div class="featured-avatar">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h3>Dr. Michael Chen</h3>
                    <p class="doctor-specialty">Head of Neurology</p>
                    <div class="doctor-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-text">4.9 (156 reviews)</span>
                    </div>
                    <p>Renowned neurologist specializing in stroke treatment and neurosurgical procedures.</p>
                </div>
                <div class="featured-card fade-in">
                    <div class="featured-avatar">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h3>Dr. Emily Rodriguez</h3>
                    <p class="doctor-specialty">Chief Pediatrician</p>
                    <div class="doctor-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-text">5.0 (203 reviews)</span>
                    </div>
                    <p>Experienced pediatrician dedicated to providing comprehensive care for children.</p>
                </div>
                <div class="featured-card fade-in">
                    <div class="featured-avatar">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h3>Dr. David Thompson</h3>
                    <p class="doctor-specialty">Orthopedic Surgeon</p>
                    <div class="doctor-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-text">4.8 (134 reviews)</span>
                    </div>
                    <p>Expert in joint replacement and sports medicine with advanced surgical techniques.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- All Doctors Section -->
    <section class="doctors-section">
        <div class="container">
            <div class="section-header">
                <h2>All Our Doctors</h2>
                <p>Browse our complete team of medical professionals</p>
            </div>
            <div class="doctors-grid" id="doctorsGrid">
                <!-- Doctor Card 1 -->
                <div class="doctor-card fade-in" data-specialty="cardiology">
                    <div class="doctor-image">
                        <i class="fas fa-user-md"></i>
                        <div class="availability-badge">Available</div>
                    </div>
                    <div class="doctor-info">
                        <h3>Dr. Sarah Johnson</h3>
                        <div class="doctor-specialty">Cardiologist</div>
                        <div class="doctor-credentials">
                            <div class="credential-item">
                                <i class="fas fa-graduation-cap"></i>
                                <span>MD, Harvard Medical School</span>
                            </div>
                            <div class="credential-item">
                                <i class="fas fa-certificate"></i>
                                <span>Board Certified Cardiologist</span>
                            </div>
                            <div class="credential-item">
                                <i class="fas fa-clock"></i>
                                <span>20+ Years Experience</span>
                            </div>
                        </div>
                        <div class="doctor-languages">
                            <span class="language-tag">English</span>
                            <span class="language-tag">Spanish</span>
                            <span class="language-tag">French</span>
                        </div>
                        <div class="doctor-rating">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="rating-text">5.0 (89 reviews)</span>
                        </div>
                        <div class="doctor-actions">
                            <button class="btn btn-primary" onclick="openDoctorProfile('dr-sarah-johnson')">View Profile</button>
                            <button class="btn btn-accent" onclick="bookAppointment('dr-sarah-johnson')">Book Appointment</button>
                        </div>
                    </div>
                </div>

                <!-- Doctor Card 2 -->
                <div class="doctor-card fade-in" data-specialty="neurology">
                    <div class="doctor-image">
                        <i class="fas fa-user-md"></i>
                        <div class="availability-badge">Available</div>
                    </div>
                    <div class="doctor-info">
                        <h3>Dr. Michael Chen</h3>
                        <div class="doctor-specialty">Neurologist</div>
                        <div class="doctor-credentials">
                            <div class="credential-item">
                                <i class="fas fa-graduation-cap"></i>
                                <span>MD, Johns Hopkins University</span>
                            </div>
                            <div class="credential-item">
                                <i class="fas fa-certificate"></i>
                                <span>Board Certified Neurologist</span>
                            </div>
                            <div class="credential-item">
                                <i class="fas fa-clock"></i>
                                <span>15+ Years Experience</span>
                            </div>
                        </div>
                        <div class="doctor-languages">
                            <span class="language-tag">English</span>
                            <span class="language-tag">Mandarin</span>
                            <span class="language-tag">Korean</span>
                        </div>
                        <div class="doctor-rating">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="rating-text">4.9 (156 reviews)</span>
                        </div>
                       <div class="doctor-actions">
                            <button class="btn btn-primary" onclick="openDoctorProfile('dr-sarah-johnson')">View Profile</button>
                            <button class="btn btn-accent" onclick="bookAppointment('dr-sarah-johnson')">Book Appointment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
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
                    <p>Providing quality healthcare services with compassion and excellence. Your health and well-being
                        are our top priorities.</p>
                    <div style="margin-top: 1rem;">
                        <i class="fab fa-facebook" style="margin-right: 1rem; font-size: 1.2rem;"></i>
                        <i class="fab fa-twitter" style="margin-right: 1rem; font-size: 1.2rem;"></i>
                        <i class="fab fa-instagram" style="margin-right: 1rem; font-size: 1.2rem;"></i>
                        <i class="fab fa-linkedin" style="font-size: 1.2rem;"></i>
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
                    <a href="{{route('services')}}">General Medicine</a>
                    <a href="{{route('services')}}">Emergency Care</a>
                    <a href="{{route('services')}}">Laboratory</a>
                    <a href="{{route('services')}}">Radiology</a>
                    <a href="{{route('services')}}">Surgery</a>
                </div>
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <a href="https://maps.app.goo.gl/oy9c1B77GSjBtyfT7" target="_blank"><p><i class="fas fa-map-marker-alt"></i>1 Obika Street, 3-3 Nkwelle Ezunaka, By Uju Bus-Stop, Oyi 435115, Anambra</p></a>
                    <a href="tel:+2347062491804" target="_blank"><p><i class="fas fa-phone"></i> +2347062491804</p></a>
                    <a href="mailto:" target="_blank"><p><i class="fas fa-envelope"></i> info@medicarehospital.com</p></a>
                    <p><i class="fas fa-clock"></i> 24/7 Emergency Services</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Domi Clinic Hospital. All rights reserved. | Privacy Policy | Terms of Service</p>
            </div>
        </div>
    </footer>
     <script>
        // Global variables
        let currentUser = null;
        const API_BASE_URL = '/api'; // Change this to your Laravel API base URL

        // DOM Content Loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize animations
            initializeAnimations();
            // Initialize statistics counter
            initializeCounters();
            // Set minimum date for appointments
            setMinimumDate();
            // Check if user is logged in
            checkAuthStatus();
        });

        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        }

        // Modal Functions
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
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
            const counters = [
                { id: 'patients-count', target: 15000, suffix: '+' },
                { id: 'doctors-count', target: 50, suffix: '+' },
                { id: 'experience-count', target: 25, suffix: '+' },
                { id: 'awards-count', target: 30, suffix: '+' }
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

        // Set minimum date for appointment booking
        function setMinimumDate() {
            const today = new Date();
            const tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 1);

            const appointmentDate = document.getElementById('appointmentDate');
            if (appointmentDate) {
                appointmentDate.min = tomorrow.toISOString().split('T')[0];
            }
        }

        // Form Validation
        function validateForm(formId) {
            const form = document.getElementById(formId);
            const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.style.borderColor = '#e53e3e';
                    isValid = false;
                } else {
                    input.style.borderColor = '#e2e8f0';
                }
            });

            // Password confirmation check for registration
            if (formId === 'registrationForm') {
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirmPassword').value;

                if (password !== confirmPassword) {
                    document.getElementById('confirmPassword').style.borderColor = '#e53e3e';
                    showNotification('Passwords do not match!', 'error');
                    isValid = false;
                }
            }

            return isValid;
        }

        // Login Form Handler
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            if (!validateForm('loginForm')) {
                showNotification('Please fill all required fields!', 'error');
                return;
            }

            const submitBtn = this.querySelector('button[type="submit"]');
            const btnText = submitBtn.querySelector('.btn-text');
            const loading = submitBtn.querySelector('.loading');

            // Show loading state
            btnText.style.display = 'none';
            loading.style.display = 'inline-block';
            submitBtn.disabled = true;

            try {
                const formData = new FormData(this);
                const data = Object.fromEntries(formData);

                // Simulate API call (replace with actual Laravel API endpoint)
                const response = await simulateApiCall('/auth/login', data);

                if (response.success) {
                    currentUser = response.user;
                    localStorage.setItem('authToken', response.token);
                    localStorage.setItem('currentUser', JSON.stringify(response.user));

                    showNotification('Login successful!', 'success');
                    closeModal('loginModal');
                    updateAuthUI();
                } else {
                    showNotification(response.message || 'Login failed!', 'error');
                }
            } catch (error) {
                console.error('Login error:', error);
                showNotification('Login failed. Please try again.', 'error');
            } finally {
                // Hide loading state
                btnText.style.display = 'inline';
                loading.style.display = 'none';
                submitBtn.disabled = false;
            }
        });

        // Registration Form Handler
        document.getElementById('registrationForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            if (!validateForm('registrationForm')) {
                showNotification('Please fill all required fields!', 'error');
                return;
            }

            const submitBtn = this.querySelector('button[type="submit"]');
            const btnText = submitBtn.querySelector('.btn-text');
            const loading = submitBtn.querySelector('.loading');

            // Show loading state
            btnText.style.display = 'none';
            loading.style.display = 'inline-block';
            submitBtn.disabled = true;

            try {
                const formData = new FormData(this);
                const data = Object.fromEntries(formData);

                // Simulate API call (replace with actual Laravel API endpoint)
                const response = await simulateApiCall('/auth/register', data);

                if (response.success) {
                    currentUser = response.user;
                    localStorage.setItem('authToken', response.token);
                    localStorage.setItem('currentUser', JSON.stringify(response.user));

                    showNotification('Registration successful!', 'success');
                    closeModal('registerModal');
                    updateAuthUI();

                    // Show patient card
                    showPatientCard(response.user);
                } else {
                    showNotification(response.message || 'Registration failed!', 'error');
                }
            } catch (error) {
                console.error('Registration error:', error);
                showNotification('Registration failed. Please try again.', 'error');
            } finally {
                // Hide loading state
                btnText.style.display = 'inline';
                loading.style.display = 'none';
                submitBtn.disabled = false;
            }
        });

        // Appointment Form Handler
        document.getElementById('appointmentForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            if (!validateForm('appointmentForm')) {
                showNotification('Please fill all required fields!', 'error');
                return;
            }

            const submitBtn = this.querySelector('button[type="submit"]');
            const btnText = submitBtn.querySelector('.btn-text');
            const loading = submitBtn.querySelector('.loading');

            // Show loading state
            btnText.style.display = 'none';
            loading.style.display = 'inline-block';
            submitBtn.disabled = true;

            try {
                const formData = new FormData(this);
                const data = Object.fromEntries(formData);

                // Simulate API call (replace with actual Laravel API endpoint)
                const response = await simulateApiCall('/appointments', data);

                if (response.success) {
                    showNotification('Appointment booked successfully!', 'success');
                    closeModal('appointmentModal');
                    this.reset();
                } else {
                    showNotification(response.message || 'Failed to book appointment!', 'error');
                }
            } catch (error) {
                console.error('Appointment booking error:', error);
                showNotification('Failed to book appointment. Please try again.', 'error');
            } finally {
                // Hide loading state
                btnText.style.display = 'inline';
                loading.style.display = 'none';
                submitBtn.disabled = false;
            }
        });

        // Show Patient Card
        function showPatientCard(userData) {
            // Generate patient ID
            const patientId = 'MED' + Date.now().toString().slice(-6);

            // Populate card data
            document.getElementById('cardPatientId').textContent = patientId;
            document.getElementById('cardFullName').textContent = `${userData.firstName} ${userData.lastName}`;
            document.getElementById('cardDOB').textContent = formatDate(userData.dateOfBirth);
            document.getElementById('cardBloodGroup').textContent = userData.bloodGroup || 'Not specified';
            document.getElementById('cardPhone').textContent = userData.phone;
            document.getElementById('cardRegDate').textContent = formatDate(new Date().toISOString().split('T')[0]);

            // Show card modal
            openModal('cardModal');
        }

        // Print Card Function
        function printCard() {
            window.print();
        }

        // Download Card as PDF (simplified version)
        function downloadCard() {
            // This would typically use a library like jsPDF
            showNotification('PDF download feature will be implemented with jsPDF library', 'info');
        }

        // Utility Functions
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: '2-digit'
            });
        }

        // Notification System
        function showNotification(message, type = 'info') {
            // Remove existing notifications
            const existingNotification = document.querySelector('.notification');
            if (existingNotification) {
                existingNotification.remove();
            }

            // Create notification element
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'success' ? '#48bb78' : type === 'error' ? '#e53e3e' : '#3182ce'};
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                z-index: 3000;
                max-width: 400px;
                animation: slideIn 0.3s ease-out;
            `;
            notification.textContent = message;

            // Add to body
            document.body.appendChild(notification);

            // Auto remove after 5 seconds
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.style.animation = 'slideOut 0.3s ease-in';
                    setTimeout(() => {
                        if (notification.parentNode) {
                            notification.remove();
                        }
                    }, 300);
                }
            }, 5000);
        }

        // Add CSS for notifications
        const notificationStyles = document.createElement('style');
        notificationStyles.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }

            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(notificationStyles);

        // Simulate API calls (replace with actual Laravel API calls)
        async function simulateApiCall(endpoint, data) {
            // Simulate network delay
            await new Promise(resolve => setTimeout(resolve, 1000));

            // Mock responses
            if (endpoint === '/auth/register') {
                return {
                    success: true,
                    message: 'Registration successful',
                    user: {
                        id: Date.now(),
                        firstName: data.firstName,
                        lastName: data.lastName,
                        email: data.email,
                        phone: data.phone,
                        dateOfBirth: data.dateOfBirth,
                        bloodGroup: data.bloodGroup,
                        address: data.address,
                        gender: data.gender
                    },
                    token: 'mock-jwt-token-' + Date.now()
                };
            }

            if (endpoint === '/auth/login') {
                return {
                    success: true,
                    message: 'Login successful',
                    user: {
                        id: 1,
                        firstName: 'John',
                        lastName: 'Doe',
                        email: data.loginEmail,
                        phone: '+234 123 456 7890',
                        dateOfBirth: '1990-01-01',
                        bloodGroup: 'O+',
                        address: '123 Main Street'
                    },
                    token: 'mock-jwt-token-login'
                };
            }

            if (endpoint === '/appointments') {
                return {
                    success: true,
                    message: 'Appointment booked successfully',
                    appointment: {
                        id: Date.now(),
                        ...data,
                        status: 'confirmed'
                    }
                };
            }

            return { success: false, message: 'Unknown endpoint' };
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

        // Update authentication UI
        function updateAuthUI() {
            const navLinks = document.querySelector('.nav-links');

            if (currentUser) {
                // Replace login/register with user menu
                const loginLink = navLinks.querySelector('a[onclick*="loginModal"]');
                const registerBtn = navLinks.querySelector('a[onclick*="registerModal"]');

                if (loginLink) loginLink.style.display = 'none';
                if (registerBtn) registerBtn.style.display = 'none';

                // Add user menu (simplified)
                const userMenu = document.createElement('li');
                userMenu.innerHTML = `
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <span>Welcome, ${currentUser.firstName}!</span>
                        <a href="#" onclick="logout()" class="btn btn-outline" style="padding: 0.5rem 1rem;">Logout</a>
                    </div>
                `;
                navLinks.appendChild(userMenu);
            }
        }

        // Logout function
        function logout() {
            localStorage.removeItem('authToken');
            localStorage.removeItem('currentUser');
            currentUser = null;
            location.reload();
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Form input focus effects
        document.querySelectorAll('.form-group input, .form-group select, .form-group textarea').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
                this.style.borderColor = 'var(--primary-color)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
                if (!this.value) {
                    this.style.borderColor = '#e2e8f0';
                }
            });
        });

        // Real-time form validation
        document.getElementById('confirmPassword')?.addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;

            if (confirmPassword && password !== confirmPassword) {
                this.style.borderColor = '#e53e3e';
            } else {
                this.style.borderColor = '#e2e8f0';
            }
        });

        // Add loading states to buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function() {
                if (this.type === 'submit') {
                    this.style.transform = 'scale(0.98)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 150);
                }
            });
        });
    </script>
</body>

</html>
