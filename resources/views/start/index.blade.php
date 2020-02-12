@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="sm:w-ful md:w-1/2 mx-auto">

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    Aks a question
                </div>

                <div class="w-full p-6">

                    @if(flash()->message)

                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                            <p>{{ flash()->message }}</p>
                        </div>

                    @endif

                    <form class="w-full p-6" method="POST" action="{{ route('questions.ask') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                Your question:
                            </label>

                            <input id="question" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" name="question" value="{{ old('question') }}" required autofocus>

                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap items-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                               Ask
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
