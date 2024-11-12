<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Blood Bank Management System</title>
    <style>
        
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #e0f7fa, #80deea);
            color: #333;
        }

        #full {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #inner-full {
            width: 90%;
            max-width: 400px;
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            border-top: 5px solid #00796b; 
        }

        #header {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #00796b;
        }

        #header h2::before {
            content: "🏥";
            margin-right: 8px;
        }

        #body form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table {
            width: 100%;
        }

        td {
            padding: 8px;
        }

        
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border-radius: 10px;
            border: 1px solid #cfd8dc;
            font-size: 16px;
            background-color: #f1f1f1;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #00796b;
            background-color: #ffffff;
        }
        input[type="submit"]{
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            background-color: #00796b;
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover{
            background-color: #004d40;
        }

        #footer{
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #607d8b;
        }
    </style>
</head>
<body>
    <div id="full">
        <div id="inner-full">
            <div id="header">
                <h2>Blood Bank Management System</h2>
            </div>
            <div id="body">
                <form action="" method="post">
                    <table>
                        <tr>
                            <td><b>Enter Username</b></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="un" placeholder="Enter Username"></td>
                        </tr>
                        <tr>
                            <td><b>Enter Password</b></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="ps" placeholder="Enter Password"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="sub" value="Login"></td>
                        </tr>
                    </table>
                </form>
                <?php
                if(isset($_POST['sub'])) {
                    $un = $_POST['un'];
                    $ps = $_POST['ps'];
                    $q = $db->prepare("SELECT * FROM admin WHERE uname = :un AND pass = :ps");
                    $q->bindParam(':un', $un);
                    $q->bindParam(':ps', $ps);
                    $q->execute();
                    $res = $q->fetchAll(PDO::FETCH_OBJ);
                    
                    if($res) {
                        $_SESSION['un'] = $un;
                        header("Location:admin-home.php");
                    } else {
                        echo "<script>alert('Wrong Username or Password');</script>";
                    }
                }
                ?>
            </div>
            <div id="footer">
                <h4>Blood Bank Management System - Web Technology Project</h4>
            </div>
        </div>
    </div>
</body>
</html>
