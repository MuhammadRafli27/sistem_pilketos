@extends('layouts.main')
@section('title', 'Hasil Suara')
@section('container')
    <div class="col p-6 -mt-6">
        <div class="col">
            <h1 class="text-xl font-semibold text-white-900 dark:text-black text-center">Perolehan Suara
                Pemilihan Ketua Osis SMKN 1 Ciomas <br> Masa Periode 2022/2023
        </div>
        <div class="flex flex-wrap justify-center items-center">
            <div class="w-full max-w-6xl mx-auto px-4">
                <div class="flex flex-wrap justify-between my-6">
                    @foreach ($kandidats as $item)
                        <div class="w-full md:w-1/2 lg:w-1/3 px-3 mb-6">
                            <div class="bg-white font-semibold text-center rounded-3xl border-2 ring-1 shadow-xl p-8">
                                <img class="mb-2 w-32 h-32 rounded-full shadow-lg mx-auto"
                                    src="{{ asset('storage/' . $item->foto_kandidat) }}" name="foto_kandidat"
                                    id="foto_kandidat">

                                <h1 class="text-lg text-gray-900 capitalize" name="nama_kandidat" id="nama_kandidat"
                                    readonly>
                                    {{ $item->nama_kandidat }}</h1>
                                <h3 class="text-sm text-gray-700" name="kelas_kandidat" id="kelas_kandidat" readonly>
                                    {{ $item->kelas_kandidat }}</h3>
                                <p class="text-base text-gray-900 mt-6" name="visi_kandidat" id="visi_kandidat" readonly>
                                    Jumlah Suara :
                                </p>
                                <h3 class="text-sm text-gray-700" name="kelas_kandidat" id="kelas_kandidat" readonly>
                                    {{ $item->vote }}
                                </h3>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-full rounded-md bg-[#027fff] -mt-6">
            <h1 class="text-left text-lg font-bold p-4 text-white">Total Suara Masuk : {{ $hasVote }}</h1>
        </div>
    </div>
@endsection
