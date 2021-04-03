
// 價格由低到高
var p_low = document.getElementById("p_low");
var p_high = document.getElementById("p_high");
p_low.addEventListener("click", function() {
    alert("aaa");
    Products.sort(function(a, b) {
        return a.price - b.price;
    });
    product_sec.innerHTML = "";
    console.log(Products);
    for (i = 0; i < Products.length; i++) {
        product_sec.innerHTML += `<div class="col-lg-3 pt-2 my-2" data-id=${Products[i].id}>
        <a href=${Products[i].link}>
            <div>
                <img src=${Products[i].src} alt="">
                <div class="cart_btn"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 28px;"></i></div>
            </div>
            <h6>${Products[i].productName}</h6>
            <h5>NT$${Products[i].price}</h5>
        </a>
    </div>`
    }
});
// 價格由高到低
p_high.addEventListener("click", function() {
    Products.sort(function(a, b) {
        return a.price - b.price;
    });
    Products.reverse();
    product_sec.innerHTML = "";
    for (i = 0; i < Products.length; i++) {
        product_sec.innerHTML += `<div class="col-lg-3 pt-2 my-2" data-id=${Products[i].id}>
        <a href=${Products[i].link}>
            <div>
                <img src=${Products[i].src} alt="">
                <div class="cart_btn"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 28px;"></i></div>
            </div>
            <h6>${Products[i].productName}</h6>
            <h5>NT$${Products[i].price}</h5>
        </a>
    </div>`
    }
});

