<?php
session_start();
include("constant.php");

$link = mysqli_connect("localhost", "root", "", "hci");
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['id'])) {
    $itemId = $_POST['id'];

    $sql = "DELETE FROM transaction WHERE id = ?";
    if($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $itemId);

        if(mysqli_stmt_execute($stmt)) {
            echo "Item deleted successfully.";
        } else {
            echo "ERROR: Could not delete item. Please try again later.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "ERROR: Could not prepare delete statement.";
    }
} else {
    echo "ERROR: Item ID not provided.";
}

mysqli_close($link);
?>
