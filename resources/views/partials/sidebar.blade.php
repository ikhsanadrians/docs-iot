<aside class="w-64 mt-8 ml-8 h-full md:block hidden lg:block sticky top-24" aria-label="Sidebar">
    <div class="overflow-y-auto py-4 px-3 bg-[#f7f7f7] rounded dark:bg-gray-800/0">
        <ul class="space-y-2">
            @foreach ($categories as $category)
                @if (View::hasSection('contents'))
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-lg font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 hover:translate-x-2 duration-500">
                            <div class="icon">
                                {!! $category->icon !!}
                            </div>
                            <span
                                class="ml-3 font-semibold text-sky-900  dark:text-slate-400">{{ $category->name }}</span>
                        </a>
                    </li>
                @else
                    @if (!$perarticle->id || $perarticle->id != $category->id)
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-slate-400 hover:bg-gray-200 dark:hover:bg-gray-700 hover:translate-x-2 duration-500">
                                <div class="icon">
                                    {!! $category->icon !!}
                                </div>
                                <span
                                    class="ml-3 font-semibold text-sky-900 dark:text-slate-400">{{ $category->name }}</span>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="#"
                                class="flex items-center p-2  bg-gray-200 text-base dark:text-slate-300 font-normal text-gray-900 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 hover:translate-x-2 duration-500">
                                <div class="icon">
                                    {!! $category->icon !!}
                                </div>
                                <span class="ml-3 font-semibold text-sky-900 ">{{ $category->name }}</span>
                            </a>
                        </li>
                    @endif
                @endif
            @endforeach

        </ul>

    </div>
</aside>
<style>
    .icon img {
        height: 20px;
    }
</style>
