<!DOCTYPE html>

<html>

  <head>
    <link rel="stylesheet" href="sign-in.css">
    <link rel="stylesheet" href="sign-up.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Rubik:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">

    <title>Sign In</title>
  </head>

 

  <body>

  <?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'coffee';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());

 }

  ?>
    
    <div class="container-log-in">

      <form action="/homepage-en/my account tab/sign-in.php" method="post">
        <img class="sign-up-logo" src="sign-in.png" alt="">

        <div class="input-container">
          <label for="username">Username</label>
          <input class="input-style input-style-username" name="username" type="text" maxlength="12" minlength="3" required>
        </div>

        <div class="input-container">
          <label for="password">Password </label>
          <input class="input-style  input-style-password" name="pass" type="password" minlength="8"  required>
        </div>

        <div class="input-container">
          <a href="forget-password.php">Forget your password ?</a>
        </div>

        <div class="input-container">
        <input class="input-style input-style-button" name="signin" type="submit" value="Sign in">
   
        </div>

      </form>

    <?php

      if (isset($_POST["signin"])) 
    {
       
       $username = $_POST['username'];
       $pass= $_POST['pass'];
       
       try
       {

        $sql = "SELECT * FROM account WHERE username = '$username' AND pass = $pass";

        $result = mysqli_query($conn, $sql);
 
        if(mysqli_num_rows($result) === 1)
        {
         $row = mysqli_fetch_assoc($result);
          

         header("location:/homepage-en/homepage1.php?username= $username");
        }
        else
        {
          echo 'username or password in correct';
        }

        }
        catch(mysqli_sql_exception $e)
        {
          echo ''. $e->getMessage();
        }
     

    }


  ?>

     

    </div>

  </body>



</html>