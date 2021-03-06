@extends('layouts.app')

@section('content')

    <header>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold leading-tight text-gray-900">
                Question
            </h2>
        </div>
    </header>

    <main>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-8 sm:px-0">
                <div class="mb-6 bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                    <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                        <div class="ml-4 mt-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-12 w-12 rounded-full" src="{{ $question->user->gravatar }}" alt="{{ $question->user->name }}"/>
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
                                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md {{ $question->getTextColorForStatusBadge() .' ' . $question->getBackgroundColorForStatusBadge() }} hover:text-gray-600 focus:outline-none focus:shadow-outline focus:border-blue-300">
                                    <span>{{ $question->status }}</span>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <span class="font-bold leading-tight">Question</span>
                        <p class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">{{ $question->body }}</p>
                    </div>
                </div>

                @if(!empty($question->answers) && $question->answers->count())
                    @foreach($question->answers as $answer)
                        <div class="mb-6 bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                                <div class="ml-4 mt-4">
                                    <div class="flex items-center">
                                        <p class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">{{ $answer->body }}</p>
                                    </div>
                                </div>
                                <div class="ml-4 mt-4 flex-shrink-0 flex">
                                    <p class="text-sm leading-5 text-gray-500">
                                        <span class="font-bold">{{ $answer->user->name }}</span> <span>{{ $answer->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


                @if($question->user_id != auth()->user()->id)
                    <form class="w-full max-w-lg" method="POST" action="{{ route('answers.create') }}">
                        @csrf

                        <input type="hidden" name="question" value="{{ $question->uuid }}">

                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="body">
                                    Add an answer
                                </label>
                                <textarea id="body" name="body"
                                          class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-24 resize-none"
                                          required></textarea>
                            </div>
                        </div>
                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3">
                                <button type="submit"
                                        class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                    Add
                                </button>
                            </div>
                            <div class="md:w-2/3"></div>
                        </div>
                    </form>
                @endif

            </div>
        </div>
    </main>
@endsection
