<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Exchange Blood Registration</title>
    <link rel="stylesheet" href="s1.css">
    <style type="text/css">
        #form1{
            width: 80%;
            height: 320px;
            background-color:red;
            color: white;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div id="full">
        <div id="inner_full">
            <div id="header"><h2><a href="admin-home.php" style="text-decoration: none; color: white;">Blood Bank Management System</a></h2></div>
            <div id="body">
               <?php
               $un=$_SESSION['un'];
               if(!$un)
               {
                header("Location:index.php");
               }
               ?>
                <h3>Exchange Blood Donor Registrartion </h3>
                <center><div id="form1">
                    <form action="" method="post">
                    <table>
                        <tr>
                            <td width="200px" height="50px">Enter Name</td>
                            <td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name"></td>
                            <td width="200px" height="50px">Enter Father's Name</td>
                            <td width="200px" height="50px"><input type="text" name="fname" placeholder="Enter Father Name"></td>
                        </tr>
                        <tr>
                            <td width="200px" height="50px">Enter Address</td>
                            <td width="200px" height="50px"><textarea name="address"></textarea></td>
                            <td width="200px" height="50px">Enter City</td>
                            <td width="200px" height="50px"><input type="text" name="city" placeholder="Enter City"></td>
                        </tr>
                        <tr>
                            <td width="200px" height="50px">Enter Age</td>
                            <td width="200px" height="50px"><input type="text" name="age" placeholder="Enter Age"></td>
                        </tr>
                        <tr>
                            <td width="200px" height="50px">Enter E-Mail</td>
                            <td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-Mail"></td>
                            <td width="200px" height="50px">Enter Mobile No</td>
                            <td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile No"></td>
                        </tr>
                        <td width="200px" height="50px">Select Blood Group</td>
                            <td width="200px" height="50px">
                                <select name="bgroup">
                                    <option value="O+">O+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </td>
                            <td width="200px" height="50px">Exchange Blood Group</td>
                            <td width="200px" height="50px">
                                <select name="exbgroup">
                                    <option value="O+">O+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </td>
                        <tr>
                            <td><input type="submit" name="sub" value="Save"></td>
                        </tr>
                    </table>
                </form>
                <?php
                if(isset($_POST['sub']))
                {
                     $name=$_POST['name'];
                      $fname=$_POST['fname'];
                      $address=$_POST['address'];
                      $city=$_POST['city'];
                      $age=$_POST['age'];
                      $bgroup=$_POST['bgroup'];
                      $email=$_POST['email'];
                     $mno=$_POST['mno'];
                      $exbgroup=$_POST['exbgroup'];

                    
                    $q="select * from donor_registration where bgroup ='$bgroup'";
                    $st=$db->query($q);
                    $num_row=$st->fetch();
                    $id=$num_row['id'];
                    $name=$num_row['name'];
                    $b1=$num_row['bgroup'];
                    $mno=$num_row['mno'];
                    $q1="INSERT INTO out_stoke_b (bname,name,mno) value(?,?,?)";
                    $st1=$db->prepare($q1);
                    $st1->execute([$b1,$name,$mno]);
                    $q2="delete donor_registration where id='$id'";
                    $st=$db->prepare($q2);
                    $st->execute();

                    $q=$db->prepare("INSERT INTO exchange_bb (name,fname,address,city,age,bgroup,email,mno,ebgroup) VALUES(:name,:fname,:address,:city,:age,:bgroup,:email,:mno,:ebgroup)");
                    $q->bindValue('name',$name);
                    $q->bindValue('fname',$fname);
                    $q->bindValue('address',$address);
                    $q->bindValue('city',$city);
                    $q->bindValue('age',$age);
                    $q->bindValue('bgroup',$bgroup);
                    $q->bindValue('email',$email);
                    $q->bindValue('mno',$mno);
                    $q->bindValue('ebgroup',$exbgroup);
                    if($q->execute())
                    {
                        echo "<script>alert('Registration Successful')</script>";
                    }
                    else{
                        echo "<script>alert('Donor Registration Failed')</script>";
                    }
                }
                ?>
                </div></center>
            </div>
            <div id="footer"><h4 align="center">Dbms@Project</h4></div>
            <p align="center"><a href="logout.php"><font color="white"></font>Logout</a></p>
        </div>
    </div>
</body>
</html>