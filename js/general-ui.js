jQuery(document).ready(function( $ ){
	$( "#show-grid" ).click(function() {
	$( "html" ).toggleClass( "grid" );
});

	$( "#site-navigation .search-toggle" ).click(function() {
	$( this ).toggleClass('active');
  	$( "#search" ).toggleClass('show');
  	$( "#s" ).focus();
  	event.preventDefault()
});

  	$( "#site-navigation .menu-toggle" ).click(function() {
	$( this ).toggleClass('active');
  	$( "header[role=banner] nav.categories ol" ).slideToggle('fast');
  	event.preventDefault()
});

  	$( "#clear-search" ).click(function() {
  	$( "#s" ).val("").focus();
  	$("#clear-search").css("display", "none");
  	event.preventDefault()
});


  	$("#s").keyup(function(){
   if($('#s').val() != ""){
       $("#clear-search").css("display", "inline-block");
   }
   else{
       $("#clear-search").css("display", "none");
   }
});


//  * Set topics menu li to '.active' if h1 matches the text of the list item
	var currentTitle = $('h1.page-title').html();
	$('ol.headline-archive li a:contains('+currentTitle+')').addClass('active');



});