<?php

  function sendSMS($to = "",$message = "",$sms_sender="",$sms_gateway = "hubtel") {

    $sender = (empty($sms_sender)) ? SMS_SENDER : $sms_sender;
    
      switch ($sms_gateway) {
        case 'hubtel':
            if(!empty(HUBTEL_SMS_GATEWAY_API) && !empty(SMS_SENDER) && !empty($to) && !empty($message)) {
              $url = HUBTEL_SMS_GATEWAY_API.
                "from=".urlencode($sender).
                "&to=".urlencode($to).
                "&content=".urlencode(substr($message, 0, 160)).
                "&clientid=".HUBTEL_CLIENT_ID.
                "&clientsecret=".HUBTEL_CLIENT_SECRET_KEY;
                  
              $url_result = json_decode(file_get_contents($url));
              //print_r($url_result->Status); exit;
              if(array_key_exists($url_result->Status, HUBTEL_SMS_ERROR_MESSAGE)) {
                if($url_result->Status != 0)
                  $return_data = ['error' => HUBTEL_SMS_ERROR_MESSAGE[$url_result->Status]];
                else
                  $return_data = ['success' => "SMS Sent Successful"];
              }
              else {
                $return_data = ['error' => "Error Code Not Found"];
              }
            }
            else {
              $return_data = ['error' => "Invalid Reciept / Empty Message"];
            }
          break;

        case 'mnotify':
            if(!empty(MNOTIFY_SMS_GATEWAY_API) && !empty(SMS_SENDER) && !empty($to) && !empty($message)) {
              $url = MNOTIFY_SMS_GATEWAY_API."key=".MNOTIFY_SMS_API_KEY."&to=".$to."&msg=".$message."&sender_id=".SMS_SENDER;
              
              $url_result = file_get_contents($url);
              //print_r(MNOTIFY_SMS_ERROR_MESSAGE); exit;          
              if(array_key_exists($url_result, MNOTIFY_SMS_ERROR_MESSAGE)) {
                if($url_result != 1000)
                  $this->session->set_flashdata('error',MNOTIFY_SMS_ERROR_MESSAGE[$url_result]);
                else
                  $return_data = ['success' => "SMS Sent Successful"];
              }
              else {
                $return_data = ['error' => "Error Code Not Found"];
              }
            }
            else {
              $return_data = ['error' => "Invalid Reciept / Empty Message"];
            }
          break;
        
        default:
          # code...
          break;
      }
    
    return $return_data;
  }