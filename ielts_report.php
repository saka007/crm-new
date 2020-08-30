<?php include_once("header.php");

?>

<div class="col-sm-10">
<div class="row"><div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">IELTS SESSION REPORT</h4></div></div>

<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">

			  <thead>

			    <tr>

			      <th>No</th>

			      <th>Date</th>
			      <th>START</th>
                  <th>END</th>
			      <th>Remarks</th>		      

			    </tr>
                </thead>
                <tbody>
                <?php 

                $result = $obj->display('ielts_report','1=1');

                if ($result->num_rows > 0) {

                    $i = 1;
                    while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><a href="<?php echo $row['start']; ?>"><?php echo $row['start']; ?></a></td>
                        <td><a href="<?php echo $row['end']; ?>"><?php echo $row['end']; ?></a></td>
                        <td><?php echo $row['remarks']; ?></td>
                        </tr>
                        <?php
                   }
                }
?>
</tbody>
</table>
</div>
<?php include_once('footer.php'); ?>