@extends('layouts.app')

@section('content')
    <h3>製品一覧</h3>
    @include('products.products')
    @if(Auth::check())
        {!! link_to_route('products.create','新規製品登録',[],['class'=>'btn btn-info']) !!}
    @endif
@endsection
    