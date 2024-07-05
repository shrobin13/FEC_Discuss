<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';

    $name = $_POST["signupname"];
    $email = $_POST["signupemail"];
    $contact = $_POST["contact"];
    $username = $_POST["signupusername"];
    $password = $_POST["signuppassword"];
    $cpassword = $_POST["signupcpassword"];

    // Check whether this email exists
    $existsql = "SELECT * FROM `users` WHERE email = ?";
    $stmt = $conn->prepare($existsql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $numrows = $result->num_rows;

    if ($numrows > 0) {
        $showError = "Email already in use";
        header("Location: /forum/index.php?signupsuccess=false&error=" . urlencode($showError));
        exit();
    } else {
        if ($password === $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`name`, `email`, `contact`, `username`, `password`, `timecreated`) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $name, $email, $contact, $username, $hash);

            if ($stmt->execute()) {
                header("Location: /forum/index.php?signupsuccess=true");
                exit();
            } else {
                $showError = "Error in database query";
                header("Location: /forum/index.php?signupsuccess=false&error=" . urlencode($showError));
                exit();
            }
        } else {
            $showError = "Passwords do not match";
            header("Location: /forum/index.php?signupsuccess=false&error=" . urlencode($showError));
            exit();
        }
    }
}
?>
