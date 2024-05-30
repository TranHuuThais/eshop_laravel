@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic form</h4>
                <p class="card-description"> Basic form elements </p>
                <form class="forms-sample" action="{{route('Admin.products.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputImage">Image</label>
                        <input name="image" type="file" class="form-control" id="exampleInputImage" placeholder="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input name="name" type="text" class="form-control" id="exampleInputName" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription">Description</label>
                        <input name="description" type="text" class="form-control" id="exampleInputDescription" placeholder="description">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPrice">Price</label>
                        <input name="price" type="text" class="form-control" id="exampleInputPrice" placeholder="price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQuantity">Quantity</label>
                        <input name="quantity" type="text" class="form-control" id="exampleInputQuantity" placeholder="quantity">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">Category</label>
                        <select name="category_id" class="form-control" id="exampleInputCategory">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
