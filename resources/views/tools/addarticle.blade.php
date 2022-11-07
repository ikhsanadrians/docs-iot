@extends('Auth.dashboard')
@section('tool')
    <div class="container mt-4 w-full h-full">
        <h1 class="text-2xl opacity-80">Add New Article</h1>
        <div class="form-group mt-4 w-full h-full shadow-2xl p-6 rounded-xl bg-white border-t-4 border-t-blue-500">

            <form action="{{ route('addarticlepost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-title w-full h-full relative flex items-center">
                    <span class="material-symbols-outlined absolute z-10 pl-2 text-slate-400">
                        subtitles
                    </span>


                    <input type="text" name="title"
                        class="w-full h-12 border-[1.2px] border-zinc-300 rounded-lg pl-8 focus:shadow-md focus:outline-none focus:border-sky-600"
                        placeholder="Masukan Title Article">

                </div>
                <div class="category-input-wrapper">
                    <div class="category-input w-full h-full flex items-center">
                        <div class="category-every relative mt-4 w-full" id="inputcategory">
                            <select
                                class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-state" name="category[]">
                                <option>Select Category</option>
                                @foreach ($category as $percategory)
                                    <option value="{{ $percategory->id }}">{{ $percategory->name }} </option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">

                            </div>
                        </div>
                        <div id="addnewcategory" title="Add More Category"
                            class="add-newcategory h-full rounded-lg bg-slate-200 flex items-center cursor-pointer mt-4 ml-1">
                            <span class="material-symbols-outlined text-3xl flex items-center cursor-pointer text-gray-700">
                                add
                            </span>
                        </div>

                    </div>
                </div>




                <div class="upload-images-thumbnail mt-4 mb-4">

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload
                        file</label>
                    <input name="image"
                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                        800x400px).</p>

                </div>
                <div class="inputtext-content mt-4">
                    <textarea class="form-control" id="editor" name="editor"></textarea>
                    <button type="submit"
                        class="p-2 bg-blue-600 mt-4 rounded-md text-white hover:opacity-80">Create</button>

            </form>

        </div>

    </div>

    {{-- <div class="linktodashboard bottom-0 fixed text-zinc-600 hover:underline">
        <a href="{{ url('/dashboard') }}">Kembali Ke Dashboard</a>
    </div> --}}

    </div>
    <script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/morecategory.js') }}"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
    <div class="mb-96"></div>
@endsection
