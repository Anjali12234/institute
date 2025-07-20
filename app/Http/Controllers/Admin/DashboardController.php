<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
         

        $admissionStudents = Student::where('student_type', 'Admission')->count();
        $enquiryStudents = Student::where('student_type', 'Enquiry')->count();
        $courses = Course::all()->count();
        $bills = Bill::all()->count();
        $totalStudents = Student::count();
        $totalEnquiryStudents = Student::where('student_type', 'Enquiry')->count();
        $totalAdmissionStudents = Student::where('student_type', 'Admission')->count();
        $totalCourses = Course::where('status', 1)->count();
        return view('dashboard', compact('admissionStudents', 'enquiryStudents','courses','bills','totalStudents','totalEnquiryStudents','totalCourses','totalAdmissionStudents'));

    }
}
