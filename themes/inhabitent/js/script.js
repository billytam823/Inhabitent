jQuery(document).ready(function( $ ) {
	
	$(".search-submit").click(function(e){
		e.preventDefault();
		$(".search-field").toggle("slide").focus();
	})
	
});