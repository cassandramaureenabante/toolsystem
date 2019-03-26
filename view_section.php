<?php
    $section_id='';
    if(isset($_GET['view_section_id'])){
        $section_id = $_GET['view_section_id'];
    }
    
    $view_section = mysqli_query($conn, "select * from section where section_id = '$section_id'");
   
?>


<div class="modal" id="view_section" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <?php while ($row = mysqli_fetch_array($view_section)) { ?>
                <button type="button" class="close" id="close" onclick="$('#view_section').fadeOut()">&times;</button>
                <h4 class="modal-title" ><strong><?php echo $row['sectionname']?></strong></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5">

                        <?php } ?>
                    </div>
                    <div class="col-sm-7">
                        <table class="table table-responsive table-bordered table-condensed table-hover table-striped">
                            <tr>
                                <td>Section</td>
                                <td class="value"><?php echo $row["sectionname"]?> </td>

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
                <button type="button" onclick="$('#view_section').fadeOut();" class="btn btn-primary" ><span class="glyphicon glyphicon-ok"></span> Ok</button>
                <button type="button" onclick="$('#view_section').fadeOut();" class="btn btn-danger" ><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>