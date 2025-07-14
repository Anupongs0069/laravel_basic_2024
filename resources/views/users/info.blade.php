@extends('layout')

@section('content')
    <h1>User Info</h1>
    <div>id: {{ $user->id }}</div>
    <div>name: {{ $user->name }}</div>
    <div>email: {{ $user->email }}</div>
@endsection