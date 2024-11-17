<?php

include 'db_connect.php';

// SQL statements to create the tables
$sql = "
CREATE TABLE IF NOT EXISTS Person (
    Person_ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    Age INT,
    Gender VARCHAR(50),
    Physical_Description TEXT,
    Last_Known_Location VARCHAR(255),
    Date_Missing DATE
);

CREATE TABLE IF NOT EXISTS Reports (
    Report_ID INT AUTO_INCREMENT PRIMARY KEY,
    Person_ID INT,
    Report_Type VARCHAR(50),
    Description TEXT,
    Location VARCHAR(255),
    Date_Reported DATE,
    FOREIGN KEY (Person_ID) REFERENCES Person(Person_ID)
);

CREATE TABLE IF NOT EXISTS Contacts (
    Contact_ID INT AUTO_INCREMENT PRIMARY KEY,
    Person_ID INT,
    Name VARCHAR(255),
    Relationship VARCHAR(50),
    Phone VARCHAR(15),
    Email VARCHAR(255),
    FOREIGN KEY (Person_ID) REFERENCES Person(Person_ID)
);
";

// Execute the SQL commands
if ($conn->multi_query($sql)) {
    echo "Tables created successfully.";
} else {
    echo "Error creating tables: " . $conn->error;
}

// Close the connection
$conn->close();
?>
