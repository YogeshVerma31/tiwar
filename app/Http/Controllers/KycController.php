<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Kyc;
use App\Models\State as ModelsState;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KycController extends Controller
{
    public function index_add_kyc(Request $request)
    {
        $states = ModelsState::Where("country_id", "=", 105)->orderBy('name', 'ASC')->get();
        return view('admin.kyc.createkyc', ["states" => $states]);
    }

    public function index_view_kyc(Request $request)
    {
        $kyc =  [];
        if (Session::get('user')->id == 1) {
            $kyc =  Kyc::Join('states', 'kycs.state_id', '=', 'states.id')
                ->Join('cities', 'cities.id', '=', 'kycs.city_id')
                ->Join('users', 'users.id', '=', 'kycs.created_by')
                ->select('kycs.*', 'states.name as state_name', "cities.city as cities_name", "users.name as created_by")
                ->get();
        }else{
            $kyc =  Kyc::Join('states', 'kycs.state_id', '=', 'states.id')
            ->Join('cities', 'cities.id', '=', 'kycs.city_id')
            ->Join('users', 'users.id', '=', 'kycs.created_by')
            ->select('kycs.*', 'states.name as state_name', "cities.city as cities_name", "users.name as created_by")
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


    public function post_add_kyc(Request $request)
    {

        try {

            $credentials = $request->validate([
                'email_id' => ['required', 'email'],
                'name' => ['required'],
            ]);

            $kycModel = new Kyc();
            $kycModel->name = $request->name;
            $kycModel->father_name = $request->father_name;
            $kycModel->wife_name = $request->wife_name;
            $kycModel->children_name = $request->children_name;
            $kycModel->phone_number = $request->phone_number;
            $kycModel->address = $request->address;
            $kycModel->email_id = $request->email_id;
            $kycModel->state_id = $request->state_id;
            $kycModel->city_id = $request->city_id;
            $kycModel->pincode = $request->pincode;
            $kycModel->qualification = $request->qualification;
            $kycModel->created_by = Session::get('user')->id;
            $kycModel->save();


            Session::flash('success', 'Kyc created successfully');
            return  redirect()->intended('/add-kyc');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return  redirect()->intended('/add-kyc');
        }
    }
}
