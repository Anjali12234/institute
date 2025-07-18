<?php

namespace App\Http\Controllers\CSV;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function exportCsv()
    {
        $students = Student::all();
    
        $filename = 'students.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];
    
        $callback = function () use ($students) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Name', 'Email']); // Header row
    
            foreach ($students as $student) {
                fputcsv($handle, [
                    $student->id,
                    $student->full_name,
                    $student->email,
                ]);
            }
    
            fclose($handle);
        };
    
        return response()->stream($callback, 200, $headers);
    }
    
}
