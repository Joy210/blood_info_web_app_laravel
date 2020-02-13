<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeoLocationController extends Controller
{
    public function index(){

        $divisions = DB::table('geo_divisions')->get();

        return view('home', compact('divisions'));
    }

    // get_district
    public function get_district($id){

        $district = DB::table('geo_districts')->where('geo_division_id', $id)->get();

        return json_encode($district);
    }
    
    // get_upazilas
    public function get_upazila($id) {
        $upazilas = DB::table('geo_upazilas')->where('geo_district_id', $id)->get();

        return json_encode($upazilas);
    }

    public function find_user_by_district_or_upazila($id){
        
        $user = DB::table('users')->where('division', $id)->get();
        
        return json_encode($user);
    }


}
