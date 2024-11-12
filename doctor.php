<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Information - Blood Bank Management System</title>
    <link rel="stylesheet" href="doctor.css">
</head>
<body>
    
    <div id="header">
        <a href="admin-home.php" id="header-title">Blood Bank Management System</a>
        <div id="nav-bar">
            <form action="admin-home.php" method="get">
                <button type="submit" class="nav-button">Home</button>
            </form>
            <form action="profile.php" method="get">
                <button type="submit" class="nav-button">Profile</button>
            </form>
            <form action="logout.php" method="get">
                <button type="submit" class="nav-button" id="logout-button">Logout</button>
            </form>
        </div>
    </div>

    
    <div id="container">
        <div id="body-content">
            <?php
            $un = $_SESSION['un'];
            if (!$un) {
                header("Location:index.php");
            }
            ?>
            <h1>Doctor Information</h1>

           
            <table>
                <tr>
                    <th>Doctor ID</th>
                    <th>Doctor Name</th>
                    <th>Mobile No.</th>
                    <th>Address</th>
                    <th>Specialization</th>
                </tr>
                <?php
                
                $doctors = array(
                    array("D1","Doctor1", "1234567890", "Address 1", "Specialization 1"),
                    array("D2","Doctor2", "9876543210", "Address 2", "Specialization 2"),
                    array("D3","Doctor3", "5678901234", "Address 3", "Specialization 3")
                );

                
                foreach ($doctors as $doctor) {
                    echo "<tr>";
                    foreach ($doctor as $detail) {
                        echo "<td>$detail</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
    
    <div id="footer">
        <h4>Blood Bank Management System - Web Technology Project</h4>
        <p><a id="logout-link" href="logout.php">Logout</a></p>
    </div>
</body>
</html>
