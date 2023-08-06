<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<form action="php/create.php" method="post">
            
		   <h4 class="display-4 text-center">Create</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
		     <label for="item_code">Item Code</label>
		     <input type="text" 
		           class="form-control" 
		           id="item_code" 
		           name="item_code" 
		           placeholder="Enter item code">
		   </div>

		   <div class="form-group">
		     <label for="item_category">Item Category</label>
		     <input type="text" 
		           class="form-control" 
		           id="item_category" 
		           name="item_category" 
		           placeholder="Enter item category">
		   </div>

		   <div class="form-group">
		     <label for="item_subcategory">Item Subcategory</label>
		     <input type="text" 
		           class="form-control" 
		           id="item_subcategory" 
		           name="item_subcategory" 
		           placeholder="Enter item subcategory">
		   </div>

		   <div class="form-group">
		     <label for="item_name">Item Name</label>
		     <input type="text" 
		           class="form-control" 
		           id="item_name" 
		           name="item_name" 
		           placeholder="Enter item name">
		   </div>

		   <div class="form-group">
		     <label for="quantity">Quantity</label>
		     <input type="text" 
		           class="form-control" 
		           id="quantity" 
		           name="quantity" 
		           placeholder="Enter quantity">
		   </div>

		   <div class="form-group">
		     <label for="unit_price">Unit Price</label>
		     <input type="text" 
		           class="form-control" 
		           id="unit_price" 
		           name="unit_price" 
		           placeholder="Enter unit price">
		   </div>

		   <button type="submit" 
		          class="btn btn-primary"
		          name="create">Create</button>
		    <a href="read_item.php" class="link-primary">View</a>
	    </form>
	</div>
</body>
</html>
