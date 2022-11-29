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
	<div class="row">
	<div class="col-sm">
	
    <div class="card" style="width: 18rem;">
    <img src="'. $row['item_img'].'" class="card-img-top" alt="'.$row['item_name'].'">
    <div class="card-body text-center">
        <h5 class="card-title">'.$row['item_name'].'</h5>
        <p class="card-text">'. $row['item_desc'].'</p>
        <p class="card-text"> &pound '. $row['item_price'].'</p>
       <a href="added.php?id='.$row['item_id'].'" class="btn btn-light">Buy Now</a>
    </div>
	</div>
    </div>
    </div>';

	}
	
	mysqli_close( $link) ; 
	}
#display message if no items have been found
else { echo '<p>There are currently no items in the table to display.</p>
	' ; }
include ( 'includes/footer.html' );
