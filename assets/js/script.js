// Show Navbar when small screen || Close Cart Items & Search Textbox
let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    cartItem.classList.remove('active');
    searchForm.classList.remove('active');
}

// Show Cart Items || Close Navbar & Search Textbox
let cartItem = document.querySelector('.cart');

document.querySelector('#cart-btn').onclick = () => {
    cartItem.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
}

// Show Search Textbox || Close Navbar & Cart Items
let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    cartItem.classList.remove('active');
}

// Remove Active Icons on Scroll and Close it
window.onscroll = () => {
    navbar.classList.remove('active');
    cartItem.classList.remove('active');
    searchForm.classList.remove('active');
}

// Script for making icon as button
document.getElementById('paper-plane-icon').addEventListener('click', function() {
    // Add your desired action here, e.g. submit form, trigger AJAX request, etc.
    alert('Paper airplane clicked!');
});


//Cart Working JS
if (document.readyState == 'loading') {
    document.addEventListener("DOMContentLoaded", ready);
} else {
    ready();
}

// FUNCTIONS FOR CART
function ready() {
    //Remove Items from Cart
    var removeCartButtons = document.getElementsByClassName('cart-remove');
    console.log(removeCartButtons);
    for (var i = 0; i < removeCartButtons.length; i++){
        var button = removeCartButtons[i];
        button.addEventListener('click', removeCartItem);
    }

    // When quantity changes
    var quantityInputs = document.getElementsByClassName("cart-quantity");
    for (var i = 0; i < quantityInputs.length; i++){
        var input = quantityInputs[i];
        input.addEventListener("change", quantityChanged);
    }

    // Add to Cart
    var addCart = document.getElementsByClassName('add-cart');
    for (var i = 0; i < addCart.length; i++){
        var button = addCart[i];
        button.addEventListener("click", addCartClicked);
    }

// Function to redirect to checkout page with cart details
function redirectToCheckout() {
    if (cart.length > 0) {
        // Convert cart array to JSON string
        var cartJSON = JSON.stringify(cart);
        // Redirect to checkout.php with cart data as query parameter
        window.location.href = 'checkout.php?cart=' + encodeURIComponent(cartJSON);
    } else {
        alert('Your cart is empty. Please add some items before checkout.');
    }
}
    // Buy Button Works
    document.getElementsByClassName("btn-buy")[0].addEventListener("click", buyButtonClicked);
}
// Initialize cart array to store items
var cart = [];

// Function to handle adding product to cart
function addCartClicked(element) {
    var productBox = element.closest('.box');
    var productName = productBox.querySelector('.product-title').innerText;
    var productPrice = productBox.querySelector('.price').innerText.trim(); // Remove any leading/trailing whitespace
    var productSize = productBox.querySelector('.size-select').value;

    var item = {
        name: productName,
        price: productPrice,
        size: productSize
    };

    cart.push(item); // Add item to the cart array

    // Optional: Display a confirmation or update the UI to indicate the product has been added to cart
    console.log('Added to cart:', item);

    // Update the cart display
    updateCartDisplay();
}
// Function for "Buy Button Works"
function buyButtonClicked() {
    var cartContent = document.getElementsByClassName("cart-content")[0];
    var cartBoxes = cartContent.getElementsByClassName("cart-box");
    var orderDetails = [];

    // Generate invoice number
    var invoiceNumber = generateInvoiceNumber();

    // Loop through all cart boxes to get details
    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        var title = cartBox.getElementsByClassName("cart-product-title")[0].innerText;
        var price = cartBox.getElementsByClassName("cart-price")[0].innerText;
        var quantity = cartBox.getElementsByClassName("cart-quantity")[0].value;
        var sugarOption = cartBox.getElementsByClassName("cart-sugar-option")[0].innerText.replace('Option: ', ''); // Get sugar option
        var priceValue = parseFloat(price.replace('₱', '').replace(',', ''));
        var subtotalAmount = priceValue * quantity;
        orderDetails.push({ title: title, price: priceValue, quantity: quantity, subtotal_amount: subtotalAmount, invoice_number: invoiceNumber, sugarOption: sugarOption }); // Include sugar option in orderDetails
    }

    // Send data to server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_to_database.php", true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send(JSON.stringify(orderDetails));
    cartItem.classList.remove('active');

    // Clear cart after sending data to server
    while (cartContent.hasChildNodes()) {
        cartContent.removeChild(cartContent.firstChild);
    }
    updateTotal();
}


// Function to generate invoice number
function generateInvoiceNumber() {
    // Implement your logic to generate an invoice number here
    return "INV-" + Math.floor(Math.random() * 1000000);
}

// Function for "Remove Items from Cart"
function removeCartItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    updateTotal();
}

// Function for "When quantity changes"
function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    updateTotal();
}

//Add to Cart

function updatePrice(selectElement) {
    var priceElement = selectElement.parentElement.getElementsByClassName('price')[0];
    if (selectElement.value === 'large') {
        priceElement.textContent = '₱60.00';
    } else {
        priceElement.textContent = '₱40.00';
    }
}

function addCartClicked(button) {
    var shopProducts = button.parentElement;
    var title = shopProducts.getElementsByClassName("product-title")[0].innerText;
    var price = shopProducts.getElementsByClassName("price")[0].innerText;
    var productImg = shopProducts.getElementsByClassName("product-img")[0].src;
    var size = shopProducts.getElementsByClassName("form-select")[0].value; // Get the selected size
    addProductToCart(title, price, productImg, size);
    updateTotal();
  
    // Store product details in session storage
    var chosenProduct = {
      id: title, // Assuming title uniquely identifies the product
      price: price,
      size: size
    };
    sessionStorage.setItem("chosenProduct", JSON.stringify(chosenProduct));
  }

function addProductToCart(title, price, productImg, size) {
    var cartShopBox = document.createElement("div");
    cartShopBox.classList.add("cart-box");
    var cartItems = document.getElementsByClassName("cart-content")[0];
    var cartItemsNames = cartItems.getElementsByClassName("cart-product-title");
    for (var i = 0; i < cartItemsNames.length; i++) {
        if (cartItemsNames[i].innerText == title && cartItemsNames[i].nextElementSibling.innerText === size) {
            alert("You have already added this item to cart!");
            return;
        }
    }
    var cartBoxContent = `
        <img src="${productImg}" alt="" class="cart-img">
        <div class="detail-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price}</div>
            <div class="cart-sugar-option">Size: ${size}</div>
            <input type="number" value="1" min="1" class="cart-quantity">
        </div>
        <!-- REMOVE BUTTON -->
        <i class="fas fa-trash cart-remove"></i>`;
    cartShopBox.innerHTML = cartBoxContent;
    cartItems.append(cartShopBox);
    cartShopBox
        .getElementsByClassName("cart-remove")[0]
        .addEventListener('click', removeCartItem);
    cartShopBox
        .getElementsByClassName("cart-quantity")[0]
        .addEventListener('change', quantityChanged);
}


// Update Total
function updateTotal() {
    var cartContent = document.getElementsByClassName("cart-content")[0];
    var cartBoxes = cartContent.getElementsByClassName("cart-box");
    var total = 0;
    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        var priceElement = cartBox.getElementsByClassName("cart-price")[0];
        var quantityElement = cartBox.getElementsByClassName("cart-quantity")[0];
        var price = parseFloat(priceElement.innerText.replace("₱", ""));
        var quantity = quantityElement.value;
        total = total + (price * quantity);
    }
    total = Math.round(total * 100) / 100;
    document.getElementsByClassName("total-price")[0].innerText = "₱" + total;
}


