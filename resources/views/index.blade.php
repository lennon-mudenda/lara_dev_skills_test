<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row"></div>
		<div class="row">
			<div class="card col-8 ml-auto mr-auto" style="margin-top: 20px;">
				<h3 class="text-center">Add Product</h3>
				<form id="add_product_form">
					@csrf
					<div class="form-group">
						<label>Product Name</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>Quantity In Stock</label>
						<input type="number" name="qty_in_stock" class="form-control" min=0>
					</div>
					<div class="form-group">
						<label>Price Per Item</label>
						<input type="number" name="price" class="form-control" min=0>
					</div>
					<div class="form-group row">						
						<input type="button" name="Add Product" class="btn btn-primary ml-auto mr-auto col-6" id="add_p" value="Submit">
					</div>
				</form>
			</div>
		</div>
		<div class="row" style="margin-top: 20px;">
			<div class="card col-12 ml-auto mr-auto">
				<h3 class="text-center">Add Product</h3>
				
					<table class="table table-striped">
					  <thead>
					    <tr>
					      <th scope="col">Product Name</th>
					      <th scope="col">Quantity In Stock</th>
					      <th scope="col">Price Per Item</th>
					      <th scope="col">Date Submitted</th>
					      <th scope="col">Total Value Number</th>
					    </tr>
					  </thead>
					  <tbody id="tb">
					  	@foreach($products as $product)
					    <tr>
					      <th scope="row">{{ $product->name }}</th>
					      <td>{{ $product->quantity_in_stock }}</td>
					      <td>{{ $product->price_per_item }}</td>
					      <td>{{ $product->created_at }}</td>
					      <td>{{ $product->price_per_item * $product->quantity_in_stock }}</td>
					    </tr> 
					    @endforeach  
					    <tr>
					      <th scope="row" >Total</th>
					      <td></td>
					      <td></td>
					      <td></td>
					      <td id="total">{{ $total }}</td>
					    </tr> 
					  </tbody>
					</table>
				
			</div>
		</div>
	</div>

	
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/js/inventory.js"></script>
</body>
</html>