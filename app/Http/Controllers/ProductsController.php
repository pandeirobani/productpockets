<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\User;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->paginate(20);

        return view('welcome',
            ['products' => $products,
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:191',
            'status' => 'nullable',
            'deadline' => 'nullable|date',
            'leader_name' => 'required',
            ]);

        Product::create([
            'name' => $request->name,
            'status' => $request->status,
            'deadline' => $request->deadline,
            'leader_name' => $request->leader_name,
        ]);

        return redirect('/');
    }
    
    public function show($id)
    {
        $product = Product::find($id);
        
        return view('products.show',['product'=>$product,
        ]);
    }
    
    public function participatings($id)
    {
        $data = [];
        $user = User::find($id);
        $participatings = $user->feed_participatings()->orderBy('created_at','desc')->paginate(20);
        
        $data = [
            'user' => $user,
            'products' => $participatings,
        ];
        
        return view('users.show',$data);
    }
}
