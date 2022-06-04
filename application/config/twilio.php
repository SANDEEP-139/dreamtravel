<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
/*
|--------------------------------------------------------------------------
| For Twilio msg api
|--------------------------------------------------------------------------
|
	* Name:  Twilio
	* Author: Ben Edmunds
	*		  ben.edmunds@gmail.com
	*         @benedmunds
	*
	* Location:
	*
	* Created:  03.29.2011
	*
	* Description:  Twilio configuration settings.
	
	 * Mode ("sandbox" or "prod")
	 */
	$config['mode']   = 'sandbox';

	/*  Account SID */
	$config['account_sid']   = 'AC9ae65711603ef0018347f115f98baddd';//'AC48c9c4aa358e1768c8288660f404dc4c';

	/*  Auth Token  */
	$config['auth_token']    = 'f853d75514690a9dfe58181b2d95e454';//'cb1f9c65eae20b057763800825c5b11e';

	/* API Version */
	$config['api_version']   = '2010-04-01';

	/*  Twilio Phone Number
	 **/
		$config['number']        = '+12014823386';

/* End of file twilio.php */