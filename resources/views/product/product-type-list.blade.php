@extends('layout')

@section('content')
    <h1>Product Type List</h1>
    <ul>
        @foreach ($productTypes as $productType) 
            <li>
                <a href="/list-by-product-type/{{ $productType->id }}">{{ $productType->name }}</a>
            </li>
            มีสินค้า {{ $productType->products->count() }} ชิ้น
        @endforeach
    </ul>
@endsection