<?php
include '../config/config.php';
// Queries
$sql_admin = "SELECT COUNT(*) AS total_admin FROM students WHERE admin_id IS NOT NULL";
$sql_user = "SELECT COUNT(*) AS total_user FROM students WHERE user_id IS NOT NULL";

$result_admin = $conn->query($sql_admin);
$result_user = $conn->query($sql_user);

$total_admin = 0;
$total_user = 0;

if ($result_admin->num_rows > 0) {
    $row = $result_admin->fetch_assoc();
    $total_admin = $row['total_admin'];
}
if ($result_user->num_rows > 0) {
    $row = $result_user->fetch_assoc();
    $total_user = $row['total_user'];
}

$conn->close();
?>

<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R.B.M</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: url('../images/college1.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .hero {
            background-size: cover;
            background-position: center;
            display: flex;
            position: relative;
            margin-top: 100px;
            align-items: center;
            justify-content: center;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
        }

        h2 {
            font-size: 36px;
            margin: 0 0 20px;
        }

        p {
            font-size: 18px;
            margin: 0 0 20px;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin: 40px 0;
            flex-wrap: wrap;
        }

        .card {
            background-color: white;
            padding: 30px 50px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            min-width: 250px;
        }

        .admin {
            border-top: 5px solid #007bff;
        }

        .user {
            border-top: 5px solid #28a745;
        }

        .card h1 {
            font-size: 48px;
            margin: 10px 0;
            color: #222;
        }

        .card p {
            font-size: 18px;
            color: #666;
        }

        footer {
            background-color: gray;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }

    </style>
</head>
<body>

<!-- Hero Section -->
<div class="hero">
    <div class="overlay">
        <h2>Welcome To R.B.MADKHOLKAR MAHAVIDYALAYA CHANDGAD</h2>
        <p>Your Journey To Excellence Begins Here..!</p>
    </div>
</div>

<!-- Stats Section -->
<div class="container">
    <div class="card admin">
        <p>Registered by Admin</p>
        <h1><?php echo $total_admin; ?></h1>
    </div>

    <div class="card user">
        <p>Registered by User</p>
        <h1><?php echo $total_user; ?></h1>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2025 RBM Vision. All Rights Reserved.</p>
</footer>

</body>
</html>
