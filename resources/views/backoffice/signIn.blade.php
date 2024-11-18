@extends('layout')

@section('content')
    <div class="container">
        <h3>Sign In</h3>
        @if(isset($errors))
            @if($(errors->has('search')))
                <div class="alert alert-danger">***{{ $errors->first('search') }}"></div>
            @endif
        @endif

        <form action="/users/signInProcess" method="post"></form>
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                @if(isset($errors))
                    @if($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                @endif
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                @if(isset($errors))
                    @if($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                @endif
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check me2"></i> Submit</button>
        </form>
    </div>



@endsection