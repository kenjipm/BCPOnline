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
	'file_name'		=> 'default.jpg',
	'overwrite'		=> true
);

$config['compress_image_item'] = array(
	'image_library'		=> 'gd2',
	// 'create_thumb'		=> TRUE,
	'maintain_ratio'	=> TRUE,
	'width'				=> 200,
	'height'			=> 200,
);

$config['compress_image_variance'] = array(
	'image_library'		=> 'gd2',
	// 'create_thumb'		=> TRUE,
	'maintain_ratio'	=> TRUE,
	'width'				=> 200,
	'height'			=> 200,
);

$config['compress_image_profpic'] = array(
	'image_library'		=> 'gd2',
	// 'create_thumb'		=> TRUE,
	'maintain_ratio'	=> TRUE,
	'width'				=> 200,
	'height'			=> 200,
);

$config['compress_image_idpic'] = array(
	'image_library'		=> 'gd2',
	// 'create_thumb'		=> TRUE,
	'maintain_ratio'	=> TRUE,
	'width'				=> 200,
	'height'			=> 200,
);

?>