<?php
$servername = "localhost";
$username = "root";
$password = "bohemia";
$dbname = "test123";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, body, created FROM posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
        echo "id: " . $row["id"]. " - Title: " . $row["title"]. " " . $row["body"]. "<br>";
        // $result[] = $row;
    }
} else {
    echo "0 results";
}
// echo "<pre>".print_r($result,1)."</pre>";
$conn->close();
?> 