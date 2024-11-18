@extends('layout')

@section('content')
    <div class="container">
        <h3>Back Office</h3>
    </div>

    <a href="/user/signOut" class="btn btn-danger" onclick="return confirm('Are you sure?')">
        <i class="fa-solid fa-right-from-bracket me-2"></i> 
        Sign Out 
    </a>

    <a href="/user/info" class=" btn btn-primary"> 
        <i class="fa-solid fa-user me-2"></i> 
        Profile
    </a>
@endsection