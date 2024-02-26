<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

  
   <link rel="stylesheet" href="css/style.css">

   
   <style>
      body {
         background-image: url('images/s.gif'); 
         background-size: cover;
         background-position: center;
         background-repeat: no-repeat;
         height: 100vh; 
         margin: 0; 
         display: flex;
         align-items: center;
         justify-content: center;
      }

      
      .form-container {
         min-height: 10vh;
         padding: 0px;
         border-radius: 10px;
         background-color: rgba(255, 255, 255, 0.2);
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
         text-align: center;
         width: 500px;
         
         
   
      }
   </style>

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>CSS MONITORING SYSTEM</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="Email" class="box" required>
      <input type="password" name="password" placeholder="Password" class="box" required>
      <input type="submit" name="submit" value="Login" class="btn">
      <p>Don't Have An Account? <a href="register.php">Sign Up</a></p>
   </form>

</div>

</body>
</html>


</body>
</html>