<?php
#check if login form has been submitted
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
    require ( 'connect_db.php' ) ;
    require ( 'login_tools.php' ) ;
    #ensure login succeded and retrieve the user details
    list ( $check, $data ) = validate ( $link, $_POST[ 'email' ], $_POST[ 'pass' ] ) ;
    #set user details as session data and load home page or error
    if ( $check )  
    {
      session_start();
      $_SESSION[ 'user_id' ] = $data[ 'user_id' ] ;
      $_SESSION[ 'first_name' ] = $data[ 'first_name' ] ;
      $_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;
      load ( 'home.php' ) ;
    }
    # Or on failure set errors.
    else { $errors = $data; }
   #close connection to database and continue to display login page if login fails
   mysqli_close( $link ) ; 
}
include ( 'login.php' ) ;
?>