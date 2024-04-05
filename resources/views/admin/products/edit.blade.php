@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic form</h4>
                <p class="card-description"> Basic form elements </p>
                <form class="forms-sample" action="{{route('Admin.products.update',$product->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT')}}
                    <div class="form-group"> 
                        <label for="exampleInputName1">Img</label>
                        <input type="text" value="{{$product->img}}" class="form-control" id="exampleInputName1" name="img" placeholder="name">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" value="{{$product->name}}" class="form-control" id="exampleInputName1" name="name" placeholder="name">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Description</label>
                        <input type="description" value="{{$product->description}}" class="form-control" id="exampleInputEmail3" name="description" placeholder="email">


                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Price</label>
                        <input name="price" value="{{$product->price}}" type="price" class="form-control" id="exampleInputPassword4" placeholder="price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Quantity</label>
                            <input name="quantity" value="{{$product->quantity}}" type="quantity" class="form-control" id="exampleInputPassword4" placeholder="quantity">
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleSelectGender">Role</label>
                        <select class="form-control" id="role" name="role">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>

                    </div> -->

                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection