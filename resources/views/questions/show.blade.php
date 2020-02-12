@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="sm:w-ful md:w-1/2 mx-auto">

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    <span class="font-bold mr-1">uuid: </span>{{ $question->uuid }}
                </div>

                <div class="w-full p-6 ">
                    <span class="font-bold">Question:</span>
                    <br>
                    {{ $question->question }}
                </div>

                <div class="w-full p-6 ">
                    <span class="font-bold">Token:</span>
                    <br>
                    @if(!empty($npl))
                        <ul>
                        @foreach($npl['tokens'] as $token)
                           <li> {{ $token }}</li>
                        @endforeach
                        </ul>
                    @endif
                </div>

                <div class="w-full p-6 ">
                    <span class="font-bold">Created at:</span>
                    <br>
                    {{ $question->created_at->diffForHumans() }}
                </div>
            </div>

        </div>
    </div>
@endsection
