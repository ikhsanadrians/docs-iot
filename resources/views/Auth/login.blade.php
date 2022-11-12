<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">


</head>

<body>

    <div class="container w-full h-full bg-[#f7f7f7] flex justify-center py-8 lg:py-8 px-4">
        <div
            class="login-card bg-gradient-to-r from-slate-100 to-slate-200 border-[1.4px] border-slate-300 h-[25rem] md:h-[35rem] lg:h-[35rem] w-full  lg:w-1/3 rounded-2xl">
            <div class="login-ilustration flex justify-center absolute">
                <img src="{{ asset('images/loginilustrations.png') }}" alt="loginilustration"
                    class="h-48 invisible lg:visible">
            </div>
            <div class="login-card-inner md:p-12 p-8 lg:p-12 w-full h-full">

                <div class="login-card-title text-center mt-2">
                    <h1 class="text-4xl font-bold text-blue-600">Login!</h1>
                </div>
                <form method="POST" action="{{ route('authpost') }}" class="w-full h-full">
                    @csrf
                    <div class="inputgroup w-full h-full mt-6">
                        <span
                            class="material-symbols-outlined text-slate-400 z-10 mt-[5px] ml-[5px] text-3xl absolute flex items-center">
                            account_circle
                        </span>
                        <input name="email" type="email"
                            class="w-full mb-4 -z-2 relative pl-[2.4rem] flex items-center border-[1.2px] px-4 border-slate-300 focus:outline-none focus:border-blue-600 focus:border-2 bg-slate-100 rounded-md h-[3rem]"
                            placeholder="Username">
                        <span
                            class="material-symbols-outlined text-slate-400 z-10 mt-[5px] ml-[5px] text-3xl absolute flex items-center">
                            lock
                        </span>
                        <input name="password" type="password"
                            class="w-full mb-4 -z-2 relative pl-[2.4rem] flex items-center border-[1.2px] px-4 border-slate-300 focus:outline-none focus:border-blue-600 focus:border-2 bg-slate-100 rounded-md h-[3rem]"
                            placeholder="Password">
                        <button type=submit
                            class="bg-gradient-to-r from-blue-600 to-sky-600 py-2 lg:px-6 w-full text-white font-bold rounded-lg hover:opacity-90 focus:scale-95 duration-300">Login</button>
                </form>

            </div>

        </div>
    </div>

    </div>

</body>

</html>
