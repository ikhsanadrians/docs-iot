 @extends('layouts.master')
 @section('contents')
     <div class="container -z-1 mt-10 flex justify-center w-full h-full lg:px-20 mb-[2500px]">
         <div class="container-inner w-full h-full">


             <div class="articles-menu w-full h-full  grid-rows-none">
                 <div class="articles-inner flex gap-2 flex-wrap h-full w-full">
                     @if (!Auth::user() || Auth::user()->role != 'moderator')
                         @foreach ($articleall as $article)
                             @if ($article->article_type_id != 2)
                                 <a href="{{ '/article/' . $article->slug }}">
                                     <div class="articlecard w-full h-full bg-slate-100 dark:bg-slate-800 dark:border-[1.2px] dark:border-slate-600 shadow-lg hover:scale-105 hover:shadow-2xl duration-300 rounded-lg p-2 md:w-[90%] lg:w-[31%] relative mb-2 min-h-full overflow-hidden"
                                         id="article">
                                         <div class="picture w-full h-1/2 rounded-2xl overflow-hidden ">
                                             <img src="{{ asset('storage/thumbnail/' . $article->images) }}" loading="lazy"
                                                 alt="" class="brightness-100 object-cover w-full h-full">
                                         </div>
                                         <div class="title w-full flex flex-col gap-2  h-full mt-2 px-2">
                                             <div class="article-info flex gap-2 items-center text-[#031b4e]">

                                                 @foreach ($article->categories as $percategory)
                                                     <p id="tech-stack"
                                                         class="font-semibold flex text-sm items-center shadow-sm gap-1 bg-sky-100 dark:text-slate-400 dark:bg-slate-700 dark:border-[1.2px] dark:border-slate-600 px-2 py-[0.3px] rounded-lg">
                                                         {!! $percategory->icon !!}
                                                         {{ $percategory->name }}</p>
                                                 @endforeach
                                             </div>
                                             <div class="title-article mb-8">
                                                 <a href="{{ '/article/' . $article->slug }}">
                                                     <h1
                                                         class="font-bold text-lg text-[#031b4e] dark:text-slate-400 cursor-pointer hover:opacity-80">
                                                         {{ $article->title }}
                                                     </h1>
                                                 </a>

                                             </div>
                                             {{-- <div class="title-description">
                                    <p class="text-[#031b4e]">{!! $article->short_description !!}</p>
                                </div> --}}
                                             <div class="posted-by bottom-2 absolute">
                                                 <p class="text-slate-500 font-normal">Posted by {{ $article->user->name }}
                                                 </p>

                                             </div>


                                         </div>

                                     </div>
                                 </a>
                             @endif
                         @endforeach
                     @else
                         @foreach ($articleall as $article)
                             <a href="{{ '/article/' . $article->slug }}">
                                 <div class="articlecard w-full h-full bg-slate-100 dark:bg-slate-800 dark:border-[1.2px] dark:border-slate-600 shadow-lg hover:scale-105 hover:shadow-2xl duration-300 rounded-lg p-2 md:w-[90%] lg:w-[31%] relative mb-2 min-h-full overflow-hidden"
                                     id="article">
                                     <div class="picture w-full h-1/2 rounded-2xl overflow-hidden ">
                                         <img src="{{ asset('storage/thumbnail/' . $article->images) }}" loading="lazy"
                                             alt="" class="brightness-100 object-cover w-full h-full">
                                     </div>
                                     <div class="title w-full flex flex-col gap-2  h-full mt-2 px-2">
                                         <div class="article-info flex gap-2 items-center text-[#031b4e]">

                                             @foreach ($article->categories as $percategory)
                                                 <p id="tech-stack"
                                                     class="font-semibold flex text-sm items-center shadow-sm gap-1 bg-sky-100 dark:text-slate-400 dark:bg-slate-700 dark:border-[1.2px] dark:border-slate-600 px-2 py-[0.3px] rounded-lg">
                                                     {!! $percategory->icon !!}
                                                     {{ $percategory->name }}</p>
                                             @endforeach
                                         </div>
                                         <div class="title-article mb-8">
                                             <a href="{{ '/article/' . $article->slug }}">
                                                 <h1
                                                     class="font-bold text-lg text-[#031b4e] dark:text-slate-400 cursor-pointer hover:opacity-80">
                                                     {{ $article->title }}
                                                 </h1>
                                             </a>

                                         </div>
                                         {{-- <div class="title-description">
                                    <p class="text-[#031b4e]">{!! $article->short_description !!}</p>
                                </div> --}}
                                         <div class="posted-by bottom-2 absolute">

                                             <p class="text-slate-500 font-normal flex items-center">
                                                 Posted by
                                                 {{ $article->user->name }}
                                             </p>

                                         </div>
                                         @if ($article->article_type_id == 2)
                                             <ion-icon name="lock-closed"
                                                 class="text-base text-sky-900 absolute right-4 bottom-4"></ion-icon>
                                         @endif
                                     </div>

                                 </div>
                             </a>
                         @endforeach
                     @endif
                 </div>


             </div>


         </div>



     </div>
     <script src="{{ asset('js/jquery.min.js') }}"></script>
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
