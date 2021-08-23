<?php include('dbinfo.php'); 

if(($_POST["inputs"])) {
	
?>	
                 <div class="form-group row mb-4" style="padding-left:140px">                
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Model Name</label>
				  <div class="col-sm-12 col-md-7">
				   <select type="text" class="form-control selectric" name="make_model" id="make_model" onchange="getversion(this.value);" >
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
     	         </div>	

		
<?php } ?>
	