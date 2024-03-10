<?php
// Your database connection and other necessary code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve other form data (beans, roastery, etc.)

    // Retrieve the rating
    $rating = $_POST['rating'];

    // Perform the database query to insert/update the rating for the new bean
    $sql = "INSERT INTO beans (beans, roastery, country, region, rating) 
            VALUES ('$beans', '$roastery', '$country', '$region', '$rating')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
