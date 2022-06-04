<?php  
/* session_start();
$pid = $_SESSION['pid'];
$moduleName = $_SESSION['moduleName'];
$mtype =$_SESSION['mtype'];
$salt = $_SESSION['salt']; */

//https://dreammytriptourism.com/PayUBiz/test.php?txnid=6245ede63f673

$orderId = $_REQUEST["txnid"];

$fh = fopen('/home/dcfm7wmhjgav/public_html/PayUBiz/LogFile/RequestSessionLog/'.$orderId.'_RequestSession.txt','r');

while ($line = fgets($fh)) {
//echo($line);
 if($line!=''){
   $ReqData=json_decode($line,true); 
   $pid =$ReqData['pid'];
   $moduleName = $ReqData['moduleName'];
   $mtype = $ReqData['mtype'];
 }
}
fclose($fh);

echo $pid.'=='.$moduleName.'=='.$mtype; die;

?>