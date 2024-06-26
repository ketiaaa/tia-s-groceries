<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tia's Groceries</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <script src="script.js"></script>
</head>
<body>
    <!--Title-->
    <div class="header-content">
        <a href="index.html">
            <img id="logo" src="./assets/images/logo.png" alt="tia's Groceries">
        </a>
        <h1 class="site-title">tia's Groceries</h1>
    </div>
        <div class="grid-container">
        <!-- Search Form -->
        <form id="searchForm" onsubmit="searchProducts(event)">
            <input type="text" id="searchInput" name="keyword" placeholder="Search for products">
            <button type="submit">Search</button>
        </form>
        <!-- Container to display search results -->
        <div id="searchResults"></div>
    </form>  
    <!--Left Hand Frame-->
    <div class="main">
                <div class="navbar">
                    <div class="dropdown">
                        <div class="dropbtn">Frozen Food</div>
                        <!-- Main Dropdown-->
                        <div class="dropdown-one">
                            <div class="dItem" id="file" onclick="getProduct(1002)">Hamburger Patties</div>
                            <div id="link1" class="dItem">
                                Fish Fingers
                                <!--Inside Dropdown-->
                                <div class="dropdown-two" style="top: 20px;">
                                     <div class="dItem" id="file" onclick="getProduct(1000)">500 gram</div>
                                     <div class="dItem" id="file" onclick="getProduct(1001)">1000 gram</div>
                                </div>
                            </div>
                            <div class="dItem" id="file" onclick="getProduct(1003)">Shelled Prawns</div>
                            <div id="link1" class="dItem">
                                Tub Ice Cream
                                <!--Inside Dropdown-->
                                <div class="dropdown-two" style="top: 100px;">
                                     <div class="dItem" id="file" onclick="getProduct(1004)">1 Litre</div>
                                     <div class="dItem" id="file" onclick="getProduct(1005)">2 Litre</div>
                                </div>
                            </div>                    
                        </div>
                    </div> 
                    
                    <div class="dropdown">
                        <div class="dropbtn">Fresh Food</div>
                        <!-- Main Dropdown-->
                        <div class="dropdown-one">
                            <div id="link1" class="dItem" onclick="getProduct(3002)">T'Bone Steak</div>
                            <div id="link1" class="dItem">
                                Cheddar Cheese
                                <!--Inside Dropdown-->
                                <div class="dropdown-two">
                                     <div class="dItem" id="file" onclick="getProduct(3000)">500 gram</div>
                                     <div class="dItem" id="file" onclick="getProduct(3001)">1000 gram</div>
                                </div>
                            </div>
                            <div id="link1" class="dItem" onclick="getProduct(3003)">Navel Oranges</div>
                            <div id="link1" class="dItem" onclick="getProduct(3004)">Bananas</div>
                            <div id="link1" class="dItem" onclick="getProduct(3006)">Grapes</div>
                            <div id="link1" class="dItem" onclick="getProduct(3007)">Apple</div>
                            <div id="link1" class="dItem" onclick="getProduct(3005)">Peaches</div>
                        </div>
                    </div> 
                    
                    <div class="dropdown">
                        <div class="dropbtn">Beverages</div>
                        <!-- Main Dropdown-->
                        <div class="dropdown-one">
                            <div id="link1" class="dItem">
                                Coffee
                                <!--Inside Dropdown-->
                                <div class="dropdown-two">
                                     <div class="dItem" id="file" onclick="getProduct(4003)">200 gram</div>
                                     <div class="dItem" id="file" onclick="getProduct(4004)">500 gram</div>
                                </div>
                            </div>
                            <div id="link1" class="dItem">
                                Earl Grey Tea Bags
                                <!--Inside Dropdown-->
                                <div class="dropdown-two">
                                     <div class="dItem" id="file" onclick="getProduct(4000)">Pack 25</div>
                                     <div class="dItem" id="file" onclick="getProduct(4001)">Pack 100</div>
                                     <div class="dItem" id="file" onclick="getProduct(4002)">Pack 200</div>
                                </div>
                            </div>
                            <div id="link1" class="dItem" onclick="getProduct(4005)">Chocolate Bar</div>
                        </div>
                    </div> 
                    
                    <div class="dropdown">
                        <div class="dropbtn">Home Health</div>
                        <!-- Main Dropdown-->
                        <div class="dropdown-one">
                            <div id="link1" class="dItem" onclick="getProduct(2002)">Bath Soap</div>
                            <div id="link1" class="dItem">
                                Panadol
                                <!--Inside Dropdown-->
                                <div class="dropdown-two">
                                     <div class="dItem" id="file" onclick="getProduct(2000)">Pack 24</div>
                                     <div class="dItem" id="file" onclick="getProduct(2001)">Bottle 50</div>
                                </div>
                            </div>
                            <div id="link1" class="dItem" onclick="getProduct(2005)">Washing Powder</div>
                            <div id="link1" class="dItem">
                                Garbage Bags
                                <!--Inside Dropdown-->
                                <div class="dropdown-two" style="top: 80px;">
                                     <div class="dItem" id="file" onclick="getProduct(2003)">Small (10 Pack)</div>
                                     <div class="dItem" id="file" onclick="getProduct(2004)">Large (50 Pack)</div>
                                </div>
                            </div>
                            <div id="link1" class="dItem" onclick="getProduct(2006)">Laundry Bleach</div>
                        </div>
                    </div>
                    
                    <div class="dropdown">
                        <div class="dropbtn">Pet Food</div>
                        <!-- Main Dropdown-->
                        <div class="dropdown-one">
                            <div id="link1" class="dItem" onclick="getProduct(5002)">Bird Food</div>
                            <div id="link1" class="dItem" onclick="getProduct(5003)">Cat Food</div>
                            <div id="link1" class="dItem">
                                Dry Dog Food
                                <!--Inside Dropdown-->
                                <div class="dropdown-two" style="top: 80px;">
                                     <div class="dItem" id="file" onclick="getProduct(5000)">1 kg pack</div>
                                     <div class="dItem" id="file" onclick="getProduct(5001)">5 kg pack</div>
                                </div>
                            </div>
                            <div id="link1" class="dItem" onclick="getProduct(5004)">Fish Food</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--Top Right Frame-->
            <div class="top-right">
            <?php include 'featuredproduct.php'; ?>
               <h2>Product Details</h2>
               <div id="product-details-notice" style="font-style:italic">Please click a product to add the product to the cart.</div>
               <!--Display product details, the quantity and add button-->
               <div class="product-details-grid">
                    <div id="product-details"></div>
                    <div id="product-quantity" class="product-details-space"></div>
                    <div id="add-button" class="product-details-space"></div>
               </div>
            </div>
            
            <!--Bottom Right Frame-->
            <div class="bottom-right">
                <h2>Shopping Cart</h2>
                <!--Show products in the shopping cart-->
                <div class="shopping-cart-grid">
                    <div id="shopping-cart" class="shopping-cart"></div>
                </div>
                <!--Show total cost of shopping cart-->
                <div id="total-cost">
                    <div id="total-text"></div>
                    <div id="total-num"></div>
                    <br />
                </div>
                <!--Clear all carts and checkout-->
                <button onClick="clearAllCart()">Clear All</button>
                <button onCLick="checkout()">Checkout</button>
                <div id="shopping"></div>
                <div id="checkout"></div>
            </div>
        </div>
  
</body>
</html>
