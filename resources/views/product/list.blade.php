@extends('layout')  

@section('content')
    <h1>Product List</h1>

    <a href="/product/form" class="btn btn-primary">
    <i class="fa-solid fa-user-plus"></i>
    Add Product 
    </a>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Detail</th>
                <th width ="110px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->detail }}</td>
                    <td class="text-center">
                       
                     
                            <a href="/product/{{$product->id}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="/product/remove/{{$product->id}}"  class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
            
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection