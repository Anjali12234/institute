<?php

namespace App\Livewire;

use App\Models\District;
use App\Models\LocalBody;
use App\Models\Province;
use App\Models\Student;
use Livewire\Component;

class DependentDropdown extends Component
{
    public $provinces;
    public $districts;
    public $localBodies;
    public $wards;
    public $student;

    public $selectedProvince = null;
    public $selectedDistrict = null;
    public $selectedLocalBody = null;
    public function mount(Student $student)
    {
        $this->student = $student;
        $this->provinces = Province::all();
        $this->districts = District::where('province_id', $this->student->province_id ?? null)->get();
        $this->localBodies = LocalBody::where('district_id', $this->student->district_id ?? null)->get();
        $this->wards = LocalBody::where('id', $this->student->local_body_id ?? null)->value('wards');
        
        $this->selectedProvince = $this->student->province_id;
        $this->selectedDistrict = $this->student->district_id;
        $this->selectedLocalBody = $this->student->local_body_id;
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
        return view('livewire.dependent-dropdown', [
            'student' => $this->student
        ]);
    }
}
