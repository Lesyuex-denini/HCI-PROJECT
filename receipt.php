<!DOCTYPE html>
<html>
<head>
    <title>Order Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #BA90C6; 
            font-family: 'Varela Round', sans-serif;
            background-image: url("assets/cart-bg.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .form-container {
            width: 300px;
            padding: 20px;
            background-color: rgba(208, 191, 255, 0.8); 
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .form-container h2{
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        .center-button {
            display: flex;
            justify-content: center;
        }

        input[type="submit"] {
            background-color: #540375;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #C04A82;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Order Form</h2>
        <form method="post" action="#" onsubmit="return validateForm()">
            <label for="full_name">Full Name:</label><br>
            <input type="text" id="full_name" name="full_name" required><br><br>

            <label for="phone_number">Phone Number:</label><br>
            <input type="text" id="phone_number" name="phone_number" required><br><br>

            <label>Payment Method:</label><br>
            <input type="checkbox" id="gcash" name="payment_method[]" value="GCash">
            <label for="gcash">GCash</label><br>
            <input type="checkbox" id="cod" name="payment_method[]" value="COD">
            <label for="cod">Cash on Delivery (COD)</label><br><br>

            <label for="address">Address:</label><br>
            <textarea id="address" name="address" required></textarea><br><br>

            <div class="center-button">
                <input type="submit" value="Submit Order">
            </div>
        </form>
    </div>

    <script>
    function validateForm() {
        const fullName = document.getElementById('full_name').value;
        const phoneNumber = document.getElementById('phone_number').value;
        const gcashChecked = document.getElementById('gcash').checked;
        const codChecked = document.getElementById('cod').checked;
        const address = document.getElementById('address').value;

        if (!fullName || !phoneNumber || (!gcashChecked && !codChecked) || !address) {
            alert('Please fill in all required fields and select a payment method.');
            return false; 
        }

        return true; 
    }

    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the form from submitting by default
            if (validateForm()) {
                showSuccessMessage();
            }
        });

        function showSuccessMessage() {
            alert("Order Successful!");
            window.location.href = "home.php"; 
        }
    });
</script>


</body>
</html>
