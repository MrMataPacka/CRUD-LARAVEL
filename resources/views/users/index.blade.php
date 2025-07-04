@extends('layout.app')

@section('title','Users')

@section('content')
<h2 class="text-2xl mb-4 font-bold">Users</h2>
<div class="text-right mb-4">
    <a href="{{ route('users.create') }}" class="text-white px-4 py-2 rounded bg-gray-800 hover:bg-gray-600 transition-colors duration-100">
        Create user
    </a>
</div>

<table id="usersTable" data-url="{{ route('users.index') }}" class="w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-100 text-center">
            <th class="p-2">Profile Icon</th>
            <th class="p-2">Name</th>
            <th class="p-2">Last Name</th>
            <th class="p-2">Email</th>
            <th class="p-2">Actions</th>
        </tr>
    </thead>
</table>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/deleteButton.js') }}"></script>
    <script src="{{ asset('js/userIndex.js') }}"></script>
@endpush
