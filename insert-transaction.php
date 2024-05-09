<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['itemName']) && isset($_POST['quantity']) && isset($_POST['totalPrice'])) {
            $itemName = $_POST['itemName'];
            $quantity = $_POST['quantity'];
            $totalPrice = $_POST['totalPrice'];

            $link = mysqli_connect("localhost", "root", "", "hci");
            if ($link === false) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            $sql = "INSERT INTO transaction (item, quantity, total) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($link, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sii", $itemName, $quantity, $totalPrice);

                if (mysqli_stmt_execute($stmt)) {
                    echo "Item added to cart successfully.";
                } else {
                    echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
            }

            mysqli_close($link);
        } else {
            echo "ERROR: Missing parameters.";
        }
    } else {
        echo "ERROR: Invalid request method.";
    }
?>
