@extends('layouts.app')

@section('sidebar')
@include('_partials.sidebar')
@endsection

@section('content')
    <div class="flex bg-white justify-center">
        @foreach ($products as $product)
        <div class="flex">
            <div class="text-center">
                <a href={{ route('products.auction', $product['id']) }}>
                    {{ $product['name'] }}
                </a>
            </div>
            <div class="font-semibold text-center">Current: {{ number_format($product['price'], 2, '.', '') }}</div>
            <div class="text-center">Latest bid by: {{ $product['latest_bid'] }}</div>
            <img class="w-6 h-6"
                src="{{ asset('storage/' . $product['avatar']) }}"
                alt="product-avatar"/>
        </div>
        @endforeach
    </div>
@endsection
