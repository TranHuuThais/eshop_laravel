/**
 * Home Page
 */
// ready
$(document).ready(function () {
    getAllProducts();
   
})

// get all products
function getAllProducts() {
    $.ajax({
        url: 'http://localhost/api/products/index.php',
        type: 'GET',
        success: function (data) {
            var productList = JSON.parse(data)
            renderProductListUI(productList)
        },
        error: function (e) {
            console.log(e.message);
        }
    });
}
// showAllProducts
function renderProductListUI(productList) {
    productList.forEach(products => {
        $('#product-list').append(
            `
            <div class="col-4">
            <a href="products-details.html?productId=${products.id}"><img src="${products.image}" alt=""></a>
            <h4>${products.name}</h4>
            <div class="rating">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>${products.price}</p>
        </div>

            `
        )
    });
}


// get hot Products
// function getHotProducts() {
//     $.ajax({
//         url: 'http://localhost/api/products/hot.php',
//         type: 'GET',
//         success: function (data) {
//             var productList = JSON.parse(data)
//             renderHotProducts(productList)
//         },
//         error: function (e) {
//             console.log(e.message);
//         }
//     });
// } addEventListener
// show hot products
// function renderHotProducts(productList) {
//     productList.forEach(product => {
//         $('#product-hot').append(
//             `
//                 <div class="col-md-3 py-3">
                
//                 <a class="card" style="text-decoration: none" href="detail.html?productId=${product.id}">
//                  <img src= "${product.image}" alt="">
//                     <div class="card-body">
//                         <h3 class="text-center">${product.name}</h3>
//                         <p class="text-center">Sản phẩm bán chạy nhất.</p>
//                         <div class="star text-center">
//                         <i class="fa-solid fa-star checked"></i>
//                         <i class="fa-solid fa-star checked"></i>
//                         <i class="fa-solid fa-star checked"></i>
//                         <i class="fa-solid fa-star checked"></i>
//                         <i class="fa-solid fa-star checked"></i>
//                         </div>
//                         <h2>$${product.price} <span>
//                             <li class="fa-solid fa-cart-shopping"></li>
//                         </span></h2>
//                     </div>
//                 </a>
//             </div> 
//             `
//         )
//     });
// }
