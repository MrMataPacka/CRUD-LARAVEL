@extends('layout.app')

@section('title','Dashboard')

@section('content')
    @php
        $user = \App\Models\AtUser::find(session('user_id'));
    @endphp
    <div class="text-center py-10">
        <h1 class="text-5xl font-bold">Congratulations {{ $user->name }}!</h1>
        <p class="mt-4 text-lg text-gray-600">You have successfully created your Yii-powered application.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-4">
        <div>
            <h2 class="text-xl font-bold mb-2">Heading</h2>
            <p class="text-gray-600 text-justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            </p>
        </div>
        <div>
            <h2 class="text-xl font-bold mb-2">Heading</h2>
            <p class="text-gray-600 text-justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            </p>
        </div>
        <div>
            <h2 class="text-xl font-bold mb-2">Heading</h2>
            <p class="text-gray-600 text-justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            </p>
        </div>
    </div>
@endsection
