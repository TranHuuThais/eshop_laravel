function getParam(param) {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString)
    return urlParams.get(param)
}
$(document).ready(function () {
    var productId = getParam('productId')
    $.ajax({
        url: 'http://localhost/api/products/show.php?productId=' + productId,
        type: 'GET',
        success: function (data) {
            var product = JSON.parse(data)
            renderProductUI(product)
            addEvents()---
        },
        error: function (e) {
            console.log(e.message);
        }
    });
})

// show All Detail Products
function renderProductUI(product) {
    $('#product-detail').append(
            `
            <div class="col-2">
            <img "${products.image}" alt=""></a>>
            <div class="small-img-row">
                <div class="small-img-col">
                <img "${products.image}" alt=""></a>>
                </div>
                <div class="small-img-col">
                <img "${products.image}" alt=""></a>>
                <div class="small-img-col">
                <img "${products.image}" alt=""></a>>
                </div>
                <div class="small-img-col">
                <img "${products.image}" alt=""></a>>
                </div>
            </div>
        </div>
        <div class="col-2">
            <p>Home / T-Shirt</p>
            <h1>${products.name}</h1>
            <h4>${products.price}</h4>
            <select name="" id="">
                <option value="">Select Size</option>
                <option value="">XXL</option>
                <option value="">XL</option>
                <option value="">Large</option>
                <option value="">Medium</option>
                <option value="">Small</option>
            </select>
            <input type="number" value="1">
            <a href="cart.html" class="btn">Add TO Card</a>
            </br>
            </br>
            </br>

            <h3>Products Drtails  <i class="fa fa-ident"></i></h3>
        </br>
            <p>Give your summer wardrobe a style upgrade with the HRX
                Men's Active T-Shirts. Team it with a pải of short for
                yours morning workout or a denims for an evening out with 
                the guys.
            </p>
        </div> 
            `
    )
}
 
