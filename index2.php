<html> 
	<head> 
		<title>Welcome!</title>
		<script src="./jquery.js"></script>
		<script type='text/javascript'>
			/*
			*	Event Handlers	
			*/
			$(document).ready(function() { 	
			$("#search_results").slideUp(); 
			    $("#search_button").click(function(e){ 
			        e.preventDefault(); 
			        ajax_search(); 
			    }); 
			    $("#search_term").keyup(function(e){ 
			        e.preventDefault(); 
			        ajax_search(); 
			    }); 

			});

			/*
			*	Search function
			*/
			function ajax_search() { 
				if ($("#search_term").val() == '') {
					$("#search_results").hide();
				}
				else {
					$("#search_results").show(); 
					var search_val=$("#search_term").val(); 
					$.post("./find.php", {search_term : search_val}, function(data){
						if (data.length>0){ 
				    		$("#search_results").html(data); 
						} 
						else {
							$("#search_results").hide();
						}
					}) 
				}
			} 
			</script>
	</head> 

	<body> 
		<h1>Search our Phone Directory</h1> 
		<form id="searchform" method="post"> 
			<div> 
				<label for="search_term">Search name/phone</label> 
				<input type="text" name="search_term" id="search_term" /> 
				<input type="submit" value="search" id="search_button" /> 
			</div> 
		</form> 
		<div id="search_results">

		</div> 
	</body> 
</html>