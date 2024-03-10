<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'coffee';
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['recipeId'])) {
    $recipeId = $_POST['recipeId'];
    $deleteQuery = "DELETE FROM recipes WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $recipeId);

    if ($stmt->execute()) {
        echo "Recipe with ID $recipeId has been deleted successfully.";
    } else {
        echo "Error deleting recipe: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Recipe ID not provided.";
}

$conn->close();
?>
<br/>
<a href="homepage.html">Go back home</a><br/>
<a href="ViewRecipe.php">Go back to Recipes</a>
