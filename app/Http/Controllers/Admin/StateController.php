<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\State;
use Datatables;

class StateController extends Controller
{
    //
    public function index()
    {
        $statess = State::all();


     

        if (request()->ajax()) {
            $states = state::select(['id', 'name','country_id', 'status']);
            return datatables()->of($states)
                ->editColumn('country_id', function ($states) {
                    return getNationalityName($states->country_id);
                })
               
              
                ->addColumn('action', 'admin.states.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.states.index');
    }
    public function create(Request $request)
    {
        $country = Country::where('status', '1')->get();
        return view('admin.states.create', compact('country'));
    }

    public function store(Request $request)
    {

        //$input = $request->all();
        $request->validate([
            'state_name' => 'required',
            'country_id' => 'required',

        ]);

        $state = new State;
        $state->name = $request->state_name;
        $state->country_id = $request->country_id;
        if ($request->status == 'on') {
            $state->status = '1';
        } else {
            $state->status = '0';
        }
        $state->save();

        return redirect()->route('admin.states.index')
            ->with('success', 'State has been created successfully.');
    }
    public function show(State $state)
    {
        $country = Country::where('id', $state->country_id)->get()->first();
        return view('admin.states.show', compact('state', 'country'));
    }

    /*
    params = $amenity;
    call the amenities edit view page
    return view name admin.amenities.edit, variables = amenity object
    */
    public function edit(State $state)
    {
        $country = Country::where('status', '1')->get();
       
        return view('admin.states.edit', compact('state','country'));
    }

    /*
    params = $request, $id;
    edit all the values in the table based on id
    return view name admin.amenities.edit, variables = amenity object
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'state_name' => 'required',
            'country_id' => 'required',
        ]);

        $state = State::find($id);
        $state->name = $request->state_name;
        $state->country_id = $request->country_id;
        if ($request->status == 'on') {
            $state->status = '1';
        } else {
            $state->status = '0';
        }
        $state->save();
        return redirect()->route('admin.states.index')
            ->with('success', 'State Has Been updated successfully');
    }

    /*
    params = $request;
    delete the rows in the table based on id
    return the rest of the columns
    */
    public function destroy(Request $request)
    {
        $state = State::where('id', $request->id)->delete();
        return Response()->json($state);
    }
}
