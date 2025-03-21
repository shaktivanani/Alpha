
// Check for duplicate username or email
    $checkQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "Username or email already exists. Please try with a different one.";
    } else {
        // Insert new user
        $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>