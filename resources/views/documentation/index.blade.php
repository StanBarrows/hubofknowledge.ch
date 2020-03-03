@extends('layouts.app')

@section('styles')

    <style>

        h1 {
            font-weight: bolder;
            font-size: 1.5rem;
            margin-bottom: 0.2rem;
        }
        h2 {
            font-weight: bolder;
            font-size: 1.4rem;
            margin-bottom: 0.2rem;

        }

        h3 {
            font-weight: normal;
            font-size: 1.4rem;
            margin-bottom: 0.2rem;

        }

        pre
        {
            margin-top: 0.5rem;
            margin-bottom: 1.0rem;
        }
        code {

        }

    </style>
@endsection

@section('content')

    <header>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold leading-tight text-gray-900">
                {{ __('documentation.title') }}
            </h2>
        </div>
    </header>

    <main>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-8 sm:px-0">
                <div class="markdown">
                    @markdown($readme)
                </div>

            </div>
        </div>
    </main>
@endsection
