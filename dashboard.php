<?php 
include("db.php");
session_start();
if(!isset($_SESSION['user_phone'])){
   header("location:login.php"); 
}

 $currentSession = $_SESSION['user_phone'];


$currentUser = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM `users` WHERE `phone` = '$currentSession'"));


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard - <?php echo $currentUser['name']; ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" href="./uploads/<?php echo $currentUser['photo'];?>" type="image/x-icon">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h2 class="text-center mb-3">Online Voting System</h2>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="#" class="btn btn-primary">Back</a>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
                <div class="row m-3">
                    <div class="col-md-4 mt-5 shadow p-3" style="height: 350px">
                        <img src="<?php echo "uploads/".$currentUser['photo']; ?>" style=" width: 150px; height: 150px;
                            border-radius: 50%" alt="Profile Logo" class="mb-3 d-block mx-auto" />
                        <div class="card p-3">
                            <p class="mb-0">Name: <strong
                                    style="font-family: 'Operator Mono';"><?php echo $currentUser['name']; ?></strong>
                            </p>
                            <p class=" mb-0">Phone: <strong
                                    style="font-family: 'Operator Mono';"><?php echo $currentUser['phone']; ?></strong>
                            </p>
                            <p class="mb-0">Role: <strong style="font-family: 'Operator Mono';">
                                    <?php echo $currentUser['role']; ?></strong>
                            </p>
                            <p class="mb-0">Status: <i class="text-<?php if($currentUser['status'] == 1){
                                        echo "success";
                                    }else{
                                        echo "danger" ;
                                    }
                                        ?>">
                                    <?php if($currentUser['status'] == 1){
                                        echo "Voted";
                                    }else{
                                        echo "Not Voted" ;
                                    }
                                        ?>

                                </i>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-7 mt-5 shadow p-3" style="height: 500px; overflow-y: scroll" ;>
                        <h2 class="text-center bg-white">Candidates</h2>


                        <?php 
                        
                                $data = mysqli_query($db,"SELECT * FROM `users` WHERE `role` = 'Group'");
                                while($row = mysqli_fetch_array($data)){ ?>


                        <div class="card mb-3">
                            <div class="d-flex justify-content-between align-items-start p-3">
                                <div class="left">
                                    <h5 class="mb-2">Group Name: <strong><?php echo $row['name']; ?></strong></h5>
                                    <h5 class="mb-3">Total Vote: <strong class="text-primary"><?php echo $row['total_votes']; ?></strong>
                                    </h5>
                                    <button onclick="window.location = './api/vote-process.php?voteTo=<?php echo $row['name'];?>'" class="btn mb-3 btn-<?php if($currentUser['status'] == 1){
                                        echo "success";
                                    }else{
                                        echo "primary" ;
                                    }
                                        ?>" 
                                        <?php if($currentUser['status'] == 1){
                                        echo "disabled='true'";
                                    }
                                        ?>
                                        ><?php if($currentUser['status'] == 1){
                                        echo "Voted";
                                    }else{
                                        echo "Vote" ;
                                    }
                                  
                                        ?></button>

                                        <?php 
                                        
                                        $dbtotalVotes = mysqli_fetch_array(mysqli_query($db,"SELECT SUM(`total_votes`) FROM `users`"))[0];
                                        $totalvotes = $row['total_votes'];
                                        if(intval($dbtotalVotes) !== 0){
                                            $percentage = (100 / intval($dbtotalVotes) * intval($totalvotes))  ;
                                        }else{
                                            $percentage = "0";
                                        }

                                        ?>

                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentage;?>%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="1000"><?php echo $totalvotes = $row['total_votes']; ?></div>
                                        </div>
                                </div>
                                <img src="uploads/<?php echo $row['photo']; ?>"
                                    style="width: 100px; height: 100px; border-radius: 50%" alt="" class="mb-3" />
                            </div>
                        </div>

                        <?php
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>