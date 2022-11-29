<?PHP 
session_start();

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; };
while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
{
echo'<tr>
<td>'.$row['id'].'</td>
<td>'.$row['first_name'].'</td>
<td>'.$row['last_name'].'</td> '; }


?>