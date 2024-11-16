@extends('layout')

@section('content')
    <div class="container">
        <h3>Sign In</h3>
        
        <!-- แสดง Error สำหรับฟิลด์ search -->
        @if(isset($errors) && $errors->has('search'))
            <div class="alert alert-danger">***{{ $errors->first('search') }}</div>
        @endif

        <form action="/user/signInProcess" method="post">
            @csrf
            <!-- ฟิลด์ Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    placeholder="Enter email"
                >
                <!-- แสดง Error สำหรับฟิลด์ email -->
                @if(isset($errors) && $errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <!-- ฟิลด์ Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="password" 
                    placeholder="Enter password"
                >
                <!-- แสดง Error สำหรับฟิลด์ password -->
                @if(isset($errors) && $errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <!-- ปุ่ม Submit -->
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-check me-2"></i> Submit
            </button>
        </form>
    </div>
@endsection
