<?php

// Create a function to get all the students from the database by name
function getTeachersByMail($mail) {

    // Define the constants for the db connection
    define("DB_SERVERNAME", "localhost");
    define("DB_USERNAME","root");
    define("DB_PASSWORD", "code");
    define("DB_NAME", "db-university");
    
    // Create the connection
    $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    // Check the connection
    if ($conn && $conn->connect_error) {
        
        echo "Connection failed: " . $conn->connect_error;
    
        return;
    }
    
    // Prepare the query
    $sql = "SELECT name, surname FROM teachers WHERE email LIKE ?";
    $stmt = $conn->prepare($sql);

    // Bind the parameter
    // $arg = '%' . $mail . '%';
    $stmt -> bind_param("s", $mail);

    // Execute the query
    $stmt -> execute();

    // Get the results
    $result = $stmt -> get_result();
    
    if ($result && $result->num_rows > 0) {

        // If there are results, create an array to store them
        $teachers = [];
        
        // While there are results, add them to the array
        while($row = $result->fetch_assoc()) {
            
            $teachers[] = $row;
        }
        
        // Return the array
        return $teachers;
    }

    // Close the connection
    $conn->close();

    return [];
}