<?php
    session_start();
include("include/db_connect.php");

      
    $borrower = $tools = $quantity = '';
    $borrower_err = $tools_err = $quantity_err = '';
function loadtools($conn){  
    $output = "";
    $tools = "select * from tools;";
    $query = mysqli_query($conn, $tools);

    while($row = mysqli_fetch_assoc($query)){
        $output .= '<option value="'.$row["tool_id"].'">'.$row["tool_name"].'</option>';
    }
    return $output;
                                                                 
}
    

if(isset($_POST['submit'])){
        
        
        $borrower = $_POST['borrower'];
        $tools = $_POST['tools'];
        $quantity = $_POST['quantity'];
        $transaction = array();
        $query = "";

        $sql = "INSERT INTO `transaction` (`borrower`) VALUES ($borrower);";
        $result = mysqli_query($conn, $sql);

        if($result == true){
            $sql1 = "SELECT transaction_id FROM transaction ORDER BY transaction_id DESC LIMIT 1";
            $result1 = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_array($result1);
            for($i=0; $i < count($_POST['tools']); $i++){
                $transaction[] = $row['transaction_id'];
            }
            for($j=0; $j< count($_POST['tools']);$j++){
                $tool_id = mysqli_real_escape_string($conn, $tools[$j]); 
                $qty = mysqli_real_escape_string($conn, $quantity[$j]); 

                $sql2 = "SELECT quantity FROM tools WHERE tool_id='$tool_id'";
                $result2 = mysqli_query($conn, $sql2);
                $qty1 = mysqli_fetch_array($result2);
                $newqty = $qty1['quantity'] - $qty;
                $sql3 = "UPDATE tools SET quantity=$newqty WHERE tool_id='$tool_id'";
                $result2 = mysqli_query($conn, $sql3);
            }
            for($num=0; $num<count($_POST['tools']); $num++){
                $tools1 = mysqli_real_escape_string($conn, $tools[$num]);
                $quantity1 = mysqli_real_escape_string($conn, $quantity[$num]);
                $transaction1 = mysqli_real_escape_string($conn, $transaction[$num]);

                $query .= "INSERT INTO borrowed_tools(transaction_id,tools,quantity) VALUES($transaction1,$tools1,$quantity1);";
            }

            if($query != ""){
                if(mysqli_multi_query($conn, $query)){
                     echo "<script>var msg = confirm('Data Inserted');
                    if(msg == true || msg == false){
                        location.href='transaction.php';
                    }</script>";
                }else{
                     echo "<script>var msg = confirm('Something went wrong!');
                    if(msg == true || msg == false){
                        location.href='insert_transaction.php';
                    }
            </script>";
                }

       /* if (mysqli_query($conn, $sql)) {
                $sql1 = "SELECT quantity FROM tools WHERE tool_id='$tools'";
                $result1 = mysqli_query($conn, $sql1);
                $qty = mysqli_fetch_array($result1);
                $newqty = $qty['quantity'] - $quantity;
                $sql2 = "UPDATE tools SET quantity=$newqty WHERE tool_id='$tools'";
                $result2 = mysqli_query($conn, $sql2);
            echo "
            <script>
                    var msg = confirm('Data Inserted');
                    if(msg == true || msg == false){
                        location.href='transaction.php';
                    }
            </script
            ";*/

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
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
                <div class="w-100">
                    <div class="form-group w-50" style="width:200px;">
                    <?php
                        $borrower = "SELECT * FROM `borrower` "; 
                        $query = mysqli_query($conn, $borrower);
                    ?>
                            <label form="borrower">Name</label>
                            <select class="form-control" name="borrower" placeholder="Name" autofocus required>
                                    <option selected>Select Name</option>
                                        <?php while ($row = mysqli_fetch_array($query)) { ?>
                                    <option value="<?php echo $row['borrower_id']; ?>"> <?php echo ucfirst($row[1]." ".$row[2])?> </option>
                                        <?php } ?>
                            </select>
                        </div><div class="table-responsive">
                                <table class="table w-100 table-bordered" id="tools">
                                    <tr><td>
                                     <div class="col-sm-6">
                                     <div class="form-group">
                                            <?php
                                                $tools = "select * from tools";
                                                $query = mysqli_query($conn, $tools);
                                            ?>
                                    <label for="tools">Tool Name</label>
                                         <select class="form-control" id="tools1" name="tools[]" placeholder="Name" autofocus required>
                                            <option selected>Select Tool Name</option>                                           
                                            <?php while ($row = mysqli_fetch_array($query)) { ?>
                                                        <option value="<?php echo $row['tool_id']; ?>"> <?php echo ucfirst($row[1] )?> </option>
                                                     <?php } ?>
                                                </select>
                                            </div>
                                        </div></td>
                                        <td>
                                     <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input type="int" class="form-control text-field" id="quantity1" name="quantity[]" placeholder="Quantity">
                                        </div>
                                    </div></td>
                                </tr>
                                    </table>
                            <button type="submit" name="submit" class="btn btn-success btn-block-sm">Save</button>
                            <button type="button" class="add btn btn-success btn-block-sm">+</button>

                 
                  

             </div>
         </div>
         </form>
</div>
<script>
        $(document).ready(function(){
            var count = 1;
            $(document).on('click','.add', function(){
                count += 1;
                var html_code = ''; 
                html_code += '<tr id="row_id_'+count+'">';
                html_code += '<td> <div class="col-sm-6"><div class="form-group"><label form="borrower">Tool Name</label><select  class="form-control" name="tools[]" placeholder="Name" autofocus required id="tools'+count+'"><option selected>Select Tool Name</option><?php echo loadtools($conn); ?></select></div></div></td>';
                html_code += '<td><div class="col-sm-6"><div class="form-group"><label for="quantity">Quantity</label><input type="int" name="quantity[]" min="1" id="quantity'+count+'" data-srno="'+count+'" placeholder="Quantity"  class="form-control form-control-sm nput-sm quantity" /></div></div</td>';
                html_code += '<td><button type="button" id="'+count+'" class="btn btn-sm btn-danger remove">-</button></tr>';
                $("#tools").append(html_code);
            });
      
/*  function load($count){
        var products =  $("#quantity'+count+'").val();
    $.ajax({
      url : "transaction.php",
      method: "POST",
      dataType: "json",
      data: {products:products},
      success : function(data){
        for(x in data){
            $('#barcode'+count).val(data.product_code);
            $('#buy_price'+count).val(data.price);
            $('#unit'+count).val(data.unit);
          }
      }
    });
  }*/
  $(document).on('click','.remove',function(){
    var row_id = $(this).attr("id");
        $('#row_id_'+row_id).remove();
    count -= 1;
  });


});</script>
</body>
</html>