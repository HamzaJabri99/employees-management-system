<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    //
    public function index(Request $request,Country $country)
    {
           $countries=Country::All();
           if($request->has('search')){
               $countries=Country::where('country_code','like',"%{$request->search}%")
              ->orWhere('name','like',"%{$request->search}%")
             ->get();
             if($countries->empty()){
                return redirect()->route('countries.index')->with('message',"there are no countries with the name {$request->search}");
             }
            }
           
           return view('countries.index',compact('countries'));

    }
    public function create(){


        return view('countries.create');
    }
    public function store(CountryStoreRequest $request){
       
         Country::create($request->validated());
        return redirect()->route('countries.index')->with('message','Country Created Successfully');   
    }
    public function edit(Country $country)
    {
        # code...
        return view('countries.edit',compact('country'));

    }
    public function update(CountryUpdateRequest $request,Country $country)
    {
        # code...
        $country->update($request->validated());
        return redirect()->route('countries.index')->with('message','Country Updated Successfully');
    }
    public function destroy(Country $country)
    {
        # code...
        $country->delete();
       return redirect()->route('countries.index')->with('message','Deleted Successfully');
    }
}
