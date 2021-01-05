<?php 
    require 'conn.php';
    session_start();

    if( !$_SESSION['u_name']){
        header('Location: index.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
     
    <!-- navbar start -->
    
    <?php require 'nav.php'; ?>
   
    <!-- navbar finish -->

    <!-- main content start -->
    
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
               <div class="panel panel-default">
                   <div class="panel-heading">Employees</div>
                   <ul class="list-group">
                       <li class="list-group-item"><a href="add_new_employee.php">Add New Employee</a></li>
                       <li class="list-group-item"><a href="dash.php">View All Employees</a></li>

                   </ul>
               </div>
            </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add Employee</div>
                        <div class="panel-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control input-sm" name = "e_name" placeholder="Employee Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control input-sm" name = "e_email" placeholder="Employee Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control input-sm" name = "e_phone" placeholder="Employee Phone Number" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-sm btn-success" value="Add Employee" name="e_add">
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
        </div>
    </div>
    
    <!-- main content finish -->
    
    <?php 
    
    if(isset($_POST['e_add'])){
        $e_name = $_POST['e_name'];
        $e_email = $_POST['e_email'];
        $e_phone = $_POST['e_phone'];
        
        $sql = "INSERT INTO employees(e_name, e_email, e_phone) VALUES ('$e_name', '$e_email', '$e_phone')";
        
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('New record inserted successfully!');</script>";
        }
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } 
    }
    
    
    ?>

    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>