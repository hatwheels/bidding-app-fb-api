@extends('layouts.app')

@section('content')
<div class="my-2 mx-4 w-full">
    <h2 class="my-2 pb-2 w-full font-normal text-3xl border-b border-grey-light">Welcome to our Bidding App</h2>

    <div class="pt-8">

    <div class="mx-auto w-3/4 h-32 bg-grey-lighter flex flex-row items-center justify-center border border-teal">
        <i class="fab fa-facebook-square text-3xl mx-2 font-bold text-blue-dark"
            href="{{ route('redirect') }}">
        </i>
        <a class="mx-2 text-xl font-bold text-teal-dark no-underline hover:text-teal hover:underline"
            href="{{ route('redirect') }}"
        >
            Login with Facebook
        </a>
    </div>
</div>
@endsection
