@extends('layout')

@section('title', 'List Product')

@section('content')
<div class="small-container single-product">
    <div class="row">
      
        <div class="col-2">
            <img src="{{url($product->img)}}" width="100%" id="Products_Img">
            <div class="small-img-row">
                <div class="small-img-col">
                    <img src="{{url($product->img)}}" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="{{url($product->img)}}" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="{{url($product->img)}}" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="{{url($product->img)}}" width="100%" class="small-img">
                </div>
            </div>
        </div>
        <div class="col-2">
            <p>Home / T-Shirt</p>
            <h1>{{$product->name}}</h1>
            <h4>{{$product->price}}</h4>
            <select name="" id="">
                <option value="">Select Size</option>
                <option value="XXL">XXL</option>
                <option value="XL">XL</option>
                <option value="Large">Large</option>
                <option value="Medium">Medium</option>
                <option value="Small">Small</option>
            </select>
            <input type="number" value="1">
            <a href="cart.html" class="btn">Add TO Cart</a><br /><br /><br />
            <h3>Products Details <i class="fa fa-ident"></i></h3><br />
            <p>{{$product->description}}</p>
        </div>
       
    </div>
</div>
@endsection