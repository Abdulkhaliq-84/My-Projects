<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sbutton'])) {
    $conn = new mysqli('localhost', 'root', '', 'coffe');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $bname = $_POST['bname'];
    $rname = $_POST['rname'];
    $cname = $_POST['cname'];
    $pname = $_POST['pname'];

    $sql = "INSERT INTO beans (beans, roastery, country, region) VALUES ('$bname', '$rname', '$cname', '$pname')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
