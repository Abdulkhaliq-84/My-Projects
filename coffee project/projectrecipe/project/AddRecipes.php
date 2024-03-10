<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'coffee';
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Wamount = $_POST['Wamount'];
    $Camount = $_POST['Camount'];
    $Ratio = $_POST['Ratio'];
    $tool = $_POST['tool'];
    $Temperature = $_POST['Temperature'];
    $grindClicks = $_POST['grindClicks'];
    $extime = $_POST['extime'];
    $cBeans = $_POST['cBeans'];
    $cGrinder = $_POST['cGrinder'];
    $stmt = $conn->prepare("INSERT INTO recipes (Wamount, Camount, Ratio, tool, Temperature, grindClicks, extime, cBeans, cGrinder) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiisiiiss", $Wamount, $Camount, $Ratio, $tool, $Temperature, $grindClicks, $extime, $cBeans, $cGrinder);
    
    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }


    $stmt->close();
}
?>
<br/>
<a href="homepage.html">Go back home</a><br/>
<a href="ViewRecipe.php">Go back to Recipes</a>

