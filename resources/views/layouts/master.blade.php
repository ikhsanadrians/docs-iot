<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dokumentasi</title>
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @vite('resources/css/app.css')

</head>

<body>
    <div id="app w-full h-full">
        <header class="w-full h-full sticky z-10 top-0">
            <div class="navbar bg-white shadow-md w-full h-16">
                <div
                    class="navbarinner flex items-center justify-between w-full h-full pr-4 pl-4 md:pl-16 md:pr-16 lg:pl-24 lg:pr-24">
                    <div class="title">
                        <h1
                            class="text-xl md:text-2xl lg:text-2xl font-bold bg-gradient-to-r from-indigo-500 to-blue-500 bg-clip-text text-transparent">
                            Dokumentasi</h1>
                    </div>
                    <div class="menu flex gap-2 invisible md:visible lg:visible">
                        <div
                            class="category flex hover:bg-indigo-600 duration-300 rounded-xl text-slate-700 hover:text-slate-100 py-[6.5px] px-2 gap-[1.4px] items-center">
                            <span class="material-symbols-outlined flex cursor-pointer items-center">
                                category
                            </span>
                            <h1 class="font-semibold"><a href="">Category</a></h1>
                        </div>
                        <div
                            class="topic flex hover:bg-indigo-600 duration-300 rounded-xl text-slate-700 hover:text-slate-100 py-[6.5px] px-2 gap-[1.4px] items-center">
                            <span class="material-symbols-outlined flex cursor-pointer items-center">
                                topic
                            </span>
                            <h1 class="font-semibold"><a href="">Topic</a></h1>
                        </div>
                        <div
                            class="article flex hover:bg-indigo-600 duration-300 rounded-xl text-slate-700 hover:text-slate-100 py-[6.5px] px-2 gap-[1.4px] items-center">
                            <span class="material-symbols-outlined flex cursor-pointer items-center">
                                article
                            </span>
                            <h1 class="font-semibold"><a href="">Article</a></h1>
                        </div>
                        <div
                            class="about flex hover:bg-indigo-600 duration-300 rounded-xl text-slate-700 hover:text-slate-100 py-[6.5px] px-2 gap-[1.4px] items-center">
                            <span class="material-symbols-outlined flex cursor-pointer items-center">
                                support
                            </span>
                            <h1 class="font-semibold"><a href="">About</a></h1>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <div class="main-content w-full h-full px-4 lg:pl-16 lg:pr-16">
            <main class="h-full w-full flex">
                @include('partials.sidebar')
                @yield('content')
                @include('partials.gotothetop')
            </main>

        </div>
    </div>


</body>

</html>
