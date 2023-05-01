<?php
// Change these variables to match your database settings
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'hospitaldb';

// Establish a connection to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Get the doctor's email from the URL parameter
$doctor_email = $_GET['doc_email'];

// Retrieve the patient details for the logged-in doctor
$sql = "SELECT Name, Email, ContactNumber, Speciality, BookingDate FROM bookings_tb WHERE DoctorEmail = '$doctor_email'";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles-3.css">
    <title>Doctor Patients</title>
</head>
<body>
    <h1>Patients for <?php echo $doctor_email; ?></h1>
   
    <?php
// Check if there are any patients for this doctor
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Email</th><th>Contact Number</th><th>Speciality</th><th>Booking Date</th></tr>";

    // Output the patient details
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td>".$row["ContactNumber"]."</td><td>".$row["Speciality"]."</td><td>".$row["BookingDate"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No patients found for this doctor.";
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>





