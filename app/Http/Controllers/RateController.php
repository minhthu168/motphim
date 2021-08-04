<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
class RateController extends Controller
{
    public function createRate(Request $request){
        $r = $request->all();
        $r = new Rate($r);
        $r->save(); 
        return view('film');
    }
}
