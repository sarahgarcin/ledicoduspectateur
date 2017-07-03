$(document).ready(function() {

    $(document).foundation();
    init();

});


function init() {

    // Functions qui peuvent être utiles sur plusieurs pages
    $('body').on('click','.close-button', function(){
      console.log('hello');
      closePopUp($(this));
    });

    //home
    $('.citation-wrapper').draggable();
    //random position for  $('.citation-wrapper')
    var randomX = Math.random() * ($(window).width() - $('.citation-wrapper').width());
    var randomY = Math.random() * ($(window).height() -$('.citation-wrapper').height());
    $('.citation-wrapper').css({
        'top': randomY,
        'left':randomX
    });

  
    //definitions
    //if($('body').attr('data-template') == "definitions"){
      $('.definition-item').on('click', function(e){
        var url = $(this).attr("data-target");
        var $loadCont = $('.loadPage');
        console.log(url);
        $loadCont.center();
        e.preventDefault();
        if($loadCont.hasClass('active')){
          //$loadCont.removeClass('active');
          $loadCont.html('');
          openPage(url, $loadCont);
          //$loadCont.hide();
        }
        else{
          $loadCont.removeClass('active');
          $loadCont.html('');
          openPage(url, $loadCont);
        }
      });
      $('.inoff-button .in').on('click', function(){
        if(!$(this).hasClass('active')){
          $(this).addClass('active');
          $('main').addClass('in');
          $('main').removeClass('off');
          $('.inoff-button .off').removeClass('active');
          $(".definition[data-inoff='in']").show();
          $(".definition[data-inoff='off']").hide();
        }
      });
      $('.inoff-button .off').on('click', function(){
        if(!$(this).hasClass('active')){
          $(this).addClass('active');
          $('main').addClass('off');
          $('main').removeClass('in');
          $('.inoff-button .in').removeClass('active');
          $(".definition[data-inoff='off']").show();
          $(".definition[data-inoff='in']").hide();
        }
      });
      $('.abc-button').on('click', function(){
        if(!$(this).hasClass('active')){
          $(this).addClass('active');
          $('.abc ul').show();
        }
        else{
          $(this).removeClass('active');
          $('.abc ul').hide();
        }
      });
      // click outside of the pop-up to close it
      // $(window).on('click', function(e){
      //   var $loadCont = $(".loadPage");
      //   if (!$loadCont.is(e.target) && $loadCont.has(e.target).length === 0 && $loadCont.hasClass('active')){
      //     console.log('click outsize');
      //     $loadCont.removeClass('active');
      //     $loadCont.hide();
      //   }
      // })



}

function closePopUp($this){
  $this.parents('.wrapper').hide();
  $('.loadPage').removeClass('active');
}

function openPage(url, target){
  $.ajax({
   url: url,
    success: function(data) {
      target.append(data).addClass('active');
      target.show();
    }
  });
}

jQuery.fn.center = function () {
  this.css("position","absolute");
  this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 10) + 
                                              $(window).scrollTop()) + "px");
  this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 5) + 
                                              $(window).scrollLeft()) + "px");
  return this;
}
