<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Voting System - Sign Up</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 middle">
                <h2 class="text-center mb-3">Online Voting System</h2>
                <form action="./api/register.php" method="post" enctype="multipart/form-data" class="border p-3">
                    <h4 class="text-center mb-3">Registration form</h4>
                    <input type="text" class="form-control mb-3" name="name" placeholder="Name" />
                    <input type="number" class="form-control mb-3" name="phone" placeholder="Phone Number" />
                    <input type="password" class="form-control mb-3" name="password" placeholder="password" />
                    <input type="file" class="form-control p-1 mb-3" name="photo" accept=".jpg,.png,.jpeg" />
                    <select name="role" class="form-control mb-3">
                        <option value="Voter">Voter</option>
                        <option value="Group">Group</option>
                    </select>
                    <button type="submit" class="btn d-block mx-auto mb-3 btn-primary">
                        Sign Up
                    </button>
                    <p class="text-center">
                        Have you account? <a href="login.php">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

