<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/img/logoskanic.png" />
    <title>E-Pilketos | Login</title>
    @vite('resources/css/app.css')

</head>

<body class="bg-gray-900">
    <div class="container max-w-full mx-auto py-24 px-6 mt-10">
        @include('sweetalert::alert')
        <div class="font-sans">
            <div class="max-w-sm mx-auto px-6">
                <div class="relative flex flex-wrap">
                    <div class="w-full relative">
                        <div class="mt-6">
                            @if (session()->has('loginerror'))
                                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Danger</span>
                                    <div>
                                        <span class="font-medium">Login Failed!!!</span>
                                        <ul class="mt-1.5 ml-4 list-disc list-inside">
                                            <li>{{ session('loginerror') }}</li>
                                            <li>Pastikan Username dan NIS anda sesuai</li>
                                        </ul>
                                    </div>
                                </div>
                            @endif


                            <form action="{{route('postlogin')}}" method="post" class="mt-6">
                                {{ csrf_field() }}
                                <h1 class="text-center text-3xl font-bold text-white">Sign In</h1>
                                <div class="mx-auto max-w-lg mt-2">
                                    <div class="py-2">
                                        <span class="px-1 text-base text-white">Username</span>
                                        <input placeholder="Masukan Username" type="text" id="username"
                                            name="username"
                                            class="mt-1 text-md block px-3 py-2  rounded-lg w-full
                                            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none
                                            @error('username') is_invalid @enderror"
                                            value="{{ old('username') }}" autocomplete="off">
                                        @error('username')
                                            <div class="feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="py-2" x-data="{ show: true }">
                                        <span class="px-1 text-base text-white">Password</span>
                                        <div class="relative">
                                            <input placeholder="Masukan Password" :type="show ? 'password' : 'text'"
                                                id="password" name="password"
                                                class="mt-1 text-md block px-3 py-2 rounded-lg w-full
                                                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                                                 focus:placeholder-gray-500
                                                focus:bg-white
                                                 focus:border-gray-600
                                            focus:outline-none  @error('password') is_invalid @enderror">
                                            <div
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                                                <svg class="h-6 text-gray-900" fill="none" @click="show = !show"
                                                    :class="{ 'hidden': !show, 'block': show }"
                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                                    <path fill="currentColor"
                                                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                                    </path>
                                                </svg>

                                                <svg class="h-6 text-gray-900" fill="none" @click="show = !show"
                                                    :class="{ 'block': !show, 'hidden': show }"
                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                                    <path fill="currentColor"
                                                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        @error('password')
                                            <div class="feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button
                                        class="mt-3 text-lg font-bold bg-blue-700 w-full text-white rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-blue-500">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

</html>
