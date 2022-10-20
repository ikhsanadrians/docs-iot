@extends('Auth.dashboard')
@section('tool')
    <div class="container mt-4 w-full h-full bg-white shadow-2xl p-2 lg:p-4 rounded-xl border-t-blue-500 border-t-4">

        <h1 class=" text-l md:text-xl lg:text-xl opacity-80">Update The Article</h1>
        <div class="form-group mt-4 w-full h-full">

            <form action="{{ route('update', encrypt($editarticle->id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" value="{{ $editarticle->title }}" name="title"
                    class="w-full h-12 border-[1.2px] border-zinc-300 rounded-lg pl-4 focus:shadow-md focus:outline-none focus:border-sky-600"
                    placeholder="Masukan Title Article">
                {{-- <textarea type="text" name="editor1"
                    class="w-full mt-4 h-40 pt-2 border-[1.2px] focus:shadow-md border-zinc-300 rounded-lg pl-4 focus:outline-none focus:border-sky-600"
                    placeholder="Masukan Content"></textarea> --}}
                <div class="thumbnail-tools flex lg:flex-row flex-col items-center w-full h-full gap-4">
                    <div class="thumbnail-preview my-4">
                        <p class="text-[15px]">Thumbnail Saat Ini</p>
                        <div class="thumbnail-inner mt-2">
                            <img src="{{ asset('storage/thumbnail/' . $editarticle->images) }}" alt=""
                                class="object-fill h-full w-full lg:h-30 lg:w-36">
                        </div>

                    </div>
                    <div class="upload-images-thumbnail w-full mb-4">

                        <label class="block mb-4 text-sm font-medium text-gray-900 dark:text-gray-300 " for="file_input">
                            Ganti Thumbnail
                        </label>
                        <input type="file"
                            class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" name="image" value="{{ $editarticle->images }}">
                    </div>
                </div>

                <div class="inputtext-content mt-4 mb-4">
                    <textarea class="form-control" id="editor" name="editor">{!! $editarticle->description !!}</textarea>
                    <button type="submit"
                        class="px-4 py-2 font-semibold bg-gradient-to-r from-blue-400 to-blue-600 mt-4 rounded-md text-white">Update</button>

                </div>
            </form>
        </div>


    </div>
    <div class="mb-96"></div>
    <script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
@endsection
