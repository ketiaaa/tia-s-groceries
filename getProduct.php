<?php
include 'db_connection.php';

// Check if the code parameter is set and not empty
if(isset($_GET["code"]) && !empty($_GET["code"])) {
    // Sanitize the input to prevent SQL injection
    $product_id = mysqli_real_escape_string($connection, $_GET["code"]);

    // Query string with sanitized input
    $query_string = "SELECT * FROM products WHERE product_id = '$product_id'";

    // Run the query and assign the return values to $result
    $result = mysqli_query($connection, $query_string);

    // Check the number of records returned using $num_rows
    $num_rows = mysqli_num_rows($result);

    // Check if the $num_rows has values
    if ($num_rows > 0) {
        // Initialize the $product variable
        $product = '';

        // Fetch the values using mysqli_fetch_assoc
        while ($a_row = mysqli_fetch_assoc($result)) {
            // Construct the image file path
            $image_path = './assets/images/' . $a_row['product_id'] . '.png';

            // Check if the image file exists
            if (file_exists($image_path)) {
                $image_html = "<img src='$image_path' alt='{$a_row['product_name']}' style='max-width: 75px;'>";
            } else {
                $image_html = "No image available";
            }

            $product .= "
                <table style='justify-content:center;'>
                    <tr>
                        <td>$image_html</td>
                    </tr>
                    <tr>
                        <td>Product ID</td>
                        <td>{$a_row['product_id']}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{$a_row['product_name']}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td id='product-unit-price-{$a_row['product_id']}'>{$a_row['unit_price']}</td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td>{$a_row['unit_quantity']}</td>
                    </tr>
                    <tr>
                        <td>Stock</td>
                        <td>{$a_row['in_stock']}</td>
                    </tr>
                </table>
            ";
        }
    } else {
        // No records found
        $product = 'No product found with the given ID.';
    }

    // Close the connection
    mysqli_close($connection);

    // Return the product details
    echo $product;
} else {
    // Code parameter is not set or empty
    echo 'Invalid product ID.';
}
?>
