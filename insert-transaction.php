<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if itemName, quantity, and totalPrice are set in the POST request
    if (isset($_POST['itemName']) && isset($_POST['quantity']) && isset($_POST['totalPrice'])) {
        $itemName = $_POST['itemName'];
        $quantity = $_POST['quantity'];
        $totalPrice = $_POST['totalPrice'];

        // Connect to your database (modify this according to your database configuration)
        $link = mysqli_connect("localhost", "root", "", "hci");
        if ($link === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Prepare an insert statement
        $sql = "INSERT INTO transaction (item, quantity, total) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($link, $sql);
        if ($stmt) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sii", $itemName, $quantity, $totalPrice);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                echo "Item added to cart successfully.";
            } else {
                echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
        }

        // Close connection
        mysqli_close($link);
    } else {
        // If itemName, quantity, and totalPrice are not set in the POST request
        echo "ERROR: Missing parameters.";
    }
} else {
    // If the request method is not POST
    echo "ERROR: Invalid request method.";
}
?>
