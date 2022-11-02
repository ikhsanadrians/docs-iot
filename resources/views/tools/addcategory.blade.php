@extends('Auth.dashboard')
@section('tool')
    <div class="container w-full h-full mt-4">
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
                                            Icon Url
                                        </th>
                                        <th scope="col"
                                            class="align-middle text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Date Of Created
                                        </th>
                                        <th scope="col"
                                            class=" align-middle text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Article's
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                            <td
                                                class="text-center align-middle px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $category->id }}
                                            </td>
                                            <td class="text-center align-middle text-sm text-gray-900 cursor-pointer font-light px-6 py-4 whitespace-nowrap"
                                                title="">
                                                {{ $category->name }}

                                            </td>
                                            <td
                                                class="text-center align-middle text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ Str::limit($category->icon, 15) }}
                                            </td>
                                            <td
                                                class="text-sm text-center align-middle text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $category->created_at }}
                                            </td>
                                            <td
                                                class="text-sm text-center align-middle text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                            </td>
                                            <td
                                                class="text-sm text-center align-middle text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <a href="">
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
    </div>
@endsection
