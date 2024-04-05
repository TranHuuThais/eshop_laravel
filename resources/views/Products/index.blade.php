@extends('layout')

@section('title','list Product')

@section('content')

<div class="small-container">


    <div class="row row-2">
        <h2>All Products</h2>
        <select>
            <option>Defaut shorting</option>
            <option>Short by price</option>
            <option>Short by popularity</option>
            <option>Short by rating</option>
            <option>Short by sale</option>
        </select>
    </div>
    <!-- đổ dữ liệu -->
    <div class="row">
        @foreach($productList as $Products)
        <div class="col-4">
            <a href="{{route('products.show', $Products ->id)}}">

                <img src="{{ url($Products->img)}}" alt=""></a>
            <div class="rating">
                <h4>{{$Products->name}}</h4>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
                <p>{{$Products->price}}</p>
            </div>
            <div class="d-flex border-top">
                <small class="w-50 text-center border-end py-2">
                    <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View
                        detail</a>
                </small>
                <small class="w-50 text-center py-2">
                    <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add
                        to cart</a>
                </small>
            </div>

        </div>
        @endforeach
        <!-- <div class="col-4">
            <img src="images/product-2.jpg" alt="">
            <h4>Red Printed T-shirt</h4>
            <div class="rating">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>$50.00</p>
        </div>
        <div class="col-4">
            <img src="/images/product-3.jpg" alt="">
            <h4>Red Printed T-shirt</h4>
            <div class="rating">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>$50.00</p>
        </div>
        <div class="col-4">
            <img src="/images/product-4.jpg" alt="">
            <h4>Red Printed T-shirt</h4>
            <div class="rating">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>$50.00</p>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <img src="images/product-9.jpg" alt="">
            <h4>Red Printed T-shirt</h4>
            <div class="rating">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>$50.00</p>
        </div>
        <div class="col-4">
            <img src="/images/product-10.jpg" alt="">
            <h4>Red Printed T-shirt</h4>
            <div class="rating">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>$50.00</p>
        </div>
        <div class="col-4">
            <img src="/images/product-11.jpg" alt="">
            <h4>Red Printed T-shirt</h4>
            <div class="rating">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>$50.00</p>
        </div>
        <div class="col-4">
            <img src="/images/product-12.jpg" alt="">
            <h4>Red Printed T-shirt</h4>
            <div class="rating">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>$50.00</p>
        </div>
    </div> -->

    </div>


</div>
@endsection