@extends("layouts.app") @section('content')
    <h1>Edit a product</h1>
    <form action="{{ route('products.update', ['product' => old('id') ?? $product->id]) }}" method="post">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col">
                <label for="titulo">Title</label>
                <input type="text" class="form-control" name="title" id="title" required
                    value="{{ old('title') ?? $product->title }}" />
            </div>
            <div class="col">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" required
                    value="{{ old('description') ?? $product->description }}" />
            </div>
            <div class="col">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" min="1.00" step="0.01" required
                    value="{{ old('price') ?? $product->price }}" />
            </div>
            <div class="col">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock" id="stock" min="1" step="1" required
                    value="{{ old('stock') ?? $product->stock }}" />
            </div>
            <div class="col">
                <label for="status">Status</label>
                <select class="custom-select form-select" name="status" id="status" required>
                    <option value="">Select...</option>
                    <option {{ old('status') ?? $product->status === 'available' ? 'selected' : '' }} value="available">
                        Available...
                    </option>
                    <option {{ old('status') ?? $product->status === 'No available' ? 'selected' : '' }}
                        value="unavailable">Unavailable...
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
