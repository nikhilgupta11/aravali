<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Itknowledge;
use Illuminate\Http\Request;

class ItknowledgeController extends Controller
{
    //

    public function index()
    {
        $eligibility= Itknowledge::select('*')->orderBy('title','asc')->get();
// print_r($eligibility);
// die;

        if(request()->ajax()) {
            return datatables()->of($eligibility)
            ->addColumn('action', 'admin.itknowledges.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
            }
            return view('admin.itknowledges.index');

      
    }
    public function create(Request $request)
    {
        return view('admin.itknowledges.create');
    }

    public function store(Request $request)
    {

        //$input = $request->all();
        $request->validate([
            'title' => 'required',
            
            ]);

        $state = new Itknowledge;
        $state->title = $request->title;
        if($request->status=='on')
        {
            $state->status = '1';
        }
        else{
            $state->status = '0';
        }
        $state->save();

        return redirect()->route('admin.itknowledges.index')
        ->with('success','Eligibility has been created successfully.');
        

    }   
    public function show(Itknowledge $itknowledge)
    {
        return view('admin.itknowledges.show', compact('itknowledge'));
    }

    /*
    params = $amenity;
    call the amenities edit view page
    return view name admin.amenities.edit, variables = amenity object
    */
    public function edit(Itknowledge $itknowledge)
    {
        return view('admin.itknowledges.edit', compact('itknowledge'));
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

        $itknowledge = Itknowledge::find($id);
        $itknowledge->title = $request->title;
        if($request->status=='on')
        {
            $itknowledge->status = '1';
        }
        else{
            $itknowledge->status = '0';
        }
        $itknowledge->save();
        return redirect()->route('admin.itknowledges.index')
            ->with('success', 'Itknowledge data Has Been updated successfully');
    }

    /*
    params = $request;
    delete the rows in the table based on id
    return the rest of the columns
    */
    public function destroy(Request $request)
    {
        $itknowledge = Itknowledge::where('id', $request->id)->delete();
        return Response()->json($itknowledge);
    }
}
