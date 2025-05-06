<?php
$servername = "127.0.0.1:3307";
$username = "root"; 
$password = "";     
$database = "healthcare_portal";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];
$time = $_POST['time'];
$message = $_POST['message'];

// Insert into database
$sql = "INSERT INTO appointments (fullName, email, phone, doctor, date, time, message) 
        VALUES ('$fullName', '$email', '$phone', '$doctor', '$date', '$time', '$message')";

if ($conn->query($sql) === TRUE) {
  echo "Appointment booked successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>