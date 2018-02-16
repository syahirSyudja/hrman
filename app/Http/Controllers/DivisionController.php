<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use Validator;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q_div = Division::all();
        return view('divisionmain', compact('q_div'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adddivision');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), Division::validasi());
        if ($validasi->fails()) return back()
            ->withInput()
            ->withErrors($validasi);
        // if valid
        Division::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active
        ]);

        return redirect('/division');
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
    public function edit($id)
    {
        $division = Division::find($id);
        return view('adddivision', compact('division'));
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
        $validasi = Validator::make($request->all(), Division::validasi());
        if ($validasi->fails()) return back()
            ->withInput()
            ->withErrors($validasi);
        // if valid
        $division = Division::find($id);
        $division->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active
        ]);

        return redirect('/division');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Division::destroy($id);
        return redirect('/division');
    }
}
