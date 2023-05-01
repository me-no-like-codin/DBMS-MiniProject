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
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Sign in the doctor
        $sql = "SELECT * FROM doctor_tb WHERE email = '$email' AND password = '$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $doctor_email = $row['email'];
            echo '<script>alert("Sign In successful"); window.location.href = "doctor_patients.php?doc_email='.$doctor_email.'";</script>';
        } else {
            echo "<script>alert('Invalid email or password!!!');</script>";
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
    <title>Login System Doctors</title>
</head>
<body>
    <div class="formContainer">
        <h1>Doctor Credentials:</h1>
        <form method="post">
            <input type="email" placeholder="Type your email here" name="email" required><br>
            <input type="password" placeholder="Type your password here" name="password" required><br>
            <button type="submit" name="signIn">Sign In</button>
        </form>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
