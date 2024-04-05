<div class="container">
    <div class="navbar">
        <div class="logo">
            <a href="index.html"><img src="{{url('images/logo.png')}}" width="125px"></a>
        </div>
        <nav>
            <ul id="menuItems">
                <li><a href="index.html">Home</a></li>
                <li><a href="product.html">Product</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="cart.html"><img src="{{url('icons/cart.png')}}" alt="" width="40px" height="40px"></a></li>
                <li><a href="account.html"><img src="{{url('icons/admin.png')}}" alt="" width="30px"></a></li>
                <li>
                    <div class="input-group ">
                        <form action="{{route('products.search')}}" method="get">
                            <div class="input-group rounded ">
                                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <span class="input-group-text border-0" id="search-addon">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                        </form>
                    </div> <!-- Closing div for input-group -->
                </li>
            </ul>
        </nav>
    </div>
</div>