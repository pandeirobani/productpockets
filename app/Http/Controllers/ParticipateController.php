<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipateController extends Controller
{
    public function store(Request $request,$id)
    {
        if(\Auth::check()) {
            \Auth::user()->participate($id);
            return back();
        }
    }
    
    public function destroy($id)
    {
        if(\Auth::check()) {
            \Auth::user()->unparticipate($id);
            return back();
        }
    }
}
