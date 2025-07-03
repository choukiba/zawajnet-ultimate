<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\City;

class CountryCitySelector extends Component
{
    public $countries;
    public $selectedCountry = null;
    public $cities = [];
    public $selectedCity = null;

    public function mount()
    {
        $this->countries = Country::all();
    }

    public function updatedSelectedCountry($countryId)
    {
        $this->cities = City::where('country_id', $countryId)->get();
        $this->selectedCity = null;
    }

    public function render()
    {
        return view('livewire.country-city-selector');
    }
}
