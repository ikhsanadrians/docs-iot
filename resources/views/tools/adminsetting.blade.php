@extends('Auth.dashboard')
@section('tool')
    <div class="container mt-4 w-full h-full">
        <div class="title flex gap-1 items-center">
            <span class="material-symbols-outlined  text-slate-700">
                admin_panel_settings
            </span>
            <h1 class="text-xl text-slate-700">Admin Setting</h1>

        </div>
        <div class="mt-4 p-4 table-container w-full h-full shadow-xl bg-white rounded-xl border-t-blue-500 border-t-4">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="bg-white border-b">
                                    <tr>
                                        <th scope="col"
                                            class="text-center align-middle text-sm font-medium text-gray-900 px-6 py-4">
                                            Id
                                        </th>
                                        <th scope="col"
                                            class="text-center align-middle text-sm font-medium text-gray-900 px-6 py-4">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="align-middle text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="align-middle text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Date Of Join
                                        </th>
                                        <th scope="col"
                                            class=" align-middle text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Article Posted
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $peruser)
                                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                            <td
                                                class="text-center align-middle px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $peruser->id }}
                                            </td>
                                            <td class="text-center align-middle text-sm text-gray-900 cursor-pointer font-light px-6 py-4 whitespace-nowrap"
                                                title="">
                                                {{ $peruser->name }}
                                            </td>
                                            <td
                                                class="text-center align-middle text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $peruser->email }}
                                            </td>
                                            <td
                                                class="text-sm text-center align-middle text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $peruser->created_at }}
                                            </td>
                                            <td
                                                class="text-sm text-center align-middle text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $peruser->article->count() }}
                                            </td>
                                            <td
                                                class="text-sm text-center align-middle text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('admindetails', $peruser->slug) }}">
                                                    <span
                                                        class="material-symbols-outlined text-slate-700 cursor-pointer hover:text-blue-400 duration-300">
                                                        settings
                                                    </span>
                                                </a>

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

        <div class="addnewadmin p-6 bg-white shadow-2xl rounded-xl mt-8 border-t-blue-500 border-t-4">
            <div class="title w-fit px-2 text-slate-600 flex items-center gap-2">
                <h1 class="text-xl">Create New Admin</h1>
                <span class="material-symbols-outlined">
                    admin_panel_settings
                </span>
            </div>
            <form action="{{ route('createadmin') }}" method="POST">
                @csrf
                <div class="inputgroup mt-4 flex flex-col gap-4">
                    <div class="user flex items-center">
                        <span class="material-symbols-outlined absolute z-10 pl-2 text-zinc-400 ">
                            account_circle
                        </span>
                        <input type="text" name="user"
                            class="inputs pl-8 relative w-full h-12 bg-zinc-100 rounded-lg focus:shadow-md focus:outline-none focus:border-2  focus:border-blue-600"
                            placeholder="Masukan User">
                    </div>
                    <div class="email flex items-center">
                        <span class="material-symbols-outlined absolute z-10 pl-2 text-zinc-400">
                            alternate_email
                        </span>
                        <input type="text" name="Email"
                            class="inputs pl-8 relative w-full h-12 bg-zinc-100 rounded-lg focus:shadow-md focus:outline-none focus:border-2  focus:border-blue-600"
                            placeholder="Masukan Email">
                    </div>
                    <div class="password flex items-center">
                        <span class="material-symbols-outlined absolute z-10 pl-2 text-zinc-400">
                            lock
                        </span>
                        <input type="password"
                            class="inputs pl-8 relative w-full h-12 bg-zinc-100 rounded-lg focus:shadow-md focus:outline-none focus:border-2  focus:border-blue-600"
                            placeholder="Masukan Password" id="password">
                    </div>
                    <div class="confirmpassword flex items-center">
                        <span class="material-symbols-outlined absolute z-10 pl-2 text-zinc-400">
                            lock
                        </span>
                        <input type="password" name="password"
                            class="inputs pl-8 relative w-full h-12 bg-zinc-100 rounded-lg focus:shadow-md focus:outline-none focus:border-2  focus:border-blue-600"
                            placeholder="Masukan Konfirmasi Password" id="confirmpassword">
                    </div>
                    <div class="submit flex items-center gap-4">
                        <button id="submits" type="submit"
                            class="bg-gradient-to-r from-emerald-400 to-sky-400 text-white font-semibold py-1 px-4 rounded-lg hover:opacity-80">Create</button>
                        <p id="message" class="px-2 rounded-lg bg-red-500 text-white"></p>

                    </div>
            </form>
        </div>
    </div>
    </div>
    <div class="mb-96"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/confirmpassword.js') }}"></script>
@endsection
