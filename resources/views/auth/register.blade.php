@extends('layouts.app')

@section('content')
    @if(!Auth::check())
        <div class="text-center mb-4">
            <h1>新規メンバー登録</h1>
        </div>
        <br>
        
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                
                {!! Form::open(['route'=> 'signup.post']) !!}
                    <div class="form-group mb-5">
                        {!! Form::label('name','氏名') !!}
                        {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group mb-5">
                        {!! Form::label('account_name','アカウントID(半角英数字)') !!}
                        {!! Form::text('account_name',old('account_name'),['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group mb-5">
                        {!! Form::label('password','パスワード(6文字以上)') !!}
                        {!! Form::password('password',['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group mb-5">
                        {!! Form::label('password_confirmation','パスワード(確認)') !!}
                        {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                    </div>
                    <br>
                    
                    {!! Form::submit('登録',['class'=>'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}    
            </div>
        </div>
    @endif
@endsection('content')