@extends('layouts.app')

@section('content')
<h3>メンバー一覧</h3>
    @include('users.users',['users' => $users])
@endsection