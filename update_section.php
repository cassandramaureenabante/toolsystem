<?php
	//start the session
	session_start();

	// include db configuration
	include('include/db_connect.php');

	// user's information
	$member_id = $_SESSION['id'];
	$member_name = $_SESSION['name'];
  
    $section_id = $_GET['id'];

  // $get_borrower = "SELECT * FROM `borrower` where borrower_id = '$borrower_id'";

	$get_section = mysqli_query($conn, "SELECT * FROM `section` where section_id = '$section_id'");
  
  $row = mysqli_fetch_array($get_section);
  
  if(isset($_POST['submit'])){
	  

    $sname = $_POST['sname'];

	
    $update = "UPDATE `section` SET `sectionname`='$sname' WHERE section_id = ". $section_id;
    if (mysqli_query($conn, $update)) {
      echo "
			<script>
                var msg = confirm('Section Updated');
                if(msg == true || msg == false){
                location.href='insert_section.php';
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
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome <?php echo $member_name; ?> <span <!--span class="caret"--></span></a>
                <ul class="dropdown-menu">
                <li id="profile"><a href="profile.php">Profile Settings</a></li>
                <li id="changepassword"><a href="changepassword.php">Change Password</a></li>
                <li id="logout"><a href="login.php"> Log Out</a></li>
                </ul>
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
        <input type="hidden" value="<?php echo $row[0]; ?>" name="borrower_id" >
				<div class="form-group">
					<label for="section-name">Section Name</label>
					<input type="text" class="form-control text-field" id="sname" value="<?php echo $row[1] ?>" name="sname" placeholder="Section Name" autofocus required>
        </div>
                 <button type="submit" name="submit" class="btn btn-success btn-block-sm">Update Section</button>       
                </div>
            </div>
        </form>
    </div>



			
			<!-- View Borrower -->
			<?php
			if(isset($_GET['view_section_id']) == 1 ){ ?>
				<?php include('view_section.php'); ?>
				<script type='text/javascript'>
					$('#view_section').fadeIn();
					
					window.onclick = function(event) {
						if (event.target == modal) {
							$('#view_section').fadeOut();
						}
					}
				</script>	
			<?php } 
			?>


			<!-- Delete Borrower -->
			<?php
			if(isset($_GET['delete_section_id']) == 1 ){ ?>
				<?php include('delete_section.php'); ?>
				<script type='text/javascript'>
					$('#delete_section_id').fadeIn();
					
					window.onclick = function(event) {
						if (event.target == modal) {
							$('#delete_section_id').fadeOut();
						}
					}
				</script>	
			<?php } ?> 
			
</body>
</html>