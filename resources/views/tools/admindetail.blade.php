@extends('Auth.dashboard')
@section('tool')
    <div class="container mt-4 h-full w-full">
        <a href="/dashboard/admin">
            <div class="back flex items-center">
                <span class="material-symbols-outlined cursor-pointer text-blue-600">
                    arrow_back
                </span>
                <h1 class="text-xl cursor-pointer">
                    Kembali
                </h1>
            </div>
        </a>
        <div class="container-inner w-full h-full mt-8 flex justify-center bg-red-300">
            <div class="profile w-full h-full flex justify-center">
                <div class="profile-inner flex flex-col">
                    <div
                        class="profile-pic w-44 h-44 rounded-full overflow-hidden shadow-lg ring ring-primary ring-offset-base-100 ring-offset-2">
                        <img src="{{ asset('images/defaultprofile.png') }}" alt="profile" class="object-cover">
                    </div>
                    <div class="profile-name flex justify-center mt-4">
                        <div class="namesettings">
                            <input type="text" value="{{ $user->name }}"
                                class="text-center text-2xl outline-none bg-[#f7f7f7]" style="text-align:center">
                            <p class="text-xl text-center">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>

            </div>


        </div>


    </div>
@endsection
