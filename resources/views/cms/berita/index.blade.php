@extends('cms.main')
@section('content')
    <div class="m-10 p-5">
        <a href="{{ route('berita.create') }}" data-modal-target="authentication-modal"
            data-modal-toggle="authentication-modal"
            class="block my-5 w-52 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Add Data Berita
        </a>
        {{-- Alert Success --}}
        @if (session('success'))
            <div id="alert-border-3"
                class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    Success alert!</span> {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-border-3" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        {{-- End Alert  --}}
        <table id="search-table" class="dark:bg-darker">
            <thead>
                <tr>
                    <th>
                        <span class="flex items-center text-primary">
                            Nomor
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center text-primary">
                            Judul
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center text-primary">
                            Category
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>

                    </th>
                    <th>
                        <span class="flex items-center text-primary">
                            Tanggal
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center text-primary">
                            Deskripsi
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>

                    <th class="text-primary">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beritas as $berita)
                    <tr>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</td>

                        <td class="dark:text-gray-200">{{ $berita->judul }}</td>
                        <td class="dark:text-gray-200">{{ $berita->category_id }}</td>
                        <td class="dark:text-gray-200">{{ $berita->tanggal }}</td>
                        <td class="dark:text-gray-200">
                            {{ strlen($berita->artikel) > 50 ? substr($berita->artikel, 0, 50) . '...' : $berita->artikel }}
                        </td>
                        <td>
                            <div class="flex">
                                <a href="{{ route('berita.show', ['id' => $berita->id]) }}"
                                    class="block my-5 text-white bg-primary hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center dark:bg-b;ue-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">View</a>
                                <a href="{{ route('berita.edit', ['id' => $berita->id]) }}"
                                    class="mx-2 block my-5 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</a>
                                <button
                                    class="block my-5 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                    onclick="openModal('modelConfirm{{ $berita->id }}')">
                                    Delete
                                </button>
                            </div>
                            {{-- INI FORM DELETE --}}
                            <div id="modelConfirm{{ $berita->id }}"
                                class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                                <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">

                                    <div class="flex justify-end p-2">
                                        <button onclick="closeModal('modelConfirm{{ $berita->id }}')" type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="p-6 pt-0 text-center">
                                        <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want
                                            to
                                            delete this <span class="font-bold text-primary"> {{ $berita->judul }}
                                            </span>?</h3>
                                        <form action="{{ route('berita.delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $berita->id }}">
                                            <button type="submit"
                                                class="text-white mt-5 mb-2 bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                        </form>

                                        <a href="#" onclick="closeModal('modelConfirm{{ $berita->id }}')"
                                            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                                            data-modal-toggle="delete-user-modal">
                                            No, cancel
                                        </a>
                                    </div>

                                </div>
                            </div>
                            {{-- END FORM DELETE --}}

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
@include('cms.partials.script')
