<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'coffee';
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];
    $searchQuery = "SELECT * FROM recipes 
                    WHERE id LIKE ? 
                    OR cBeans LIKE ? 
                    OR tool LIKE ? 
                    OR cGrinder LIKE ?";
    $stmt = $conn->prepare($searchQuery);
    $searchTerm = '%' . $searchTerm . '%';
    $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table>
                <thead>
                    <tr>
                        <th>Recipe ID</th>
                        <th>Water Amount (ml)</th>
                        <th>Coffee Amount (grams)</th>
                        <th>Ratio</th>
                        <th>Brewing Tool</th>
                        <th>Temperature</th>
                        <th>Grind Clicks</th>
                        <th>Extraction Time</th>
                        <th>Grinder</th>
                        <th>Coffee Beans</th>
                    </tr>
                </thead>
                <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['Wamount']}</td>";
            echo "<td>{$row['Camount']}</td>";
            echo "<td>{$row['Ratio']}</td>";
            echo "<td>{$row['tool']}</td>";
            echo "<td>{$row['Temperature']}</td>";
            echo "<td>{$row['grindClicks']}</td>";
            echo "<td>{$row['extime']}</td>";
            echo "<td>{$row['cGrinder']}</td>";
            echo "<td>{$row['cBeans']}</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No results found.";
    }

    $stmt->close();
} else {
    echo "Search term not provided.";
}

$conn->close();
?>
