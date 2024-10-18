<?php

$servername = "db";
$username = "root";
$password = "shroot";
$dbname = "secretdb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS secret_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    s_username VARCHAR(100) NOT NULL,
    s_password VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error creating table: " . $conn->error;
}

$check_query = "SELECT * FROM secret_table WHERE s_username = 'ctfuser'";
$result = $conn->query($check_query);

if ($result->num_rows == 0) {
    $sql_record = "INSERT INTO secret_table (s_username, s_password) 
                   VALUES ('ctfuser', 'ccsCTF{Ju5T_S4n!t1ze_1inpput_ppl34se!}')";
    
    if ($conn->query($sql_record) === TRUE) {
    } else {
        echo "Error inserting record: " . $conn->error;
    }
} else {
    // Optional: uncomment the following line if you want feedback about existing records
    // echo "Record already exists, skipping insert.";
}

return $conn;
?>
