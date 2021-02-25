@extends('layouts.app')
@section('content')
    <h1>Products show</h1>
    @can('update', $product)
        <div>
            <a href="{{ route('products.edit', $product) }}"> Редактировать </a>
        </div>
    @endcan
    <div>
        Компания: <b>{{$product->product_creator}}</b>
    </div>
    <div>
        Название: <b>{{$product->product_name}}</b>
    </div>
    <div>
        Описание: <b>{{$product->product_description}}</b>
    </div>
    @can('delete', $product)
        <div>
            <form action="{{ route('products.destroy', $product)}}" method="post">
                @csrf @method('delete')
                <button>Delete</button>
            </form>
        </div>
    @endcan

@endsection
