@extends('layouts.main')
@section('dashboard_select', 'active')
@section('title', 'Dashboard')
@section('container')
    <div class="col p-6 -mt-6">
        <h1 class="text-xl font-semibold text-white-900 dark:text-black text-center">Selamat datang di Sistem
            Informasi <br> E-Pilketos SMKN 1 Ciomas</h1>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-2" role="alert">
            <h2 class="text-sm font-semibold">Welcome Back, <b class="italic capitalize">{{ auth()->user()->username }}</b>
                di sistem informasi Pemilihan Ketua Osis</h2>
        </div>

        {{-- Card Dashboard --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-4">
            <div class="p-4 bg-[#027fff] text-white rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                        <span class="text-sm uppercase font-bold">Siswa</span>
                        <span class="text-lg font-bold">{{ $datasiswa }}</span>
                    </div>
                    <i class='bx bxs-user-detail text-3xl'></i>
                </div>
            </div>
            <div class="p-4 bg-[#027fff] text-white rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                        <span class="text-sm uppercase font-bold">Suara Masuk</span>
                        <span class="text-lg font-bold">{{ $hasVote }}</span>
                    </div>
                    <i class='bx bxs-user-detail text-3xl'></i>
                </div>
            </div>
            <div class="p-4 bg-[#027fff] text-white rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                        <span class="text-sm uppercase font-bold">Belum Voting</span>
                        <span class="text-lg font-bold">{{ $notVote }}</span>
                    </div>
                    <i class='bx bxs-user-detail text-3xl'></i>
                </div>
            </div>
            <div class="p-4 bg-[#027fff] text-white rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                        <span class="text-sm uppercase font-bold">Kandidat</span>
                        <span class="text-lg font-bold">{{ $datakandidat }}</span>
                    </div>
                    <i class='bx bxs-user-plus text-3xl'></i>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@endsection
