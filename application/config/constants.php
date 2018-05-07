<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Application Constants
|--------------------------------------------------------------------------
*/

defined('DEFAULT_PROFILE_PIC') OR define('DEFAULT_PROFILE_PIC', 'img/profpic.png');
defined('DEFAULT_PROFILE_PIC_TENANT') OR define('DEFAULT_PROFILE_PIC_TENANT', 'img/profpic-tenant.png');
defined('DEFAULT_IDENTIFICATION_PIC') OR define('DEFAULT_IDENTIFICATION_PIC', 'img/idpic.png');
defined('DEFAULT_ITEM_IMAGE') OR define('DEFAULT_ITEM_IMAGE', 'img/default_item.png');

defined('DEFAULT_ITEM_PICTURE') OR define('DEFAULT_ITEM_PICTURE', array(
	'ORDER' => 'img/default_item_order.png',
	'BID' => 'img/default_item_bid.png',
	'REPAIR' => 'img/default_item_repair.png',
	'' => 'img/default_item.png',
	)
);

defined('REPORT_TYPES') OR define('REPORT_TYPES', array(
	'BY_TRANSACTION'	=> array(
		'description'	=> 'Semua Transaksi',
		'tenant_opt'	=> false,
		),
	'BY_TENANT'			=> array(
		'description'	=> 'Transaksi Tenant',
		'tenant_opt'	=> true,
		),
	// 'BY_ITEM'			=> array(
		// 'description'	=> 'Barang Tenant',
		// 'tenant_opt'	=> true,
		// ),
	'HOT_ITEM'			=> array(
		'description'	=> 'Hot & Promoted Item',
		'tenant_opt'	=> true,
		),
	)
);

defined('ORDER_STATUS') OR define('ORDER_STATUS', array(
		'name' => array(
			"WAITING_FOR_PAYMENT"		=> "WAITING_FOR_PAYMENT",
			"QUEUED"					=> "QUEUED",
			"PICKING_FROM_TENANT"		=> "PICKING_FROM_TENANT",
			"DELIVERING_TO_CUSTOMER"	=> "DELIVERING_TO_CUSTOMER",
			"RECEIVED"					=> "RECEIVED",
			"DONE"						=> "DONE",
			"PICKING_FROM_CUSTOMER"		=> "PICKING_FROM_CUSTOMER",
			"DELIVERING_TO_TENANT"		=> "DELIVERING_TO_TENANT",
			"TENANT_RECEIVED"			=> "TENANT_RECEIVED",
			"COST_CALCULATED"			=> "COST_CALCULATED",
			"REPAIRING"					=> "REPAIRING",
			"REPAIR_FINISHED"			=> "REPAIR_FINISHED",
			"REFUNDED"					=> "REFUNDED",
			"REPAIR_CANCELLED"			=> "REPAIR_CANCELLED",
		),
		'description' => array(
			"WAITING_FOR_PAYMENT"		=> "Menunggu Pembayaran",
			"QUEUED"					=> "Pesanan sedang diproses",
			"PICKING_FROM_TENANT"		=> "Pengambilan dari tenant",
			"DELIVERING_TO_CUSTOMER"	=> "Pengantaran ke customer",
			"RECEIVED"					=> "Telah diterima",
			"DONE"						=> "Selesai", // 2 x 24 jam auto selesai
			"PICKING_FROM_CUSTOMER"		=> "Pengambilan dari customer",
			"DELIVERING_TO_TENANT"		=> "Pengantaran ke tenant",
			"TENANT_RECEIVED"			=> "Telah diterima oleh tenant",
			"COST_CALCULATED"			=> "Biaya sudah dihitung",
			"REPAIRING"					=> "Perbaikan diproses",
			"REPAIR_FINISHED"			=> "Perbaikan selesai",
			"REFUNDED"					=> "Uang dikembalikan",
			"REPAIR_CANCELLED"			=> "Perbaikan dibatalkan",
		),
		'sequence_index' => array(
			"WAITING_FOR_PAYMENT"		=> "01",
			"QUEUED"					=> "02",
			"PICKING_FROM_TENANT"		=> "09",
			"DELIVERING_TO_CUSTOMER"	=> "10",
			"RECEIVED"					=> "11",
			"DONE"						=> "12",
			"PICKING_FROM_CUSTOMER"		=> "03",
			"DELIVERING_TO_TENANT"		=> "04",
			"TENANT_RECEIVED"			=> "05",
			"COST_CALCULATED"			=> "06",
			"REPAIRING"					=> "07",
			"REPAIR_FINISHED"			=> "08",
			"REFUNDED"					=> "13",
			"REPAIR_CANCELLED"			=> "14"
		),
		'is_busy' => array(
			"WAITING_FOR_PAYMENT"		=> FALSE,
			"QUEUED"					=> FALSE,
			"PICKING_FROM_TENANT"		=> TRUE,
			"DELIVERING_TO_CUSTOMER"	=> TRUE,
			"RECEIVED"					=> FALSE,
			"DONE"						=> FALSE,
			"PICKING_FROM_CUSTOMER"		=> TRUE,
			"DELIVERING_TO_TENANT"		=> TRUE,
			"TENANT_RECEIVED"			=> TRUE,
			"COST_CALCULATED"			=> TRUE,
			"REPAIRING"					=> TRUE,
			"REPAIR_FINISHED"			=> TRUE,
			"REFUNDED"					=> TRUE,
			"REPAIR_CANCELLED"			=> TRUE,
		),
	)
);

defined('DISPUTE_STATUS') OR define('DISPUTE_STATUS', array(
		'name' => array(
			"ON_PROGRESS"		=> "ON_PROGRESS",
			"RESOLVED"			=> "RESOLVED",
		),
		'description' => array(
			"ON_PROGRESS"		=> "Dalam proses",
			"RESOLVED"			=> "Selesai",
		),
	)
);

defined('POSTED_ITEM_VARIANCE_TYPE') OR define('POSTED_ITEM_VARIANCE_TYPE', array(
		'type' => array(
			"WARNA"				=> "Warna",
			"UKURAN"			=> "Ukuran",
		),
	)
);

defined('PAGINATION') OR define('PAGINATION', array(
		'type' => array(
			"LIMIT_ITEM"		=> 20,
			"LIMIT_CATEGORY"	=> 16,
		),
	)
);

defined('TYPE') OR define('TYPE', array(
		'name' => array(
			'CUSTOMER'				=> 'CUSTOMER',
			'TENANT'				=> 'TENANT',
			'DELIVERER'				=> 'DELIVERER',
			'ADMIN'					=> 'ADMIN',
			'POSTED_ITEM' 			=> 'POSTED_ITEM',
			'POSTED_ITEM_VARIANCE'	=> 'POSTED_ITEM_VARIANCE',
			'ORDER_DETAILS'			=> 'ORDER_DETAILS',
			'ORDER_STATUS_HISTORY'	=> 'ORDER_STATUS_HISTORY',
			'BILLING' 				=> 'BILLING',
			'PAYMENT' 				=> 'PAYMENT',
			'BIDDING'				=> 'BIDDING',
			'BRAND'					=> 'BRAND',
			'REWARD'				=> 'REWARD',
			'VOUCHER'				=> 'VOUCHER',
			'HOT_ITEM'				=> 'HOT_ITEM',
			'MESSAGE_INBOX'			=> 'MESSAGE_INBOX',
			'DISPUTE'				=> 'DISPUTE',
			'NEGOTIATED_PRICE'		=> 'NEGOTIATED_PRICE',
			'FOLLOWING_TENANT'		=> 'FOLLOWING_TENANT',
			'FEEDBACK'				=> 'FEEDBACK',
			'SHIPPING_ADDRESS'		=> 'SHIPPING_ADDRESS',
			'TENANT_BILL'			=> 'TENANT_BILL',
			'TENANT_PAY_RECEIPT'	=> 'TENANT_PAY_RECEIPT',
			'SHIPPING_CHARGE'		=> 'SHIPPING_CHARGE',
			'SETTING_REWARD'		=> 'SETTING_REWARD',
			'REDEEM_VOUCHER'		=> 'REDEEM_VOUCHER',
			'REDEEM_REWARD'			=> 'REDEEM_REWARD',
			'POINT_HISTORY'			=> 'POINT_HISTORY'
		),
		'initial' => array(
			'CUSTOMER'				=> 'CUS',
			'TENANT'				=> 'TNT',
			'DELIVERER'				=> 'DLV',
			'ADMIN'					=> 'ADM',
			'POSTED_ITEM' 			=> 'ITM',
			'POSTED_ITEM_VARIANCE'	=> 'VAR',
			'ORDER_DETAILS'			=> 'ORD',
			'ORDER_STATUS_HISTORY'	=> 'OST',
			'BILLING' 				=> 'BIL',
			'PAYMENT' 				=> 'PAY',
			'BIDDING'				=> 'BID',
			'BRAND'					=> 'BRD',
			'REWARD'				=> 'RWD',
			'VOUCHER'				=> 'VCR',
			'HOT_ITEM'				=> 'HOT',
			'MESSAGE_INBOX'			=> 'MSG',
			'DISPUTE'				=> 'DSP',
			'NEGOTIATED_PRICE'		=> 'NGO',
			'FOLLOWING_TENANT'		=> 'FOL',
			'FEEDBACK'				=> 'FED',
			'SHIPPING_ADDRESS'		=> 'ADD',
			'TENANT_BILL'			=> 'TBL',
			'TENANT_PAY_RECEIPT'	=> 'TPR',
			'SHIPPING_CHARGE'		=> 'FEE',
			'SETTING_REWARD'		=> 'SRW',
			'REDEEM_VOUCHER'		=> 'RDV',
			'REDEEM_REWARD'			=> 'RDR',
			'POINT_HISTORY'			=> 'PTH'
		),
		'id_length' => array(
			'CUSTOMER'				=> 8,
			'TENANT'				=> 5,
			'DELIVERER'				=> 5,
			'ADMIN'					=> 5,
			'POSTED_ITEM' 			=> 9,
			'POSTED_ITEM_VARIANCE' 	=> 10,
			'ORDER_DETAILS'			=> 9,
			'ORDER_STATUS_HISTORY'	=> 10,
			'BILLING' 				=> 9,
			'PAYMENT' 				=> 9,
			'BIDDING'				=> 9,
			'BRAND'					=> 6,
			'REWARD'				=> 8,
			'VOUCHER'				=> 8,
			'HOT_ITEM'				=> 8,
			'MESSAGE_INBOX'			=> 10,
			'DISPUTE'				=> 9,
			'NEGOTIATED_PRICE'		=> 10,
			'FOLLOWING_TENANT'		=> 8,
			'FEEDBACK'				=> 10,
			'SHIPPING_ADDRESS'		=> 8,
			'TENANT_BILL'			=> 8,
			'TENANT_PAY_RECEIPT'	=> 8,
			'SHIPPING_CHARGE'		=> 10,
			'SETTING_REWARD'		=> 6,
			'REDEEM_VOUCHER'		=> 8,
			'REDEEM_REWARD'			=> 8,
			'POINT_HISTORY'			=> 10
		),
		'model' => array(
			'CUSTOMER'				=> 'Customer_model',
			'TENANT'				=> 'Tenant_model',
			'DELIVERER'				=> 'Deliverer_model',
			'ADMIN'					=> 'Admin_model',
			'POSTED_ITEM' 			=> 'Item_model',
			'POSTED_ITEM_VARIANCE'	=> 'Posted_item_variance_model',
			'ORDER_DETAILS'			=> 'Order_model',
			'ORDER_STATUS_HISTORY'	=> 'Order_status_history_model',
			'BILLING' 				=> 'Billing_model',
			'PAYMENT' 				=> 'Payment_model',
			'BIDDING'				=> 'Bidding_model',
			'BRAND'					=> 'Brand_model',
			'REWARD'				=> 'Reward_model',
			'VOUCHER'				=> 'Voucher_model',
			'MESSAGE_INBOX'			=> 'Message_model',
			'DISPUTE'				=> 'Dispute_model',
			'FEEDBACK'				=> 'Feedback_model',
			'TENANT_BILL'			=> 'Tenant_Bill_model',
			'TENANT_PAY_RECEIPT'	=> 'Tenant_Pay_Receipt_model',
			'POINT_HISTORY'			=> 'Point_history_model'
		),
		'TOP_MENU' => array(
			'GUEST'					=> 'top_menu_guest',
			'CUSTOMER'				=> 'top_menu_customer',
			'TENANT'				=> 'top_menu_tenant',
			'DELIVERER'				=> 'top_menu_deliverer',
			'ADMIN'					=> 'top_menu_admin',
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
defined('COMPANY_NAME') OR define('COMPANY_NAME', 'Cyberia');
defined('INVOICE_DUE') OR define('INVOICE_DUE', '1'); // hari lamanya invoice jatuh tempo

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
