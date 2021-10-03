<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentStoreRequest;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $departments=Departement::all();
        if($request->has('search')){
            $departments=Departement::where('name','like',"%{$request->search}%")
            ->get();
        }
        return view('departments.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentStoreRequest $request)
    {
        //
        Departement::create($request->validated());

        return redirect()->route('departments.index')->with('message','department created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $department)
    {
        //

        return view('departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentStoreRequest $request, Departement $department)
    {
        //
        $department->update($request->validated());
        return redirect()->route('departments.index')->with('message','department created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departement $department)
    {
        //
        $department->delete();
        return redirect()->route('departments.index')->with('message','department deleted Successfully');
    }
}
