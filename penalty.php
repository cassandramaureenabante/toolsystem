<?php
	//start the session
	session_start();

	// include db configuration
	include('include/db_connect.php');
	
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
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;
		<a class="btn btn-primary" href="insert_penalty.php">Add Notes</a></button>
	</div>
		<div class="container-fluid">
            <div style="text-align:center;" class="col-sm-offset-2">
                <div class="col-sm-10">
                <div class="form-group">
				<h1>PENALTY INFORMATION</h1>
					<style>
						h1{
							background-color: white
						}
					</style>
							<table class="table table-striped table-inverse table-responsive">
						<thead class="thead-inverse">
							<tr>
							
							<?php

								$sql = "SELECT penalty_id as ID, penaltyname as 'Penalty Name', from penalty";
								if( $fields = mysqli_query($conn,$sql) ){
									while( $fieldinfo = mysqli_fetch_field($fields) ){
										echo "<th>$fieldinfo->name</th>";
									}
									//Free result set
									mysqli_free_result($fields);
								}
							?>	
								<th class="text-center" colspan="">Penalty ID</th>
								<th class="text-center" colspan="">Penalty Code</th>
								<th class="text-center" colspan="">Penalty Name</th>
								<th class="text-center" colspan="3">Operation</th>
							</tr>
						</thead>
						

						<!-- data here -->
						<tbody>
							<?php 
							$sql = "select * from penalty ";
							$result = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($result)) { ?>
							<tr class ="text-center">
								<td><?php echo $row[0] ?></td>
								<td><?php echo $row[1] ?></td>
								<td><?php echo $row[2] ?></td>

								  <td> <a class="btn btn-success" href="update_penalty.php?id=<?php echo $row[0]; ?>">Update </a> </td>
                                <td> <a class="btn btn-primary" href="delete_penalty.php?id=<?php echo $row[0];  ?>">Delete</a> </td
                            </tr>
								

							<?php
							}
							
							?>
						</tbody>
				</div>
			</div>
				
			<!-- View department -->
			<?php
			if(isset($_GET['view_penalty_id']) == 1 ){ ?>
				<?php include('view_penalty.php'); ?>
				<script type='text/javascript'>
					$('#view_penalty').fadeIn();
					
					window.onclick = function(event) {
						if (event.target == modal) {
							$('#view_penalty').fadeOut();
						}
					}
				</script>	
			<?php } 
			?>


			<!-- Delete Borrower -->
			<?php
			if(isset($_GET['delete_penalty_id']) == 1 ){ ?>
				<?php include('delete_penalty.php'); ?>
				<script type='text/javascript'>
					$('#delete_penalty_id').fadeIn();
					
					window.onclick = function(event) {
						if (event.target == modal) {
							$('#delete_penalty_id').fadeOut();
						}
					}
				</script>	
			<?php } ?> 
				</script>	
			</tr>
		</tbody>
	</table>
	</html>
</body>
