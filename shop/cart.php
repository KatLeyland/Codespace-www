<?php
include ( 'includes/nav.php' ) ;

if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
    foreach ( $_POST['qty'] as $item_id => $item_qty )
  {
    $id = (int) $item_id;
    $qty = (int) $item_qty;
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }
}
$total = 0;

if (!empty($_SESSION['cart']))
{
    require ('connect_db.php');
    $q = "SELECT * FROM products WHERE item_id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
  $r = mysqli_query ($link, $q);

    '<form action="cart.php" method="post">
    <table class="table">
     <thead>
        <tr><th>Items in your cart</th></tr>
     </thead>
    <tbody><tr>';
while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    $subtotal=$_SESSION['cart'][$row['item_id']]['quantity'] * $_SESSION['cart'][$row['item_id']]['price'];
    $total += $subtotal;
    
echo "<tr>  
<td> {$row['item_name']} </td> 
<td> <input type=\"text\" size=\"3\" name=\"qty[{$row['item_id']}]\" value=\"{$_SESSION['cart'][$row['item_id']]['quantity']}\"> </td>
<td>@ {$row['item_price']} = </td> 
<td> &pound ".number_format ($subtotal, 2)."</td></tr>";
  }

  mysqli_close($link);
  echo ' <tr>
  <td>Total = &pound '.number_format($total,2).'</td>
  </tr>
  <tr>
  <td> 
<input type="submit" name="submit" value="Update My Cart"> 
  </td>
  </tr>
  <td><a href="checkout.php?total='.$total.' ">Checkout Now</a></td>
  </table>
  </form>';
}
else
{ echo '<p>Your cart is currently empty.</p>' ; }

  ?>