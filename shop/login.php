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
<div class='row'>
    <div class='col-sm'>
        <div class='card-header'><h1>Login</h1>
            <div class='card-body'>
            <form action="login_action.php" method="post">
            <div class='form-group'>
                <label for='inputemail'>Email</label>
                <input type="text" name="email" class="form-control" placeholder="*Enter Username/Email"> 
            </div>
            <div class='form-group'>
            <input type="password" name="pass"  class="form-control" placeholder="*Enter Password">		
            </div>
            <input type="submit" value="Login" >
</form>
</div>
</div>
</div>
</div>


