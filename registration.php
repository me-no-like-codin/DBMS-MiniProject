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

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact_number = $_POST['contact_number'];
        $speciality = $_POST['speciality'];
        $date = $_POST['date'];

        // Find a doctor with the specified speciality and works at the clinic
        $sql = "SELECT Doc_Name, Email, WorksAt FROM doc_speciality WHERE Speciality = '$speciality'";


        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $doctor = mysqli_fetch_assoc($result);

            $doctor_name = $doctor['Doc_Name'];
            $doctor_email = $doctor['Email'];
            $doctor_worksAt = $doctor['WorksAt'];

            // Insert the booking into the bookings table
            $worksAt = mysqli_real_escape_string($conn, $doctor_worksAt);

            $sql = "INSERT INTO bookings_tb (Name, Email, ContactNumber, DoctorName, DoctorEmail, Speciality, BookingDate, WorksAt) 
                    VALUES ('$name', '$email', '$contact_number', '$doctor_name', '$doctor_email', '$speciality', '$date', '$worksAt')";
    

    if (mysqli_query($conn, $sql)) {
        $booking_id = mysqli_insert_id($conn); // get the last inserted id
        echo "<script>alert('Booking successful! Your booking ID is #" . $booking_id . " for Dr. " . $doctor_name . " at " . $worksAt . "!!!'); window.location.href = 'http://localhost/DBMS%20MPR/';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
    
        } else {
            echo "<script>alert('No doctor available with that speciality!!!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles-2.css">
    <title>Patient Registration and Booking</title>
</head>
<body>
    <div class="formContainer">
        <h1>Patient Registration and Booking:</h1>
        <form method="post">
            <input type="text" placeholder="Type your name here" name="name" required><br>
            <input type="email" placeholder="Type your email here" name="email" required><br>
            <input type="text" placeholder="Type your contact number here" name="contact_number" required><br>
            <input type="text" placeholder="Type your speciality here" name="speciality" required><br>
            <input type="date" placeholder="Select a date" name="date" required><br>
            <button type="submit" name="submit">Book Appointment</button>
        </form>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
