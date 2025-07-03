<div class="space-y-4" dir="rtl">
    <div>
        <label for="country" class="block mb-1 text-sm font-medium text-gray-700">الدولة</label>
        <select wire:model="selectedCountry" id="country" class="w-full border rounded p-2">
            <option value="">اختر الدولة</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name_ar }}</option>
            @endforeach
        </select>
    </div>

    @if (!is_null($selectedCountry))
        <div>
            <label for="city" class="block mb-1 text-sm font-medium text-gray-700">المدينة</label>
            <select wire:model="selectedCity" id="city" class="w-full border rounded p-2">
                <option value="">اختر المدينة</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name_ar }}</option>
                @endforeach
            </select>
        </div>
    @endif
</div>
