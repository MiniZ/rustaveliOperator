<?php

	$_dbhost = "localhost";
	$_dbuser = "rustavel_opera";
	$_dbpass = "rame2010";
	$_db = "rustavel_opers";

	$sqlLink  = mysql_connect($_dbhost,$_dbuser,$_dbpass) or die(mysql_error());
	mysql_select_db($_db);		
	
	mysql_query("SET NAMES 'utf-8'",$sqlLink);
	mysql_query('SET CHARACTER SET utf-8',$sqlLink);
	 	
?>