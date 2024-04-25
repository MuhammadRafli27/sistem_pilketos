@extends('layouts.main')
@section('title', 'Kandidat')
@section('container')
        @include('sweetalert::alert')
        <div class="col p-6 -mt-6">
            <h1 class="text-xl font-semibold text-white-900 dark:text-black text-center">Daftar Calon
                Kandidat SMKN 1 Ciomas <br>Pemilihan Ketua Osis Masa Periode 2022/2023 </h1>
            @if (auth()->user()->level == 'admin')
                <a href="/create/tambah-data-kandidat"
                    class="mt-2 relative inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm font-medium  text-white rounded-lg group bg-gradient-to-br from-blue-500 to-blue-500 group-hover:from-blue-500 group-hover:t-[#027fff]/50 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-[#027fff]/50">
                    <span
                        class=" mx-auto relative px-2 py-2 transition-all ease-in duration-75 bg-[#027fff] dark:bg-white rounded-md group-hover:bg-opacity-0"><i
                            class='bx bx-list-plus'></i>
                        Tambah Data Kandidat
                    </span>
                </a>
            @endif
            <div class="mt-3">
                @if (session()->has('success'))
                    <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
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
                            <span class="font-medium">Berhasil!!!</span> {{ session('delete') }}
                        </div>
                    </div>
                @endif
            </div>
            @foreach ($kandidat as $item)
                <div class="justify-center w-full">
                    <div
                        class="flex-col rounded-lg shadow-lg dark:bg-neutral-700 md:max-w-full md:flex-row border-2 mt-4 p-4">
                        @if ($item->foto_kandidat)
                            <img class="w-full rounded-t-lg object-cover md:h-auto md:w-52 my-auto mb-auto p-4 mx-auto md:rounded-none md:rounded-l-lg"
                                src="{{ asset('storage/' . $item->foto_kandidat) }}" />
                            <hr>
                        @else
                            <img class="w-full rounded-t-lg object-cover md:h-auto md:w-52 my-auto mb-auto p-4 mx-auto md:rounded-none md:rounded-l-lg"
                                src="/img/fotokandidat.png" />
                            <hr>
                        @endif
                        <div class="flex flex-col justify-start">
                            <h5 class="mb-2 text-base font-semibold text-neutral-800 dark:text-neutral-50 mt-4 p-2">
                                Calon : {{ $loop->iteration }}
                            </h5>
                            <h5 class="mb-2 text-base font-semibold text-neutral-800 dark:text-neutral-50 -mt-4 p-2 capitalize">
                                Nama : {{ $item->nama_kandidat }}
                            </h5>
                            <h5 class="mb-2 text-base font-semibold text-neutral-800 dark:text-neutral-50 -mt-4 p-2">
                                Kelas : {{ $item->kelas_kandidat }}
                            </h5>
                            <hr>
                            <div class="text-neutral-800 dark:text-neutral-50">
                                <h5
                                    class="mb-2 text-base font-semibold text-center text-neutral-800 dark:text-neutral-50 mt-2">
                                    Visi :
                                </h5>
                                <p class="mb-2 text-base text-neutral-600 dark:text-neutral-200 text-justify p-2 -mt-2">
                                    {{ $item->visi_kandidat }}
                                </p>
                                <hr>
                                <h5
                                    class="mb-2 text-base font-semibold text-center text-neutral-800 dark:text-neutral-50 mt-2">
                                    Misi :
                                </h5>
                                <p class="mb-2 text-base text-neutral-600 dark:text-neutral-200 text-justify p-2 -mt-2">
                                    {{ $item->misi_kandidat }}
                                </p>

                                @if (auth()->user()->level == 'admin')
                                    <div class="flex flex-wrap items-center justify-end gap-4 pt-2 pb-2 p-5">
                                        <td
                                            class="flex flex-col px-5 py-5 border-b text-center border-gray-200 bg-white text-sm">
                                            <a href="/edit/{{ $item->id }}/ubah-data-kandidat"
                                                item-id="{{ $item->id }}"
                                                class="text-white bg-[#027fff] hover:bg-blue-500 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center"
                                                onclick="return confirm('Apakah Kamu Yakin Ingin Mengubah Data {{ $item->nama_kandidat }}???')">
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
                                            <form action="/kandidat/{{ $item->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center"
                                                    data-id="{{ $item->id }}"
                                                    onclick="return confirm('Apakah Kamu Yakin Ingin Menghapus Data {{ $item->nama_kandidat }}???')">
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
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    </div>
    </div>
@endsection
