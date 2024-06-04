@extends('layout')

@section('title', 'List Product')

@section('content')

<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- Price Start -->
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                <form id="filterForm" method="GET" action="{{ route('products.index') }}">
                    @foreach($priceCounts as $range => $count)
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="price[]" value="{{ $range }}" id="price-{{ $loop->index }}" onchange="document.getElementById('filterForm').submit();">
                        <label class="custom-control-label" for="price-{{ $loop->index }}">{{ $range }}</label>
                        <span class="badge border font-weight-normal">{{ $count }}</span>
                    </div>
                    @endforeach
                </form>
            </div>
            <!-- Price End -->

            <!-- Category Start -->
            <div class="mb-5">
                <h5 class="font-weight-semi-bold mb-4">Filter by category</h5>
                <form id="filterForm" method="GET" action="{{ route('products.index') }}">
                    @foreach($categoryList as $category)
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" name="category[]" value="{{ $category->id }}" id="category-{{ $category->id }}" onchange="document.getElementById('filterForm').submit();">
                        <label class="custom-control-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
                        <!-- You can display the count of products in each category if needed -->
                        <span class="badge border font-weight-normal">{{ $category->products->count() }}</span>
                    </div>
                    @endforeach
                </form>
            </div>
            <!-- Category End -->
        </div>
        <!-- Shop Sidebar End -->

        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="{{ route('products.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search by name" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                        <div class="dropdown ml-4">
                            <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort by
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="?sort=latest">Latest</a>
                                <!-- <a class="dropdown-item" href="?sort=popularity">Popularity</a> -->
                                <!-- <a class="dropdown-item" href="?sort=best_rating">Best Rating</a> -->
                                <a class="dropdown-item" href="?sort=asc">A-Z</a>
                                <a class="dropdown-item" href="?sort=desc">Z-A</a>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($productList as $Products)
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ Storage::url($Products->img) }}" alt="" />
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $Products->name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ $Products->price }}$</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('products.show', $Products->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <form id="addToCartForm" method="POST" action="{{ route('cart.add') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $Products->id }}">
                                <input id="hiddenQuantity" type="hidden" name="quantity" value="1">
                                <button class="btn btn-sm text-dark p-0" type="submit"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
    <!-- Pagination links -->
    <div class="pagination-horizontal">
        <ul class="pagination-links">
            {{ $productList->links('pagination::bootstrap-4') }}
        </ul>
    </div>
</div>
<!-- Shop End -->

@endsection