jQuery(document).ready(function( $ ) {
	
	$(".main-navigation .search-submit").click(function(){
		$(".main-navigation .search-field").toggle("slide").focus();
	})
});