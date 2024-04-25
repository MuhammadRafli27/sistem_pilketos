@extends('layouts.main')
@section('title', 'Siswa')
@section('container')
    <style>
        .modal {
            z-index: 9999;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
    </style>
    @include('sweetalert::alert')
    <div class="col p-6 -mt-4">
        <h1 class="text-xl font-semibold text-white-900 dark:text-black text-center -mt-2">Daftar Siswa SMKN 1
            Ciomas
            <br>Pemilihan Ketua Osis Masa Periode 2022/2023
        </h1>
        <div class=" flex items-center justify-between pb-2 mt-8">
            <div>
                <h2 class="text-gray-900 font-semibold">SMKN 1 Ciomas</h2>
                <span class="text-sm">Pemilihan Ketua Osis Periode 2022/2023</span>
            </div>
            @if (auth()->user()->level == 'admin')
                <div class="flex flex-wrap items-center justify-end pt-2 pb-2">
                    <button
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-white rounded-lg group bg-gradient-to-br from-green-500 to-green-600 group-hover:from-green-600 group-hover:t-[#1da1f2]/50 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-[#027fff]/50"
                        onclick="openModal()">
                        <span
                            class="mx-auto relative px-2 py-2 transition-all ease-in duration-75 bg-green-600 dark:bg-white rounded-md group-hover:bg-opacity-0">
                            <i class='bx bxs-file'></i>
                            Import Excel
                        </span>
                    </button>
                    <a href="/create/tambah-data-siswa"
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-white rounded-lg group bg-gradient-to-br from-blue-500 to-blue-500 group-hover:from-blue-500 group-hover:t-[#027fff]/50 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-[#027fff]/50">
                        <span
                            class="mx-auto relative px-2 py-2 transition-all ease-in duration-75 bg-[#027fff] dark:bg-white rounded-md group-hover:bg-opacity-0"><i
                                class='bx bx-list-plus'></i>
                            Tambah Siswa
                        </span>
                    </a>
                    <!-- Elemen modal -->
                    <div
                        class="modal fixed hidden inset-0 z-50 overflow-auto bg-gray-800 bg-opacity-75 mx-auto">
                        <div class="modal-content w-full max-w-md mx-auto my-10 p-4 rounded-lg bg-white">
                            <div class="flex items-center justify-between space-x-4">
                                <h1 class="text-xl font-medium text-gray-800 "></h1>
                                <button  onclick="closeModal()"
                                    class="text-gray-600 focus:outline-none hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </div>
                            <form action="/importexcel" method="post" enctype="multipart/form-data">
                                @csrf
                                <h1 class="text-xl font-semibold text-gray-800 text-center">Import
                                    Data Pemilih</h1>
                                <div class="mt-6">
                                    <label for="file"
                                        class="mb-auto block text-base font-semibold text-gray-800">Upload
                                        File :
                                    </label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-[#e0e0e0] rounded-lg cursor-pointer bg-white dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-400 dark:placeholder-gray-400 @error('file') is_invalid @enderror"
                                        aria-describedby type="file" name="file" id="file">
                                    @error('file')
                                        <div class="feedback">{{ $message }}</div>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">
                                        XLX, XLSX or CSV (MAX. 2048).
                                    </p>
                                    <div class="flex p-2 mb-4 text-sm text- rounded-gray-900 dark:bg-gray-800 dark:text-gray-400 " role="alert">
                                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                          <span class="font-bold text-gray-800">Data yang anda Import Wajib Berisikan :</span>
                                            <ul class="mt-1.5 ml-4 list-disc list-inside">
                                              <li class="font-medium">level, username, password, nis, nisn, dan kelas</li>
                                          </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-wrap items-center justify-end gap-4 pb-2">
                                    <button type="submit"
                                        class="max-w-none bg-[#027fff] hover:bg-blue-500 rounded-lg font-medium text-white px-4 py-2">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endif
        </div>
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
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">Berhasil!!!</span> {{ session('delete') }}
                </div>
            </div>
        @endif
        <form>
            <div class="flex">
                <button id="dropdown-button" data-dropdown-toggle="dropdown"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-white bg-[#027fff] border rounded-l-lg hover:bg-blue-500 focus:ring-4 focus:outline-none"
                    type="button">All Search </button>
                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                </div>
                <div class="relative w-full">
                    <input type="text" id="search-dropdown" name="keyword"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-white rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-400 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                        placeholder="Search" autocomplete="off">
                    <button type="submit"
                        class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-[#027fff] hover:bg-blue-500 rounded-r-lg border border-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-600">
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>

        <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-sm rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead class="border-[1px] rounded-t-lg border-gray-400">
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-400 bg-[#027fff] text-center text-xs font-bold text-white uppercase tracking-wider">
                                    No
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-400 bg-[#027fff] text-left text-xs font-bold text-white uppercase tracking-wider">
                                    NIS
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-400 bg-[#027fff] text-left text-xs font-bold text-white uppercase tracking-wider">
                                    Name
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-400 bg-[#027fff] text-left text-xs font-bold text-white uppercase tracking-wider">
                                    NISN
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-400 bg-[#027fff] text-center text-xs font-bold text-white uppercase tracking-wider">
                                    Kelas
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-400 bg-[#027fff] text-center text-xs font-bold text-white uppercase tracking-wider">
                                    Status
                                </th>
                                @if (auth()->user()->level == 'admin')
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-400 bg-[#027fff] text-center text-xs font-bold text-white uppercase tracking-wider">
                                        Action
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $index => $data)
                                <tr class="border-[1px] border-gray-400">
                                    <td class="px-5 py-4 border-b border-gray-400 bg-[#8D8D8] text-xs text-center">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $index + $siswa->firstItem() }}</p>
                                    </td>
                                    <td class="px-5 py-4 border-b border-gray-400 bg-[#8D8D8] text-xs text-left">
                                        <p class="text-gray-900 whitespace-no-wrap uppercase">
                                            {{ $data->nis }}</p>
                                    </td>
                                    <td class="px-5 py-4 border-b border-gray-400 bg-[#8D8D8] text-xs text-left">
                                        <p class="text-gray-900 whitespace-no-wrap uppercase">
                                            {{ $data->username }}</p>
                                    </td>
                                    <td class="px-5 py-4 border-b border-gray-400 bg-[#8D8D8] text-xs text-left">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $data->nisn }}</p>
                                    </td>
                                    <td class="px-5 py-4 border-b border-gray-400 bg-[#8D8D8] text-xs text-center">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $data->kelas }}</p>
                                    </td>
                                    @if ($data->has_voted)
                                        <td class="px-5 py-2 border-b border-gray-400 bg-[#8D8D8] text-xs text-center">
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Sudah Voting</span>
                                            </span>
                                        </td>
                                    @else
                                        <td class="px-5 py-2 border-b border-gray-400 bg-[#8D8D8] text-xs text-center">
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Belum Voting</span>
                                            </span>
                                        </td>
                                    @endif
                                    @if (auth()->user()->level == 'admin')
                                        <td
                                            class="flex gap-1 justify-center flex-wrap px-5 py-3 text-center border-gray-400 bg-[#8D8D8] text-sm">
                                            <a href="/edit/{{ $data->id }}/ubah-data-siswa"
                                                data-id="{{ $data->id }}"
                                                class="text-white bg-[#027fff] hover:bg-blue-500 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center"
                                                onclick="return confirm('Apakah Kamu Yakin Ingin Mengubah Data {{ $data->username }}???')">
                                                <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="/siswa/{{ $data->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center"
                                                    data-id="{{ $data->id }}"
                                                    onclick="return confirm('Apakah Kamu Yakin Ingin Menghapus Data {{ $data->username }}???')">
                                                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="border-[1px] border-gray-400 px-5 py-2 flex flex-col xs:flex-row rounded-b-lg items-center xs:justify-between">
                        {{ $siswa->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openModal() {
            document.querySelector('.modal').classList.remove('hidden');
            document.querySelector('body').classList.add('overflow-hidden');
        }

        function closeModal() {
            document.querySelector('.modal').classList.add('hidden');
            document.querySelector('body').classList.remove('overflow-hidden');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endsection
