@extends('layouts.app')

@section('content')

    @hasanyrole('expert')
    @else
    <header>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold leading-tight text-gray-900">
                Ask a question
            </h2>


        </div>
    </header>
    <main>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="px-4 py-2 sm:px-0">



                <form class="w-full max-w-lg" method="POST" action="{{ route('questions.create') }}">


                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="body">
                                Body
                            </label>
                            <textarea id="body" name="body"
                                      class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-24 resize-none"
                                      required>{{ old('body') }}</textarea>
                        </div>
                    </div>

                    @if (flash()->message)
                        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ flash()->message }}</span>
                        </div>
                    @endif

                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3">
                            <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                Ask
                            </button>
                        </div>
                        <div class="md:w-2/3"></div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @endhasanyrole

    <header>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold leading-tight text-gray-900">
                My questions
            </h2>
        </div>
    </header>

    <main>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-8 sm:px-0">

                @if(!empty($questions) && $questions->count())

                    @foreach($questions as $question)
                        <div class="mb-6 bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                                <div class="ml-4 mt-4">
                                    <div class="flex items-center">

                                        <div class="flex-shrink-0">
                                            <img class="h-12 w-12 rounded-full" src="{{ $question->user->gravatar }}"
                                                 alt="{{ $question->user->name }}"/>
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                {{ $question->user->name }}
                                            </h3>
                                            <p class="text-sm leading-5 text-gray-500">
                                                <span>{{ $question->created_at->diffForHumans() }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-4 mt-4 flex-shrink-0 flex">
                                    <span class="inline-flex rounded-md shadow-sm">
                                          <span
                                              class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md {{ $question->getTextColorForStatusBadge() .' ' . $question->getBackgroundColorForStatusBadge() }} hover:text-gray-600 focus:outline-none focus:shadow-outline focus:border-blue-300">
                                            <span>{{ $question->status }}</span>
                                        </span>
                                    </span>

                                    <span class="ml-3 inline-flex rounded-md shadow-sm">
                                     <a href="{{ route('questions.show', $question) }}"
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-600 focus:outline-none focus:shadow-outline focus:border-blue-300">
                                         <span>Show</span>
                                     </a>
                                    </span>
                                </div>
                            </div>

                            <div class="mt-4">
                                <span class="font-bold leading-tight">Question</span>
                                <p class="mt-1 leading-5 text-gray-900 sm:mt-0 sm:col-span-2">{{ $question->body }}</p>
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
                                <p class="font-bold">No questions available!</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>

@endsection
