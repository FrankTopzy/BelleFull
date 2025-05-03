<?php
  function openCon() {
      $dbhost = "localhost";
      $dbusername = "root";
      $dbpassword = "";
      $dbname = "bellefull_db";

      $con = null;
      
      try {
        $con = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
      } catch (mysqli_sql_exception) {
        echo "Could not connect";
      }
      
      /*if ($con->connect_error) {
          die("Connection failed: " . $con->connect_error);
      }*/
      
      return $con;
  }

  /*function closeCon($con) {
      $con->close();
  }

  if (isset($_FILES['image'])) {
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));

    // Insert image into database
    $query = "INSERT INTO items (image) VALUES ('$imgContent')";
    if (mysqli_query($conn, $query)) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error uploading image: " . mysqli_error($conn);
    }
  }

// Close connection
  mysqli_close($conn);*/

?>


