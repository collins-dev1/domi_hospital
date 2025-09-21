<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Hospital - Quality Healthcare Services</title>
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
            --accent-color: #00d4aa;
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

        .nav-links a:hover {
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

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: var(--white);
            padding: 120px 0 80px;
            margin-top: 80px;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .hero-text h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-text p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .hero-image {
            text-align: center;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
        }

        /* Quick Actions */
        .quick-actions {
            background: var(--white);
            padding: 3rem 0;
            margin-top: -40px;
            position: relative;
            z-index: 2;
        }

        .quick-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .quick-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow-lg);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .quick-card:hover {
            transform: translateY(-5px);
        }

        .quick-card i {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        .quick-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        /* Services Section */
        .services {
            padding: 5rem 0;
            background: var(--bg-light);
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

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .service-card i {
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        .service-card h3 {
            font-size: 1.3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        /* Statistics */
        .stats {
            background: var(--primary-color);
            color: var(--white);
            padding: 4rem 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .stat-item h3 {
            font-size: 3rem;
            font-weight: 700;
            color: var(--accent-color);
            margin-bottom: 0.5rem;
        }

        .stat-item p {
            font-size: 1.1rem;
            opacity: 0.9;
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

        /* Modal Styles */
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
            margin: 5% auto;
            padding: 0;
            border-radius: 15px;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            background: var(--primary-color);
            color: var(--white);
            padding: 1.5rem;
            border-radius: 15px 15px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            margin: 0;
        }

        .close {
            background: none;
            border: none;
            color: var(--white);
            font-size: 1.5rem;
            cursor: pointer;
        }

        .modal-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        /* Patient Card */
        .patient-card {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: var(--white);
            padding: 2rem;
            border-radius: 15px;
            margin-top: 2rem;
            box-shadow: var(--shadow-lg);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .info-item {
            margin-bottom: 0.5rem;
        }

        .info-label {
            font-weight: 600;
            opacity: 0.8;
            font-size: 0.9rem;
        }

        .info-value {
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
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

            .hero-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .hero-text h1 {
                font-size: 2rem;
            }

            .hero-buttons {
                justify-content: center;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .card-info {
                grid-template-columns: 1fr;
            }

            .modal-content {
                margin: 10% 10px;
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

        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Print Styles */
        @media print {
            .patient-card {
                background: var(--white) !important;
                color: var(--text-dark) !important;
                border: 2px solid var(--primary-color);
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav container">
            <div class="logo">
                <a href="{{ url('/') }}"
                    style="display: flex; flex-direction: row; align-items: center; gap: 0.3rem; text-decoration: none;">
                    <img src="{{ asset('hospital_website/img/domilogo.png') }}" alt="" width="70"
                        height="70">
                    <div>
                        <span>DOMI CLINIC</span>
                        <p style="font-size:0.5rem">....Bringing health to your doorsteps</p>
                    </div>
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact_us') }}">Contact</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}" class="btn btn-primary">Register</a></li>
            </ul>
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Your Health, Our Priority</h1>
                    <p>Experience world-class healthcare services with compassionate care. Register today and get your
                        digital health card for seamless medical services.</p>
                    <div class="hero-buttons">
                        <a href="#" class="btn btn-accent" onclick="openModal('registerModal')">Get Health
                            Card</a>
                        <a href="{{ route('services') }}" class="btn btn-outline">Our Services</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Hospital" />
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Actions -->
    <section class="quick-actions">
        <div class="container">
            <div class="quick-cards">
                <div class="quick-card fade-in">
                    <i class="fas fa-user-plus"></i>
                    <h3>Patient Registration</h3>
                    <p>Quick and easy patient registration with instant digital health card generation.</p>
                    <a href="#" class="btn btn-primary" onclick="openModal('registerModal')">Register Now</a>
                </div>
                <div class="quick-card fade-in">
                    <i class="fas fa-calendar-check"></i>
                    <h3>Book Appointment</h3>
                    <p>Schedule your appointment with our specialists at your convenient time.</p>
                    <a href="#" class="btn btn-primary" onclick="openModal('appointmentModal')">Book Now</a>
                </div>
                <div class="quick-card fade-in">
                    <i class="fas fa-ambulance"></i>
                    <h3>Emergency Care</h3>
                    <p>24/7 emergency services with immediate medical attention and care.</p>
                    <a href="tel:+234911" class="btn btn-primary">Call 911</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <div class="section-header">
                <h2>Our Medical Services</h2>
                <p>Comprehensive healthcare services delivered by experienced medical professionals with
                    state-of-the-art equipment.</p>
            </div>
            <div class="services-grid">
                <div class="service-card fade-in">
                    <i class="fas fa-stethoscope"></i>
                    <h3>General Medicine</h3>
                    <p>Complete medical care for adults including preventive care, diagnosis, and treatment of various
                        medical conditions.</p>
                </div>
                <div class="service-card fade-in">
                    <i class="fas fa-heartbeat"></i>
                    <h3>Cardiology</h3>
                    <p>Specialized heart care including diagnostic tests, treatments, and surgical procedures for
                        cardiac conditions.</p>
                </div>
                <div class="service-card fade-in">
                    <i class="fas fa-brain"></i>
                    <h3>Neurology</h3>
                    <p>Expert neurological care for disorders of the brain, spinal cord, and nervous system.</p>
                </div>
                <div class="service-card fade-in">
                    <i class="fas fa-baby"></i>
                    <h3>Pediatrics</h3>
                    <p>Comprehensive healthcare services for infants, children, and adolescents with specialized
                        pediatric care.</p>
                </div>
                <div class="service-card fade-in">
                    <i class="fas fa-x-ray"></i>
                    <h3>Radiology</h3>
                    <p>Advanced imaging services including X-rays, CT scans, MRI, and ultrasound for accurate diagnosis.
                    </p>
                </div>
                <div class="service-card fade-in">
                    <i class="fas fa-flask"></i>
                    <h3>Laboratory</h3>
                    <p>Complete laboratory services with accurate and timely test results for diagnostic purposes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <h3 id="patients-count">0</h3>
                    <p>Patients Served</p>
                </div>
                <div class="stat-item">
                    <h3 id="doctors-count">0</h3>
                    <p>Expert Doctors</p>
                </div>
                <div class="stat-item">
                    <h3 id="experience-count">0</h3>
                    <p>Years Experience</p>
                </div>
                <div class="stat-item">
                    <h3 id="awards-count">0</h3>
                    <p>Awards Won</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>MediCare Hospital</h3>
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
                    <a href="#home">Home</a>
                    <a href="#services">Services</a>
                    <a href="#about">About Us</a>
                    <a href="#contact">Contact</a>
                    <a href="#" onclick="openModal('registerModal')">Patient Registration</a>
                </div>
                <div class="footer-section">
                    <h3>Services</h3>
                    <a href="#">General Medicine</a>
                    <a href="#">Emergency Care</a>
                    <a href="#">Laboratory</a>
                    <a href="#">Radiology</a>
                    <a href="#">Surgery</a>
                </div>
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Healthcare Street, Medical City</p>
                    <p><i class="fas fa-phone"></i> +234 (0) 123 456 7890</p>
                    <p><i class="fas fa-envelope"></i> info@medicarehospital.com</p>
                    <p><i class="fas fa-clock"></i> 24/7 Emergency Services</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 MediCare Hospital. All rights reserved. | Privacy Policy | Terms of Service</p>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div class="modal" id="loginModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Patient Login</h3>
                <button class="close" onclick="closeModal('loginModal')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="form-group">
                        <label for="loginEmail">Email or Patient ID</label>
                        <input type="text" id="loginEmail" name="loginEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" id="loginPassword" name="loginPassword" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            <span class="btn-text">Login</span>
                            <span class="loading" style="display: none;"></span>
                        </button>
                    </div>
                    <p style="text-align: center; margin-top: 1rem;">
                        Don't have an account? <a href="#"
                            onclick="closeModal('loginModal'); openModal('registerModal');"
                            style="color: var(--primary-color);">Register here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- Registration Modal -->
    <div class="modal" id="registerModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Patient Registration</h3>
                <button class="close" onclick="closeModal('registerModal')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="registrationForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name *</label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name *</label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="dateOfBirth">Date of Birth *</label>
                            <input type="date" id="dateOfBirth" name="dateOfBirth" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="gender">Gender *</label>
                            <select id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bloodGroup">Blood Group</label>
                            <select id="bloodGroup" name="bloodGroup">
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address *</label>
                        <textarea id="address" name="address" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="emergencyContact">Emergency Contact Name</label>
                        <input type="text" id="emergencyContact" name="emergencyContact">
                    </div>
                    <div class="form-group">
                        <label for="emergencyPhone">Emergency Contact Phone</label>
                        <input type="tel" id="emergencyPhone" name="emergencyPhone">
                    </div>
                    <div class="form-group">
                        <label for="medicalHistory">Medical History / Allergies</label>
                        <textarea id="medicalHistory" name="medicalHistory" rows="3"
                            placeholder="Please mention any known allergies or medical conditions"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" id="password" name="password" required minlength="6">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password *</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-accent" style="width: 100%;">
                            <span class="btn-text">Register & Get Health Card</span>
                            <span class="loading" style="display: none;"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Appointment Modal -->
    <div class="modal" id="appointmentModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Book Appointment</h3>
                <button class="close" onclick="closeModal('appointmentModal')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="appointmentForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="patientName">Patient Name *</label>
                            <input type="text" id="patientName" name="patientName" required>
                        </div>
                        <div class="form-group">
                            <label for="patientPhone">Phone Number *</label>
                            <input type="tel" id="patientPhone" name="patientPhone" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="department">Department *</label>
                        <select id="department" name="department" required>
                            <option value="">Select Department</option>
                            <option value="general">General Medicine</option>
                            <option value="cardiology">Cardiology</option>
                            <option value="neurology">Neurology</option>
                            <option value="pediatrics">Pediatrics</option>
                            <option value="orthopedics">Orthopedics</option>
                            <option value="dermatology">Dermatology</option>
                            <option value="gynecology">Gynecology</option>
                            <option value="ophthalmology">Ophthalmology</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="appointmentDate">Preferred Date *</label>
                            <input type="date" id="appointmentDate" name="appointmentDate" required>
                        </div>
                        <div class="form-group">
                            <label for="appointmentTime">Preferred Time *</label>
                            <select id="appointmentTime" name="appointmentTime" required>
                                <option value="">Select Time</option>
                                <option value="09:00">09:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="14:00">02:00 PM</option>
                                <option value="15:00">03:00 PM</option>
                                <option value="16:00">04:00 PM</option>
                                <option value="17:00">05:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reason">Reason for Visit</label>
                        <textarea id="reason" name="reason" rows="3"
                            placeholder="Brief description of your symptoms or reason for visit"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            <span class="btn-text">Book Appointment</span>
                            <span class="loading" style="display: none;"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Patient Card Modal -->
    <div class="modal" id="cardModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Your Digital Health Card</h3>
                <button class="close" onclick="closeModal('cardModal')">&times;</button>
            </div>
            <div class="modal-body">
                <div class="patient-card" id="patientCard">
                    <div class="card-header">
                        <div>
                            <h3>MediCare Hospital</h3>
                            <p style="opacity: 0.8; margin: 0;">Digital Health Card</p>
                        </div>
                        <div style="text-align: right;">
                            <i class="fas fa-heartbeat" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                    <div class="card-info">
                        <div>
                            <div class="info-item">
                                <div class="info-label">Patient ID</div>
                                <div class="info-value" id="cardPatientId">--</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Full Name</div>
                                <div class="info-value" id="cardFullName">--</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Date of Birth</div>
                                <div class="info-value" id="cardDOB">--</div>
                            </div>
                        </div>
                        <div>
                            <div class="info-item">
                                <div class="info-label">Blood Group</div>
                                <div class="info-value" id="cardBloodGroup">--</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Phone</div>
                                <div class="info-value" id="cardPhone">--</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Registration Date</div>
                                <div class="info-value" id="cardRegDate">--</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="text-align: center; margin-top: 2rem;" class="no-print">
                    <button class="btn btn-primary" onclick="printCard()" style="margin-right: 1rem;">
                        <i class="fas fa-print"></i> Print Card
                    </button>
                    <button class="btn btn-accent" onclick="downloadCard()">
                        <i class="fas fa-download"></i> Download PDF
                    </button>
                </div>
            </div>
        </div>
    </div>

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

            return {
                success: false,
                message: 'Unknown endpoint'
            };
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
            anchor.addEventListener('click', function(e) {
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
