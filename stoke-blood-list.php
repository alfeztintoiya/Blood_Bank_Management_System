<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Blood List - Blood Bank Management System</title>
    <link rel="stylesheet" href="stoke_blood_list.css">
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

    <div id="body-content">
        <?php
        $un = $_SESSION['un'];
        if (!$un) {
            header("Location:index.php");
        }
        ?>
        <h1>Stock Blood List</h1>
        
        <div id="form">
            <table border="1" style="border-color: white; width: 100%; max-width: 600px;">
                <tr>
                    <th>Name</th>
                    <th>Qty</th>
                </tr>
                <tr>
                    <td>O+</td>
                    <td>
                        <?php
                        $q = $db->query("SELECT * FROM donor_registration WHERE bgroup='O+'");
                        echo $q->rowcount();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>AB+</td>
                    <td>
                        <?php
                        $q = $db->query("SELECT * FROM donor_registration WHERE bgroup='AB+'");
                        echo $q->rowcount();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>AB-</td>
                    <td>
                        <?php
                        $q = $db->query("SELECT * FROM donor_registration WHERE bgroup='AB-'");
                        echo $q->rowcount();
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div id="footer">
        <h4>Blood Bank Management System - Web Technology Project</h4>
    </div>
</body>
</html>
