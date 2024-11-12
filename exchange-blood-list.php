<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Blood Registration</title>
    <link rel="stylesheet" href="admin-home.css">
    <style type="text/css">
        
        #form1 {
            background-color: #e0f2f1;
            border-radius: 10px;
            padding: 30px;
            width: 80%;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-spacing: 10px;
        }
        td {
            padding: 10px;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #00796b;
            border-radius: 5px;
            font-size: 14px;
        }
        input[type="submit"] {
            background-color: #00796b;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #004d40;
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
        <h1>Exchange Blood Donor Registration</h1>
        
        
        <center><div id="form1">
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Enter Name</td>
                        <td><input type="text" name="name" placeholder="Enter Name"></td>
                        <td>Enter Father's Name</td>
                        <td><input type="text" name="fname" placeholder="Enter Father's Name"></td>
                    </tr>
                    <tr>
                        <td>Enter Address</td>
                        <td><textarea name="address"></textarea></td>
                        <td>Enter City</td>
                        <td><input type="text" name="city" placeholder="Enter City"></td>
                    </tr>
                    <tr>
                        <td>Enter Age</td>
                        <td><input type="text" name="age" placeholder="Enter Age"></td>
                    </tr>
                    <tr>
                        <td>Enter E-Mail</td>
                        <td><input type="text" name="email" placeholder="Enter E-Mail"></td>
                        <td>Enter Mobile No</td>
                        <td><input type="text" name="mno" placeholder="Enter Mobile No"></td>
                    </tr>
                    <tr>
                        <td>Select Blood Group</td>
                        <td>
                            <select name="bgroup">
                                <option value="O+">O+</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </td>
                        <td>Exchange Blood Group</td>
                        <td>
                            <select name="exbgroup">
                                <option value="O+">O+</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="None">None</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4"><input type="submit" name="sub" value="Save"></td>
                    </tr>
                </table>
            </form>
        </div></center>

        <?php
        if (isset($_POST['sub'])) {
            $name = $_POST['name'];
            $fname = $_POST['fname'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $age = $_POST['age'];
            $bgroup = $_POST['bgroup'];
            $email = $_POST['email'];
            $mno = $_POST['mno'];
            $exbgroup = $_POST['exbgroup'];

            $q = "SELECT * FROM donor_registration WHERE bgroup = '$bgroup'";
            $st = $db->query($q);
            $num_row = $st->fetch();
            $id = $num_row['id'];

            $name = $num_row['name'];
            $b1 = $num_row['bgroup'];
            $mno = $num_row['mno'];
            
            $q1 = "INSERT INTO out_stoke_b (bname, name, mno) VALUES (?, ?, ?)";
            $st1 = $db->prepare($q1);
            $st1->execute([$b1, $name, $mno]);

            $q2 = "DELETE FROM donor_registration WHERE id = '$id'";
            $st = $db->prepare($q2);
            $st->execute();

            $q = "INSERT INTO exchange_bb (name, fname, address, city, age, bgroup, email, mno, ebgroup) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $st2 = $db->prepare($q);
            if ($st2->execute([$name, $fname, $address, $city, $age, $bgroup, $email, $mno, $exbgroup])) {
                echo "<script>alert('Registration Successful')</script>";
            } else {
                echo "<script>alert('Donor Registration Failed')</script>";
            }
        }
        ?>
    </div>

    <div id="footer">
        <h4>Blood Bank Management System - Web Technology Project</h4>
    </div>
</body>
</html>
