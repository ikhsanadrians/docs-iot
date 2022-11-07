<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <title>Dokumentasi</title>
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="icon" href="{{ asset('images/docslogo.png') }}" alt="tablogo">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    @vite('resources/css/app.css')

</head>

<body>
    <div id="app w-full h-full">
        <header class="w-full h-full sticky z-10 top-0">
            <div class="navbar  w-full h-16">
                <div
                    class="navbarinner flex items-center justify-between w-full h-full pr-4 pl-4 md:pl-16 md:pr-16 lg:pl-24 lg:pr-24">
                    <div class="title-and-search lg:gap-6 gap-16 md:gap-6 flex  w-full h-full items-center">
                        <div class="title flex items-center">
                            <img src="{{ asset('images/docslogo.png') }}" alt="" class="h-12 w-12">
                            <h1
                                class="text-xl md:text-2xl lg:text-2xl font-bold bg-gradient-to-r from-sky-500 to-blue-500 bg-clip-text text-transparent">
                                Dokumentasi</h1>
                        </div>




                        <div id="search-button" class="relative w-full md:w-full lg:w-[30%] flex items-center ">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="kbd absolute right-2 flex items-center hidden md:hidden lg:block">
                                <p class="flex items-center gap-1 text-sm font-semibold"><span
                                        class="bg-gradient-to-r from-gray-200 to-slate-400 rounded-md text-slate-700 shadow-md py-0 px-1">CTRL</span><span
                                        class="bg-gradient-to-r from-gray-200 to-slate-400 rounded-md text-slate-700 shadow-md py-0 px-1">K</span>
                                </p>
                            </div>

                            <input type="text" id="simple-search"
                                class="bg-none border border-gray-300 hover:ring-blue-500 hover:ring-1 text-gray-900 text-sm lg:rounded-lg
                                md:rounded-lg rounded-full focus:ring-blue-500 focus:border-blue-500 block lg:w-full md:w-full w-10 h-10 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search" required disabled>
                        </div>



                    </div>

                    <div class="menu flex gap-2 invisible md:visible lg:visible">
                        <div
                            class="category flex hover:bg-gradient-to-r hover:from-sky-600 hover:to-blue-600 duration-400 rounded-xl text-sky-900 hover:text-slate-100 py-[6.5px] px-2 gap-[1.4px] items-center">
                            <span class="material-symbols-outlined flex cursor-pointer items-center">
                                category
                            </span>
                            <h1 class="font-semibold"><a href="">Category</a></h1>
                        </div>
                        <div
                            class="topic flex hover:bg-gradient-to-r hover:from-sky-600 hover:to-blue-600 duration-400 rounded-xl text-sky-900 hover:text-slate-100 py-[6.5px] px-2 gap-[1.4px] items-center">
                            <span class="material-symbols-outlined flex cursor-pointer items-center">
                                topic
                            </span>
                            <h1 class="font-semibold"><a href="">Topic</a></h1>
                        </div>
                        <div
                            class="article flex hover:bg-gradient-to-r hover:from-sky-600 hover:to-blue-600 duration-400 rounded-xl text-sky-900 hover:text-slate-100 py-[6.5px] px-2 gap-[1.4px] items-center">
                            <span class="material-symbols-outlined flex cursor-pointer items-center">
                                article
                            </span>
                            <h1 class="font-semibold"><a href="">Article</a></h1>
                        </div>
                        <div
                            class="about flex hover:bg-gradient-to-r hover:from-sky-600 hover:to-blue-600 duration-400 rounded-xl text-sky-900 fill-sky-900 hover:fill-slate-100 hover:text-slate-100 py-[6.5px] px-2 gap-[1.4px] items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon h-6" viewBox="0 0 512 512">
                                <title>Information Circle</title>
                                <path
                                    d="M256 56C145.72 56 56 145.72 56 256s89.72 200 200 200 200-89.72 200-200S366.28 56 256 56zm0 82a26 26 0 11-26 26 26 26 0 0126-26zm48 226h-88a16 16 0 010-32h28v-88h-16a16 16 0 010-32h32a16 16 0 0116 16v104h28a16 16 0 010 32z" />
                            </svg>
                            <h1 class="font-semibold"><a href="">About</a></h1>
                        </div>
                        <div class="set-light flex items-center">
                            <span id="setlight"
                                class="toggle material-symbols-outlined text-indigo-500 cursor-pointer p-2 rounded-md hover:bg-zinc-200 focus:border-2 focus:border-zinc-400 duration-300">
                                dark_mode
                            </span>
                        </div>
                    </div>
                </div>
            </div>


        </header>
        <div class="main-content w-full h-full px-4 lg:pl-16 lg:pr-16">
            <main class="h-full w-full flex">
                @include('partials.sidebar')
                @yield('content')
                @yield('contents')
                @include('partials.gotothetop')
                @if (View::hasSection('content'))
                    @include('partials.morepost')
                @endif
            </main>

        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/loading.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/toggledark.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
    <script src="{{ asset('js/searchquery.js') }}"></script>
    <div class="loader">
        <div class="title flex items-center justify-center absolute bottom-10">
            <img src="{{ asset('images/docslogo.png') }}" alt="" class="h-12 w-12">
            <h1
                class="text-xl md:text-2xl lg:text-2xl font-bold bg-gradient-to-r from-sky-500 to-blue-500 bg-clip-text text-transparent">
                Dokumentasi</h1>
        </div>

        <span class="loader__element"></span>
        <span class="loader__element"></span>
        <span class="loader__element"></span>


    </div>

    <div id="search-modal" class="search-wrappers flex justify-center w-full h-full hidden duration-400">
        <div id="search-modals"
            class="fixed top-2 duration-400 md:top-4 lg:top-28 md:w-[40rem] z-20 w-full lg:w-[40rem] h-[30rem] bg-slate-100 rounded-md">
            <div class="search-modals-inner w-full h-full p-4">

                <form>
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block p-4 pl-10 w-full text-sm text-gray-900 duration-200 hover:placeholder:font-bold hover:ring-1 hover:ring-blue-500 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search Docs" required="">

                    </div>
                </form>

                <div class="text-slate-500 flex w-full mt-12">
                    <table class="w-full h-full">
                        <tbody id="results" class="w-full text-center">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

    <div id="backdrop" class="hidden fixed top-0 z-10 backdrop w-full h-full  bg-slate-700 opacity-30"></div>
</body>

</html>
