<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Spatie\Image\Image;
use Illuminate\Http\Request;

class MyAccountController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        return view('admin.my-account.edit', ['title' => 'My Account']);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        if ($request->has('password')) {
            $request->merge(['password' => bcrypt($request->password)]);
        } else {
            $request->merge(['password' => $user->password]);
        }
        
        $user->fill($request->all());
        if ($request->hasFile('photo')) {
            $images = $request->file('photo');
            Image::load($images)->save();
            $name = 'user'.'_'.Auth::user()->name.'_'.date('d_m_y_h_m_s').'.'.$images->extension();
            $path = 'storage/image/user/';
            $images->move($path,$name);
            $user->photo = $name;
        }
        $user->save();
        
        return back()->with('alert-success', 'Berhasil diubah!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
