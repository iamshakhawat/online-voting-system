<?php 
include("../db.php");
session_start();

$phone = trim($_POST['phone']);
$password = trim($_POST['password']);
$role = $_POST['role'];


$check = mysqli_num_rows(mysqli_query($db,"SELECT * FROM `users` WHERE `phone` ='$phone' AND `password` = '$password' AND `role` = '$role'"));

if($check === 1){
    
    $_SESSION['user_phone'] = $phone;
    $_SESSION['user_role'] = $role;

    echo "
    <script>
    alert('Login Successful!');
    window.location = '../dashboard.php';
    </script>
";
}else{
    echo "
    <script>
    alert('Wrong Information');
    window.location = '../login.php';
    </script>
";
}


?>