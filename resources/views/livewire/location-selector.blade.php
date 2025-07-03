<div class="space-y-4">
    {{-- اختيار الدولة --}}
    <select wire:model="selectedCountry" class="w-full p-2 border rounded">
        <option value="">اختر الدولة</option>
        @foreach ($countries as $country)
            <option value="{{ $country->id }}">{{ $country->name_ar }}</option>
        @endforeach
    </select>

    {{-- اختيار المدينة --}}
    @if (!is_null($selectedCountry))
        <select wire:model="selectedCity" class="w-full p-2 border rounded">
            <option value="">اختر المدينة</option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name_ar }}</option>
            @endforeach
        </select>
    @endif
</div>
