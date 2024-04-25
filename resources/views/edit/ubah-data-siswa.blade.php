@extends('layouts.main')
@section('title', 'Edit Data Siswa')
@section('container')
    <div class="col p-6 -mt-6">
        <h1 class="text-xl font-semibold text-white-900 dark:text-black text-center">Edit Data Siswa SMKN
            1 Ciomas
            <br>Pemilihan Ketua Osis Masa Periode 2022/2023
        </h1>
        <div class="flex items-center justify-center p-4 mt-6">
            <div class="mx-auto w-full max-w-[980px]">
                <form method="post" action="/siswa/{{ $siswa->id }}">
                    @csrf
                    <div class="-mx-3 flex flex-wrap">
                        <input type="hidden" id="level" name="level" value="siswa">
                    </div>

                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="nis" class="mb-auto block text-base font-medium text-[#07074D]">
                                    Nomor Induk Siswa (NIS) :
                                </label>
                                <input type="number" name="nis" id="nis"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('nis') is_invalid @enderror"
                                    autocomplete="off" value="{{ old('nis', $siswa->nis) }}" />
                                @error('nis')
                                    <div class="feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="nisn" class="mb-auto block text-base font-medium text-[#07074D]">
                                    Nomor Induk Siswa (NISN) :
                                </label>
                                <input type="number" name="nisn" id="nisn"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('nisn') is_invalid @enderror"
                                    autocomplete="off" value="{{ old('nisn', $siswa->nisn) }}" />
                                @error('nisn')
                                    <div class="feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="mb-5">
                        <label for="kelas" class="mb-auto block text-base font-medium text-[#07074D]">
                            Kelas :
                        </label>

                        <select id="kelas" name="kelas"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('kelas') is_invalid @enderror"
                            value="{{ old('kelas', $siswa->kelas) }}">
                            <option {{ $siswa->kelas == 'X PPLG 1' ? 'selected' : '' }}>X PPLG 1</option>
                            <option {{ $siswa->kelas == 'X PPLG 2' ? 'selected' : '' }}>X PPLG 2</option>
                            <option {{ $siswa->kelas == 'X PPLG 3' ? 'selected' : '' }}>X PPLG 3</option>
                            <option {{ $siswa->kelas == 'XI PPLG 1' ? 'selected' : '' }}>XI PPLG 1</option>
                            <option {{ $siswa->kelas == 'XI PPLG 2' ? 'selected' : '' }}>XI PPLG 2</option>
                            <option {{ $siswa->kelas == 'XI PPLG 3' ? 'selected' : '' }}>XI PPLG 3</option>
                            <option {{ $siswa->kelas == 'X BCF 1' ? 'selected' : '' }}>X BCF 1</option>
                            <option {{ $siswa->kelas == 'X BCF 2' ? 'selected' : '' }}>X BCF 2</option>
                            <option {{ $siswa->kelas == 'X BCF 3' ? 'selected' : '' }}>X BCF 3</option>
                            <option {{ $siswa->kelas == 'X ANIMASI 1' ? 'selected' : '' }}>X ANIMASI 1</option>
                            <option {{ $siswa->kelas == 'X ANIMASI 2' ? 'selected' : '' }}>X ANIMASI 2</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="username" class="mb-auto block text-base font-medium text-[#07074D]">
                            Username :
                        </label>
                        <input type="text" name="username" id="username"
                            class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md  @error('username') is_invalid @enderror"
                            autocomplete="off" value="{{ old('username', $siswa->username) }}" />
                        @error('username')
                            <div class="feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="password" class="mb-auto block text-base font-medium text-[#07074D]">
                                    Ubah Password :
                                </label>
                                <input type="password" name="password" id="password"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('password') is_invalid @enderror"
                                    autocomplete="off" value="{{ old('password') }}" />
                                @error('password')
                                    <div class="feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="password_confirm" class="mb-auto block text-base font-medium text-[#07074D]">
                                    Password Confirmation :
                                </label>
                                <input type="password" name="password_confirm" id="password_confirm"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('password_confirm') is_invalid @enderror"
                                    autocomplete="off" value="{{ old('password_confirm') }}" />
                                @error('password_confirm')
                                    <div class="feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="flex flex-wrap items-center justify-end gap-4 pt-5 pb-2">
                        <a href="/siswa"
                            class="max-w-none bg-gray-600 hover:bg-gray-700 rounded-lg font-medium text-white px-4 py-2">Kembali</a>
                        <button
                            class="max-w-none bg-[#027fff] hover:bg-blue-500 rounded-lg font-medium text-white px-4 py-2">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
