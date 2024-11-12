<?php
include('connection.php');
session_start();

if (!isset($_SESSION['un'])) {
    header("Location:index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home - Blood Bank Management System</title>
    <link rel="stylesheet" href="admin-home.css">
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
        <h1>Welcome, Admin</h1>

        
        <div class="option-list">
            <a href="doctor.php">Doctor's Detail</a>
            <a href="donor-red.php">Donor Registration</a>
            <a href="donor-list.php">Donor List</a>
            <a href="stoke-blood-list.php">Stock Blood List</a>
            <a href="out-stock-blood-list.php">Out Stock Blood List</a>
            <a href="exchange-blood-list.php">Exchange Blood Registration</a>
            <a href="exchange-blood-list1.php">Exchange Blood List</a>
        </div>
    </div>

    
    <div id="footer">
        <h4>Blood Bank Management System - Web Technology Project</h4>
    </div>
</body>
</html>
