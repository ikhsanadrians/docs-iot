@extends('layouts.master')
@section('content')
    <div class="container -z-1 mt-10 flex justify-center w-full h-full lg:px-20 mb-[1200px]">
        <div class="container-inner w-full h-full">
            <div class="search-box w-full relative flex justify-center top-2 ">
                <div class="the-inputs w-full">
                    <span class="material-symbols-outlined absolute text-slate-500">
                        search
                    </span>
                    <input id="search" name="search" placeholder="Search" type="search"
                        class="focus:outline-none pl-8 text-slate-600 border-b-[1.5px] pb-2 bg-[#f7f7f7] border-slate-400 w-full md:w-[60%] lg:w-[45%]">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">


                </div>
            </div>
            @if (Auth::user())
                <h1>{{ Auth::user()->name }}</h1>
            @endif
            <div class="articles-menu w-full h-full mt-12 flex flex-wrap gap-10">
                @foreach ($articleall as $article)
                    <div class="articlecard w-full md:w-[90%] lg:w-[45%] rounded-md relative  h-[18rem] bg-slate-300 overflow-hidden"
                        id="article">
                        <div class="picture w-full h-full">
                            <img src="{{ asset('storage/thumbnail/' . $article->images) }}" alt=""
                                class="brightness-75 object-cover w-full h-full">
                        </div>
                        <div class="title bg-white w-24  h-12">
                            <a href="{{ '/article/' . $article->slug }}">
                                <h1
                                    class="bottom-4 left-4 right-4 absolute font-bold text-xl text-white cursor-pointer hover:opacity-80">
                                    {{ $article->title }}
                                </h1>
                            </a>

                        </div>

                    </div>
                @endforeach

            </div>


        </div>



    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content');
                }
            });
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js">
        config.allowedContent = true;
    </script>
@endsection
