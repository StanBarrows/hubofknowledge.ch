@extends('layouts.app')

@section('content')

    <header>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-4">
            <h2 class="text-3xl font-bold leading-tight text-gray-900">
                {{ __('associations.title') }}
            </h2>
        </div>
    </header>

    <main>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-2 sm:px-0">
                @if(!empty($associations) && $associations->count())

                    @foreach($associations as $association)
                        <div class="mb-6 bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                                <div class="ml-4 mt-4">
                                    <div class="flex items-center">

                                        <div class="flex-shrink-0">
                                            <img class="h-12 w-12 rounded-full"
                                                 src="{{ $association->question->user->gravatar }}"
                                                 alt="{{ $association->question->user->name }}"/>
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                {{ $association->question->user->name }}
                                            </h3>
                                            <p class="text-sm leading-5 text-gray-500">
                                                <span>{{ $association->question->created_at->diffForHumans() }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-4 mt-4 flex-shrink-0 flex">
                                    <span class="inline-flex rounded-md shadow-sm">
                                          <span
                                              class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md {{ $association->question->getTextColorForStatusBadge() .' ' . $association->question->getBackgroundColorForStatusBadge() }} hover:text-gray-600 focus:outline-none focus:shadow-outline focus:border-blue-300">
                                            <span>{{ $association->question->status }}</span>
                                        </span>
                                    </span>

                                    @if($association->status === \App\Models\Association::STATUS_ASSOCIATED)

                                        <span class="ml-3 inline-flex rounded-md shadow-sm">

                                                  <form class="" method="POST"
                                                        action="{{ route('associations.accept') }}">
                                                      @csrf

                                                        <input type="hidden" name="association" value="{{ $association->uuid }}">

                                                <button type="submit"
                                                   class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-white bg-green-400 hover:text-gray-100 focus:outline-none focus:shadow-outline focus:border-blue-300">
                                                    <span>Accept</span>
                                                </button>
                                            </form>

                                    </span>

                                        <span class="ml-3 inline-flex rounded-md shadow-sm">
                                            <form class="" method="POST"
                                                  action="{{ route('associations.decline') }}">
                                                      @csrf

                                                   <input type="hidden" name="association" value="{{ $association->uuid }}">

                                                <button type="submit"
                                                   class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-white bg-red-400 hover:text-gray-100 focus:outline-none focus:shadow-outline focus:border-blue-300">
                                                    <span>Decline</span>
                                                </button>
                                            </form>

                                    </span>

                                    @elseif($association->status === \App\Models\Association::STATUS_ACCEPTED)
                                        <span class="ml-3 inline-flex rounded-md shadow-sm">
                                     <a href="{{ route('associations.show', $association) }}"
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-600 focus:outline-none focus:shadow-outline focus:border-blue-300">
                                         <span>Show</span>
                                     </a>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="mt-4">
                                <span class="font-bold leading-tight">Question</span>
                                <p class="mt-1 leading-5 text-gray-900 sm:mt-0 sm:col-span-2">{{ $association->question->body }}</p>
                            </div>
                        </div>

                    @endforeach

                @else
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mt-4"
                         role="alert">
                        <div class="flex">
                            <div class="py-1">
                                <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path
                                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold">No assigned questions available!</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>

@endsection
