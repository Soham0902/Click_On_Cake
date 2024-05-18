<?php
    require "config.php";
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password= $_POST["pass"];

        $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            if($password == $row["password"] ){
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row['id'];
                header("Location: explore.html");
            }
            else{
                echo "<script> alert('Wrong Password');</script>";
            }
        }
        else{
            echo "<script> alert('Invalid credentials!');</script>";
        }
    }
?>    