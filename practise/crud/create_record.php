<?PHP 
include('navbar.php');

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
    # Connect to the database.
    require ('connect_db.php');
    # Initialize an error array.
    $errors = array();
    # Check for a ID.
    if ( empty( $_POST[ 'id' ] ) )
    { $errors[] = 'Enter ID Number' ; }
    else
    { $id = mysqli_real_escape_string( $link, trim( $_POST[ 'id' ] ) ) ; }
    
 # Check for a first name.
 if ( empty( $_POST[ 'first_name' ] ) )
 { $errors[] = 'Enter your first name.' ; }
 else
 { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }
 
 # Check for a last name.
 if (empty( $_POST[ 'last_name' ] ) )
 { $errors[] = 'Enter your last name.' ; }
 else
 { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }

 # Check if id registered.
 if ( empty( $errors ) )
 {
 $q = "SELECT id FROM my_table WHERE id='$id'" ;
 $r = @mysqli_query ( $link, $q ) ;
 if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'User already registered.' ;
 }

 # On success data into my_table on database.
 if ( empty( $errors ) ) 
 {
 $q = "INSERT INTO my_table (id, first_name, last_name) 
VALUES ('$id','$fn', '$ln' )";
 $r = @mysqli_query ( $link, $q ) ;

 if ($r)
 {echo '<p>You have added data successfully</p>';
# can add <a href links
}
# Close database connection.
mysqli_close($link); 

exit();
}
    
# Or report errors.
 else 
 {
 echo '<p>The following error(s) occurred:</p>' ;
 foreach ( $errors as $msg )
 { echo " - $msg<br>" ; }
 echo '<p>or please try again.</p></div>';
 # Close database connection.
 mysqli_close( $link );
 } 
} 
?>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
</head>
<body>
    
<form action="create_record.php" method="post">
<div class="form-group">
 <label for="inputid">ID</label>
<input type="text" 
name="id" 
class="form-control" 
value="<?php if (isset($_POST['id'])) echo $_POST['id']; ?> "> 
</div>
<div class="form-group">
<label for="inputfirst_name">First Name</label>
<input type="text" 
name="first_name" 
class="form-control" 
value="<?php if (isset($_POST['first_name'])) 
echo $_POST['first_name']; ?> "> 
</div>
<div class="form-group">
<label for="inputlast_name">Last Name</label>
<input type="text" 
name="last_name" 
class="form-control" 
value="<?php if (isset($_POST['last_name'])) 
echo $_POST['last_name']; ?>">
</div>
<input type="submit" 
class="btn btn-light btn-lg btn-block" 
value="Add Record">
</p>
</form>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>