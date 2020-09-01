<?php
	/*
	* config
	* Desenvolvida durante aulas do curso técnico em informática
	* @author Daniela daniela-rseolino@educar.rs.gov.br
	* @version 0.1
	* @ access public
	* @copyright GPL 2020, Info63
	* @since 27/07/2020
	*
	*/
	session_start();
	$ip = $_SERVER["REMOTE_ADDR"];
	$i= substr($ip,0, 3);
	
	if($i == '::1'){
		define("HOME_URI", "http://localhost/poo/");
		define("HOME_DIR", "C:\Program Files\VertrigoServ\www\poo\\");
	}else{
		define("HOME_URI", "http://daniseolino.ddns.net/poo/");
		define("HOME_DIR", "C:\Program Files\VertrigoServ\www\poo\\");
	}

	define('dbname' , 'sistema');
	define('host' , '192.168.1.57');
	define('dbuser' , 'sistema');
	define('dbpass' , 'cimol');
	define('DEFAULT_PASS','info123');


?>