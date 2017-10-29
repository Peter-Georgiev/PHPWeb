<a href="http://localhost/PHPWeb/HTTPandHTML/Exercises/carshop2/index.php?input=sales">Sales</a>
<a href="http://localhost/PHPWeb/HTTPandHTML/Exercises/carshop2/index.php?input=addSale">Add Sale</a>
<a href="http://localhost/PHPWeb/HTTPandHTML/Exercises/carshop2/index.php?input=customers">Customers</a>
<a href="http://localhost/PHPWeb/HTTPandHTML/Exercises/carshop2/index.php?input=cars">Cars</a>
<a href="http://localhost/PHPWeb/HTTPandHTML/Exercises/carshop2/index.php?input=search">Search Car Owner</a>
<a href="http://localhost/PHPWeb/HTTPandHTML/Exercises/carshop2/index.php?input=update_type">Update Car/Owner/Sale</a>


<div>
    <img src="<?php echo $_SERVER['DOCUMENT_ROOT'] . $_SERVER["REQUEST_URI"]; ?>view/error.jpg" alt="" />
</div>
<?php
$dir = $_SERVER['DOCUMENT_ROOT'] . $_SERVER["REQUEST_URI"]."view" . "/" . "error.jpg";
