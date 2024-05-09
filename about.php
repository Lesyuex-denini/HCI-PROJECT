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
  <style>
    .section-content p {
      letter-spacing: 2px;
      text-align: center;
      font-size: 16px;
  }
  </style>

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

  <!-- About Section -->
  <div class="container mt-5">
    <!-- Shophear Section -->
    <section class="invisible-bg">
      <div class="section-title">
        <h2>About Shophear</h2>
      </div>
      <div class="section-content">
        <p>
          Welcome to Shophear, where fashion meets accessibility! We believe that everyone deserves to enjoy the beauty of stylish eyewear, regardless of their visual abilities. Our mission is to provide a seamless shopping experience for individuals with visual impairments, ensuring that they can effortlessly explore and discover the perfect pair of fashion glasses.
          <br><br> At Shophear, we understand the challenges faced by those with visual impairments when navigating online platforms. That's why we've integrated cutting-edge speech recognition technology into our website. This innovative feature allows our customers to navigate through our collection of fashion glasses, read product descriptions, and complete their purchase using voice commands. With speech recognition, browsing our website is not only convenient but also reduces eye strain, making the shopping experience more comfortable and enjoyable.
          <br><br> Our commitment to accessibility extends beyond technology. We offer a wide range of fashionable glasses designed to suit diverse styles and preferences. Whether you're looking for trendy frames, classic designs, or specialized eyewear, Shophear has something for everyone. Our team is dedicated to providing personalized assistance and support to ensure that every customer finds the perfect pair of glasses that not only enhances their style but also complements their lifestyle.
          <br><br> Join us at Shophear and discover a world where fashion and accessibility converge. Experience the convenience of speech recognition technology while exploring our exquisite collection of fashion glasses. Together, let's redefine the way individuals with visual impairments shop for eyewear, making accessibility and style accessible to all.</p>
      </div>
    </section>
    

    <!-- Why Buy Section -->
    <section class="invisible-bg">
      <div class="section-title">
        <h2>Why ShopHear?</h2>
      </div>
      <div class="section-content">
        <p>When it comes to finding the perfect blend of accessibility and style, Shophear stands out as the ideal destination. Our name, Shophear, encapsulates our core values and unique offerings that set us apart in the world of fashion glasses and accessibility solutions.
          <br><br>
          First and foremost, Shophear is dedicated to inclusivity. We understand that individuals with visual impairments face unique challenges when it comes to shopping for eyewear. That's why we have curated a collection of fashion glasses that not only elevate your style but also prioritize comfort and functionality. From trendy frames to classic designs, our range ensures that everyone can find glasses that suit their personality and needs.
          <br><br>
          What truly sets Shophear apart is our commitment to accessibility innovation. We recognize the importance of making online shopping a seamless experience for individuals with visual impairments. That's why we have integrated state-of-the-art speech recognition technology into our website. This groundbreaking feature allows users to navigate our site, explore product details, and make purchases using simple voice commands. By harnessing the power of speech recognition, we empower our customers to shop independently and effortlessly, without straining their eyes.
          <br><br>
          Moreover, at Shophear, we believe in personalized support and assistance. Our team is dedicated to providing exceptional customer service, ensuring that every individual receives the guidance and information they need to make informed choices. Whether it's finding the right pair of glasses or understanding how our accessibility features work, we are here to help every step of the way.
          <br><br>
          Choosing Shophear means embracing a new era of accessibility and style. It means joining a community that values inclusivity, innovation, and customer satisfaction above all else. With Shophear, you can shop with confidence, knowing that your needs are our top priority and that you're part of a movement towards a more accessible and inclusive world.</p>
      </div>
    </section>

    <!-- The Team Section -->
    <section class="invisible-bg">
      <div class="section-title">
        <h2>The Team</h2>
      </div>
      <div class="section-content">
        <div class="row">
          <div class="col-md-4 team-member">
            <img src="milacute.jpg" alt="Team Member 1">
            <h4>Ma. Milagros E. Abadinas</h4>
            <p>Role: Designer</p>
          </div>
          <div class="col-md-4 team-member">
            <img src="lloyd.jpg" alt="Team Member 2">
            <h4>Lloyd Aldrich A. Angara</h4>
            <p>Role: Developer</p>
          </div>
          <div class="col-md-4 team-member">
            <img src="rubymain.png" alt="Team Member 3">
            <h4>Ruby Ann A. Amate</h4>
            <p>Role: Marketing</p>
          </div>
        </div>
      </div>
    </section>
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