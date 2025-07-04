<div class="flex space-x-4 items-center justify-center">
    <a href="{{ $showUrl }}" title="Ver" class="text-blue-500 hover:text-blue-700">
        <i class="fa-solid fa-eye"></i>
    </a>
    <a href="{{ $editUrl }}" title="Editar" class="text-yellow-500 hover:text-yellow-700">
        <i class="fa-solid fa-edit"></i>
    </a>
    <button
        data-url="{{ $deleteUrl }}"
        data-redirect="{{ route('users.index') }}"
        class="deleteUserBtn text-red-500 hover:text-red-700">
        <i class="fa-solid fa-trash-alt"></i>
    </button>
</div>
