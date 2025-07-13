<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Belleful.com/cart</title>
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

    .navbar {
      z-index: 200;
    }
  </style>
</head>
<body>
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

    <h2 style="padding-inline: 2%; margin-top: 100px; color: #fff;">Your Shopping Cart</h2>

    <div class="cart-con" style='min-height: 80vh;'>
        <?php
      session_start();
      ?>

      <?php
      if (!empty($_SESSION['cart'])):
          $total = 0;
          echo "<table cellpadding='50'>";
          echo "<tr class='table-heading'><th></th><th>Item</th><th>Quantity</th><th>Price</th><th>Subtotal</th></tr>";

          foreach ($_SESSION['cart'] as $item):
              $subtotal = $item['price'] * $item['quantity'];
              $total += $subtotal;
              $tax = $total * 0.02;
              $shippinFee = $total * 0.2;
              $totalFinal = $total + $tax + $shippinFee;
              ?>
              <tr class="table-cell">
                  <td><img src="../<?= htmlspecialchars($item['image']) ?>" alt="Image" width="250px"></td>
                  <td><?= htmlspecialchars($item['name']) ?></td>
                  <td><?= (int)$item['quantity'] ?></td>
                  <td>₦<?= number_format($item['price'], 2) ?></td>
                  <td>₦<?= number_format($subtotal, 2) ?></td>
                  <td>
                    <form method="post" action="" style="display:inline;">
                        <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                        <button type="submit" name="remove" class="remove-btn">Remove</button>
                    </form>
                  </td>
              </tr>

              <?php 
                if (isset($_POST['remove']) && isset($_POST['product_id'])) {
                  $productId = $_POST['product_id'];
              
                  foreach ($_SESSION['cart'] as $index => $item) {
                      if ($item['id'] == $productId) {
                          unset($_SESSION['cart'][$index]);
                          break;
                      }
                  }
              
                  // Re-index the array
                  $_SESSION['cart'] = array_values($_SESSION['cart']);
                  header("Location: " . $_SERVER["PHP_SELF"]);
              }
              ?>
                <?php
                endforeach;

                    echo "</table>";
                ?>

                <div class="checkout">
                    <h2>Cart Totals</h2>

                    <form action="">
                      <p>Subtotal: <span>₦ <?= number_format($total, 2) ?></span></p>
                      <p>Shippin fee: <span>₦ <?= number_format($shippinFee, 2) ?></span></p>
                      <p>Sales Tax: <span>₦ <?= number_format($tax, 2) ?></span></p>

                      <hr>

                      <p id="total-payment">Total: <span>₦ <?= $totalFinal ?>.00</span></p>
                      <button id="pay-btn"><img src="../assets/checkout.png" alt="">Make Payment</button>
                    </form>
                </div>
                <?php
                        else:
                            echo "<p>Your cart is empty.</p>";
                        endif;
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
    
<script src="https://js.paystack.co/v2/inline.js"></script>
<script>
  const payBtn = document.querySelector("#pay-btn");
  const totalPayment = document.querySelector("#total-payment");
  const amount = totalPayment.textContent.split(' ')[2];
  console.log(amount)
  
  payBtn.addEventListener('click', payWithPaystack);

  function payWithPaystack(e) {
    e.preventDefault();

    const paystack = new PaystackPop();
    paystack.newTransaction({
      key: 'pk_test_121ab5224a448cb4e14fa0f424ea80b7bb996427',
      email: 'customer@example.com',
      amount: Number(amount) * 100,
      onSuccess: (transaction) => {
        console.log('Payment successful:', transaction);
        // Your success logic here
      },
      onCancel: () => {
        console.log('Payment cancelled');
        // Your cancel logic here
      },
      onError: (error) => {
        console.error('Payment error:', error.message);
        // Your error handling here
      }
    });
  }
</script>
</body>
</html>