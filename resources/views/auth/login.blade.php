@extends('layouts.app')

@section('content')
        @if(!Auth::check())
        <div class="text-center mb-5">
            <h2>ログイン</h2>
        </div>
        <div class="row mt-3">
            <div class="col-sm-6 offset-sm-3">
                {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group mb-5">
                        {!! Form::label('account_name', 'アカウントID') !!}
                        {!! Form::text('account_name', old('account_name'), ['class' => 'form-control']) !!}
                    </div>
    
                    <div class="form-group mb-4">
                        {!! Form::label('password', 'パスワード') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <br><br><br>
                    {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        @endif
@endsection
    