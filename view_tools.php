<?php
    $borrower_id='';
    if(isset($_GET['view_tool_id'])){
        $borrower_id = $_GET['view_tool_id'];
    }
    
    $view_tool = mysqli_query($conn, "select * from tools where tool_id = '$tool_id'");
   
?>


<div class="modal" id="view_tools" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <?php while ($row = mysqli_fetch_array($view_tools)) { ?>
                <button type="button" class="close" id="close" onclick="$('#view_tools').fadeOut()">&times;</button>
                <h4 class="modal-title" ><strong><?php echo $row['Tool_Name']. "  " .  $row['Last_Name']; ?></strong></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5">

                        <?php } ?>
                    </div>
                    <div class="col-sm-7">
                        <table class="table table-responsive table-bordered table-condensed table-hover table-striped">
                            <tr>
                                <td>Tool</td>
                                <td class="value"><?php echo $row['tool_name'] ?></td>
                            </tr>
                           
                            <tr>
                                <td>Price</td>
                                <td class="value"><?php echo $row['price']; ?></td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td class="value"><?php echo $row["quantity"]?> </td>

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
                <button type="button" onclick="$('#view_tools').fadeOut();" class="btn btn-success" ><span class="glyphicon glyphicon-ok"></span> Ok</button>
                <button type="button" onclick="$('#view_tools').fadeOut();" class="btn btn-dark" ><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>