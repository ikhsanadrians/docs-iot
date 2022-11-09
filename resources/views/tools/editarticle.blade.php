@extends('Auth.dashboard')
@section('tool')
    <style>
        .ckcontent pre {
            padding: 20px;
            border: 0px solid black;
            background: #e7e7e7;
            border-radius: 10px;
            width: 100%;
            font-size: 10px;
            white-space: pre-wrap;
        }
    </style>
    <div class="container mt-4 w-full max-h-full">

        <h1 class=" text-l md:text-xl lg:text-xl opacity-80">Update The Article</h1>
        <div
            class="form-group mt-4 w-full h-full shadow-2xl p-6 rounded-xl bg-white dark:bg-slate-700 border-t-4 border-t-blue-500">

            <form action="{{ route('update', encrypt($editarticle->id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" value="{{ $editarticle->title }}" name="title"
                    class="w-full h-12 border-[1.2px] border-zinc-300 dark:bg-slate-800 dark:text-slate-300 rounded-lg pl-4 focus:shadow-md focus:outline-none focus:border-sky-600"
                    placeholder="Masukan Title Article">
                <div class="relative mt-4">
                    <select
                        class="block appearance-none w-full bg-gray-100 border dark:bg-slate-800
                        dark:text-slate-300 border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-state" name="category">
                        <option>Select Category</option>
                        @foreach ($category as $percategory)
                            <option value="{{ $percategory->id }}"
                                {{ $percategory->id == $editarticle->category_id ? 'selected' : '' }}>
                                {{ $percategory->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
                <div class="posttype-input-wrapper w-full h-full">
                    <div class="posttype-input w-full h-full flex items-center">
                        <div class="postype-every relative mt-4 w-full" id="inputcategory">
                            <select
                                class="block appearance-none w-full bg-gray-100 dark:border-slate-500 dark:bg-slate-700 border border-gray-200 text-gray-700 dark:text-slate-300 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-state" name="typepost">
                                @foreach ($articletype as $perarticletype)
                                    <option value="{{ $perarticletype->id }}"
                                        {{ $perarticletype->id == $editarticle->article_type_id ? 'selected' : '' }}>
                                        {{ $perarticletype->name }}</option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">

                            </div>
                        </div>


                    </div>
                </div>
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

                <div class="inputtext-content mt-4 mb-4 h-full w-full">
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
