@extends('layout.app')

@section('title', 'Restablecer contraseña')

@section('content')
<div class="flex items-center justify-center min-h-[70vh] px-4 w-full">
    <div class="w-full max-w-sm">
        <div class="bg-white rounded border shadow-sm overflow-hidden">
            <div class="bg-gray-100 px-4 py-2 font-semibold">
                Restablecer contraseña
            </div>
            <div class="p-4">
                <form id="restoreForm" method="POST" class="space-y-4" data-redirect="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="email" class="block font-medium">Correo electrónico</label>
                        <input
                          type="email"
                          name="email"
                          id="email"
                          class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                          required
                        >
                    </div>
                    <button
                      type="submit"
                      id="btnRestore"
                      class="w-full bg-gray-800 text-white py-2 rounded hover:bg-green-300 transition"
                    >
                        Enviar enlace de recuperación
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-gray-800 px-4 py-2 rounded text-sm hover:bg-gray-800 hover:text-white">
                Volver al login
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/restorePassword.js') }}"></script>
@endpush
@endsection
