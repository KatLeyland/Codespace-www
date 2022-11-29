<?php #DISPLAY COMPLETE LOGGED OUT PAGE

#ACCESS SESSION
session_start();

#redirect if not logged in
if ( !isset( $_SESSION[ 'user_id'])){require('login_tools.php');load();}

#clear existing variables
$_SESSION = array();

#destroy the session
session_destroy();

#Display footer section
include( 'index.php');
?>