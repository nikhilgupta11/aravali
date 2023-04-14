<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eligibility;
use Illuminate\Http\Request;

class EligibilityController extends Controller
{
    //

    public function index()
    {
        $eligibility= Eligibility::select('*')->orderBy('title','asc')->get();


        if(request()->ajax()) {
            return datatables()->of($eligibility)
            ->addColumn('action', 'admin.eligibilities.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
            }
            return view('admin.eligibilities.index');

      
    }
    public function create(Request $request)
    {
        return view('admin.eligibilities.create');
    }

    public function store(Request $request)
    {

        //$input = $request->all();
        $request->validate([
            'title' => 'required',
            
            ]);

        $state = new Eligibility;
        $state->title = $request->title;
        if($request->status=='on')
        {
            $state->status = '1';
        }
        else{
            $state->status = '0';
        }
        $state->save();

        return redirect()->route('admin.eligibilities.index')
        ->with('success','Eligibility has been created successfully.');
        

    }   
    public function show(Eligibility $eligibility)
    {
        return view('admin.eligibilities.show', compact('eligibility'));
    }

    /*
    params = $amenity;
    call the amenities edit view page
    return view name admin.amenities.edit, variables = amenity object
    */
    public function edit(Eligibility $eligibility)
    {
        return view('admin.eligibilities.edit', compact('eligibility'));
    }

    /*
    params = $request, $id;
    edit all the values in the table based on id
    return view name admin.amenities.edit, variables = amenity object
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            ]);

        $state = Eligibility::find($id);
        $state->title = $request->title;
        if($request->status=='on')
        {
            $state->status = '1';
        }
        else{
            $state->status = '0';
        }
        $state->save();
        return redirect()->route('admin.eligibilities.index')
            ->with('success', 'State Has Been updated successfully');
    }

    /*
    params = $request;
    delete the rows in the table based on id
    return the rest of the columns
    */
    public function destroy(Request $request)
    {
        $eligibility = Eligibility::where('id', $request->id)->delete();
        return Response()->json($eligibility);
    }
}
