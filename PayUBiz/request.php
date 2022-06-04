<?php
session_start();
$pid =$_REQUEST['pid'];
$moduleName =$_REQUEST['moduleName'];
$mtype =$_REQUEST['mtype'];

$chargeableRate =adh_decrypt($_REQUEST['orderamt']);
$order_id =$_REQUEST['order_id'];
$productinfo =$_REQUEST['productinfo'];
$firstname =$_REQUEST['firstname'];
$email_id =$_REQUEST['email'];
$phone =$_REQUEST['phone'];
$surl =$_REQUEST['surl'];
$hash =$_REQUEST['hash'];

/*
For PayU Test Server:
POST URL: https://test.payu.in/_payment

For PayU Production (LIVE) Server:
POST URL: https://secure.payu.in/_payment
*/


$MODE='Live';
if($MODE =='Live'){
 $merchant_key ='Uwu5ch';
 $merchant_salt='ni5MJe200DaGE3yfwbAB3m9OFT6XXLAX';
 $actionUrl ='https://secure.payu.in/_payment';
}
else{
 $merchant_key ='oZ7oo9';
 $merchant_salt='UkojH5TS';
 $actionUrl ='https://test.payu.in/_payment';
}
$payubiz_registered_url='https://dreammytriptourism.com';


$_SESSION['pid'] = $pid;
$_SESSION['moduleName'] = $moduleName;
$_SESSION['mtype'] = $mtype;

$_SESSION['order_id'] = $order_id;
$_SESSION['salt'] = $merchant_salt; //save salt in session to use during Hash validation in response


/*==log== */
//createLogFile($order_id,'Request',json_encode($_REQUEST));
createRequestSessionLog($order_id,json_encode($_REQUEST));

function adh_decrypt($string){
$secret_key = 'notonbaba'; 
$secret_iv  = 'notonbaba_iv';
$output     = FALSE;
$encrypt_method = "AES-256-CBC";
$key = hash('sha256', $secret_key);
$iv = substr(hash('sha256', $secret_iv), 0, 16);
$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
return $output;	
}

function createRequestSessionLog($orderId,$response){
	$log_filename = "/home/dcfm7wmhjgav/public_html/PayUBiz/LogFile/RequestSessionLog";
 
    if (!file_exists($log_filename)) {  
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/'.$orderId.'_RequestSession.txt';

file_put_contents($log_file_data, $response . "\n", FILE_APPEND);
}

?>

<div class="main">
	<form action="<?php echo $actionUrl;?>" id="payment_form" method="POST">
    <input type="hidden" id="surl" name="surl" value="<?php echo $payubiz_registered_url; ?>/PayUBiz/response.php"/>
    <input type="hidden" id="furl" name="furl" value="<?php echo $payubiz_registered_url; ?>/PayUBiz/response.php" />	
    <input type="hidden" id="curl" name="curl" value="<?php echo $payubiz_registered_url; ?>/PayUBiz/response.php" />
    <input type="hidden" id="key" name="key" value="<?php echo $merchant_key; ?>" />
	<input type="hidden" id="salt" name="salt" value="<?php echo $merchant_salt; ?>" />
	<input type="hidden" id="txnid" name="txnid" value="<?php echo $order_id; ?>" />
	<input type="hidden" id="amount" name="amount" value="<?php echo $chargeableRate; ?>" />
	<input type="hidden" id="productinfo" name="productinfo" value="<?php echo $productinfo; ?>" />
	<input type="hidden" id="firstname" name="firstname" value="<?php echo $firstname; ?>" />
	<input type="hidden" id="email" name="email" value="<?php echo $email_id; ?>" />
	<input type="hidden" id="phone" name="phone" value="<?php echo $phone; ?>" />
	
	<input type="hidden" id="hash" name="hash" placeholder="Hash" value="<?php echo $hash; ?>" />
    <div style="position: absolute;opacity: 0;">
	<input type="submit" value="Pay" id="pppp" />
	</div>
	</form>

</div>

<script>
document.getElementById("pppp").click();
</script>