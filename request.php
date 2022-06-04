<?php
session_start();
$merchant_key =$_REQUEST['key'];
$merchant_salt =$_REQUEST['salt'];
$registers_url =$_REQUEST['registers_url'];
$chargeableRate =$_REQUEST['amount'];
$order_id =$_REQUEST['order_id'];
$productinfo =$_REQUEST['productinfo'];
$firstname =$_REQUEST['firstname'];
$email_id =$_REQUEST['email'];
$surl =$_REQUEST['surl'];
$hash =$_REQUEST['hash'];

/*
For PayU Test Server:
POST URL: https://test.payu.in/_payment

$merchant_key ="gtKFFx";
$merchant_salt ="wia56q6O";

For PayU Production (LIVE) Server:
POST URL: https://secure.payu.in/_payment
*/

$_SESSION['salt'] = $merchant_salt; //save salt in session to use during Hash validation in response

$_SESSION['order_id'] = $order_id;
$_SESSION['adh_redirect'] =$_REQUEST['adh_redirect'];

?>

<div class="main">
	<form action="https://secure.payu.in/_payment" id="payment_form" method="POST">
    
    <input type="hidden" id="surl" name="surl" value="<?php echo $registers_url;?>/PayUBiz/response.php"/>
    <input type="hidden" id="furl" name="furl" value="<?php echo $registers_url;?>/PayUBiz/response.php" />	
    <input type="hidden" id="curl" name="curl" value="<?php echo $registers_url;?>/PayUBiz/response.php" />

    <input type="hidden" id="key" name="key" value="<?php echo $merchant_key; ?>" />
	<input type="hidden" id="salt" name="salt" value="<?php echo $merchant_salt; ?>" />
	<input type="hidden" id="txnid" name="txnid" value="<?php echo $order_id; ?>" />
	<input type="hidden" id="amount" name="amount" value="<?php echo $chargeableRate; ?>" />
	<input type="hidden" id="productinfo" name="productinfo" value="<?php echo $productinfo; ?>" />
	<input type="hidden" id="firstname" name="firstname" value="<?php echo $firstname; ?>" />
	<input type="hidden" id="email" name="email" value="<?php echo $email_id; ?>" />
	<input type="hidden" id="hash" name="hash" placeholder="Hash" value="<?php echo $hash; ?>" />
    <div style="position: absolute;opacity: 0;">
	<input type="submit" value="Pay" id="pppp" />
	</div>
	</form>

</div>

<script>
document.getElementById("pppp").click();
</script>