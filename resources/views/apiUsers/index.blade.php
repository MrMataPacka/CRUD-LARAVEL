@extends('layout.app')

@section('title','Usuarios de API')

@section('content')
    <h2 class="text-2xl mb-4 font-bold">Users from API</h2>
    <div class="text-right mb-4">
        <a href="{{ route('api-users.create') }}" class="text-white px-4 py-2 rounded bg-gray-800 hover:bg-gray-600 transition-colors duration-100">
            Create user
        </a>
    </div>

    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-100 text-center">
                <th class="p-2">Photo</th>
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr class="text-center align-muiddle">
                <td class="p-2">
                    <img src="{{ $u['photo'] }}" alt="photo" class="rounded-full w-12 h-12 mx-auto" />
                </td>
                <td class="p-2">{{ $u['name'] }} {{ $u['last_name'] }}</td>
                <td class="p-2">{{ $u['email'] }}</td>
                <td class="p-2">
                    <div class="flex space-x-4 items-center justify-center">
                        <a href="{{ route('api-users.show', $u['uid']) }}" title="Ver" class="text-blue-500 hover:text-blue-700">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a  href="{{ route('api-users.edit', $u['uid']) }}"  title="Editar" class="text-yellow-500 hover:text-yellow-700">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                        <button
                            data-url="{{ route('api-users.destroy', $u['uid']) }}"
                            data-redirect="{{ route('api-users.index') }}"
                            class="deleteUserBtn text-red-500 hover:text-red-700">
                            <i class="fa-solid fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/deleteButton.js') }}"></script>
@endpush
