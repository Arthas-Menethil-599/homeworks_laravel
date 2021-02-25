<?php
$product = $product ?? null;
?>
@extends('layouts.app')
@section('content')
    <h1>Books {{ $product ? 'edit' : 'create' }}</h1>
    <form enctype="multipart/form-data" method="post" action="{{ $product ? route('products.update', $product) : route('products.store') }}">
        @csrf

        @if($product)
            @method('put')
        @endif

        <div>
            <div>
                <label for="title">Название</label>
                <input value="{{ old('product_name', $product->product_name ?? null) }}" type="text" id="product_name" name="product_name"/>
                @error('product_name')
                <div>{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="title">Описание</label>
                <input value="{{ old('product_description', $product->product_description ?? null) }}" type="text" id="product_description" name="product_description"/>
                @error('product_description')
                <div>{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="author">Компания</label>
                <input value="{{ old('product_creator', $product->product_creator ?? null) }}" type="text" id="product_creator" name="product_creator"/>
                @error('product_creator')
                <div>{{$message}}</div>
                @enderror
            </div>

            <button>{{ $product ? 'Обновить' : 'Добавить' }}</button>
        </div>
    </form>
@endsection
