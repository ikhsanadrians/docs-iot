@extends('layouts.master')
@section('content')
    <style>
        .article-desc a {
            color: #031B4E;
            text-decoration: underline;

        }

        .article-desc p {
            line-height: 2.2;
            color: #031B4E;
        }

        .article-desc h1 {
            color: #222220;
            font-weight: 500;

        }

        .article-desc pre {
            padding: 20px;
            border: 0px solid black;
            background: #1d1f21;

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

            .article-desc>h1 {
                font-size: 25px;
                color: #031B4E;
            }



        }

        .article-desc>h1 {
            font-size: 30px;
            color: #031B4E;
        }

        .article-desc img {
            margin-top: 10px;
            margin-bottom: 15px;
        }



        .article-desc ul {

            margin-top: 5px;
            border-left: 10px solid rgb(12, 37, 92);
            background: #031B4E;
            padding: 20px;
            color: whitesmoke;
            border-radius: 10px;
            font-family: monospace;

        }

        .article-desc>ol>li span {
            color: #031B4E;
        }

        /* .article-desc > strong,
                                                                                                                                                                                                                                                                                        h1,
                                                                                                                                                                                                                                                                                        h2,
                                                                                                                                                                                                                                                                                        h3,
                                                                                                                                                                                                                                                                                        h4,
                                                                                                                                                                                                                                                                                        h5,
                                                                                                                                                                                                                                                                                        span {
                                                                                                                                                                                                                                                                                            color: #031B4E;
                                                                                                                                                                                                                                                                                        } */

        .article-desc img {
            width: 100%;
            object-fit: cover;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <main class="pl-0 pr-2 lg:pl-[1.5rem] lg:pt-[3.3rem]  w-full h-full pt-12 mb-16">
        <div class="container w-full h-full">

            <div class="authoranddate flex gap-2 relative items-center">

                <div class="author cursor-pointer max-w-fit flex gap-2">
                    <div class="img h-8 w-8 overflow-hidden rounded-full">


                        @if (!$article->user->user_profile)
                            <img src="https://doimages.nyc3.digitaloceanspaces.com/46f22fba-7718-478b-86ae-e8b875f0473e_default-avatar.jpeg"
                                alt="" class="object-cover">
                        @else
                            <img src="{{ asset('storage/userprofile/' . $article->user->user_profile) }}" alt=""
                                class="object-cover shadow-md">
                        @endif
                    </div>
                    <p
                        class="md:text-l text-xs lg:text-base duration-200 items-center flex hover:bg-blue-500 hover:text-white bg-sky-200 px-4 py-[1.8px] rounded-lg font-semibold text-sky-600">

                        {{ $article->user->name }}

                    </p>
                </div>
                <div class="date text-sky-900 font-normal items-center lg:text-base md:text-md text-sm">
                    <p>Published on {{ $article->created_at->format('M d , Y') }}</p>
                </div>
                @if (!Auth::user() || Auth::user()->role != 'moderator')
                @elseif(Auth::user()->role == 'moderator')
                    <a href="{{ '/article/' . encrypt($article->id) . '/edit' }}"
                        class="flex font-semibold justify-end border-[1.5px] text-sky-600 border-sky-600
                        px-2 py-1 rounded-lg hover:text-white hover:bg-gradient-to-r
                         hover:from-blue-500 hover:to-sky-500 duration-300
                         hover:border-0">
                        <span class="material-symbols-outlined cursor-pointer ">
                            edit
                        </span>
                        Edit Article
                    </a>
                @endif
            </div>



            <div class="article-title mb-2">
                <h1 class="lg:text-[2.6rem] md:text-[2.3rem] text-[1.8rem] font-bold text-[#031b4e] ">{{ $article->title }}
                </h1>
            </div>
            <div class="article-category flex gap-2 mb-2">
                @foreach ($article->categories as $perarticle)
                    <p
                        class="bg-slate-200 px-2 py-[1.2px] rounded-md shadow-sm text-[#031b4e] font-semibold flex items-center gap-1">
                        {!! $perarticle->icon !!}{{ $perarticle->name }}
                    </p>
                @endforeach
            </div>
            <div class="article-images pr-0 md:pr-2 lg:pr-8 overflow-hidden mb-8 mt-4 user-select">
                <img src="{{ asset('storage/thumbnail/' . $article->images) }}" alt="imagethumbnail"
                    class="w-full h-full object-cover rounded-lg">
            </div>
            <div class="article-desc md:pr-8 lg:pr-8">
                <p>{!! html_entity_decode($article->description) !!}</p>
            </div>

        </div>

    </main>

    <div class="mb-96"></div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sintaxhighlightning.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
@endsection
