@extends('layout.app')

@section('title', 'Iniciar sesión')

@section('content')
<div class="flex items-center justify-center min-h-[70vh] px-4 w-full">
    <div class="w-full max-w-sm">
        <div class="bg-white rounded border shadow-sm overflow-hidden">
            <div class="bg-gray-100 px-4 py-2 font-semibold">
                Log In
            </div>
            <div class="p-4">
                <div id="error-msg" class="text-red-500 mb-2 hidden"></div>

                <form id="loginForm" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="email-auth" class="block font-medium">Email</label>
                        <input
                          type="email"
                          name="email"
                          id="email"
                          class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                          required
                        >
                    </div>
                    <div>
                        <label for="password-auth"  class="block font-medium">Password</label>
                        <input
                          type="password"
                          name="password"
                          id="password"
                          class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                          required
                        >
                    </div>
                    <button
                      type="submit"
                      id="btnSubmit"
                      class="w-full bg-gray-800 text-white py-2 rounded hover:bg-green-300 transition"
                    >
                        Sign in
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ route('restore.password') }}" class="text-gray-800 px-4 py-2 rounded text-sm hover:bg-gray-800 hover:text-white">
                Did you forgot your password?
            </a>
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('create.user') }}" class="text-gray-800 px-4 py-2 rounded text-sm hover:bg-gray-800 hover:text-white">
                Don't have an account? Register
            </a>
        </div>
    </div>
</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/loginAuth.js') }}"></script>
@endpush
@endsection
