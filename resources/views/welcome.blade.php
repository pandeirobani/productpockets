@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="row">
            {!! Form::open(['route'=> 'products.search']) !!}
                <div class="form-group mb-5" style="display:inline-flex">
                    {{ Form::text('keyword','',['placeholder'=>'品名検索','class'=>'form-control mr-2']) }}
                    {!! Form::submit('検索') !!}
                </div>
        </div>
    </div>
    <h3>全製品一覧</h3>
    @include('products.products')
    @if(Auth::check())
        {!! link_to_route('products.create','新規製品登録',[],['class'=>'btn btn-info']) !!}
    @endif
@endsection
    