<?php
// Include your database connection script
include('connection.php');

// Query to fetch data from the database
$query = "SELECT * FROM Admin";
$result = mysqli_query($connection, $query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close the database connection
mysqli_close($connection);

// Convert data to JSON format for JavaScript
echo json_encode($data);
?>