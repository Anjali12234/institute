<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreBillRequest;
use App\Models\Bill;
use App\Models\Student;
use App\Traits\NepaliDateConverter;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::latest()->paginate('10');
        return view('admin.bill.index', compact('bills'));
    }
    public function showBill()
    {
        $students = Student::where('student_type', \App\Enums\StudentType::Admission)->with('course')->get();
        return view('admin.bill.studentList', compact('students'));
    }

    public function showStudentForm(Request $request)
    {
        $student = Student::where('id', $request->student_id)->first();
        if (!$student) {
            abort(404, 'Student not found');
        }

        $latestBill = $student->bills()->latest()->first();
        if ($latestBill) {
            if ($latestBill->due == 0) {
                return redirect()->back()->with('info', 'This student has no due amount.');
            }
            $oldDue = $latestBill->due;
        } else {
            $oldDue = $student->course->fee ?? 0;
        }

        return view('admin.bill.create', compact('student', 'oldDue'));
    }

    public function editStudentForm(Student $student,Bill $bill)
    {
        // dd($student);
        $student = Student::where('id', $student->id)->first();
        if (!$student) {
            abort(404, 'Student not found');
        }

        $latestBill = $student->bills()->latest()->first();
        if ($latestBill) {
            if ($latestBill->due == 0) {
                return redirect()->back()->with('info', 'This student has no due amount.');
            }
            $oldDue = $latestBill->due;
        } else {
            $oldDue = $student->course->fee ?? 0;
        }

        return view('admin.bill.edit', compact('student', 'oldDue','bill'));
    }
    
    public function destroy(Bill $bill)
    {
        $bill->delete();
        Alert::success('student deleted successfully');
        return back();
    }
}
