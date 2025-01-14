@extends('layout')

@section('content')
    <h1>Users Form</h1>
    @if (isset($errors))
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
    @endif
    <form @if (isset($id))
        action="/users/{{$id}}"
    @else action="/users"
    @endif 
    method="POST"
    >
    @csrf

    @if (isset($id))
        @method('PUT')
    @endif 

    <div> Name </div>
    <input type="text" class="form-control" name="name" value="{{$name }}" placeholder="Enter your name">
    @if (isset($errors))
        @if($errors->has('name'))
            <div class="text-danger">
                {{ $errors->first('name') }}
            </div>
        @endif
    @endif

    <div class="mt-3" >Email</div>
    <input type="text" class="form-control" name="email" value="{{$email}}" placeholder="Enter your email">
    @if (isset($errors))
        @if($errors->has('email'))
            <div class="text-danger">
                {{ $errors->first('email') }}
            </div>
        @endif
    @endif

    <div class="mt-3">Password</div>
    <input type="password" class="form-control" name="password" value="{{$password }}" placeholder="Enter your password">
    @if (isset($errors))
        @if($errors->has('password'))
            <div class="text-danger">
                {{ $errors->first('password') }}
            </div>
        @endif
    @endif

    <div class="mt-3">
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check me2"></i> Submit</button>
    </div>
    </form>
@endsection