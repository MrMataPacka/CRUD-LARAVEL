@extends('layout.app')

@section('title','City: '.$city['name'])

@section('content')
    <div class="flex space-x-4 mb-4 mt-4 justify-center">
        <h2 class="text-2xl mb-4">Detalles de {{ $city['name'] }}</h2>
    </div>


    <div class="flex justify-center">
        <div class="bg-white shadow rounded p-4 w-1/3">
            <p><strong>Name:</strong> {{ $city['name'] }}</p>
            <p><strong>Province:</strong> {{ $city['province'] }}</p>
            <p><strong>Country:</strong> {{ $city['country'] }}</p>
        </div>
    </div>

@endsection

