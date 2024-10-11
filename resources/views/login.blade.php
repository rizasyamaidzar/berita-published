@extends('main')
@section('content')
    <div class="w-screen min-h-screen flex items-center justify-center bg-gray-50 px-4 sm:px-6 lg:px-8">
        <div class="relative py-40 sm:max-w-xl sm:mx-auto">

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="min-h-96 px-8 py-6 mt-4 text-left bg-white  rounded-xl shadow-lg">
                    <div class="flex flex-col justify-center items-center h-full select-none">
                        <div class="flex flex-col items-center justify-center gap-2 mb-8">
                            <p class="m-0 text-xl font-semibold">Login to your Account</p>
                            <span class="m-0 text-xs max-w-[90%] text-center text-[#8B8E98]">Get started with our app, just
                                start section and enjoy experience.
                            </span>
                            @if (session()->has('loginError'))
                                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-dark dark:text-red-400"
                                    role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Danger</span>
                                    <div>
                                        <span class="font-medium">Ensure that these requirements are met:</span>
                                        <ul class="mt-1.5 list-disc list-inside">

                                            <li>{{ session('loginError') }}</li>

                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="w-full flex flex-col gap-2">
                            <x-input field="name" label="Username" type="text" value="{{ old('name') }}"
                                placeholder=""></x-input>
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-2">
                        <x-input field="password" label="Password" type="password" placeholder=""></x-input>
                    </div>
                    <div className="mt-5">
                        <button
                            class="py-1 px-8 bg-orange-500 hover:bg-orange-800 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg cursor-pointer select-none">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
