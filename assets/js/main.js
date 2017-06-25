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
      $('.definition').on('click', function(e){
        var url = $(this).attr("data-target");
        var $loadCont = $(this).next('.loadPage');
        console.log(url);
        $loadCont.center();
        e.preventDefault();
        if($loadCont.hasClass('active')){
          $loadCont.removeClass('active');
          $loadCont.html('');
          $loadCont.hide();
        }
        else{
          $('.loadPage').removeClass('active');
          $('.loadPage').html('');
          openPage(url, $loadCont);
          $loadCont.show();
        }
      });
      $('.inoff-button .in').on('click', function(){
        if(!$(this).hasClass('active')){
          $(this).addClass('active');
          $('.inoff-button .off').removeClass('active');
          $(".definition[data-inoff='in']").show();
          $(".definition[data-inoff='off']").hide();
        }
      });
      $('.inoff-button .off').on('click', function(){
        if(!$(this).hasClass('active')){
          $(this).addClass('active');
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
    //}



}

function closePopUp($this){
  $this.parents('.wrapper').hide();
}

function openPage(url, target){
  $.ajax({
   url: url,
    success: function(data) {
       target.append(data).addClass('active');
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
