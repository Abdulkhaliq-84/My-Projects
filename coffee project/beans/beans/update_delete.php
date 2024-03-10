<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('localhost', 'root', '', 'coffe');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['updateButton'])) {
        // Update Bean
        $beanId = $_POST['beanId'];
        $newBeanName = $_POST['pnameUpdate'];

        $sql = "UPDATE beans SET beans = '$newBeanName' WHERE id = $beanId";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } elseif (isset($_POST['deleteButton'])) {
        // Delete Bean
        $beanId = $_POST['beanId'];

        $sql = "DELETE FROM beans WHERE id = $beanId";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    $conn->close();
}
?>
