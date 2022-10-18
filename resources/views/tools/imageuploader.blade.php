@extends('Auth.dashboard')
@section('tool')
    <div class="container w-full h-full">
        <div class="mt-4 p-4 table-container w-full h-full shadow-xl bg-white rounded-xl">
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
                                            Title
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Url
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Created_at
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Size
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            1
                                        </td>
                                        <td class="text-sm text-gray-900 cursor-pointer font-light px-6 py-4 whitespace-nowrap"
                                            title="">
                                            title image
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            url
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            created_at
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            size
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="">
                                                <span
                                                    class="material-symbols-outlined text-slate-700 cursor-pointer hover:text-yellow-700 duration-400">
                                                    settings
                                                </span>
                                            </a>

                                        </td>

                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="upload-images mt-8 w-full h-full shadow-2xl p-6 rounded-lg">
            <label for="">Upload Your Image Here</label>
            <div class="flex items-center justify-center w-full">
                <form class="mt-8 space-y-3 w-full h-full" action="#" method="POST">
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">Title</label>
                        <input
                            class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                            type="" placeholder="Example : Image For Article #71">
                    </div>
                    <div class=" w-full h-full grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">Attach Document</label>
                        <div class="flex items-center justify-center w-full h-full">
                            <label
                                class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                                <div
                                    class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                                    <!---<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                                                                                                        </svg>-->
                                    <div class="flex flex-auto max-h-48 w-2/5 justify-center mx-auto -mt-10">
                                        <img class="has-mask h-36 object-center"
                                            src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                            alt="freepik image">
                                    </div>
                                    <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> files
                                        here <br /> or
                                        <span class="text-blue-600 hover:underline">select a file</span> from your computer
                                    </p>
                                </div>
                                <input type="file" class="hidden">
                            </label>
                        </div>
                    </div>
                    <p class="text-sm text-gray-300">
                        <span>File type: doc,pdf,types of images</span>
                    </p>
                    <div>
                        <button type="submit"
                            class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide
                                    font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                            Upload
                        </button>
                    </div>
                </form>
            </div>




        </div>

        <div class="mb-96"></div>
    @endsection
