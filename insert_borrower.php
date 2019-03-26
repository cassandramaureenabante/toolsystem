<?php
    session_start();
    include("include/db_connect.php");

    if(isset($_POST['submit'])){
     
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $department = $_POST['department'];
        $section = $_POST['section'];
        $position = $_POST['position'];
        $cnumber =$_POST['cnumber'];
        $emailadd =$_POST['emailadd'];
        $address =$_POST['address'];


        $insert = "INSERT INTO `borrower` (`borrower_id`, `first_name`, `last_name`, `department`, `section`,`position`,`contactnumber`, `email_address`,`address`, `member_id`) VALUES (NULL, '$fname', '$lname', '$department', '$section','$position','$cnumber', '$emailadd','$address','$member_id');";
        if (mysqli_query($conn, $insert)) {
            echo "
            <script>
                    var msg = confirm('Borrower Inserted');
                    if(msg == true || msg == false){
                        location.href='insert_borrower.php';
                    }
            </script
            ";
        } else {
            echo "Error: " . $insert . "<br>" . mysqli_error($conn);
        }
    }
     if(empty($_POST['email'])){
            $email_err = "Please enter an Email";
        }else{
            $email = $_POST['email'];

            $query = "select * from member where email = '$email'";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);
            if($count > 0 ){
                $email_err = "Email is already Exist!";
            }else{
                $email = $_POST['email'];
            }
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Tool Room System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css">
        <link href="bootstrap-3.3.7/css/mystyle.css"  type="text/css" rel="stylesheet">
        <link href="bootstrap-3.3.7/images/tools.jpg"rel=icon>
        <script src="bootstrap-3.3.7/js/jquery.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <style>
            table{
                background-color: white
            }
        </style>
</head>
<body>
    <div class="background">
    <nav class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
                <img style="float:left;" alt="Tool System " src="bootstrap-3.3.7/images/8.png" width="100" height="80">
                
        </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class=""><a href="borrower.php">Borrower <span class="sr-only">&gt;</span></a></li>
            <li class=""><a href="department.php">Department<span class="sr-only">&gt;</span></a></li>
            <li class=""><a href="section.php">Section<span class="sr-only">&gt;</span></a></li>
            <li class=""><a href="position.php">Position<span class="sr-only">&gt;</span></a></li>
            <li class=""><a href="tools.php">Tools<span class="sr-only">&gt;</span></a></li>
            <li class=""><a href="penalty.php">Penalty<span class="sr-only">&gt;</span></a></li>
            <li class=""><a href="transaction.php">Transaction<span class="sr-only">&gt;</span></a></li>
            <li class=""><a href="prepayment.php">Prepayment<span class="sr-only">&gt;</span></a></li>
        </ul>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="btn btn-primary" href="login.php">Logout</a></button>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse --><!-- /.container-fluid -->
</nav>  
</div>

<br><br><br><br><br><br>
        <div class="container-fluid">
            <form action="insert_borrower.php" method="post" enctype="multipart/form-data">
            <div style="text-align:center" class="col-sm-3 col-sm-offset-2">
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" class="form-control text-field" id="fname" name="fname" placeholder="First Name" autofocus required>
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" class="form-control text-field" name="lname" placeholder="Last Name" autofocus required>
                </div>
                <div class="form-group">
                    <label for="contactnumber">Contact Number</label>
                    <input type="text" class="form-control text-field" name="cnumber" placeholder="Cellphone Number" autofocus required>
                </div>
                <div class="form-group">
                    <label for="email-address">Email Address</label>
                    <input type="email" class="form-control text-field" name="emailadd" placeholder="Email Address" autofocus required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control text-field" name="address" placeholder="Address" autofocus required>
                </div>
                <div class="form-group">
                    <?php
                        $department = "SELECT * FROM `department` "; 
                        $query = mysqli_query($conn, $department);
                    ?>
                            <label form="department">Department Code </label>
                            <select class="form-control" name="department" placeholder="Department Name" autofocus required>
                                    <option value=""></option>
                                        <?php while ($row = mysqli_fetch_array($query)) { ?>
                                    <option value="<?php echo $row['department_id']; ?>"> <?php echo ($row[1])?> </option>
                                        <?php } ?>
                            </select>
                        </div>
                                    <div class="col-sm-6">
                                     <div class="form-group">
                                            <?php
                                                $section = "select * from `section` ";
                                                $query = mysqli_query($conn, $section);
                                            ?>
                                    <label for="section">Section</label>
                                    <select class="form-control" name="section" placeholder="Section Name" autofocus  required>
                                        <option value=""></option>
                                         <?php while ($row = mysqli_fetch_array($query)) { ?>
                                            <option value="<?php echo $row['section_id']; ?>"> <?php echo ($row[1])?> </option>
                                        <?php } ?>
                                 </select>
                             </div>
                         </div>
                                         <div class="col-sm-6">
                                         <div class="form-group">
                                            <?php
                                                $position = "select * from `position` ";
                                                $query = mysqli_query($conn, $position);
                                            ?>
                                    <label for="position">Position</label>
                                    <select class="form-control" name="position" placeholder="Position Type" autofocus  required>
                                        <option value=""></option>
                                         <?php while ($row = mysqli_fetch_array($query)) { ?>
                                            <option value="<?php echo $row['position_id']; ?>"> <?php echo ($row[1])?> </option>
                                        <?php } ?>
                                 </select>
                                 </form>
                        </div>
                    </div>
                 <button type="submit" name="submit" class="btn btn-success btn-block-sm">Save</button>
             </div>
</body>
</html>