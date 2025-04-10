<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StudentType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;

class StudentController extends Controller
{
    public function index(StudentType $studentType)
    {
        $students = Student::with(['course','student'])->where('student_type',$studentType)
            ->where(function (Builder $q) {
                if (!is_null(request('search'))) {
                    $q->whereLike(['registration_no', 'full_name', 'course.course_name'],request('search'));
                }
            })
            ->orderBy('position','asc')->paginate(10);

        return view('admin.student.index', compact('students','studentType'));
    }
    public function allStudent()
    {
        $students = Student::with(['course','student'])
            ->where(function (Builder $q) {
                if (!is_null(request('search'))) {
                    $q->whereLike(['registration_no', 'full_name', 'course.course_name'],request('search'));
                }
            })
            ->orderBy('position','asc')->paginate(10);

        return view('admin.student.allStudent', compact('students'));
    }

    public function create(StudentType $studentType)
    {
        $students = Student::where('student_type', \App\Enums\StudentType::Admission)  // Use enum value directly
        ->get();
        $courses = Course::all();
        return view('admin.student.create',compact('courses','students','studentType'));
    }

    public function store(StoreStudentRequest $request, StudentType $studentType)
    {
        
        $registrationNo = 'REG-' . strtoupper(uniqid());
        Student::create($request->validated() + [
            'registration_no' => $registrationNo,
            'student_type' => $studentType,
            'admission_date' => now(),
            
        ]);
        Alert::success('Student added successfully');
        return back();
    }
    public function edit(Student $student)
{
    $students = Student::where('id', '!=', $student->id)
    ->where('student_type', \App\Enums\StudentType::Admission)  // Use enum value directly
    ->get();
    $courses = Course::all();
    
    return view('admin.student.edit', compact('student', 'courses', 'students'));
}


    public function update(UpdateStudentRequest $request, Student $student)
    {
        if ($request->hasFile('image') && $image = $student->getRawOriginal('image')) {
            $this->deleteFile($image);
        }
        $student->update($request->validated());
        Alert::success('Student updated successfully');
        return redirect(route('admin.student.allStudent'));
    }

    public function updateStatus(Student $student)
    {
        $student->update([
            'status' => !$student->status
        ]);
        toast('Status updated successfully', 'success');
        return back();
    }
    public function updateStudentType(Student $student)
    {
        if($student->student_type->label() == "Enquiry")
        $student->update([
            'student_type' => "Admission"
        ]);
        else{
            $student->update([
                'student_type' => "Enquiry"
            ]);
        }
        toast('Status updated successfully', 'success');
        return back();
    }
    public function destroy(Student $student)
    {
        $student->delete();
        Alert::success('student deleted successfully');
        return back();
    }
}
