jQuery(document).ready(function( $ ){

  $("html").removeClass("no-js");

  

  
	$( "#show-grid" ).click(function() {
	$( "html" ).toggleClass( "grid" );


});

  

	$( "#nav-search-btn" ).click(function() {
	  $( this ).toggleClass('active');
  	$( "#search" ).toggleClass('show');
  	$( "#s" ).focus();
  	event.preventDefault()
  });

  $( "#embed-link" ).click(function() {
    $( this ).toggleClass('active');
    $( "#embed-modal" ).toggleClass('show');
    $("#embed-text").select();
    event.preventDefault()
  });



//   	$( "#site-navigation .menu-toggle" ).click(function() {
// 	$( this ).toggleClass('active');
//   	$( "header[role=banner] nav.categories ol" ).slideToggle('fast');
//   	event.preventDefault()
// });

//   	$( "#clear-search" ).click(function() {
//   	$( "#s" ).val("").focus();
//   	$("#clear-search").css("display", "none");
//   	event.preventDefault()
// });


  	$("#s").keyup(function(){
   if($('#s').val() != ""){
       $("#clear-search").css("display", "inline-block");
   }
   else{
       $("#clear-search").css("display", "none");
   }
});

// $( "#site-navigation .menu-toggle" ).click(function() {
//   $( this ).toggleClass('active');
//    $('#inner-wrap').animate({left:'70%'}, 500);
//     event.preventDefault()
// });

$( "#nav-menu-btn" ).click(function() {
  $( this ).toggleClass('active');
  if ( $("#nav-menu-btn").hasClass("closed")) {

  $( this ).removeClass('closed');
    $( this ).addClass('open');
   $('#inner-wrap').animate({left:'70%'}, 500);
  
    }
else if ($ ("#nav-menu-btn").hasClass("open")) {
    $( this ).removeClass('open');
    $( this ).addClass('closed');
   $('#inner-wrap').animate({left:'0'}, 500);
   
    }
 event.preventDefault()
    
});

$(window).on('resize', function(){
  if ( $("#nav-menu-btn").hasClass("open") && $(window).width()> 768) {
    $( "#nav-menu-btn" ).removeClass('open');
    $( "#nav-menu-btn" ).addClass('closed');
    $('#inner-wrap').animate({left:'0'}, 500);
  }
});


//  * Set topics menu li to '.active' if h1 matches the text of the list item
	var currentTitle = $('h1.page-title').html();
	$('ol.headline-archive li a:contains('+currentTitle+')').addClass('active');
  $('#page > nav.categories ol li a:contains('+currentTitle+')').addClass('active');



//put x in search box

function tog(v){return v?'addClass':'removeClass';} 
  
  $(document).on('input', '.clearable', function(){
    $(this)[tog(this.value)]('x');
  }).on('mousemove', '.x', function( e ){
    $(this)[tog(this.offsetWidth-18 < e.clientX-this.getBoundingClientRect().left)]('onX');   
  }).on('click', '.onX', function(){
    $(this).removeClass('x onX').val('');
  });


//baseline
$('img').baseline(27);
});