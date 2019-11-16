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
    
    public function destroy($id)
    {
        $delete_comment = Product_comment::find($id);
        $product = Product::find($delete_comment->product_id);
        $leader = User::find($product->leader_name);
        $delete_comment->delete();
        
        $product_comments = $product->product_comments()->orderBy('created_at','desc')->paginate(10);
        
        
        
        $data = [
            'product'=>$product,
            'leader'=>$leader,
            'product_comments'=>$product_comments,
        ];
        
        return back();
    }
}
