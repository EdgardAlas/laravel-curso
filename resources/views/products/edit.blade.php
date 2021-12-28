@extends("layouts.master") @section('content')
    <h1>Edit a product</h1>
    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="post">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col">
                <label for="titulo">Title</label>
                <input type="text" class="form-control" name="title" id="title" required value="{{ $product->title }}" />
            </div>
            <div class="col">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" required
                    value="{{ $product->description }}" />
            </div>
            <div class="col">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" min="1.00" step="0.01" required
                    value="{{ $product->price }}" />
            </div>
            <div class="col">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock" id="stock" min="1" step="1" required
                    value="{{ $product->stock }}" />
            </div>
            <div class="col">
                <label for="status">Status</label>
                <select class="custom-select" name="status" id="status" required>
                    <option value="">Select...</option>
                    <option {{ $product->status === 'Available' ? 'selected' : '' }} value="available">Available...
                    </option>
                    <option {{ $product->status === 'No available' ? 'selected' : '' }} value="unavailable">Unavailable...
                    </option>
                </select>
            </div>

            <div class="col">
                <button type="submit" class="btn btn-primary btn-lg">
                    Update product
                </button>
            </div>
        </div>
    </form>
@endsection
