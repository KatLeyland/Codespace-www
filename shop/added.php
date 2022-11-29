<?php
# begin session
include ( 'includes/nav.php' ) ;

#
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;

#open db connection
require ( 'connect_db.php' ) ;

#retrieve selected product
$q = "SELECT * FROM products WHERE item_id = $id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

  if ( isset( $_SESSION['cart'][$id] ) )
  {

    $_SESSION['cart'][$id]['quantity']++; 
    echo '<p>Another '.$row["item_name"].' has been added to your cart</p>' ; }

    else
        {
    $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['item_price'] ) ;
      echo '<p>A '.$row["item_name"].' has been added to your cart</p>';  
    }   
    }
      
mysqli_close($link);  
?>