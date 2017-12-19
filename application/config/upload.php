<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['upload_identification_pic'] = array(
	'upload_path'	=> 'img/upload/',
	'allowed_types'	=> 'gif|jpg|png',
	'max_size'		=> 250,
	'file_name'		=> 'idpic.jpg',
	'overwrite'		=> true
);

$config['upload_profpic'] = array(
	'upload_path'	=> 'img/upload/',
	'allowed_types'	=> 'gif|jpg|png',
	'max_size'		=> 250,
	'file_name'		=> 'profpic.jpg',
	'overwrite'		=> true
);

?>