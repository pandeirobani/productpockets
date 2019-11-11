@extends('layouts.app')

@section('content')
    <h4>この製品情報を削除しますか？</h4><br>
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
    {!! Form::open(['route'=>['products.destroy',$product->id],'method'=>'delete']) !!}
        {!! Form::submit('削除する',['class'=>"btn btn-danger mb-2"]) !!}
    {!! Form::close() !!}
    {!! Form::open(['route'=>['products.show',$product->id],'method'=>'get']) !!}
        {!! Form::submit('キャンセル',['class'=>"btn btn-info"]) !!}
    {!! Form::close() !!}
@endsection