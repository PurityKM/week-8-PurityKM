<?php
// session_start();

$servername = "localhost"; // Or the database host
$username = "root";        // Your MySQL username
$password = "";            // Your MySQL password
$dbname = "missing-persons"; // Your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

function addPerson($conn)
{
    if(isset($_POST['addPerson'])){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        $date_missing = $_POST['date_missing'];
    
        $photo_name = $_FILES['person_image']['name'];
        $photo_temp = $_FILES['person_image']['tmp_name'];
        $ren_photo = uniqid().$photo_name;
        $dir = 'uploads/'.$ren_photo;
        move_uploaded_file($photo_temp, $dir);
    
    
        $stmt = "INSERT INTO person (Name, Age, Gender, Physical_Description, Last_Known_Location, Date_Missing, person_image) 
        VALUES ('$name', $age, '$gender', '$description', '$location', '$date_missing', '$ren_photo')";

    
        $state =  mysqli_query($conn, $stmt);
    
        if($state){    
        // $_SESSION['alert'] = "Person added successfully!";
    
        // echo "<h2 class='alert'>Person added successfully!</h2>";
        // Redirect after insertion
        header("Location: ./view_reports.php"); // Redirect to the main page (or any other page)
        exit();
    
    }
    
    }
}

?>
