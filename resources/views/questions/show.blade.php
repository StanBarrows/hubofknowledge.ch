@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="sm:w-ful md:w-1/2 mx-auto">

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                   {{ $question->question }}
                </div>

                <div class="w-full p-6 ">

                </div>
            </div>
        </div>
    </div>
@endsection
