<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipateController extends Controller
{
    public function store(Request $request,$id)
    {
        \Auth::user()->participate($id);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->unparticipate($id);
        return back();
    }
}
