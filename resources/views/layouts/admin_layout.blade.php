<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin_dashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('admin_dashboard/assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin_dashboard/assets/libs/css/style.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin_dashboard/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_dashboard/assets/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_dashboard/assets/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin_dashboard/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_dashboard/assets/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_dashboard/assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <link rel="icon" href="{{ asset('hospital_website/img/domi.png') }}" type="image/x-icon">
    <title>Admin Dashboard - Domi Clinic</title>
    <style>
        :root {
            --primary-color: #2c5282;
            --secondary-color: #3182ce;
            --accent-color: #00d4aa;
            --text-dark: #2d3748;
            --text-light: #718096;
            --bg-light: #f7fafc;
            --white: #ffffff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.15);
            --success-color: #48bb78;
            --warning-color: #ed8936;
            --error-color: #e53e3e;
            --info-color: #4299e1;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: var(--bg-light);
            width: 100%;
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
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">
                    <div class="logo">
                        <a href=""
                            style="display: flex; flex-direction: row; align-items: center; gap: 0.3rem; text-decoration: none; margin-top:-1rem;">
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
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation" style="background-color:#2d3748;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        {{-- <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li> --}}
                        {{-- <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="assets/images/avatar-2.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name">Jeremy
                                                            Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="assets/images/avatar-3.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name">John Abraham </span>is
                                                        now following you
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="assets/images/avatar-4.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name">Monaan Pechi</span> is
                                                        watching your main repository
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img
                                                            src="assets/images/avatar-5.jpg" alt=""
                                                            class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name">Jessica
                                                            Caruso</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="assets/images/avatar-1.jpg" alt=""
                                    class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    @auth
                                       <h5 class="mb-0 text-white nav-user-name">{{auth()->user()->name}}</h5>
                                    @endauth

                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                        class="fas fa-power-off mr-2"></i>Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light mt-3">
                    <a class="d-xl-none d-lg-none" href="{{route('dashboards')}}">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse mt-4" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{route('dashboards')}}" ><i class="fa fa-fw fa-home"></i>Dashboard <span
                                        class="badge badge-success">6</span></a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-1" aria-controls="submenu-9"><i
                                        class="fa fa-fw fa-user-circle"></i>Users</a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('patients')}}">Manage Users</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-2" aria-controls="submenu-9"><i class="fa fa-fw fa-book"></i>Appointment</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('manage_appointments')}}">Management Appointment</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-3" aria-controls="submenu-9"><i class="fas fa-id-card"></i>Health Cards</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('health_cards')}}">Managing Health Cards</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-4" aria-controls="submenu-9"><i class="fas fa-user-md"></i>Doctor</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('add_doctor')}}">Add Doctor</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('manage_doctors')}}">Manage Doctor</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-5" aria-controls="submenu-9"><i class="fa fa-fw fa-book"></i>Contact Information</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('contact_information')}}">Manage Contact Us Information</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                    data-target="#submenu-6" aria-controls="submenu-9"><i class="fas fa-notes-medical"></i>Hospital Highlights</a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('years')}}">Update and Manage Hospital Years of Experience</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('award')}}">Update and Manage Hospital Award</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('department')}}">Update and Manage Specialized Department</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('served')}}">Update and Manage Patient Served</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    @yield('content')
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Built @ 2025 <a href="https://ogcollins.com">ogcollins</a>. All rights reserved. Dashboard
                            by <a href="https://solotech-ai-ltd.com">SoloTech.AI LTD</a>.
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('admin_dashboard/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('admin_dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('admin_dashboard/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('admin_dashboard/assets/libs/js/main-js.js') }}"></script>
    <!-- chart chartist js -->
    <script src="{{ asset('admin_dashboard/assets/vendor/charts/chartist-bundle/chartist.min.js') }}"></script>
    <!-- sparkline js -->
    <script src="{{ asset('admin_dashboard/assets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
    <!-- morris js -->
    <script src="{{ asset('admin_dashboard/assets/vendor/charts/morris-bundle/raphael.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/vendor/charts/morris-bundle/morris.js') }}"></script>
    <!-- chart c3 js -->
    <script src="{{ asset('admin_dashboard/assets/vendor/charts/c3charts/c3.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/vendor/charts/c3charts/C3chartjs.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/libs/js/dashboard-ecommerce.js') }}"></script>
</body>

</html>
