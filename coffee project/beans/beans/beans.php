
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your external CSS file -->
    <title>Coffee Bean Management</title>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Bean Management</title>
    <style>
    
    </style>
</head>
<body>
<div class="banner">
    <div class="banner-content">
        <h1>Coffee Bean Management</h1>
        <p>Explore and manage your coffee beans.</p>
    </div>
</div>
<form id='tabelBean'>
<fieldset>
<legend>View Coffee Bean</legend> <!-- Table for displaying beans -->
    <table id="beansTable">
        <!-- Table header -->
        <thead>
            <tr>
                <th>ID</th>
                <th>Beans</th>
                <th>Roastery</th>
                <th>Country</th>
                <th>Region</th>
            </tr>
        </thead>
        <!-- Table body -->
        <tbody id="beansTableBody">
            <!-- Data will be loaded here dynamically -->
              <!-- PHP code to fetch all data by default -->
        <?php
            $conn = new mysqli('localhost', 'root', '', 'coffee');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, beans, roastery, country, region FROM beans";

            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = $_GET['search'];
                $search = mysqli_real_escape_string($conn, $search);
                $sql .= " WHERE beans LIKE '%$search%' OR roastery LIKE '%$search%' OR country LIKE '%$search%' OR region LIKE '%$search%'";
            }

            $result = $conn->query($sql);

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
                echo "<tr><td colspan='5'>No data available</td></tr>";
            }

            $conn->close();
        ?>
        </tbody>
    </table>
    
    <form id="searchBeanForm" method="GET">
    <input type="text" id="searchInput" name="search" placeholder="Search for beans...">
    <button type="submit" id="searchButton">Search</button>
    <label for="showMyBeansCheckbox">Show My Beans</label>
    <input type="checkbox" id="showMyBeansCheckbox">
        </fieldset>
</form>

</form>

    <form id="addBeanForm">
    <fieldset>
        <legend>Add New Coffee Bean</legend>
        <!-- Input fields for adding a new bean -->
        <label for="bname">Beans Name:</label>
        <input type="text" id="bname" name="bname" placeholder="Enter beans name">

        <label for="rname">Roaster Name:</label>
        <input type="text" id="rname" name="rname" placeholder="Enter roaster name">

        <label for="cname">Country Name:</label>
        <input type="text" id="cname" name="cname" placeholder="Enter country name">

        <label for="pname">Beans Process:</label>
        <input type="text" id="pname" name="pname" placeholder="Enter beans process">

        <!-- Submit button without a form action -->
        <input type="button" onclick="addNewBean()" value="Submit">
        <input type="reset" value="Cancel">
    </fieldset>
</form>
</form>
    <!-- Form for searching beans
     Form for updating or deleting beans -->
    <form id="updateDeleteForm">
        <fieldset>
            <legend>Update or Delete Coffee Bean</legend>
            <label for="beanId">Bean ID:</label>
            <input type="text" id="beanId" name="beanId" placeholder="Enter Bean ID">

            <label for="pnameUpdate">New Beans Name (for update):</label>
            <input type="text" id="pnameUpdate" name="pnameUpdate" placeholder="New Beans Name">

            <input type="button" onclick="updateBean()" value="Update">
            <input type="button" onclick="deleteBean()" value="Delete">
        </fieldset>
    </form>

<!-- Script for AJAX operations -->
<script>
    
    function updateTable() {
    var searchValue = document.getElementById('searchInput').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("beansTableBody").innerHTML = this.responseText;
        }
    };

    if (searchValue.trim() === null) {
        // If the search is empty, fetch all data
        xhttp.open("GET", "fetch_data.php", true);
    } else {
        // If there's a search term, fetch data based on the search
        xhttp.open("GET", "fetch_data.php?search=" + searchValue, true);
    }
    
    xhttp.send();
}
function deleteBean() {
    var beanId = document.getElementById('beanId').value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
            // Display a confirmation message for successful deletion
            alert("Bean with ID " + beanId + " has been deleted.");
        }
        updateTable(); // Update the table after deletion
    };
    
    xhttp.open("POST", "update_delete.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("deleteButton=true&beanId=" + beanId);
}
    function addNewBean() {
        var formData = new FormData(document.getElementById('addBeanForm'));
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                // After adding a new bean, update the table content
                updateTable();
                // Reset the form fields after successful addition
                document.getElementById('bname').value = ''; // Reset Beans Name
                document.getElementById('rname').value = ''; // Reset Roaster Name
                document.getElementById('cname').value = ''; // Reset Country Name
                document.getElementById('pname').value = ''; // Reset Beans Process
                alert("You have entered new beans!");
            }
        };
        xhttp.open("POST", "add_new_bean.php", true);
        xhttp.send(formData);
    }


    function updateBean() {
    var beanId = document.getElementById('beanId').value;
    var newBeanName = document.getElementById('pnameUpdate').value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
            // Display a confirmation message for successful update
            alert("Bean with ID " + beanId + " has been updated.");
        }
        updateTable();
    };

    xhttp.open("POST", "update_delete.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("updateButton=true&beanId=" + beanId + "&pnameUpdate=" + newBeanName);
}
    function searchBeans()
     {
       
    var searchValue = document.getElementById('searchInput').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("beansTableBody").innerHTML = this.responseText;
        }
    };

    // Check if the search value is empty, and fetch all data in that case
    if (searchValue.trim() === '') {
        updateTable(); // Fetch all data when the search is empty
    } else {
        var url = "fetch_data.php";
        // Check if the search value is numeric (for ID search)
        if (!isNaN(searchValue)) {
            url += "?search=" + searchValue;
        } else {
            url += "?search=" + encodeURIComponent(searchValue);
        }
        xhttp.open("GET", url, true);
        xhttp.send();
    }
}
function filterMyBeans() {
        var showMyBeans = document.getElementById('myBeansCheckbox').checked;

        var searchInput = document.getElementById('searchInput').value;
        var url = "fetch_data.php";

        if (searchInput.trim() !== '') {
            url += "?search=" + encodeURIComponent(searchInput);
        }

        // If 'Show My Beans' checkbox is checked, add a query parameter to filter the beans
        if (showMyBeans) {
            url += "&myBeans=true";
        }

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("beansTableBody").innerHTML = this.responseText;
            }
        };

        xhttp.open("GET", url, true);
        xhttp.send();
    }

        // Display all beans by default
        updateTable();

        // Add an event listener to the search input
        document.getElementById('searchInput').addEventListener('input', function() {
            searchBeans();
        });

    
</script>

</body>
</html>
