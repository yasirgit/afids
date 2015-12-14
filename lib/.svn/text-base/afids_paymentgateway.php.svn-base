<?php
/**
* afids_PaymentGateway
*
*
* A PHP class to handle payment processing transactions (credit cards)
*
*
* IMPORTANT NOTE
* 
* 
* LICENCE
* 
*
* @author		Stephan Fopeano
* @version 	001
* @package	
*/

class afids_paymentGateway {

// Global variables

/**
* $gateway_name identifies which gateway to use so that we can support multiple gateways
* The default is Novapointe
*/
public $gateway_name = "novapointe";

/**
* $transaction_type
* options are sale, ship, or sale & ship
*/
public $transaction_type = "";

/**
* $item data is the name=value string to be posted to the gateway
*/
public $item_data = "";

/**
* $shipping code
*/
public $shipping_code = "";

/* class constructor
*/
function afids_paymentGateway () {
	// nothing to do here

}

function submitPayment() {

	if ($this->gateway_name == "novapointe") {
		$url = "https://secure.novapointe.com/cgi-bin/transactionserver.pl";

		$post_string = "merchant=0522";
		$post_string.= "&from=direct";
		$post_string.= "&user=wwwAF1DS";
		$post_string.= "&Password=3161D0na1dSF";
		$post_string.= "&detail=2"; // should always be 2

		if ($this->transaction_type == "") $this->transaction_type = "sale";
		if ($this->transaction_type == "sale") {
			$post_string.= "&command=sale";
			$post_string.= "&overrideglobalship=1"; // should be set to 1 for a sale only
		}
		if ($this->transaction_type == "ship") {
			$post_string.= "&command=ship";
		}
		if ($this->transaction_type == "sale & ship") {
			$post_string.= "&command=sale & ship";
		}

		// set the default shipping method if not specified
		if ($this->shipping_code == "") $this->shipping_code = "USPS"; 	
		$post_string.= "&shippingmethod=".$this->shipping_code;
	
		// attach the rest of the post string
		$post_string.= $this->item_data;
	
		$ch = curl_init($url);
 		curl_setopt($ch, CURLOPT_POST, 1);
 		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
 		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 		curl_setopt($ch, CURLOPT_HEADER, 0);  // DO NOT RETURN HTTP HEADERS
 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  // RETURN THE CONTENTS OF THE CALL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
		$gateway_response = curl_exec($ch);
	 	
	 	if ($gateway_response != "") { 	
 			// return:
 			// http_result = success/failure
 			// transaction_result = success/failure

			// the response from Novapointe is a comma-delimited string:
			// 0 = credit card approval number
			// 1 = the error code, if any
			// 2 = AVS (address verification service) result
			// 3 = AVS code
			// 4 = Novapointe transaction ID

			$responseArr = explode(",",$gateway_response);
			if (count($responseArr) < 5) {
				$returnArr = array ('http_result'=>'success','transaction_result'=>'failure','transaction_error'=>'invalid_response');
			} else {
				if ($responseArr[0] == "") {
					$returnArr = array ('http_result'=>'success','transaction_result'=>'failure','transaction_error'=>'not_approved');
				} else {
					if ($responseArr[1] != "") {
						$returnArr = array ('http_result'=>'success','transaction_result'=>'failure','transaction_error'=>'error_returned','error_message'=>$responseArr[1],'avs_error'=>$responseArr[2]);
					} else {
						$returnArr = array ('http_result'=>'success','transaction_result'=>'success','ccard_approval_number'=>$responseArr[0],'transaction_id'=>$responseArr[4]);
					}
				}				
			}
			curl_close($ch);
			return json_encode($returnArr);	
 		} else {
			$returnArr = array ('http_result'=>'failure','http_error'=>curl_error($ch));
			curl_close($ch);
			return json_encode($returnArr);	
 		}

	} // end of novapointe

} // end of submit payment

} // end of class
?>