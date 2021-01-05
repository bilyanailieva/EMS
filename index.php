<?php 


    require 'conn.php'; 
    session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-lg-push-4 col-md-push-4">
                <div class="panel panel-default" style="margin-top: 50px;">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" name="u_name" required placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control input-sm" name="u_pass" required placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-sm" name="u_login" value="Login as Admin">
                                <a href="register.php" class="btn btn-info btn-sm">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    
    <?php
    
    if(isset($_POST['u_login'])){
        
        $login = FALSE;
        
        $u_name = $_POST['u_name'];
        $u_pass = $_POST['u_pass'];
        
        $sql = "SELECT * FROM users WHERE u_name='$u_name'";
        
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0){
            while($user = mysqli_fetch_assoc($result)){
                if($u_name == $user['u_name']){
                    if(password_verify($u_pass, $user['u_pass'])){
                    //echo '<script>alert("Success!");</script>';
                        $_SESSION['u_name'] = $u_name;
                        header('Location: dash.php');
                        }
                }
                else{
                    echo '<script>alert("Error username or password incorrect!");</script>';
                }
            }
        } else {
            echo "0 results";
        }
       
    
    
    }
    
    
    ?>
    
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    
</body>
</html>