<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");
date_default_timezone_set('Asia/Kolkata');
?>
	

<script>
function reportxx(){
	var fdate = document.getElementById("fromdate").value;
	var tdate = document.getElementById("todate").value;
	var ftime = document.getElementById("fromtime").value;
	var ttime=document.getElementById("totime").value;
	var sess = document.getElementById("ses").value;
	window.open('discount1.php?sdate='+fdate+'&edate='+tdate+'&ftime='+ftime+'&etime='+ttime+'&sess='+sess,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
}
</script>		

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                
                                </li>
                                <li class="active">Discount Report</li>
                            </ol>
                        </div>
                    </div>
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Discount Report</header>
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
								
								<form name="form" method="post" >
                                <div class="card-body " id="bar-parent2">
                                 <div class="form-group row">
                                               
                                            <label class="control-label col-md-2">From Date
                                                    <span class="required"> * </span>
                                                </label>
                                               <div class="col-md-3">
                                                    
		                                                <input class="form-control " size="16" placeholder="Join Date" type="date" value="<?php echo date('Y-m-d'); ?>" name="fromdate" id="fromdate">
		                                                <!--<span class="input-group-addon"><span class="fa fa-calendar"></span>--></span>
	                                            	
	                                            
	                                            </div>
												<div class="col-md-3">
                                                    
		                                                <input class="form-control " size="16" placeholder="Join Date" type="time" value="<?php echo date('H:i:s'); ?>" name="fromtime" id="fromtime">
		                                                <!--<span class="input-group-addon"><span class="fa fa-calendar"></span>--></span>
	                                            	
	                                            
	                                            </div>
											
											</div>
											<div class="form-group row">
                                               
                                            <label class="control-label col-md-2">To Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                    
		                                                <input class="form-control " size="16" placeholder="To Date" type="date" value="<?php echo date('Y-m-d'); ?>" name="todate" id="todate">
		                                                <!--<span class="input-group-addon"><span class="fa fa-calendar"></span>--></span>
	                                            	
	                                            
	                                            </div>
												<div class="col-md-3">
                                                    
		                                                <input class="form-control " size="16" placeholder="To Time" type="time" value="<?php echo date('H:i:s'); ?>" name="totime" id="totime">
		                                                <!--<span class="input-group-addon"><span class="fa fa-calendar"></span>--></span>
	                                            	
	                                            
	                                            </div>
											
											
									   
									   <input type="hidden" value="<?php echo $ses?>" class="form-control" name="ses" id="ses" >
										
										
                                    </div>
									
                                	
									
									
                                </div>
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" class="btn btn-info" name="submit" value="Report"  onclick="reportxx();">
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='dashboard.php'">Cancel</button>
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