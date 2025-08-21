<?php
include 'navbar.php';
include '../config/config.php';
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
// SQL query to fetch all student details along with the user who registered them
$sql = "SELECT students.*, 
            COALESCE(users.username, admin.username) AS registered_by 
        FROM students 
        LEFT JOIN users ON students.user_id = users.id 
        LEFT JOIN admin ON students.admin_id = admin.id
        WHERE students.name LIKE '%$search%'";

$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registered Students</title>
    <style>
    /* General Styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        text-align: center;
      
    }

    /* Container for the page */
    .container {
        width: 100%%;
       
        margin-top: 80px;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        overflow-x: auto; /* Allows scrolling on small screens */
    }

    /* Table Styling */
    table {  
        width: 100%;
       
        border-collapse: collapse;
        margin-top: 20px;
        background: white;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align:center;
        font-size: 14px;
      
    }

    th {
        background-color: #007bff;
        color: white;
        text-transform: uppercase;
        
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

   

    /* Image Styling */
    .student-photo {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 5px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }

    /* Document Styling */
    .document-link {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }

    .document-link:hover {
        text-decoration: underline;
    }

    /* Responsive Design 
    @media screen and (max-width: 600px) {
        table {
            width: 100%;
        }

        th, td {
            display: block;
            text-align: center;
        }
    }*/
    .search-box {
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 80%;
            padding: 10px;
            border: 2px solid black;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        button {
            background-color: cyan;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Registered Students</h2>
        <form method="GET" class="search-box">
            <input type="text" name="search" placeholder="Search by Student Name" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
        </form>
        <table  border=2px;>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Email</th>
                <th>Course</th>
                <th>Year</th>
                <th>Sem</th>
                <th>Gender</th>
                <th>Registered Date</th>
                <th>Registered By</th>
                <th>Delete</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><img src="<?= htmlspecialchars($row['photo']) ?>" class="student-photo" alt="Student Photo"></td>
                        <td><?= htmlspecialchars($row['name'].' '.$row['middle_name'].' '.$row['surname']) ?></td>
                        <td><?= htmlspecialchars($row['birthday']) ?></td>
                        <td><?= htmlspecialchars($row['address']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['course']) ?></td>
                        <td><?= htmlspecialchars($row['year']) ?></td>
                        <td><?= htmlspecialchars($row['sem']) ?></td>
                        <td><?= htmlspecialchars($row['gender']) ?></td>
                        <td><?= htmlspecialchars($row['reg_date']) ?></td>
                        <td><?= htmlspecialchars($row['registered_by']) ?></td>
                        <td>
                            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this student?');">
                                🗑️ Delete
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
