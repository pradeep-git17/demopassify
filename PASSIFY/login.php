<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password_db = "1234";
    $dbname = "passify";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if user exists and validate password
    $sql = "SELECT * FROM applications WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password (assuming passwords are stored as hashes)
        if (password_verify($password, $user['password'])) {
            // Store user details in session
            $_SESSION['user'] = $user;
            header("Location: profile.php");
            exit();
        } else {
            echo "<h2 style='color: red;'>Invalid password. Please try again.</h2>";
        }
    } else {
        echo "<h2 style='color: red;'>No account found with that email.</h2>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<h2 style='color: red;'>Invalid Request. Please login first.</h2>";
}
?>
