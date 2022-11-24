@extends('Auth.dashboard')
@section('tool')
    @foreach ($categories as $category)
        <div class="container w-full h-full">
            <div class="inner flex flex-col w-full h-full">
                <div class="category-details w-full">
                    <h1>Category Details</h1>
                    <div class="titlecategory mt-2" id="iconsearchcats">
                        {!! $category->icon !!}
                        <h1 class="text-4xl font-bold">{{ $category->name }}</h1>
                    </div>
                </div>
                <div class="statistic w-full h-[20rem] mt-4 flex flex-col md:flex-row lg:flex-row gap-2">
                    <div
                        class="article-posted rounded-lg md:w-full w-full lg:w-1/2 p-4 h-full bg-gradient-to-r flex justify-center items-center from-sky-500 to-blue-500">
                        @foreach ($category->articles as $article)
                            <h1 class="text-5xl text-center text-white "><span
                                    class="text-[10rem]">{{ $article->count() }}</span><br>Article Posted</h1>
                        @endforeach
                    </div>
                    <div
                        class="user-using rounded-lg p-4 md:w-full w-full lg:w-1/2  h-full bg-gradient-to-r from-blue-500 to-sky-500">

                    </div>
                </div>


            </div>
        </div>
    @endforeach
@endsection
