<?php
	
	$hostname = 'jonwebappserver.database.windows.net';
	$username = 'jon';
	$password = 'Imantaufikrachman25';
	$database = 'jonwebapp';

	$connectionInfo = array( "UID"=>$username,                            
                         "PWD"=>$password,                            
                         "Database"=>$database); 

	$conn = sqlsrv_connect($hostname, $connectionInfo);

?>