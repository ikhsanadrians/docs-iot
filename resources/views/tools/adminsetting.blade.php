@extends('Auth.dashboard')
@section('tool')
    <div class="container mt-4 w-full h-full">
        <div class="title flex gap-1 items-center">
            <span class="material-symbols-outlined">
                admin_panel_settings
            </span>
            <h1 class="text-2xl opacity-80">Admin Setting</h1>

        </div>
        <div class="mt-4 p-4 table-container w-full h-full shadow-xl bg-white rounded-2xl border-2">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="bg-white border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Id
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Name
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Email
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Date Of Join
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Article Posted
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $peruser)
                                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $peruser->id }}
                                            </td>
                                            <td class="text-sm text-gray-900 cursor-pointer font-light px-6 py-4 whitespace-nowrap"
                                                title="">
                                                {{ $peruser->name }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $peruser->email }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $peruser->created_at }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $peruser->article->count() }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                                <span
                                                    class="material-symbols-outlined text-slate-700 cursor-pointer hover:text-yellow-700 duration-400">
                                                    settings
                                                </span>

                                            </td>

                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="addnewadmin mt-8">
            <div class="title">
                <h1 class="text-2xl opacity-80">Add New Admin</h1>
            </div>
            <form action="{{ route('createadmin') }}" method="POST">
                @csrf
                <div class="inputgroup mt-4 flex flex-col gap-4">
                    <div class="user flex items-center">
                        <span class="material-symbols-outlined absolute z-10 pl-2 text-zinc-400">
                            account_circle
                        </span>
                        <input type="text" name="user"
                            class="pl-8 relative w-full h-12 border-[1.2px] border-zinc-300 rounded-lg focus:shadow-md focus:outline-none focus:border-sky-600"
                            placeholder="Masukan User">
                    </div>
                    <div class="email flex items-center">
                        <span class="material-symbols-outlined absolute z-10 pl-2 text-zinc-400">
                            alternate_email
                        </span>
                        <input type="text" name="Email"
                            class="pl-8 relative w-full h-12 border-[1.2px] border-zinc-300 rounded-lg focus:shadow-md focus:outline-none focus:border-sky-600"
                            placeholder="Masukan Email">
                    </div>
                    <div class="password flex items-center">
                        <span class="material-symbols-outlined absolute z-10 pl-2 text-zinc-400">
                            lock
                        </span>
                        <input type="password"
                            class="pl-8 relative w-full h-12 border-[1.2px] border-zinc-300 rounded-lg focus:shadow-md focus:outline-none focus:border-sky-600"
                            placeholder="Masukan Password" id="password">
                    </div>
                    <div class="confirmpassword flex items-center">
                        <span class="material-symbols-outlined absolute z-10 pl-2 text-zinc-400">
                            lock
                        </span>
                        <input type="password" name="password"
                            class="pl-8 relative w-full h-12 border-[1.2px] border-zinc-300 rounded-lg focus:shadow-md focus:outline-none focus:border-sky-600"
                            placeholder="Masukan Konfirmasi Password" id="confirmpassword">
                    </div>
                    <div class="submit flex items-center gap-4">
                        <button id="submits" type="submit"
                            class="bg-gradient-to-r from-emerald-400 to-sky-400 text-white font-semibold py-1 px-4 rounded-lg">Create</button>
                        <p id="message" class="px-2 rounded-lg bg-red-500 text-white"></p>
                        <p id="message2" class="px-2 rounded-lg bg-red-500 text-white"></p>
                    </div>
            </form>
        </div>
    </div>
    </div>
    <div class="mb-96"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/confirmpassword.js') }}"></script>
@endsection
