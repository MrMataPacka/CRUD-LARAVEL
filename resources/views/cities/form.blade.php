@extends('layout.app')

@section('title',$title)

@section('content')
    <h2 class="text-2xl mb-4 flex justify-center">{{ $title }}</h2>
    <div class="flex justify-center">
    <form action="{{ $action }}" method="POST" class="bg-white p-6 shadow rounded w-1/2 ">
        @csrf
        @if($method!=='POST')
            @method($method)
        @endif

        <label class="block mb-4">
            <span>Name</span>
            <input type="text" name="name" value="{{ old('name', $city->name) }}" class="mt-1 block w-full border rounded px-2 py-1" required>
        </label>
        <label class="block mb-4">
            <span>Province</span>
            <select name="staid" class="mt-1 block w-full border rounded px-2 py-1">
                @foreach($states as $state)
                    <option value="{{ $state->staid }}" {{ old('staid', $city->staid) == $state->staid ? 'selected' : '' }}>
                        {{ $state->name }}
                    </option>
                @endforeach
            </select>
        </label>

        <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded">Save</button>
    </form>
    </div>
@endsection
