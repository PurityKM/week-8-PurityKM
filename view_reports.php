<?php
include 'includes/db_connect.php';
echo'
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missing Person Tracker</title>
    <link rel="stylesheet" href="styles.css"> 
</head>

<body>';
echo '<div class="page-header">';
echo '<h1>Lost People Record</h1>';
echo '<p>Browse through the Missing Persons Records. If you have any information about someone listed here, please contact us through 
the authorities immediately.</p>';
echo '</div>';

echo '<div class="report-cont">';
$result = $conn->query("SELECT * FROM person");
while ($row = $result->fetch_assoc()) {
    ?>

    <?php
      
    echo '<div class="container">';
    if (!empty($row['person_image'])) {
        // Construct the full path to the image
        $imagePath = 'uploads/' .$row['person_image'];
        
        // Display the image
        echo '<img class="img" src="' . $imagePath . '" alt="Person Image" style="width:200px;height:auto;">';
    } else {
        // Display a placeholder if no image is available
        echo '<img src="uploads/default_placeholder.jpg" alt="No Image Available" style="width:200px;height:auto;">';
    }    
    echo '<div class="person-card">';
    echo "<h2>" . $row['Name'] . "</h2>";
    echo "<p><strong>Age:</strong> " . $row['Age'] . "</p>";
    echo "<p><strong>Gender:</strong> " . $row['Gender'] . "</p>";
    echo "<p><strong>Description:</strong> " . $row['Physical_Description'] . "</p>";
    echo "<p><strong>Location:</strong> " . $row['Last_Known_Location'] . "</p>";
    echo "<p><strong>Date Missing:</strong> " . $row['Date_Missing'] . "</p>";
    echo "<a href=''>Report</a>";
    echo '</div>';
    echo '</div>';

    
    

    // Display the image if it exists
    
    
}
echo '</div>';
?>
