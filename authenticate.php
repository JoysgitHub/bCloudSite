
<?php
session_start();

// Database connection parameters
$host = 'bclouddb.c7isqogm4b3g.eu-central-1.rds.amazonaws.com'; // e.g., mydbinstance.123456789012.us-east-1.rds.amazonaws.com
$db = 'bCloudDB';
$user = 'admin';
$pass = '';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute the SQL statement
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = SHA2(?, 256)");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    // Successful login
    $_SESSION['username'] = $username;
    header("Location: welcome.php");
    exit();
} else {
    // Invalid credentials
    echo "Invalid username or password.";
}

$stmt->close();
$conn->close();
?>
