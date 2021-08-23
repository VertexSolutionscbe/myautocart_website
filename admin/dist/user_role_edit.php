<?php require_once('header.php'); ?>

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
			<?php
			  $ss="select * from user_role where role_id='".$_REQUEST['id']."'";
			  $Ess=mysqli_query($conn,$ss);
			  $FEss=mysqli_fetch_array($Ess);
			?>
            <form class="needs-validation" method="post" action="user_role_editQ.php" autocomplete="off" novalidate>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role Id</label>
                      <div class="col-sm-12 col-md-7">
					    <input type="number" class="form-control" name="role_id" id="role_id" placeholder="RID" value="<?php echo $FEss['role_id'];?>" onKeyPress="return tabE(this,event)">
                      </div>
					</div>				  
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="role_name" id="role_name" value="<?php echo $FEss['role_name'];?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status">
						  <option value="<?php echo $FEss['status']; ?>" select><?php echo $FEss['status']; ?></option>
						  <option value="Active">Active</option>
				          <option value="Deactive">Deactive</option>
                        </select>
                      </div>
                    </div>
				   </div>
				   
				   <div class="box-body">										
					 <div class="box-header with-border">
					  <h3 class="box-title"> User Access Pages</h3>
				     </div>
					  
					 <?php
					  $uname=$FEss['role_id'];
			          $slm="select id,category,cicon,url from leftbar_menu where parent='0'";
				      $Eslm=mysqli_query($conn,$slm);
				      $i=0;
				       while($FEslm=mysqli_fetch_array($Eslm)) {
					  $i++;
				      ?>
				    <div class="form-group row mb-4">
					 <div class="col-sm-2"></div>
                      <div class="col-sm-4 checkbox">
	                  					  
					   <?php
				        $sup="select * from role_pages where role_id='$uname' AND pageno='".$FEslm['id']."'";
				        $Esup=mysqli_query($conn,$sup);
				        $nup=mysqli_num_rows($Esup);				
				
				        $sa="SELECT id FROM `leftbar_menu` where parent='".$FEslm['id']."'";
				        $Esa=mysqli_query($conn,$sa);
				        $nchild=mysqli_num_rows($Esa);
				
				        $sap="select t3.t1id from (SELECT t1.id as t1id,t1.role_id,t1.pageno,t2.parent,t2.id as t2id FROM role_pages t1 LEFT JOIN leftbar_menu t2 on t1.pageno=t2.id AND t1.id IN (select id from role_pages where role_id='$uname')) as t3 where role_id='$uname' AND parent='".$FEslm['id']."'";
				        $Esap=mysqli_query($conn,$sap);
				        $nachild=mysqli_num_rows($Esap);
								
				        $sup="select * from role_pages where role_id='$uname' AND pageno='".$FEslm['id']."'";
				        $Esup=mysqli_query($conn,$sup);
				        $nup=mysqli_num_rows($Esup);							 
					  
					    if($nchild==$nachild) {				         
				        ?>
					      <label><input type="checkbox" name="check_list[]" id="check_list[]" class="<?php echo "checked_all".$FEslm['id']; ?>" value="<?php echo $FEslm['id']; ?>" checked="true"><b> <?php echo $i.". ".$FEslm['category']; ?></b></label>
	                      <!-- <label><input type="checkbox" name="check_list[]" id="check_list[]" class="<?php //echo "checked_all".$FEslm['id']; ?>" value="<?php //echo $FEslm['id']; ?>" checked="true"><b><?php //echo $i.". ".$FEslm['category']; ?></b></label> -->
						<?php }
					    else {
					    ?>	
					     <label><input type="checkbox" name="check_list[]" id="check_list[]" class="<?php echo "checked_all".$FEslm['id']; ?>" value="<?php echo $FEslm['id']; ?>"><b><?php echo $i.". ".$FEslm['category']; ?></b></label>
				        <?php } ?>					  					  
					  
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
                       
					   <?php
				        $sup1="select * from role_pages where role_id='$uname' AND pageno='".$FEssc1['id']."'";
				        $Esup1=mysqli_query($conn,$sup1);
				        $nup1=mysqli_num_rows($Esup1);
					    if($nup1 >'0')
				         {
				       ?>
					   <label><input type="checkbox" name="check_list[]" id="check_list[]" class="<?php echo "checkbox1".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>" checked="true"><?php echo  $i.". ".$j.". ".$FEssc1['category']; ?></label>
				       <?php }
				       else {
				       ?>	
					   <label><input type="checkbox" name="check_list[]" id="check_list[]" class="<?php echo "checkbox1".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><?php echo  $i.". ".$j.". ".$FEssc1['category']; ?></label>
				       <?php } ?>					   					   					   		
	                  </div>

					  <?php
                      if($nup1 >'0')
                      {
                        $srt="select * from role_pages where role_id='$uname' AND pageno='".$FEssc1['id']."'";	
                        $Esrt=mysqli_query($conn,$srt);
                        $Fr=mysqli_fetch_array($Esrt);
                      ?>	                  		                  
					  <div class="col-sm-2">
                        <label><input type="checkbox" name="<?php echo "check_listi".$FEssc1['id']; ?>" id="<?php echo "check_listi".$FEssc1['id']; ?>" class="<?php echo "check_listi".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>" <?php if($Fr['CreateData']>0) {?> checked="true" <?php } ?>><i class="fa fa-plus" style="color:#3abaf4;" aria-hidden="true" title="Create"></i></label>
	                    <label><input type="checkbox" name="<?php echo "check_liste".$FEssc1['id']; ?>" id="<?php echo "check_liste".$FEssc1['id']; ?>" class="<?php echo "check_liste".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>" <?php if($Fr['EditData']>0) {?> checked="true" <?php } ?>><i class="fa fa-edit" style="color:#6777ef;" aria-hidden="true" title="Edit"></i></label>
	                    <label><input type="checkbox" name="<?php echo "check_listd".$FEssc1['id']; ?>" id="<?php echo "check_listd".$FEssc1['id']; ?>" class="<?php echo "check_listd".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>" <?php if($Fr['DeleteData']>0) {?> checked="true" <?php } ?>><i class="fa fa-trash" style="color:#fc544b;" aria-hidden="true" title="Delete"></i></label>
	                    <label><input type="checkbox" name="<?php echo "check_listv".$FEssc1['id']; ?>" id="<?php echo "check_listv".$FEssc1['id']; ?>" class="<?php echo "check_listv".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>" <?php if($Fr['ViewData']>0) {?> checked="true" <?php } ?>><i class="fa fa-eye" style="color:#000000;" aria-hidden="true" title="View"></i></label>	
                      </div>					  
					  <?php }                     
                      if($nup1 <'1')
                       {
                      ?>
					  <div class="col-sm-2">
                        <label><input type="checkbox" name="<?php echo "check_listi".$FEssc1['id']; ?>" id="<?php echo "check_listi".$FEssc1['id']; ?>" class="<?php echo "check_listi".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-plus" style="color:#3abaf4;" aria-hidden="true" title="Create"></i></label>
	                    <label><input type="checkbox" name="<?php echo "check_liste".$FEssc1['id']; ?>" id="<?php echo "check_liste".$FEssc1['id']; ?>" class="<?php echo "check_liste".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-edit" style="color:#6777ef;" aria-hidden="true" title="Edit"></i></label>
	                    <label><input type="checkbox" name="<?php echo "check_listd".$FEssc1['id']; ?>" id="<?php echo "check_listd".$FEssc1['id']; ?>" class="<?php echo "check_listd".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-trash" style="color:#fc544b;" aria-hidden="true" title="Delete"></i></label>
	                    <label><input type="checkbox" name="<?php echo "check_listv".$FEssc1['id']; ?>" id="<?php echo "check_listv".$FEssc1['id']; ?>" class="<?php echo "check_listv".$FEssc1['id']; ?>" value="<?php echo $FEssc1['id']; ?>"><i class="fa fa-eye" style="color:#000000;" aria-hidden="true" title="View"></i></label>
	                  </div>
                     <?php } ?>				 
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
	    // $('.<?php echo "checked_all".$FEslm['id']; ?>').prop('checked',true);
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