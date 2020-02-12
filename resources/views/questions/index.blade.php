@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="sm:w-ful md:w-1/2 mx-auto">
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                   Questions
                </div>

                <div class="w-full p-6 ">
                    @if(!empty($questions) && $questions->count())
                        <table class="table-auto w-full">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">question</th>
                                <th class="px-4 py-2">created at</th>
                                <th class="px-4 py-2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <td class="border px-4 py-2">{{ $question->question }}</td>
                                    <td class="border px-4 py-2">{{ $question->created_at->diffForHumans() }}</td>
                                    <td class="border px-4 py-2">
                                        <a class="text-blue-700" href="{{ route('questions.show', $question) }}">show</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else

                        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4" role="alert">
                            <p>No questions available!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
