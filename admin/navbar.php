
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R.B.M</title>
    <style type="text/css">
        * {
            text-decoration: none;
        }
        body{
           
    padding-top: 60px; /* Adjust based on navbar height */
    
        }
        .navbar {
            background: rgba(95, 166, 175, 1);;
    font-family: 'Times New Roman';
    position: fixed; /* Keeps navbar at the top */
    top: 0;
    left:0;
    width: 100%;
    z-index: 1000; /* Ensures it stays above other elements */

        }

        .navdiv {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 35px;
            font-weight: 600;
            color: black;
            padding-left: 15px;
            padding-right: 15px;
        }

        li {
            
            display: inline-block;
            list-style: none;
            
        }
        li a:hover{
    background-color: gray;
    padding:8px;
    border-radius:5px;
}
li a {
            color: white;
            font-weight: bold;
            font-size: 18px;
            margin-right: 25px;
           
        }

        .btn {
            background-color: black;
            margin-left: 10px;
            margin-right: 10px;
            padding: 10px;
            width: 90px;
            border-radius:10px;
        }

        .btn  {
            color: white;
            font-size: 10px;
            font-weight: bold;
        }
        
      
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="navdiv">
            
            <div class="logo"><a href="home.php"> RBM Vision</a></div>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="register.php">Registration</a></li>
                <li><a href="view_students.php">View</a></li>
                <li><a href="update_student.php">Update </a></li>
                <a href="../logout.php" ><button class="btn">log out</button></a>
            </ul>
        </div>
    </nav>

</body>
</html>