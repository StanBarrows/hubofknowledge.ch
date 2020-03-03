@extends('layouts.default')

@section('content')


    <div class="min-h-screen bg-white flex">

        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm">
                <div>
                    <h2 class="mt-6 text-3xl leading-9 font-extrabold text-gray-900">
                        {{ __('Reset your password') }}
                    </h2>
                </div>

                <div class="mt-8">
                    <div class="mt-6">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div>
                                <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                                    {{ __('E-Mail Address') }}
                                </label>
                                <div class="mt-1 rounded-md shadow-sm">
                                    <input id="email" name="email" type="email" placeholder="{{ old('email') }}" value="{{ optional(request())->email }}"
                                           required autocomplete="email"
                                           class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                                </div>

                                @error('email')
                                <p class="text-red-500 text-xs italic mt-1">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                                    {{ __('Password') }}
                                </label>
                                <div class="mt-1 rounded-md shadow-sm">
                                    <input id="password" name='password' type="password" required autofocus autocomplete="new-password"
                                           class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                                </div>

                                @error('password')
                                <p class="text-red-500 text-xs italic mt-1">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="mt-6">
                                <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">
                                    {{ __('Confirm Password') }}
                                </label>
                                <div class="mt-1 rounded-md shadow-sm">
                                    <input id="password_confirmation" name='password_confirmation' type="password" required autocomplete="new-password"
                                           class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                                </div>
                            </div>

                            <div class="mt-6">
              <span class="block w-full rounded-md shadow-sm">
                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    {{ __('Reset Password') }}
                </button>
              </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover"
                 src="{{ asset('images/hok_login_background.jpg') }}" alt="{{ config('app.name') }}"/>
        </div>
    </div>


@endsection
