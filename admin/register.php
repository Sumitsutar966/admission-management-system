<?php
session_start();
include 'navbar.php';
include '../config/config.php';



$registered_by = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : NULL;
isset($_SESSION['id']) ? $_SESSION['id'] : NULL;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $middle_name = $_POST['middle_name'];
    $surname = $_POST['surname'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $sem = $_POST['sem'];
    $gender = $_POST['gender'];

    // Check if 'uploads' directory exists
    $upload_dir = '../uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    function uploadFile($file, $upload_dir) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
        $max_size = 2 * 1024 * 1024; // 2MB limit

        if ($file['error'] !== UPLOAD_ERR_OK) {
            return false;
        }

        if (!in_array($file['type'], $allowed_types)) {
            die("Invalid file type. Only JPG, PNG, and PDF allowed.");
        }

        if ($file['size'] > $max_size) {
            die("File size exceeds 2MB limit.");
        }

        $target_file = $upload_dir . basename($file['name']);
        move_uploaded_file($file['tmp_name'], $target_file);

        return $target_file;
    }

    $photo = uploadFile($_FILES['photo'], $upload_dir);
    $cert10 = uploadFile($_FILES['cert10'], $upload_dir);
    $cert12 = uploadFile($_FILES['cert12'], $upload_dir);
    $aadhar = uploadFile($_FILES['aadhar'], $upload_dir);
    $signature = uploadFile($_FILES['signature'], $upload_dir);

    if (!$photo || !$cert10 || !$cert12 || !$aadhar || !$signature) {
        die("File upload failed.");
    }

    // Insert data including user_id
    $stmt = $conn->prepare("INSERT INTO students 
        (name, middle_name, surname, birthday, address, email, course, year, sem, gender, photo, cert10, cert12, aadhar, signature, admin_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssssssssssi", $name, $middle_name, $surname, $birthday, $address, $email, $course, $year, $sem, $gender, $photo, $cert10, $cert12, $aadhar, $signature, $registered_by);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }     

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            padding: 20px;
            
        }
        .form{
            margin-top:60px;
        }

        h2, h3 {
            text-align: center;
            color: #333;
        }

        label {
            font-size: 14px;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
        }

        button {
            cursor: pointer;
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s;
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
        }

        button:hover {
            background-color: #0056b3;
        }

        button.reset {
            background-color: #dc3545;
        }

        button.reset:hover {
            background-color: #b02a37;
        }
    </style>
</head>

<body>
    <diV class="form">
    <h2>R.B. MADKHOLKAR MAHAVIDYALAYA CHANDGAD</h2>
    <form action="register.php" method="POST" enctype="multipart/form-data">
        <label for="name"><strong>Name:</strong></label>
        <input type="text" id="name" name="name" placeholder="Enter Your Name" required>

        <label for="middle-name"><strong>Middle Name:</strong></label>
        <input type="text" id="middle-name" name="middle_name" placeholder="Enter Your Middle Name" required>

        <label for="surname"><strong>Surname:</strong></label>
        <input type="text" id="surname" name="surname" placeholder="Enter Your Surname" required>

        <label for="birthday"><strong>DOB:</strong></label>
        <input type="date" id="birthday" name="birthday" required>

        <label for="address"><strong>Address:</strong></label>
        <input type="text" id="address" name="address" placeholder="Enter Your Address" required>

        <label for="email"><strong>Email:</strong></label>
        <input type="email" id="email" name="email" placeholder="Enter Your Email" required>

        <label for="course"><strong>Select Course:</strong></label>
        <select name="course" id="course" required>
            <option value="" disabled selected>Select Course</option>
            <option value="BCA">BCA</option>
            <option value="BSC.CS">BSC.CS</option>
            <option value="BSC">BSC</option>
            <option value="BA">BA</option>
        </select>

        <label for="year"><strong>Select Year:</strong></label>
        <select name="year" id="year" required>
            <option value="" disabled selected>Select Year</option>
            <option value="1st year">1st year</option>
            <option value="2nd year">2nd year</option>
            <option value="3rd year">3rd year</option>
        </select>

        <label for="sem"><strong>Select Semester:</strong></label>
        <select name="sem" id="sem" required>
            <option value="" disabled selected>Select Semester</option>
            <option value="I">I</option>
            <option value="II">II</option>
            <option value="III">III</option>
            <option value="IV">IV</option>
            <option value="V">V</option>
            <option value="VI">VI</option>
        </select>

        <label for="gender"><strong>Select Gender:</strong></label>
        <select name="gender" id="gender" required>
            <option value="" disabled selected>Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <h3>-: Upload Documents :-</h3>

        <label for="photo"><strong>Student Photo:</strong></label>
        <input type="file" name="photo" id="photo" accept="image/*" required>

        <label for="cert10"><strong>10th Certificate:</strong></label>
        <input type="file" name="cert10" id="cert10" accept="image/*" required>

        <label for="cert12"><strong>12th Certificate:</strong></label>
        <input type="file" name="cert12" id="cert12" accept="image/*" required>

        <label for="aadhar"><strong>Aadhar Card:</strong></label>
        <input type="file" name="aadhar" id="aadhar" accept="image/*" required>

        <label for="signature"><strong>Student Signature:</strong></label>
        <input type="file" name="signature" id="signature" accept="image/*" required>

        <div class="buttons">
            <button type="submit" class="submit">Submit</button>
            <button type="reset" class="reset">Reset</button>
        </div>
    </form>
    </diV>
</body>

</html>








