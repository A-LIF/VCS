<?php
    //include auth_session.php file on all user panel pages
    include("auth_session.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>KapeTann Brewed Coffee Shop</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2Hhh_14Uam62GXGaTMcXWhhVkYg0EbDY&callback=initMap" async defer></script>

        <!-- Custom CSS File Link -->
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/convo.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"><!-- font awesome cdn link -->
        <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico"><!-- Favicon / Icon -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!-- Google font cdn link -->
    </head>
    <body>
        <!-- HEADER SECTION -->
        <header class="header">
            <a href="#" class="logo">
                <img src="../assets/images/logo.png" class="img-logo" alt="KapeTann Logo">
            </a>

            <!-- MAIN MENU FOR SMALLER DEVICES -->
            <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="#home" class="text-decoration-none">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="text-decoration-none">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#menu" class="text-decoration-none">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="text-decoration-none">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="text-decoration-none">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="icons">
                <div class="fas fa-shopping-cart" id="cart-btn"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
            </div>


            <!-- CART SECTION -->
            <div class="cart">
                <h2 class="cart-title">Your Cart:</h2>
                <div class="cart-content">
                    
                </div>
                <div class="total">
                    <div class="total-title">Total: </div>
                    <div class="total-price">₱0</div>
                </div>
                <!-- BUY BUTTON -->
                <button type="button" class="btn-buy" onclick="redirectToCheckout()">Checkout Now</button>
            </div>
        </header>

        <!-- HERO SECTION -->
        <section class="home" id="home">
            <div class="content">
                <h3>Welcome to KapeTann Coffee Shop, <?php echo $_SESSION['username']; ?>!</h3>
                <p>
                    <strong>We are open 4:00 PM to 9:00 PM.</strong>
                </p>
                <a href="#menu" class="btn btn-dark text-decoration-none">Order Now!</a>
            </div>
        </section>

        <!-- ABOUT US SECTION -->
        <section class="about" id="about">
            <h1 class="heading"> <span>About</span> Us</h1>
            <div class="row g-0">
                <div class="image">
                    <img src="../assets/images/about-img.png" alt="" class="img-fluid">
                </div>
                <div class="content">
                    <h3>Welcome to KapeTann!</h3>
                    <p>
                        At KapeTann Coffee Shop, we are passionate about coffee and believe
                        that every cup tells a story. We are a cozy coffee shop located
                        in the heart of the city, dedicated to providing an exceptional
                        coffee experience to our customers. Our love for coffee has led
                        us on a voyage of exploration and discovery, as we travel the
                        world in search of the finest coffee beans, carefully roasted
                        and brewed to perfection.
                    </p>
                    <p>
                        But coffee is not just a drink, it's an experience. Our warm and
                        inviting atmosphere at KapeTann is designed to be a haven
                        for coffee lovers, where they can relax, connect, and embark
                        on their own coffee voyages.
                    </p>
                    <a href="#" class="btn btn-dark text-decoration-none">Learn More</a>
                </div>
            </div>
        </section>

      <!-- MENU SECTION -->
      <section class="menu" id="menu">
            <h1 class="heading">Our <span>Menu</span></h1>
            <div class="box-container">
                <div class="container">
                    <div class="row">
                    <div class="col-md-4">
    <div class="box">
        <img src="../assets/images/cart-item-1.png" alt="" class="product-img">
        <h3 class="product-title">Americano - Hot Espresso  </h3>
        <div class="price">₱45.00</div>
        <select class="form-select size-select mb-2">
            <option value="Sugar">Sugar</option>
            <option value="Sugar Free" selected>Sugar Free</option>
        </select>
        <a class="btn add-cart" onclick="addCardClicked(this)">Add to Cart</a>
    </div>
</div>
<br />
<div class="col-md-4">
    <div class="box">
        <img src="../assets/images/cart-item-2.png" alt="" class="product-img">
        <h3 class="product-title">Colombian Supremo Cup </h3>
        <div class="price">₱40.00</div>
        <select class="form-select size-select mb-2" onchange="updatePrice(this)">
            <option value="small">Small</option>
            <option value="large">Large</option>
        </select>
        <a class="btn add-cart" onclick="addCartClicked(this)">Add to Cart</a>
    </div>
</div>

<br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="../assets/images/cart-item-3.png" alt="" class="product-img">
                                <h3 class="product-title">Nitro Cold Brew w/ Straw  </h3>
                                <div class="price">₱50.00</div>
                                <select class="form-select size-select mb-2">
                                    <option value="small">Small (8 oz)</option>
                                    <option value="large">Large (16 oz)</option>
                                </select>
                                <a class="btn add-cart" onclick="addToCart(this)">Add to Cart</a>
                            </div>
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                                <img src="../assets/images/cart-item-4.png" alt="" class="product-img">
                                <h3 class="product-title">Seasonal Single-Origin  </h3>
                                <div class="price">₱30.00</div>
                                <select class="form-select size-select mb-2">
                                    <option value="small">Small (8 oz)</option>
                                    <option value="medium" selected>Medium  </option>
                                    <option value="large">Large (16 oz)</option>
                                </select>
                                <a class="btn add-cart" onclick="addToCart(this)">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="../assets/images/cart-item-5.png" alt="" class="product-img">
                                <h3 class="product-title">Indonesian Sumatra Mandheling  </h3>
                                <div class="price">₱40.00</div>
                                <select class="form-select size-select mb-2">
                                    <option value="small">Small (8 oz)</option>
                                    <option value="medium" selected>Medium  </option>
                                    <option value="large">Large (16 oz)</option>
                                </select>
                                <a class="btn add-cart" onclick="addToCart(this)">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="../assets/images/cart-item-6.png" alt="" class="product-img">
                                <h3 class="product-title">Mint Mojito Iced Coffee  </h3>
                                <div class="price">₱55.00</div>
                                <select class="form-select size-select mb-2">
                                    <option value="small">Small (8 oz)</option>
                                    <option value="medium" selected>Medium  </option>
                                    <option value="large">Large (16 oz)</option>
                                </select>
                                <a class="btn add-cart" onclick="addToCart(this)">Add to Cart</a>
                            </div>
                        </div>
                    </div><br />
                    <div class="row row-to-hide">
                        <div class="col-md-4">
                            <div class="box">
                                <img src="../assets/images/cart-item-7.png" alt="" class="product-img">
                                <h3 class="product-title">Iced Americano  </h3>
                                <div class="price">₱35.00</div>
                                <select class="form-select size-select mb-2">
                                    <option value="small">Small (8 oz)</option>
                                    <option value="medium" selected>Medium  </option>
                                    <option value="large">Large (16 oz)</option>
                                </select>
                                <a class="btn add-cart" onclick="addToCart(this)">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="../assets/images/cart-item-8.png" alt="" class="product-img">
                                <h3 class="product-title">Specialty Brews  </h3>
                                <div class="price">₱85.00</div>
                                <select class="form-select size-select mb-2">
                                    <option value="small">Small (8 oz)</option>
                                    <option value="medium" selected>Medium  </option>
                                    <option value="large">Large (16 oz)</option>
                                </select>
                                <a class="btn add-cart" onclick="addToCart(this)">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="../assets/images/cart-item-9.png" alt="" class="product-img">
                                <h3 class="product-title">Seasonal Origin  </h3>
                                <div class="price">₱80.00</div>
                                <select class="form-select size-select mb-2">
                                    <option value="small">Small (8 oz)</option>
                                    <option value="medium" selected>Medium  </option>
                                    <option value="large">Large (16 oz)</option>
                                </select>
                                <a class="btn add-cart" onclick="addToCart(this)">Add to Cart</a>
                            </div>
                        </div>
                    </div><br />
                    <div class="row row-to-hide">
                        <div class="col-md-4">
                        <div class="box">
                                <img src="../assets/images/cart-item-10.png" alt="" class="product-img">
                                <h3 class="product-title">Ethiopian Yirgacheffe Cup  </h3>
                                <div class="price">₱55.00</div>
                                <select class="form-select size-select mb-2">
                                    <option value="small">Small (8 oz)</option>
                                    <option value="medium" selected>Medium  </option>
                                    <option value="large">Large (16 oz)</option>
                                </select>
                                <a class="btn add-cart" onclick="addToCart(this)">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="../assets/images/cart-item-11.png" alt="" class="product-img">
                                <h3 class="product-title">Cold Brew Tonic In a Cup  </h3>
                                <div class="price">₱35.00</div>
                                <select class="form-select size-select mb-2">
                                    <option value="small">Small (8 oz)</option>
                                    <option value="medium" selected>Medium  </option>
                                    <option value="large">Large (16 oz)</option>
                                </select>
                                <a class="btn add-cart" onclick="addToCart(this)">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="../assets/images/cart-item-12.png" alt="" class="product-img">
                                <h3 class="product-title">Caramel Cold Foam Cold Brew  </h3>
                                <div class="price">₱55.00</div>
                                <select class="form-select size-select mb-2">
                                    <option value="small">Small (8 oz)</option>
                                    <option value="medium" selected>Medium  </option>
                                    <option value="large">Large (16 oz)</option>
                                </select>
                                <a class="btn add-cart" onclick="addToCart(this)">Add to Cart</a>
                            </div>
                        </div>
                    </div><br />
                    <center>
                        <button id="showHideBtn" class="btn btn-dark">SHOW MORE</button>
                    </center> 
                </div>
            </div>
        </section>

        <!-- CONTACT US SECTION -->
        <section class="contact" id="contact">
            <h1 class="heading"><span>Contact</span> Us</h1>
            <div class="row">
                <div id="map" class="map pull-left"></div>
                <form name="contact" method="POST" action="https://formspree.io/f/xayzavgb">
                    <h3> Get in touch with us!</h3>
                    <div class="inputBox">
                        <span class="fas fa-envelope"></span>
                        <input type="email" name="email" placeholder="Email Address">
                    </div>
                    <div class="inputBox">
                        <textarea name="message" placeholder="Enter your message..."></textarea>
                    </div>
                    <button type="submit" class="btn">Contact Now</button>
                </form>
            </div>
        </section>

        <!-- FOOTER SECTION -->
        <section class="footer">
            <div class="footer-container">
                <div class="logo">
                    <img src="../assets/images/logo.png" class="img"><br />
                    <i class="fas fa-envelope"></i>
                    <p>abfiguerrez18@gmail.com</p><br />
                    <i class="fas fa-phone"></i>
                    <p>+63 917-134-1422</p><br />
                    <i class="fab fa-facebook-messenger"></i>
                    <p>@kapetanncoffee</p><br />
                </div>
                <div class="support">
                    <h2>Support</h2>
                    <br /> 
                    <a href="#">Contact Us</a>
                    <a href="#">Customer Service</a>
                    <a href="#">Chatbot Inquiry</a>
                    <a href="#">Submit a Ticket</a>
                </div>
                <div class="company">
                    <h2>Company</h2>
                    <br /> 
                    <a href="#">About Us</a>
                    <a href="#">Affiliates</a>
                    <a href="#">Resources</a>
                    <a href="#">Partnership</a>
                    <a href="#">Suppliers</a>
                </div>
                <div class="newsletters">
                    <h2>Newsletters</h2>
                    <br /> 
                    <p>Subscribe to our newsletter for news and updates!</p>
                    <div class="input-wrapper">
                        <input type="email" class="newsletter" placeholder="Your email address">
                        <i id="paper-plane-icon" class="fas fa-paper-plane"></i>
                    </div>
                </div>
                <div class="credit">
                    <hr /><br/>
                    <h2>KapeTann Brewed Coffee © 2023 | All Rights Reserved.</h2>
                    <h2>Designed by <span>Algo Filipino</span> | Teravision</h2>
                </div>
            </div>
        </section>
        
        <!-- JS File Link -->
        <script src="../assets/js/googleSignIn.js"></script>
        <script src="../assets/js/script.js"></script>
        <script src="../assets/js/cart.js"></script>
        <script src="../assets/js/responses.js"></script>
        <script src="../assets/js/convo.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script>
            // CODE FOR THE FORMSPREE
            window.onbeforeunload = () => {
                for(const form of document.getElementsByTagName('form')) {
                    form.reset();
                }
            }

            // CODE FOR THE GOOGLE MAPS API
            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 14.99367271992383, lng: 120.17629231186626},
                    zoom: 9
                });

                var marker = new google.maps.Marker({
                    position: {lat: 14.99367271992383, lng: 120.17629231186626},
                    map: map,
                    title: 'Your Location'
                });
            }

            // CODE FOR THE SHOW MORE & SHOW LESS BUTTON IN MENU
            $(document).ready(function() {
                $(".row-to-hide").hide();
                $("#showHideBtn").text("SHOW MORE");
                $("#showHideBtn").click(function() {
                    $(".row-to-hide").toggle();
                    if ($(".row-to-hide").is(":visible")) {
                        $(this).text("SHOW LESS");
                    } else {
                        $(this).text("SHOW MORE");
                    }
                });
            });

            // CODE FOR THE SHOW MORE & SHOW LESS BUTTON IN GALLERY
            $(document).ready(function() {
                $(".pic-to-hide").hide();
                $("#showBtn").text("SHOW MORE");
                $("#showBtn").click(function() {
                    $(".pic-to-hide").toggle();
                    if ($(".pic-to-hide").is(":visible")) {
                        $(this).text("SHOW LESS");
                    } else {
                        $(this).text("SHOW MORE");
                    }
                });
            });

            // JavaScript function to redirect to checkout page with product details
function redirectToCheckout(name, price, quantity) {
    // Redirect to checkout.php and pass parameters in the URL
    window.location.href = 'checkout.php?name=' + encodeURIComponent(name) + '&price=' + encodeURIComponent(price) + '&quantity=' + encodeURIComponent(quantity);
}
function addToCart(button) {
    var productBox = button.closest('.box');
    var productName = productBox.querySelector('.product-title').textContent.trim();
    var productPrice = parseFloat(productBox.querySelector('.price').textContent.replace('₱', '').trim());

    // Example: AJAX to addToCart.php
    $.ajax({
        url: 'addToCart.php',
        method: 'POST',
        data: { name: productName, price: productPrice },
        success: function(response) {
            // Update UI: Show success message or update cart total
            alert('Product added to cart!');
        },
        error: function(xhr, status, error) {
            console.error('Error adding to cart:', error);
        }
    });
}
        </script> 
    </body>
</html>