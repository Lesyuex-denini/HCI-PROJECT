<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopHear</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        body {
            background-color: #fff;
        }

        .fullscreen-img {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .fullscreen-img img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <div class="fullscreen-img">
        <a href="signup.php">
            <img src="shophear.gif" alt="ShopHear">
        </a>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Simple JavaScript for form validation -->
    <script>
        var imageLink = document.querySelector('.fullscreen-img a');
        imageLink.addEventListener('click', function (event) {
            // Handle click event here, such as redirecting to the signup page
            event.preventDefault(); // Prevent the default link behavior
            window.location.href = imageLink.href; // Redirect to the signup page
        });
    </script>
</body>

</html>
