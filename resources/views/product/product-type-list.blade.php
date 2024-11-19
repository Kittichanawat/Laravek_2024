@extends('layout')

@section('content')
    <h1>Product List By Product Type</h1>
    <ul>
        @foreach ($productTypes as $productType)
            <li>
                <a href="/list-by-product-type/{{$productType->id}}">
                    {{$productType->name}}
                </a>
                มีสินค้า {{$productType->products->count()}} ชิ้น
            </li>
        @endforeach
    </ul>



@endsection