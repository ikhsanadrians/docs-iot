@extends('Auth.dashboard')
@section('tool')
    <a href="/dashboard/admin">
        <div
            class="back flex items-center  mt-2 text-sky-900 border-[1.5px] dark:text-slate-40 0 border-sky-900 max-w-fit px-2 py-1 hover:text-slate-100 hover:bg-sky-900 rounded-lg">
            <ion-icon name="arrow-back-outline"></ion-icon>
            <h1 class="text-xl cursor-pointer">
                Kembali
            </h1>
        </div>
    </a>
    <div class="container mt-4 h-full w-full">

        <div class="container-inner w-full h-full mt-8 flex justify-center ">
            <div class="profile w-full h-full flex justify-center">
                <div class="profile-inner flex gap-2 flex-col md:flex-row lg:flex-row ">
                    <div class="profile-pic h-32 w-32 rounded-full overflow-hidden">
                        @if (!$user->user_profile)
                            <img src="https://doimages.nyc3.digitaloceanspaces.com/46f22fba-7718-478b-86ae-e8b875f0473e_default-avatar.jpeg"
                                alt="" class="object-cover w-full h-full">
                        @else
                            <img src="{{ asset('storage/userprofile/' . $user->user_profile) }}" alt=""
                                class="object-cover w-full h-full">
                        @endif
                    </div>
                    <div class="profile-name text-2xl font-bold text-sky-900">
                        <h1>{{ $user->name }}</h1>
                        <p class="font-normal text-slate-500">{{ $user->email }}</p>
                        @if ($user->id != Auth::user()->id)
                            <select name="changerole" id="changeroleselect"
                                class="mt-2 outline-none border-none focus:outline-none focus:border-none rounded-lg">
                                @foreach ($userroles as $userrole)
                                    <option value="{{ $userrole->id }}"
                                        {{ $userrole->id == $user->user_roles_id ? 'selected' : '' }}>
                                        {{ $userrole->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>


                </div>


            </div>


        </div>


    </div>
    <script src="{{ asset('js/changerole.js') }}"></script>
@endsection
