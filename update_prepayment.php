<?php
    session_start();
    include("include/db_connect.php");

    $prepayment_id = $_GET['id'];
      
    $get_prepayment = mysqli_query($conn, "SELECT * FROM `prepayment` where prepayment_id = '$prepayment_id'");

    $row = mysqli_fetch_array($get_prepayment);
    
    
        if(isset($_POST['submit'])){
        
        $prepayment_id = $_POST['prepayment_id'];
        $borrower_id = $_POST['borrower'];
        $tools = $_POST['tools'];
        $penalty = $_POST['penalty'];
        $quantity = $_POST['quantity'];

        $update = "UPDATE prepayment SET prepayment_id='$prepayment_id', borrower='$borrower_id',tools='$tools',penalty='$penalty',quantity='$quantity' WHERE prepayment_id = '$prepayment_id'";
    if (mysqli_query($conn, $update)) {
    echo "
            <script>
                    var msg = confirm('Data Inserted');
                    if(msg == true || msg == false){
                        location.href='prepayment.php';
                    }
            </script
            ";
        } else {
            echo "Error: " . $update . "<br>" . mysqli_error($conn);
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
            </li>
        </ul>
    </div><!-- /.navbar-collapse --><!-- /.container-fluid -->
</nav>  
</div>
     
        <br><br><br><br><br><br>
             
 <div class="container-fluid">
            <form  method="post" enctype="multipart/form-data">
            <div style="text-align:center" class="col-sm-3 col-sm-offset-2">  
            </div>
                <div class="col-sm-3">
                    <div class="form-group">
                    <?php
                        $borrower = "SELECT * FROM `borrower` "; 
                        $query = mysqli_query($conn, $borrower);
                    ?>
                            <label form="borrower">Name</label>
                            <select class="form-control" name="borrower" placeholder="Name" autofocus required>
                                    <option value=""></option>
                                        <?php while ($row = mysqli_fetch_array($query)) { ?>
                                    <option value="<?php echo $row['borrower_id']; ?>"> <?php echo ucfirst($row[1]." ".$row[2])?> </option>
                                        <?php } ?>
                            </select>
                             <div class="form-group">
                    <?php
                        $penalty = "SELECT * FROM `penalty` "; 
                        $query = mysqli_query($conn, $penalty);
                    ?>
                            <label form="penalty">Penalty Type</label>
                            <select class="form-control" name="penalty" placeholder="Penalty Type" autofocus required>
                                    <option value=""></option>
                                        <?php while ($row = mysqli_fetch_array($query)) { ?>
                                    <option value="<?php echo $row['penalty_id']; ?>"> <?php echo ucfirst($row[1])?> </option>
                                        <?php } ?>
                            </select>
                                     <div class="col-sm-6">
                                     <div class="form-group">
                                            <?php
                                                $tools = "select * from tools";
                                                $query = mysqli_query($conn, $tools);
                                            ?>
                                    <label for="tools">Tool Name</label>
                            <select class="form-control" name="tools" placeholder="Name" autofocus required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_array($query)) { ?>
                                                        <option value="<?php echo $row['tool_id']; ?>"> <?php echo ucfirst($row[1] )?> </option>
                                                     <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <select name="quantity" class="form-control" id="quantity" autofocus required>
                                                <option value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                 <button type="submit" name="submit" class="btn btn-success btn-block-sm">Save</button>
             </div>
         </form>
</body>
</html>