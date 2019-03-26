<?php
    $borrower_id='';
    if(isset($_GET['view_borrower_id'])){
        $borrower_id = $_GET['view_borrower_id'];
    }
    
    $view_borrower = mysqli_query($conn, "select * from borrower where borrower_id = '$borrower_id'");
   
?>


<div class="modal" id="view_borrower" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <?php while ($row = mysqli_fetch_array($view_borrower)) { ?>
                <button type="button" class="close" id="close" onclick="$('#view_borrower').fadeOut()">&times;</button>
                <h4 class="modal-title" ><strong><?php echo $row['First_Name']. "  " .  $row['Last_Name']; ?></strong></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5">

                        <?php } ?>
                    </div>
                    <div class="col-sm-7">
                        <table class="table table-responsive table-bordered table-condensed table-hover table-striped">
                            <tr>
                                <td>First_Name</td>
                                <td class="value"><?php echo $row['First_Name'] ?></td>
                            </tr>
                           
                            <tr>
                                <td>Last_Name</td>
                                <td class="value"><?php echo $row['Last_Name']; ?></td>
                            </tr>
                            <tr>
                                <td>Position</td>
                                <td class="value"><?php echo $row["Position"]?> </td>
								
								<td>Course</td>
                                <td class="value"><?php echo $row["Course"]?> </td>

                            </tr>
                           

                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <blockquote class="well blockquote-reverse pull-right"> <?php echo $row['Bio']; ?> </blockquote>
                    </div>
                </div>
                            
            
            
            
            </div>
            
            
            <div class="modal-footer">
                <button type="button" onclick="$('#view_borrower').fadeOut();" class="btn btn-primary" ><span class="glyphicon glyphicon-ok"></span> Ok</button>
                <button type="button" onclick="$('#view_borrower').fadeOut();" class="btn btn-danger" ><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>