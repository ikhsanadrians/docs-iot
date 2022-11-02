 @extends('layouts.master')
 @section('contents')
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

             <div class="articles-menu w-full h-full mt-12 grid-rows-none">
                 <div class="articles-inner flex gap-2 flex-wrap">
                     @foreach ($articleall as $article)
                         <a href="{{ '/article/' . $article->slug }}">
                             <div class="articlecard w-full bg-slate-100 shadow-lg rounded-lg p-2 md:w-[90%] lg:w-[30%] relative mb-2 min-h-full overflow-hidden"
                                 id="article">
                                 <div class="picture w-full h-1/2 rounded-2xl overflow-hidden ">
                                     <img src="{{ asset('storage/thumbnail/' . $article->images) }}" loading="lazy"
                                         alt="" class="brightness-100 object-cover w-full h-full">
                                 </div>
                                 <div class="title w-full flex flex-col gap-2  h-full mt-2 px-2">
                                     <div class="article-info flex gap-2 items-center text-[#031b4e]">
                                         <p class="font-semibold">{{ $article->created_at->format('d M') }}</p>
                                         @foreach ($article->categories as $percategory)
                                             <p id="tech-stack"
                                                 class="font-semibold flex text-sm items-center shadow-sm gap-1 bg-sky-100 px-2 py-[0.3px] rounded-lg">
                                                 {!! $percategory->icon !!}
                                                 {{ $percategory->name }}</p>
                                         @endforeach
                                     </div>
                                     <div class="title-article mb-8">
                                         <a href="{{ '/article/' . $article->slug }}">
                                             <h1 class="font-bold text-lg text-[#031b4e] cursor-pointer hover:opacity-80">
                                                 {{ Str::limit($article->title, 40) }}
                                             </h1>
                                         </a>

                                     </div>
                                     {{-- <div class="title-description">
                                    <p class="text-[#031b4e]">{!! $article->short_description !!}</p>
                                </div> --}}
                                     <div class="posted-by bottom-2 absolute">
                                         <p class="text-slate-500 font-normal">Posted by {{ $article->user->name }}</p>
                                     </div>

                                 </div>

                             </div>
                         </a>
                     @endforeach
                 </div>


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
