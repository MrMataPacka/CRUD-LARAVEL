@extends('layout.app')

@section('title',$title)

@section('content')
    <h2 class="text-2xl mb-4 flex justify-center">{{ $title }}</h2>
    <div class="flex justify-center">
        <form  id="userForm" method="POST" action="{{ $action }}" enctype="multipart/form-data" class="bg-white p-6 shadow rounded w-1/2">
            @csrf
            @if($method !== 'POST') @method($method) @endif

            <label class="block mb-6 text-center">
                <span class="block mb-2">Profile picture</span>
                <div class="flex flex-col items-center">
                    <img id="preview" src="{{ asset(!empty($user['photo']) ? $user['photo'] : 'img/users-icons/Sample_User_Icon.png') }}" class="w-24 h-24 rounded-full object-cover border mb-2" alt="Preview">
                    <label for="user_image"
                        class="cursor-pointer text-white bg-gray-800 hover:bg-gray-600 px-3 py-1 rounded text-sm">
                        Upload icon
                    </label>
                    <input type="file" id="user_image" name="user_image" class="hidden"
                        onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                    <input type="hidden" name="current_photo" value="{{ $user['photo'] ?? 'img/users-icons/Sample_User_Icon.png' }}">
                </div>
            </label>

            <label class="block mb-4">
                <span>First Name</span>
                <input type="text" name="name" value="{{ old('name', $user['name'] ?? '') }}" class="mt-1 block w-full border rounded px-2 py-1" required>
            </label>

            <label class="block mb-4">
                <span>Last Name</span>
                <input type="text" name="last_name" value="{{ old('last_name', $user['last_name'] ?? '') }}" class="mt-1 block w-full border rounded px-2 py-1" required>
            </label>


            <label class="block mb-4">
                <span>Email</span>
                <input type="text" name="email" value="{{ old('email', $user['email'] ?? '') }}" class="mt-1 block w-full border rounded px-2 py-1" required>
            </label>



            <div class="flex justify-center items-center">
                <button id="btnSubmit" type="submit" class="bg-green-300 text-gray-800 py-2 px-4 rounded hover:bg-green-400 hover:text-white transition-colors duration-100">Save</button>
            </div>
        </form>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/apiUserForm.js') }}"></script>
@endpush

