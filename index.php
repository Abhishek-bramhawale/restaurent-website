<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" href="style1.css">


  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Rubik:wght@400;500;600;700&family=Shadows+Into+Light&display=swap"
    rel="stylesheet">

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet"/>

</head>

<body id="body">

 <?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

     <!-- 
        NAVIGATION_BAR
      -->
  <header class="header">
    <div class="container">

      <h1>
        <a id="logo" href="index.php">A1</a> <a id="logo1" href="index.php">Bites</a>
      </h1>

      <nav class="navbar">
        <ul class="navbar-list">

          <li>
            <a href="index.php" class="navbar-link">Home</a>
          </li>

          <li>
            <a href="menu.html" class="navbar-link">Menu</a>
          </li>

          <li class="">
            <a href="location.html" class="navbar-link">Location</a>
          </li>

          <li>
            <a href="index1.php" class="navbar-link">Blog</a>
          </li>

          <li>
            <a href="contactusform.html" class="navbar-link">Contact Us</a>
          </li>

        </ul>
      </nav>

      <div>
        <button onclick="openMenu()" class="btn btn-hover">Reservation for Event</button>
        </button>
      </div>

      <script>
        function openMenu() {
            window.location.href = "event.html";
        }
    </script>

    <div>
    <a href="index.php?logout=true">Logout</a>
    </div>

    <script>
      function openMenu() {
          window.location.href = "login.php";
      }
    </script>

    </div>
  </header>

  <main>
    <article>

       <!-- 
        - #HOMEPAGE IMAGE
      -->    
      <br><br><br>
      <div id="hp" class="homepg">
        <h1>For the love of delicious food</h1>
        <p class="second-text">Come with Family & Enjoy the Tasty food</p><br>
        <a href="menu.html" class="btn">Show Menu</a>
      </div><br>
      

      <!-- 
        - #BANNER
      -->

      <br><h2 id="banner-h2">SPECIAL OFFERS</h2>

      <section class="section section-divider gray banner">
        <div>



          <ul class="banner-list">

            <li class="banner-item banner-lg">
              <div class="banner-card">

                <img src="images/banner-6.jpg" width="550" height="450" class="banner-img">

                <div class="banner-item-content">
                  <p class="banner-subtitle">25% Off Now!</p>

                  <h3 class="banner-title">Discount For Delicious & Tasty Poha!</h3>

                  <p class="banner-text">Sale off 25% only this week</p><br>

                  <a href="menu.html" class="btn2">Show Menu</a>

                </div>

              </div>
            </li>

            <li class="banner-item banner-sm">
              <div class="banner-card">

                <img src="images/banner-2.jpg" width="550" height="465" loading="lazy" class="banner-img">

                <div class="banner-item-content">
                  <h3 class="banner-title">Delicious Pizza</h3>

                  <p class="banner-text">50% off Now</p>

                </div>

              </div>
            </li>

            <li class="banner-item banner-sm">
              <div class="banner-card">

                <img src="images/banner-3.jpg" width="550" height="465" loading="lazy" class="banner-img">

                <div class="banner-item-content">
                  <h3 class="banner-title">Awesome Burgers</h3>

                  <p class="banner-text">40% off Now</p>
                </div>

              </div>
            </li>

            <li class="banner-item banner-md">
              <div class="banner-card">

                <img src="images/banner-4.jpg" width="550" height="220" loading="lazy" class="banner-img">

                <div class="banner-item-content">
                  <h3 class="banner-title">Tasty Buzzed Pizza</h3>

                  <p class="banner-text">Sale off 35% only this week</p>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section><br><hr><hr>


      <!-- 
        - #MENU
      -->

      <section class="menu">
        <br><h2>TODAY'S SPECIAL</h2><br>
        <div class="menu-grid">
          <div class="menu-item">
            <img src="Menus/cheese sandwich.jpeg" alt="Dish 1">
            
            <h3>cheese sandwich</h3><span class="price">Rs. 60</span>
            <button onclick="alert('ADDED TO FAAVOURITES');" class="favorite-button">Add to Favorites</button>
          </div>
    
          <div class="menu-item">
            <img src="Menus/cheeseburger.jpg" alt="Dish 2">
            <h3>cheeseburger</h3> <span class="price">Rs. 120</span>
            <button onclick="alert('ADDED TO FAAVOURITES');" class="favorite-button">Add to Favorites</button>
          </div>
    
          <div class="menu-item">
            <img src="Menus/Margherita pizza.jpg" alt="Dish 10">
            <h3>Margherita pizza</h3> <span class="price">Rs. 150</span>
            <button onclick="alert('ADDED TO FAAVOURITES');" class="favorite-button">Add to Favorites</button>
          </div>
    
          <div class="menu-item">
            <img src="Menus/Mexican burger.jpg" alt="Dish 10">
            <h3>Mexican burger</h3> <span class="price">Rs. 60</span>
            <button onclick="alert('ADDED TO FAAVOURITES');" class="favorite-button">Add to Favorites</button>
          </div>
    
          <div class="menu-item">
            <img src="Menus/paneerpizza.jpg" alt="Dish 10">
            <h3>paneerpizza</h3> <span class="price">Rs. 80</span>
            <button onclick="alert('ADDED TO FAAVOURITES');" class="favorite-button">Add to Favorites</button>
          </div>
    
          <div class="menu-item">
            <img src="Menus/mixveg.jpeg" alt="Dish 10">
            <h3>mixveg</h3> <span class="price">Rs. 120</span>
            <button onclick="alert('ADDED TO FAAVOURITES');" class="favorite-button">Add to Favorites</button>
          </div>
        </div><BR><br><br>
          <a id="hp-menu-btn" href="menu.html">View Complete Menu</a><br><br><br><br><hr><hr>


       <!-- 
        - #EVENTS
      -->
      <section class="event">
        <br><br><h2>ORGANIZE YOUR EVENTS IN OUR RESTAURENT</h2><br>
        <div id="event-block">
          <a href="event.html" class="btn3">Registration for Event</a>
          
        </div><br><br><hr><hr>
          
        
      </section>

      <!-- 
        - #STRENTH
      -->

        <section class="our-strengths">
          <h2>OUR STRENGTH</h2><br>
          <div class="features-grid">
            <div class="feature">
              <img src="images/features-icon-1.png" alt="Strength 1 Icon">
              <h3>Hygienic Food</h3>
              <p>We implement strict hygiene practices to ensure your food is prepared and served in a safe and clean environment.</p>
            </div>
            <div class="feature">
              <img src="images/features-icon-2.png" alt="Strength 2 Icon">
              <h3>Fresh Environment</h3>
              <p>Get your delicious meal in a clean and vibrant environment.</p>
            </div>
            <div class="feature">
              <img src="images/features-icon-3.png" alt="Strength 3 Icon">
              <h3>Skilled Chefs</h3>
              <p>Our team of highly skilled chefs, with years of experience, brings their passion and expertise to every dish.</p>
            </div>
            <div class="feature">
              <img src="images/features-icon-4.png" alt="Strength 4 Icon">
              <h3>Event & Party</h3>
              <p>Host unforgettable events & parties</p>
            </div>
          </div>
        </section>

    </article>
  </main>

     <!-- 
        FOOTER
      -->

  <footer>

    <div class="footer-top" style="background-image: url('images/footer-illustaration.png')">
      <div class="container">

        <ul class="footer-list">
          <i class="bi bi-clock"></i>
          <li class="footer-list-title">Opening Hours</li>
          
          <li class="footer-list-item">Monday-Friday: 10AM to 10PM</li>

          <li class="footer-list-item">Tuesday closed</li>
          
          <li class="footer-list-item">Saturday: 10AM-8PM</li>
          
        </ul>

        <ul class="footer-list">
          <i class="bi bi-geo-alt"></i>
          <li class="footer-list-title">Address </li>

          <li>
            <address class="footer-list-item">Rajiv Gandhi Chowk, Near RJ Complex, Latur - 413 512</address>
          </li>

        </ul>

        <ul class="footer-list">
          <i class="bi bi-phone"></i>
          <li class="footer-list-title">Contact Info</li>

          <li class="footer-list-item">02382 778899</li>

          <li class="footer-list-item"></li>

        </ul>

        <ul class="footer-list">
          <i class="bi bi-envelope"></i>
          <li class="footer-list-title">Email Address </li>

          <li class="footer-list-item">a1bites@Gmail.com</li>

        </ul>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <p class="copyright-text">
          &copy; 2024 All Rights Reserved.
        </p>
      </div>
    </div>
  </footer>

</body>
</html>