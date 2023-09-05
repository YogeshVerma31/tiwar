<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Kyc;
use App\Models\State as ModelsState;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KycController extends Controller
{
    public function index_add_kyc(Request $request)
    {
        $states = ModelsState::Where("country_id", "=", 105)->orderBy('name', 'ASC')->get();
        $category = Category::all();
        return view('admin.kyc.createkyc', ["states" => $states,"category"=>$category]);
    }

    public function index_view_kyc(Request $request)
    {
        $kyc =  [];
        if (Session::get('user')->id == 1) {
            $kyc =  Kyc::Join('states', 'kycs.state_id', '=', 'states.id')
                ->Join('cities', 'cities.id', '=', 'kycs.city_id')
                ->Join('categories', 'categories.id', '=', 'kycs.category_id')
                ->Join('sub_categories', 'sub_categories.id', '=', 'kycs.subcategory_id')
                ->Join('users', 'users.id', '=', 'kycs.created_by')
                ->select('kycs.*', 'states.name as state_name','categories.category_name','sub_categories.subcategory_name', "cities.city as cities_name", "users.name as created_by")
                ->get();
        }else{
            $kyc =  Kyc::Join('states', 'kycs.state_id', '=', 'states.id')
            ->Join('cities', 'cities.id', '=', 'kycs.city_id')
            ->Join('users', 'users.id', '=', 'kycs.created_by')
            ->Join('categories', 'categories.id', '=', 'kycs.categories_id')
            ->select('kycs.*', 'states.name as state_name', 'categories.category_name','sub_categories.subcategory_name',"cities.city as cities_name", "users.name as created_by")
            ->where('users.id','=',Session::get('user')->id)
            ->get();
        }
        return view('admin.kyc.viewkyc', ["kycs" => $kyc]);
    }

    public function get_city_by_state(Request $request, $id)
    {
        $cities = City::Where("state_id", "=", $id)->orderBy('city', 'ASC')->get();
        return response()->json(["status" => 200, "message" => "Success", "data" =>  $cities], 200);
    }


    public function get_subcategory_by_category(Request $request, $id)
    {
        $cities = SubCategory::Where("category_id", "=", $id)->get();
        return response()->json(["status" => 200, "message" => "Success", "data" =>  $cities], 200);
    }


    public function post_add_kyc(Request $request)
    {

        try {

            $credentials = $request->validate([
                'email_id' => ['required', 'email'],

            ]);

            $request['created_by'] =Session::get('user')->id;

            $kycModel = Kyc::create($request->all());
            $kycModel->save();

            Session::flash('success', 'Kyc created successfully');
            return  redirect()->intended('admin/add-kyc');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return  redirect()->intended('admin/add-kyc');
        }
    }
}
