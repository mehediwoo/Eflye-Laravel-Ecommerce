<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::latest()->paginate(20);
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:categories,title,|max:30',
        ]);

        $category = new Category;
        $category->title = $request->input('title');
        $category->slug  = Str::slug($request->input('title'));
        $category->save();
        return redirect()->route('category.index')->with('success','Category Added Successfully!');
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
        $edit_category = Category::findOrFail($id);
        return view('admin.category.edit', compact('edit_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|max:30|unique:categories,title,'.$id,
        ]);

        $category =  Category::findOrFail($id);
        $category->title = $request->input('title');
        $category->slug  = Str::slug($request->input('title'));
        $result = $category->update();
        if($result){
            return redirect()->route('category.index')->with('success','Category Updated Successfully!');
        }else{
            return redirect()->route('category.index')->with('error','Something wrong, try again!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $subCategory = SubCategory::where('category_id','=',$category->id)->delete();
        if($category==true){
            $category->delete();
            return redirect()->back()->with('success','Category Delete Successfully!');
        }else{
            return redirect()->back()->with('error','Category not deleted, please try again!');
        }
    }

    // Status
    public function status($id)
    {
        $status = Category::findOrFail($id);
        if($status->status == 1){
            $status->status = '0';
            $status->update();
            return redirect()->back()->with('error','Category is Disable!');
        }else{
            $status->status = '1';
            $status->update();
            return redirect()->back()->with('success','Category is Enable!');
        }
    }
}
