@extends('layouts.app')

@section('content')
<div class="my-2 mx-4 w-full">
    <h2 class="my-2 pb-2 w-full font-normal text-3xl border-b border-grey-light">Product List</h2>

    <div class="pt-8">
        @foreach ($products as $product)
            <div class="mx-auto w-3/4 h-32 {{ !$loop->last ? 'border-b border-teal' : '' }}">
                <div class="flex flex-col h-full">
                    <div class="flex flex-row flex-grow">
                        <img class="block h-24 mx-2 my-auto"
                            src="{{ $product['avatar'] }}"
                            alt="product-avatar"/>
                        <div class="flex flex-col mx-2 my-2 flex-grow">
                            <a class="my-1 font-bold text-teal-darker no-underline hover:underline hover:text-teal-dark"
                                href={{ route('products.auction', $product['id']) }}>
                                {{ $product['name'] }}
                            </a>
                            <div class="my-2">
                                <span class="italic">Current: </span>
                                <span class="text-xl font-bold">{{ number_format($product['price'], 2, '.', '') }}</span>
                            </div>
                            <div class="my-2">
                                <span class="italic">Latest bid by: </span>
                                <span class="font-semibold">{{ $product['latest_bid'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
