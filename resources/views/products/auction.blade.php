@extends('layouts.app')

@section('content')
<div class="flex flex-row bg-white">
    <div class="flex">
        <div class="text-blue text-center">{{ $product->name }}</div>
        <div class="font-semibold text-center">Current price: {{ number_format($product->price, 2, '.', '') }}</div>
        <form class="text-center" method="POST" action="{{ route('products.bid', $product) }}">
            @csrf

            <label for="bid">Your bid</label>
            <input id="bid" type="text" name="bid" placeholder="Bid a new price...">
            @if ($errors->has('bid'))
                <p class="my-1 text-red text-xs italic text-center">{{ $errors->first('bid') }}</p>
            @endif
            @if (session('error'))
                <p class="my-1 text-red text-xs italic text-center">{{ session('error') }}</p>
            @endif
            <input type="hidden" name="productId" value="{{ $product->id }}">
            <button type="submit">Bid</button>
        </form>
        <img class="w-6 h-6"
            src="{{ asset('storage/' . $product->avatar) }}"
            alt="product-avatar"/>
    </div>
    <div class="text-center"><b>History</b></div>
    <div class="flex">
        @forelse ($bids as $bid)
            <div class="text-center">{{ number_format($bid->price, 2, '.', '') }}</div>
            <div class="text-center">
                By: <span>{{ App\User::findOrFail($bid->user_id)->name }}</span>
            </div>
            <div class="text-center">
                On: <span>{{ Carbon\Carbon::instance($bid->created_at)->format('jS F Y H:i T') }}</span>
            </div>
        @empty
            <div class="text-center"><i>No bids yet</i></div>
        @endforelse
    </div>
</div>
@endsection
