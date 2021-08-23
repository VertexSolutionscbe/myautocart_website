     <!--- Header Area --->
	    <?php require_once('header.php'); ?>
	 <!--- Header End --->
	 <?php
	  if(isset($_POST['form1'])) {
		 
	     $st="INSERT INTO tbl_expense_type set ledger_type='".$_POST['ledger_type']."',exp_type_category='".$_POST['exp_type_category']."',expense_type='".$_POST['expense_type']."',status='Active'";
		 $Est=mysqli_query($conn,$st); 

	     header("location: expense_type_view.php");
	    }
	 ?>		

      <!-- Main Content -->
      <div class="main-content">	   
        <section class="section">
          <div class="section-header">
            <div class="section-header-back" hidden>
              <a href="#" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create New Expense Type</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Create New Expense Type</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Create New Expense Type</h2>
            <p class="section-lead">
              On this page you can create a new Expense Type and fill in all fields.
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
			
            <form class="needs-validation" method="post" action="expense_type.php" novalidate>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
                  <div class="card-body">
                    
					
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Expenses Ledger Type</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="ledger_type" id="ledger_type">                         						  
						  <option>-- Select The Vehice Type --</option>
						  <?php
						   $Et="SELECT * FROM `ledger_group` WHERE id";
						   $EEt=mysqli_query($conn,$Et);
						   while($FEEt=mysqli_fetch_array($EEt)){
						  ?>
						  <option value="<?php echo $FEEt['id']; ?>"><?php echo $FEEt['ledger_group']; ?></option>
						  <?php } ?>
                        </select>
                      </div>
                    </div>
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Expense Category</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="exp_type_category" id="exp_type_category" placeholder="Expense Category">
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Expenses Type</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="expense_type" id="expense_type" placeholder="Expense Type">
                      </div>
                    </div>
					
                    <div class="form-group row mb-4" hidden>
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status">
                          <option value="Active">Active</option>
                          <option value="Deactive">Deactivate</option>                          
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" name="form1" type="submit">Create Post</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
		   </form>	
          </div>
        </section>
		
		<section class="section" hidden>       
		  <!-- Section Body -->
          <div class="section-body">            
            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Posts</h4>
                  </div>
                  <div class="card-body">
                    
					<div class="float-left">
                      <select class="form-control selectric">
                        <option>5</option>
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
						<option>100</option>
                      </select>
                    </div>
                    <div class="float-right">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-append">                                            
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>				

                    <div class="table-responsive">
					  <div class="card-header">
                       <h4>Latest Posts</h4>
                        <div class="card-header-action">
                          <a href="#" class="btn btn-primary">View All</a>
                        </div>
                      </div>
					  
                      <table class="table table-striped" id="example">
					   <thead>
                        <tr>
                          <th class="text-center pt-2">
                            <div class="custom-checkbox custom-checkbox-table custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
						  <th>S.No</th>
                          <th>Expenses Ledger Type</th>
                          <th>Category</th>
				          <th>Expenses Type</th>
				          <th>Status</th>
				          <th hidden>Action</th> 
                        </tr>
                       </thead>
					   <?php
            	        $slg="SELECT * FROM `tbl_expense_type` WHERE id";
				        $Eslg=mysqli_query($conn,$slg);
				        $i=0;
				        while($FEslg=mysqli_fetch_array($Eslg)) {

					       $lg="SELECT * FROM `ledger_group` WHERE id='".$FEslg['ledger_type']."'";
					       $Elg=mysqli_query($conn,$lg);
					       $FElg=mysqli_fetch_array($Elg);					 
				        $i++;
            		   ?>
					   <tbody>
                        <tr>                     					
                          <td>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                              <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
						  <td><?php echo $i; ?></td>						  
                          <td><?php echo $FElg['ledger_group']; ?></td>
				          <td><?php echo $FEslg['exp_type_category']; ?></td>
				          <td><?php echo $FEslg['expense_type']; ?></td>
						  <td><?php echo $FEslg['status']; ?></td>
						  <td hidden>
                            <a href="order_list_view.php?id=<?php echo $FEli['id']; ?>" class="btn btn-info btn-action mr-1"  data-toggle="tooltip" title="Customer Order Details View"><i class="fas fa-street-view"></i></a>                           
                          </td>
						  <td hidden>
                            <a href="order_list_edit.php?id=<?php echo $FEli['id']; ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>                                                      
						  </td>
                        </tr>
					   </tbody>
					  <?php } ?>					   
                      </table>
                    </div>				
															
                  </div>
                </div>
              </div>
            </div>
          </div>
		  <!-- Section Body -->
        </section>
		
      </div>
     <!-- Main Content End --> 
	 
         
	 <script type="text/javascript">
	 $(document).ready(function(){
		$("#limit-records").change(function(){
			$('form').submit();
		})
	 })
     </script>	
	 
	 <!--- Footer Area --->
	   <?php require_once('footer.php'); ?>
	 <!--- Footer End --->