	<?php include("././admin/dist/dbinfo.php"); ?>
     <?php
	 if($_POST['inputs1']){
	 ?>
	        <div class="form-group col-lg-45">
              <label for="Branch" align="left"><b>Version :</b></label>
				<select type="text" class="form-control" name="version" id="version" >
				  <option value="">--- Select The  Version ---</option>
				  <?php 
				  $set1="select * from tbl_version where model_id='".$_POST['inputs1']."'";
				  $Eset1=mysqli_query($conn,$set1);
				  while($FEset1=mysqli_fetch_array($Eset1))
				  {
				  ?>
				  <option value="<?php echo $FEset1['id']; ?>"><?php echo $FEset1['version']; ?></option>
				  <?php
				  } 
				  ?>
				</select>
     	    </div>
	 <?php } ?>