@extends('layouts.app')

@section('content')
        @if(!Auth::check())
            <div class="row">            
                <div class="col-sm-6 offset-sm-3">
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
                </div>
            </div>
        @else
            @if(count($products) > 0)
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
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->status }}</td>
                            <td>{{ $product->deadline }}</td>
                            <td>{{ $product->leader_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links('pagination::bootstrap-4') }}
            @endif
            {!! link_to_route('products.create','新規製品登録',[],['class'=>'btn btn-info']) !!}
        @endif
@endsection
    