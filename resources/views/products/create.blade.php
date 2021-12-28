@extends("layouts.master") @section('content')
    <h1>Create a product</h1>
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <label for="titulo">Title</label>
                <input type="text" class="form-control" name="title" id="title" required />
            </div>
            <div class="col">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" required />
            </div>
            <div class="col">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" min="1.00" step="0.01" required />
            </div>
            <div class="col">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock" id="stock" min="1" step="1" required />
            </div>
            <div class="col">
                <label for="status">Status</label>
                <select class="custom-select" name="status" id="status" required>
                    <option value="">Select...</option>
                    <option value="available">Available...</option>
                    <option value="unavailable">Unavailable...</option>
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
