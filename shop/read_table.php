<?PHP 
session_start();

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; };

echo "{$_SESSION[ 'user_id' ]} {$_SESSION['first_name']}, {$_SESSION['last_name']} ";
?>