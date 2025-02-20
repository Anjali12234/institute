<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Course;
use App\Models\Gallery;
use App\Models\GeneralQuestion;
use App\Models\Notice;
use App\Models\Programme;
use App\Models\Semester;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherRating;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FrontendController extends Controller
{
    public function index()
    {
       
        return view('frontend.index');
    }
    public function aboutUs()
    {
        $team = Team::where('position', 1)->first();
        $about = About::latest()->first();
        return view('frontend.aboutus', compact('about', 'team'));
    }
    public function service()
    {
        $services = Service::orderBy('position')->get();
        return view('frontend.services.service', compact('services'));
    }
    public function serviceDetail(Service $service)
    {
        $services = Service::orderBy('position')->get();
        $generalQuestions = GeneralQuestion::where('type', 'service')->get();

        return view('frontend.services.serviceDetail', compact('service', 'services', 'generalQuestions'));
    }
    public function team()
    {
        $teams = Team::orderBy('position')->get();
        return view('frontend.teams.team', compact('teams'));
    }
    public function teamDetail(Team $team)
    {
        $teams = Team::orderBy('position')->get();

        return view('frontend.teams.teamDetail', compact('team', 'teams'));
    }
    public function contact()
    {

        return view('frontend.contact');
    }
    public function certificatePage()
    {
        return view('student.certificate');
    }
    public function certificateGenerate(Request $request)
    {
        $request->validate([
            'registration_no' => 'required|exists:students,registration_no',
        ]);

        $student = Student::where('registration_no', $request->registration_no)->first();
 $courseIds = is_array($student->course) ? $student->course : explode(',', $student->course);

        // Fetch course names matching the course IDs
        $courses = Course::whereIn('id', $courseIds)->pluck('course_name')->toArray();

        return view('student.certificate', compact('student', 'courses'));

        if ($student) {
            return view('student.certificate', compact('student'));
        } else {
            Alert::error('Error', 'Student not found');
            return redirect()->back();
        }
    }
}
