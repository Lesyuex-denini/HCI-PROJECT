<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="style.css">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top nav-purple">
    <div class="container-fluid">
    <img src="shophearlogo.gif" alt="Logo" class="navbar-logo super-small-logo">
      <a class="navbar-brand" href="#">ShopHear</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
     
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
  
  <!-- Landing Page Content -->
  <div class="landing-page">
    <div class="container">
      <h1 class="typewriter">SHOPHEAR</h1>
      <p class="write">we are HEAR for you</p>
    </div>
  </div>

    <!-- Yellow Section -->
    <div class="yellow-sectionn">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <img src="model.gif" alt="Image Description" class="img-fluid smaller-image">
        </div>
        <div class="col-md-6">
          <div class="rounded p-4 yellow-text-bg">
            <div class="yellow-text">
            <p>Step into our world of carefully chosen products designed to enhance your hearing and sight. Our collection is all about making sure you hear every sound clearly and see everything with sharpness and clarity, making your daily experiences more enjoyable.</p>
            <p>Our team is dedicated to providing personalized support that's just right for you. We understand that everyone's journey to better hearing and vision is unique, so we're here to guide you every step of the way. You'll find our friendly guide to make your experience smooth and hassle-free.</p>
            <p>Together, let's embark on a journey towards improved sensory experiences. Discover how our products can make a difference in your daily life, bringing you closer to a world filled with clear sights and sounds that uplift your spirit and enrich your days.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Footer -->
  <footer class="footer">
    <div class="container footer-content">
      <p>&copy; 2024 Your Website</p>
      <div class="social-icons">
        <a href="https://www.facebook.com/mills.abadinas/"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com/home"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/mriamils_/"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS (optional, for dropdowns, toggles, etc.) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Font Awesome JS for icons -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>