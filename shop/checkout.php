<?php
#begin session

include ( 'includes/nav.php' ) ;

#ensure statement is passed
if ( isset( $_GET['total'] ) && ( $_GET['total'] > 0 ) && (!empty($_SESSION['cart']) ) )
{

#connect to db
require ('connect_db.php');

#insert the user id, order total and order date into the database.

$q = "INSERT INTO orders ( user_id, total, order_date ) VALUES (". $_SESSION['user_id'].",".$_GET['total'].", NOW() ) ";
$r = mysqli_query ($link, $q);

#retrieve and hold the current order number.

$order_id = mysqli_insert_id($link) ;

#the following query will select all products where the item_ id can be found in the session 
$q = "SELECT * FROM products WHERE item_id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
  $r = mysqli_query ($link, $q);

while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
  $query = "INSERT INTO order_contents ( order_id, item_id, quantity, price )
  VALUES ( $order_id, 
  ".$row['item_id'].",".$_SESSION['cart'][$row['item_id']]['quantity'].",".$_SESSION['cart'][$row['item_id']]['price'].")" ;
    $result = mysqli_query($link,$query);
  }

#Close the database connection 
mysqli_close($link);

# if order is submitted or else display a short message explaining there is nothing in the cart.

echo "<p>Thanks for your order. Your Order Number Is #".$order_id."</p>" ;
$_SESSION['cart'] = NULL ;
}
else { echo '<p>There are no items in your cart.</p>' ; }  
?>