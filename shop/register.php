<?PHP
#include navbar
include ( 'includes/nav.html' ) ;

#only executes if form submitted
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
    require ('connect_db.php');
    $errors = array();

    #check for first name error message if empty
    if ( empty( $_POST[ 'first_name' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
   { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] 
    ) ) ; }
#stores error message if fields are empty
if (empty( $_POST[ 'last_name' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] )
) ; }
if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email address.'; }
  else
  { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }
#stores password value or error message
if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }
#stores error message if email is found in table
if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if (mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a class="alert-link" href="login.php">Sign In Now</a>' ;
  }
#stores user data in database
if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date) 
	VALUES ('$fn', '$ln', '$e', '$p', NOW() )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<h1>You are now registered. Please, login.</p>
<a href="login.php">Login</a>'; }
#close db
    mysqli_close($link); 
    exit();
  }
#append alternative statement to display errors and close database
else 
  {
    echo '<h2>The following error(s) occurred:</h2>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo '<p>or please try again.</p></div>';
    mysqli_close( $link );
  }  
}
?>
<div class='row'>
    <div class='col'>
        <div class='card-header'><h1>Register</h1>
        <div class='card-body'>
        <form action="register.php" method="post">
          <div class='row'>
          <div class='form-group'>
          <label for='inputfirstname'>First Name</label>
            <input type="text" name="first_name" placeholder="First Name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"> 
          </div>
          <div class='col'>
          <div class='form-group'>
          <label for='inputlastname'>Last Name</label>
            <input type="text" name="last_name" placeholder="Last Name" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
            </div>
          </div>
</div>
</div>
<div class='row'>
          <div class='form-group'>
          <label for='inputemail'>Email</label>
<input type="email" name="email" placeholder="Email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">		
</div>
</div>
<div class='row'>
          <div class='form-group'>
          <label for='inputpassword1'>Password</label>
<input type="password" name="pass1" placeholder="Create Password" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
</div>
<div class='col'>
          <div class='form-group'>
          <label for='inputpassword2'>Confirm Password</label>
<input type="password" name="pass2" placeholder="Confirm Password" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
</div>
</div>
</div>
<input type="submit" value="Register"></p>
</form>
</div>
