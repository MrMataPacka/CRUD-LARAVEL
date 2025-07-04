@extends('layout.app')

@section('title','Cities')

@section('content')
    <h2 class="text-2xl mb-4 font-bold">Cities</h2>
    <table id="citiesTable" class="w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-100 text-center justify-center">
                <th class="p-2">Name</th>
                <th class="p-2">Province</th>
                <th class="p-2">Country</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
    </table>


@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#citiesTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{{ route("cities.index") }}',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'province', name: 'atState.name' },
                { data: 'country', name: 'country' },
                { data: 'acciones', name: 'acciones', orderable: false, searchable: false }
            ]
        });

        $(document).on('submit', '.delete-form', function(e) {
            e.preventDefault();
            const form = this;
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción eliminará la ciudad!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush

