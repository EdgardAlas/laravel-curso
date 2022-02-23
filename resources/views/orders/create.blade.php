@extends("layouts.app") @section('content')
    <h1>Order details</h1>
    <h4 class="text-center"><strong>Grand total: </strong>{{ $cart->total }}</h4>
    <div class="text-center mb-3">
        <form action="{{ route('orders.store') }}" class="d-inline" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Confirm order</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="bg-light">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->products as $producto)
                    <tr>
                        <td>
                            <img src="{{ asset($producto->images->first()->path) }}" alt="" width="100" />
                            {{ $producto->title }}
                        </td>
                        <td>{{ $producto->price }}</td>
                        <td>{{ $producto->pivot->quantity }}</td>
                        <td>
                            <strong>
                                {{ $producto->total }}
                            </strong>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
