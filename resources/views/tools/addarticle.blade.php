@extends('Auth.dashboard')
@section('tool')
    <div class="container mt-4 w-full h-full">
        <h1 class="text-2xl opacity-80">Add New Article</h1>
        <div class="form-group mt-4 w-full h-full shadow-2xl p-6 rounded-xl bg-white border-t-4 border-t-blue-500">

            <form action="{{ route('addarticlepost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-title w-full h-full relative flex items-center">
                    <span class="material-symbols-outlined absolute z-10 pl-2 text-slate-500">
                        subtitles
                    </span>
                    <input type="text" name="title"
                        class="w-full h-12 border-[1.2px] border-zinc-300 rounded-lg pl-8 focus:shadow-md focus:outline-none focus:border-sky-600"
                        placeholder="Masukan Title Article">

                </div>

                <div class="upload-images-thumbnail mt-4 mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload
                        Thumbnail </label>
                    <input type="file"
                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" name="image">
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
    <script>
        CKEDITOR.replace('editor');
    </script>
    <div class="mb-96"></div>
@endsection
