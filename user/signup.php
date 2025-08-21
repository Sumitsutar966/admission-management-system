<?php
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
   

    // Check if username already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $error = "Username already taken!";
    } else {
        // Hash the password before storing
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert into users table
        $stmt = $conn->prepare("INSERT INTO users (fname,lname,email,username, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",$fname,$lname,$email,$username, $hashedPassword);

        if ($stmt->execute()) {
            header("Location: ../successreg.php");
            exit;
        } else {
            $error = "Something went wrong!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background:url('../images/college1.jpg');
            background-repeat:no-repeat;
            background-size:100% 100%;
            
                    }
        .signup-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .signup-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .signup-container input{
            align-items:center;
            justify-content:center;
            width:355px;
            max-width:400px;
            padding: 7px;
            margin-left: 10px;
            margin-right:10px;
            margin:8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .signup-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .signup-container button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            text-align: center;
        }
        .login-link{
            text-align:center;
        }
    </style>
</head>
<body>
<div class="signup-container">
<h2>Sign Up</h2>

<?php if (isset($error)): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form action="" method="POST">
<label for="fname">First Name:</label>
    <input type="text" name="fname" placeholder="Enter Your First Name" required><br><br>
    
    <label for="lname">Last Name:</label>
    <input type="text" name="lname" placeholder="Enter Your Last Name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" placeholder="Enter Your Email" required><br><br>

    <label for="username">Username:</label>
    <input type="text" name="username" placeholder="Enter Your Usernmae" required><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password"placeholder="Enter Password"  required><br><br>


    <button type="submit">Sign Up</button>
    <p class="login-link">Already a User? <a href="../index.php">Log In Here</a></p>
</form>
</div>
</body>
</html>
