<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class GeoLocationController extends Controller
{
    public function index(){

        $divisions = DB::table('geo_divisions')->orderBy('division_name_eng', 'asc')->get();
        return view('home', compact('divisions'));

    }

    // get_district
    public function get_district($id){

        // $users = DB::table('users')->where('district', $id)->get();
        $districts = DB::table('geo_districts')->orderBy('district_name_eng', 'asc')->where('geo_division_id', $id)->get();
        return json_encode($districts);

        // return response()->json(array(
        //     'users' => $users,
        //     'districts' => $districts,
        // ));
    }
    
    // get_upazilas
    public function get_upazila($id) {

        $upazilas = DB::table('geo_upazilas')->orderBy('upazila_name_eng', 'asc')->where('geo_district_id', $id)->get();
        return json_encode($upazilas);

    }


    public function fetch_users(){

        $users = DB::table('users')->orderBy('created_at', 'desc')->get();
        return json_encode($users);

    }
    
    public function find_user_by_division($id){
        
        $user = DB::table('users')->where('division', $id)->get();    
        return json_encode($user);
    
    }
    
    public function find_user_by_district($id){
        
        $user = DB::table('users')->where('district', $id)->get();    
        return json_encode($user);
    
    }
    
    public function find_user_by_upazila($id){
        
        $user = DB::table('users')->where('upazila', $id)->get();    
        return json_encode($user);
    
    }


}
