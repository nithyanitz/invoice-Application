<?php
session_start();
?>


<!DOCTYPE html>
<head>
	<title>Products</title>
	<link rel = "stylesheet" href = "css/form.css" />
</head>
<body>
	<!--<div class = "container">-->
		<nav class = "navbar">
			<?php
			if(isset($_SESSION["role"])){
	if($_SESSION["role"] == "admin"){
		?>
			<a href = "#addUsers">Add Users</a>
			<?php
		}
	}?>
			<a href = "#addProducts">Add Products</a>
			<a href = "#viewProducts">View Products</a>
			<a href = "#deleteProducts">Delete Products</a>
			<a href = "#updateProducts">Update Products</a>
			<a href = "logOut.php">Log Out</a>
		</nav>
<div class = "form-container">
	<form action = "../Controller/addUser.php" method = "post" name = "addUser" id = "addUsers" class = "form hide">
		<div>
			<h2 class = "header">Add User</h2>
			<input type = "text" name = "userName" class = "input-box" placeholder = "Enter User Name" />
			<input type = "text" name = "password" class = "input-box" placeholder = "Enter user Password" />
			<input type = "text" name = "role" class = "input-box" placeholder="Enter role" />
			<br />
			<input type = "submit" name = "addUser" class = "submit-btn" value = "Add User" />
			<br />
		</div>
	</form>
</div>

<div class = "form-container">
	<form action = "../Controller/insert.php" method = "post" name = "insertProduct" id = "addProducts" class = "form-hide">
		<div>
			<h2 class = "header">Insert Products</h2>
			<input type = "text" name = "productName" class = "input-box" placeholder = "enter product name" required />
			<input type = "number" name = "quantity" class = "input-box" placeholder = "enter product quantity" required/>
			<input type = "number" name = "price" class = "input-box" placeholder = "enter product price" required/>
			<input type = "text" name = "units" class = "input-box" placeholder = "enter product units " required/>
			<br />
			<input type = "submit" value = "Insert Product" class = "submit-btn" name = "insert" />
			<br />
		</div>
	</form>
</div>

<div class = "form-container">
	<form action = "../Controller/view.php" method = "post" name = "viewProduct" id = "viewProducts" class = "form-hide">
		<div>
			<h2 class = "header">View Products</h2>
			<input type = "number" name = "productId" class = "input-box" placeholder = "enter product id" />
			<br />
			<input type = "submit" value = "View Product"  class = "submit-btn" name = "viewProduct" />
			<input type = "submit" value = "View All Products" class = "submit-btn" name = "viewAllProducts" />
			<br />
		</div>
	</form>
</div>

<div class = "form-container">
	<form action = "../Controller/delete.php" method = "post" name = "deleteProduct" id = "deleteProducts" class = "form-hide">
		<div>
			<h2 class = "header">Delete Products</h2>
			<input type = "number" name = "productId" class = "input-box" placeholder = "enter product id" required />
			<br />
			<input type = "submit" value = "Delete Product" class = "submit-btn" name = "delete" />
			<br />
		</div>
	</form>
</div>

<div class = "form-container">
	<form action = "../Controller/update.php" method = "post" name = "updateProduct" id = "updateProducts" class = "form-hide" >
		<div>
			<h2 class = "header">Update Products</h2>
			<input type = "number" name = "productId" class = "input-box"  placeholder = "Product Id to be updated" required />
			<input type = "number" name = "quantity" class = "input-box" placeholder = "Set Quantity" />
			<input type = "number" name = "price"  class = "input-box" placeholder = "Set Price" />
			<br />
			<input type = "submit" value = " Update Product" class = "submit-btn" name = "update" />
			<br />
		</div>
	</form>
</div>
<!--</div>-->
</body>
</html>

