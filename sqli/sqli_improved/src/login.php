<?php
include "conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vulnerable SQL query
    $query = "SELECT * FROM secret_table WHERE s_username = '$username' AND s_password = '$password'";

    // Check for suspicious SQL keywords
    if (preg_match('/\b(DROP|DELETE|OR|AND)\b/i', $username)) {
        error_log("Suspicious query detected: " . $username);
        die("Suspicious activity detected. Operation terminated.");
    }
   if (preg_match('/\b(DROP|DELETE|OR|AND)\b/i', $password)) {
        error_log("Suspicious query detected: " . $password);
        die("Suspicious activity detected. Operation terminated.");
    }

    // Execute the query
    $result = $conn->query($query);

    $resultsArray = []; // Initialize the results array

    // Assuming $resultsArray is populated as before
    if ($result) {
        echo "Hmmm??<br>";
        while ($row = $result->fetch_assoc()) {
            $resultsArray[] = $row; // Append each row to the results array
        }
    }

    // Iterate over the results to display specific fields
    foreach ($resultsArray as $row) {
        if (isset($row['id'])) {
            echo $row['id'] . "<br>";
        }
        if (isset($row['s_username'])) {
            echo $row['s_username'] . "<br>";
        }
        if (isset($row['s_password'])) {
            echo $row['s_password'] . "<br>";
        }
        if (isset($row['created_at'])) {
            echo $row['created_at'] . "<br>";
        }
    }
}
?>
