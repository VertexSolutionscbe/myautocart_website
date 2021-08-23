    
	<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php"><img src="assets/img/logo.png" alt="logo" width="100" class=""></a>
          </div>
		  <?php BASE_URL; ?>
		  <?php //echo $_SESSION['path']; ?>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo BASE_URL;?>index.php">MAC</a>
          </div>
          <ul class="sidebar-menu">
		  <?php
		   $uname=$_SESSION['role_name'];
		   $slm="select id,category,cicon,url from leftbar_menu where parent='0' order by id";
		   $Eslm=mysqli_query($conn,$slm);
		   //echo mysqli_num_rows($Eslm);
		   while($FEslm=mysqli_fetch_array($Eslm))
		    {
		     
			 $sup="select * from role_pages where role_id='$uname' AND pageno='".$FEslm['id']."'";
		     $Esup=mysqli_query($conn,$sup); 
		     $nup=mysqli_num_rows($Esup);
			if($nup >'0'){	   		    
			?>
            <li class="menu-header" hidden>Label</li>		
            <li class="dropdown">
              <a href="<?php echo BASE_URL."/".$FEslm['url']; ?>" class="nav-link has-dropdown" style="color:#6777ef;"><i class="<?php echo $FEslm['cicon']; ?>"></i><span><?php echo $FEslm['category']; ?></span></a>
              <ul class="dropdown-menu">              
                <?php 
		         $ssc="select id,category,cicon,url from leftbar_menu where parent='".$FEslm['id']."' order by orders";
		         $Essc=mysqli_query($conn,$ssc);
		         $nsc=mysqli_num_rows($Essc);		
		         while($FEssc=mysqli_fetch_array($Essc))
		          {			
		             $sup1="select * from role_pages where role_id='$uname' AND pageno='".$FEssc['id']."'";
		             $Esup1=mysqli_query($conn,$sup1);
		             $nup1=mysqli_num_rows($Esup1);
		             if($nup1 > '0')
		              {

		             $ssc1="select id,category,cicon,url from leftbar_menu where parent='".$FEssc['id']."' order by orders";
		             $Essc1=mysqli_query($conn,$ssc1);
		             $nsc1=mysqli_num_rows($Essc1);
	            
                 if($nsc1>'1') {				
		        ?>				
				<li>
				<?php }
		         else {
		        ?>
				<li>
				<?php } ?>
				<a class="nav-link" href="<?php echo  BASE_URL."/".$FEssc['url']; ?>"><?php echo $FEssc['category']; ?></a>	
				<?php 
		         if(1==2) {
		        ?>
				<ul class="dropdown-menu"> 
				<?php 			        
		         while($FEssc1=mysqli_fetch_array($Essc1))
		          {
			     $sup2="select * from role_pages where role_id='$uname' AND pageno='".$FEssc1['id']."'";
		         $Esup2=mysqli_query($conn,$sup2);
		         $nup2=mysqli_num_rows($Esup2);
		         if($nup2 > '0')		        
		         {
		        ?>
				<li><a class="nav-link" href="<?php echo $FEssc1['url']; ?>"><?php echo $FEssc1['category']; ?></a></li>	
		        <?php }  
		          }
		        ?>
		        </ul>
				<?php } ?>
				</li> 
				<?php } 
		          }
		        ?>																             			  
			  </ul>
            </li>			
			<?php }
		      }
			?>						
          </ul>
		  

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a>
          </div> 
		</aside>
     </div>
