<?php
namespace App\Libraries;
class Ssl{
    function pay($amount,$name,$email,$address1,$address2,$phone,$spot,$trans_id){
        /* PHP */
        $post_data = array();
        // $post_data['store_id'] = "dugzaorglive";
        // $post_data['store_passwd'] = "639973351517266154";
        $post_data['store_id'] = "pureh5f7b176412e04";
        $post_data['store_passwd'] = "pureh5f7b176412e04@ssl";
        $post_data['total_amount'] = $amount;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $trans_id;
        $post_data['success_url'] = route('success');
        $post_data['fail_url'] = route('faild');
        $post_data['cancel_url'] = route('cancel');
        # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

        # EMI INFO
        $post_data['emi_option'] = "1";
        $post_data['emi_max_inst_option'] = "9";
        $post_data['emi_selected_inst'] = "9";

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $name;
        $post_data['cus_email'] = $email;
        $post_data['cus_add1'] = $address1;
        $post_data['cus_add2'] = $address2;
        $post_data['cus_city'] = "Khagrachori";
        $post_data['cus_state'] = "Chottrogram";
        $post_data['cus_postcode'] = "1000";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $phone;

        # SHIPMENT INFORMATION
        $post_data['shipping_method'] = "No";
        // $post_data['ship_name'] = "Store Test";
        // $post_data['ship_add1 '] = "Dhaka";
        // $post_data['ship_add2'] = "Dhaka";
        // $post_data['ship_city'] = "Dhaka";
        // $post_data['ship_state'] = "Dhaka";
        // $post_data['ship_postcode'] = "1000";
        // $post_data['ship_country'] = "Bangladesh";

        # OPTIONAL PARAMETERS
        // $post_data['value_a'] = "ref001";
        // $post_data['value_b '] = "ref002";
        // $post_data['value_c'] = "ref003";
        // $post_data['value_d'] = "ref004";

        $post_data['product_amount'] = $amount;
        $post_data['vat'] = "5";
        $post_data['discount_amount'] = "0";
        $post_data['convenience_fee'] = "0";
        $post_data['num_of_item'] = "1";
        $post_data['product_category'] = "Electronic";
        $post_data['product_profile'] = "non-physical-goods";
        $post_data['product_name'] = $spot.' Bazar Fund';

        # REQUEST SEND TO SSLCOMMERZ
        $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v4/api.php";
        // $direct_api_url = "https://securepay.sslcommerz.com/gwprocess/v4/api.php";

        
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url );
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1 );
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC
        
        
        $content = curl_exec($handle );
        
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        
        if($code == 200 && !( curl_errno($handle))) {
            curl_close( $handle);
            $sslcommerzResponse = $content;
        } else {
            curl_close( $handle);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }
        
        # PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true );
        
        //var_dump($sslcz); exit;
        
        if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="") {
        	// this is important to show the popup, return or echo to sent json response back
           return  json_encode(['status' => 'success', 'data' => $sslcz['GatewayPageURL'], 'logo' => $sslcz['storeLogo'] ]);
        } else {
           return  json_encode(['status' => 'fail', 'data' => null, 'message' => "JSON Data parsing error!"]);
        }
    }
    public function validate($val_id){
        $store_id=urlencode("pureh5f7b176412e04");
        $store_passwd=urlencode("pureh5f7b176412e04@ssl");
        $requested_url = ("https://securepay.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");
        
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $requested_url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC
        
        $result = curl_exec($handle);
        
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        
        if($code == 200 && !( curl_errno($handle)))
        {
        
        	# TO CONVERT AS ARRAY
        	# $result = json_decode($result, true);
        	# $status = $result['status'];
        
        	# TO CONVERT AS OBJECT
        	$result = json_decode($result);
        
        	# TRANSACTION INFO
        	$status = $result->status;
        	$tran_date = $result->tran_date;
        	$tran_id = $result->tran_id;
        	$val_id = $result->val_id;
        	$amount = $result->amount;
        	$store_amount = $result->store_amount;
        	$bank_tran_id = $result->bank_tran_id;
        	$card_type = $result->card_type;
        
        	# EMI INFO
        	$emi_instalment = $result->emi_instalment;
        	$emi_amount = $result->emi_amount;
        	$emi_description = $result->emi_description;
        	$emi_issuer = $result->emi_issuer;
        
        	# ISSUER INFO
        	$card_no = $result->card_no;
        	$card_issuer = $result->card_issuer;
        	$card_brand = $result->card_brand;
        	$card_issuer_country = $result->card_issuer_country;
        	$card_issuer_country_code = $result->card_issuer_country_code;
        
        	# API AUTHENTICATION
        	$APIConnect = $result->APIConnect;
        	$validated_on = $result->validated_on;
        	$gw_version = $result->gw_version;
        	return true;
        
        } else {
        
        	return false;
        }
    }
}