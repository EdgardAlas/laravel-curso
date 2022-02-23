@extends("layouts.app")

@section('content')
    <h1>Your cart</h1>
    @if (!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning">This list of products is empty</div>
    @else
        <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">start order</a>
        <div class="row">
            @foreach ($cart->products as $product)
                <div class="col-3">
                    @include("components.product-card")
                </div>
            @endforeach
        </div>
    @endempty
@endsection
