@extends('main')
@section('link')
    <style>
        .smooth {
            transition: box-shadow 0.3s ease-in-out;
        }

        ::selection {
            background-color: aliceblue
        }

        :root {
            ::-webkit-scrollbar {
                height: 10px;
                width: 10px;
            }

            ::-webkit-scrollbar-track {
                background: #efefef;
                border-radius: 6px
            }

            ::-webkit-scrollbar-thumb {
                background: #d5d5d5;
                border-radius: 6px
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #c4c4c4
            }
        }

        /*scroll to top*/
        .scroll-top {
            position: fixed;
            z-index: 50;
            padding: 0;
            right: 30px;
            bottom: 100px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(15px);
            height: 46px;
            width: 46px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all .4s ease;
            border: none;
            box-shadow: inset 0 0 0 2px #ccc;
            color: #ccc;
            background-color: #fff;
        }

        .scroll-top.is-active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .scroll-top .icon-tabler-arrow-up {
            position: absolute;
            stroke-width: 2px;
            stroke: #333;
        }

        .scroll-top svg path {
            fill: none;
        }

        .scroll-top svg.progress-circle path {
            stroke: #333;
            stroke-width: 4;
            transition: all .4s ease;
        }

        .scroll-top:hover {
            color: var(--ghost-accent-color);
        }

        .scroll-top:hover .progress-circle path,
        .scroll-top:hover .icon-tabler-arrow-up {
            stroke: var(--ghost-accent-color);
        }
    </style>
@endsection
@section('content')
    <!--Title-->
    <div class="text-center pt-16 md:pt-32">
        @php
            $date = \Carbon\Carbon::parse($berita->tanggal);
        @endphp
        <p class="text-sm md:text-base text-orange-500 font-bold">{{ strtoupper($date->format('d F Y ')) }}<span
                class="text-gray-900">/</span> {{ $berita->category->nama }}</p>
        <h1 class="font-bold break-normal text-3xl md:text-5xl">{{ $berita->judul }}</h1>
    </div>

    <!--image-->
    <div class="container w-full max-w-6xl mx-auto bg-white bg-cover mt-8 rounded"
        style="background-image:url('{{ asset('berita/cover-berita/' . $berita->cover) }}'); height: 75vh; background-size: contain; background-position: center; background-repeat: no-repeat;">
    </div>


    <!--Container-->
    <div class="container max-w-5xl mx-auto -mt-32">

        <div class="mx-0 sm:mx-6">

            <div class="bg-white w-full p-8 md:p-24 text-xl md:text-2xl text-gray-800 leading-normal"
                style="font-family:Georgia,serif;">

                <p class="">{!! $berita->artikel !!}</p>
            </div>


            <!--Author-->
            <div class="flex w-full items-center font-sans p-8 md:p-24">
                <img class="w-20 h-20 rounded-full mr-4" src="../image/logo.png" alt="Avatar of Author">
                <div class="flex-1">
                    <p class="font-bold text-base md:text-xl leading-none">Smart News</p>
                    <p class="text-gray-600 text-xs md:text-base">{{ ucfirst($berita->status) }}</p>
                    @php
                        $date = \Carbon\Carbon::parse($berita->tanggal);
                    @endphp
                    <p class="text-blue-900 font-medium">
                        {{ $date->format('d F Y') }}</p>
                    </p>

                    <p class="text-gray-600 text-xs md:text-base">Smart News <a
                            class="text-gray-800 hover:text-orange-600 no-underline border-b-2 border-orange-600">Published
                            News presents the latest and accurate news that can be accessed anytime. From local to
                            international, all important news in one platform.</a></p>
                </div>
                <div class="justify-end">

                </div>
                <!--/Author-->

            </div>


        </div>

    </div>


    <!--   Scroll Top Button  -->
    <button class="btn-toggle-round scroll-top js-scroll-top" type="button" title="Scroll to top">
        <svg class="progress-circle" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-up" width="24" height="24"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="cuurentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="18" y1="11" x2="12" y2="5" />
            <line x1="6" y1="11" x2="12" y2="5" />
        </svg>
    </button>
@endsection

@section('script')
    <script>
        /* Progress bar */
        //Source: https://alligator.io/js/progress-bar-javascript-css-variables/
        var h = document.documentElement,
            b = document.body,
            st = 'scrollTop',
            sh = 'scrollHeight',
            progress = document.querySelector('#progress'),
            scroll;
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");

        document.addEventListener('scroll', function() {

            /*Refresh scroll % width*/
            scroll = (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
            progress.style.setProperty('--scroll', scroll + '%');

            /*Apply classes for slide in bar*/
            scrollpos = window.scrollY;

            if (scrollpos > 100) {
                header.classList.remove("hidden");
                header.classList.remove("fadeOutUp");
                header.classList.add("slideInDown");
            } else {
                header.classList.remove("slideInDown");
                header.classList.add("fadeOutUp");
                header.classList.add("hidden");
            }

        });

        // scroll to top	
        const t = document.querySelector(".js-scroll-top");
        if (t) {
            t.onclick = () => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                })
            };
            const e = document.querySelector(".scroll-top path"),
                o = e.getTotalLength();
            e.style.transition = e.style.WebkitTransition = "none", e.style.strokeDasharray = `${o} ${o}`, e.style
                .strokeDashoffset = o, e.getBoundingClientRect(), e.style.transition = e.style.WebkitTransition =
                "stroke-dashoffset 10ms linear";
            const n = function() {
                const t = window.scrollY || window.scrollTopBtn || document.documentElement.scrollTopBtn,
                    n = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight, document.body
                        .offsetHeight, document.documentElement.offsetHeight, document.body.clientHeight, document
                        .documentElement.clientHeight),
                    s = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
                var l = o - t * o / (n - s);
                e.style.strokeDashoffset = l
            };
            n();
            const s = 100;
            window.addEventListener("scroll", (function(e) {
                n();
                (window.scrollY || window.scrollTopBtn || document.getElementsByTagName("html")[0]
                    .scrollTopBtn) > s ? t.classList.add("is-active") : t.classList.remove("is-active")
            }), !1)
        }
    </script>
@endsection
