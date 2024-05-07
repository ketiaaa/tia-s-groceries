<?php
include 'db_connection.php';

// Check if the keyword is provided
if(isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($connection, $_GET['keyword']);

    // Query to search for products based on keyword
    $sql = "SELECT * FROM products WHERE product_name LIKE '%$keyword%'";

    // Execute the query
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        // Error handling if query fails
        echo 'Error: ' . mysqli_error($connection);
    } else {
        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // Display products
            echo '<div class="product-grid">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product">';
                $imageFilename = $row['product_id'] . '.png';
                echo '<img src="../assets/images/' . htmlspecialchars($imageFilename) . '" alt="' . htmlspecialchars($row['product_name']) . '"style="width: 75px; height: auto;">';
                echo '<h2>' . htmlspecialchars($row['product_name']) . '</h2>';
                echo '<p>Price: $' . htmlspecialchars($row['unit_price']) . '</p>';
                echo '<p>Unit Quantity: ' . htmlspecialchars($row['unit_quantity']) . '</p>';
                echo '</div>';
            }
        } else {
            echo 'No products found.';
        }

        // Free result set
        mysqli_free_result($result);
    }
} else {
    echo 'No keyword provided.';
}

// Close database connection
mysqli_close($connection);
?>

