<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentReport\StoreStudentReportRequest;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
{
    public function index()
    {
        $students = Student::where('student_type', \App\Enums\StudentType::Admission)  // Use enum value directly
            ->get();
        $courses = Course::all();

        return view('admin.report.studentReport', compact('students', 'courses'));
    }

    public function store(StoreStudentReportRequest $request)
    {
        $request->validated();

        $query = Student::query();

        // Apply OR conditions dynamically
        $query->when($request->filled('registration_no'), function ($q) use ($request) {
            return $q->orWhere('registration_no', 'like', '%' . $request->registration_no . '%');
        });

        $query->when($request->filled('full_name'), function ($q) use ($request) {
            return $q->orWhere('full_name', 'like', '%' . $request->full_name . '%');
        });

        $query->when($request->filled('email'), function ($q) use ($request) {
            return $q->orWhere('email', $request->email);
        });

        $query->when($request->filled('d_o_b'), function ($q) use ($request) {
            return $q->orWhere('d_o_b', $request->d_o_b);
        });

        $query->when($request->filled('phone_number'), function ($q) use ($request) {
            return $q->orWhere('phone_number', $request->phone_number);
        });

        $query->when($request->filled('student_id'), function ($q) use ($request) {
            return $q->orWhere('id', $request->student_id);
        });

        $query->when($request->filled('gender'), function ($q) use ($request) {
            return $q->orWhere('gender', $request->gender);
        });
        $query->when($request->filled('student_type'), function ($q) use ($request) {
            return $q->orWhere('student_type', $request->student_type);
        });

        $query->when($request->filled('course_id'), function ($q) use ($request) {
            return $q->orWhere('course_id', $request->course_id);
        });

        $matchedStudents = $query->get();

        return view('admin.report.studentReport', [
            'students' => Student::all(),
            'courses' => Course::all(),
            'matchedStudents' => $matchedStudents,
        ]);
    }
}
