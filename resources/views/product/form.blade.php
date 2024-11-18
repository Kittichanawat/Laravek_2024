@extends('layout')  

@section('content')
    <h1>Product Form</h1>
    <form 
    @if(isset($product))
        action="/product/{{$product->id}}"
    @else 
        action="/product"
    @endif 
        method="post">

    @csrf

    @if(isset($product))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="{{$product->name ?? ''}}" placeholder="Enter your name">
    </div>

    <div class="form-group mt-3">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price" value="{{$product->price ?? ''}}" placeholder="Enter your price">
    </div>
    
    <div class="form-group mt-3"></div>
        <label for="qty">Qty</label>
        <input type="text" class="form-control" name="qty" value="{{$product->qty ?? ''}}" placeholder="Enter your qty">
    </div>

    <div class="form-group mt-3">   
        <label for="detail">Detail</label>
        <input type="text" class="form-control" name="detail" value="{{$product->detail ?? ''}}" placeholder="Enter your detail">
    </div>

    <div class="form-group mt-3"></div>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check me-2">
            </i>Submit
        </button>
    </form>
    @endsection