<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentDocument\StoreStudentDocumentRequest;
use App\Http\Requests\StudentDocument\UpdateStudentDocumentRequest;
use App\Models\RequiredDocument;
use App\Models\Student;
use App\Models\StudentDocument;
use Illuminate\Console\View\Components\Alert;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class StudentDocumentController extends Controller
{

    public function create(Student $student)
    {
        $studentDocuments = StudentDocument::where('student_id',$student->id)->get();
        $requiredDocuments = RequiredDocument::where('course_id', $student->course_id)->get();
        return view('admin.studentDocument.create', compact('requiredDocuments', 'student','studentDocuments'));
    }


    public function store(StoreStudentDocumentRequest $request, Student $student)
    {
        foreach ($request->input('documents') as $index => $docData) {
            $file = $request->file("documents.$index.document");
    
            if ($file) {
                // Store the new file
                $path = $file->store('student_documents', 'public');
    
                // Use updateOrCreate to either update the existing record or create a new one
                StudentDocument::updateOrCreate(
                    [
                        'student_id' => $student->id,
                        'document_title' => $docData['document_title'],
                    ],
                    [
                        'course_id' => $student->course_id,
                        'document' => $path,
                    ]
                );
            }
        }
        FacadesAlert::success("Data stored successfully");
        return back();
    }

  
}
