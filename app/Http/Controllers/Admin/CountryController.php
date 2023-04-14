<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    //
    public function index()
    {
        $countries = Country::all();
        if (request()->ajax()) {
            return datatables()->of($countries)
                ->addColumn('action', 'admin.countries.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.countries.index');
    }
    public function create(Request $request)
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        
        //$input = $request->all();
        $request->validate([
            'country_name' => 'required',

        ]);

        $country = new Country;
        $country->country_name = $request->country_name;
        if ($request->status == 'on') {
            $country->status = '1';
        } else {
            $country->status = '0';
        }
        $country->save();

        return redirect()->route('admin.countries.index')
            ->with('success', 'Country has been created successfully.');
    }
    public function show(Country $country)
    {
        return view('admin.countries.show', compact('country'));
    }

    /*
    params = $amenity;
    call the amenities edit view page
    return view name admin.amenities.edit, variables = amenity object
    */
    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    /*
    params = $request, $id;
    edit all the values in the table based on id
    return view name admin.amenities.edit, variables = amenity object
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'country_name' => 'required',
        ]);

        $country = Country::find($id);
        $country->country_name = $request->country_name;
   
        if ($request->status == 'on') {
            $country->status = '1';
        } else {
            $country->status = '0';
        }
        $country->save();
        return redirect()->route('admin.countries.index')
            ->with('success', 'Country Has Been updated successfully');
    }

    /*
    params = $request;
    delete the rows in the table based on id
    return the rest of the columns
    */
    public function destroy(Request $request)
    {
        $country = Country::where('id', $request->id)->delete();
        return Response()->json($country);
    }
}
