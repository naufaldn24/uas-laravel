@extends('layouts.guest')
@section('title', 'Kontak')

@section('content')
    <section class="bg-white py-16">
        <div class="container mx-auto px-6 md:px-10 max-w-4xl">
            <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-8">Kontak Kami</h1>

            <div class="bg-gray-50 p-6 rounded shadow border">
                <p class="text-lg text-gray-700 mb-4">
                    Hubungi kami untuk informasi lebih lanjut, kerja sama, atau kunjungan sekolah.
                </p>

                <ul class="space-y-4 text-gray-700 text-lg">
                    <li>
                        📍 <strong>Alamat:</strong> Jl. Pendidikan No. 45, Kota Ilmu
                    </li>
                    <li>
                        ☎️ <strong>Telepon:</strong> (021) 123-4567
                    </li>
                    <li>
                        ✉️ <strong>Email:</strong> <a href="mailto:info@smpn123.sch.id"
                            class="text-blue-600 hover:underline">info@smpn123.sch.id</a>
                    </li>
                </ul>

                <div class="mt-8">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.456115201504!2d112.625!3d-7.839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7882f7fd93dd8b%3A0xd714f872fddccaa9!2sUniversitas%20Merdeka%20Malang!5e0!3m2!1sen!2sid!4v1700000000000"
                        width="100%" height="300" class="rounded-lg shadow" style="border:0;" allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@endsection