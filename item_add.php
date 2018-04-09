<?php 


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Admin panel</title>
 </head>
 <body>
 <form action="upload.php" method="post" enctype="multipart/form-data">
 	<input type="text" name="product_name">
 	<input type="text" name="price">
 	<input type="text" name="quantity">
 	<input type="file" name="fileToUpload" id="fileToUpload">
 </form>
 </body>
 </html>