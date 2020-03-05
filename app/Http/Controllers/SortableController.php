<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class SortableController extends Controller
{

    public function tp_dashboard() {

        $divisions = DB::table('sortables')->orderby('position')->get();
        return view('tp_view.app', compact('divisions'));   

    }

    
    public function index() {

        $divisions = DB::table('sortables')->orderby('position')->get();
        return view('sortable.index', compact('divisions'));

    }

    public function sorted(Request $request) {

        // dd($request->positions);

        foreach ($request->positions as $position) {

            $index = $position[0];
            $newPosition = $position[1];

            $query =  "UPDATE sortables SET position = '$newPosition' WHERE id = '$index'";

            DB::select( DB::raw($query) );

        }

        return ('Sorted Successfully');
    }
    
}
