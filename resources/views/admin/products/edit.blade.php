@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Product</h4>
                <p class="card-description"> Update product details </p>
                <form class="forms-sample" action="{{ route('Admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputName1">Img</label>
                        <input type="file" class="form-control" id="exampleInputName1" name="image" placeholder="Choose Image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" value="{{ $product->name }}" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Description</label>
                        <input type="text" value="{{ $product->description }}" class="form-control" id="exampleInputEmail3" name="description" placeholder="Description">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Price</label>
                        <input type="text" value="{{ $product->price }}" class="form-control" id="exampleInputPassword4" name="price" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Quantity</label>
                        <input type="text" value="{{ $product->quantity }}" class="form-control" id="exampleInputPassword4" name="quantity" placeholder="Quantity">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">Category</label>
                        <select name="category_id" class="form-control" id="exampleInputCategory">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Update</button>
                    <a href="{{ route('Admin.products.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
