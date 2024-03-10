<!DOCTYPE html>

<html>
  <head>
    <title>Rating page</title>
    <link rel="stylesheet" href="rating.css">
    <link rel="stylesheet" href="/homepage-en/homepage.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Rubik:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
  </head>

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
    
    <div class="menubar">

      <div class="main-bar">
        <div class="menu-items">
          <a class="menu-text" href="/homepage-en/homepage1.php?&username=
          
          <?php

            $username = $_GET["username"];

            echo $username;

          ?>
          
          ">Home</a>
        </div>

        <div class="menu-items recipes-drop-list">

        <a class="menu-text" href="/projectrecipe/project/ViewRecipe.php">Recipes</a>


          </div>

          <div class="menu-items">
          <a class="menu-text" href="/beans/beans/beans.php">Beans</a>
        </div>

        <div class="menu-items">
          <a class="menu-text" href="">Rating</a>
        </div>


        </div>

        

      <div class="myaccount-container  myacount-hoviring">
        <p class="menu-text">

        <?php 

            
          $username = $_GET["username"];

          echo $username;
            
            

          ?>


        
          <img class="icon-list" src="/homepage-en/chevron.png" alt="">

          <div class="myaccount-border">

          <div class="myaccount-items">
              <a class="recipes-text" href="/homepage-en/homepage.html">Sign Out</a>
            </div>

          </div>

      </div>
      
    </div>

    
    


    <?php

     $sql = "SELECT * FROM recipes";
      $result = mysqli_query($conn,$sql);

      $recipes = array();

      while ($row = mysqli_fetch_assoc($result)) {
        $recipes[] = $row;
      }

     


    ?>

    <div class="recipes-container-main">
     

    <?php

    $username = $_GET["username"];

  foreach ($recipes as $recipe) 
  {

  echo
  
   '
  
   <a href="/homepage-en/rating page/recipe-rating.php?id='. $recipe["id"].'&username='.$username.'">

   <div class="recipe-container">

   <div class="recipe-name-div">
    <p class="recipe-name"> Recipe id : '.$recipe["id"].'</p>
   </div>

   <div class="recipe-information">
    <p class="username-recipe"> Recipe Grinder : '.$recipe["cGrinder"].'</p>
   <p class="bean-name"> Recipe Bean : '.$recipe["cBeans"].'</p>
   
   </div>
   
  </div>
        
   </a>
   
  
      ';



    }




     ?>

      

      
    </div>

    

    <script>
      // When the user clicks on <div>, open the popup
      function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
      }
      </script>


  </body>
</html>