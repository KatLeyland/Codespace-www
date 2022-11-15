<?php 

# Connect  on 'localhost' for user to database.

$link = mysqli_connect("localhost", "root", "root", "crud"); 

if (!$link) { 

# Otherwise fail gracefully and explain the error. 

die('Could not connect to MySQL: '.mysqli_error($crud)); 

} 

echo 'Connection OK';  

?> 