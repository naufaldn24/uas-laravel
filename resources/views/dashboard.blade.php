@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">📊 Dashboard</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md font-semibold shadow transition">
                    🔒 Logout
                </button>
            </form>
        </div>

        {{-- Stat Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-10">
            <a href="/berita"
                class="bg-blue-100 hover:bg-blue-200 text-blue-800 p-5 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-semibold">Jumlah Berita</span>
                    <span class="text-xl">📰</span>
                </div>
                <div class="text-4xl font-extrabold text-center">{{ $jumlahBerita }}</div>
            </a>

            <a href="/kategori"
                class="bg-green-100 hover:bg-green-200 text-green-800 p-5 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-semibold">Jumlah Kategori</span>
                    <span class="text-xl">🏷️</span>
                </div>
                <div class="text-4xl font-extrabold text-center">{{ $jumlahKategori }}</div>
            </a>

            <div
                class="bg-purple-100 hover:bg-purple-200 text-purple-800 p-5 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-semibold">Jumlah User</span>
                    <span class="text-xl">👤</span>
                </div>
                <div class="text-4xl font-extrabold text-center">{{ $jumlahUser }}</div>
            </div>
        </div>

        {{-- Chart --}}
        <div class="bg-white p-6 border rounded-xl shadow">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Grafik Berita per Bulan</h2>
            <canvas id="beritaChart" height="100"></canvas>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('{{ route('dashboard.chart') }}')
                .then(res => res.json())
                .then(data => {
                    const ctx = document.getElementById('beritaChart').getContext('2d');

                    const labels = data.map(item => {
                        const bulan = item.bulan;
                        return new Date(2000, bulan - 1).toLocaleString('id-ID', { month: 'long' });
                    });

                    const counts = data.map(item => item.total);

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Jumlah Berita',
                                data: counts,
                                backgroundColor: 'rgba(59, 130, 246, 0.7)',
                                borderRadius: 6
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        precision: 0
                                    }
                                }
                            }
                        }
                    });
                });
        });
    </script>
@endsection