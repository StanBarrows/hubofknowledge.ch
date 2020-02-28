@extends('layouts.app')

@section('content')


    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        @if(!empty($users) && $users->count())
            <ul>
            @foreach($users as $user)
                    <li>
                        <a href="#"
                           class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                            <div class="flex items-center px-4 py-4 sm:px-6">
                                <div class="min-w-0 flex-1 flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="h-12 w-12 rounded-full"
                                             src="{{ $user->gravatar }}"
                                             alt="{{ $user->name }}"/>
                                    </div>
                                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                        <div>
                                            <div class="text-sm leading-5 font-medium text-indigo-600 truncate">{{ $user->name }}
                                            </div>
                                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor"
                                                     viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                          d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884zM18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                                <span class="truncate">{{ $user->email }}</span>
                                            </div>
                                        </div>
                                        <div class="hidden md:block">
                                            <div>
                                                <div class="text-sm leading-5 text-gray-900">
                                                    Created at
                                                    <time datetime="2020-01-07">{{ $user->created_at->diffForHumans() }}</time>
                                                </div>
                                                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                                    {{ $user->getRoleNames() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
            @endforeach
            </ul>
        @else
            No users
        @endif
    </div>

@endsection
