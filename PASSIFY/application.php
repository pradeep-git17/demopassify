<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $age = htmlspecialchars($_POST['age']);
    $gender = htmlspecialchars($_POST['gender']); // Ensure gender is retrieved as a string
    $source_add = htmlspecialchars($_POST['source_add']);
    $destination_add = htmlspecialchars($_POST['destination_add']);
    $pass_type = htmlspecialchars($_POST['pass_type']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT); // Hash the password

    // Basic validation
    if (empty($name) || empty($phone) || empty($email) || empty($age) || empty($gender) || empty($source_add) || empty($destination_add) || empty($pass_type) || empty($password)) {
        echo "<h2 style='color: red;'>All fields are required. Please go back and fill out the form completely.</h2>";
        exit;
    }

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password_db = "1234";
    $dbname = "passify";

    // Create connection
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO applications (name, phone, email, age, gender, source_add, destination_add, pass_type, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiissss", $name, $phone, $email, $age, $gender, $source_add, $destination_add, $pass_type, $password);

    if ($stmt->execute()) {
        echo "<div class='container'>";
        echo "<h1>Application Submitted Successfully</h1>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Phone:</strong> $phone</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Age:</strong> $age</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Source Address:</strong> $source_add</p>";
        echo "<p><strong>Destination Address:</strong> $destination_add</p>";
        echo "<p><strong>Pass Type:</strong> $pass_type</p>";
        echo "<button onclick='window.print()'>Print</button>";
        echo "</div>";
    } else {
        echo "<h2 style='color: red;'>Error: " . $stmt->error . "</h2>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<h2 style='color: red;'>Invalid Request. Please submit the form first.</h2>";
}
?>
