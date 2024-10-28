<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//include("config.php");
include("../db/connection.php");
//echo 'hi';
if(isset($_POST['submit'])){
   // echo 'hi';
//	print_r($_POST);
$dept_code=0;
$provalue=0;

 $supcode=$_REQUEST['supcode'];
$grn=$_REQUEST['grnno'];
$ptype=$_REQUEST['ptype'];
$invno=$_REQUEST['invno'];
$invdt=date('Y-m-d', strtotime($_REQUEST['invdate']));
$recdt=date('Y-m-d', strtotime($_REQUEST['recdate']));
$recby=$_REQUEST['recby'];
$total=round($_REQUEST['gtot']);
$admin = $_REQUEST['authby'];
$bankname=$_REQUEST['bankname'];
$chequeno=$_REQUEST['chequeno'];
$paid=$_REQUEST['paid'];
$bal=$_REQUEST['bal']; 
$adjt=$_REQUEST['adjt'];
$round=$_REQUEST['round'];

$date3=date('Y-m-d',strtotime($_REQUEST['date3']));
$x=0;
$j=0;
$z=0;
$l=0;
$sno=0;
//$sql = mysqli_query($link,"select max(LR_NO+0) from phr_purinv_mast") or die(mysqli_error($link));
$sql = mysqli_query($link,"select max(LR_NO) from phr_purinv_mast") or die(mysqli_error($link));

if($sql)
{
	while($row = mysqli_fetch_array($sql))
	{
		$sno=$row[0];
	}
}	
	$sno=$sno+1;

 $a="insert into phr_purinv_mast values($sno,'$supcode','$ptype','$invno','$invdt',now(),'$admin','$recby','$total','$recdt','$grn','$bankname','$chequeno','$date3','$paid','$bal','0','$adjt','$round')";

$qry=mysqli_query($link,$a) or die(mysqli_error($link));
if($qry)
{
	 $count = $_REQUEST['nitem'];
	
	for($i=1;$i<=$count;$i++)
		{
			//echo "asgar";

		$pcode=$_REQUEST['pcode'.$i];
		$pname=$_REQUEST['pname'.$i];
		$maniby=$_REQUEST['maniby'.$i];
		$noi=$_REQUEST['noi'.$i];
		$packing=$_REQUEST['packing'.$i];
		$batch=$_REQUEST['bno'.$i];
		$mrp=$_REQUEST['mrp'.$i];
		//$mfgdt2=30-$_REQUEST['mfg'.$i];
		//echo "asgar123";
		  $mfgdt2=$_REQUEST['mfg'.$i];
		 $expdt2=$_REQUEST['exp'.$i]; 
		 $m="30-";
		 $mfgdt1= $m."".$mfgdt2; 
		  $expdt1= $m."".$expdt2; 

		  $mfgdt = date('Y-m-d',strtotime($mfgdt1));
		 $expdt = date('Y-m-d',strtotime($expdt1));
		$sqty=$_REQUEST['sqty'.$i];
		$tqty=$_REQUEST['tqty'.$i];
		
		$sfree=$_REQUEST['sfree'.$i];
		$srate=$_REQUEST['srate'.$i];
		$value=$_REQUEST['value'.$i];
		$vat=$_REQUEST['vat'.$i];
		$vatamt=$_REQUEST['vamt'.$i];
		$sgst=$_REQUEST['sst'.$i];
$cgst=$_REQUEST['cst'.$i];
$sal_tab=$_REQUEST['sal_tab'.$i];
$mrp_tab=$_REQUEST['mrp_tab'.$i];
		$tp=$tqty+$sfree;
		$cst=0;
		$bal_qty=0;
		$bal_qty=($tqty+$sfree);
		//bal_qty=bal_qty+;
		$dis=$_REQUEST['dis'.$i];
        
        // Echo the discount value
        // echo "Discount: $dis <br>";
		//echo "asgar1234";
 $ss="select PRODUCT_NAME,tqty,BATCH_NO from phr_purinv_dtl where PRODUCT_NAME='$pname' and BATCH_NO='$batch'";
 //echo "asgar123456";
$qry=mysqli_query($link,$ss);
$re=mysqli_fetch_array($qry);
  //$PRODUCT_CODE=$re['PRODUCT_CODE'];
 $PRODUCT_NAME=$re['PRODUCT_NAME'];
 $S_QTY1=$re['tqty'];
 //echo "sami";
 $BATCH_NO=$re['BATCH_NO'];
// echo "sameeeeeee"; 
 //$tq=$S_QTY1+$tp;
 $tq=$S_QTY1;
 //echo "samee";

 //echo "Asgar";
 if($PRODUCT_NAME=="")

{

mysqli_query($link,"insert into stock(PRODUCT_NAME,BATCH_NO,T_QTY) values('$pname','$batch','$tp')");
		
		// $as="insert into phr_purinv_dtl(lr_no,product_code,product_name,packing_type,batch_no,mrp,exp_date,s_qty,s_free,s_rate,discount,value,vat,vat_amt,currentdate,auth_by,mfg_date,noitems,cost,balance_qty,manu_by,sgst,cgst,tqty,each_pur_rate,each_mrp_rate)
		 $as="insert into phr_purinv_dtl(lr_no,product_code,product_name,packing_type,batch_no,mrp,exp_date,s_qty,s_free,s_rate,discount,value,vat,vat_amt,currentdate,auth_by,mfg_date,noitems,cost,balance_qty,manu_by,sgst,cgst,tqty,each_pur_rate,each_mrp_rate)
		 values($sno,'$pcode','$pname','$packing','$batch','$mrp','$expdt','$sqty','$sfree','$srate','$dis','$value','$vat','$vatamt',now(),'$admin','$mfgdt','$noi','$cst','$bal_qty','$maniby','$sgst','$cgst','$tqty','$sal_tab','$mrp_tab')";
		$sql1=mysqli_query($link,$as) or die(mysqli_error($link));
		
		
		
}else{
mysqli_query($link,"update  stock set T_QTY='$tq' where PRODUCT_NAME='$pname' and BATCH_NO='$batch'");
		//$sql1=mysqli_query($link,"insert into phr_purinv_dtl(lr_no,product_code,product_name,packing_type,batch_no,mrp,exp_date,s_qty,s_free,s_rate,discount,value,vat,vat_amt,currentdate,auth_by,mfg_date,noitems,cost,balance_qty,manu_by,tqty) 
		//values($sno,'$pcode','$pname','$packing','$batch','$mrp','$expdt','$sqty','$sfree','$srate','$dis','$value','$vat','$vatamt',now(),'$admin','$mfgdt','$noi','$cst','$bal_qty','$maniby','$tqty','$sal_tab','$mrp_tab')");

		
		 $as="insert into phr_purinv_dtl(lr_no,product_code,product_name,packing_type,batch_no,mrp,exp_date,s_qty,s_free,s_rate,discount,value,vat,vat_amt,currentdate,auth_by,mfg_date,noitems,cost,balance_qty,manu_by,sgst,cgst,tqty,each_pur_rate,each_mrp_rate)
		 values($sno,'$pcode','$pname','$packing','$batch','$mrp','$expdt','$sqty','$sfree','$srate','$dis','$value','$vat','$vatamt',now(),'$admin','$mfgdt','$noi','$cst','$bal_qty','$maniby','$sgst','$cgst','$tqty','$sal_tab','$mrp_tab')";
		$sql1=mysqli_query($link,$as) or die(mysqli_error($link));
		}
				
		//}//for
}

//exit;
//echo "asgar";
$ee=mysqli_query($link,"select * from `phr_supplier_mast` where SUPPL_CODE='$supcode'");
while($r=mysqli_fetch_array($ee)){
	
	 $t=$r['tamt'];
	$p=$r['paid'];
	$b=$r['bal'];
	
} $total1=$t+$total;
 $paid1=$p+$paid;
 $bal1=$b+$bal;
 $d=date('Y-m-d');
 $e1=mysqli_query($link,"update `phr_supplier_mast` set tamt='$total1',paid='$paid1',bal='$bal1' where SUPPL_CODE='$supcode'" );
 $cck=mysqli_query($link,"insert into `sup_amount`(sup_code,tamt,paid,bal,date1,status1,LR_NO)values('$supcode','$total','$paid','$bal','$d','2','$sno')");
			
if($sql1)
{
	print "<script>";
	print "alert('successfully added');";
	print "self.location='purchase_invoice_list.php'";
	print "</script>";
}	
}

}
?>