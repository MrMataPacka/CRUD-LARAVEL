@extends('layout.app')

@section('title', 'Iniciar sesión')

@section('content')
<div class="flex items-center justify-center min-h-[70vh] px-4 w-full">
    <div class="w-full max-w-sm">
        <div class="bg-white rounded border shadow-sm overflow-hidden">
            <div class="bg-gray-100 px-4 py-2 font-semibold">
                Iniciar sesión
            </div>
            <div class="p-4">
                <div id="error-msg" class="text-red-500 mb-2 hidden"></div>

                <form id="loginForm" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="email-auth" class="block font-medium">Correo electrónico</label>
                        <input
                          type="email"
                          name="email"
                          id="email"
                          class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                          required
                        >
                    </div>
                    <div>
                        <label for="password-auth"  class="block font-medium">Contraseña</label>
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
                      class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition"
                    >
                        Sign in
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-4 text-center">
            <a href="#" class="text-blue-600 hover:underline text-sm">
                ¿Olvidaste tu contraseña?
            </a>
        </div>
    </div>
</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/loginAuth.js') }}"></script>
@endpush
@endsection
