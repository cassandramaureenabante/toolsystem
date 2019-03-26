<?php
    session_start();

    include("include/db_connect.php");

    $section = '';
    $section_err =  '';

    if(isset($_POST['submit'])){
     
        $sname = $_POST['sname'];
        
        // INSERT INTO `department` (`department_id`, `departmentname`, `borrower_id`) VALUES (NULL, 'dfjsldfjlsdfsd', '39');
        $insert = "INSERT INTO `section`(`section_id`, `sectionname`) VALUES (NULL,'$sname')";
        
        if (mysqli_query($conn, $insert)) {
            echo "
            <script>
                    var msg = confirm('Section Inserted');
                    if(msg == true || msg == false){
                        location.href='insert_section.php';
                    }
            </script
            ";
        } else {
            echo "Error: " . $insert . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);   

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
            <li class=""><a href="department.php">Department <span class="sr-only">&gt;</span></a></li>
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
			<form action="" method="post" enctype="multipart/form-data">
			<div style="text-align:center" class="col-sm-3 col-sm-offset-2">
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="section-name">Section Name</label>
					<input type="text" class="form-control text-field" id="sname" name="sname" placeholder="Section Name" autofocus required>
        </div>
                 <button type="submit" name="submit" class="btn btn-success btn-block-sm">Save</button>       
                </div>
            </div>
     
                   
                    
   
        </form>
    </div>

		
</html>		
</body>