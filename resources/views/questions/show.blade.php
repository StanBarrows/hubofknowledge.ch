@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">Questions: {{ $question->uuid }}</h1>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">

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

@endsection
