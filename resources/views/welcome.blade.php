@extends("layouts.app") @section('content')
    <h1>Welcome</h1>
    <p>Lest started</p>
    @empty($products)
        <div class="alert alert-warning">This list of products is empty</div>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-3">
                    @include("components.product-card")
                </div>
            @endforeach
        </div>
    @endempty
@endsection
