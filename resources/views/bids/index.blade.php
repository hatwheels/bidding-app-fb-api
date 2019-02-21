@extends('layouts.app')

@section('sidebar')
@include('_partials.sidebar')
@endsection

@section('content')
    <div class="flex">
        @forelse ($bids as $bid)
            <div class="text-center">{{ App\Product::findOrFail($bid['product_id'])->name }}</div>
            <div class="text-center">{{ number_format($bid['price'], 2, '.', '') }}</div>
            <div class="text-center">{{ Carbon\Carbon::instance($bid['created_at'])->format('jS F Y H:i T') }}</div>
        @empty
            <div class="text-center italic">No Bids</div>
        @endforelse
    </div>
@endsection
