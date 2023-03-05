<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function Index()
    {
        $category = Category::latest()->get();
        return view('front.home',compact('category'));
    }

    // Product Details
    public function ProductDetails($id,$slug)
    {
        $product = Product::findOrFail($id);
        return view('front.details',compact('slug','product'));
    }

    // Category wise product
    public function CategoryProduct($id,$slug)
    {
        $product = Product::where('category_id',$id)->paginate(16);
        return view('front.categoryProduct',compact('product','slug'));
    }
    // sub Category wise product
    public function SubCategoryProduct($id,$slug)
    {
        $product = Product::where('sub_cat_id',$id)->paginate(16);
        return view('front.subCatewiseProduct',compact('product','slug'));
    }
}
