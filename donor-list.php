<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration</title>
    <link rel="stylesheet" href="donor-list.css">
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
        <div id="full">
            <div id="inner_full">
                <div id="body">
                    <br>
                    <?php
                    $un = $_SESSION['un'];
                    if (!$un) {
                        header("Location:index.php");
                    }
                    ?>
                    <h1>Donor List</h1>
                    <center>
                        <div id="form">
                            <table border="1px" style="border-color: white;">
                                <tr>
                                    <th>Name</th>
                                    <th>Father's Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Age</th>
                                    <th>Blood Group</th>
                                    <th>E-mail</th>
                                    <th>Mobile No</th>
                                    <th>Doctor</th>
                                    <th>DOB</th>
                                </tr>
                                <?php
                                $q = $db->query("SELECT * FROM donor_registration");
                                while ($r1 = $q->fetch(PDO::FETCH_OBJ)) {
                                ?>
                                <tr>
                                    <td><?= $r1->name; ?></td>
                                    <td><?= $r1->fname; ?></td>
                                    <td><?= $r1->address; ?></td>
                                    <td><?= $r1->city; ?></td>
                                    <td><?= $r1->age; ?></td>
                                    <td><?= $r1->bgroup; ?></td>
                                    <td><?= $r1->email; ?></td>
                                    <td><?= $r1->mno; ?></td>
                                    <td><?= $r1->doctor; ?></td>
                                    <td><?= $r1->dob; ?></td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </table>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <div id="footer">
        <h4>Blood Bank Management System - Web Technology Project</h4>
    </div>
</body>
</html>
