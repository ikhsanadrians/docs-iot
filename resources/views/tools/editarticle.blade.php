@extends('Auth.dashboard')
@section('tool')
    <div class="container mt-4 w-full h-full">
        <h1 class="text-2xl opacity-80">Add New Article</h1>
        <div class="form-group mt-4 w-full h-full">

            <form action="{{ route('update', encrypt($editarticle->id)) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" value="{{ $editarticle->title }}" name="title"
                    class="w-full h-12 border-[1.2px] border-zinc-300 rounded-lg pl-4 focus:shadow-md focus:outline-none focus:border-sky-600"
                    placeholder="Masukan Title Article">
                {{-- <textarea type="text" name="editor1"
                    class="w-full mt-4 h-40 pt-2 border-[1.2px] focus:shadow-md border-zinc-300 rounded-lg pl-4 focus:outline-none focus:border-sky-600"
                    placeholder="Masukan Content"></textarea> --}}
                <div class="inputtext-content mt-4">
                    <textarea class="form-control" id="editor" name="editor">{!! $editarticle->description !!}</textarea>
                    <button type="submit" class="p-2 bg-blue-600 mt-4 rounded-md text-white">Update</button>

                </div>
            </form>
        </div>

        <div class="linktodashboard bottom-0 fixed text-zinc-600 hover:underline">
            <a href="{{ url('/dashboard') }}">Kembali Ke Dashboard</a>
        </div>

    </div>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
