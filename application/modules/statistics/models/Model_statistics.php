<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Statistics extends CI_Model 
{
	/***********************************************
		Sysaudit Recording 
	************************************************/
		public function sysaudit_record($dbres,$sysaudit_data)
		{
			$tablename	= "sysaudit";
		  $query 			= $dbres->insert($tablename,$sysaudit_data);
			$result 		= $dbres->affected_rows();			
			return (($result) ? TRUE : FALSE );
		}

}
