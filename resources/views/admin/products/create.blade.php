@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic form</h4>
                <p class="card-description"> Basic form elements </p>
                <form class="forms-sample" action="{{route('Admin.products.store')}}" method="post">
                    {{ csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputName1">image</label>
                        <input name="image" type="text" class="form-control" id="exampleInputName1" placeholder="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Name</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail3" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">description</label>
                        <input name="description" type="text" class="form-control" id="exampleInputPassword4" placeholder="description">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">price</label>
                        <input name="price" type="text" class="form-control" id="exampleInputPassword4" placeholder="price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">quantity</label>
                        <input name="quantity" type="text" class="form-control" id="exampleInputPassword4" placeholder="quantity">
                    </div>
                  
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection