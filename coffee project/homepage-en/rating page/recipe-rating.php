<!DOCTYPE html>

<html>
  <head>
    <title>Recipe Rating page</title>
    <link rel="stylesheet" href="rating.css">
    <link rel="stylesheet" href="/homepage-en/homepage.css">
    
    <link rel="stylesheet" href="/homepage-en/my account tab/sign-up.css">
    <link rel="stylesheet" href="/homepage-en/my account tab/sign-in.css">
    <link rel="stylesheet" href="/homepage-en/rating page/recipe-rating.css">

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
            <a class="menu-text" href="/homepage-en/rating page/rating.php?username=
            
            <?php

            $username = $_GET["username"];

            echo $username;

            ?>
            
            
            ">Rating</a>
          </div>
        </div>

        <div class="myaccount-container  myacount-hoviring">
          <p class="menu-text">

          <?php

            $username = $_GET["username"];

            echo $username;

          ?>





          </p>
            <img class="icon-list" src="chevron.png" alt="">

            <div class="myaccount-border">

              <div class="myaccount-items">
                <a class="recipes-text" href="/homepage-en/homepage.html">Sign out</a>
              </div>

             

            </div>

        </div>
        
      </div>
           
  
            
  
          </div>

    <?php

    $id = $_GET["id"];

      $sql = "SELECT * FROM recipes WHERE id = $id ";
      $result = mysqli_query($conn,$sql);

      $recipes = array();

      while ($row = mysqli_fetch_assoc($result)) {
        $recipes[] = $row;
      }

     ?>

      <?php

      $id = $_GET["id"];

        $sql1 = "SELECT * FROM rating WHERE id = $id ";
        $result1 = mysqli_query($conn,$sql1);

        $recipes1 = array();

        while ($row1 = mysqli_fetch_assoc($result1)) {
          $recipes1[] = $row1;
        }

      ?>

        <?php

        $id = $_GET["id"];

          $sql4 = "SELECT * FROM comment WHERE id = $id ";
          $result4 = mysqli_query($conn,$sql4);

          $comment = array();

          while ($row4 = mysqli_fetch_assoc($result4)) {
            $comment[] = $row4;
          }

        ?>





    <div class="container-log-in">

    
      <?php

      $id2 ;

      foreach ($recipes as $recipe) {

        $id2 = $recipe["id"];

        echo
        
        '
        
        <div>
      <table id="coffeeTable">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Wamount</th>
                  <th>Camount</th>
                  <th>Ratio</th>
                  <th>Tool</th>
                  <th>Temperature</th>
                  <th>Grind Clicks</th>
                  <th>Elapsed Time</th>
                  <th>Coffee Beans</th>
                  <th>Coffee Grinder</th>
              </tr>
  
              <tr>

                <td>
                  
                  '.$recipe["id"].'
                   
                </td>

                <td>
                  
                '.$recipe["Wamount"].'
                 
                </td>

                <td>
                  
                '.$recipe["Camount"].'
                 
                </td>

                <td>
                  
                '.$recipe["Ratio"].'
                 
                </td>

                <td>
                  
                '.$recipe["tool"].'
                 
                </td>

                <td>
                  
                '.$recipe["Temperature"].'
                 
                </td>

                <td>
                  
                '.$recipe["grindClicks"].'
                 
                </td>

                <td>
                  
                '.$recipe["extime"].'
                 
                </td>

                <td>
                  
                '.$recipe["cBeans"].'
                 
                </td>

                <td>
                  
                '.$recipe["cGrinder"].'
                 
                </td>




               
              </tr>
              
          </thead>
          <tbody>
             
          </tbody>
      </table>
      
        
        
        
        
        
        ';
      }

       ?>


     

      



  
  <div>
<table id="coffeeTable1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Rate</th>
            
        </tr>

        <tr>
          

          <td>
            
            <?php

            foreach ($recipes1 as $recipe1) {
               echo $recipe1["id"];
               echo "<br>";
               echo "<br>";
               
            }

            ?>
             
          </td>

          <td>
            
          <?php

            foreach ($recipes1 as $recipe1) {
               echo $recipe1["username"];
               echo "<br>";
               echo "<br>";
               
            }

            ?>
           
          </td>

          <td>

          
            
          <?php

            foreach ($recipes1 as $recipe1) {
             // echo $recipe1["rate"];

             if($recipe1["rate"]=== "1")
             {
              echo '<img class = "stars" src="/images/rating-10.png" alt="">';
             }
             else if($recipe1['rate']=== "2")
             {
              echo '<img class = "stars" src="/images/rating-20.png" alt="">';
             }
             else if($recipe1["rate"]=== "3")
             {
              echo '<img class = "stars" src="/images/rating-30.png" alt="">';
             }
             else if($recipe1['rate']=== "4")
             {
              echo '<img class = "stars" src="/images/rating-40.png" alt="">';
             }
             else if($recipe1["rate"]=== "5")
             {
              echo '<img class = "stars" src="/images/rating-50.png" alt="">';
             }
             
              
              echo "<br>";
              echo "<br>";

              
            }

            ?>
           
          </td>

         


         
        </tr>
        
    </thead>
    <tbody>
       
    </tbody>
</table>

         

        
         

          <label  for="">Select Rate</label>

          <form action="/homepage-en/rating page/process.php" method="get">

            

      
            
            <?php

            echo '<input type="text" class="input-hidden" value="'.$username.'" readonly="readonly" name="username"  > ';
            echo '<input type="text"  class="input-hidden" value="'.$id.'" readonly="readonly" name="id"  > ';
            

            ?>

            <div class = "flexbox1">

            <div class= "test">
            <input class="buttons" type="submit" value="1" name="bit">
            <div class = "test2">
            <img class="star" src="/images/rating-10.png" alt="">
            </div>
            </div>

            <div class= "test">
            <input class="buttons" type="submit" value="2" name="bit">
            <div class = "test2">
            <img class="star" src="/images/rating-20.png" alt="">
            </div>
            </div>

            <div class= "test">
            <input class="buttons" type="submit" value="3" name="bit">
            <div class = "test2">
            <img class="star" src="/images/rating-30.png" alt="">
            </div>
            </div>

            <div class= "test">
            <input class="buttons" type="submit" value="4" name="bit">
            <div class = "test2">
            <img class="star" src="/images/rating-40.png" alt="">
            </div>
            </div>

            <div class= "test">
            <input class="buttons" type="submit" value="5" name="bit">
            <div class = "test2">
            <img class="star" src="/images/rating-50.png" alt="">
            </div>
            </div>

            </div>
             
            
            

            <div>

          

                <div class="labelCon">
                <label class="label-comment" for="comment">Add Comment</label>
                </div>

                <div class="label-input-con">
                <input type="text" name="comment" class="label-input" placeholder="Add Your Comment">

                </div>

                <div class="button-comment-con">
                <input class="buttons" type="submit" name="add-comment" value="Add Comment" >

                </div>

            

          
   

          </div>

          </form>

          



          <div>


          <table class="comment-table">
            <tr class ="comment-row">
                <th class = "comment-header">
                   Username
                </th>

                <th>
                   Comment
                </th>
            </tr>


         <?php

        foreach ($comment as $comment1) {

          echo
          '
                <tr>

                <td>
                  '.$comment1["username"].'
                </td>

                <td>
                '.$comment1["comm"].'
                </td>


                </tr>
          ';
          
        }

        ?>

          

           
            
                       
        </table>



          </div>

          

           

            
      
            

            

            

      </div>

      
      

  
  
  
  
  
  
      




      

       
    </div>


  
</body>





    




  

    
    

