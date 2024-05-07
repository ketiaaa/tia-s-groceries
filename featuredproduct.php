<?php
include 'db_connection.php';

// Query to retrieve all products
$sql = "SELECT * FROM products";
$result = mysqli_query($connection, $sql);

// Check if there are any products
if (mysqli_num_rows($result) > 0) {
    // Store all products in an array
    $products = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    // Randomly shuffle the array to select featured products
    shuffle($products);

    // Display up to 10 randomly selected featured products
    echo '<div class="featured-products">';
    echo '<h1>Featured Products</h1>';
    for ($i = 0; $i < min(10, count($products)); $i++) {
        echo '<div class="product-item">';
        echo '<img src="../assets/images/' . $products[$i]['product_id'] . '.png" alt="' . htmlspecialchars($products[$i]['product_name']) . '"style="width: 75px; height: auto;">';
        echo '<h2>' . htmlspecialchars($products[$i]['product_name']) . '</h2>';
        echo '<p>Price: $' . htmlspecialchars($products[$i]['unit_price']) . '</p>';
        echo '</div>';
    }
    echo '</div>';
} else {
    // No products found
    echo 'No products available.';
}

mysqli_close($connection);
?>
