<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    session_start();

    $username = $_POST["loginusername"];
    $password = $_POST["loginpassword"];

    // Check whether this username exists
    $existsql = "SELECT * FROM `users` WHERE username = ?";
    $stmt = $conn->prepare($existsql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $numrows = $result->num_rows;

    if ($numrows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password matched
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $row['id'];
            header("Location: /forum/index.php?loginsuccess=true");
            exit();
        } else {
            // Password did not match
            $showError = "Incorrect password";
            header("Location: /forum/index.php?loginsuccess=false&error=" . urlencode($showError));
            exit();
        }
    } else {
        // Username does not exist
        $showError = "Username does not exist";
        header("Location: /forum/index.php?loginsuccess=false&error=" . urlencode($showError));
        exit();
    }
}
?>
