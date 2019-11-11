@extends('layouts.app')

@section('content')
    <h3>{{ $user->name }}が参加中のプロジェクト一覧</h3>
    <br>
    @include('products.products')
    
@endsection