<?php if(!defined('_lib')) die("Error");

	error_reporting(0);
	$config_url=$_SERVER["SERVER_NAME"].'';

	$config['database']['servername'] = 'localhost';

	

	$config['database']['username'] = 'root';
	$config['database']['password'] = '';
	$config['database']['database'] = 'xnkhq';


	$config['database']['refix'] = 'table_';
	$_SESSION['ckfinder_baseUrl']=$config_url;
	
	$ip_host = 'smtp.hostinger.com';
	$mail_host = 'noreply@dananggroup.vn';
	$pass_mail = 'Dnseo@321@#!@@@';
	$config['mail_port'] = 587;

	$config['lang']=array(''=>'Tiếng Việt');
	$config['phi']=0;
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');
?>