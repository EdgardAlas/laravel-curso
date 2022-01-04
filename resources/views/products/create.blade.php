@extends("layouts.app") @section('content')
    <h1>Create a product</h1>
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <label for="titulo">Title</label>
                <input type="text" class="form-control" value="{{ old('title') }}" name="title" required id="title" />
            </div>
            <div class="col">
                <label for="description">Description</label>
                <input type="text" class="form-control" value="{{ old('description') }}" name="description" required
                    id="description" />
            </div>
            <div class="col">
                <label for="price">Price</label>
                <input type="number" class="form-control" value="{{ old('price') }}" name="price" required id="price"
                    min="1.00" step="0.01" />
            </div>
            <div class="col">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" value="{{ old('stock') }}" name="stock" required id="stock"
                    min="0" step="1" />
            </div>
            <div class="col">
                <label for="status">Status</label>
                <select class="custom-select form-select" name="status" required id="status">
                    <option value="">Select...</option>
                    <option value="available" {{ old('status') === 'available' ? 'selected' : '' }}>Available...</option>
                    <option value="unavailable" {{ old('status') === 'unavailable' ? 'selected' : '' }}>Unavailable...
                    </option>
                </select>
            </div>

            <div class="col">
                <button type="submit" class="btn btn-primary btn-lg">
                    Create product
                </button>
            </div>
        </div>
    </form>
@endsection
