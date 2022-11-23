<?php
session_start() ; 
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
echo " {$_SESSION['first_name']} {$_SESSION['last_name']} ";
?>
