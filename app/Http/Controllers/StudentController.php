<?php

namespace App\Http\Controllers;

use Spatie\Image\Image;
use DataTables;
use App\Grade;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $student = Student::all();
 
            return Datatables::of($student)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.route('student.show', $row->id).'" class="edit btn btn-primary-sm"><i class="far fa-eye"></i></a> 
                                   <a href="" data-id="'.$row->id.'" class="edit btn btn-danger-sm button-sweet"><i class="far fa-trash-alt"></i></a>
                                   <a href="'.route('student.edit', $row->id).'" class="edit btn btn-warning-sm"><i class="far fa-edit"></i></a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('admin.student.index', ['title' => 'Students']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grade = Grade::all();
        return view('admin.student.create', ['title' => 'Add Student', 'grades' => $grade]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = $request->file('photo');
        $name = 'student'.'_'.$request->name.'_'.date('d_m_y_h_m_s').'.'.$request->photo->extension();
        $path = 'storage/image/';
        $images->move($path,$name);
        $student = Student::create($request->all());
        $student->photo = $name;
        $student->save();

        return redirect()->route('student.index')->with('alert-success', 'Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $grades = Grade::join('students', 'students.grade_id', '=', 'grades.id')->get();
        // $students = Student::join('grades', 'students.grade_id', '=', 'grades.id')->get();
        return view('admin.student.show', ['title' => 'Detail Student', 'student' => $student, 'grades' => $grades]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $grades = Grade::join('students', 'students.grade_id', '=', 'grades.id')->get();
        return view('admin.student.edit', ['title' => 'Edit Student', 'student' => $student, 'grades' => $grades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        if ($request->hasFile('photo')) {
            $images = $request->file('photo');
            Image::load($images)->save();
            $name = 'student'.'_'.$request->name.'_'.date('d_m_y_h_m_s').'.'.$request->photo->extension();
            $path = 'storage/image/';
            $images->move($path,$name);
            $student->photo = $name;
        }
        $student->fill($request->all());
        $student->photo = $name;
        // $student->name = $request->name;
        // $student->nis = $request->nis;
        // $student->grade_id = $request->grade_id;
        // $student->dateofbirth = $request->dateofbirth;
        // $student->gender = $request->gender;
        // $student->religion = $request->religion;
        // $student->email = $request->email;
        // $student->phone_number = $request->phone_number;
        // $student->address = $request->address;
        $student->save();

        return redirect()->route('student.index')->with('alert-success', 'Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Student $student)
    {
        $student->delete();
        return response()->json(['status' => TRUE]);
        // return redirect()->route('student.index')->with('alert-danger', 'Data has been Deleted');
    }
}
