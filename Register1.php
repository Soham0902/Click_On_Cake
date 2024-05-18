<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>


<?php
$db_name = 'mysql:host=localhost;dbname=ClickOnCake';
$user_name = 'root';
$user_password = '7709200288';

$conn = mysqli_connect("localhost" , "root" , "7709200288" , "ClickOnCake");

if(isset($_POST['submit'])){

   $username = $_POST['username'];
   $username = filter_var($username, FILTER_SANITIZE_STRING);
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['contact'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $password = $_POST['pass'];
   $password = filter_var($password, FILTER_SANITIZE_STRING);
   $gender = $_POST['gender'];
   $gender = filter_var($gender, FILTER_SANITIZE_STRING);
   $confirmpassword = $_POST['conpass'];
   $confirmpassword = filter_var($confirmpassword, FILTER_SANITIZE_STRING);

    if($password == $confirmpassword){
        $count = mysqli_query($conn , "insert into users values('$username' , '$name' , '$email' , '$number' , '$gender' , '$password')");
        if($count>=1) {
           echo "<script> alert('Registration successful'); </script>" ;
           include("login_user.html");
        }
        else {
            echo "<script> alert('Failed'); </script>" ;
            include("create_Account.html");
    }
   }
   else{
     echo "<script> alert('Registration Failed'); </script>";
   }
}

?>


</body>
</html>