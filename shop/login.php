<?PHP
include ('includes/nav.html');

#conditional test, displays errors and provides hyperlink to register page
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<p id="err_msg">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a href="register.php">Register</a></p>' ;
}
?>
<!--html submits login details-->
<form action="login_action.php" method="post">
		
<input type="text" name="email" class="form-control" placeholder="*Enter Username/Email"> 
<input type="password" name="pass"  class="form-control" placeholder="*Enter Password">		
<input type="submit" value="Login" >
</form>
