@extends('layouts.app')

@section('content')
    <div class="text-center mb-4">
        <h1>製品情報編集</h1>
    </div>
    <br>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::model($product,['route'=> ['products.update',$product->id],'method' => 'put']) !!}
                <div class="form-group mb-5">
                    {!! Form::label('name','品名') !!}
                    {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group mb-5">
                    {!! Form::label('status','状態') !!}
                    {!! Form::text('status',old('status'),['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group mb-5">
                    {!! Form::label('deadline','納期') !!}
                    {!! Form::date('deadline',old('deadline'),['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group mb-5">
                    {!! Form::label('leadear_name','責任者') !!}
                    {!! Form::text('leader_name',old('leader_name'),['class'=>'form-control']) !!}
                </div>
                <br>
                
                {!! Form::submit('登録',['class'=>'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}    
        </div>
    </div>
@endsection('content')