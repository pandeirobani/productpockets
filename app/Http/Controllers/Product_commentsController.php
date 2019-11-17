<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_comment;
use App\User;

class Product_commentsController extends Controller
{
    public function store(Request $request)
    {
        if(\Auth::check()) {
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
    
    public function destroy($id)
    {
        if(\Auth::check()) {
            $delete_comment = Product_comment::find($id);
            $product = Product::find($delete_comment->product_id);
            
            if(\Auth::id() == $delete_comment->user_id) {
                $delete_comment->delete();
            }
            
            return back();
        }
    }
}
