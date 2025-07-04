
@props([
    'states',
    'towns' => collect(),
    'selectedState' => null,
    'selectedTown' => null,
])

<label class="block mb-4">
    <span>Estado</span>
    <select id="stateSelect" name="staid" class="mt-1 block w-full border rounded px-2 py-1" required>
        <option value="">Selecciona un estado</option>
        @foreach($states as $state)
            <option value="{{ $state->staid }}" {{ old('staid', $selectedState) == $state->staid ? 'selected' : '' }}>
                {{ $state->name }}
            </option>
        @endforeach
    </select>
</label>

<label class="block mb-4">
    <span>Ciudad</span>
    <select id="townSelect" name="towid" class="mt-1 block w-full border rounded px-2 py-1" required>
        <option value="">Selecciona una ciudad</option>
        @foreach($towns as $town)
            <option value="{{ $town->towid }}" {{ old('towid', $selectedTown) == $town->towid ? 'selected' : '' }}>
                {{ $town->name }}
            </option>
        @endforeach
    </select>
</label>

@once
@push('scripts')
    <script src="{{ asset('js/locationFetch.js') }}"></script>
@endpush
@endonce
