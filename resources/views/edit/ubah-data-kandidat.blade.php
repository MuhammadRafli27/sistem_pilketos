@extends('layouts.main')
@section('title', 'Edit Data Kandidat')
@section('container')
            <div class="col p-6 -mt-12">
                <div class="md:grid md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form method="post" action="/kandidat/{{ $kandidat->id }}" enctype="multipart/form-data">
                            @csrf
                            <div class="sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 space-y-6 sm:p-10">
                                    <h1 class="text-xl font-semibold text-white-900 dark:text-black text-center -mt-4">
                                        Edit Data Kandidat SMKN 1 Ciomas
                                        <br> Pemilihan Ketua Osis Masa Periode 2022/2023
                                    </h1>
                                    <div class="-mx-3 flex flex-wrap">
                                        <div class="w-full px-3 sm:w-1/2">
                                            <div class="mb-5">
                                                <label for="nama_kandidat"
                                                    class="mb-auto block text-base font-medium text-[#07074D]">
                                                    Nama Kandidat :
                                                </label>
                                                <input type="text" name="nama_kandidat" id="nama_kandidat"
                                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('nama_kandidat') is_invalid @enderror"
                                                    autocomplete="off"
                                                    value="{{ old('nama_kandidat', $kandidat->nama_kandidat) }}" />
                                                @error('nama_kandidat')
                                                    <div class="feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="w-full px-3 sm:w-1/2">
                                            <div class="mb-5">
                                                <label for="kelas_kandidat"
                                                    class="mb-auto block text-base font-medium text-[#07074D]">
                                                    Kelas :
                                                </label>

                                                <select id="kelas_kandidat" name="kelas_kandidat"
                                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('kelas_kandidat') is_invalid @enderror"
                                                    value="{{ old('kelas_kandidat', $kandidat->kelas_kandidat) }}">
                                                    <option {{ $kandidat->kelas_kandidat == 'X PPLG 1' ? 'selected' : '' }}>
                                                        X
                                                        PPLG 1</option>
                                                    <option {{ $kandidat->kelas_kandidat == 'X PPLG 2' ? 'selected' : '' }}>
                                                        X
                                                        PPLG 2</option>
                                                    <option {{ $kandidat->kelas_kandidat == 'X PPLG 3' ? 'selected' : '' }}>
                                                        X
                                                        PPLG 3</option>
                                                    <option
                                                        {{ $kandidat->kelas_kandidat == 'XI PPLG 1' ? 'selected' : '' }}>
                                                        XI PPLG 1</option>
                                                    <option
                                                        {{ $kandidat->kelas_kandidat == 'XI PPLG 2' ? 'selected' : '' }}>
                                                        XI PPLG 2</option>
                                                    <option
                                                        {{ $kandidat->kelas_kandidat == 'XI PPLG 3' ? 'selected' : '' }}>
                                                        XI PPLG 3</option>
                                                    <option {{ $kandidat->kelas_kandidat == 'X BCF 1' ? 'selected' : '' }}>
                                                        X
                                                        BCF 1</option>
                                                    <option {{ $kandidat->kelas_kandidat == 'X BCF 2' ? 'selected' : '' }}>
                                                        X
                                                        BCF 2</option>
                                                    <option {{ $kandidat->kelas_kandidat == 'X BCF 3' ? 'selected' : '' }}>
                                                        X
                                                        BCF 3</option>
                                                    <option
                                                        {{ $kandidat->kelas_kandidat == 'X ANIMASI 1' ? 'selected' : '' }}>
                                                        X
                                                        ANIMASI 1</option>
                                                    <option
                                                        {{ $kandidat->kelas_kandidat == 'X ANIMASI 2' ? 'selected' : '' }}>
                                                        X
                                                        ANIMASI 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-2 -mt-6">
                                            <label for="visi_kandidat"
                                                class="mb-auto block text-base font-medium text-[#07074D]">
                                                Visi Kandidat :
                                            </label>
                                            <textarea type="text" name="visi_kandidat" id="visi_kandidat"
                                                class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md  @error('visi_kandidat') is_invalid @enderror"
                                                autocomplete="off">{{ old('visi_kandidat', $kandidat->visi_kandidat) }}
                                            </textarea>
                                            @error('visi_kandidat')
                                                <div class="feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mb-2 -mt-6">
                                            <label for="misi_kandidat"
                                                class="mb-auto block text-base font-medium text-[#07074D]">
                                                Misi Kandidat:
                                            </label>
                                            <textarea type="text" name="misi_kandidat" id="misi_kandidat"
                                                class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md  @error('misi_kandidat') is_invalid @enderror"
                                                autocomplete="off">{{ old('misi_kandidat', $kandidat->misi_kandidat) }}
                                            </textarea>
                                            @error('misi_kandidat')
                                                <div class="feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="foto_kandidat"
                                            class="mb-auto block text-base font-medium text-[#07074D]">Upload File :</label>
                                        <div
                                            class="w-full justify-start rounded-t-lg object-cover md:h-auto md:w-52 md:rounded-none md:rounded-l-lg p-2">
                                            <input type="hidden" name="oldImage" value="{{ $kandidat->foto_kandidat }}">
                                            @if ($kandidat->foto_kandidat)
                                                <img class="img-preview"
                                                    src="{{ asset('storage/' . $kandidat->foto_kandidat) }}">
                                            @else
                                                <img class="img-preview">
                                            @endif
                                        </div>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-[#e0e0e0] rounded-lg cursor-pointer bg-white dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  @error('foto_kandidat') is_invalid @enderror"
                                            aria-describedby="foto_kandidat_help" id="foto_kandidat" name="foto_kandidat"
                                            type="file" onchange="previewImage()"
                                            value="{{ old('foto_kandidat', $kandidat->foto_kandidat) }}">
                                        @error('foto_kandidat')
                                            <div class="feedback">{{ $message }}</div>
                                        @enderror
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="foto_kandidat">
                                            PNG, JPG, JPEG or SVG (MAX. 3080).
                                        </p>
                                    </div>
                                    <div class="flex flex-wrap items-center justify-end gap-4 pt-2 pb-2">
                                        <a href="/kandidat"
                                            class="max-w-none bg-gray-600 hover:bg-gray-700 rounded-lg font-medium text-white px-4 py-2">Kembali</a>
                                        <button
                                            class="max-w-none bg-[#027fff] hover:bg-blue-500 rounded-lg font-medium text-white px-4 py-2">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage() {
            const image = document.querySelector('#foto_kandidat');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

@endsection
