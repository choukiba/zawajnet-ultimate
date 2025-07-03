namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\City;

class LocationSelector extends Component
{
    public $countries;
    public $cities = [];
    public $selectedCountry = null;
    public $selectedCity = null;

    public function mount()
    {
        $this->countries = Country::orderBy('name_ar')->get();
    }

    public function updatedSelectedCountry($countryId)
    {
        $this->cities = City::where('country_id', $countryId)->orderBy('name_ar')->get();
        $this->selectedCity = null;
    }

    public function render()
    {
        return view('livewire.location-selector');
    }
}
