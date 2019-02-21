<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bids = $request->user()->bids()->orderBy('created_at', 'desc')->get();

        return view('bids.index')->with('bids', $bids);
    }
}
