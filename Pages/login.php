<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Belleful.com/login</title>
        <link rel="stylesheet" href="general.css">

        <?php 
            include '../Services/connection.php';
            $con = openCon();

            //mysqli_close($con);
            //closeCon($con);  //I can use this instead of line 13
        ?>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="login-form">
            <h2>Login</h2>
            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <p>Don't have an account yet? <a href="./signup.php">Sign Up now</a></p>

            <div class="btn">
                <button type="submit" class="login-btn">Login</button>
            </div>

            <?php
                /*if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $username = $_POST['email'];
                    $password = $_POST['password'];

                    if (empty($password) && empty($email)) {
                        echo "Please enter correct info.";
                    } else {
                        $con = openCon();

                        // Corrected query to prevent SQL injection and select correct columns
                        $query = "SELECT password, email FROM user_info WHERE email = '$email'";

                        $result = mysqli_query($con, $query);

                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                $userdata = mysqli_fetch_assoc($result);

                                // Compare passwords securely
                                if ($userdata['password'] == $password && $userdata['email'] == $email) {
                                    header("location: dashboard.php");
                                    die;
                                } else {
                                    echo "Bad credentials: " . mysqli_error($con);
                                }
                            } else {
                                echo "Bad credentials: " . mysqli_error($con);
                            }
                            mysqli_close($con);
                        }
                    }
                }*/

                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                
                    // Validate input fields
                    if (empty($email) || empty($password)) {
                        $error = "Please enter both email and password.";
                    } else {
                        try {
                            // Your authentication logic here
                            $con = openCon();
                            $query = "SELECT password FROM users_list WHERE email = ?";
                            $stmt = mysqli_prepare($con, $query);
                            mysqli_stmt_bind_param($stmt, "s", $email);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                    
                            if (mysqli_stmt_num_rows($stmt) > 0) {
                                mysqli_stmt_bind_result($stmt, $password);
                                mysqli_stmt_fetch($stmt);
                    
                                // Compare passwords securely
                                if ($password == $password) {
                                    // Redirect to dashboard upon successful authentication
                                    header("location: ./products.php");
                                    die;
                                } else {
                                    $error = "Invalid email or password.";
                                }
                            } else {
                                $error = "Invalid email or password.";
                            }
                    
                            mysqli_stmt_close($stmt);
                            mysqli_close($con);
                        } catch (mysqli_sql_exception) {
                            echo "";
                        }
                        
                    }
                }
            

            ?>

            <?php if (isset($error)) { ?>
                <p style="color: #772e2e; text-align: center;"><?php echo $error; ?></p>
            <?php } else { ?>
                <p style="color:rgb(52, 167, 71); text-align: center;"></p>
            <?php }?>
        </form>
    </body>
</html>