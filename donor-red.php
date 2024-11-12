<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration - Blood Bank Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e0f7fa, #80deea);
            color: #333;
            font-size: 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        #header {
            background-color: #00796b;
            padding: 15px 20px;
            color: #ffffff;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        #header a {
            text-decoration: none;
            color: white;
        }

        #body-content {
            width: 90%;
            max-width: 800px;
            padding: 30px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        #body-content h1 {
            font-size: 24px;
            color: #00796b;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        table {
            width: 100%;
            margin: 0 auto;
        }

        td {
            padding: 10px;
            font-size: 16px;
            color: #333;
        }

        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #00796b;
            color: white;
            font-size: 18px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center;
            margin-top: 15px;
        }

        input[type="submit"]:hover {
            background-color: #004d40;
        }

        #footer {
            font-size: 14px;
            color: #607d8b;
            text-align: center;
            padding: 15px;
            margin-top: 20px;
            border-top: 1px solid #ddd;
        }

        #logout-link {
            text-decoration: none;
            color: #00796b;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        #logout-link:hover {
            color: #004d40;
        }
    </style>
</head>
<body>
    
    <div id="header">
        <a href="admin-home.php">Blood Bank Management System</a>
    </div>

    
    <div id="body-content">
        <?php
        $un = $_SESSION['un'];
        if (!$un) {
            header("Location:index.php");
        }
        ?>
        <h1>Donor Registration</h1>

        <?php
        
        $errors = [];

        if (isset($_POST['sub'])) {
            
            $name = trim($_POST['name']);
            $fname = trim($_POST['fname']);
            $address = trim($_POST['address']);
            $city = trim($_POST['city']);
            $age = trim($_POST['age']);
            $bgroup = $_POST['bgroup'];
            $email = trim($_POST['email']);
            $mno = trim($_POST['mno']);
            $doctor = $_POST['doctor'];
            $dob = trim($_POST['dob']);

            
            if (empty($name)) $errors[] = "Name is required.";
            if (empty($fname)) $errors[] = "Father's name is required.";
            if (empty($address)) $errors[] = "Address is required.";
            if (empty($city)) $errors[] = "City is required.";
            if (!is_numeric($age) || $age < 18) $errors[] = "Enter a valid age (must be 18 or older).";
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Enter a valid email.";
            if (empty($mno) || !preg_match('/^[0-9]{10}$/', $mno)) $errors[] = "Enter a valid 10-digit mobile number.";
            if (empty($dob)) $errors[] = "Date of Birth is required.";

            
            if (empty($errors)) {
                $q = "INSERT INTO donor_registration (name, fname, address, city, age, bgroup, email, mno, doctor, dob) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $st2 = $db->prepare($q);
                if ($st2->execute([$name, $fname, $address, $city, $age, $bgroup, $email, $mno, $doctor, $dob])) {
                    echo "<script>alert('Registration Successful')</script>";
                } else {
                    echo "<script>alert('Donor Registration Failed')</script>";
                }
            } else {
                
                foreach ($errors as $error) {
                    echo "<p style='color: red;'>$error</p>";
                }
            }
        }
        ?>

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
                    <td><textarea name="address" placeholder="Enter Address"></textarea></td>
                    <td>Enter City</td>
                    <td><input type="text" name="city" placeholder="Enter City"></td>
                </tr>
                <tr>
                    <td>Enter Age</td>
                    <td><input type="text" name="age" placeholder="Enter Age"></td>
                    <td>Select Blood Group</td>
                    <td>
                        <select name="bgroup">
                            <option>O+</option>
                            <option>AB+</option>
                            <option>AB-</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Enter E-Mail</td>
                    <td><input type="text" name="email" placeholder="Enter E-Mail"></td>
                    <td>Enter Mobile No</td>
                    <td><input type="text" name="mno" placeholder="Enter Mobile No"></td>
                </tr>
                <tr>
                    <td>Doctor Assigned</td>
                    <td>
                        <select name="doctor">
                            <option>D1</option>
                            <option>D2</option>
                            <option>D3</option>
                        </select>
                    </td>
                    <td>Date of Birth</td>
                    <td><input type="date" name="dob" placeholder="DOB"></td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center;"><input type="submit" name="sub" value="Save"></td>
                </tr>
            </table>
        </form>
    </div>

    <div id="footer">
        <h4>Blood Bank Management System - Web Technology Project</h4>
        <p><a id="logout-link" href="logout.php">Logout</a></p>
    </div>
</body>
</html>
