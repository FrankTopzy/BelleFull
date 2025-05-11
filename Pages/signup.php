<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Belleful.com/signup</title>
  <link rel="stylesheet" href="general.css">

  <?php 
    include '../Services/connection.php';
    //$con = openCon();
    //mysqli_close($con);
    //closeCon($con); 
  ?>

</head>
<body>
  <form action="" method="POST" class="login-form">
    <h2>Sign Up</h2>

    <div class="input-container">
      <label for="fullname">Fullname</label>
      <input type="text" id="fullname" name="fullname">
    </div>

    <div class="input-container">
      <label for="email">Email</label>
      <input type="email" id="email" name="email">
    </div>

    <div class="input-container">
      <label for="password">Password</label>
      <input type="password" id="password" name="password">
    </div>

    <p>Already have an account? <a href="login.php">Login now</a></p>

    <div class="btn">
      <button type="submit" class="signup-btn" name="signup">Sign Up</button>
    </div>

    <p >
      <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($fullname) || empty($fullname) || empty($password)) {
              echo "<p class='error-msg' style='color:#772e2e; text-align: center;'>Please enter the correct info.</p>";
            } else {
              // Hash the password for security
              $password = password_hash($password, PASSWORD_DEFAULT);

            
              $sql = "INSERT INTO `users_list`(`fullname`, `email`, `password`) VALUES ('$fullname','$email','$password')";

              $con = openCon();

              try {
                if (mysqli_query($con, $sql)/*$con->query($sql) === TRUE*/) {
                  echo "Record inserted successfully";
                  header("Location: ./login.php");
                  exit();
                } else {
                    echo "Could not insert record: " . $con->error;
                }
              } catch (mysqli_sql_exception) {
                echo "<p class='error-msg' style='color:#772e2e; text-align: center;'>Email already used.</p>";
              }
              mysqli_close($con);
              //closeCon($con);
            }

        }
      ?>
    </p>
  </form>
</body>
</html>