<?php
     $first_name = $_POST['first_name'];
     $second_name = $_POST['second_name'];
     $email = $_POST['email'];
     $location = $_POST['location'];

     if ($first_name == '' || $second_name == '' ||
     $email == '' || $location == '') {
          header("Location: index.php?error=Please%20Fill%20In%20All%20Fields");
     }
?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <title>User Profile</title>
</head>
<body>
     <div class="w3-card w3-margin w3-padding">
          <h2>User Profile</h2>
          <h3><?php echo $first_name?> <?php echo $second_name?></h3>
          <ul>
               <li>Email: <?php echo $email?></li>
               <li>Location: <?php echo $location?></li>
          </ul>
     </div>
</body>
</html>