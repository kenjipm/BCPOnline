<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['upload_identification_pic'] = array(
	'upload_path'	=> 'img/upload/',
	'allowed_types'	=> 'gif|jpg|png|jpeg|jpe|jig|jfif|jfi',
	'max_size'		=> 1024,
	'file_name'		=> 'idpic.jpg',
	'overwrite'		=> true
);

$config['upload_profpic'] = array(
	'upload_path'	=> 'img/upload/',
	'allowed_types'	=> 'gif|jpg|png|jpeg|jpe|jig|jfif|jfi',
	'max_size'		=> 1024,
	'file_name'		=> 'profpic.jpg',
	'overwrite'		=> true
);

$config['upload_image'] = array(
	'upload_path'	=> 'img/upload/',
	'allowed_types'	=> 'gif|jpg|png|jpeg|jpe|jig|jfif|jfi',
	'max_size'		=> 1024,
	'file_name'		=> 'image.jpg',
	'overwrite'		=> true
);

?>