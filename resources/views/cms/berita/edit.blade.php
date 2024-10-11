@extends('cms.main')
@section('link')
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
@section('content')
    <div class="m-10 p-5">

        <div class="grid grid-cols-1 gap-3">
            <div class="">
                <form class="max-w-full" enctype="multipart/form-data" action="{{ route('berita.update') }}" method="post">
                    @csrf

                    <input type="hidden" name="id" value="{{ $berita->id }}">
                    <x-input field="judul" label="Judul Berita" type="text" placeholder=" "
                        value="{{ $berita->judul }}"></x-input>
                    <x-input field="tanggal" label="Tanggal" type="date" placeholder=" "
                        value="{{ $berita->tanggal }}"></x-input>
                    <label for="category_id"
                        class="block mb-2 text-sm my-2 font-medium text-gray-900 dark:text-white">Select
                        a
                        Category</label>
                    <select id="category_id" name="category_id"
                        class="mb-2 text-dark bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-dark dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($category as $ct)
                            <option value="{{ $ct->id }}"
                                {{ old('category_id', $berita->category_id) == $ct->id ? 'selected' : '' }}>
                                {{ $ct->nama }}
                            </option>
                        @endforeach
                    </select>

                    <div class="relative z-0 w-full mb-5 group">
                        <input type="hidden" name="oldSampul" value="{{ $berita->cover }}">
                        <img class="img-preview max-w-[200px]" src="{{ asset('berita/cover-berita/' . $berita->cover) }}">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="user_avatar">Cover</label>
                        <input
                            class="@error('cover') is-invalid @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none "
                            aria-describedby="user_avatar_help" id="cover" name="cover" type="file"
                            onchange="previewImage()">
                    </div>
                    @error('cover')
                        <div class="text-red-400">
                            {{ $message }}
                        </div>
                    @enderror

                    <textarea id="summernote" name="editordata">{{ $berita->artikel }}</textarea>

                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="status" value="published" class="sr-only peer"
                            @if ($berita->status == 'published') checked @endif>
                        <div
                            class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                        <span class="ms-3 text-lg font-bold text-gray-900 dark:text-gray-300">Published</span>
                    </label>
                    <br>
                    <button type="submit"
                        class="my-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('script')
    {{-- Preview Image --}}
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({

                placeholder: "Tulis artikel disini....",
                tabsize: 2,
                height: 200
            });
        });
    </script>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#cover');
            const imgPreview = document.querySelector('.img-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
@endsection
@include('cms.partials.script')
