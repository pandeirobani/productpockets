@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            @if(!Auth::check())
                {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group">
                        {!! Form::label('account_name', 'アカウントID') !!}
                        {!! Form::text('account_name', old('account_name'), ['class' => 'form-control']) !!}
                    </div>
    
                    <div class="form-group">
                        {!! Form::label('password', 'パスワード') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <br><br><br>
                    {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            @else

            @endif
            
        </div>
    </div>
@endsection
    