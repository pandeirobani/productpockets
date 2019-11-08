@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>新規メンバー登録</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route'=> 'signup.post]) !!}
                <div class="form-group">
                    {!! Form::label('name','氏名') !!}
                    {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('account_name','アカウントID'> !!}
                    {!! Form::text('account_name','old('account_name'),['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password','パスワード') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password_confirmation','パスワード(確認)') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>
                
                {!! Form::submit('登録',['class'=>'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}    
        </div>
    </div>