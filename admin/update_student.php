<?php
include 'navbar.php'; 
session_start();

$conn = new mysqli('localhost', 'root', '', 'registration');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

$name = $middle_name = $surname = $birthday = $address = $email = "";
$course = $year = $sem = $gender = "";
$id = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['fetch'])) {
        // Fetch student details when the ID is entered
        $id = $_POST['id'];
        $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $middle_name = $row['middle_name'];
            $surname = $row['surname'];
            $birthday = $row['birthday'];
            $address = $row['address'];
            $email = $row['email'];
            $course = $row['course'];
            $year = $row['year'];
            $sem = $row['sem'];
            $gender = $row['gender'];
        } else {
            echo "<p class='error'>No student found with this ID.</p>";
        }
        $stmt->close();
    } elseif (isset($_POST['update'])) {
        // Update student information
        $id = $_POST['id'];
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

        $stmt = $conn->prepare("UPDATE students SET name=?, middle_name=?, surname=?, birthday=?, address=?, email=?, course=?, year=?, sem=?, gender=?,photo=?, cert10=?, cert12=?, aadhar=?, signature=? WHERE id=?");
        $stmt->bind_param("sssssssssssssssi", $name, $middle_name, $surname, $birthday, $address, $email, $course, $year, $sem, $gender,$photo, $cert10, $cert12, $aadhar, $signature, $id);
        
        if ($stmt->execute()) {
            echo "<p class='success'>Student information updated successfully!</p>";
        } else {
            echo "<p class='error'>Error updating record: " . $stmt->error . "</p>";
        }
        
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin-top: 40px;
        }
        h2 {
            color: #333;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            width: 350px;
        }
        label {
            font-weight: bold;
        }
        select, input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .update-button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        .update-button:hover {
            background-color: #0056b3;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
        .update{
            margin-top:40px;
            margin-bottom:40px;
        }
    </style>
</head>
<body>
<div class="update">
    <h2>Update Student Information</h2>
    
    <!-- Fetch student details -->
    <form action="update_student.php" method="POST">
        <label for="id">Student ID:</label>
        <input type="number" name="id" value="<?= htmlspecialchars($id) ?>" required>
        <button type="submit" name="fetch" class="update-button">Fetch Details</button>
    </form>

    <!-- Update student details -->
    <?php if (!empty($name)) { ?>
        <form action="update_student.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

            <label for="name">Name:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" required>

            <label for="middle_name">Middle Name:</label>
            <input type="text" name="middle_name" value="<?= htmlspecialchars($middle_name) ?>">

            <label for="surname">Surname:</label>
            <input type="text" name="surname" value="<?= htmlspecialchars($surname) ?>" required>

            <label for="birthday">DOB:</label>
            <input type="date" name="birthday" value="<?= htmlspecialchars($birthday) ?>" required>

            <label for="address">Address:</label>
            <input type="text" name="address" value="<?= htmlspecialchars($address) ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>

            <label for="course">Select Course:</label>
            <select name="course" required>
                <option value="BCA" <?= ($course == "BCA") ? "selected" : "" ?>>BCA</option>
                <option value="BSC.CS" <?= ($course == "BSC.CS") ? "selected" : "" ?>>BSC.CS</option>
                <option value="Bsc" <?= ($course == "Bsc") ? "selected" : "" ?>>BSC</option>
                <option value="BA" <?= ($course == "BA") ? "selected" : "" ?>>BA</option>
            </select>

            <label for="year">Select Year:</label>
            <select name="year" required>
                <option value="1st year" <?= ($year == "1st year") ? "selected" : "" ?>>1st year</option>
                <option value="2nd year" <?= ($year == "2nd year") ? "selected" : "" ?>>2nd year</option>
                <option value="3rd year" <?= ($year == "3rd year") ? "selected" : "" ?>>3rd year</option>
            </select>

            <label for="sem">Select Semester:</label>
            <select name="sem" required>
                <option value="I" <?= ($sem == "I") ? "selected" : "" ?>>I</option>
                <option value="II" <?= ($sem == "II") ? "selected" : "" ?>>II</option>
                <option value="III" <?= ($sem == "III") ? "selected" : "" ?>>III</option>
                <option value="IV" <?= ($sem == "IV") ? "selected" : "" ?>>IV</option>
                <option value="V" <?= ($sem == "V") ? "selected" : "" ?>>V</option>
                <option value="VI" <?= ($sem == "VI") ? "selected" : "" ?>>VI</option>
            </select>

            <label for="gender">Select Gender:</label>
            <select name="gender" required>
                <option value="Male" <?= ($gender == "Male") ? "selected" : "" ?>>Male</option>
                <option value="Female" <?= ($gender == "Female") ? "selected" : "" ?>>Female</option>
            </select>


            <h3>-: Upload Documents :-</h3>

<label for="photo"><strong>Student Photo:</strong></label>
<input type="file" name="photo" id="photo" accept="image/*" value="<?= htmlspecialchars($photo) ?>" required>

<label for="cert10"><strong>10th Certificate:</strong></label>
<input type="file" name="cert10" id="cert10" accept="image/*" value="<?= htmlspecialchars($cert10) ?>" required>

<label for="cert12"><strong>12th Certificate:</strong></label>
<input type="file" name="cert12" id="cert12" accept="image/*" value="<?= htmlspecialchars($cert12) ?>" required>

<label for="aadhar"><strong>Aadhar Card:</strong></label>
<input type="file" name="aadhar" id="aadhar" accept="image/*" value="<?= htmlspecialchars($aadhar) ?>" required>

<label for="signature"><strong>Student Signature:</strong></label>
<input type="file" name="signature" id="signature" accept="image/*" value="<?= htmlspecialchars($signature) ?>" required>

            <button type="submit" name="update" class="update-button">Update</button>
        </form>
    <?php } ?>
</div>
</body>
</html> 
