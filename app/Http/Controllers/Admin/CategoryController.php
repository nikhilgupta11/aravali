<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $category = Category::all();
        if (request()->ajax()) {
            return datatables()->of($category)
                ->addColumn('action', 'admin.category.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.category.index');
    }
    public function create(Request $request)
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {

        //$input = $request->all();
        $request->validate([
            'category_name' => 'required',

        ]);

        $category = new Category;
        $category->category = $request->category_name;
        if ($request->status == 'on') {
            $category->status = '1';
        } else {
            $category->status = '0';
        }
        $category->save();

        return redirect()->route('admin.category.index')
            ->with('success', 'Category has been created successfully.');
    }
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /*
    params = $amenity;
    call the amenities edit view page
    return view name admin.amenities.edit, variables = amenity object
    */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /*
    params = $request, $id;
    edit all the values in the table based on id
    return view name admin.amenities.edit, variables = amenity object
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $category = Category::find($id);
        $category->category = $request->category_name;
        if ($request->status == 'on') {
            $category->status = '1';
        } else {
            $category->status = '0';
        }
        $category->save();
        return redirect()->route('admin.category.index')
            ->with('success', 'Category Has Been updated successfully');
    }

    /*
    params = $request;
    delete the rows in the table based on id
    return the rest of the columns
    */
    public function destroy(Request $request)
    {
        $category = Category::where('id', $request->id)->delete();
        return Response()->json($category);
    }
}
