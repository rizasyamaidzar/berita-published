@extends('main')
@section('content')
    <!-- News 3 terbaru  -->
    <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-80 overflow-hidden rounded-lg md:h-96 md:mt-5 mt-5 md:mx-10">
            <!-- menampilkan data related -->
            @foreach ($hotnews as $news)
                <div class="hidden  ease-in-out duration-300 " data-carousel-item>
                    <div class="absolute block max-w-full h-auto ">
                        <a href="news/{{ $news->judul }}"
                            class="flex flex-col items-center bg-white  border-gray-200 shadow md:flex-row md:max-w-xl hover:bg-gray-10">
                            <a href="news/{{ $news->judul }}">
                                <!-- image - start -->
                                <a href="news/{{ $news->judul }}"
                                    class="group relative flex h-48 items-end overflow-hidden bg-gray-100 shadow-lg md:col-span-2 md:h-80">
                                    <img src="{{ asset('berita/cover-berita/' . $news->cover) }}" loading="lazy"
                                        alt="Photo by Magicle"
                                        class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                                    <div
                                        class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                                    </div>

                                    <span
                                        class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">{{ $news->tanggal }}</span>
                                </a>
                                <!-- image - end -->
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-3xl font-bold tracking-tight text-blue-950 dark:text-white">
                                        {{ $news->judul }}</h5>
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-blue-950 dark:text-white">
                                        {{ $news->category->nama }}</h5>
                                    {{-- @php
                                        Illuminate\Support\Str;
                                    @endphp --}}
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-2">
                                        {!! $news->artikel !!}</p>
                                </div>
                            </a>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- end menampilkan data relate -->
        <!-- pagination related    -->
        <div class="flex justify-center items-center pt-4">
            <button type="button"
                class="flex justify-center items-center me-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                    <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                    <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        <!-- end pagination related -->
    </div>
    <!-- endrelate -->
    <div class="relative w-full max-w-xl mx-auto bg-white rounded-full mt-10">
        <form action="">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <input placeholder="Search...."
                class="rounded-full w-full h-16 bg-transparent py-2 pl-8 pr-32 outline-none border-2 border-gray-100 shadow-md hover:outline-none focus:ring-blue-500 focus:border-blue-500"
                type="search" name="search" id="search" autocomplete="off">
            <button type="submit"
                class="absolute inline-flex items-center h-10 px-4 py-2 text-sm text-white transition duration-150 ease-in-out rounded-full outline-none right-3 top-3 bg-orange-400 sm:px-6 sm:text-base sm:font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                <svg class="-ml-0.5 sm:-ml-1 mr-2 w-4 h-4 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Search
            </button>
        </form>
    </div>
    <!-- end news 3 terbaru -->
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 mt-10">
        @if (request('category'))
            <h1 class="text-center mb-3 text-2xl font-bold text-blue-900"> {{ request('category') }}
            </h1>
            <a href="/news">
                <h2 class="text-center my-3 font-bold text-orange-500">Back to
                    All Berita</h2>
            </a>
        @else
            <h1 class="text-center mb-3 text-2xl font-bold text-blue-900"> All Berita
            </h1>
        @endif

        {{-- isi berita  --}}
        <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">

            @foreach ($beritas as $berita)
                <div class="rounded overflow-hidden shadow-lg">
                    <a href="news/{{ $berita->judul }}"></a>
                    <div class="relative">
                        <a href="news/{{ $berita->judul }}">
                            <img class="w-full max-h-60" src="{{ asset('berita/cover-berita/' . $berita->cover) }}"
                                alt="Sunset in the mountains">
                            <div
                                class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-orange-400 opacity-25">
                            </div>
                        </a>
                        <a href="news?category={{ $berita->category->nama }}">
                            <div
                                class="absolute bottom-0 left-0 bg-orange-700 px-4 py-2 text-white text-sm hover:bg-white hover:text-blue-900 transition duration-500 ease-in-out">
                                {{ $berita->category->nama }}
                            </div>
                        </a>
                        @php
                            $date = \Carbon\Carbon::parse($berita->tanggal);
                        @endphp
                        <a href="news/{{ $berita->judul }}">
                            <div
                                class="text-sm absolute top-0 right-0 bg-orange-600 px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-blue-900 transition duration-500 ease-in-out">
                                <span class="font-bold">{{ $date->day }}</span>
                                <small>{{ $date->format('F') }}</small>
                            </div>
                        </a>
                    </div>
                    <div class="px-6 py-4">

                        <a href="news/{{ $berita->judul }}"
                            class="font-semibold text-lg inline-block hover:text-blue-900 transition duration-500 ease-in-out">
                            {{ $berita->judul }}</a>
                        <p class="text-gray-500 text-sm line-clamp-2">
                            Read more....
                        </p>
                    </div>
                    <div class="px-6 py-4 flex flex-row items-center">
                        <span href="#"
                            class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row items-center">
                            <svg height="13px" width="13px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
                                <g>
                                    <g>
                                        <path
                                            d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <span class="ml-1">{{ $berita->created_at->diffForHumans() }}</span></span>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- End isi berita  --}}
        <div class="mt-5">
            {{ $beritas->links() }}
        </div>
    </div>
@endsection
