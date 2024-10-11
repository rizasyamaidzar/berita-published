@extends('cms.main')
@section('content')
    <div class="container mx-auto p-24">
        <h1 class="font-bold text-4xl text-center dark:text-white mb-4">{{ $berita->judul }}</h1>
        <img src="{{ asset('berita/cover-berita/' . $berita->cover) }}" alt="tidak ada"
            class="mx-auto w-[300px] delay-[300ms] duration-[600ms] taos:translate-x-[200px] taos:opacity-0 [animation-iteration-count:infinite]"
            data-taos-offset="100">
        <p class=" font-bold dark:text-white text-center mb-10 mt-5 delay-[300ms] duration-[600ms] taos:translate-y-[-200px] taos:opacity-0 [animation-iteration-count:infinite]"
            data-taos-offset="10">{!! $berita->artikel !!}</p>
    </div>
@endsection
