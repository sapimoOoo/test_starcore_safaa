<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk App - Tiket Bantuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                        'bounce-slow': 'bounce 2s infinite',
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen">
    <!-- Floating Shapes Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-white opacity-5 rounded-full animate-float"></div>
        <div class="absolute top-3/4 right-1/4 w-24 h-24 bg-white opacity-10 rounded-full animate-float" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-3/4 w-16 h-16 bg-white opacity-5 rounded-full animate-float" style="animation-delay: 4s;"></div>
    </div>

    <!-- Header -->
    <header class="relative z-10 glass-effect shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-white">Helpdesk App</h1>
                </div>
                <nav class="flex items-center space-x-6">
                    <a href="#features" class="text-white hover:text-blue-200 transition-colors duration-300">Fitur</a>
                    <a href="#about" class="text-white hover:text-blue-200 transition-colors duration-300">Tentang</a>
                    <a href="{{ route('login') }}" class="bg-white text-blue-600 px-6 py-2 rounded-full font-semibold hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl">
                        Login
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="relative z-10 container mx-auto px-6 py-20">
        <div class="text-center max-w-4xl mx-auto">
            <!-- Hero Title -->
            <div class="mb-8">
                <h2 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    Sistem Tiket
                    <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent animate-pulse-slow">
                        Bantuan
                    </span>
                </h2>
                <p class="text-xl md:text-2xl text-blue-100 mb-8 leading-relaxed">
                    Laporkan masalah teknis, pantau status tiket, dan dapatkan bantuan dengan cepat dan efisien
                </p>
            </div>

            <!-- CTA Button -->
            <div class="mb-16">
                <a href="{{ route('tickets.create') }}" class="inline-block bg-gradient-to-r from-orange-500 to-pink-500 hover:from-orange-600 hover:to-pink-600 text-white font-bold py-4 px-8 rounded-full text-lg shadow-2xl hover:shadow-3xl transform hover:scale-105 transition-all duration-300 animate-bounce-slow">
                    <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Buat Tiket Sekarang
                </a>
            </div>

            <!-- Feature Cards -->
            <div id="features" class="grid md:grid-cols-3 gap-8 mb-20">
                <div class="glass-effect rounded-2xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">Respon Cepat</h3>
                    <p class="text-blue-100">Tim support kami siap membantu Anda 24/7 dengan respon yang cepat dan solusi yang tepat.</p>
                </div>

                <div class="glass-effect rounded-2xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-500 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">Tracking Real-time</h3>
                    <p class="text-blue-100">Pantau progress tiket Anda secara real-time dengan update status yang akurat dan transparan.</p>
                </div>

                <div class="glass-effect rounded-2xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-rose-500 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">Keamanan Terjamin</h3>
                    <p class="text-blue-100">Data dan informasi Anda terlindungi dengan sistem keamanan berlapis dan enkripsi tingkat tinggi.</p>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="glass-effect rounded-2xl p-8 mb-16">
                <div class="grid md:grid-cols-3 gap-8 text-center">
                    <div>
                        <div class="text-4xl font-bold text-white mb-2">5000+</div>
                        <div class="text-blue-100">Tiket Diselesaikan</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-white mb-2">98%</div>
                        <div class="text-blue-100">Tingkat Kepuasan</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-white mb-2">< 2 Jam</div>
                        <div class="text-blue-100">Rata-rata Respon</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer id="about" class="relative z-10 glass-effect mt-20">
        <div class="container mx-auto px-6 py-8">
            <div class="text-center">
                <div class="flex justify-center items-center mb-4">
                    <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <span class="text-white font-semibold">Helpdesk App</span>
                </div>
                <p class="text-blue-100 text-sm mb-4">
                    Solusi terpercaya untuk kebutuhan bantuan teknis Anda
                </p>
                <div class="text-blue-200 text-sm">
                    &copy; {{ date('Y') }} Helpdesk App. All rights reserved.
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for smooth scrolling -->
    <script>
        // Smooth scrolling for navigation links
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

        // Add floating animation on scroll
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const shapes = document.querySelectorAll('.absolute');
            shapes.forEach((shape, index) => {
                const speed = (index + 1) * 0.5;
                shape.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });
    </script>
</body>
</html>