<?php
    $penalty_id='';
    if(isset($_GET['view_penalty_id'])){
        $penalty_id = $_GET['view_penalty_id'];
    }
    
    $view_penalty = mysqli_query($conn, "select * from penalty where penalty_id = '$penalty_id'");
   
?>


<div class="modal" id="view_penalty" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <?php while ($row = mysqli_fetch_array($view_penalty)) { ?>
                <button type="button" class="close" id="close" onclick="$('#view_penalty').fadeOut()">&times;</button>
                <h4 class="modal-title" ><strong><?php echo $row['penaltyname']?></strong></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5">

                        <?php } ?>
                    </div>
                    <div class="col-sm-7">
                        <table class="table table-responsive table-bordered table-condensed table-hover table-striped">
                            <tr>
                                <td>Penalty</td>
                                <td class="value"><?php echo $row["penaltyname"]?> </td>

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
                <button type="button" onclick="$('#view_penalty').fadeOut();" class="btn btn-primary" ><span class="glyphicon glyphicon-ok"></span> Ok</button>
                <button type="button" onclick="$('#view_penalty').fadeOut();" class="btn btn-danger" ><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>