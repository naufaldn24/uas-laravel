@extends('layouts.guest')
@section('title', 'Kontak')

@section('content')
    <section
        class="relative py-20 bg-gradient-to-br from-blue-50 via-white to-white dark:from-gray-800 dark:via-gray-900 dark:to-gray-900">
        <div class="container mx-auto px-6 md:px-10 max-w-4xl">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-extrabold text-blue-800 dark:text-white tracking-tight mb-4"
                    data-aos="fade-down">
                    ✉️ Hubungi Kami
                </h1>
                <p class="text-gray-600 dark:text-gray-300 text-lg" data-aos="fade-up" data-aos-delay="100">
                    Kami siap membantu Anda untuk mendapatkan informasi lebih lengkap seputar SMP Negeri 123.
                </p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 p-8 space-y-6"
                data-aos="fade-up" data-aos-delay="200">
                <div class="space-y-4 text-lg text-gray-700 dark:text-gray-300">
                    <p class="flex items-start gap-4">
                        <i class="fas fa-map-marker-alt text-xl text-blue-600 mt-1"></i>
                        <span><strong>Alamat:</strong> Jl. Pendidikan No. 45, Kota Ilmu</span>
                    </p>

                    <p class="flex items-start gap-4">
                        <i class="fas fa-phone-alt text-xl text-green-600 mt-1"></i>
                        <span><strong>Telepon:</strong> (021) 123-4567</span>
                    </p>

                    <p class="flex items-start gap-4">
                        <i class="fas fa-envelope text-xl text-yellow-500 mt-1"></i>
                        <span>
                            <strong>Email:</strong> <a href="mailto:info@smpn123.sch.id"
                                class="text-blue-600 hover:underline">info@smpn123.sch.id</a>
                        </span>
                    </p>
                </div>

                <div class="mt-8 rounded-xl overflow-hidden shadow-lg" data-aos="zoom-in" data-aos-delay="300">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.456115201504!2d112.625!3d-7.839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7882f7fd93dd8b%3A0xd714f872fddccaa9!2sUniversitas%20Merdeka%20Malang!5e0!3m2!1sen!2sid!4v1700000000000"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@endsection