<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Belleful/dashboard.com</title>
  <link rel="stylesheet" href="general.css">

  <style>
    .footer {
      background: var(--header-bg);
      color: rgb(255, 255, 255);
      margin-top: 40px;
      min-height: 200px;
      text-transform: uppercase;

      position: relative;
      z-index: 99;
    }

    .footer-upper {
      display: flex;
      justify-content: space-between;
      padding: 30px;
    }

    .footer-down {
      text-align: center;
      padding: 30px;
    }

    .nav-right .wel-msg {
      display: flex;
      align-items: center;
      gap: 10px;
      color: #fff;
      width: 200px;
      background: red;
    }

    .sidebar {
      position: fixed;
      top: 82px;
      left: 0;
      bottom: 0;
      background: var(--header-bg);
      width: 15%;
      color: #fff;
      text-align: center;
    }

    .sidebar .sidebar-dept {
      padding: 15px 20px;
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .sidebar-dept.active {
      background: rgba(0, 0, 0, 1);
    }

    .sidebar-dept:hover {
      background: rgba(0, 0, 0, 0.2);
      transition: all 0.3s;
    }

    .sidebar button {
      margin-block: 10px;
      padding: 5px 15px;
      border: none;
      outline: none;
      color: red;
      background: none;
    }

    .sidebar button:hover {
      background: rgb(223, 135, 135);
      transition: all 0.3s;
    }

    main {
      margin: 100px 15px 0 300px;
    }

    .main-cointent {
      background: #fff;
      color: black;
      padding: 15px;
      border-radius: 5px;
      box-shadow: 3px 3px 8px rgb(0, 0, 0), -3px -3px 8px black;
      min-height: 80vh;
    }

    .main-cointent h2 {
      padding-bottom: 15px;
    }

    .customer-details {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(47%, 1fr));
      gap: 20px;
      padding-top: 20px;
    }

    .customer-details > div {
      border: 1px solid grey;
      border-radius: 5px;
    }

    .customer-details > div p {
      padding: 15px;
    }

    .customer-details > div p:first-child {
      font-weight: 600;
      font-size: 18px;
    }

    .social-media p,
    .payment-method p {
      margin-bottom: 10px;
    }

    .social-media a img,
    .payment-method a img {
      background: white;
      border-radius: 50%;
      margin-left: 5px;
    }
  </style>
</head>
<body>
  <header>
    <nav class="navbar">
      <a href="products.php"><h1><i>BelleFull</i></h1></a>

      <ul>
        <li><a href="./products.php">Home</a></li>
        <li><a href="./dashboard.php">Dashboard</a></li>
        <li><a href="./about.php">About</a></li>
        <li><a href="./features.php">Features</a></li>
        <li><a href="./contact.php">Contact Us</a></li>
      </ul>

      <div class="nav-right">
        <!--<p>Welcome 
          <?php
            $email = $_POST["fullname"];
            echo $email; 
          ?></p> -->

          <div class="cart-con">
            <a href="./cart.php"><img src="../assets/cart.png" alt="cart"></a>
            <p class="cart-count"><?php 
              echo $cartCount = "";
            ?></p>
          </div>
        
        <a href="./login.php">Sign out</a>
      </div>
    </nav>
  </header>

  <div class="sidebar">
    <div class="sidebar-dept active">
      <img src="../assets/person.png" alt="">
      <span>My Jumia Account</span>
    </div>

    <div class="sidebar-dept">
      <img src="../assets/order.png" alt="">
      <span>Orders</span>
    </div>

    <div class="sidebar-dept">
      <img src="../assets/inbox.png" alt="">
      <span>Inbox</span>
    </div>

    <div class="sidebar-dept">
      <img src="../assets/reviews.png" alt="">
      <span>Pending Reviews</span>
    </div>

    <div class="sidebar-dept">
      <img src="../assets/voucher.png" alt="">
      <span>Voucher</span>
    </div>

    <div class="sidebar-dept">
      <img src="../assets/favorite.png" alt="">
      <span>Favorite</span>
    </div>

    <div class="sidebar-dept">
      <img src="../assets/sellers.png" alt="">
      <span>Followed Sellers</span>
    </div>

    <div class="sidebar-dept">
      <img src="../assets/recently.png" alt="">
      <span>Recently viewed</span>
    </div>

    <hr>

    <div class="sidebar-dept">
      <span>Account Management</span>
    </div>

    <div class="sidebar-dept">
      <span>Payment Settings</span>
    </div>

    <div class="sidebar-dept">
      <span>Address Book</span>
    </div>

    <div class="sidebar-dept">
      <span>Newsletter Preferences</span>
    </div>

    <div class="sidebar-dept">
      <span>Close Account</span>
    </div>

    <hr>

    <button>Logout</button>
  </div>
  
  <main>
    <div class="main-cointent">
      <h2>Account Overview</h2>

      <hr>

      <div class="customer-details">
        <div class="account-details">
          <p>Account Details</p>
          <hr>
          <p>Temitope Adeoye</p>
          <p>temitopeadeoye787898@gmail.com</p>
        </div>

        <div class="address-box">
          <p>Bellefull Credit</p>
          <hr>
          <p>Bellefull store credit balance: ₦ 0
        </div>

        <div class="credit-score">
          <p>Address Book</p>
          <hr>
          <p>Your default shipping address:</p>

          <p>No default shipping address available.</p>

          <a>Add default address</a>
        </div>

        <div class="newsletter">
          <p>Newsletter preferences</p>
          <hr>
          <p>Manage your email communications to stay updated with the latest news and offers.</p>

          <p>Edit Newsletter preferences</p>
        </div>
      </div>
    </div>

    <div class="footer">
      <div class="footer-upper">
        <div class="social-media">
          <p>Join us on</p>
          
          <a href="facebook.com"><img src="../assets/facebook.png" alt=""></a>
          <a href="instagram.com"><img src="../assets/instagram.png" alt=""></a>
          <a href="x.com"><img src="../assets/twitter.png" alt=""></a>
          <a href="tiktok.com"><img src="../assets/tiktok.png" alt=""></a>
          <a href="youtube.com"><img src="../assets/youtube.png" alt=""></a>
        </div>

        <div class="payment-method">
          <p>PAYMENT METHODS & DELIVERY PARTNERS</p>

          <a href=""><img src="../assets/mastercard.png" alt=""></a>
          <a href="instagram.com"><img src="../assets/paypal.png" alt=""></a>
          <a href="x.com"><img src="../assets/visa.png" alt=""></a>
        </div>
      </div>

      <hr>

      <div class="footer-down">
        Designed by FRANK © 2025 <i style="font-weight: 600;">BelleFull</i>
      </div>
    </div>
  </div>
</body>
</html>