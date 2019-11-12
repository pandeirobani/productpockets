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
        
        $status_array = ['企画','設計','組立て','完成','納品済'];
        
        
        Product::create([
            'name' => $request->name,
            'status' => $status_array[$request->status],
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
    
    public function edit($id)
    {
        $product = Product::find($id);
        
        return view('products.edit',['product' => $product]);
    }
    
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required|max:191',
            'status' => 'nullable',
            'deadline' => 'nullable|date',
            'leader_name' => 'required',
            ]);
            
        $status_array = ['企画','設計','組立て','完成','納品済'];
            
        $product = Product::find($id);
        $product->name = $request->name;
        $product->status = $status_array[$request->status];    
        $product->deadline = $request->deadline;
        $product->leader_name = $request->leader_name;
        $product->save();
        
        return view('products.show',['product'=>$product,
        ]);
    }
    
    public function delete_confirmation($id)
    {
        $product = Product::find($id);
        
        return view('products.delete',['product' => $product]);
    }
    
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        
        return redirect('/');
    }
}
