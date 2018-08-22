<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/*
|--------------------------------------------------------------------------
| USER DEFINED CONSTANTS
|--------------------------------------------------------------------------
|
| Thes Contains User Defined Constants 
|
*/
define('SYSTEM_DEVS', array("0541786220","0245626487","0247173741"));
define('IMAGE_PATH', 'http://localhost/marksbon/projects/test/resources/images');

define('EDIT_COMPANY_TABLE', 'hr_company_info');
define('VIEW_COMPANY_TABLE', 'vw_company_info');

define('EDIT_USER_TABLE', 'access_users');
define('VIEW_USER_TABLE', 'vw_user_details');

/*
|--------------------------------------------------------------------------
| SMS GATEWAY SETTINGS
|--------------------------------------------------------------------------
|
| Thes Contains User Defined Constants 
|
*/
  define('SMS_SENDER', "BGS Laundry");
  # MNOTIFY SETTINGS
  define('MNOTIFY_SMS_GATEWAY_API', "https://apps.mnotify.net/smsapi?");
  define('MNOTIFY_SMS_API_KEY', "058289f6054524bbd6fa");
  define('MNOTIFY_SMS_ERROR_MESSAGE', array(
      '1000' => "SMS Sent Successfully", 
      '1002' => "Sms Sending Failed", 
      '1003' => "Insufficient SMS Balance", 
      '1005' => "Invalid Recipient Phone Number",
      '1006' =>	"Invalid Sender ID.",
      '1007' => "Message scheduled for later delivery",
      '1008' =>	"Empty Message"
    )
  );

  # HUBTEL SETTINGS
  define('HUBTEL_SMS_GATEWAY_API', "https://api.hubtel.com/v1/messages/send?");
  define('HUBTEL_CLIENT_ID', "nrjhvxtv");
  define('HUBTEL_CLIENT_SECRET_KEY', 'ndzztfvl');
  define('HUBTEL_SMS_ERROR_MESSAGE', array(
      '0' => "SMS Sent Successfully", 
      '1' => "Invalid Recipient Phone Number",
      '6' =>	"Empty Message"
    )
  );

