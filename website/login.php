<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new mysqli('localhost', 'root', '', 'xavier_university');

    if ($db->connect_errno) {
        die("Failed to connect: " . $db->connect_error);
    }

    $username = $db->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $db->query($sql);

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Regenerate session ID to prevent session fixation
            session_regenerate_id(true);
            $_SESSION['user'] = $username;
            header("Location: dashboard.php");
            exit();
        }
    }

    $db->close();

    echo "<script>alert('Invalid login credentials.'); window.history.back();</script>";
}
?>
