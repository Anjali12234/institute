<?php

namespace App\Livewire;

use App\Enum\StudentType;
use Livewire\Component;

class StudentForm extends Component
{
    public $studentTypes = [];
    public $selectedStudentType = null;
    public $showAdmissionFields = false;

    public function mount()
    {
        
        $this->studentTypes = StudentType::cases();
    }

    public function updatedSelectedStudentType($value)
    {
        $this->showAdmissionFields = $value === StudentType::Admission->value;
    }
    public function render()
    {
        return view('livewire.student-form');
    }
}
