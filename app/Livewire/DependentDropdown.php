<?php

namespace App\Livewire;

use App\Models\District;
use App\Models\LocalBody;
use App\Models\Province;
use Livewire\Component;

class DependentDropdown extends Component
{

    public $provinces;
    public $districts;
    public $localBodies;
    public $wards;

    public $selectedProvince = null;
    public $selectedDistrict = null;
    public $selectedLocalBody = null;
    public function mount()
    {
        $this->provinces = Province::all();
        $this->districts = District::all();

    }

    public function updatedSelectedProvince($province)
    {
       $this->districts = District::where('province_id',$province)->get();
    }
    public function updatedSelectedDistrict($district)
    {
       $this->localBodies = LocalBody::where('district_id',$district)->get();
    }
    public function updatedSelectedLocalBody($localBody)
    {

        $this->wards = LocalBody::where('id', $localBody)->value('wards');
    }


    public function render()
    {

        return view('livewire.dependent-dropdown');
    }
}
