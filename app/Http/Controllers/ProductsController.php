<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Product;
use App\User;
use App\Product_comment;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->paginate(10);
        $users = User::all();

        return view('welcome',
            ['products' => $products,
            'users' => $users,
        ]);
    }

    public function create()
    {
        if(\Auth::check()) {
            $users = User::pluck('name','id');
            return view('products.create',['users'=>$users]);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::check()) {
            $this->validate($request,[
                'name' => 'required|max:191',
                'status' => 'required',
                'deadline' => 'required|date',
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
    }
    
    public function show($id)
    {
        $product = Product::find($id);
        $product_comments = $product->product_comments()->orderBy('created_at','desc')->paginate(10);
        $leader = User::find($product->leader_name);
        
        $data = [
            'product' => $product,
            'product_comments' => $product_comments,
            'leader' => $leader,
        ];
        
        return view('products.show',$data);
    }
    
    public function edit($id)
    {
        if(\Auth::check()) {
            $product = Product::find($id);
            $users = User::pluck('name','id');
            
            $data = [
                'product' => $product, 
                'users' => $users,
            ];
            
            return view('products.edit',$data);
        }
    }
    
    public function update(Request $request,$id)
    {
        if(\Auth::check()) {
            $this->validate($request,[
                'name' => 'required|max:191',
                'status' => 'required',
                'deadline' => 'required|date',
                'leader_name' => 'required',
                ]);
                
            $status_array = ['企画','設計','組立て','完成','納品済'];
                
            $product = Product::find($id);
            $product->name = $request->name;
            $product->status = $status_array[$request->status];    
            $product->deadline = $request->deadline;
            $product->leader_name = $request->leader_name;
            $product->save();
            
            $leader = User::find($product->leader_name);
            
            $product_comments = $product->product_comments()->orderBy('created_at','desc')->paginate(10);
            
            $data = [
                'product' => $product,
                'leader' => $leader,
                'product_comments' => $product_comments,
            ];
            
            return view('products.show',$data);
        }
    }
    
    public function delete_confirmation($id)
    {
        if(\Auth::check()) {
            $product = Product::find($id);
            $leader = User::find($product->leader_name);
            
            $data = [
                'product' => $product,
                'leader' => $leader,
            ];
            
            return view('products.delete',$data);
        }
    }
    
    public function destroy($id)
    {
        if(\Auth::check()) {    
            $product = Product::find($id);
            $product->delete();
            
            return redirect('/');
        }
    }
    
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        
        if(!empty($keyword))
        {
            $products = DB::table('products')->where('name','like',"%{$keyword}%")->paginate(10);
                
        }else{
            
            $products = DB::table('products')->paginate(10);
            
        }
        
        $users = User::all();
        
        $data = [
                'products' => $products,
                'keyword' => $keyword,
                'users' => $users,
                ];
        
        return view('products.search',$data);
    }
    
}
