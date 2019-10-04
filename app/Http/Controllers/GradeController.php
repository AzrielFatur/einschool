<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Teacher;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $class = Grade::get();
            return Datatables::of($class)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="" data-id="'.$row->id.'" class="edit btn btn-danger-sm button-sweet"><i class="far fa-trash-alt"></i></a>
                                   <a href="'.route('class.edit', $row->id).'" class="edit btn btn-warning-sm"><i class="far fa-edit"></i></a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.class.index', ['title' => 'Class']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grade = Grade::all();

        return view('admin.class.create', ['title' => 'Create', 'grade' => $grade]);
    }

    /**
     * Show the form for dependent subclass.
     *
     * @return \Illuminate\Http\Response
     */
    // public function subclassname()
    // {
    //     $class = Input::get('class_name');
    //     $subclass = Grade::where('class_name', '=', $class)->get();
    //     return response()->json($subclass);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class = Grade::create($request->all());
        $class->save();

        return redirect()->route('class.index')->with('alert-success', 'Berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        return view('admin.class.edit', ['title' => 'Edit Class', 'grade' => $grade]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $grade->fill($request->all());
        $grade->save();

        return redirect()->route('class.index')->with('alert-success', 'Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return response()->json(['status' => TRUE]);
    }
}
