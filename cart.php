<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #AD88C6;
            font-family: "Outfit", sans-serif;
            background-image: url("assets/cart-bg.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .nav-purple {
            background-color: purple;
        }
        .nav-purple .navbar-brand,
        .nav-purple .nav-link {
            color: white !important; 
            font-weight: bold;
            text-transform: capitalize;
            
        }
        .nav-link:hover {
            color: #ffc107 !important; 
        }
        .navbar-brand:hover{
            color: #ffc107 !important;
        }
        .super-small-logo {
            max-width: 40px; 
            margin-right: 10px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            background-color: rgba(255, 255, 255, 0.5); /* Add transparency */
            backdrop-filter: blur(10px); /* Add blur effect */
            border-radius: 15px; /* Add border radius */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Add shadow */
        }
        th, td {
            border-bottom: 1px solid #dee2e6;
            padding: 15px;
            font-size: 20px;
        }
        th {
            background-color: rgba(255, 255, 255, 0.5); /* Add transparency */
            backdrop-filter: blur(10px); /* Add blur effect */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Add shadow */
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .edit-btn, .delete-btn, .order-btn {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .edit-btn:hover, .delete-btn:hover, .order-btn:hover {
            background-color: #0056b3;
        }
        .order-btn {
            display: block;
            width: 100%;
        }
        @media (max-width: 576px) {
            .container {
                padding: 15px;
            }
            table {
                font-size: 14px;
            }
            th, td {
                padding: 10px;
            }
        }
        tr{
            text-align: center; 
            justify-content: center;
            align-items: center;
        }
        td[colspan="4"] {
            text-align: left;
        }
        .navbar-brand {
            margin-left: 5px; 
        }
        #cart-button{
            font-size: 30px;
        }
        #glasses-button{
            font-size: 40px;
        }
        .nav-purple {
          background-color: purple;
        }
        .nav-purple .navbar-brand,
        .nav-purple .nav-link {
          color: white !important; 
          font-weight: bold;
          text-transform: capitalize;
          
        }
        .nav-link:hover {
          color: #ffc107 !important; 
        }
        .navbar-brand:hover{
          color: #ffc107 !important;
        }
        .brandname{
            float: right;
            font-size: 30px;
            margin-left: 10px;
            margin-top: 3px;
            color: #ffffff;
        }
        .cartlb{
            margin-top: 80px;
            color: #ffffff;
        }
        .order-checkbox {
        width: 20px;
        height: 20px;
        }
        .bi {
        margin-left: 10px; 
        margin-right: 10px; 
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top nav-purple">
    <div class="container-fluid">
    <img src="shophearlogo.gif" alt="Logo" class="navbar-logo super-small-logo">
      <!-- Logo -->
      <a class="navbar-brand" href="#">ShopHear</a>
      <!-- Toggle button for small screens -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Navigation links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


    <div class="container">
        <h1 class="cartlb">Cart:</h1>
        <table>
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Picture</th>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include("constant.php");

                $link = mysqli_connect("localhost", "root", "", "hci");
                if ($link === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                if (!isset($_SESSION['username'])) {
                    header('Location: login.php');
                    exit;
                }

                $totalBill = 0;

                if (isset($_SESSION['user_id'])) {
                    $userId = $_SESSION['user_id'];

                    $sql = "SELECT * FROM transaction WHERE id = $userId";
                    $result = mysqli_query($link, $sql);
                }

                // Attempt select query execution
                $sql = "SELECT * FROM transaction";
                $result = mysqli_query($link, $sql);
                if ($result) {
                    // Check if there are rows returned
                    if (mysqli_num_rows($result) > 0) {
                        // Output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td><input type="checkbox" class="order-checkbox"></td>';
                            echo '<td><img src="assets/' . $row['item'] . '.png" alt="glass picture" style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px;"></td>';
                            echo '<td>' . $row['item'] . '</td>';
                            echo '<td>' . $row['quantity'] . '</td>';
                            echo '<td>' . $row['total'] . '</td>';
                            echo '<td>';
                            echo '<button class="delete-btn" data-id="' . $row['id'] . '">Delete</button>';
                            echo '</td>';
                            echo '</tr>';

                            $totalBill = $row['total'];
                        }
                    } else {
                        echo '<tr><td colspan="6">No items in the cart.</td></tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">ERROR: Could not execute query: ' . $sql . '. ' . mysqli_error($link) . '</td></tr>';
                }
                echo '<tr id="totalBillRow">';
                echo '<td colspan="4">Total Bill:</td>';
                echo '<td id="totalBillAmount" colspan="1">' . $totalBill . '</td>';
                echo '<td><button class="order-btn" id="orderNowBtn">Order Now</button>';
                echo '</tr>';

                mysqli_close($link);
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
            $('.delete-btn').click(function(){
                var itemId = $(this).data('id');
                if(confirm('Are you sure you want to delete this item?')){
                    $.ajax({
                        url: 'delete-item.php',
                        type: 'POST',
                        data: { id: itemId },
                        success: function(response){
                            location.reload();
                        },
                        error: function(xhr, status, error){
                            console.error('Error:', error);
                            alert('An error occurred while deleting the item. Please try again later.');
                        }
                    });
                }
            });

            $(document).ready(function() {
    // Function to update the total bill amount
    function updateTotalBill() {
        var totalBill = 0;
        $('.order-checkbox:checked').each(function() {
            var itemPrice = parseFloat($(this).closest('tr').find('td:eq(4)').text());
            totalBill += itemPrice;
        });
        $('#totalBillAmount').text(totalBill.toFixed(2)); // Update the total bill amount
        // Update totalBill in localStorage
        localStorage.setItem('totalBill', totalBill);
    }

    // Initial call to update total bill amount
    updateTotalBill();

    $('.order-checkbox').change(function() {
        updateTotalBill(); // Call the function to update the total bill amount
    });

    $('#orderNowBtn').click(function() {
        var selectedItems = [];
        $('.order-checkbox:checked').each(function() {
            selectedItems.push($(this).closest('tr').find('.edit-btn').data('id'));
        });

        // Check if no item was selected
        if (selectedItems.length === 0) {
            alert('No item was selected.');
            return; // Stop further execution
        }

        window.location.href = 'order.php?items=' + selectedItems.join(',');
    });
});

    </script>
    <script>
        $(document).ready(function() {
        $('.order-btn').click(function() {
            if ($('.order-checkbox:checked').length === 0) {
                alert('No item was selected.');
                return; 
            }
            window.location.href = 'receipt.php';
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
