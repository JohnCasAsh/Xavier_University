<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to DB
    $db = new mysqli('localhost', 'root', '', 'xavier_university');

    if ($db->connect_errno) {
        die("Failed to connect: " . $db->connect_error);
    }

    // Get and sanitize inputs
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    // Execute and check
    if ($stmt->execute()) {
        session_regenerate_id(true);
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Error: " . $stmt->error;
    }


    $stmt->close();
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Sign Up - Xavier University</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background: #f0f4f8;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .signup-container {
    background: white;
    padding: 2rem 3rem;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    width: 320px;
  }

  h2 {
    margin-bottom: 1.5rem;
    text-align: center;
    color: #333;
  }

  label {
    display: block;
    margin-bottom: 0.3rem;
    font-weight: bold;
    color: #555;
  }

  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 0.5rem;
    margin-bottom: 1rem;
    border: 1.5px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s;
  }

  input[type="text"]:focus,
  input[type="password"]:focus {
    border-color: #0077cc;
    outline: none;
  }

  button {
    width: 100%;
    padding: 0.7rem;
    background-color: #0077cc;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  button:hover {
    background-color: #005fa3;
  }

  .message {
    margin: 1rem 0;
    text-align: center;
  }

  .error {
    color: #d93025;
  }

  .success {
    color: #188038;
  }

  a {
    color: #0077cc;
    text-decoration: none;
  }

  a:hover {
    text-decoration: underline;
  }
</style>
</head>
<body>

<div class="signup-container">
  <h2>Create an Account</h2>

  <?php if (!empty($error)): ?>
    <div class="message error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <?php if (!empty($success)): ?>
    <div class="message success"><?= $success ?></div>
  <?php endif; ?>

  <form method="POST" action="signup.php" novalidate>
    <label for="username">Username</label>
    <input
      type="text"
      id="username"
      name="username"
      required
      minlength="3"
      maxlength="30"
      pattern="[a-zA-Z0-9_]+"
      title="Username can contain letters, numbers, and underscores only."
      autocomplete="username"
    />

    <label for="password">Password</label>
    <input
      type="password"
      id="password"
      name="password"
      required
      minlength="6"
      autocomplete="new-password"
    />

    <button type="submit">Sign Up</button>
  </form>
</div>

</body>
</html>
