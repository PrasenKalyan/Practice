<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>

<?php include("header.php");?>
	
<script>
function calc(){
	var fee=document.getElementById('fee').value;
var hopshare=document.getElementById('hospitalshare').value/100;
//var doctshare=document.getElementById('doctorshare').value/100;
hamount=fee*hopshare;
htotal=fee-hamount;
document.getElementById('hamo').value=hamount;
}
</script>
<script>
function calc1(){
	var fee=document.getElementById('fee').value;
//var hopshare=document.getElementById('hospitalshare').value/100;
var doctshare=document.getElementById('doctorshare').value/100;
damount=fee*doctshare;
//dtotal=fee-hamount;
document.getElementById('doctoramount').value=damount;
}
</script>
<script>
function calc2(form){
	//var fee=document.getElementById('fee').value;
//var hopshare=document.getElementById('hospitalshare').value/100;
//var doctshare=document.getElementById('doctorshare').value/100;
//damount=fee*doctshare;
//dtotal=fee-hamount;
hamount=document.getElementById('hamo').value;
damount=document.getElementById('doctoramount').value;
//var number1 = form.hamo.value
// var number2 = form.doctoramount.value
tt=parseFloat(hamount)+parseFloat(damount);
document.getElementById('total').value=tt;
}
</script>

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add Doctor</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="doctor.php">Doctors</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Doctor</li>
                            </ol>
                        </div>
                    </div>
					
					
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Doctor Details</header>
                                    <button id = "panel-button3" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <!--<ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button3">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>-->
                                </div>
								<?php $id=$_GET['id'];
								$sq=mysqli_query($link,"select * from doct_infor where id='$id'");
								$r=mysqli_fetch_array($sq);
								$dept=$r['dept1'];
								 $gend=$r['gender'];
								?>
								
								
								<form name="form" method="post" action="../modal/insert.php">
                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label>Doctor Name</label>
	                                            <input type="text" class="form-control" value="<?php echo $r['dname1'];?>" name="dname" required="required" id="dname" >
	                                        </div>
											
											<div class="form-group">
	                                            <label>Gender</label>
												<select name="gender" class="form-control" required="required">
												<option value="">Gender</option>
												<option value="Male" <?php if($gend=="Male"){ echo "selected";} ?> >Male</option>
												<option value="Female"  <?php if($gend=="Female"){ echo "selected";} ?>>Female</option></select>
												
	                                        </div>
											<div class="form-group">
	                                            <label>Department Name</label>
												
												
												
												<select name="dept" id="dept"  class="form-control"required="required" >

<?php


$sql1 = mysqli_query($link,"select * from doctdept");


	while($row = mysqli_fetch_array($sql1))
	{
?>
<option value="<?php echo $row['id'] ?>" <?php if($row['id']==$dept){ echo 'selected';} ?>><?php echo $row['doctdeptname'] ?></option>
<?php		
	}

?>

</select>
												
												 
	                                        </div>
											<!--<div class="form-group">
	                                            <label>Phone Number</label>
	                                            <input type="text" class="form-control" value="<?php echo $r['pnum1'];?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
												name="pnum"  id="pnum" >
	                                        </div>-->
											
											
											 <div class="form-group">
                                            <label>Validity Days </label>
                                            <input type="text" class="form-control" required="required" name="valdity" value="<?php echo $r['valdity'];?>" id="valdity" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
									   </div>
										
											<div class="form-group">
                                            <label>IP Fee </label>
                                            <input type="text" class="form-control" required="required" value="<?php echo $r['ip_fee'];?>" name="ip_fee" id="ip_fee" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onfocus="calc1()">
									   </div>
											
												<div class="form-group">
	                                            <label>Insurence Fee</label>
	                                            <input type="text" class="form-control" required="required" name="ins_fee" value="<?php echo $r['ins_fee'];?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="ins_fee" >
	                                        </div>
											
											  <input type="hidden" class="form-control" required="required" value="<?php echo $r['hos_share'];?>" name="hospitalshare" id="hospitalshare" >
	                                   
											          <input type="hidden" value="<?php echo $r['doct_share'];?>"  class="form-control" required="required" name="doctorshare" id="doctorshare" >
													   <input type="hidden" class="form-control" name="total" value="<?php echo $r['total'];?>" name="total" id="total" onfocus="calc2(this.form)" >
											
											
												<!--<div class="form-group">
	                                            <label>Consultant Fee</label>
	                                            <input type="text" class="form-control" value="<?php echo $r['fee1'];?>" required="required" name="fee" id="fee" >
	                                        </div>
											
											<div class="form-group">
	                                            <label>Hospital Share(%)</label>
	                                            <input type="text" class="form-control" value="<?php echo $r['hos_share'];?>"  name="hospitalshare" id="hospitalshare" >
	                                        </div>
											<div class="form-group">
	                                            <label>Doctor Share(%)</label>
	                                            <input type="text" class="form-control" value="<?php echo $r['doct_share'];?>"   name="doctorshare" id="doctorshare" >
	                                        </div>
											
											<div class="form-group">
	                                            <label>Total Amount</label>
	                                            <input type="text" class="form-control" name="total" value="<?php echo $r['total'];?>" name="total" id="total" onfocus="calc2(this.form)" >
	                                        </div>
											<div class="form-group">
	                                            <label>Days1</label>
	                                            <input type="text" class="form-control" value="<?php echo $r['wdays'];?>"  name="wdays" id="wdays" >
	                                        </div>
											<div class="form-group">
	                                            <label>Days2</label>
	                                            <input type="text" class="form-control" value="<?php echo $r['etime'];?>"    name="etime" id="etime"  >
	                                        </div>-->
											
											
											
	                                    </div>
	                                    <div class="col-md-6 col-sm-6">
                                        <!-- textarea -->
										
										
										
                                        <div class="form-group">
                                            <label>Specialization</label>
	                                            <input type="text" class="form-control" name="spec" value="<?php echo $r['spec1'];?>"  required="required" id="spec" >
                                        </div>
										
										 <div class="form-group">
                                            <label>Qualifcation</label>
	                                            <input type="text" class="form-control" required="required" value="<?php echo $r['dsi1'];?>" name="dsi" id="dsi" >
                                        </div>
									
                                        
										
										<!--<div class="form-group">
                                            <label>Doctor Duty Type</label>
                                            <input type="text" class="form-control" value="<?php echo $r['ddt1'];?>" name="ddt" required="required" id="ddt" >
											
                                        </div>-->
										
										
										
										<div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" name="mnum" value="<?php echo $r['mnum1'];?>" required="required" id="mnum" >
									   </div>
									   
									   
									   
									    <div class="form-group">
                                            <label>Visiting Count </label>
                                            <input type="text" class="form-control" required="required" name="visit_count" value="<?php echo $r['visit_count'];?>" id="visit_count" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
									   </div>
									   <!-- <div class="form-group">
                                            <label>Visiting Doctor</label>
                                      <select name="doct_type" class="form-control" required>
									
<?php $doct_type=$r['doct_type'];
									if($doct_type=='No'){?><option value="No">No</option>
									<option value="Yes">Yes</option><?php }?>
									  <?php if($doct_type=='Yes'){?>
									  <option value="Yes">Yes</option>
									  <option value="No">No</option>
									<?php }
									else {?><option>---</option>
									
									<option value="No">No</option>
									<option value="Yes">Yes</option><?php }?>
									  </select>
									   </div>
									   -->
									   
											
									   
											<div class="form-group">
                                            <label>Op Fee </label>
                                            <input type="text" class="form-control"  value="<?php echo $r['op_fee'];?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="op_fee" id="op_fee" onfocus="calc()">
									   </div>
									  <!-- <div class="form-group">
                                            <label>Hospital Amount </label>
                                            <input type="text" class="form-control" name="hamo" id="hamo" value="<?php echo $r['hos_amount'];?>" onfocus="calc()">
									   </div>
									     <div class="form-group">
                                            <label>Doctor Amount </label>
                                            <input type="text" class="form-control" required="required" value="<?php echo $r['doct_amount'];?>"  name="doctoamount" id="doctoramount" onfocus="calc1()">
									   </div>
									   <div class="form-group">
                                            <label>Days1 Time</label>
                                            <input type="text" class="form-control" value="<?php echo $r['stime'];?>"  name="stime" id="stime">
									   </div>
									   <div class="form-group">
                                            <label>Days2 Time </label>
                                            <input type="text" class="form-control" value="<?php echo $r['etime'];?>" name="etime" id="etime">
									   </div>
									  -->
									   	<div class="form-group">
	                                            <label>Address</label>
	                                            <textarea  class="form-control" name="addr"  id="addr" ><?php echo $r['addr1'];?></textarea>
	                                        </div>
									   
									   
									    <input type="hidden" class="form-control" value="<?php echo $r['id'];?>" name="id" id="id">
									   
										
										
                                    </div>
									
                                	</div>
									
									
                                </div>
								
								<div class="form-actions">
								 <div class="row">
								<div class="offset-md-12 col-md-12"><strong> Multiple Departments:</strong>
								 <table><tr>
								 
								 <?php  
$sql="select distinct doctdeptname from doctdept ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r)) {
$dept=$row[doctdeptname];
?><td><input type="checkbox" name="check_dept[]" value="<?php echo $dept?>"></td><td><?php echo $dept?></td>

</tr><?php }?></table>

								 
                                               
												</div></div></div>
								
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" value="Submit" name="update_doct">
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='doctor.php'">Cancel</button>
                                                </div>
                                            	</div>
                                        	</div>
                            </div>
                        </div>
                    </div>
					
					</form>
					
					
					
              
            <!-- end page content -->
            <!-- start chat sidebar -->
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
            
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
	    <?php 

}else

{

session_destroy();

session_unset();

header('Location:../../index.php');

}

?>