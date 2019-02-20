@extends('layouts.app')

@section('content')
    <div class="flex bg-white justify-center">
        @foreach ($products as $product)
        <div class="flex">
            <div class="text-center">
                <a href={{ route('products.auction', $product['id']) }}>
                    {{ $product['name'] }}
                </a>
            </div>
            <div class="font-semibold text-center">Current: {{ $product['price'] }}</div>
            <div class="text-center">Latest bid by: {{ $product['latest_bid'] }}</div>
                        {{-- <div>{{ App\User::findOrFail($bid->user_id)->name }}</div>
                        <div>{{ $bid->price }}</div>
                        <div>{{ Carbon\Carbon::instance($bid->created_at)->format('jS F Y H:i T') }}</div> --}}
            <img class="w-6 h-6"
                src="{{ asset('storage/' . $product['avatar']) }}"
                alt="product-avatar"/>
        </div>
        @endforeach
    </div>
@endsection
