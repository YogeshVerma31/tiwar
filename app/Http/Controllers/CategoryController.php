<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index_add_category(Request $request){
        return view('admin.category.createCategory');
    }
    public function index_view_category(Request $request){

        $categories = Category::all();

        return view('admin.category.viewCategory',["categoryData"=>$categories]);
    }


    public function post_add_category(Request $request)
    {

        $credentials = $request->validate([
            'category_name' => ['required'],
            'category_image' => ['required'],
        ]);
        
        
        $image = $request->file('category_image');

        // Get the size of the image in bytes.
        $sizeInBytes = $image->getSize();

        // Store the image in the storage (e.g., public disk).
        try{

        $path = $image->store('images', 'public');

        // Save the image data to the database.
        $categoryModel = new Category();
        $categoryModel->category_image = $path;
        $categoryModel->category_name = $request->category_name;
        $categoryModel->save();

        Session::flash('success','Category created successfully');
        return  redirect()->intended('admin/add-category');

        }catch(Exception $e){
            Session::flash('error',$e->getMessage());
            return  redirect()->intended('admin/add-category');
        }

    
    }
}
