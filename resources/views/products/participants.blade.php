@extends('layouts.app')

@section('content')
<h3>{{ $product->name }}</h3><br>
    @include('products.navtabs',['product'=>$product])
    @include('users.users',['users' => $users])
@endsection