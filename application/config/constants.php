<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Application Constants
|--------------------------------------------------------------------------
*/
defined('TYPE') OR define('TYPE', array(
		'name' => array(
			'CUSTOMER'			=> 'CUSTOMER',
			'TENANT'			=> 'TENANT',
			'DELIVERER'			=> 'DELIVERER',
			'ADMIN'				=> 'ADMIN',
			'POSTED_ITEM' 		=> 'POSTED_ITEM',
			'ORDER_DETAILS'		=> 'ORDER_DETAILS',
			'BILLING' 			=> 'BILLING',
			'BIDDING'			=> 'BIDDING',
			'BRAND'				=> 'BRAND',
			'REWARD'			=> 'REWARD',
			'VOUCHER'			=> 'VOUCHER',
			'HOT_ITEM'			=> 'HOT_ITEM',
			'MESSAGE_INBOX'		=> 'MESSAGE_INBOX',
			'DISPUTE'			=> 'DISPUTE',
			'NEGOTIATED_PRICE'	=> 'NEGOTIATED_PRICE',
			'FOLLOWING_TENANT'	=> 'FOLLOWING_TENANT',
			'FEEDBACK'			=> 'FEEDBACK',
			'SHIPPING_ADDRESS'	=> 'SHIPPING_ADDRESS',
			'TENANT_BILL'		=> 'TENANT_BILL',
			'TENANT_PAY_RECEIPT'=> 'TENANT_PAY_RECEIPT',
			'ADDITIONAL_FEE'	=> 'ADDITIONAL_FEE',
			'REDEEM_VOUCHER'	=> 'REDEEM_VOUCHER',
			'REDEEM_REWARD'		=> 'REDEEM_REWARD'			
		),
		'initial' => array(
			'CUSTOMER'			=> 'CUS',
			'TENANT'			=> 'TNT',
			'DELIVERER'			=> 'DLV',
			'ADMIN'				=> 'ADM',
			'POSTED_ITEM' 		=> 'ITM',
			'ORDER_DETAILS'		=> 'ORD',
			'BILLING' 			=> 'BIL',
			'BIDDING'			=> 'BID',
			'BRAND'				=> 'BRD',
			'REWARD'			=> 'RWD',
			'VOUCHER'			=> 'VCR',
			'HOT_ITEM'			=> 'HOT',
			'MESSAGE_INBOX'		=> 'MSG',
			'DISPUTE'			=> 'DSP',
			'NEGOTIATED_PRICE'	=> 'NGO',
			'FOLLOWING_TENANT'	=> 'FOL',
			'FEEDBACK'			=> 'FED',
			'SHIPPING_ADDRESS'	=> 'ADD',
			'TENANT_BILL'		=> 'TBL',
			'TENANT_PAY_RECEIPT'=> 'TPR',
			'ADDITIONAL_FEE'	=> 'FEE',
			'REDEEM_VOUCHER'	=> 'RDV',
			'REDEEM_REWARD'		=> 'RDR'	
		),
		'id_length' => array(
			'CUSTOMER'			=> 8,
			'TENANT'			=> 5,
			'DELIVERER'			=> 5,
			'ADMIN'				=> 5,
			'POSTED_ITEM' 		=> 9,
			'ORDER_DETAILS'		=> 9,
			'BILLING' 			=> 9,
			'BIDDING'			=> 9,
			'BRAND'				=> 6,
			'REWARD'			=> 8,
			'VOUCHER'			=> 8,
			'HOT_ITEM'			=> 8,
			'MESSAGE_INBOX'		=> 10,
			'DISPUTE'			=> 9,
			'NEGOTIATED_PRICE'	=> 10,
			'FOLLOWING_TENANT'	=> 8,
			'FEEDBACK'			=> 10,
			'SHIPPING_ADDRESS'	=> 8,
			'TENANT_BILL'		=> 8,
			'TENANT_PAY_RECEIPT'=> 8,
			'ADDITIONAL_FEE'	=> 10,
			'REDEEM_VOUCHER'	=> 8,
			'REDEEM_REWARD'		=> 8
		),
		'model' => array(
			'CUSTOMER'			=> 'Customer_model',
			'TENANT'			=> 'Tenant_model',
			'DELIVERER'			=> 'Deliverer_model',
			'ADMIN'				=> 'Admin_model',
			'POSTED_ITEM' 		=> 'Item_model',
			'ORDER_DETAILS'		=> 'Order_model',
			'BILLING' 			=> 'Billing_model',
			'BIDDING'			=> 'Bidding_model',
			'BRAND'				=> 'Brand_model',
			'REWARD'			=> 'Reward_model',
			'VOUCHER'			=> 'Voucher_model',
			'MESSAGE_INBOX'		=> 'Message_model',
			'DISPUTE'			=> 'Dispute_model',
			'FEEDBACK'			=> 'Feedback_model',
			'TENANT_BILL'		=> 'Tenant_Bill_model',
			'TENANT_PAY_RECEIPT'=> 'Tenant_Pay_Receipt_model',
		),
		// 'CUSTOMER' => array(
			// 'name'		=> 'CUSTOMER',
			// 'initial'	=> 'CUS',
			// 'id_length'	=> 8,
			// 'model'		=> 'Customer_model'
		// ),
		// 'TENANT' => array(
			// 'name'		=> 'TENANT',
			// 'initial'	=> 'TNT',
			// 'id_length'	=> 5,
			// 'model'		=> 'Tenant_model'
		// ),
		// 'DELIVERER' => array(
			// 'name'		=> 'DELIVERER',
			// 'initial'	=> 'DLV',
			// 'id_length'	=> 5,
			// 'model'		=> 'Deliverer_model'
		// ),
		// 'ADMIN' => array(
			// 'name'		=> 'ADMIN',
			// 'initial'	=> 'ADM',
			// 'id_length'	=> 5,
			// 'model'		=> 'Admin_model'
		// ),
	)
);

/*
|--------------------------------------------------------------------------
| Application Production
|--------------------------------------------------------------------------
*/
defined('COMPANY_NAME') OR define('COMPANY_NAME', 'Bekasi Cyber Park Online');

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
