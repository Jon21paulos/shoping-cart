$(document).ready(function(){
	DisplayData();
	
	$('#search').on('click', function(){
		if($('#search_data').val() == ""){
			alert("Please enter something first!");
		}else{
			var search = $('#search_data').val();
			var loader = $('<tr ><td colspan = "5"><center>Searching....</center></td></tr>');
			$('#data').empty();
			loader.appendTo('#data');
			
			setTimeout(function(){
				loader.remove();
				$.ajax({
					url: 'search.php',
					type: 'POST',
					data: {
						search: search
					},
					success: function(data){
						$('#data').html(data);
					}
				});
				
			}, 3000);	
		}
	});
	
	$('#refresh').on('click', function(){
		DisplayData();
	});
	
	
	function DisplayData(){
		$.ajax({
			url: 'data.php',
			type: 'POST',
			data: {
				res: 1
			},
			success: function(data){
				$('#data').html(data);
			}
		});
	}
});