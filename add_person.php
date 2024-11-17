<?php
include 'includes/db_connect.php';
// Start the session at the top of the page

echo'
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missing Person Tracker</title>
    <link rel="stylesheet" href="styles.css"> 
</head>

<body>
    <h1>Welcome to the Missing Person Site</h1>

    <form method="POST" action="'.addPerson($conn).'" enctype="multipart/form-data">
        <div class="input-cont">
            <label>Name: </label>
            <input type="text" name="name" required>
        </div>
        <div class="input-cont">
            <label>Age: </label>
            <input type="number" name="age" required>
        </div>
        <div class="input-cont">
            <label for="">Gender: </label>
            <select name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="input-cont">
        <label for="person_image">Upload Image:</label>
        <input type="file" name="person_image" accept="image/*">
        </div>
        <div class="input-cont">
            <label>Physical Description: </label>
            <textarea name="description" required></textarea>
        </div>
        <div class="input-cont">
            <label>Last Known Location: </label>
            <input type="text" name="location" required>
        </div>
        <div class="input-cont">
            <label>Date Missing: </label>
            <input type="date" name="date_missing" required>
        </div>
        <div class="input-cont">
            <input class="btn" type="submit" name="addPerson" value="Add Person">
        </div>

    </form>

</body>

</html>';?>