<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\DepartmentDistrict;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\State;

class DistrictController extends Controller
{
    //
    public function index()
    {
        if (request()->ajax()) {
            $district = District::select(['id', 'state_id', 'name','country_id', 'status'])->orderBy('name','asc');
            return datatables()->of($district)
                ->editColumn('state_id', function ($district) {
                    return getStateName($district->state_id);
                })
                ->editColumn('country_id', function ($district) {
                    return getNationalityName($district->country_id);
                })

                ->addColumn('action', 'admin.district.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.district.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state =     State::where('status', 1)->where('flag','!=',1)->get();
       
        $country = Country::where('status', 1)->where('flag','!=',1)->get();
        $selected_state =     State::where('status', 1)->where('flag',1)->first();
        $selected_country = Country::where('status', 1)->where('flag',1)->first();
       

        return view('admin.district.create', compact('state', 'country','selected_state','selected_country'));
    }


    public function store(Request $request)
    {

        //$input = $request->all();
        $request->validate([
            'state_id' => 'required',
            'district_name' => 'required',
            'country_id' => 'required',
        ]);

        $state = new District;
        $state->state_id = $request->state_id;
        $state->country_id = $request->country_id;
        $state->name = $request->district_name;
        if ($request->status == 'off') {
            $state->status = '0';
        } else {
            $state->status = '1';
        }
        $state->save();

        return redirect()->route('admin.district.index')
            ->with('success', 'District has been created successfully.');
    }
    public function show(District $district)
    {
        $country = Country::where('id', $district->country_id)->get()->first();
        return view('admin.district.show', compact('district', 'country'));
    }


    /*
    params = $amenity;
    call the amenities edit view page
    return view name admin.amenities.edit, variables = amenity object
    */
    public function edit(District $district)
    {

        $state =     State::where('status', 1)->get();
        $country = Country::where('status', '1')->get();

        return view('admin.district.edit', compact('district', 'state', 'country'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'district_name' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
        ]);

        $district = District::find($id);
        $district->country_id = $request->country_id;
        $district->state_id = $request->state_id;
        $district->name = $request->district_name;
        if ($request->status == 'on') {
            $district->status = '1';
        } else {
            $district->status = '0';
        }
        $district->save();
        return redirect()->route('admin.district.index')
            ->with('success', 'District Has Been updated successfully');
    }

    /*
    params = $request;
    delete the rows in the table based on id
    return the rest of the columns
    */
    public function destroy(Request $request)
    {
        $district = District::where('id', $request->id)->delete();
        return Response()->json($district);
    }


       /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)->where('status',1)
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }

         /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchDistrict(Request $request)
    {
        $data['states'] = District::where("state_id", $request->state_id)->where('status',1)
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }


           /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchDistrictDepartment(Request $request)
    {
        
        $data['district'] = DepartmentDistrict::where("department_id", $request->department_id)
                                ->get(["district_name", "district_id"]);
  
        return response()->json($data);
    }
}
