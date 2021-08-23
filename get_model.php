<?php
include("././admin/dist/dbinfo.php");

if(($_POST["inputs"])) {
	
?>	
                 <div class="form-group col-lg-45">
                  <label><b>Model :</b></label>
				  <select type="text" class="form-control" name="make_model" id="make_model" onchange="getversion(this.value);" >
				   <option value="">--- Select The  Model ---</option>
				   <?php 
				    $set="select * from tbl_model where make_id='".$_POST['inputs']."'";
				    $Eset=mysqli_query($conn,$set);
				    while($FEset=mysqli_fetch_array($Eset))
				     {
				   ?>
				    <option value="<?php echo $FEset['id']; ?>"><?php echo $FEset['model']; ?></option>
				   <?php } ?>				 
				  </select>
     	         </div>	

		
<?php } ?>
	