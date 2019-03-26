<?php
    //start the session
    session_start();

    // include db configuration
    include('include/db_connect.php');
  
    $position_id = $_GET['id'];

  // $get_borrower = "SELECT * FROM `borrower` where borrower_id = '$borrower_id'";

    $get_position = mysqli_query($conn, "SELECT * FROM `position` where position_id = '$position_id'");
  
  $row = mysqli_fetch_array($get_position);
  
  if(isset($_POST['submit'])){
      

    $pname = $_POST['pname'];

    
    $update = "UPDATE `position` SET `positionname`='$pname' WHERE position_id = ". $position_id;
    if (mysqli_query($conn, $update)) {
      echo "
            <script>
                var msg = confirm('Position Updated');
                if(msg == true || msg == false){
                location.href='insert_position.php';
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
<br><br><br><br><br><br><br>
        <div class="container-fluid">
            <form action="?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
            <div style="text-align:center" class="col-sm-3 col-sm-offset-2">
            </div>
            <div class="col-sm-4">
        <input type="hidden" value="<?php echo $row[0]; ?>" name="position_id" >
                <div class="form-group">
                    <label for="position-name">Position Name</label>
                    <input type="text" class="form-control text-field" id="pname" value="<?php echo $row[1] ?>" name="pname" placeholder="Position Name" autofocus required>
        </div>
                 <button type="submit" name="submit" class="btn btn-success btn-block-sm">Update Position</button>       
                </div>
            </div>
        </form>
    </div>



            
            <!-- View Borrower -->
            <?php
            if(isset($_GET['view_position_id']) == 1 ){ ?>
                <?php include('view_position.php'); ?>
                <script type='text/javascript'>
                    $('#view_position').fadeIn();
                    
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            $('#view_position').fadeOut();
                        }
                    }
                </script>   
            <?php } 
            ?>


            <!-- Delete Borrower -->
            <?php
            if(isset($_GET['delete_position_id']) == 1 ){ ?>
                <?php include('delete_position.php'); ?>
                <script type='text/javascript'>
                    $('#delete_position_id').fadeIn();
                    
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            $('#delete_position_id').fadeOut();
                        }
                    }
                </script>   
            <?php } ?> 
            
</body>
</html>