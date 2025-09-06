@extends('layout.app')

@section('title', "User: {$user["name"]} {$user["last_name"]}")


@section('content')

    <div class="flex space-x-4 mb-4 mt-4 justify-center">
        <h2 class="text-2xl mb-4">Details of {{ $user['name'] }} {{ $user['last_name'] }}</h2>
    </div>

    <div class="flex justify-center">
        <div class="bg-white shadow rounded p-4 w-1/3">
            <div class="flex justify-center items-center mb-4">
                <img src="{{ asset($user['photo']) }}" class="rounded-full w-40 h-40 object-cover" />
            </div>
            <p><strong>Name:</strong> {{ $user['name'] }}</p>
            <p><strong>Last Name:</strong> {{ $user['last_name'] }}</p>
            <p><strong>Email:</strong> {{ $user['email'] }}</p>
        </div>
    </div>

    <div class="flex space-x-4 mb-4 mt-4 justify-center">
        <button
            data-url="{{ route('api-users.destroy', $user['uid']) }}"
            data-redirect="{{ route('api-users.index') }}"
            class="deleteUserBtn bg-red-400 text-white px-4 py-2 rounded hover:bg-red-600 transition-colors duration-100">
            Delete
        </button>

        <a href="{{ route('api-users.edit', $user['uid']) }}" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-600  transition-colors duration-100">Update</a>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/deleteButton.js') }}"></script>
@endpush

