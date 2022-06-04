<?php  
/* session_start();
$pid = $_SESSION['pid'];
$moduleName = $_SESSION['moduleName'];
$mtype =$_SESSION['mtype'];
$salt = $_SESSION['salt']; */

$orderId = $_POST["txnid"];

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

//echo $pid.'=='.$moduleName.'=='.$mtype; die;

$salt='ni5MJe200DaGE3yfwbAB3m9OFT6XXLAX';

?>
<div class="loader">
<div id="showMessage">

<div>
        <div id="ld2">
          <div>
          </div>
          <div>
          </div>
          <div>
          </div>
          <div>
          </div>
          <div>
          </div>
          <div>
          </div>
          <div>
          </div>
        </div>
      </div>
	  
	  <div class="headbookMsg" style="font-weight: 300;margin-top: 10px;">Please be Patient your booking is being processed....</div>
	 <p style="text-align: center;font-size: 18px; font-weight: 300;margin:0px;padding:0px;    margin-top: 4px">Do not close your browser.</p>
	  </div>
  </div>
  
  
  <style>

  #showMessage{    float: left;
    width: 100%;
    text-align: center;}
  .headbookMsg{font-size: 14px;}
  
  #ld2{    text-align: center;
    padding:39px 41% 39px 47%;}

body {
  min-height: 100vh;
  min-width: 100vw;
  font-family: 'Poppins', sans-serif !important;
  }

.grid {
  display: flex;
  height: 100%;
  width: 100%;
  flex-wrap: wrap; }

.loader {    align-items: center;
    background-color: rgba(255, 255, 255, 0.7);
    margin-top: 70px;}

#ld1 {
  position: relative;
  transform: rotate(45deg); }
  #ld1 div {
    height: 20px;
    width: 20px;
    background: #FE4A49;
    border-radius: 50%;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0; }
  #ld1 div:nth-child(1) {
    animation: ld1_div1 1s ease-in-out infinite; }
  #ld1 div:nth-child(2) {
    animation: ld1_div2 1s ease-in-out infinite; }
  #ld1 div:nth-child(3) {
    animation: ld1_div3 1s ease-in-out infinite; }

@keyframes ld1_div1 {
  0% {
    top: 52.5px;
    background: #FE4A49; }
  50% {
    top: -52.5px;
    background: #59CD90; }
  100% {
    top: 52.5px;
    background: #009FB7; } }
@keyframes ld1_div2 {
  0% {
    right: 52.5px;
    background: #FE4A49; }
  50% {
    right: -52.5px;
    background: #FED766; }
  100% {
    right: 52.5px;
    background: #59CD90; } }
@keyframes ld1_div3 {
  0% {
    left: 52.5px;
    background: #FE4A49; }
  50% {
    left: -52.5px;
    background: #D91E36; }
  100% {
    left: 52.5px;
    background: #FE4A49; } }
#ld2 {
  display: flex;
  flex-direction: row; }
  #ld2 div {
    height: 20px;
    width: 5px;
    background: #FE4A49;
    margin: 3px;
    border-radius: 25px; }
  #ld2 div:nth-child(1) {
    animation: ld2 1s ease-in-out infinite 0s; }
  #ld2 div:nth-child(2) {
    animation: ld2 1s ease-in-out infinite 0.1s; }
  #ld2 div:nth-child(3) {
    animation: ld2 1s ease-in-out infinite 0.2s; }
  #ld2 div:nth-child(4) {
    animation: ld2 1s ease-in-out infinite 0.3s; }
  #ld2 div:nth-child(5) {
    animation: ld2 1s ease-in-out infinite 0.4s; }
  #ld2 div:nth-child(6) {
    animation: ld2 1s ease-in-out infinite 0.5s; }
  #ld2 div:nth-child(7) {
    animation: ld2 1s ease-in-out infinite 0.6s; }

@keyframes ld2 {
  0% {
    transform: scaleY(1);
    background: #FED766; }
  25% {
    background: #009FB7; }
  50% {
    transform: scaleY(2);
    background: #59CD90; }
  75% {
    background: #FE4A49; }
  100% {
    transform: scaleY(1);
    background: #D91E36; } }
#ld3 {
  position: relative;
  animation: outercontainer 4s linear infinite; }
  #ld3 div {
    height: 12px;
    width: 12px;
    border-radius: 50%;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0; }
  #ld3 div:nth-child(1) {
    top: 20px;
    background: #59CD90;
    animation: ld3_div1 2s linear infinite; }
  #ld3 div:nth-child(2) {
    top: -20px;
    background: #D91E36;
    animation: ld3_div2 2s linear infinite; }
  #ld3 div:nth-child(3) {
    left: 20px;
    background: #F39237;
    animation: ld3_div4 2s linear infinite; }
  #ld3 div:nth-child(4) {
    left: -20px;
    background: #0072BB;
    animation: ld3_div3 2s linear infinite; }

@keyframes outercontainer {
  100% {
    transform: rotate(360deg); } }
@keyframes ld3_div1 {
  0% {
    top: 20px; }
  25% {
    top: 0; }
  50% {
    top: 20px; }
  75% {
    top: 0; }
  100% {
    top: 20px; } }
@keyframes ld3_div2 {
  0% {
    top: -20px; }
  25% {
    top: 0; }
  50% {
    top: -20px; }
  75% {
    top: 0; }
  100% {
    top: -20px; } }
@keyframes ld3_div3 {
  0% {
    left: -20px; }
  25% {
    left: 0; }
  50% {
    left: -20px; }
  75% {
    left: 0; }
  100% {
    left: -20px; } }
@keyframes ld3_div4 {
  0% {
    left: 20px; }
  25% {
    left: 0; }
  50% {
    left: 20px; }
  75% {
    left: 0; }
  100% {
    left: 20px; } }
#ld4 {
  position: relative;
  display: flex;
  width: 25%;
  justify-content: space-between; }
  #ld4 div {
    height: 15px;
    width: 15px;
    border-radius: 50%;
    background: #D91E36; }
  #ld4 div:nth-child(1) {
    animation: ld4 3s linear infinite 0s; }
  #ld4 div:nth-child(2) {
    animation: ld4 3s linear infinite 0.15s; }
  #ld4 div:nth-child(3) {
    animation: ld4 3s linear infinite 0.3s; }
  #ld4 div:nth-child(4) {
    animation: ld4 3s linear infinite 0.45s; }

@keyframes ld4 {
  0% {
    opacity: 0;
    transform: scale(0.3);
    background: #59CD90; }
  25% {
    opacity: 1;
    transform: scale(1.8);
    background: #0072BB; }
  50% {
    opacity: 0;
    transform: scale(0.3);
    background: #FE4A49; }
  75% {
    opacity: 1;
    transform: scale(1.8);
    background: #FED766; }
  100% {
    opacity: 0;
  }

</style>

<?php
/*Note : After completing transaction process it is recommended to make an enquiry call with PayU to validate the response received and then save the response to DB or display it on UI*/
$postdata = $_POST;
$msg = '';
$orderId = $_POST["txnid"];
$mihpayid = $_POST["mihpayid"];

/*==log== */
createLogFile($orderId,'Payment Response',json_encode($postdata));

/* Response received from Payment Gateway at this page.

It is absolutely mandatory that the hash (or checksum) is computed again after you receive response from PayU and compare it with request and post back parameters. This will protect you from any tampering by the user and help in ensuring a safe and secure transaction experience. It is mandate that you secure your integration with PayU by implementing Verify webservice and Webhook/callback as a secondary confirmation of transaction response.

Process response parameters to generate Hash signature and compare with Hash sent by payment gateway 
to verify response content. Response may contain additional charges parameter so depending on that 
two order of strings are used in this kit.

Hash string without Additional Charges -
hash = sha512(SALT|status||||||udf5|||||email|firstname|productinfo|amount|txnid|key)

With additional charges - 
hash = sha512(additionalCharges|SALT|status||||||udf5|||||email|firstname|productinfo|amount|txnid|key)

*/
if (isset($postdata ['key'])) {
	$key				=   $postdata['key'];
	$txnid 				= 	$postdata['txnid'];
    $amount      		= 	$postdata['amount'];
	$productInfo  		= 	$postdata['productinfo'];
	$firstname    		= 	$postdata['firstname'];
	$email        		=	$postdata['email'];
	$udf5				=   $postdata['udf5'];	
	$status				= 	$postdata['status'];
	$resphash			= 	$postdata['hash'];
	
	//Calculate response hash to verify	
	$keyString 	  		=  	$key.'|'.$txnid.'|'.$amount.'|'.$productInfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
	$keyArray 	  		= 	explode("|",$keyString);
	$reverseKeyArray 	= 	array_reverse($keyArray);
	$reverseKeyString	=	implode("|",$reverseKeyArray);
	$CalcHashString 	= 	strtolower(hash('sha512', $salt.'|'.$status.'|'.$reverseKeyString)); //hash without 
	
	//check for presence of additionalcharges parameter in response.
	$additionalCharges  = 	"";
	
	If (isset($postdata["additionalCharges"])) {
       $additionalCharges=$postdata["additionalCharges"];
	   //hash with additionalcharges
	   $CalcHashString 	= 	strtolower(hash('sha512', $additionalCharges.'|'.$salt.'|'.$status.'|'.$reverseKeyString));
	}
	//Comapre status and hash. Hash verification is mandatory.
	/*
	if ($status == 'success'  && $resphash == $CalcHashString) {
		$pchecksum = adh_encrypt('payment_status=Confirmed');
		$redirect =$adh_redirect.'&pchecksum='.$pchecksum.'&txn_number='.$mihpayid;
	}
	else{
		$pchecksum = adh_encrypt('payment_status=Failed');
	    $redirect =$adh_redirect.'&pchecksum='.$pchecksum.'&txn_number='.$mihpayid;
	} */
	?>
	<form id="responsefrm" name="responsefrm" action="https://abengines.com/wp-content/plugins/adivaha/adh-integrations/payment-getway/PayUBiz/payubiz_response.php" method="post">
       <input type="hidden" name="pid" value="<?php echo $pid;?>"> 
	   <input type="hidden" name="moduleName" value="<?php echo $moduleName;?>"> 
	   <input type="hidden" name="mtype" value="<?php echo $mtype;?>"> 
	   
	   <input type="hidden" name="key" value="<?php echo $key;?>">
	   <input type="hidden" name="order_id" value="<?php echo $orderId;?>">
	   <input type="hidden" name="txn_id" value="<?php echo $mihpayid;?>">
	   <input type="hidden" name="amount" value="<?php echo $amount;?>">
	   <input type="hidden" name="status" value="<?php echo $status;?>">
	   <input type="hidden" name="resphash" value="<?php echo $resphash;?>">
	   <input type="hidden" name="CalcHashString" value="<?php echo $CalcHashString;?>">
	   
	   <div style="position: absolute;opacity: 0;"><input type="submit" id="submitbtn" value="submitresponse" /></div>
	</form>
	<script>
	document.getElementById("submitbtn").click();
    </script>
	
<?php
	  	
}
//else exit(0);

function adh_encrypt($string){
$secret_key = 'notonbaba';
$secret_iv  = 'notonbaba_iv';
$output     = FALSE;
$encrypt_method = "AES-256-CBC";
$key = hash('sha256', $secret_key);
$iv = substr(hash('sha256', $secret_iv), 0, 16);
$output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
return $output;
}


//This function is used to double check payment
function verifyPayment($key,$salt,$txnid,$status)
{
	$command = "verify_payment"; //mandatory parameter
	
	$hash_str = $key  . '|' . $command . '|' . $txnid . '|' . $salt ;
	$hash = strtolower(hash('sha512', $hash_str)); //generate hash for verify payment request

    $r = array('key' => $key , 'hash' =>$hash , 'var1' => $txnid, 'command' => $command);
	    
    $qs= http_build_query($r);
	//for production
    $wsUrl = "https://info.payu.in/merchant/postservice.php?form=2";
   
	//for test
	//$wsUrl = "https://test.payu.in/merchant/postservice.php?form=2";
	
	try 
	{		
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $wsUrl);
		curl_setopt($c, CURLOPT_POST, 1);
		curl_setopt($c, CURLOPT_POSTFIELDS, $qs);
		curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c, CURLOPT_SSLVERSION, 6); //TLS 1.2 mandatory
		curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
		$o = curl_exec($c);
		if (curl_errno($c)) {
			$sad = curl_error($c);
			throw new Exception($sad);
		}
		curl_close($c);
		
		/*
		Here is json response example -
		
		{"status":1,
		"msg":"1 out of 1 Transactions Fetched Successfully",
		"transaction_details":</strong>
		{	
			"Txn72738624":
			{
				"mihpayid":"403993715519726325",
				"request_id":"",
				"bank_ref_num":"670272",
				"amt":"6.17",
				"transaction_amount":"6.00",
				"txnid":"Txn72738624",
				"additional_charges":"0.17",
				"productinfo":"P01 P02",
				"firstname":"Viatechs",
				"bankcode":"CC",
				"udf1":null,
				"udf3":null,
				"udf4":null,
				"udf5":"PayUBiz_PHP7_Kit",
				"field2":"179782",
				"field9":" Verification of Secure Hash Failed: E700 -- Approved -- Transaction Successful -- Unable to be determined--E000",
				"error_code":"E000",
				"addedon":"2019-08-09 14:07:25",
				"payment_source":"payu",
				"card_type":"MAST",
				"error_Message":"NO ERROR",
				"net_amount_debit":6.17,
				"disc":"0.00",
				"mode":"CC",
				"PG_TYPE":"AXISPG",
				"card_no":"512345XXXXXX2346",
				"name_on_card":"Test Owenr",
				"udf2":null,
				"status":"success",
				"unmappedstatus":"captured",
				"Merchant_UTR":null,
				"Settled_At":"0000-00-00 00:00:00"
			}
		}
		}
		
		Decode the Json response and retrieve "transaction_details" 
		Then retrieve {txnid} part. This is dynamic as per txnid sent in var1.
		Then check for mihpayid and status.
		
		*/
		$response = json_decode($o,true);
		
		if(isset($response['status']))
		{
			// response is in Json format. Use the transaction_detailspart for status
			$response = $response['transaction_details'];
			$response = $response[$txnid];
			
			if($response['status'] == $status) //payment response status and verify status matched
				return true;
			else
				return false;
		}
		else {
			return false;
		}
	}
	catch (Exception $e){
		return false;	
	}
}

function createLogFile($ORDERID,$request,$response){
	$log_filename = "/home/dcfm7wmhjgav/public_html/PayUBiz/LogFile";
	  
    if (!file_exists($log_filename)) {  
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/paytubiz-response-'.$ORDERID.'.txt';
	
	$log_data ="===========Request========="."\n";
	$log_data.=$request."\n";
	$log_data.="===========Response========="."\n";
	$log_data.=$response."\n";
	
    file_put_contents($log_file_data, $log_data . "\n", FILE_APPEND);
}
?>