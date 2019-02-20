@extends('layouts.app')

@section('content')
    <div class="flex bg-white justify-around">
        @foreach ($products as $product)
        <div class="flex">
            <div class="text-center">
                <a href= {{ route('products.auction', $product) }}>
                    {{ $product->name }}
                </a>
            </div>
            <div class="text-center">{{ $product->price }}</div>
            <img class="block h-24 mx-2 my-auto"
                src="{{ asset('storage/' . $product->avatar) }}"
                alt="product-avatar"/>
        </div>
        @endforeach
    </div>
@endsection
