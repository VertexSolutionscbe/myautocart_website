     <!--- Header Area --->
	    <?php require_once('header.php'); ?>
	 <!--- Header End --->
<script>
/*   function tabE(obj,e){ 
   var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
   if(e.keyCode==13){ 
     var ele = document.forms[0].elements; 
     for(var i=0;i<ele.length;i++){ 
       var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
       if(obj==ele[i]){ele[q].focus();break} 
     } 
  return false; 
   } 
  } 
 
   function getExpType(val) {
	$.ajax({
	type: "POST",
	url: "get_entry.php",
	data:'country_id='+val,
	success: function(data){
		$("#ExpenseType").html(data);
		}
		});
		}
		
function getcolor(val) {
	var PaymentMode = document.getElementById('PaymentMode').value;
	
	$.ajax({
	type: "POST",
	url: "get_Accounts.php",
	data: {PaymentMode: PaymentMode},
	success: function(data){
		$("#cdetails").html(data);
		}
	   });
	  }	 */
</script>
	 
	 <?php
	  if(isset($_POST['form1'])) {
		 
	     $st="INSERT INTO tbl_expense_details set expense_date='".$_POST['expense_date']."',payment_mode='".$_POST['payment_mode']."',ledger_type='".$_POST['ledger_type']."',expense_amount='".$_POST['expense_amount']."',expense_type='".$_POST['expense_type']."',tax_amount='".$_POST['tax_amount']."',expense_description='".$_POST['expense_description']."',status='Active'";
		 $Est=mysqli_query($conn,$st);
		 
		 $q1="SELECT sum(expense_amount) AS Jan FROM `tbl_expense_details` WHERE expense_date between '2020-01-01' and '2020-01-31' Order by id ASC";
		 $Eq1=mysqli_query($conn,$q1);
		 $FEq1=mysqli_fetch_array($Eq1);		 
		 $January_total=$FEq1['Jan'];
		 
		 $q2="SELECT sum(expense_amount) AS Feb FROM `tbl_expense_details` WHERE expense_date between '2020-02-01' and '2020-02-29' Order by id ASC";
		 $Eq2=mysqli_query($conn,$q2);
		 $FEq2=mysqli_fetch_array($Eq2);		 
		 $February_total=$FEq2['Feb'];
		 
		 $q3="SELECT sum(expense_amount) AS March FROM `tbl_expense_details` WHERE expense_date between '2020-03-01' and '2020-03-31' Order by id ASC";
		 $Eq3=mysqli_query($conn,$q3);
		 $FEq3=mysqli_fetch_array($Eq3);		 
		 $March_total=$FEq3['March'];
		 
	     $q4="SELECT sum(expense_amount) AS April FROM `tbl_expense_details` WHERE expense_date between '2020-04-01' and '2020-04-30' Order by id ASC";
		 $Eq4=mysqli_query($conn,$q4);
		 $FEq4=mysqli_fetch_array($Eq4);		 
		 $April_total=$FEq4['April'];
		 
		 $q5="SELECT sum(expense_amount) AS May FROM `tbl_expense_details` WHERE expense_date between '2020-05-01' and '2020-05-31' Order by id ASC";
		 $Eq5=mysqli_query($conn,$q5);
		 $FEq5=mysqli_fetch_array($Eq5);		 
		 $May_total=$FEq5['May'];
		 
		 $q6="SELECT sum(expense_amount) AS June FROM `tbl_expense_details` WHERE expense_date between '2020-06-01' and '2020-06-30' Order by id ASC";
		 $Eq6=mysqli_query($conn,$q6);
		 $FEq6=mysqli_fetch_array($Eq6);		 
		 $June_total=$FEq6['June'];
		 
		 $q7="SELECT sum(expense_amount) AS July FROM `tbl_expense_details` WHERE expense_date between '2020-07-01' and '2020-07-31' Order by id ASC";
		 $Eq7=mysqli_query($conn,$q7);
		 $FEq7=mysqli_fetch_array($Eq7);		 
		 $July_total=$FEq7['July'];
		 
		 $q8="SELECT sum(expense_amount) AS Aug FROM `tbl_expense_details` WHERE expense_date between '2020-08-01' and '2020-08-31' Order by id ASC";
		 $Eq8=mysqli_query($conn,$q8);
		 $FEq8=mysqli_fetch_array($Eq8);		 
		 $August_total=$FEq8['Aug'];
		 
		 $q9="SELECT sum(expense_amount) AS Sep FROM `tbl_expense_details` WHERE expense_date between '2020-09-01' and '2020-09-30' Order by id ASC";
		 $Eq9=mysqli_query($conn,$q9);
		 $FEq9=mysqli_fetch_array($Eq9);		 
		 $Sep_total=$FEq9['Sep'];
		 
		 $q10="SELECT sum(expense_amount) AS Oct FROM `tbl_expense_details` WHERE expense_date between '2020-10-01' and '2020-10-31' Order by id ASC";
		 $Eq10=mysqli_query($conn,$q10);
		 $FEq10=mysqli_fetch_array($Eq10);		 
		 $Oct_total=$FEq10['Oct'];
		 
		 $q11="SELECT sum(expense_amount) AS Nov FROM `tbl_expense_details` WHERE expense_date between '2020-11-01' and '2020-11-30' Order by id ASC";
		 $Eq11=mysqli_query($conn,$q11);
		 $FEq11=mysqli_fetch_array($Eq11);		 
		 $Nov_total=$FEq11['Nov'];
		 
		 $q12="SELECT sum(expense_amount) AS December FROM `tbl_expense_details` WHERE expense_date between '2020-12-01' and '2020-12-31' Order by id ASC";
		 $Eq12=mysqli_query($conn,$q12);
		 $FEq12=mysqli_fetch_array($Eq12);		 
		 $Dec_total=$FEq12['December'];
		 
		 $ch1="UPDATE chart_data_column_exp SET expanses='".$January_total."' WHERE id='1' AND month='January'";
		 $Ech1=mysqli_query($conn,$ch1);
		 
		 $ch2="UPDATE chart_data_column_exp SET expanses='".$February_total."' WHERE id='2' AND month='February'";
		 $Ech2=mysqli_query($conn,$ch2);
		 
		 $ch3="UPDATE chart_data_column_exp SET expanses='".$March_total."' WHERE id='3' AND month='March'";
		 $Ech3=mysqli_query($conn,$ch3);
		 		 		 
		 $ch4="UPDATE chart_data_column_exp SET expanses='".$April_total."' WHERE id='4' AND month='April'";
		 $Ech4=mysqli_query($conn,$ch4);

		 $ch5="UPDATE chart_data_column_exp SET expanses='".$May_total."' WHERE id='5' AND month='May'";
		 $Ech5=mysqli_query($conn,$ch5);
		 
		 $ch6="UPDATE chart_data_column_exp SET expanses='".$June_total."' WHERE id='6' AND month='June'";
		 $Ech6=mysqli_query($conn,$ch6);
		 
		 $ch7="UPDATE chart_data_column_exp SET expanses='".$July_total."' WHERE id='7' AND month='July'";
		 $Ech7=mysqli_query($conn,$ch7);
		 
		 $ch8="UPDATE chart_data_column_exp SET expanses='".$August_total."' WHERE id='8' AND month='August'";
		 $Ech8=mysqli_query($conn,$ch8);
		 
		 $ch9="UPDATE chart_data_column_exp SET expanses='".$Sep_total."' WHERE id='9' AND month='September'";
		 $Ech9=mysqli_query($conn,$ch9);
		 
		 $ch10="UPDATE chart_data_column_exp SET expanses='".$Oct_total."' WHERE id='10' AND month='October'";
		 $Ech10=mysqli_query($conn,$ch10);
		 
		 $ch11="UPDATE chart_data_column_exp SET expanses='".$Nov_total."' WHERE id='11' AND month='November'";
		 $Ech11=mysqli_query($conn,$ch11);
		 
		 $ch12="UPDATE chart_data_column_exp SET expanses='".$Dec_total."' WHERE id='12' AND month='December'";
		 $Ech12=mysqli_query($conn,$ch12);
		  
	     header("location: expense_entry_view.php");
	    }
	 ?>	
	 

      <!-- Main Content -->
      <div class="main-content">	   
        <section class="section">
          <div class="section-header">
            <div class="section-header-back" hidden>
              <a href="#" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create New Expense Entry</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Create New Expense Entry</div>
            </div>
          </div>
	
          <div class="section-body">
            <h2 class="section-title">Create New Expense Entry</h2>
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
			
            <form class="needs-validation" method="post" action="expense_entry.php" novalidate>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Post</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control" name="expense_date" id="expense_date" value="<?php echo date('Y-m-d'); ?>">
                      </div>
                    </div>	
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Payment Mode</label>
                      <div class="col-sm-12 col-md-7">
					   <select class="form-control selectric" name="payment_mode" id="payment_mode" onChange="getcolor(this.value);" required>
				        <option>-- select the value --</option>
				        <option value="Bank">Bank</option>
				        <option value="Cash">Cash</option>
						<option value="Credit">Credit</option>
						<option value="NEFT">NEFT</option>
						<option value="UPI">UPI</option>
						<option value="RTGS">RTGS</option>
				       </select>
					  </div> 
                    </div>
					
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Expenses Ledger Type</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="ledger_type" id="ledger_type" required>                         						  
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount(Without tax)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="expense_amount" id="expense_amount" placeholder="Amount(Without tax)" required>
                      </div>
                    </div>
										
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Expenses Type</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="expense_type" id="expense_type" required>                         						  
						  <option>-- Select The Expenses Type --</option>
						  <?php
						   $Ep="SELECT * FROM `tbl_expense_type` WHERE id";
						   $EEp=mysqli_query($conn,$Ep);
						   while($FEEp=mysqli_fetch_array($EEp)){
						  ?>
						  <option value="<?php echo $FEEp['id']; ?>"><?php echo $FEEp['expense_type']; ?></option>
						  <?php } ?>
                        </select>
                      </div>
                    </div>
					
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tax Amount</label>
					  <div class="col-sm-12 col-md-7">
                       <input type="text" class="form-control" name="tax_amount" id="tax_amount" placeholder="Tax Amount" required>
					  </div> 
                    </div>
					  
					<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Remarks</label>
                      <div class="col-sm-12 col-md-7">
					   <textarea class="form-control" name="expense_description" id="expense_description" placeholder="Description" onKeyPress="return tabE(this,event)"></textarea>
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
                          <th>Date</th>
                          <th>Payment Mode</th>
				          <th>Expenses Ledger Type</th>
						  <th>Amount(Without tax)</th>
						  <th>Expenses Type</th>
						  <th>Tax Amount</th>
						  <th>Remarks</th>						  
				          <th>Status</th>
				          <th hidden>Action</th> 
                        </tr>
                       </thead>
					   <?php
            	        $slg="SELECT * FROM `tbl_expense_details` WHERE id";
				        $Eslg=mysqli_query($conn,$slg);
				        $i=0;
				        while($FEslg=mysqli_fetch_array($Eslg)) {

					       $lg="SELECT * FROM `ledger_group` WHERE id='".$FEslg['ledger_type']."'";
					       $Elg=mysqli_query($conn,$lg);
					       $FElg=mysqli_fetch_array($Elg);

						   $et="SELECT * FROM `tbl_expense_type` WHERE id='".$FEslg['expense_type']."'";
					       $Eet=mysqli_query($conn,$et);
					       $FEet=mysqli_fetch_array($Eet);
						   
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
                          <td><?php echo $FEslg['expense_date']; ?></td>
				          <td><?php echo $FEslg['payment_mode']; ?></td>
				          <td><?php echo $FElg['ledger_group']; ?></td>
						  <td><?php echo $FEslg['expense_amount']; ?></td>
						  <td><?php echo $FEet['expense_type']; ?></td>
						  <td><?php echo $FEslg['tax_amount']; ?></td>
						  <td><?php echo $FEslg['expense_description']; ?></td>
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