<?php
include ( 'includes/nav.php' ) ;

require ( 'connect_db.php' );

#retrieve items from product table
$q = "SELECT * FROM products" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
#display items retrieved
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
	echo '
<img src="'. $row['item_img'].'" alt="'. $row['item_name'].'">
<h5>'. $row['item_name'].'</h5>
<p>'. $row['item_desc'].'</p>
<p>&pound '. $row['item_price'].'</p>
<a href="added.php?id='.$row['item_id'].'" >Buy Now</a>  ';
	}
	
	mysqli_close( $link) ; 
	}
#display message if no items have been found
else { echo '<p>There are currently no items in the table to display.</p>
	' ; }
include ( 'includes/footer.html' );
