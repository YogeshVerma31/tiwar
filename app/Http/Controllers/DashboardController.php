<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $category = Category::all();
        return view('frontend.index',['category'=>$category]);
    }

    public function index_admin(Request $request){
        return view('admin.dashboard');
    }

    public function index_subcategory(Request $request,$id){
        $category = Category::all();
        return view('frontend.subcategory',['category'=>$category]);
    }
}
