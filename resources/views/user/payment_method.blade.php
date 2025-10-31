@extends('layouts.user_layout')

@section('content')
    <!-- Payment Methods Section -->
    <section class="payment-section">
        <div class="container">
            <div class="section-header" style="display: flex; flex-direction:column; margin-top:-3rem;">
                <h2>How to Pay</h2>
                <p>We accept various payment methods to make your healthcare experience seamless and convenient and chat us
                    on whatsapp</p>
            </div>

            <!-- WhatsApp Chat Section -->
            @auth
                <section class="whatsapp-section">
                    <div class="container">
                        <div class="whatsapp-container">
                            <div class="whatsapp-card fade-in">
                                <i class="fab fa-whatsapp whatsapp-icon"></i>
                                <h2>Need Payment Assistance?</h2>
                                <p>Chat with us on WhatsApp for payment support, confirmation, or any billing inquiries. Our
                                    team is ready to help you!</p>
                                <a href="https://wa.me/2347062491804?text=Hello%20Domi%20Clinic,%20I%20need%20help%20with%20payment!!!%20my%20registration%20name%20is%20{{ auth()->user()->name }}%20and%20registration%20email%20address%20is%20{{ auth()->user()->email }}%20Thanks!!!"
                                    target="_blank" class="whatsapp-btn">
                                    <i class="fab fa-whatsapp"></i>
                                    Chat us
                                </a>
                                <p style="margin-top: 1.5rem; font-size: 0.95rem;">Available: 24/7 • Response time: Within
                                    minutes</p>
                            </div>
                        </div>
                    </div>
                </section>
            @endauth

            <div class="payment-grid">
                <!-- Cash Payment -->
                <div class="payment-card fade-in">
                    <div class="payment-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3>Cash Payment</h3>
                    <p>Pay directly at our hospital reception or cashier's desk</p>
                    <div class="payment-details">
                        <p><strong>Where:</strong> Hospital Reception</p>
                        <p><strong>When:</strong> During consultation or before discharge</p>
                        <p><strong>Note:</strong> Cash payments accepted 24/7</p>
                    </div>
                    <p><i class="fas fa-check-circle" style="color: var(--accent-color);"></i> Instant confirmation</p>
                </div>

                <!-- Bank Transfer -->
                <div class="payment-card fade-in">
                    <div class="payment-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <h3>Bank Transfer</h3>
                    <p>Transfer directly to our hospital bank account</p>
                    <div class="payment-details">
                        <p><strong>Bank:</strong> UBA</p>
                        <p><strong>Account Name:</strong> Domi Diagnostic Clinic Hospital</p>
                        <p><strong>Account Number:</strong> 1022779819</p>
                        <p><strong>Note:</strong> Send proof to WhatsApp after payment</p>
                    </div>
                    <p><i class="fas fa-check-circle" style="color: var(--accent-color);"></i> Secure & tracked</p>
                </div>

                <!-- Insurance -->
                <div class="payment-card fade-in">
                    <div class="payment-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Health Insurance</h3>
                    <p>We accept various health insurance providers</p>
                    <div class="payment-details">
                        <p><strong>Accepted:</strong> NHIS, HMOs, Private Insurance</p>
                        <p><strong>Process:</strong> Present insurance card</p>
                        <p><strong>Note:</strong> Subject to policy coverage</p>
                        <p><strong>Contact:</strong> Verify coverage first</p>
                    </div>
                    <p><i class="fas fa-check-circle" style="color: var(--accent-color);"></i> Cashless treatment</p>
                </div>
            </div>
        </div>
    </section>



    <style>
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

        /* Payment Methods Section */
        .payment-section {
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

        .payment-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .payment-card {
            background: var(--white);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .payment-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--accent-color), var(--primary-color));
        }

        .payment-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .payment-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--accent-color), #00b894);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--white);
        }

        .payment-card h3 {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .payment-card p {
            color: var(--text-light);
            margin-bottom: 1.5rem;
        }

        .payment-details {
            background: var(--bg-light);
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .payment-details p {
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .payment-details strong {
            color: var(--primary-color);
        }

        /* WhatsApp Chat Button */
        .whatsapp-section {
            background: var(--white);
            padding: 4rem 0;
            margin-bottom: 6rem;
        }

        .whatsapp-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .whatsapp-card {
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: var(--white);
            padding: 3rem;
            border-radius: 25px;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        .whatsapp-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .whatsapp-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            animation: pulse 2s infinite;
        }

        .whatsapp-card h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }

        .whatsapp-card p {
            font-size: 1.1rem;
            opacity: 0.95;
            margin-bottom: 2rem;
            position: relative;
            z-index: 2;
        }

        .whatsapp-btn {
            background: var(--white);
            color: #25D366;
            padding: 1rem 3rem;
            font-size: 1.2rem;
            border-radius: 50px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 2;
        }

        .whatsapp-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .whatsapp-btn i {
            font-size: 1.5rem;
        }

        /* Floating WhatsApp Button */
        .floating-whatsapp {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--white);
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.5);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease;
            animation: bounce 2s infinite;
        }

        .floating-whatsapp:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.7);
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

            .payment-grid {
                grid-template-columns: 1fr;
            }

            .whatsapp-card {
                padding: 2rem;
            }

            .whatsapp-icon {
                font-size: 3.5rem;
            }

            .floating-whatsapp {
                width: 55px;
                height: 55px;
                font-size: 1.8rem;
                bottom: 20px;
                right: 20px;
            }
        }
    </style>

    <script>
        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        }

        // Animation on scroll
        document.addEventListener('DOMContentLoaded', function() {
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
        });

        // Smooth scroll for anchor links
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
    </script>
@endsection
