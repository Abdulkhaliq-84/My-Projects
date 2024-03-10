<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['beanId'])) {
    // Establish database connection
    $conn = new mysqli('localhost', 'root', '', 'coffe');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize the input
    $beanId = mysqli_real_escape_string($conn, $_GET['beanId']);

    // Prepare SQL statement to fetch bean details
    $sql = "SELECT beans, roastery, country, region FROM beans WHERE id = '$beanId'";

    // Execute SQL statement
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the bean details as an associative array
        $row = $result->fetch_assoc();

        // Return the bean details as JSON
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'Bean not found'));
    }

    $conn->close();
}
?>
