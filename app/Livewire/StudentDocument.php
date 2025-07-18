<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentDocument extends Component
{
    use WithFileUploads;


    public Student $student;
    public $requiredDocuments = [];

    public function mount(Student $student, $requiredDocuments, $studentDocumentId = null)
    {
        $this->student = $student;
        $this->requiredDocuments = collect($requiredDocuments)->map(function ($doc) {
            return [
                'document_title' => $doc->document_title,
                'document' => $doc->document,   
            ];
    })->toArray();
}

  
    public function save() {}

    public function render()
    {
        return view('livewire.student-document');
    }
}
