<?php require_once('header.php'); ?>

            <?php 
	         $uc="select * from user_create";
             $Euc=mysqli_query($conn,$uc);
             $FEuc=mysqli_fetch_array($Euc);
             $ucn=mysqli_num_rows($Euc);
             $ns1=$ucn+0001;
             $UCO="UC".$ns1;	
	        ?>			

<?php
/* if(isset($_POST['form1'])) {
	$valid = 1;

      if(empty($_POST['role_name'])) {
        $valid = 0;
        $error_message .= "Role Name can not be empty<br>";
    } else {

		// Duplicate Role Name checking
    	// current Role name that is in the database
         $qry="SELECT * FROM user_role WHERE id='".$_REQUEST['id']."'";
         $Eqry=mysqli_query($conn,$qry);
         while($FEqry=mysqli_fetch_array($Eqry)){ 
     		 
			$current_category_name = $FEqry['role_name'];
		}        
        $qry1="SELECT * FROM user_role WHERE role_name='".$_POST['role_name']."' and role_name!='".$current_category_name."'"; 
		$Eqry1=mysqli_query($conn,$qry1);
    	$total=mysqli_num_rows($Eqry1);  								
    	if($total) {
    		$valid = 0;
        	$error_message .= 'Role name already exists<br>';
    	}
    } 

    if($valid == 1) {		
		// updating into the database		
        $su="UPDATE user_role SET role_name='".$_POST['role_name']."',status='".$_POST['status']."' WHERE id='".$_REQUEST['id']."'";
        $Esu=mysqli_query($conn,$su);

    	$success_message = 'User is updated successfully.';
    } 
} */
?>
<?php
/* if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$st="SELECT * FROM user_role WHERE id='".$_REQUEST['id']."'";
	$Est=mysqli_query($conn,$st);
	$total=mysqli_num_rows($Est);
	
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	} 
} */
?>
<?php							
/* While($FEst=mysqli_fetch_array($Est)) {
	$role_name = $FEst['role_name'];
	$status = $FEst['status'];	
} */
?>
      <!-- Main Content -->
      <div class="main-content">	   
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="user_role_view.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Role Create</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Role Create</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Create New Post</h2>
            <p class="section-lead">
              On this page you can create a new post and fill in all fields.
            </p>
			
			<!-- Success Msg -->
			<?php if($success_message): ?>
			<div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                 <span>&times;</span>
                </button>  <strong>Success!</strong> <?php echo $success_message; ?></div>                             
            </div>
			<?php endif; ?>
			
			<?php if($error_message): ?>
			<div class="alert alert-danger alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                 <span>&times;</span>
                </button> <strong>Error!</strong> <?php echo $error_message; ?></div>                            
            </div>
			<?php endif; ?>
			<!-- Success Msg End -->						
			
            <form class="needs-validation" method="post" novalidate>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User Code</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="role_name" id="role_name" value="<?php echo $UCO; ?>" class="form-control" readonly>
                      </div>
                    </div>				                                                             
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status">
						  <option value="">--- Select user ---</option>
						  <?php
						   $us="SELECT * FROM user_role WHERE status='Active'";
						   $Eus=mysqli_query($conn,$us);
				           while($FEus=mysqli_fetch_array($Eus)) {
						  ?>
                          <option value="<?php echo $FEus['id']; ?>"><?php echo $FEus['role_name']; ?></option> 
						  <?php } ?>
                        </select>
                      </div>
                    </div>
				   </div>
				   
				   <div class="box-body">										
					 <div class="box-header with-border">
					  <h3 class="box-title"> User Access Pages</h3>
				     </div>
					  
					 <?php 
			          $slm="select id,category,cicon,url from leftbar_menu where parent='0'";
				      $Eslm=mysqli_query($conn,$slm);
				      $i=0;
				       while($FEslm=mysqli_fetch_array($Eslm)) {
					  $i++;
				      ?>
				    <div class="form-group row mb-4">
					 <div class="col-sm-2"></div>
                      <div class="col-sm-4 checkbox">
	                  <label><input type="checkbox" name="check_list[]" id="check_list[]" class="<?php echo "checked_all".$FEslm['id']; ?>" value="<?php echo $FEslm['id']; ?>"><b> <?php echo $i.". ".$FEslm['category']; ?></b></label>
	                  <?php 
	                   $ssc1="select id,category,cicon,url from leftbar_menu where parent='".$FEslm['id']."'";
	                   $Essc1=mysqli_query($conn,$ssc1);
	                   $nsc1=mysqli_num_rows($Essc1);
	                   $j=0;
	                    while($FEssc1=mysqli_fetch_array($Essc1)){	                 
		               $j++;
	                  ?>
	                 <div class="form-group row mb-4">
					  <div class="col-sm-2"></div>
	                  <div class="col-sm-8 checkbox">
                       <label>
                        <input type="checkbox" name="check_list[]" id="check_list[]" class="<?php echo "checkbox1".$FEssc1['id']; ?>"  value="<?php echo $FEssc1['id']; ?>"> <?php echo  $i.". ".$j.". ".$FEssc1['category']; ?>
                       </label>		
	                  </div>	
	                  <div class="col-sm-2">	
	                    <label><input type="checkbox" name="<?php echo "check_listi".$FEssc1['id']; ?>" id="<?php echo "check_listi".$FEssc1['id']; ?>" class="<?php echo "check_listi".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-plus" style="color:#3abaf4;" aria-hidden="true" title="Create"></i></label>
	                    <label><input type="checkbox" name="<?php echo "check_liste".$FEssc1['id']; ?>" id="<?php echo "check_liste".$FEssc1['id']; ?>" class="<?php echo "check_liste".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-edit" style="color:#6777ef;" aria-hidden="true" title="Edit"></i></label>
	                    <label><input type="checkbox" name="<?php echo "check_listd".$FEssc1['id']; ?>" id="<?php echo "check_listd".$FEssc1['id']; ?>" class="<?php echo "check_listd".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-trash" style="color:#fc544b;" aria-hidden="true" title="Delete"></i></label>
	                    <label><input type="checkbox" name="<?php echo "check_listv".$FEssc1['id']; ?>" id="<?php echo "check_listv".$FEssc1['id']; ?>" class="<?php echo "check_listv".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-eye" style="color:#000000;" aria-hidden="true" title="View"></i></label>
	                  </div>	
	                 </div>
	                 <?php } ?>
                     </div>
					<div class="col-sm-6"></div>	 
				    </div>
				    <?php } ?>
					
                      <div class="form-group col-sm-12 col-md-10 text-right">
                        <button class="btn btn-primary" name="form1" type="submit">Create Post</button>
                      </div> 
					  
                   </div>
                </div>
              </div>
            </div>
		   </form>
		   
          </div>
        </section>	  
      </div>


     <!-- Main Content -->
	 <!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	 <!--- Footer End --->