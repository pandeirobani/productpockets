<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Product;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        
        return view('users.index',
            ['users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $users = User::all();
        
        $participatings = $user->feed_participatings()->orderBy('created_at','desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $users,
            'products' => $participatings,
        ];
        
        return view('users.show',$data);
    }

    public function participants($id)
    {
        $product = Product::find($id);
        $participants = $product->participants()->paginate(10);
        
        $data = [
            'product' => $product,
            'users' => $participants,];
            
        return view('products.participants',$data);
    }
}
