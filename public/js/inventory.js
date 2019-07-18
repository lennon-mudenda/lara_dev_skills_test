$('#add_p').click(() => {

	var name = $('input[name="name"]').val();
	var qty_in_stk = $('input[name="qty_in_stock"]').val();
	var price = $('input[name="price"]').val();
	var token = $('input[name="_token"]').val();
	var data = {
			name: name,
			quantity_in_stock: qty_in_stk,
			price_per_item: price,
			_token: token
	}
	//console.log(data);
	$.post(
		'/add_product',
		data,
		(resp,status) => {
			if(status == "success")
			{
				var product = resp.product;
				//console.log(product);
				var row = document.createElement('tr');
				row.innerHTML = '<th scope="row">' + product.name + 
								'</th><td>' + product.quantity_in_stock +
								'</td><td> ' + product.price_per_item +
								' </td><td>' + product.created_at +  
								'</td><td>' + product.price_per_item * product.quantity_in_stock + '</td>';
				document.getElementById('tb').insertBefore(row,document.getElementById('tb').childNodes[document.getElementById('tb').childNodes.length-2]);
				document.getElementById('total').innerText = parseInt(document.getElementById('total').innerText) + product.price_per_item * product.quantity_in_stock;
			}
		}
	);
});