<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_comment;

class Product_commentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);
        
        Product_comment::create([
            'content' => $request->content,
            'product_id' => $request-> product_id,
            'user_id' => $request->user()->id,
        ]);
        
        return back();
    }
}
