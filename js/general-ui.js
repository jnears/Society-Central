jQuery(document).ready(function( $ ){
   $( "#show-grid" ).click(function() {
  $( "html" ).toggleClass( "grid" );
});

//  * Set topics menu li to '.active' if h1 matches the text of the list item
var currentTitle = $('h1.page-title').html();
$('ol.headline-archive li a:contains('+currentTitle+')').addClass('active');


});