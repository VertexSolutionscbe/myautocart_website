	 <?php include('dbinfo.php'); 
	 
	 
	 if($_POST['inputs1']) {
	 ?>
	        <div class="form-group row mb-4" style="padding-left:140px">
             <!-- <label for="Branch" align="left"><b> :</b></label> -->
			  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Version Name</label>
			  <div class="col-sm-12 col-md-7">
				<select type="text" class="form-control selectric" name="version" id="version" >
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
			</div>
	 <?php } ?>