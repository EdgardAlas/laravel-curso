@extends("layouts.app") @section('content')
<h1>List of Products</h1>
<a class="btn btn-success mb-3" href="{{ route('products.create') }}"
    >Create a product</a
>
@empty($productos)
<div class="alert alert-warning">This list of products is empty</div>
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
                <th>Actions</th>
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
                <td>
                    <a
                        class="btn btn-link"
                        href="{{ route('products.show', ['product' => $producto->id]) }}"
                        >Show</a
                    >
                    <a
                        class="btn btn-link"
                        href="{{ route('products.edit', ['product' => $producto->id]) }}"
                        >Edit</a
                    >

                    <form
                        method="POST"
                        class="d-inline"
                        action="{{ route('products.delete', ['product' => $producto->id]) }}"
                    >
                        @csrf @method("DELETE")
                        <button type="submit" class="btn btn-link">
                            delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endempty @endsection
