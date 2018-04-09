<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['top_menu_guest'] = array(
	'top' => array(
		),
	'profile' => array(
		'LOGIN' => array(
			'text'	=> "Login",
			'url'	=> "login",
			),
		'DAFTAR' => array(
			'text'	=> "Daftar",
			'url'	=> "account/signup",
			),
		),
	'strip' => array(
		'DASHBOARD' => array(
			'text'	=> "BERANDA",
			'url'	=> "",
			),
		'PRODUCT' => array(
			'text'	=> "PRODUK",
			'url'	=> "",
			),
		'FAVORITE_ITEM' => array(
			'text'	=> "FAVORIT",
			'url'	=> "customer/favorite_item",
			),
		'REPAIR' => array(
			'text'	=> "SERVIS",
			'url'	=> "item",
			),
		),
	);

$config['top_menu_customer'] = array(
	'top' => array(
		'INBOX' => array(
			'text'	=> "Pesan",
			'url'	=> "message",
			),
		'BILLING' => array(
			'text'	=> "Transaksi",
			'url'	=> "billing",
			),
		'CART' => array(
			'text'	=> "Keranjang",
			'url'	=> "customer/cart",
			),
		),
	'profile' => array(
		'PROFILE' => array(
			'text'	=> "Profil Saya",
			'url'	=> "customer/profile",
			),
		'REWARD' => array(
			'text'	=> "Reward",
			'url'	=> "customer/reward",
			),
		'LOGOUT' => array(
			'text'	=> "Logout",
			'url'	=> "login/logout",
			),
		),
	'strip' => array(
		'DASHBOARD' => array(
			'text'	=> "BERANDA",
			'url'	=> "",
			),
		'PRODUCT' => array(
			'text'	=> "PRODUK",
			'url'	=> "",
			),
		'FAVORITE_ITEM' => array(
			'text'	=> "FAVORIT",
			'url'	=> "customer/favorite_item",
			),
		'REPAIR' => array(
			'text'	=> "SERVIS",
			'url'	=> "item",
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
			'text'	=> "INBOX",
			'url'	=> "message",
			),
		'ORDER' => array(
			'text'	=> "Input OTP",
			'url'	=> "order/order_list",
			),
		),
	'profile' => array(
		'PROFILE' => array(
			'text'	=> "Profil Saya",
			'url'	=> "",
			),
		'LOGOUT' => array(
			'text'	=> "Logout",
			'url'	=> "login/logout",
			),
		),
	'strip' => array(
		'DISPUTE' => array(
			'text'	=> "DISPUTE",
			'url'	=> "dispute",
			),
		),
	);

$config['top_menu_deliverer'] = array(
	'top' => array(
		),
	'profile' => array(
		'PROFILE' => array(
			'text'	=> "Profil Saya",
			'url'	=> "",
			),
		'LOGOUT' => array(
			'text'	=> "Logout",
			'url'	=> "login/logout",
			),
		),
	'strip' => array(
		),
	);

$config['top_menu_admin'] = array(
	'top' => array(
		'PAY_DEBT' => array(
			'text'	=> "Tenant Payment",
			'url'	=> "admin/tenant_to_pay_list",
			),
		'BIDDING' => array(
			'text'	=> "Bidding",
			'url'	=> "bidding_live/bidding_live_list",
			),
		'ACCOUNT' => array(
			'text'	=> "Account",
			'url'	=> "account/account_list",
			),
		),
	'profile' => array(
		'PROFILE' => array(
			'text'	=> "Profil Saya",
			'url'	=> "",
			),
		'LOGOUT' => array(
			'text'	=> "Logout",
			'url'	=> "login/logout",
			),
		),
	'strip' => array(
		'VOUCHER' => array(
			'text'	=> "VOUCHER",
			'url'	=> "voucher/voucher_list",
			),
		'REWARD' => array(
			'text'	=> "REWARD",
			'url'	=> "reward/reward_list",
			),
		'HOT_ITEM' => array(
			'text'	=> "HOT ITEM",
			'url'	=> "admin/hot_item_list",
			),
		'SEO_ITEM' => array(
			'text'	=> "SEO ITEM",
			'url'	=> "admin/seo_item_list",
			),
		'ORDER' => array(
			'text'	=> "KIRIM BARANG",
			'url'	=> "order/order_list",
			),
		'BILLING' => array(
			'text'	=> "BILLING",
			'url'	=> "billing",
			),
		'DISPUTE' => array(
			'text'	=> "DISPUTE",
			'url'	=> "dispute",
			),
		),
	);

	

$config['sub_footer'] = array(
	'CYBERIA' => array(
		'text'	=> "Cyberia",
		'sub_menus' => array(
			'TENTANG' => array(
				'text'	=> "Tentang",
				'url'	=> "",
				),
			'ATURAN' => array(
				'text'	=> "Aturan Penggunaan",
				'url'	=> "",
				),
			'PRIVACY' => array(
				'text'	=> "Kebijakan Privasi",
				'url'	=> "",
				),
			'NEWS' => array(
				'text'	=> "Berita & Pengumuman",
				'url'	=> "",
				),
			),
		),
	'HELP' => array(
		'text'	=> "Bantuan",
		'sub_menus' => array(
			'CONTACT' => array(
				'text'	=> "Hubungi Cyberia",
				'url'	=> "",
				),
			'COMPLAIN' => array(
				'text'	=> "Komplain",
				'url'	=> "",
				),
			'TERMS' => array(
				'text'	=> "Syarat & Ketentuan",
				'url'	=> "",
				),
			),
		),
	'ORDER' => array(
		'text'	=> "Pembelian",
		'sub_menus' => array(
			'PRODUCT' => array(
				'text'	=> "Produk & Servis",
				'url'	=> "",
				),
			'BIDDING' => array(
				'text'	=> "Bidding",
				'url'	=> "",
				),
			'HOT_ITEMS' => array(
				'text'	=> "Hot Items",
				'url'	=> "",
				),
			'TRANSACTION' => array(
				'text'	=> "Transaksi",
				'url'	=> "",
				),
			),
		),
	);
	
?>