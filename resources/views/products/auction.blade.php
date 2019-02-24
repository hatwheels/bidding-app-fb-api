@extends('layouts.app')

@section('content')
<div class="my-2 mx-4 w-full">
    <h2 class="my-2 pb-2 w-full font-normal text-3xl border-b border-grey-light">{{ $product->name }}</h2>

    <div class="pt-8">
        <div class="mx-auto w-3/4 flex flex-row pb-4 border-b border-teal">
            <img class="block h-64 w-64 mx-2 my-auto"
                src="{{ asset('storage/' . $product->avatar) }}"
                alt="product-avatar"/>
            <div class="flex flex-col justify-between m-4">
                <div class="italic">Current price:
                    <span class="text-xl font-bold">{{ number_format($product->price, 2, '.', '') }}</span>
                </div>

                <form method="POST" action="{{ route('products.bid', $product) }}">
                    @csrf

                        <label for="bid" class="italic" >Your bid:
                            <input id="bid" class="ml-2 border border-teal-dark rounded px-2 py-2" type="text" name="bid" placeholder="Bid a new price...">
                            @if ($errors->has('bid'))
                                <p class="my-1 text-red text-xs italic text-center">{{ $errors->first('bid') }}</p>
                            @endif
                            @if (session('error'))
                                <p class="my-1 text-red text-xs italic text-center">{{ session('error') }}</p>
                            @endif
                        </label>

                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <div class="mt-4 text-center">
                            <button class="text-grey-light bg-teal-dark px-4 py-2 self-center border border-grey rounded hover:bg-teal"
                                type="submit">Place Bid
                            </button>
                        </div>
                </form>
            </div>
        </div>
        <div class="mx-auto w-1/2 flex flex-col pt-4">
            <h3 class="font-semibold text-center pb-4">History</h3>
            <table class="text-center" cellpading="8">
                <tr class="border-b">
                    <td class="text-grey-dark">Date</td>
                    <td class="text-grey-dark">Price</td>
                    <td class="text-grey-dark">Bidder</td>
                </tr>
                @forelse ($bids as $bid)
                    <tr>
                        <td>{{ Carbon\Carbon::instance($bid->created_at)->format('jS F Y H:i T') }}</td>
                        <td class="font-semibold">{{ number_format($bid->price, 2, '.', '') }}</td>
                        <td>{{ App\User::findOrFail($bid->user_id)->name }}</td>
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
