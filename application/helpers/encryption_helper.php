<?php
  /****************** Text Encrypt & Text Decrypt ******************/
    /***********************************************
      Text Encryption
    ************************************************/
    function password_encrypt($text) 
    {
    	return (password_hash($text,PASSWORD_BCRYPT));
    }
	
    /***********************************************
      Text Decryption
    ************************************************/
    function password_decrypt($text,$encrypted_text) 
    {
  		$encrypted_text = str_replace('"',"''",$encrypted_text);
  		
  		return((password_verify($text,$encrypted_text)) ? TRUE : FALSE);
    }

    function getToken($length)
    {
      $token = "";
      $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
      $codeAlphabet.= "0123456789";
      $max = strlen($codeAlphabet); // edited

      for ($i=0; $i < $length; $i++) {
          $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
      }

      return $token;
    }

    function crypto_rand_secure($min, $max)
    {
      $range = $max - $min;
      if ($range < 1) return $min; // not so random...
      $log = ceil(log($range, 2));
      $bytes = (int) ($log / 8) + 1; // length in bytes
      $bits = (int) $log + 1; // length in bits
      $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
      do {
          $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
          $rnd = $rnd & $filter; // discard irrelevant bits
      } while ($rnd > $range);
      return $min + $rnd;
    }
    
?>