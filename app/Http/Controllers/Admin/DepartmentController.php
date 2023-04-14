<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Department;
use App\Models\DepartmentDistrict;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //


    public function index()
    {
    
    
    
    if (request()->ajax()) {
        $department = Department::select(['id', 'state_id','district_id', 'name', 'status'])->orderBy('name','asc');
        return datatables()->of($department)
            ->editColumn('state_id', function ($department) {
                return getStateName($department->state_id);
            })
            
          
            ->addColumn('action', 'admin.department.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
    return view('admin.department.index');
    
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $country = Country::where('status', 1)->where('flag','!=',1)->get();
        $selected_country = Country::where('status', 1)->where('flag',1)->first();
        
        $selected_state = State::where('status', 1)->where('flag',1)->first();
    $state =     State::where('status',1)->where('flag','!=',1)->get();
    $district =     District::where('status',1)->where('state_id',1)->get();
    
    return view('admin.department.create',compact('selected_country','selected_state','state','district','country'));
    }
    
    
    public function store(Request $request)
    {
    
        //$input = $request->all();
       
           
                $request->validate([
                    'state_id' => 'required',
                    'country_id' => 'required',
                    'district_id' => 'required',
                    'department_name' => 'required',
                    ]);
       
                
                
        
    
        // $state = new Department();
        // $state->state_id = $request->state_id;
        // $state->district_id = $request->district_id;

        $district_id=$request->input('district_id');
        //print_r($amenity_codes);
        //$coun=count($amenity_codes);
        // echo $coun;
       
      
         
                $state = new Department();
                $state->name = $request->department_name;
                $state->state_id = $request->state_id;
                $state->country_id = $request->country_id;
               
                if($request->status=='on')
                {
                    $state->status = '1';
                }
                else{
                    $state->status = '0';
                }
                $state->save();

                foreach($district_id as $data){

                    $district_department = new DepartmentDistrict();
                    $district_department->district_id=$data;
                    $district_department->department_id=$state->id;
                    $district_name =  getDistrictName($data);
                    $district_department->district_name=$district_name;
                    $district_department->save();
                    

               }
            
    
        return redirect()->route('admin.department.index')
        ->with('success','Department has been created successfully.');
        
    
    }   
    public function show(Department $department)
    {
        $state =     State::where('status',1)->get();
        $district =     District::where('status',1)->get();
        return view('admin.department.show', compact('department','district','state'));
    }
    

    /*
    params = $amenity;
    call the amenities edit view page
    return view name admin.amenities.edit, variables = amenity object
    */
    public function edit(Department $department)
    {
        
        $state =     State::where('status',1)->get();
        $country =     Country::where('status',1)->get();
      
        $selected_district = DepartmentDistrict::where('department_id', $department->id)->pluck('district_id')->toarray();
        $districts = District::whereIn('id', $selected_district )->get();

        
        $district = District::where('status', 1)->get(); 
        return view('admin.department.edit', compact('district','state','department','country','selected_district'));
    }


    public function update(Request $request, $id)
    {
        
       
            $request->validate([
                'state_id' => 'required',
                'country_id' => 'required',
                'district_id' => 'required',
                'department_name' => 'required',
                ]);
       
            
        $department = DepartmentDistrict::where('department_id',$id);
        
        $department->delete();
        
        $district_id=$request->input('district_id');
        //print_r($amenity_codes);
        //$coun=count($amenity_codes);
        // echo $coun;
       
        
            
                $department = Department::find($id);
                $department->name = $request->department_name;
                $department->state_id = $request->state_id;
                $department->country_id = $request->country_id;
                
                if($request->status=='on')
                {
                    $department->status = '1';
                }
                else{
                    $department->status = '0';
                }
                $department->save();
                foreach($district_id as $data){

                    $district_department = new DepartmentDistrict();
                    $district_department->district_id=$data;
                    $district_department->department_id=$department->id;
                    $district_name =  getDistrictName($data);
                    $district_department->district_name=$district_name;
                    $district_department->save();

               }
        
        return redirect()->route('admin.department.index')
            ->with('success', 'Department Has Been updated successfully');
    }



     /*
    params = $request;
    delete the rows in the table based on id
    return the rest of the columns
    */
    public function destroy(Request $request)
    {
        $department = Department::where('id', $request->id)->delete();
        return Response()->json($department);
    }

}
