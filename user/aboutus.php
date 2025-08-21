<?php include 'usernavbar.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 70px;
            margin-top:60px;
        }
        .section {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 20px;
        }
        .image, .text {
            flex: 1;
            padding: 20px;
        }
        .image img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        p {
            color: #555;
            line-height: 1.6;
        }
        .reverse {
            flex-direction: row-reverse;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="section">
            <div class="image">
                <img src="../images/classroom.jpg" alt="Classroom Photo">
            </div>
            <div class="text">
                <h2>Modern Infrastructure</h2>
                <p>Our college boasts state-of-the-art infrastructure, featuring well-equipped classrooms, advanced laboratories, extensive libraries, and spacious auditoriums. These facilities provide students with an ideal environment for academic learning, research, and extracurricular activities, ensuring they have access to the best resources for their education.</p>            </div>
        </div>
        <div class="section reverse">
            <div class="image">
                <img src="../images/faculty.jpg" alt="Classroom Photo">
            </div>
            <div class="text">
                <h2>Experienced Faculty</h2>
                <p>We take pride in our team of highly qualified and experienced faculty members who are dedicated to academic excellence and student success. Their expertise, innovative teaching methods, and mentorship help students develop critical thinking, problem-solving skills, and a deep understanding of their subjects</p>            </div>
        </div>

        <div class="section">
            <div class="image">
                <img src="../images/course.jpg" alt="Course Photo">
            </div>
            <div class="text">
                <h2>Diverse Courses</h2>
                <p>Offering a wide range of undergraduate and postgraduate programs, our college caters to diverse academic interests and career aspirations. From science and technology to arts and business studies, we ensure that students have the flexibility to pursue their passion and achieve their goals.</p>            </div>
        </div>
        
    </div>
</body>
</html>
