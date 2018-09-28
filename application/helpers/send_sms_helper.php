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
              $reponse_msg_array = json_decode(HUBTEL_SMS_RESPONSE_MESSAGES);

              if(array_key_exists($url_result->Status, $reponse_msg_array)) {
                if($url_result->Status != 0) 
                  $return_data = ['error' => $reponse_msg_array[$url_result->Status]];
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
              $reponse_msg_array = json_decode(HUBTEL_SMS_RESPONSE_MESSAGES);

              if(array_key_exists($url_result, $reponse_msg_array)) {
                if($url_result != 1000)
                  $this->session->set_flashdata('error',$reponse_msg_array[$url_result]);
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