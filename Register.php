<?php
    require "config.php";
    if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $contact=$_POST["contact"];
    $gender=$_POST["gender"];
    $password= $_POST["pass"];
    $confirmpass = $_POST["conpass"];
    $duplicate=mysqli_query($conn, "SELECT * FROM users WHERE username='$username' OR email='$email'");
    if(mysqli_num_rows($duplicate)>0){
        echo "<script> alert('Username Or Email has already taken');</script>";
    }
    else{
        if($password== $confirmpass){
            $query="INSERT INTO users VALUES('','$username','$name','$email','$contact','$gender','$password)";
            mysqli_query($conn, $query);
            echo "<script> alert('Registration Successful');</script>";
            header("Location: login_user.html");
        }
        else{
            echo "<script> alert ('Password does not match');</script>";
        }
    }
}
?>