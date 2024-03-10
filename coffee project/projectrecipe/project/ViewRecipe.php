<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="Addrecipe.css" />
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .testbox {
            border: 1px solid #dddddd;
            padding: 10px;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select,
        input {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 10px;
        }

        .btn-block {
            text-align: center;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        a {
            display: inline-block;
            background-color: #808080;
            color: white;
            padding: 10px;
            text-decoration: none;
        }

        #sc {
            overflow: scroll;
            height: 10cm;
        }
    </style>
      <script>
        function searchRecipes() {
            var searchTerm = document.getElementById("searchTerm").value;

            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("sc").innerHTML = this.responseText;
                }
            };

            xhttp.open("POST", "SearchRecipes.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("searchTerm=" + searchTerm);
        }
        function updateData() {
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("sc").innerHTML = this.responseText;
                }
            };

            xhttp.open("GET", "GetData.php", true);
            xhttp.send();
        }
        setInterval(updateData, 5000);
    </script>
</head>

<body>
    <?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'coffee';
    $conn = new mysqli($host, $username, $password, $database);
    $result = $conn->query("SELECT * FROM recipes");
    $grinderQuery = "SELECT cGrinder FROM grinder";
    $grinderResult = $conn->query($grinderQuery);
    ?>
    <h2>Recipe Table</h2>
    <div id="sc">
        <fieldset>
            <table>
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
                <tbody>
                    <?php
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
                    ?>
                </tbody>
            </table>
        </fieldset>
    </div>

    <div class="testbox">
        <form onsubmit="event.preventDefault(); searchRecipes();">
            <label for="searchTerm">Enter Search Term:</label>
            <input type="text" name="searchTerm" id="searchTerm" required>
            <button type="submit">Search Recipes</button>
        </form>
    </div>

    </div>
    <form action="DeleteRecipe.php" method="post">
    <label for="recipeId">Enter Recipe ID to Delete:</label>
    <input type="number" name="recipeId" required>
    <button type="submit">Delete Recipe</button>
</form>
    </div>


    <div class="testbox">
        <form action="AddRecipes.php" method="post">
            <div class="banner">
                <h1>Adding Recipes</h1>
            </div>
            <br />
            <p>
                <center> Please fill in information below to keep up with your delicious recipes </center>
            </p>
            <fieldset>
                <label>Water amount (ml)
                    <input type="number" name="Wamount" min="100" max="1000" step="100" value="300" placeholder="in ml" />
                </label>
                <label>Coffee amount (grams)
                    <input type="number" name="Camount" min="10" max="60" step="1" value="20" placeholder="in Grams" />
                </label>
                <label>Ratio
                    <input type="number" name="Ratio" min="10" max="20" maxlength="2" value="15" />
                </label>
                <br />
                <br />
                <label for="tool">Brewing tool</label>
                <select name="tool" id="tool">
                    <option value="V60">V60</option>
                    <option value="Chemex">Chemex</option>
                    <option value="Kalita">Kalita</option>
                </select>
                <label for="Temperature">Temperature</label>
                <input type="number" name="Temperature" min="87" max="100" placeholder="Enter temperature" />
                <br />
                <br />
                <label>Grind number (clicks)</label>
                <input type="number" name="grindClicks" min="4" max="40" placeholder="Enter grind clicks" />
                <label>Extraction time</label>
                <select name="extime" id="extime">
                    <option value="Less">Less</option>
                    <option value="1:45">1:45</option>
                    <option value="2:00">2:00</option>
                    <option value="2:15">2:15</option>
                    <option value="2:30">2:30</option>
                    <option value="2:45">2:45</option>
                    <option value="3:00">3:00</option>
                    <option value="3:15">3:15</option>
                    <option value="3:30">3:30</option>
                    <option value="More">More</option>
                </select>
                <label for="cGrinder">Grinder</label>
                <select name="cGrinder" id="cGrinder">
                    <?php
                    while ($row = $grinderResult->fetch_assoc()) {
                        echo "<option value='" . $row['cGrinder'] . "'>" . $row['cGrinder'] . "</option>";
                    }
                    ?>
                </select>
                <a href="grinder.php">Add new Grinder</a>
                <label for="cBeans">Coffee Beans</label>
                <select name="cBeans" id="cBeans">
                    <option value="c">c</option>
                   
                </select>
                <a href="homepage.html">Add new beans</a>
                <div class="btn-block">
                    <button type="submit">Submit</button>
                </div>
                <div class="btn-block">
                    <a href="homepage.html">Go back</a>
                </div>
            </fieldset>
        </form>
    </div>
    <?php
    $conn->close();
    ?>
</body>

</html>
