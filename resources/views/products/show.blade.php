@extends('layouts.app')

@section('content')
<h3>{{ $product->name }}</h3>
<br>
    @include('products.navtabs',['product'=>$product])
    <table class="table table-bordered" style="table-layout:fixed;">
        <thead>
            <tr>
                <th scope="col" style="width:200px;" class="text-center">品名</th>
                <th scope="col" style="width:180px;" class="text-center">状態</th>
                <th scope="col" style="width:100px;" class="text-center">納期</th>
                <th scope="col" style="width:100px;" class="text-center">責任者</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->deadline }}</td>
                <td>{{ $product->leader_name }}</td>
            </tr>
        </tbody>
    </table>
    {!! Form::open(['route'=>['products.edit',$product->id]]) !!}
        {!! Form::submit('製品情報を編集する',['class'=>"btn btn-info mb-2"]) !!}
    {!! Form::close() !!}
    {!! Form::open(['route'=>['products.delete_confirmation',$product->id]]) !!}
        {!! Form::submit('製品情報を削除する',['class'=>"btn btn-danger"]) !!}
    {!! Form::close() !!}
    <br><br><br>
    @include('participate.participate_button',['product'=>$product])
    @include('products.comments',['product_comments' => $product_comments])
    <div class="col-sm-8">
        {!! Form::open(['route' => 'product_comment.store']) !!}
            {!! Form::hidden('product_id',$product->id) !!}
                <div class="form-group">
                    {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                    {!! Form::submit('コメントを投稿', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
        {!! Form::close() !!}
    </div>
    
@endsection