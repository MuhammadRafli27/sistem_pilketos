@extends('layouts.main')
@section('title', 'Voting')
@section('container')
    <style>
        .text-misi {
            height: 7em;
            /* Sesuaikan tinggi elemen dengan kebutuhan Anda */
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 5;
            /* Sesuaikan jumlah baris teks yang ingin ditampilkan */
            -webkit-box-orient: vertical;
        }
    </style>
    @include('sweetalert::alert')
    <div class="col p-6 -mt-6">
        <h1 class="text-xl font-semibold text-white-900 dark:text-black text-center">Pemilihan Ketua OSIS
            SMKN 1 Ciomas Masa Periode 2022/2023 <br> Silahkan Pilih Sesuai Hati Nurani anda <br><i class="text-sm">
                Ingat Majunya Sekolah Kita ada ditangan anda!!!</i>
        </h1>
        <div class="mt-4">
            @if (session()->has('success'))
                <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">Berhasil!!!</span> {{ session('success') }}
                    </div>
                </div>
            @endif
            @if (session()->has('delete'))
                <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">Gagal!!!</span> {{ session('delete') }}
                    </div>
                </div>
            @endif
        </div>
        <div class="flex flex-wrap justify-center items-center">
            <div class="w-full max-w-6xl mx-auto px-4">
                <div class="flex flex-wrap justify-between my-6">
                    @foreach ($kandidats as $item)
                        <div class="w-full md:w-1/2 lg:w-1/3 px-3 mb-6">
                            <div class="bg-white font-semibold text-center rounded-3xl border-2 ring-1 shadow-xl p-8">
                                <img class="mx-auto mb-2 w-32 h-32 rounded-full shadow-lg"
                                    src="{{ asset('storage/' . $item->foto_kandidat) }}" alt="{{ $item->nama_kandidat }}">

                                <h1 class="text-lg text-gray-900 capitalize">{{ $item->nama_kandidat }}</h1>
                                <h3 class="text-sm text-gray-700">{{ $item->kelas_kandidat }}</h3>
                                <p class="text-xs text-gray-400 mt-2 text-misi">
                                    {{ Str::limit($item->misi_kandidat, $limit = 220, $end = '...') }}</p>

                                @if (auth()->user()->level == 'siswa')
                                    <form action="{{ url('voting/' . $item->id) }}" method="post">
                                        @csrf
                                        <button
                                            onclick="return confirm('Apakah Kamu Yakin Ingin Voting {{ $item->nama_kandidat }}???')"
                                            class="bg-indigo-600 px-8 py-2 mt-3 rounded-xl text-center text-gray-100 font-semibold uppercase tracking-wide">
                                            Vote
                                        </button>
                                    </form>
                                @elseif(auth()->user()->level == 'admin')
                                    <div class="mt-5">
                                        <a href="/kandidat"
                                            class="bg-indigo-600 px-8 py-2 mt-3 rounded-xl text-center text-gray-100 font-semibold uppercase tracking-wide">
                                            Detail
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
@endsection
