<?php
	//start the session
	session_start();

	// include db configuration
	include('include/db_connect.php');

	$tool_id = $_GET['id'];

	$get_tools = mysqli_query($conn, "SELECT * FROM `tools` where tool_id = '$tool_id'");
    
    $row = mysqli_fetch_array($get_tools);
  
  if(isset($_POST['submit'])){
	  
    $tool_id = $_POST['tool_id'];
    $toolname = $_POST['tool_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
	
    $update = "UPDATE `tools` SET `tool_name`='$toolname',`price`='$price',`quantity`='$quantity' WHERE tool_id = ". $tool_id;
    if (mysqli_query($conn, $update)) {
    echo "
	        <script>
                var msg = confirm('Tools Updated');
                if(msg == true || msg == false){
                location.href='insert_tools.php';
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
			<input type="hidden" value="<?php echo $row[0]; ?>" name="tool_id" >
				<div class="form-group">
					<label for="tool-name">Tool Name</label>
					<input type="text" class="form-control text-field" id="tname" value="<?php echo $row[1] ?>" name="tool_name"  autofocus required>
				</div>
				<div class="form-group">
					<label for="price">Price</label>
					<input type="text" class="form-control text-field"id="price" value="<?php echo $row[2] ?>"  name="price" placeholder="₱00.00" autofocus required>
				</div>
				<div class="form-group">
					<label for="quantity">Quantity</label>
					<input type="text" class="form-control text-field"id="quantity" value="<?php echo $row[3] ?>" name="quantity" autofocus required>
				</div>
                 <button type="submit" name="submit" class="btn btn-success btn-block-sm">Update Tools</button>       
                </div>
            </div>
        </form>
    </div>

			
			<!-- View Tools -->
			<?php
			if(isset($_GET['view_tool_id']) == 1 ){ ?>
				<?php include('view_tools.php'); ?>
				<script type='text/javascript'>
					$('#view_tools').fadeIn();
					
					window.onclick = function(event) {
						if (event.target == modal) {
							$('#view_tools').fadeOut();
						}
					}
				</script>	
			<?php } 
			?>


			<!-- Delete Tools -->
			<?php
			if(isset($_GET['delete_tool_id']) == 1 ){ ?>
				<?php include('delete_tools.php'); ?>
				<script type='text/javascript'>
					$('#delete_tool_id').fadeIn();
					
					window.onclick = function(event) {
						if (event.target == modal) {
							$('#delete_tool_id').fadeOut();
						}
					}
				</script>	
			<?php } ?> 
			
</body>