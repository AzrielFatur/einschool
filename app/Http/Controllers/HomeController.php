<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $student = Student::count();

        $grade = Grade::count();
        
        $teacher = Teacher::count();

        $studentChart = DB::table('students')
                            ->select(
                                DB::raw('year(created_at) as year'),
                                DB::raw('count(name) as total_student'))
                            ->orderBy('created_at')
                            ->groupBy(DB::raw('YEAR(created_at)'))
                            ->get();


        $result[] = ['Year', 'Student'];
        foreach ($studentChart as $key => $value) {
            $result[++$key] = [$value->year, (int)$value->total_student];
        }

        $jsonResult = json_encode($result);
        return view('admin.home.index', ['title' => 'Homepage', 'student' => $student, 'grade' => $grade, 'teacher' => $teacher, 'jsonResult' => $jsonResult]);
    }
}
