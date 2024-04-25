@extends('layouts.main')
@section('title', 'Siswa')
@section('container')
    <div class="col p-6 -mt-4">
        <h1 class="text-xl font-semibold text-white-900 dark:text-black text-center mt-4">Sistem Informasi E-Pilketos SMKN 1
            Ciomas Ubah Password
            <br>Pemilihan Ketua Osis Masa Periode 2022/2023 <br>
        </h1>
        <div class="flex items-center justify-center p-4 mt-8">
            <div class="mx-auto w-full max-w-[850px]">
                <h1 class="text-base font-medium text-[#07074D]">Hallo, <b
                        class="italic uppercase">{{ auth()->user()->username }}</b> Silahkan Ubah Password Jika ingin Diubah!!!</h1>
                <form class="mt-4" action="{{ route('ganti-password') }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-5">
                        <label for="password_confirmation" class="mb-auto block text-base font-medium text-[#07074D]">
                            Password :
                        </label>
                        <input type="password" id="current_password"
                            class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('current_password') is_invalid @enderror"
                            placeholder="Masukan Password Lama" name="current_password">
                        @error('current_password')
                            <div class="feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-5 relative">
                        <label for="password" class="mb-auto block text-base font-medium text-[#07074D]">
                            Password Baru :
                        </label>
                        <input type="password" id="password"
                            class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('password') is_invalid @enderror"
                            placeholder="Masukan Password Baru" name="password">
                        <span id="showToggle" onclick="toggle()"><i
                                class="bx bx-show text-3xl text-primary hover:text-darkblue focus:text-darkblue absolute top-8 right-3"></i></span>
                        @error('password')
                            <div class="feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="password_confirmation" class="mb-auto block text-base font-medium text-[#07074D]">
                            Confirmation Password :
                        </label>
                        <input type="password" id="password"
                            class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md @error('password_confirmation') is_invalid @enderror"
                            placeholder="Masukan Confirmation password" name="password_confirmation">
                        @error('password_confirmation')
                            <div class="feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-wrap items-center justify-end gap-4 pt-5 pb-2">
                        <a href="/siswa"
                            class="max-w-none bg-gray-600 hover:bg-gray-700 rounded-lg font-medium text-white px-4 py-2">Kembali</a>
                        <button
                            class="max-w-none bg-blue-500 hover:bg-blue-700 rounded-lg font-medium text-white px-4 py-2">Simpan</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script>
        function toggle() {
            var password = document.getElementById("password");
            var togglePassword = document.getElementById("showToggle");
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
    </script>
@endsection
