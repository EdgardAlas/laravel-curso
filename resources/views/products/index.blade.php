@extends("layouts.master")

@section('content')
    <h1>List of Products</h1>
    @empty($productos)
        <div class="alert alert-warning">
            This list of products is empty
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-light">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->title }}</td>
                            <td>{{ $producto->description }}</td>
                            <td>{{ $producto->price }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>{{ $producto->status }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endempty
@endsection
