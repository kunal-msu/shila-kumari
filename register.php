<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['Username']);
    $email = $conn->real_escape_string($_POST['Email']);
    $password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
    $phone_number = $conn->real_escape_string($_POST['Phonenumber']);

    // Check if username or email already exists
    $checkUser = $conn->query("SELECT * FROM users WHERE username='$username' OR email='$email'");
    if ($checkUser->num_rows > 0) {
        echo "Username or email already exists.";
    } else {
        $sql = "INSERT INTO users (username, email, password, phone_number) VALUES ('$username', '$email', '$password', '$phone_number')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
