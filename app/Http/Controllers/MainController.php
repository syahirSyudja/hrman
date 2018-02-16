<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Skill;
use App\Division;
use File, Validator;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q_employee = Employee::all();
        return view('mainpage', compact('q_employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skill = Skill::all()->pluck('name', 'id')->toArray();
        $division = Division::all()->pluck('name', 'id')->toArray();
        return view('addhr', compact('skill', 'division'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), Employee::validasi());
        if ($validasi->fails()) return back()
            ->withInput()
            ->withErrors($validasi);
        // if valid
        $photo = $request->id.$request->last_name.'_photo.'.$request->file('photo')->getClientOriginalExtension();
        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'profile' => $request->profile,
            'photo' => $photo,
            'skill_id' => $request->skill_id,
            'division_id' => $request->division_id
        ]);
        // put photos on public/employee
        $request->photo->move(public_path('employee'), $photo);

        return redirect('/hr');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('details', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $skill = Skill::all()->pluck('name', 'id')->toArray();
        $division = Division::all()->pluck('name', 'id')->toArray();
        return view('addhr', compact('employee', 'skill', 'division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), Employee::validasi());
        if ($validasi->fails()) return back()
            ->withInput()
            ->withErrors($validasi);
        // if valid
        $photo = $request->id.$request->last_name.'_photo.'.$request->file('photo')->getClientOriginalExtension();
        $employee = Employee::find($id);
        File::delete(public_path('employee') .'/'. $employee->photo);
        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'profile' => $request->profile,
            'photo' => $photo,
            'skill_id' => $request->skill_id,
            'division_id' => $request->division_id
        ]);
        // put photos on public/employee
        $request->photo->move(public_path('employee'), $photo);

        return redirect('/hr');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        File::delete(public_path('employee') .'/'. $employee->photo);

        Employee::destroy($id);
        return redirect('/hr');
    }
}
