<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Bid;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $collection = collect();

        foreach ($products as $product) {
            $bid = $product->bids()->orderBy('created_at', 'desc')->take(1)->get()->flatten();
            if ($bid) {
                $bid = Bid::find($bid->first()['id']);
            }
            $collection->push([
                'id' => $product->id,
                'name' => $product->name,
                'avatar' => $product->avatar,
                'price' => $product->price,
                'latest_bid' => $bid ? $bid->user->name : '-'
            ]);
        }
        return view('products.index')
            ->with('products', $collection);
    }


    public function auction(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $bids = $product->bids()->orderBy('created_at', 'desc')->get();


        return view('products.auction')
            ->with('product', $product)
            ->with('bids', $bids);
    }

    public function bid(Request $request)
    {
        $request->validate([
            'bid' => 'required|numeric',
        ]);

        $product = Product::findOrFail($request->productId);

        if ($request->bid > $product->price) {
            $user = $request->user();
            $user->bids()->create([
                'product_id' => $product->id,
                'price' => $request->bid,
            ]);
            $product->price = $request->bid;
            $product->save();
            return redirect(route('products.auction', $product->id));
        }
        return back()->withError('Please place a bid higher than the current price!')->withInput();
    }
}
