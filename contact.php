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

   $fname = $_POST['fname'];
   $fname = filter_var($fname, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $message = $_POST['msg'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);

    $count = mysqli_query($conn , "insert into msg values( '$fname' , '$email' , '$message')");
        if($count>=1) {
           echo "<script> alert('Sent successfully'); </script>" ;
           include("contact.html");
        }
}

?>


</body>
</html>