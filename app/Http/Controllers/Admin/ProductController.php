<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allProduct = Product::latest()->get();
        return view('admin.products.index',compact('allProduct'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::latest()->where('status',1)->get();
        return view('admin.products.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required',
            'thumbnail'   => 'required|image',
            'qty'         => 'required',
            'price'       => 'required',
            'category_id' => 'required',
            'sub_cat_id'  => 'required',
        ],
        [
            'qty.required' => 'Quantity is required',
            'category_id.required' => 'Category is required',
            'sub_cat_id.required' => 'Sub-Category is required',
        ]);

        $product = new Product;
        $product->title        = $request->input('title');
        $product->slug         = Str::slug($request->input('title'));
        $product->category_id  = $request->input('category_id');
        $product->sub_cat_id   = $request->input('sub_cat_id');
        $product->short_description   = $request->input('short_desc');
        $product->desc         = $request->input('description');
        $product->size         = $request->input('size');
        $product->color        = $request->input('color');
        $product->qty          = $request->input('qty');
        $product->price        = $request->input('price');

        $folder = Carbon::now()->year.'/'. Carbon::now()->month.'/'.Carbon::now()->day;
        if (!file_exists(base_path('storage/app/public/') . $folder)) {
            mkdir(base_path('storage/app/public/') . $folder, 666, true);
        }
        if ($request->hasFile('thumbnail')) {
            $thumbnail      = $request->file('thumbnail');
            $thumbnail_name = Str::random(30);
            $extension      = $thumbnail->extension();
            $thumbnail_file = $thumbnail_name .'.'.$extension;
            $thumbnail->storeAs('public/'.$folder.'/', $thumbnail_file);
            $product->thumbnail = $folder.'/'.$thumbnail_file;
        }
        $result = $product->save();
        if ($result==true) {
            return redirect()->route('product.index')->with('success','Product Successfully created!');
        }else{
            return redirect()->route('product.index')->with('error','Product not  created, try aganin !');
        }
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
    public function edit(string $id)
    {
        $edit_product = Product::findOrFail($id);
        $category = Category::latest()->where('status',1)->get();
        return view('admin.products.edit',compact('edit_product','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title'       => 'required',
            'thumbnail'   => 'image',
            'qty'         => 'required',
            'price'       => 'required',
            'category_id' => 'required',
            'sub_cat_id'  => 'required',
        ],
        [
            'qty.required' => 'Quantity is required',
            'category_id.required' => 'Category is required',
            'sub_cat_id.required' => 'Sub-Category is required',
        ]);

        $product = Product::findOrFail($id);
        $product->title        = $request->input('title');
        $product->slug         = Str::slug($request->input('title'));
        $product->category_id  = $request->input('category_id');
        $product->sub_cat_id   = $request->input('sub_cat_id');
        $product->short_description   = $request->input('short_desc');
        $product->desc         = $request->input('description');
        $product->size         = $request->input('size');
        $product->color        = $request->input('color');
        $product->qty          = $request->input('qty');
        $product->price        = $request->input('price');

        $folder = Carbon::now()->year.'/'. Carbon::now()->month.'/'.Carbon::now()->day;
        if ($request->hasFile('thumbnail')) {
            if (file_exists('storage/'.$product->thumbnail) && $product->thumbnail != '') {
                unlink('storage/'.$product->thumbnail);
            }
            $thumbnail      = $request->file('thumbnail');
            $thumbnail_name = Str::random(30);
            $extension      = $thumbnail->extension();
            $thumbnail_file = $thumbnail_name .'.'.$extension;
            $thumbnail->storeAs('public/'.$folder.'/', $thumbnail_file);
            $product->thumbnail = $folder.'/'.$thumbnail_file;
        }
        $result = $product->update();
        if ($result==true) {
            return redirect()->route('product.index')->with('success','Product Successfully Updated!');
        }else{
            return redirect()->route('product.index')->with('error','Product not  updated, try aganin !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $result  = $product->delete();
        if ($result) {
            if ($product->thumbnail != '') {
                unlink('storage/'.$product->thumbnail);
            }
            return redirect()->back()->with('success','This iteam deleted successfully!');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function status($id)
    {
        $product = Product::findOrFail($id);
        if($product->status == 1){
            $product->status ='0';
            $product->update();
            return redirect()->back()->with('error','Product Status is Disable');
        }else{
            $product->status ='1';
            $product->update();
            return redirect()->back()->with('success','Product Status is Enable');
        }
    }
}
