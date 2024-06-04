@extends('admin.layout')

@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="row">
    <div class="col-lg-6">
        <a href="{{ route('Admin.products.create') }}" class="btn btn-default">Create a New Product</a>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Products Table</h4>
                <p class="card-description">Add class <code>.table-hover</code></p>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Img</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productList as $product)
                        <tr>
                            <td><img src="{{ Storage::url($product->img) }}" alt="" class="img-fluid" style="max-width: 100px;"></td>
                            <td>{{ Str::limit($product->name, 50) }}</td> <!-- Limit name to 50 characters -->
                            <td>{{ Str::limit($product->description, 10) }}</td> <!-- Limit description to 100 characters -->
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ optional($product->category)->name }}</td>
                            <td>
                                <a class="badge badge-danger" href="{{ route('Admin.products.edit', $product->id) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('Admin.products.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $productList->links() }} <!-- Added pagination links -->
            </div>
        </div>
    </div>
</div>
@endsection
