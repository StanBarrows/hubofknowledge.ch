<nav x-data="{ open: true }" class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <div class="hidden md:ml-6 md:flex">
                    <a href="{{ route('start.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out {{ Route::current()->getName() !== 'start.index' ? 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:text-gray-700 focus:border-gray-300' : 'border-indigo-500 text-gray-900 focus:border-indigo-700' }}">
                        {{ __('layouts.navigation.start') }}
                    </a>
                    <a href="{{ route('questions.index') }}" class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out {{ Route::current()->getName() !== 'questions.index' ? 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:text-gray-700 focus:border-gray-300' : 'border-indigo-500 text-gray-900 focus:border-indigo-700' }}">
                        {{ __('layouts.navigation.questions') }}
                    </a>
                </div>
            </div>
            <div class="flex items-center">

                <div class="hidden md:ml-4 md:flex-shrink-0 md:flex md:items-center">

                    <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
                        <div>
                            <button @click="open = !open" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->gravatar }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        </div>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
                            <div class="rounded-md bg-white shadow-xs">
                                <div class="px-4 py-3">
                                    <p class="text-sm leading-5">
                                        Signed in as
                                    </p>
                                    <p class="text-xs leading-5 font-medium text-gray-900">
                                        {{ Auth::user()->email }}
                                    </p>
                                </div>
                                <div class="border-t border-gray-100"></div>
                                <div class="py-1">
                                    <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">{{ __('layouts.navigation.profile') }}</a>
                                    <a target="_blank" href="mailto:{{ config('hok.support_email') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">{{ __('layouts.navigation.support') }}</a>
                                </div>
                                <div class="border-t border-gray-100"></div>
                                <div class="py-1">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">{{ __('layouts.navigation.sign_out') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden">
        <div class="pt-2 pb-3">
            <a href="{{ route('start.index') }}" class="block pl-3 pr-4 py-2 border-l-4 border-indigo-500 text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out sm:pl-5 sm:pr-6">{{ __('layouts.navigation.start') }}</a>
            <a href="{{ route('questions.index') }}" class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out sm:pl-5 sm:pr-6">{{ __('layouts.navigation.questions') }}</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4 sm:px-6">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->gravatar }}" alt="{{ Auth::user()->name }}" />
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-6 text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium leading-5 text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out sm:px-6">{{ __('layouts.navigation.profile') }}</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mt-1 block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out sm:px-6">{{ __('layouts.navigation.sign_out') }}</a>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        {{ csrf_field() }}
    </form>

</nav>
