<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubCategoryController extends Controller
{
    public function index_add_subcategory(Request $request){
        try {
            
            $categoryModel = Category::all();

            return view("admin.subcategory.createSubCategory", [ 'categoryData' => $categoryModel]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            print_r($e->getMessage());
            die;
            //return  redirect()->intended('/subcategory');
        }
       
    }

    public function index_view_subcategory(Request $request)
    {
        //         ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
        try {
            $subcategoryModel = SubCategory::Join('categories', 'sub_categories.category_id', '=', 'categories.id')
                ->select('sub_categories.*', 'categories.category_name')
                ->get();
            $categoryModel = Category::all();
            // print_r($subcategoryModel);die;

            return view("admin.subcategory.viewSubCategory", ['subcategoryData' => $subcategoryModel, 'categoryData' => $categoryModel]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            print_r($e->getMessage());
            die;
            //return  redirect()->intended('/subcategory');
        }
    }



    public function post_add_subcategory(Request $request)
    {

        $credentials = $request->validate([
            'subcategory_name' => ['required'],
            'category_id' => ['required'],
            'subcategory_image' => ['required'],
        ]);


        $image = $request->file('subcategory_image');

        // Get the size of the image in bytes.
        $sizeInBytes = $image->getSize();

        // Convert the size to a human-readable format (e.g., KB, MB, etc.).

        // Store the image in the storage (e.g., public disk).
        try {

            $path = $image->store('images', 'public');

            // Save the image data to the database.
            $categoryModel = new SubCategory();
            $categoryModel->subcategory_image = $path;
            $categoryModel->subcategory_name = $request->subcategory_name;
            $categoryModel->category_id = $request->category_id;
            $categoryModel->save();

            Session::flash('success', 'Sub Category created successfully');
            return  redirect()->intended('/add-subcategory');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return  redirect()->intended('/add-subcategory');
        }
    }

}
