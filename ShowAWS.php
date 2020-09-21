<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
  server with default setting (user 'root' with no password) */
$link = mysqli_connect("admin@database-1.c6jevgf51ssc.us-east-1.rds.amazonaws.com:3306", "admin", "123admin", "StudentDB");
//$link = mysqli_connect("localhost", "root", "", "de");
// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM studenttable";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table border=\"1\">";
        echo "<tr>";

        echo "<th>id</th>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>City</th>";
        echo "<th>Phone</th>";
        echo "<th>Department</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['department'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>