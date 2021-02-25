@extends('layouts.app')
@section('content')
<h1>Products Index</h1>
@if($products->isEmpty())
    <h1>Продуктов не осталось!</h1>
@else
<ol>
    @foreach($products as $product)
        <li value="{{$product->id}}">
            <a href="{{route('products.show', $product)}}"> {{$product->product_name }}</a>
        </li>
    @endforeach
</ol>
    <p> {{$products->withQueryString()->links() }}</p>
@endif
@auth
    <a href="{{route('products.create')}}">Добавить продукт</a>
@endauth
@endsection
