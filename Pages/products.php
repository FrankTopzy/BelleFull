<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Belleful.com/dashboard</title>
  <link rel="stylesheet" href="general.css">
  <?php 
    include '../Services/connection.php'; 
    $con = openCon();
  ?>
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
  </style>
</head>
<body>
  <div class="goods-page">
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

    <div class="search-con">
      <div>
        <input type="search" placeholder="Search Products...................">
        <button class="search-btn"><img src="../assets/search-icon.png" alt=""></button>
      </div>
    </div>

    <?php
      session_start();

      $sql = "SELECT * FROM items_list";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
          echo "<div class='items-container'>";

            while($row = $result->fetch_assoc()) {
              echo "<div class='item'>";
              
                echo "<input type='image' name='product' src='../" . $row["image"] . "' alt='" . $row["item_name"] . "' width='400px'>";

                echo "<div class='item-details'>";
                  echo "<p>" . $row["item_name"] . "</p>";
                  echo "<p>Price: ₦" . number_format($row['price'], 2) . "</p>";

                  //invincible
                  echo'<form method="post" style="padding: 0; width: fit-content; background: none;">';
                    echo'<input type="hidden" name="product_id" value=' . $row["id"] . '>';
                    echo'<input type="hidden" name="product_image" value=' . $row["image"] . '>';
                    echo'<input type="hidden" name="product_name" value=' . $row["item_name"] . '>';
                    echo'<input type="hidden" name="price" value=' . $row["price"] . '>';
                    echo'<input type="hidden" name="quantity" value="1">';
                    echo'<button name="add_to_cart">Add to Cart</button>';
                  echo'</form>';
                  //echo "<button>Add to Cart</button>";
                echo "</div>";

              echo "</div>";
            }
          echo "</div>";
      } else {
          echo "No products found.";
      }

  
      if (isset($_POST['add_to_cart'])) {
        $item = [
            'id' => $_POST['product_id'],
            'image' => $_POST['product_image'],
            'name' => $_POST['product_name'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity']
        ];

        // If cart doesn't exist, create it
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }


        // Check if item already in cart
        $found = false;
        foreach ($_SESSION['cart'] as &$cartItem) {
            if ($cartItem['id'] == $item['id']) {
                $cartItem['quantity'] += $item['quantity'];
                $found = true;
                break;
            }
        }
        unset($cartItem); // break reference

        // If not found, add new item
        if (!$found) {
            $_SESSION['cart'][] = $item;
        }

        $cartCount = count($_SESSION['cart']);

        //header("Location: " . $_SERVER["PHP_SELF"]);
        exit;
      }
    ?>

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
</body>
</html>