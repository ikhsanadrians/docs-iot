@extends('layouts.master')
@section('content')
    <style>
        .article-desc a {
            color: rgb(45, 140, 229);
            text-decoration: underline;

        }

        .article-desc p {
            font-size: 20px;
            line-height: 2;

        }

        .article-desc h1 {
            font-size: 24px;
            color: #222220;
            font-weight: 500;

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

        .article-desc span {
            background: yellow;
        }
    </style>
    <main class="pl-0 lg:pl-[1.5rem] lg:pt-[3.3rem] lg:pr-[10rem] w-full h-full pt-12">
        <div class="container w-full h-full">
            <div class="article-infobar flex gap-2 items-center">
                <div class="author max-w-fit">
                    <p class="text-l bg-gradient-to-r from-blue-600 to-sky-500 px-4 py-[1.8px] rounded-2xl text-white">
                        {{ $article->user->name }}
                    </p>
                </div>
                <div class="date text-sky-900 font-bold">
                    <p>{{ $article->created_at->format('M d , Y') }}</p>
                </div>
            </div>

            <div class="article-title mb-4">
                <h1 class="lg:text-[2.6rem] md:text-[2.3rem] text-[2rem] font-bold text-sky-900 ">{{ $article->title }}
                </h1>
            </div>
            <div class="article-desc md:pr-8 pr-4 lg:pr-24">
                <p>{!! html_entity_decode($article->description) !!}</p>
            </div>

        </div>

    </main>
@endsection
