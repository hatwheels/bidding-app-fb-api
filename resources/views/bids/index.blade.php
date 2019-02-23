@extends('layouts.app')

@section('sidebar')
@include('_partials.sidebar')
@endsection

@section('content')
<div class="my-2 mx-4 w-full">
    <h2 class="my-2 pb-2 w-full font-normal text-3xl border-b border-grey-light">My Bids</h2>
    <div class="pt-8">
        <div class="mx-auto w-2/3 flex flex-col pt-4">
            <table class="text-center" cellpading="8">
                <tr class="border-b">
                    <td class="text-grey-dark">Date</td>
                    <td class="text-grey-dark">Price</td>
                    <td class="text-grey-dark">Product</td>
                </tr>
                @forelse ($bids as $bid)
                    <tr>
                        <td>{{ Carbon\Carbon::instance($bid['created_at'])->format('jS F Y H:i T') }}</td>
                        <td>{{ number_format($bid['price'], 2, '.', '') }}</td>
                        <td>
                            <a class="font-semibold no-underline text-teal-darker hover:underline hover:text-teal-dark"
                                href="{{ route('products.auction', App\Product::findOrFail($bid['product_id'])->id) }}">
                                {{ App\Product::findOrFail($bid['product_id'])->name }}
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection
