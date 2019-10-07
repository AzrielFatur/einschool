<?php

namespace App\Http\Controllers;

use Spatie\Image\Image;
use DataTables;
use App\Teacher;
use App\Grade;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $teacher = Teacher::all();

            return Datatables::of($teacher)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="'.route('teacher.show', $row->id).'" class="edit btn btn-primary-sm"><i class="far fa-eye"></i></a> 
                                <a href="" data-id="'.$row->id.'" class="edit btn btn-danger-sm button-sweet"><i class="far fa-trash-alt"></i></a>
                                <a href="'.route('teacher.edit', $row->id).'" class="edit btn btn-warning-sm"><i class="far fa-edit"></i></a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('admin.teacher.index', ['title' => 'Teachers']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grade = Grade::all();
        return view('admin.teacher.create', ['title' => 'Add Teacher', 'grades' => $grade]);
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
        $name = 'teacher'.'_'.$request->name.'_'.date('d_m_y_h_m_s').'.'.$request->photo->extension();
        $path = 'storage/image/';
        $images->move($path,$name);
        $teacher = Teacher::create($request->all());
        $teacher->photo = $name;
        $teacher->save();

        return redirect()->route('teacher.index')->with('alert-success', 'Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        $grades = Grade::join('teachers', 'teachers.grade_id', '=', 'grades.id')->get();

        return view('admin.teacher.show', ['title' => 'Detail Teacher', 'teacher' => $teacher, 'grades' => $grades]);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $grades = Grade::join('teachers', 'teachers.grade_id', '=', 'grades.id')->get();
        
        return view('admin.teacher.edit', ['title' => 'Edit Teacher', 'teacher' => $teacher, 'grades' => $grades]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        if ($request->hasFile('photo')) {
            $images = $request->file('photo');
            Image::load($images)->save();
            $name = 'teacher'.'_'.$request->name.'_'.date('d_m_y_h_m_s').'.'.$request->photo->extension();
            $path = 'storage/image/';
            $images->move($path,$name);
            $teacher->photo = $name;
        }
        $teacher->fill($request->all());
        $teacher->photo = $name;
        // $teacher->name = $request->name;
        // $teacher->nis = $request->nis;
        // $teacher->grade_id = $request->grade_id;
        // $teacher->dateofbirth = $request->dateofbirth;
        // $teacher->gender = $request->gender;
        // $teacher->religion = $request->religion;
        // $teacher->email = $request->email;
        // $teacher->phone_number = $request->phone_number;
        // $teacher->address = $request->address;
        $teacher->save();

        return redirect()->route('teacher.index')->with('alert-success', 'Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return response()->json(['status' => TRUE]);
    }
}
