<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Blood List - Blood Bank Management System</title>
    <link rel="stylesheet" href="admin-home.css"> 
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 4px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #008080;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #e0f7fa;
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

    <div id="container">
        <div id="body-content">
            <?php
            $un = $_SESSION['un'];
            if (!$un) {
                header("Location:index.php");
            }
            ?>
            <h1>Exchange Blood List</h1>

            
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Father's Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Age</th>
                        <th>Blood Group</th>
                        <th>Exchange Blood Group</th>
                        <th>E-mail</th>
                        <th>Mobile No</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q = $db->query("SELECT * FROM exchange_bb");
                    while($r1 = $q->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    <tr>
                        <td><?=$r1->name; ?></td>
                        <td><?=$r1->fname; ?></td>
                        <td><?=$r1->address; ?></td>
                        <td><?=$r1->city; ?></td>
                        <td><?=$r1->age; ?></td>
                        <td><?=$r1->bgroup; ?></td>
                        <td><?=$r1->ebgroup; ?></td>
                        <td><?=$r1->email; ?></td>
                        <td><?=$r1->mno; ?></td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="footer">
        <h4>Blood Bank Management System - Web Technology Project</h4>
    </div>
</body>
</html>
