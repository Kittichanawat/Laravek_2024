@extends('layout')

@section('content')
<div class ="container ms-3">
    <h3>Profile</h3>
    <div>id: {{$user->id}}</div>
    <div>Name: {{$user->name}}</div>
    <div>Email: {{$user->email}}</div>
</div>
@endsection