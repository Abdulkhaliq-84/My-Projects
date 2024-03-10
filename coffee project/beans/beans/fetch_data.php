<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    // Establish database connection
    $conn = new mysqli('localhost', 'root', '', 'coffee');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize the search input
    $search = mysqli_real_escape_string($conn, $_GET['search']);

    // Prepare SQL statement to search for beans
    $sql = "SELECT id, beans, roastery, country, region FROM beans WHERE id LIKE '%$search%' OR beans LIKE '%$search%' OR roastery LIKE '%$search%' OR country LIKE '%$search%' OR region LIKE '%$search%'";


    // Execute SQL statement
    $result = $conn->query($sql);

    // Display fetched data as a table
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["beans"] . "</td>";
            echo "<td>" . $row["roastery"] . "</td>";
            echo "<td>" . $row["country"] . "</td>";
            echo "<td>" . $row["region"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>0 results</td></tr>";
    }
    $conn->close();
}
?>