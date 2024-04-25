<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/style.css">
    <title>E-Pilketos | @yield('title')</title>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="/dashboard" class="brand"><i class='bx bxl-skype icon'></i>SI-Pilketos</a>
        <div class="ilustration mx-8 mt-4">
            <img src="/img/background1.png" alt="">
        </div>
        <ul class="side-menu">
            <li><a href="/dashboard" class=" {{ Request::is('dashboard') ? 'active' : '' }}"><i
                        class='bx bxs-dashboard icon'></i> Dashboard</a></li>
            @if (auth()->user()->level == 'admin')

            <li><a href="/siswa" class="{{ Request::is('siswa') ? 'active' : '' }}"><i
                        class='bx bxs-user-account icon'></i>Siswa</a></li>
            @endif
            <li><a href="/kandidat" class="{{ Request::is('kandidat') ? 'active' : '' }}"><i
                        class='bx bxs-group icon'></i>Daftar Kandidat</a></li>
            @if (auth()->user()->level == 'siswa')

            <li><a href="/voting" class="{{ Request::is('voting') ? 'active' : '' }}"><i
                        class='bx bxs-box icon'></i></i>Voting</a></li>
            @endif
            <li><a href="/hasilsuara" class="{{ Request::is('hasilsuara') ? 'active' : '' }}"><i
                        class='bx bxs-user-voice bx-tada icon'></i></i>Hasil Suara</a></li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- NAVBAR -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#">
                <div class="form-group">
                    <div>
                        <h2 class="font-semibold">Sistem Informasi E-Pilketos</h2>
                    </div>
                </div>
            </form>
            <nav class="flex items-center justify-end py-4 px-6">
                <div class="relative">
                    <button class="flex items-center space-x-2 focus:outline-none">
                        <span class="text-sm font-medium text-gray-700 capitalize">Hallo,
                            {{ auth()->user()->username }}👋</span>
                        <i class='bx bx-caret-down text-xl'></i>
                    </button>
                    <ul id="dropdown-menu"
                        class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-10 hidden">
                        <li>
                            <a href="/change-password" class="flex items-center px-4 py-2 hover:bg-gray-100 rounded-md">
                                <i class='bx bxs-lock'></i>
                                <span class="ml-2 text-sm font-medium">Ubah Password</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="return confirm('Apakah Kamu Yakin Ingin Meninggalkan Halaman Ini???')"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 rounded-md">
                                <i class='bx bxs-log-out-circle'></i>
                                <span class="ml-2 text-sm font-medium">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

        </nav>
        <div class="border-b-2 bg-black"></div>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            {{-- @vite('resources/css/app.css') --}}
            <link rel="preload" as="style" href="/build/assets/app-be08eb3d.css" />
            <link rel="stylesheet" href="/build/assets/app-be08eb3d.css" />
            @yield('container')
        </main>
        <!-- MAIN -->
    </section>
    <!-- NAVBAR -->

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
</body>
<script>
    const dropdownBtn = document.querySelector('.relative button');
    const dropdownMenu = document.querySelector('#dropdown-menu');

    dropdownBtn.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });
</script>

<script>
    // SIDEBAR DROPDOWN
    const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');
    const sidebar = document.getElementById('sidebar');

    allDropdown.forEach(item => {
        const a = item.parentElement.querySelector('a:first-child');
        a.addEventListener('click', function(e) {
            e.preventDefault();

            if (!this.classList.contains('active')) {
                allDropdown.forEach(i => {
                    const aLink = i.parentElement.querySelector('a:first-child');

                    aLink.classList.remove('active');
                    i.classList.remove('show');
                })
            }

            this.classList.toggle('active');
            item.classList.toggle('show');
        })
    })





    // SIDEBAR COLLAPSE
    const toggleSidebar = document.querySelector('nav .toggle-sidebar');
    const allSideDivider = document.querySelectorAll('#sidebar .divider');

    if (sidebar.classList.contains('hide')) {
        allSideDivider.forEach(item => {
            item.textContent = '-'
        })
        allDropdown.forEach(item => {
            const a = item.parentElement.querySelector('a:first-child');
            a.classList.remove('active');
            item.classList.remove('show');
        })
    } else {
        allSideDivider.forEach(item => {
            item.textContent = item.dataset.text;
        })
    }

    toggleSidebar.addEventListener('click', function() {
        sidebar.classList.toggle('hide');

        if (sidebar.classList.contains('hide')) {
            allSideDivider.forEach(item => {
                item.textContent = '-'
            })

            allDropdown.forEach(item => {
                const a = item.parentElement.querySelector('a:first-child');
                a.classList.remove('active');
                item.classList.remove('show');
            })
        } else {
            allSideDivider.forEach(item => {
                item.textContent = item.dataset.text;
            })
        }
    })




    sidebar.addEventListener('mouseleave', function() {
        if (this.classList.contains('hide')) {
            allDropdown.forEach(item => {
                const a = item.parentElement.querySelector('a:first-child');
                a.classList.remove('active');
                item.classList.remove('show');
            })
            allSideDivider.forEach(item => {
                item.textContent = '-'
            })
        }
    })



    sidebar.addEventListener('mouseenter', function() {
        if (this.classList.contains('hide')) {
            allDropdown.forEach(item => {
                const a = item.parentElement.querySelector('a:first-child');
                a.classList.remove('active');
                item.classList.remove('show');
            })
            allSideDivider.forEach(item => {
                item.textContent = item.dataset.text;
            })
        }
    })




    // PROFILE DROPDOWN
    const profile = document.querySelector('nav .profile');
    const imgProfile = profile.querySelector('img');
    const dropdownProfile = profile.querySelector('.profile-link');

    imgProfile.addEventListener('click', function() {
        dropdownProfile.classList.toggle('show');
    })




    // MENU
    const allMenu = document.querySelectorAll('main .content-data .head .menu');

    allMenu.forEach(item => {
        const icon = item.querySelector('.icon');
        const menuLink = item.querySelector('.menu-link');

        icon.addEventListener('click', function() {
            menuLink.classList.toggle('show');
        })
    })



    window.addEventListener('click', function(e) {
        if (e.target !== imgProfile) {
            if (e.target !== dropdownProfile) {
                if (dropdownProfile.classList.contains('show')) {
                    dropdownProfile.classList.remove('show');
                }
            }
        }

        allMenu.forEach(item => {
            const icon = item.querySelector('.icon');
            const menuLink = item.querySelector('.menu-link');

            if (e.target !== icon) {
                if (e.target !== menuLink) {
                    if (menuLink.classList.contains('show')) {
                        menuLink.classList.remove('show')
                    }
                }
            }
        })
    })





    // PROGRESSBAR
    const allProgress = document.querySelectorAll('main .card .progress');

    allProgress.forEach(item => {
        item.style.setProperty('--value', item.dataset.value)
    })
</script>

</html>