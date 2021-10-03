<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class CityController extends Controller
{
    //
    public function index(Request $request,State $state)
    {
        # code...
        $cities=City::all();
        
        if($request->has('search')){
            $cities=City::where('name','like',"%{$request->search}%")
            // ->orWhereHas('state_name','like',"%{$request->search}%")
            ->get();
        }
       // var_dump($request);
        return view('cities.index',compact('cities'));
        
    }
   

    public function create()
    {
        # code...
        $states=State::all();
        return view('cities.create',compact('states'));
    }
    public function store(Request $request)
    {
        # code...
        City::create($request->validated());
        // City::create(([
        //     'state_id'=>$request['state_id'],
        //     'name'=>$request['name']
        // ]));
        return redirect()->route('cities.index')->with('message','City Added Successfully');
        
    }
    public function edit(City $city)
    {
        # code...
        $states=State::all();
        return view ('cities.edit',compact('city','states'));
    }
    public function update(CityStoreRequest $request,City $city)
    {
        # code...
        $city->update($request->validated());
        return redirect()->route('cities.index')->with('message','City Updated Successfully');
    }

    public function destroy(City $city)
    {
        # code...
        $city->delete();
        return redirect()->route('cities.index')->with('message','City Deleted Successfully');
    }

}
