<div class="flex space-x-4 items-center justify-center">
    <a href="{{ $showUrl }}" title="Ver" class="text-blue-500 hover:text-blue-700">
        <i class="fa-solid fa-eye"></i>
    </a>
    <a href="{{ $editUrl }}" title="Editar" class="text-yellow-500 hover:text-yellow-700">
        <i class="fa-solid fa-edit"></i>
    </a>
    <form action="{{ $deleteUrl }}" method="POST" class="inline-block delete-form">
        @csrf
        @method('DELETE')
        <button type="submit" title="Eliminar" class="text-red-500 hover:text-red-700">
            <i class="fa-solid fa-trash-alt"></i>
        </button>
    </form>
</div>
