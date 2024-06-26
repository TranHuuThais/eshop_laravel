<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="">FAQs</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Help</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Support</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-2" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-dark pl-2" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="{{route('home.index')}}" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
            </a>
        </div>

        <div class="col-lg-6 col-6 text-left">
            <form action="{{ route('home.search') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <!-- <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
            </a> -->
            <a href="{{route('cart.index')}}" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
            </a>
        </div>
    </div>
</div>


<!-- Navbar Start -->
<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-secondary     text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                @foreach ($categoryList as $category)
                <div class="navbar-nav w-100 overflow-hidden" style="height: 45px">
                    <a href="{{ route('home.category', $category->id) }}" class="nav-item nav-link">{{$category->name}}</a>
                </div>
                @endforeach
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shop</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('home.index')}}" class="nav-item nav-link">Home</a>
                        <a href="{{route('products.index')}}" class="nav-item nav-link">Shop</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{route('cart.index')}}" class="dropdown-item">Shopping Cart</a>
                                <a href="{{route('home.checkout')}}" class="dropdown-item">Checkout</a>
                            </div>
                        </div>
                        <a href="{{route('home.contact')}}" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="col-lg-6 text-center text-lg-right">
                        <div class="d-inline-flex align-items-center">
                            @if(isset($user))
                            <div class="btn-group mx-2">
                                <p class="pt-1">Welcome, {{ $user->name }}! | Your email: {{ $user->email }}</p>
                            </div>
                            <div class="btn-group mx-2">
                                <button type="button" class="btn btn-sm btn-light">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();" style="text-decoration: none;">
                                            <div class="" style="color:black; ">Log Out</div>
                                        </x-responsive-nav-link>
                                    </form>
                                </button>
                            </div>
                            @else
                            <div class="btn-group mx-3">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"> <a href="{{ route('login') }}" style="color:black; text-decoration: none;"> Sign in </a></button>
                                    <button class="dropdown-item" type="button"><a href="{{ route('register') }}" style="color:black; text-decoration: none;"> Sign up </a></button>
                                </div>
                            </div>
                            @endif
                            <div class="btn-group mr-2">
                                <a href=" {{ route('dashboard') }}">
                                    <button type="button" class="btn btn-sm btn-light ">Profile</button>
                                </a>
                            </div>

                        </div>
                        <div class="d-inline-flex align-items-center d-block d-lg-none">
                            <a href="" class="btn px-0 ml-2">
                                <i class="fas fa-heart text-dark"></i>
                                <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="" class="btn px-0 ml-2">
                                <i class="fas fa-shopping-cart text-dark"></i>
                                <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
        </nav>
    </div>
</div>
</div>
<!-- Navbar End -->



<!-- Featured End -->