<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

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
            $bid = $product->bids()->orderBy('created_at', 'desc')->first();
            $collection->push([
                'id' => $product->id,
                'name' => $product->name,
                'avatar' => $product->avatar,
                'price' => $product->price,
                'latest_bid' => $bid ? $bid->name : '-'
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

    }
}
