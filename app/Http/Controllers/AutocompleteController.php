<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AutocompleteController extends Controller
{
    //
    public function states(Request $request)
    {
        $search = $request->get('term');
        
        $stateslist = \DB::table('states')->select('state_name')
                        ->where('state_name', 'LIKE' , '%' .$search . '%')
                        ->get();
        return response()->json($stateslist);

        
    }
}
