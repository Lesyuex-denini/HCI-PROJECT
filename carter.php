<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-purple">
    <div class="container-fluid">
      <!-- Logo -->
      <a class="navbar-brand" href="#">Your Logo</a>
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

                            $totalBill += $row['total'];
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





  

    <!-- Footer -->
  <footer class="footer">
    <div class="container footer-content">
      <p>&copy; 2024 Your Website</p>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS (optional, for dropdowns, toggles, etc.) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Font Awesome JS for icons -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>