// Functionality
let currentProduct;
let totalCart = [];

// Get product with a specific code
function getProduct(code) {
    currentProduct = code;
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            // Display product details
            document.getElementById("product-details").innerHTML = xhttp.responseText;
            // Remove prompt
            document.getElementById("product-details-notice").innerHTML = "";
            // Allow user to modify product quantity
            document.getElementById("product-quantity").innerHTML = "<input type='number' id='quantity' style='width: 60px;' min='0'>";
            // Allow user to add products to the shopping cart
            document.getElementById("add-button").innerHTML = "<button onclick='addCart()'>Add</button>";
        }
    };
    // Call PHP code to get a specific product with the given product code
    xhttp.open("GET", "getProduct.php?code=" + code, true);
    xhttp.send();
}

// Add product to the shopping cart
function addCart() {
    const productQuantity = document.getElementById("quantity").value; // Get the quantity of the current product added by the user
    const validQuantity = validateQuantity(productQuantity); // Validate if the quantity is valid

    // Calculate subtotal of the current product
    let subtotal = parseFloat((parseInt(productQuantity) * parseFloat(document.getElementById(`product-unit-price-${currentProduct}`).innerText)).toFixed(2));

    if (validQuantity) {
        // Check if it is previously in the cart
        const inCart = totalCart.some(obj => obj.hasOwnProperty(currentProduct));

        if (!inCart) { // If it's never in the cart before
            // Put product details to the shopping cart
            document.getElementById("shopping-cart").innerHTML += `
                <div class='shopping-cart-grid'>
                    <div>${document.getElementById("product-details").innerHTML}</div>
                    <div><input type='number' min='0' onChange='updateTotal(event, this.value)' onInput='updateTotal(event, this.value)' id='quantity-${currentProduct}' style='width: 60px; margin: 50px 0px 0px 80px' value="${productQuantity}"></div>
                    <div style='width: 60px; margin: 50px 0px 0px 80px' id='subtotal-${currentProduct}'>${subtotal}</div>
                </div><br />
            `;
            // Push current product to the shopping cart
            totalCart.push({ [currentProduct]: productQuantity });
        } else { // If it's in the cart before
            // Add the value from previous quantity
            let prevQuantity = document.getElementById(`quantity-${currentProduct}`).value;
            // Replace old quantity value with the new one
            document.getElementById(`quantity-${currentProduct}`).value = parseInt(prevQuantity) + parseInt(productQuantity);
            // Replace old subtotal (old subtotal + new subtotal)
            document.getElementById(`subtotal-${currentProduct}`).innerText = ((parseInt(prevQuantity) * parseFloat(document.getElementById(`product-unit-price-${currentProduct}`).innerText)) + parseFloat(subtotal)).toFixed(2);
            // Find current product and replace the object in the shopping cart
            for (let i = 0; i < totalCart.length; i++) {
                let key = Object.keys(totalCart[i])[0];
                if (key == currentProduct) { // If current product code is the same with the array
                    // Replace the old quantity, e.g., {2001: 5}
                    totalCart[i][currentProduct] = parseInt(document.getElementById(`quantity-${currentProduct}`).value);
                }
            }
        }

        // Display total
        document.getElementById("total-text").innerText = "Total";
        document.getElementById("total-num").innerText = ((parseFloat(document.getElementById("total-num").innerText) || 0) + parseFloat(subtotal)).toFixed(2);
    } else {
        alert("Please insert a valid product quantity");
    }
}

// Validate product quantity
function validateQuantity(q) {
    // If <= 0 or > 20 or decimal: not valid
    if (q <= 0 || q > 20 || q % 1 !== 0) {
        return false;
    }
    return true;
}

// Clear all products in the cart
function clearAllCart() {
    // Clear shopping cart
    document.getElementById("shopping-cart").innerHTML = "";
    // Clear total cost of all products
    document.getElementById("total-text").innerText = "";
    document.getElementById("total-num").innerText = "";
    // Reinitialize array to empty
    totalCart = [];
    // Reload page
    window.location.reload();
}

// Update subtotal and total when quantity changes in the shopping cart to make it dynamic
function updateTotal(e, val) {
    if (!validateQuantity(val)) { // Not valid quantity
        alert("Please insert a valid product quantity");
    } else { // Valid
        // Get the ID name
        let t = e.target;
        // Some browsers consider text nodes to be a target
        while (t && !t.id) t = t.parentNode;
        if (t) {
            // Only get the code of the specific product
            // currentId[1] : product code
            let currentId = t.id.split("-");
            // Replace the old quantity with the new value
            document.getElementById(`quantity-${currentId[1]}`).setAttribute("value", val);
            // Recalculate subtotal (new quantity * price of current product)
            document.getElementById(`subtotal-${currentId[1]}`).innerText = (val * parseFloat(document.getElementById(`product-unit-price-${currentId[1]}`).innerText)).toFixed(2);
            // Find current product and replace the old quantity with the new ones in the shopping cart array
            for (let i = 0; i < totalCart.length; i++) {
                let key = Object.keys(totalCart[i])[0];
                if (key == currentId[1]) { // If current product code is the same with the array
                    // Replace the old quantity, e.g., {2001: 5}
                    totalCart[i][currentId[1]] = parseInt(val);
                }
            }
        }
        // Recalculate the total cost of all products
        let total = 0;
        for (let i = 0; i < totalCart.length; i++) {
            let key = Object.keys(totalCart[i])[0];
            total += parseFloat(document.getElementById(`subtotal-${key}`).innerText);
        }
        // Update total cost of all products
        document.getElementById("total-num").innerText = total.toFixed(2);
    }
}

function checkout() {
    if (totalCart.length === 0) {
        alert("There is nothing in the shopping cart!");
    } else {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4) {
                if (xhttp.status == 200) {
                    try {
                        let result = JSON.parse(xhttp.responseText);
                        for (const [key, value] of Object.entries(result)) {
                            console.log(`${key}: ${value}`);
                            if (!value) {
                                alert(`Item with ID ${key} is not in stock!`);
                                return false;
                            }
                        }
                        // If all items are in stock, direct the user to the checkout page
                        window.location.href = "checkout.html";
                    } catch (error) {
                        alert("Error: " + error);
                    }
                } else {
                    alert("Error: " + xhttp.status);
                }
            }
        };
        xhttp.open("POST", "checkProduct.php");
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send(JSON.stringify(totalCart));
    }
}

function searchProducts(event) {
    // Prevent default form submission
    event.preventDefault();

    // Get the search query from the input field
    var keyword = document.getElementById("searchInput").value;

    // Perform the search using AJAX
    fetch("search.php?keyword=" + encodeURIComponent(keyword))
        .then(response => response.text())
        .then(data => {
            // Display search results in the searchResults container
            document.getElementById("searchResults").innerHTML = data;
        })
        .catch(error => {
            console.error("Error:", error);
        });
}

document.addEventListener("DOMContentLoaded", function() {
    fetchFeaturedProducts();
});

function fetchFeaturedProducts() {
    fetch("getproduct.php")
    .then(response => response.json())
    .then(products => {
        const productGrid = document.querySelector(".product-grid");
        productGrid.innerHTML = "";

        products.forEach(product => {
            const productItem = createProductItem(product);
            productGrid.appendChild(productItem);
        });
    })
    .catch(error => {
        console.error("Error fetching featured products:", error);
    });
}

function createProductItem(product) {
    const productItem = document.createElement("div");
    productItem.classList.add("product-item");
    
    // Populate product item with data
    productItem.innerHTML = `
        <img src="${product.image}" alt="${product.name}">
        <h3>${product.name}</h3>
        <p>$${product.price}</p>
        <!-- Add more product details as needed -->
    `;

    return productItem;
}
