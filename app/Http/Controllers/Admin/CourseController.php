<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Models\Course;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10);
        return view('admin.course.index', compact('courses'));
    }
    public function create()
    {
        return view('admin.course.create');
    }

    public function store(StoreCourseRequest $request)
    {
        Course::create($request->validated());
        Alert::success('Course added successfully');
        return back();
    }

    public function edit(Course $course)
    {
        $course->load('requiredDocuments');
        return view('admin.course.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {

        $course->update($request->validated());
        Alert::success('Course updated successfully');
        return redirect(route('admin.course.index'));
    }

    public function destroy(Course $course)
    {
        $course->delete();
        Alert::success('Course deleted successfully');
        return back();
    }

    public function updateStatus(Course $course)
    {
        $course->update([
            'status' => !$course->status
        ]);
        toast('Status updated successfully', 'success');
        return back();
    }
}
