$(document).ready(function() {
	$('#products').pinterest_grid({
		no_columns: 4,
		padding_x: 10,
		padding_y: 10,
		margin_bottom: 50,
		single_column_breakpoint: 700
	});

	// mostrar el datalle de la venta en el modal
	$(".btn-detalle-venta").on('click', function(e){
		e.preventDefault();
		
		var id_venta = $(this).data('id');
		var path = $(this).data('path');
		var token = $(this).data('token');
		var modal_title = $('.modal-title');
		var modal_body = $('.modal-body');
		var loading = '<p><i class="fa fa-circle fa-spin"></i>Cargando Datos</p>';
		var table = $('#table-detalle-venta tbody');
		var data = {'_token' : token, 'venta_id': id_venta};
		modal_title.html('Detalle del pedido: ' + id_venta);
		table.html(loading);

		$.post(
            path,
            data,
            function(data){
        		console.log(data);
        		table.html("");
        		
                for(var i=0; i<data.length; i++){
                    
                    var fila = "<tr>";
                    fila += "<td><img src='" + data[i].productos.image + "' width='30'></td>";
                    fila += "<td>" + data[i].producto.id + "</td>";
                    fila += "<td>$ " + parseFloat(data[i].price).toFixed(2) + "</td>";
                    fila += "<td>" + parseInt(data[i].quantity) + "</td>";
                    fila += "<td>$ " + (parseFloat(data[i].quantity) * parseFloat(data[i].price)).toFixed(2) + "</td>";
                    fila += "</tr>";
                    
                    table.append(fila);
                }
            },
            'json'
        );
		
	});

	// Update item cart
	$(".btn-update-item").on('click', function(e){
		e.preventDefault();
		
		var id = $(this).data('id');
		var href = $(this).data('href');
		var quantity = $("#product_" + id).val();

		window.location.href = href + "/" + quantity;
	});

});
