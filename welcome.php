
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to bCloud Bank</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            color: #003366;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <div class="welcome-message">
        <p>Thank you for choosing bCloud Bank. We are committed to providing you with the best banking experience.</p>
        <p>If you have any questions or need assistance, feel free to reach out to our support team.</p>
        <p>Happy banking!</p>
    </div>
</body>
</html>
