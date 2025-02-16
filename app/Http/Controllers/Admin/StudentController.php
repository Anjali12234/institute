<?php

namespace App\Http\Controllers\Admin;

use App\Enum\StudentType;
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
    public function index()
    {
        $students = Student::with(['course'])
            ->where(function (Builder $q) {
                if (!is_null(request('search'))) {
                    $q->whereLike(['registration_no', 'full_name', 'course.course_name'],request('search'));
                }
            })
            ->orderBy('position','asc')->paginate(10);

        return view('admin.student.index', compact('students'));
    }
    public function student(StudentType $studentType)
    {
        $students = Student::with(['course'])
            ->where(function (Builder $q) {
                if (!is_null(request('search'))) {
                    $q->whereLike(['registration_no', 'full_name', 'course.course_name'],request('search'));
                }
            })
            ->orderBy('position','asc')->paginate(10);

        return view('admin.student.student', compact('students','studentType'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('admin.student.create',compact('courses','students'));
    }

    public function store(StoreStudentRequest $request)
    {
        $registrationNo = 'REG-' . strtoupper(uniqid());
        Student::create($request->validated() + [
            'registration_no' => $registrationNo,
        ]);
        Alert::success('Student added successfully');
        return back();
    }
    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('admin.student.edit', compact('student','courses'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        if ($request->hasFile('image') && $image = $student->getRawOriginal('image')) {
            $this->deleteFile($image);
        }
        $student->update($request->validated());
        Alert::success('Student updated successfully');
        return redirect(route('admin.student.index'));
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
