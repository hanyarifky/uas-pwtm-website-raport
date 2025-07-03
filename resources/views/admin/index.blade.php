<!-- resources/views/dashboard.blade.php -->
<x-layout>
    <div class="text-center">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Dashboard</h2>
        <h4 class="text-xl font-semibold text-gray-800 mb-6">Welcome, {{ Auth::user()->nama }}</h4>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Total Siswa</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $total_siswa }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Total Mata Pelajaran</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $total_mapel }}</p>
            </div>
            {{-- <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Total Perpindahan</h3>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Total Kelahiran</h3>
                <p class="text-3xl font-bold text-blue-600">{{ 1 }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Total Kematian</h3>
                <p class="text-3xl font-bold text-blue-600">{{ 1 }}</p>
            </div> --}}
        </div>


</x-layout>
