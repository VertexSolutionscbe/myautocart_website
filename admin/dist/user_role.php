<?php require_once('header.php'); 
error_reporting(0);
?>
<script type="text/javascript" src="//code.jquery.com/jquery-1.6.2.js"></script>
<script>
function getbranch(){
	
    var inputs = document.getElementById('company_name').value;
    // alert("edfgjd"+inputs);
	$.ajax({
	type: "POST",
	
	url: "get_branch.php",
	
	data:{inputs:inputs},
	success: function(data){
		$("#cdetails").html(data);
		}
		});
    }
</script>

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
			<?php // if($success_message): ?>
			<?php if($_REQUEST['success']): ?>
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
			
			<?php //if($warning_message): ?>
			<?php if($_REQUEST['warning']): ?>
			<div class="alert alert-warning alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                 <span>&times;</span>
                </button><strong>Warning!</strong><?php echo $warning_message; ?></div>                                     
            </div>
			<?php endif; ?>
			<!-- Success Msg End -->						
			
            <form class="needs-validation" method="post" action="user_role_addQ.php" autocomplete="off">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User Role</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="role_name" id="role_name" class="form-control" placeholder="Role Name" required>
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
                        <button class="btn btn-primary" type="submit">Create Post</button>
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
	 
<script type="text/javascript">        
        <?php 
		$slm="select id,category,cicon,url from leftbar_menu where parent='0'";
		$Eslm=mysqli_query($conn,$slm);
		$i=0;
		while($FEslm=mysqli_fetch_array($Eslm))
		{		
	      $ssc1="select id,category,cicon,url from leftbar_menu where parent='".$FEslm['id']."'";
	      $Essc1=mysqli_query($conn,$ssc1);
	      $nsc1=mysqli_num_rows($Essc1);
	       $j=0;
	       while($FEssc1=mysqli_fetch_array($Essc1))
	        {
		?>
		////Master Module checkbox 
		$('.<?php echo "checked_all".$FEslm['id']; ?>').on('change', function() {     
            $('.<?php echo "checkbox1".$FEssc1['id']; ?>').prop('checked', $(this).prop("checked")); 
			$('.<?php echo "check_listi".$FEssc1['id']; ?>').prop('checked',$(this).prop("checked"));
            $('.<?php echo "check_liste".$FEssc1['id']; ?>').prop('checked', $(this).prop("checked"));
            $('.<?php echo "check_listd".$FEssc1['id']; ?>').prop('checked', $(this).prop("checked"));
            $('.<?php echo "check_listv".$FEssc1['id']; ?>').prop('checked', $(this).prop("checked"));
        });
        //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
        $('.<?php echo "checkbox1".$FEssc1['id']; ?>').change(function(){ //".checkbox" change 
           // if($('.<?php echo "checkbox1".$FEssc1['id']; ?>:checked').length == $('.<?php echo "checkbox1".$FEslm['id']; ?>').length){
            $('.<?php echo "checked_all".$FEslm['id']; ?>').prop('checked',true);				
            // }else{
                   // $('.<?php echo "checked_all".$FEslm['id']; ?>').prop('checked',false);
				   
            // }
            });	

		////Sub Module checkbox 
		    $('.<?php echo "checkbox1".$FEssc1['id']; ?>').on('change', function() {     
            $('.<?php echo "check_listi".$FEssc1['id']; ?>').prop('checked',$(this).prop("checked"));
            $('.<?php echo "check_liste".$FEssc1['id']; ?>').prop('checked', $(this).prop("checked"));
            $('.<?php echo "check_listd".$FEssc1['id']; ?>').prop('checked', $(this).prop("checked"));
            $('.<?php echo "check_listv".$FEssc1['id']; ?>').prop('checked', $(this).prop("checked"));
	        $('.<?php echo "checked_all".$FEslm['id']; ?>').prop('checked',true);
        });
		///////Create check box
		    $('.<?php echo "check_liste".$FEssc1['id']; ?>').on('change', function() {     
            $('.<?php echo "checkbox1".$FEssc1['id']; ?>').prop('checked',$(this).prop("checked"));
			$('.<?php echo "checked_all".$FEslm['id']; ?>').prop('checked',true);
            
        });
		///////Edit check box
			$('.<?php echo "check_listi".$FEssc1['id']; ?>').on('change', function() {     
            $('.<?php echo "checkbox1".$FEssc1['id']; ?>').prop('checked',$(this).prop("checked"));
			$('.<?php echo "checked_all".$FEslm['id']; ?>').prop('checked',true);
            
        });
		///////Delete check box
			$('.<?php echo "check_listd".$FEssc1['id']; ?>').on('change', function() {     
            $('.<?php echo "checkbox1".$FEssc1['id']; ?>').prop('checked',$(this).prop("checked"));
			$('.<?php echo "checked_all".$FEslm['id']; ?>').prop('checked',true);
            
        });
		
		///////View check box
		    $('.<?php echo "check_listv".$FEssc1['id']; ?>').on('change', function() {     
            $('.<?php echo "checkbox1".$FEssc1['id']; ?>').prop('checked',$(this).prop("checked"));
			$('.<?php echo "checked_all".$FEslm['id']; ?>').prop('checked',true);
            
        });
  
  <?php } ?>	
<?php } ?>	
</script>