<div class="space-y-4">
    <div>
        <label class="block mb-1 text-sm font-medium">الدولة</label>
        <select wire:model="selectedCountry" class="w-full p-2 border rounded">
            <option value="">اختر الدولة</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
    </div>

    @if (!empty($cities))
    <div>
        <label class="block mb-1 text-sm font-medium">المدينة</label>
        <select wire:model="selectedCity" class="w-full p-2 border rounded">
            <option value="">اختر المدينة</option>
            @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
    @endif
</div>
