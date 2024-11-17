<?php
// Include the database connection
include 'includes/db_connect.php';

// Sample data for the Person table
$personData = [
    ["John Doe", 35, "Male", "Tall, short brown hair, glasses", "New York, NY", "2024-11-01"],
    ["Jane Smith", 28, "Female", "Medium height, blonde hair, blue eyes", "Los Angeles, CA", "2024-10-15"],
    ["Tom Brown", 42, "Male", "Beard, muscular build, tattoo on arm", "Chicago, IL", "2024-09-20"]
];

// Insert sample data into the Person table
foreach ($personData as $person) {
    $stmt = $conn->prepare("INSERT INTO Person (Name, Age, Gender, Physical_Description, Last_Known_Location, Date_Missing) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissss", $person[0], $person[1], $person[2], $person[3], $person[4], $person[5]);
    $stmt->execute();
}
echo "Sample data inserted into Person table.<br>";

// Sample data for the Reports table
$reportData = [
    [1, "Sighting", "Seen near Central Park", "New York, NY", "2024-11-02"],
    [2, "Search Operation", "Conducted a search near Hollywood Blvd", "Los Angeles, CA", "2024-10-16"]
];

// Insert sample data into the Reports table
foreach ($reportData as $report) {
    $stmt = $conn->prepare("INSERT INTO Reports (Person_ID, Report_Type, Description, Location, Date_Reported) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $report[0], $report[1], $report[2], $report[3], $report[4]);
    $stmt->execute();
}
echo "Sample data inserted into Reports table.<br>";

// Sample data for the Contacts table
$contactData = [
    [1, "Sarah Doe", "Sister", "555-123-4567", "sarah.doe@example.com"],
    [2, "Mark Smith", "Brother", "555-987-6543", "mark.smith@example.com"]
];

// Insert sample data into the Contacts table
foreach ($contactData as $contact) {
    $stmt = $conn->prepare("INSERT INTO Contacts (Person_ID, Name, Relationship, Phone, Email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $contact[0], $contact[1], $contact[2], $contact[3], $contact[4]);
    $stmt->execute();
}
echo "Sample data inserted into Contacts table.<br>";

// Close the connection
$conn->close();
?>
