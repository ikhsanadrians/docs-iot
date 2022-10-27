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
            <div class="articles-menu w-full h-full mt-12 flex flex-wrap gap-6">
                @foreach ($articleall as $article)
                    <a href="{{ '/article/' . $article->slug }}">
                        <div class="articlecard w-full bg-slate-100 rounded-lg p-2 md:w-[90%] lg:w-[35%] relative mb-2 max-h-[34rem] overflow-hidden"
                            id="article">
                            <div class="picture w-full h-1/2 rounded-2xl overflow-hidden ">
                                <img src="{{ asset('storage/thumbnail/' . $article->images) }}" alt=""
                                    class="brightness-100 object-cover w-full h-full">
                            </div>
                            <div class="title w-full flex flex-col gap-2  h-full mt-2">
                                <div class="article-info flex gap-2 items-center text-[#031b4e]">
                                    <p class="font-semibold ">{{ $article->created_at->format('d M') }}</p>
                                    <p class="font-semibold bg-sky-200 px-2 py-[0.3px] rounded-lg">Laravel</p>
                                </div>
                                <div class="title-article">
                                    <a href="{{ '/article/' . $article->slug }}">
                                        <h1 class="font-semibold text-xl text-[#031b4e] cursor-pointer hover:opacity-80">
                                            {{ $article->title }}
                                        </h1>
                                    </a>

                                </div>
                                <div class="title-description">
                                    <p class="text-[#031b4e]">{!! $article->short_description !!}</p>
                                </div>
                                <div class="posted-by">
                                    <p class="text-[#031b4e] font-semibold">By {{ $article->user->name }}</p>
                                </div>

                            </div>

                        </div>
                    </a>
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
