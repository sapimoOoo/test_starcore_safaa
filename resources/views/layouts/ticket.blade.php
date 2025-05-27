<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tiket Baru - Helpdesk App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-out',
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .input-focus:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .status-badge {
            background: linear-gradient(135deg, #10b981, #059669);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen">
    <!-- Background Pattern -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-1/4 w-32 h-32 bg-white opacity-5 rounded-full"></div>
        <div class="absolute top-1/3 right-1/4 w-24 h-24 bg-white opacity-10 rounded-full"></div>
        <div class="absolute bottom-1/4 left-1/3 w-16 h-16 bg-white opacity-5 rounded-full"></div>
    </div>

    <!-- Header -->
    <header class="relative z-10 glass-effect shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Helpdesk App</h1>
                </div>
                <nav class="flex items-center space-x-4">
                    <a href="/" class="text-gray-600 hover:text-blue-600 transition-colors duration-300">Beranda</a>
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition-all duration-300">
                        Login
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative z-10 container mx-auto px-6 py-12">
        <div class="max-w-4xl mx-auto">
            <!-- Page Title -->
            <div class="text-center mb-12 animate-fade-in">
                <h2 class="text-4xl font-bold text-white mb-4">Buat Tiket Baru</h2>
                <p class="text-xl text-blue-100">Laporkan masalah atau permintaan bantuan Anda</p>
            </div>

            <!-- Form Container -->
            <div class="glass-effect rounded-2xl shadow-2xl p-8 animate-slide-up">
                <form action="{{ route('tickets.store') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <!-- Personal Information Section -->
                    <div class="border-b border-gray-200 pb-8">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Informasi Pribadi
                        </h3>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Full Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-300 input-focus"
                                    placeholder="Contoh: Andi Wijaya"
                                    value="{{ old('name') }}">
                                <p class="text-sm text-gray-500 mt-1">Masukkan nama lengkap pengirim tiket</p>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-300 input-focus"
                                    placeholder="Contoh: andi@test.com"
                                    value="{{ old('email') }}">
                                <p class="text-sm text-gray-500 mt-1">Email aktif untuk menerima notifikasi</p>
                            </div>
                        </div>
                    </div>

                    <!-- Ticket Information Section -->
                    <div class="border-b border-gray-200 pb-8">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Detail Masalah
                        </h3>

                        <!-- Title -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Masalah <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="title" name="title" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-300 input-focus"
                                placeholder="Contoh: Websitenya berat saat dibuka"
                                value="{{ old('title') }}">
                            <p class="text-sm text-gray-500 mt-1">Tuliskan ringkasan masalah atau permintaan</p>
                        </div>

                        <!-- Description -->
                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi <span class="text-gray-400">(optional)</span>
                            </label>
                            <textarea id="description" name="description" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-300 input-focus resize-none"
                                placeholder="Contoh: Setiap halaman membutuhkan waktu lebih dari 10 detik untuk dimuat. Masalah ini terjadi sejak kemarin dan mempengaruhi semua browser.">{{ old('description') }}</textarea>
                            <p class="text-sm text-gray-500 mt-1">Jelaskan lebih detail masalah atau permintaan (boleh dikosongkan)</p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Ticket Type -->
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                                    Jenis Tiket <span class="text-red-500">*</span>
                                </label>
                                <select id="type" name="type" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-300 input-focus">
                                    <option value="">Pilih jenis tiket</option>
                                    <option value="incident" {{ old('type') == 'incident' ? 'selected' : '' }}>Insiden</option>
                                    <option value="change_request" {{ old('type') == 'change_request' ? 'selected' : '' }}>Perubahan Permintaan</option>
                                    <option value="assignment" {{ old('type') == 'assignment' ? 'selected' : '' }}>Penugasan</option>
                                </select>
                                <p class="text-sm text-gray-500 mt-1">Pilih kategori yang sesuai dengan masalah Anda</p>
                            </div>

                            <!-- Assign Date -->
                            <div>
                                <label for="assign_at" class="block text-sm font-medium text-gray-700 mb-2">
                                    Tanggal Masalah <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="assign_at" name="assign_at" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-300 input-focus"
                                    value="{{ old('assign_at', date('Y-m-d')) }}">
                                <p class="text-sm text-gray-500 mt-1">Tanggal ketika permasalahan mulai muncul</p>
                            </div>
                        </div>
                    </div>

                    <!-- Status Information -->
                    <div class="mb-8">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Status Tiket
                        </h3>
                        
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <div class="status-badge text-white px-3 py-1 rounded-full text-sm font-medium mr-3">
                                    OPEN
                                </div>
                                <div>
                                    <p class="text-green-800 font-medium">Status Otomatis</p>
                                    <p class="text-green-600 text-sm">Tiket baru akan otomatis terisi sebagai "Open" dan menunggu penanganan dari tim support</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Hidden status input -->
                        <input type="hidden" name="status" value="open">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-4 pt-6">
                        <a href="/" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-all duration-300">
                            Batal
                        </a>
                        <button type="submit" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg font-medium hover:from-blue-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Buat Tiket
                        </button>
                    </div>
                </form>
            </div>

            <!-- Help Section -->
            <div class="mt-12 glass-effect rounded-xl p-6 animate-fade-in">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Butuh Bantuan?</h4>
                        <p class="text-gray-600 mb-4">Jika Anda mengalami kesulitan dalam mengisi form ini, jangan ragu untuk menghubungi tim support kami.</p>
                        <div class="flex flex-wrap gap-4">
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                support@helpdesk.com
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                +62 123 456 7890
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript for form enhancements -->
    <script>
        // Auto-resize textarea
        const textarea = document.getElementById('description');
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });

        // Form validation feedback
        const form = document.querySelector('form');
        const inputs = form.querySelectorAll('input[required], select[required]');
        
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.classList.add('border-red-300');
                    this.classList.remove('border-gray-300');
                } else {
                    this.classList.add('border-green-300');
                    this.classList.remove('border-red-300', 'border-gray-300');
                }
            });
        });

        // Set today as max date for assign_at
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('assign_at').setAttribute('max', today);
    </script>
</body>
</html>