<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['top_menu_guest'] = array(
	'top' => array(
		),
	'profile' => array(
		'LOGIN' => array(
			'text'	=> "Login",
			'url'	=> "login",
			'notif'	=> "",
			),
		'DAFTAR' => array(
			'text'	=> "Daftar",
			'url'	=> "account/signup",
			'notif'	=> "",
			),
		),
	'strip' => array(
		'DASHBOARD' => array(
			'text'	=> "BERANDA",
			'url'	=> "dashboard",
			'notif'	=> "",
			),
		'PRODUCT' => array(
			'text'	=> "PRODUK",
			'url'	=> "",
			'notif'	=> "",
			),
		'FAVORITE_ITEM' => array(
			'text'	=> "FAVORIT",
			'url'	=> "item/tenant_items",
			'notif'	=> "",
			),
		'WISHLIST' => array(
			'text'	=> "WISHLIST",
			'url'	=> "customer/favorite_item",
			'notif'	=> "",
			),
		'REPAIR' => array(
			'text'	=> "SERVIS",
			'url'	=> "item/service",
			'notif'	=> "",
			),
		),
	);

$config['top_menu_customer'] = array(
	'top' => array(
		'INBOX' => array(
			'text'	=> "Pesan",
			'icon'	=> "message",
			'url'	=> "message",
			'notif'	=> "customer_inbox",
			),
		'BILLING' => array(
			'text'	=> "Transaksi",
			'icon'	=> "document",
			'url'	=> "billing",
			'notif'	=> "customer_transaction",
			),
		'CART' => array(
			'text'	=> "Keranjang",
			'icon'	=> "cart",
			'url'	=> "customer/cart",
			'notif'	=> "customer_cart",
			),
		),
	'profile' => array(
		'PROFILE' => array(
			'text'	=> "Profil Saya",
			'url'	=> "customer/profile",
			'notif'	=> "",
			),
		'REWARD' => array(
			'text'	=> "Reward",
			'url'	=> "customer/reward",
			'notif'	=> "",
			),
		'LOGOUT' => array(
			'text'	=> "Logout",
			'url'	=> "login/logout",
			'notif'	=> "",
			),
		),
	'strip' => array(
		'DASHBOARD' => array(
			'text'	=> "BERANDA",
			'url'	=> "dashboard",
			'notif'	=> "",
			),
		'PRODUCT' => array(
			'text'	=> "PRODUK",
			'url'	=> "",
			'notif'	=> "",
			),
		'FAVORITE_ITEM' => array(
			'text'	=> "FAVORIT",
			'url'	=> "item/tenant_items",
			'notif'	=> "",
			),
		'WISHLIST' => array(
			'text'	=> "WISHLIST",
			'url'	=> "customer/favorite_item",
			'notif'	=> "",
			),
		'REPAIR' => array(
			'text'	=> "SERVIS",
			'url'	=> "item/service",
			'notif'	=> "",
			),
		'VOUCHER' => array(
			'text'	=> "VOUCHER",
			'url'	=> "voucher/voucher_list",
			'notif'	=> "",
			),
		// 'FOLLOWED_TENANT' => array(
			// 'text'	=> "Tenant",
			// 'url'	=> "customer/followed_tenant",
			// ),
		// 'DSIPUTE' => array(
			// 'text'	=> "Dispute",
			// 'url'	=> "dispute",
			// ),
		// 'ORDER_LIST' => array(
			// 'text'	=> "Orders",
			// 'url'	=> "customer/order_list",
			// ),
		),
	);

$config['top_menu_tenant'] = array(
	'top' => array(
		'INBOX' => array(
			'text'	=> "Pesan",
			'icon'	=> "message",
			'url'	=> "message",
			'notif'	=> "tenant_inbox",
			),
		// 'ORDER' => array(
			// 'text'	=> "Input OTP",
			// 'icon'	=> "message",
			// 'url'	=> "order/order_list",
			// ),
		),
	'profile' => array(
		'PROFILE' => array(
			'text'	=> "Akun Saya",
			'url'	=> "tenant/account",
			'notif'	=> "",
			),
		'LOGOUT' => array(
			'text'	=> "Logout",
			'url'	=> "login/logout",
			'notif'	=> "",
			),
		),
	'strip' => array(
		'ITEM' => array(
			'text'	=> "PRODUKKU",
			'url'	=> "item/post_item_list",
			'notif'	=> "",
			),
		'TRANSACTION' => array(
			'text'	=> "PENJUALANKU",
			'url'	=> "order/order_list",
			'notif'	=> "tenant_transaction",
			),
		'DISPUTE' => array(
			'text'	=> "KOMPLAIN",
			'url'	=> "dispute",
			'notif'	=> "tenant_dispute",
			),
		'SERVICE' => array(
			'text'	=> "SERVIS",
			'url'	=> "item/service",
			'notif'	=> "",
			),
		),
	);

$config['top_menu_deliverer'] = array(
	'top' => array(
		),
	'profile' => array(
		'LOGOUT' => array(
			'text'	=> "Logout",
			'url'	=> "login/logout",
			'notif'	=> "",
			),
		),
	'strip' => array(
		),
	);

$config['top_menu_admin'] = array(
	'top' => array(
		// 'ACCOUNT' => array(
			// 'text'	=> "Account",
			// 'icon'	=> "flag",
			// 'url'	=> "account/account_list",
			// 'notif' => "",
			// ),
		// 'PAY_DEBT' => array(
			// 'text'	=> "Payment",
			// 'icon'	=> "document",
			// 'url'	=> "admin/tenant_to_pay_list",
			// 'notif' => "admin_payment",
			// ),
		// 'REPORT' => array(
			// 'text'	=> "Laporan",
			// 'icon'	=> "document",
			// 'url'	=> "admin/report",
			// 'notif' => "",
			// ),
		),
	'profile' => array(
		'SETTING' => array(
			'text'	=> "Setting",
			'url'	=> "account/setting",
			'notif' => "",
			),
		'LOGOUT' => array(
			'text'	=> "Logout",
			'url'	=> "login/logout",
			'notif' => "",
			),
		),
	'strip' => array(
		// 'ORDER' => array(
			// 'text'	=> "DAFTAR ORDER",
			// 'url'	=> "order/order_list",
			// 'notif' => "admin_order",
			// ),
		// 'VOUCHER' => array(
			// 'text'	=> "VOUCHER",
			// 'url'	=> "voucher/voucher_list",
			// 'notif' => "",
			// ),
		// 'REWARD' => array(
			// 'text'	=> "REWARD",
			// 'url'	=> "reward/reward_list",
			// 'notif' => "admin_reward",
			// ),
		// 'BRAND' => array(
			// 'text'	=> "BRAND",
			// 'url'	=> "brand/brand_list",
			// 'notif' => "",
			// ),
		// 'CATEGORY' => array(
			// 'text'	=> "KATEGORI",
			// 'url'	=> "category/category_list",
			// 'notif' => "",
			// ),
		// 'HOT_ITEM' => array(
			// 'text'	=> "HOT ITEM",
			// 'url'	=> "admin/hot_item_list",
			// 'notif' => "admin_hot_item",
			// ),
		// 'SEO_ITEM' => array(
			// 'text'	=> "PROMOTED ITEM",
			// 'url'	=> "admin/seo_item_list",
			// 'notif' => "admin_promoted_item",
			// ),
		// 'BIDDING' => array(
			// 'text'	=> "LELANG",
			// //'icon'	=> "speaker",
			// 'url'	=> "bidding_live/bidding_live_list",
			// 'notif' => "admin_bidding",
			// ),
		// 'BILLING' => array(
			// 'text'	=> "BILLING",
			// 'url'	=> "billing",
			// 'notif' => "",
			// ),
		// 'DISPUTE' => array(
			// 'text'	=> "DISPUTE",
			// 'url'	=> "dispute",
			// 'notif' => "",
			// ),
		),
	);

$config['dashboard_menu_admin'] = array(
	'OPERASIONAL' => array(
		'ORDER' => array(
			'text'	=> "DAFTAR ORDER",
			'url'	=> "order/order_list",
			'notif' => "admin_order",
			),
		'DISPUTE' => array(
			'text'	=> "DISPUTE",
			'url'	=> "dispute",
			'notif' => "",
			),
		'PAY_DEBT' => array(
			'text'	=> "PAYMENT",
			'icon'	=> "document",
			'url'	=> "admin/tenant_to_pay_list",
			'notif' => "admin_payment",
			),
		'BRAND' => array(
			'text'	=> "BRAND",
			'url'	=> "brand/brand_list",
			'notif' => "",
			),
		'CATEGORY' => array(
			'text'	=> "KATEGORI",
			'url'	=> "category/category_list",
			'notif' => "",
			),
		'ACCOUNT' => array(
			'text'	=> "ACCOUNT",
			'icon'	=> "flag",
			'url'	=> "account/account_list",
			'notif' => "",
			),
		),
	'PROMOSI' => array(
		'HOT_ITEM' => array(
			'text'	=> "HOT ITEM",
			'url'	=> "admin/hot_item_list",
			'notif' => "admin_hot_item",
			),
		'SEO_ITEM' => array(
			'text'	=> "PROMOTED ITEM",
			'url'	=> "admin/seo_item_list",
			'notif' => "admin_promoted_item",
			),
		'FLASH_SALE' => array(
			'text'	=> "FLASH SALE",
			'url'	=> "admin/flash_sale_list",
			'notif' => "",
			),
		),
	'MARKETING' => array(
		'VOUCHER' => array(
			'text'	=> "VOUCHER",
			'url'	=> "voucher/voucher_list",
			'notif' => "",
			),
		'REWARD' => array(
			'text'	=> "REWARD",
			'url'	=> "reward/reward_list",
			'notif' => "admin_reward",
			),
		'BIDDING' => array(
			'text'	=> "LELANG",
			//'icon'	=> "speaker",
			'url'	=> "bidding_live/bidding_live_list",
			'notif' => "admin_bidding",
			),
		),
	'LAPORAN' => array(
		'REPORT' => array(
			'text'	=> "LAPORAN",
			'icon'	=> "document",
			'url'	=> "admin/report",
			'notif' => "",
			),
		// 'BILLING' => array(
			// 'text'	=> "BILLING",
			// 'url'	=> "billing",
			// 'notif' => "",
			// ),
		),
	);

	

$config['sub_footer'] = array(
	'CYBERKU' => array(
		'text'	=> "Cyberku",
		'sub_menus' => array(
			'TENTANG' => array(
				'text'	=> "Tentang",
				'url'	=> "about",
				),
			'ATURAN' => array(
				'text'	=> "Aturan Penggunaan",
				'url'	=> "about/rules",
				),
			'PRIVACY' => array(
				'text'	=> "Kebijakan Privasi",
				'url'	=> "about/privacy",
				),
			'NEWS' => array(
				'text'	=> "Berita & Pengumuman",
				'url'	=> "about/news",
				),
			),
		),
	'HELP' => array(
		'text'	=> "Bantuan",
		'sub_menus' => array(
			'CONTACT' => array(
				'text'	=> "Hubungi Cyberku",
				'url'	=> "about/contact",
				),
			'COMPLAIN' => array(
				'text'	=> "Komplain",
				'url'	=> "about/complain",
				),
			'TERMS' => array(
				'text'	=> "Syarat & Ketentuan",
				'url'	=> "about/terms",
				),
			),
		),
	'ORDER' => array(
		'text'	=> "Pembelian",
		'sub_menus' => array(
			'PRODUCT' => array(
				'text'	=> "Produk & Servis",
				'url'	=> "about/products",
				),
			'BIDDING' => array(
				'text'	=> "Lelang",
				'url'	=> "about/bidding",
				),
			'HOT_ITEMS' => array(
				'text'	=> "Hot Items",
				'url'	=> "about/hot_items",
				),
			'TRANSACTION' => array(
				'text'	=> "Transaksi",
				'url'	=> "about/transaction",
				),
			),
		),
	);
	
$config['sub_footer_right'] = array(
	'RIGHT' => array(
		'text'	=> "&nbsp;",
		'sub_menus' => array(
			'CONTACT' => array(
				'text'	=> "cyberku.id",
				'icon'	=> "twitter",
				'url'	=> "http://www.twitter.com/cyberku.id",
				),
			'COMPLAIN' => array(
				'text'	=> "cs@cyberia.com",
				'icon'	=> "googleplus",
				'url'	=> "http://plus.google.com/cyberku.id",
				),
			),
		),
	'LEFT' => array(
		'text'	=> "Ikuti Kami",
		'sub_menus' => array(
			'INSTAGRAM' => array(
				'text'	=> "cyberku.id",
				'icon'	=> "instagram",
				'url'	=> "http://www.instagram.com/cyberku.id",
				),
			'FACEBOOK' => array(
				'text'	=> "Cyberku Online Shopping",
				'icon'	=> "facebook",
				'url'	=> "http://www.facebook.com/cyberku.id",
				),
			),
		),
	);
	
$config['notif'] = array(
		''						=> 0,
		'customer_inbox'		=> 0,
		'customer_transaction'	=> 0,
		'customer_cart'			=> 0,
		'tenant_inbox'			=> 0,
		'tenant_transaction'	=> 0,
		'tenant_dispute'		=> 0,
		'admin_payment'			=> 0,
		'admin_order'			=> 0,
		'admin_reward'			=> 0,
		'admin_hot_item'		=> 0,
		'admin_promoted_item'	=> 0,
		'admin_bidding'			=> 0,
	);
?>