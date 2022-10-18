@extends('layouts.master')
@section('content')
    <style>
        .article-desc a {
            color: rgb(45, 140, 229);
            text-decoration: underline;

        }

        .article-desc p {
            line-height: 2.2;

        }

        .article-desc h1 {
            color: #222220;
            font-weight: 500;

        }

        .article-desc pre {
            padding: 20px;
            border: 0px solid black;
            background: #e7e7e7;
            border-radius: 10px;
            width: 100%;
            white-space: pre-wrap;
        }

        @media only screen and (max-width: 600px) {
            .article-desc pre {
                padding: 20px;
                border: 0px solid black;
                background: #e7e7e7;
                border-radius: 10px;
                width: 100%;
                font-size: 10px;
                white-space: pre-wrap;
            }


        }

        .article-desc ul {
            margin-top: 5px;
            border-left: 10px solid rgb(50, 100, 193);
            background: #272822;
            padding: 20px;
            color: #f8f8f2;
            font-size: 15px;
            border-radius: 10px;
            font-family: monospace;

        }
    </style>
    <main class="pl-0 pr-2 lg:pl-[1.5rem] lg:pt-[3.3rem] lg:pr-[10rem] w-full h-full pt-12 mb-16">
        <div class="container w-full h-full">

            <div class="authoranddate flex gap-2 relative">

                <div class="author max-w-fit">
                    <p class="text-l bg-gradient-to-r from-blue-600 to-sky-500 px-4 py-[1.8px] rounded-2xl text-white">
                        {{ $article->user->name }}
                    </p>
                </div>
                <div class="date text-sky-900 font-bold">
                    <p>{{ $article->created_at->format('M d , Y') }}</p>
                </div>
                @if (Auth::user())
                    <a href="{{ '/article/' . encrypt($article->id) . '/edit' }}">
                        <div
                            class="absolute right-0 lg:right-24 edit flex items-center py-[3.6px] rounded-2xl px-[7.5px] text-white gap-1 bg-gradient-to-r from-purple-500 to-cyan-600">
                            <span class="material-symbols-outlined cursor-pointer flex items-center">
                                edit
                            </span>
                            Edit Artikel
                        </div>
                    </a>
                @endif
            </div>




            <div class="article-title mb-4">
                <h1 class="lg:text-[2.6rem] md:text-[2.3rem] text-[2rem] font-bold text-sky-900 ">{{ $article->title }}
                </h1>
            </div>
            <div class="article-images pr-0 md:pr-2 lg:pr-24 overflow-hidden mb-8 mt-4">
                <img src="{{ asset('storage/thumbnail/' . $article->images) }}" alt="imagethumbnail"
                    class="w-full h-full object-cover rounded-lg">
            </div>
            <div class="article-desc md:pr-8 pr-4 lg:pr-24">
                <p>{!! html_entity_decode($article->description) !!}</p>
            </div>

        </div>

    </main>
    <div class="mb-96"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/sintaxhighlightning.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
@endsection
