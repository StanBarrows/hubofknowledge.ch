@extends('layouts.app')

@section('content')

    <header>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold leading-tight text-gray-900">
                {{ __('profile.title') }}
            </h2>
        </div>
    </header>

    <main>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-8 sm:px-0">
                <div>
                    <div class="border-t border-gray-200 pt-8">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                {{ __('profile.form.title') }}
                            </h3>
                        </div>
                        <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">
                            <div class="sm:col-span-6">
                                <label for="photo" class="block text-sm leading-5 font-medium text-gray-700">
                                    Avatar
                                </label>
                                <div class="mt-2 flex items-center">
                                        <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                              <img class="h-full w-full text-gray-300"
                                                   src="{{ Auth::user()->gravatar }}" alt="{{ Auth::user()->name }}"/>
                                        </span>
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">
                                    {{ __('profile.form.name.label') }}
                                </label>
                                <div class="mt-1 rounded-md shadow-sm">
                                    <input value="{{ Auth::user()->name }}" id="name"
                                           class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">
                                    {{ __('profile.form.email.label') }}
                                </label>
                                <div class="mt-1 rounded-md shadow-sm">
                                    <input value="{{ Auth::user()->email }}" id="email"
                                           class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
