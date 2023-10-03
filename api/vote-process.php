<?php 
session_start();
include('../db.php');
$currentSession = $_SESSION['user_phone'];


if(isset($_GET['voteTo'])){
    $voteTo = $_GET['voteTo'];

    $selectq = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM `users` WHERE `role`='Group' AND `name` = '$voteTo'"));

    $dbVotes = intval($selectq['total_votes']);
    $updateVote = $dbVotes + 1;

    $updateVotequery = mysqli_query($db,"UPDATE `users` SET `total_votes` = '$updateVote' WHERE `role`='Group' AND `name` = '$voteTo'");
    if($updateVotequery){
        $updateUser_status = mysqli_query($db,"UPDATE `users` SET `status` = 1 WHERE `phone` = '$currentSession'");
        if($updateUser_status){
            header("location: ../dashboard.php");
        }else{    
            echo "
            <script>
            alert('Failed to update Voted!');
            window.location = '../dashboard.php';
            </script>
        ";
        }
    }else{
        echo "
        <script>
        alert('Failed to Update Vote');
        window.location = '../dashboard.php';
        </script>
    ";
    }


}


?>