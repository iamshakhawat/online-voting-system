<?php 
include("../db.php");

$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$password = trim($_POST['password']);
$role = trim($_POST['role']);
$photo = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];

$photoname = explode('.',$photo);
$uploadphoto = uniqid().".".end($photoname);

if($name != ""){
    if($phone != ""){
        if($password != ""){
            if($photo != ""){
                
            $query = mysqli_query($db,"INSERT INTO `users` (`name`,`phone`,`password`,`role`,`photo`) VALUES ('$name','$phone','$password','$role','$uploadphoto')");

            if($query){
                move_uploaded_file($tmp_name,"../uploads/$uploadphoto");
                    echo "
                    <script>
                    alert('Registration Successful!');
                    window.location = '../login.php';
                    </script>
                ";
            }else{
                echo "
                    <script>
                    alert('Registration Failed!');
                    window.location = '../signup.php';
                    </script>
                ";
            }
            
            
            }else{
            echo "
                <script>
                alert('Photo not found!');
                window.location = '../signup.php';
                </script>
            ";
            }

        }else{
        echo "
            <script>
            alert('Phone not found!');
            window.location = '../signup.php';
            </script>
        ";
        }
    }else{
        echo "
        <script>
        alert('Phone not found!');
        window.location = '../signup.php';
        </script>
    ";
    }
}
else{
    echo "
        <script>
        alert('Name not found!');
        window.location = '../signup.php';
        </script>
    ";    
}



?>