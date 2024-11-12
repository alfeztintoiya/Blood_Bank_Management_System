<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Out Stock Blood List</title>
    <link rel="stylesheet" href="admin-home.css"> 
    <style type="text/css">
        td {
            width: 200px;
            height: 40px;
            text-align: center;
            padding: 8px;
        }
        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            margin-top: 30px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background-color: #00796b;
            color: white;
            font-size: 18px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    
    <div id="header">
        <a href="admin-home.php" id="header-title">Blood Bank Management System</a>
        <div id="nav-bar">
            <a href="admin-home.php">Home</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div id="body-content">
        <?php
        $un = $_SESSION['un'];
        if (!$un) {
            header("Location:index.php");
        }
        ?>
        <h1>Out Stock Blood List</h1>

        <div id="form">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Mobile No</th>
                    <th>Blood Group</th>
                </tr>
                <?php
                $q = $db->query("SELECT * FROM out_stoke_b");
                while ($r1 = $q->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    <tr>
                        <td><?= $r1->name; ?></td>
                        <td><?= $r1->mno; ?></td>
                        <td><?= $r1->bname; ?></td>
                    </tr>
                    <?php 
                }
                ?>
            </table>
        </div>
    </div>

    <div id="footer">
        <h4>Blood Bank Management System - Web Technology Project</h4>
    </div>
</body>
</html>
