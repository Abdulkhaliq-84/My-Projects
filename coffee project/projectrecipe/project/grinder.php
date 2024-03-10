<!DOCTYPE html>
<html>

<head>
    <title>Add Grinder</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cGrinder = $_POST["cGrinder"];
        $cGrinder = htmlspecialchars(trim($cGrinder));
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'coffee';
        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $insertQuery = "INSERT INTO grinder () VALUES ('$cGrinder')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "Grinder added successfully!";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
        $conn->close();
    }
    ?>
    <h2>Add Grinder</h2>
    <form action="" method="post">
        <label for="cGrinder">Grinder Name:</label>
        <input type="text" name="cGrinder" required>
        <br>
        <input type="submit" value="Add Grinder">
    </form>
</body>
<a href="homepage.html">Go back home</a><br/>
<a href="ViewRecipe.php">Go back to Recipes</a>

</html>
