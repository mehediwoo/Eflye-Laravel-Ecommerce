<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategory = SubCategory::latest()->paginate(20);
        return view('admin.subcategory.index',compact('subCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parent_category = Category::latest()->get();
        return view('admin.subcategory.create',compact('parent_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:sub_categories,title,|max:30',
        ]);

        $sub_category = new SubCategory;
        $sub_category->title = $request->input('title');
        $sub_category->slug  = Str::slug($request->input('title'));
        $sub_category->category_id  = $request->input('category_id');
        $sub_category->save();
        return redirect()->route('sub-category.index')->with('success','Sub Category Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editSubCategory = SubCategory::findOrFail($id);
        $parent_category = Category::latest()->get();
        return view('admin.subcategory.edit',compact('editSubCategory','parent_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|unique:sub_categories,title,'.$id,
        ]);

        $sub_category = SubCategory::findOrFail($id);
        $sub_category->title = $request->input('title');
        $sub_category->slug  = Str::slug($request->input('title'));
        $sub_category->category_id  = $request->input('category_id');
        $sub_category->update();
        return redirect()->route('sub-category.index')->with('success','Sub Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        $result = $sub_category->delete();
        if($result){
            return redirect()->route('sub-category.index')->with('success','Sub Category Delete Successfully!');
        }else{
            return redirect()->route('sub-category.index')->with('error','Something Wrong, try again!');
        }
    }

    // Status
    public function status($id)
    {
        $status = SubCategory::findOrFail($id);
        if($status->status == 1){
            $status->status = '0';
            $status->update();
            return redirect()->back()->with('error','Sub Category Status is Disable');
        }else{
            $status->status = '1';
            $status->update();
            return redirect()->back()->with('success','Sub Category Status is Enable');
        }
    }
}
