<!DOCTYPE html>
<html>
<head>
    <title>Class</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="view_student_style.css">
    <link rel="stylesheet" href="get_student_style.css">
    <script src="admin_script.js"></script>
</head>

<body>
    <div class="header">
        <div class="header-title">Dashboard</div>
        <div class="logout">
            <a href="login.html" class="button">Logout</a>
        </div>
    </div>
    <div class="container">
        <div class="sidebar-toggle">
            <i class="fa fa-bars"></i>
        </div>
        <div class="sidebar">
        <div class="sidebar-header">
                <img src="avatar.png" alt="Avatar" class="sidebar-avatar">
                <h3 class="sidebar-username">Admin</h3>
            </div>
            <div class="sidebar-item">
                <i class="fas fa-users count-icon"></i><a href="class.php">Class</a>
            </div>
            <div class="sidebar-item">
                <i class="fas fa-user-graduate count-icon"></i><a href="student.html">Student</a>
            </div>
            <div class="sidebar-item">
                <i class="fas fa-chalkboard-teacher count-icon"></i><a href="teacher.html">Teacher</a>
            </div>
            <div class="sidebar-item">
                <i class="far fa-calendar-alt count-icon"></i><a href="../Achieve/index.html">Achievement</a>
            </div>
        </div>

                    <div id="studentDetailsContent">
                        <div class="content">
                            <button class="close" onclick="closeDetailsModal()">&times;</button>
                                <?php
                                include 'db.php';
                                $student_id = $_GET['student_id'];

                                $sql = "SELECT * FROM student WHERE student_id = $student_id";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $html = '<h2>Student Details</h2>';
                                    $html .= '<style="margin-top: 20px; align-items: center">';
                                    $html .= '<table class="student-details-table">';
                                    $html .= '<tr><td>Name:</td><td>' . $row['first_name'] . " " . $row['last_name'] . '</td></tr>';
                                    $html .= '<tr><td>Register No:</td><td>' . $row['reg_no'] . '</td></tr>';
                                    $html .= '<tr><td>Year :</td><td>' . $row['year'] . '</td></tr>';
                            
                                    $html .= '<tr><td>Email:</td><td>' . $row['email'] . '</td></tr>';
                                    $html .= '<tr><td>Phone:</td><td>' . $row['phone_number'] . '</td></tr>';
                                    $html .= '<tr><td>Address:</td><td>' . $row['address'] . '</td></tr>';                            
                                    $html .= '</table>';


                                    echo $html;
                                } else {
                                    echo 'No student found';
                                }

                                $conn->close();
                                ?>
                        </div>
                    </div>
            </div>

        </div>
    </div>

    <div class="footer" style="background-color: #333;">
        <div>
            <div class="circle" style="background-color: #7e7e7b;">
                <a href="https://www.gvpcew.ac.in/">
                    <i class="fa fa-globe"></i>
                </a>
            </div>
            <div class="circle" style="background-color: #3b5998;">
                <a href="https://www.facebook.com/GayatriVidyaParishad.GVPW/">
                    <i class="fa fa-facebook"></i>
                </a>
            </div>
            <div class="circle" style="background-color: #1da1f2;">
                <a href="https://twitter.com/i/flow/login?redirect_after_login=%2Fgvpcew_jg">
                    <i class="fa fa-twitter"></i>
                </a>
            </div>
            <div class="circle" style="background-color: #0e76a8;">
                <a href="https://www.linkedin.com/school/gayatri-vidya-parishad-college-of-engineering-for-women-madhurawada-pin-530048-cc-jg-/?originalSubdomain=in">
                    <i class="fa fa-linkedin"></i>
                </a>
            </div>
            
            <div class="circle" style="background-color: #ff0000;">
                <a href="https://www.youtube.com/watch?v=8V05pcCkg1g">
                    <i class="fa fa-youtube"></i>
                </a>
            </div>
        </div>
        <div align="center">
            Made in India <br> Copyright &copy; 2024 GVPCEW
        </div>
    </div>

    <script>
        function getStudentDetails($student_id) {
            $query = "SELECT * FROM student WHERE student_id = $student_id";
            $result = mysqli_query($conn, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                return mysqli_fetch_assoc($result);
            } else {
                return false;
            }
        }

    </script>

</body>
</html>

