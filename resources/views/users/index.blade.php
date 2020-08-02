@extends('layouts.app')

@section('content')

    <header>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold leading-tight text-gray-900">
                {{ __('users.title') }}
            </h2>
        </div>
    </header>

    <main>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-8 sm:px-0">

                @foreach($users as $user)
                    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                        <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                            <div class="ml-4 mt-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="h-12 w-12 rounded-full" src="{{ $user->gravatar }}" alt="{{ $user->name }}"/>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $user->name }}</h3>
                                        <p class="text-sm leading-5 text-gray-500">
                                            <a target="_blank" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-4 mt-4 flex-shrink-0 flex">
                                @foreach($user->roles->pluck('name') as $role)
                                    <span class="ml-3 inline-flex rounded-md shadow-sm">
                                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-600 focus:outline-none focus:shadow-outline focus:border-blue-300">
                                           {{ $role }}
                                        </span>
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
