<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Belleful.com/dashboard</title>
  <link rel="stylesheet" href="../../Styles/general.css">
  <?php 
    include '../../Services/connection.php'; 
    $con = openCon();
  ?>

  <style>  

    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
      margin: 0;
      box-sizing: border-box;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }
    
    a {
      text-decoration: none;
      color: #fff;
    }

    .goods-page {
      width: 100%;
      background: #0f2e47;
      color: #fff;
      padding:0 3% 30px;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      padding: 20px 3%;
      margin-bottom: 40px;
    }

    .navbar ul {
      list-style: none;
      display: flex;
      gap: 25px;
    }

    .navbar .nav-right {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .nav-right a:last-child:hover{
      text-decoration: underline;
    }

    .navbar div img {
      width: 30px;
    }

    .items-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
    }

    .item {
      background-color: #fff;
      color: black;
      overflow: hidden;
      border-radius: 5px;
      object-position: center;

      display: flex;
      flex-direction: column;
      object-position: center;
    }

    .item img {
      width: 100%;
      flex-basis: 90%;
      object-fit: cover;
    }

    .item > div {
      padding: 2% 4%;
    }
  </style>
</head>
<body>
  <div class="goods-page">
    <nav class="navbar">
      <a href="dashboard.php"><h1><i>BelleFull</i></h1></a>

      <ul>
        <a href="dashboard.php"><li>Dashboard</li></a>
        <li>About</li>
        <li>Features</li>
        <li>Contact Us</li>
      </ul>

      <div class="nav-right">
        <!--<p>Welcome 
          <?php
            $email = $_POST["fullname"];
            echo $email; 
          ?></p> -->
        <a href="../Pages/cart.php"><img src="../../assets/cart.png" alt="cart"></a>
        <a href="../Login/login.php">Sign out</a>
      </div>
    </nav>

    <?php
      $sql = "SELECT * FROM items_list";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
          echo "<div class='items-container'>";

            while($row = $result->fetch_assoc()) {
                echo "<div class='item'>";
                  echo "<img src='" . $row["image"] . "' alt='" . $row["item_name"] . "' width='400px'/>";

                  echo "<div class='item'>";
                    echo "<p>" . $row["item_name"] . "</p>";
                    echo "<p>Price: ₦". $row["price"] . "</p>";
                    echo "<button>Add to Cart</button>";
                  echo "</div>";

                echo "</div>";
          }
          echo "</div>";
      } else {
          echo "No products found.";
      }
    ?>
  </div>
</body>
</html>