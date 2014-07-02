jQuery(document).ready(function( $ ){

  $("html").removeClass("no-js");
  

	$( "#nav-search-btn" ).click(function() {
	  $( this ).toggleClass('active');
  	$( "#search" ).toggleClass('show');
  	$( "#s" ).focus();
  	event.preventDefault()
  });

  $( "#embed-link-sidebar" ).click(function() {
    $( this ).toggleClass('active');
    $( "#embed-modal-sidebar" ).toggle();
    $("#embed-text-sidebar").select();
    event.preventDefault()
  }); 

  $( "#embed-link-primary" ).click(function() {
    $( this ).toggleClass('active');
    $( "#embed-modal-primary" ).toggle();
    $("#embed-text-primary").select();
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

  $( "#nav-menu-btn" ).click(function() {
    $( this ).toggleClass('active');
    if ( $("#nav-menu-btn").hasClass("closed")) {
      $( this ).removeClass('closed');
      $( this ).addClass('open');
      $('#inner-wrap').animate({left:'70%'}, 200);
    }
    else if ($ ("#nav-menu-btn").hasClass("open")) {
      $( this ).removeClass('open');
      $( this ).addClass('closed');
      $('#inner-wrap').animate({left:'0'}, 200);
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


  function tog(v){return v?'addClass':'removeClass';} 
    $(document).on('input', '.clearable', function(){
      $(this)[tog(this.value)]('x');
    }).on('mousemove', '.x', function( e ){
      $(this)[tog(this.offsetWidth-18 < e.clientX-this.getBoundingClientRect().left)]('onX');   
    }).on('click', '.onX', function(){
      $(this).removeClass('x onX').val('');
  });


//add class to comment form submit
$('input#submit').addClass('btn'); 
$('.tribe-events-widget-link > a').addClass('btn'); 
$('.tribe-events-sub-nav > a').addClass('btn'); 
$('.tribe-events-widget-link > a').append(' <i class="fa fa-angle-right"></i>'); 


});

