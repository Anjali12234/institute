<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CourseLivewire extends Component
{
    use WithFileUploads;

    public $courseId;
    public $course_name;
    public $duration;
    public $start_date;
    public $end_date;
    public $fee;
    public $course_type;
    public $requiredDocuments = [];

    public function mount($courseId = null)
    {
        if ($courseId) {
            $this->courseId = $courseId;
            $this->loadCourse();
        } else {
            $this->requiredDocuments = [['document_title' => '']]; 
        }
    }
    
    public function loadCourse()
    {
        $course = Course::with('requiredDocuments')->findOrFail($this->courseId);

        $this->course_name = $course->course_name;
        $this->duration = $course->duration;
        $this->start_date = $course->start_date;
        $this->end_date = $course->end_date;
        $this->fee = $course->fee;
        $this->course_type = $course->course_type;
        
        $this->requiredDocuments = $course->requiredDocuments->map(function ($requiredDocument) {
            return [
                'document_title' => $requiredDocument->document_title,
            ];
        })
        ->toArray();
    }

    public function save()
    {
        $this->validate([
            'course_name' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'fee' => 'required|numeric',
            'start_date' => 'required|date|date_format:Y-m-d',
            'end_date' => 'required|date|date_format:Y-m-d',
            'course_type' => 'nullable',
            'requiredDocuments.*.document_title' => 'nullable|string|max:255',
            
        ]);
    
        
        $course = Course::updateOrCreate(
            ['id' => $this->courseId],
            [
                'course_name' => $this->course_name,
                'duration' => $this->duration,
                'fee' => $this->fee,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'course_type' => $this->course_type,
            ]
        );
        
    
        
        $course->requiredDocuments()->delete(); 
        foreach ($this->requiredDocuments as $requiredDocument) {
            
           
            $course->requiredDocuments()->create($requiredDocument);
        }
    
        session()->flash('message', $this->courseId ? 'course updated successfully!' : 'course created successfully!');
        return redirect()->route('admin.course.index'); // Redirect after saving
    }
    

    public function addRequiredDocument()
    {
        $this->requiredDocuments[] = [
            'document_title' => '',
           
        ];
    }

    
    public function removeRequiredDocument($index)
    {
        unset($this->requiredDocuments[$index]); 
        $this->requiredDocuments = array_values($this->requiredDocuments); 
    }
    public function render()
    {
        return view('livewire.course-livewire');
    }
}
