$(document).ready(function() {

    $(document).foundation();
    init();
    
});


function init() {

    // Functions qui peuvent être utiles sur plusieurs pages
    $('body').on('click','.close-button', function(){
      closePopUp($(this));
    });


    if(!/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
      // menu animation on scroll
      $(window).scroll(function(){
        var top=$(window).scrollTop();
        if(top > 50){
        $("nav.menu").addClass('transparent');
        }else{
        $("nav.menu").removeClass('transparent');
        }
      })

      //home
      $('.citation-wrapper').draggable();
      //random position for  $('.citation-wrapper')
      var maxY = $(window).height() - $('.citation-wrapper').height();
      var randomX = Math.random() * ($(window).width() - $('.citation-wrapper').width());
      var randomY = Math.random() * (maxY - 70) + 70;
      $('.citation-wrapper').css({
          'top': randomY,
          'left':randomX
      });
      setTimeout(function(){
        $('.citation-wrapper').fadeIn(400);
      }, 200);


      //definitions

      $('.definition-item').on('click', function(e){
        var url = $(this).attr("data-target");
        var $loadCont = $('.loadPage');
        //console.log(url);
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

      $('.sources-button .sources').on('click', function(){
        if(!$(this).hasClass('active')){
          $(this).addClass('active');
          $('main').removeClass('no-sources');
          $('.sources-button .sans-sources').removeClass('active');
          $('.definition-wrapper .sources').show();
        }
      });
      $('.sources-button .sans-sources').on('click', function(){
        if(!$(this).hasClass('active')){
          $(this).addClass('active');
          $('main').addClass('no-sources');
          $('.sources-button .sources').removeClass('active');
          $('.definition-wrapper .sources').hide();

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

    else{
      mobileFunctions();
    }



  $(".read-more").on('click', function(){
    if($(this).hasClass('active')){
      $('.more-text').hide();
      $(this).find('span').html('⌄');
      $(this).removeClass('active');
    }
    else{
      $('.more-text').show();
      $(this).find('span').html('⌃')
      $(this).addClass('active');
    }
  });

  // définitions sur page texte
  $('a[title="definition"]').on('click', function(e){
    var url = $(this).attr("href");
    var $loadCont = $('.loadPage');
    //console.log(url);
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

  // definitions sur page mon histoire du spectateur
  if($('body').attr('data-template') == "textelong"){
    $('a[title="definition"]').mouseenter(function(e){
      var url = $(this).attr("href");
      $(this).append('<div class="small-def"></div>');
      $('.small-def').css({
        'top': e.pageY - 80,
        'left' : e.offsetX,
      });
      $.ajax({
         url: url,
          success: function(data) {
            $('.small-def').append(data);
            $('.small-def').find(".sources").remove();
            $('.small-def').find("img").remove();
            $('.small-def').find("h1").remove();
            $('.small-def').find(".close-button").remove();
          }
        });

    });
    $('a[title="definition"]').mouseleave(function(e){
      $('.small-def').remove();

    });
  }




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
      if($('main').hasClass('no-sources')){
        $('.definition-wrapper .sources').hide();
      }
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

function mobileFunctions(){
  $('#menu-icon').on('click', function(){
    if($(this).hasClass('active')){
      $('.menu-first').css('display', 'none');
      $(this).removeClass("active");
    }
    else{
      $('.menu-first').css('display', 'block');
      $(this).addClass("active");
    }

  });

  var oldCont;
  $('.definition-item').on('click', function(e){
    var url = $(this).attr("data-target");
    var $loadCont = $(this).find('.inner-definition');
    //e.preventDefault();
    //console.log(e)

    if($loadCont.hasClass('active')){
      $loadCont.removeClass('active');
      $loadCont.html(oldCont);
      $loadCont.css('height', '200px');
    }

    else{
      $('.definition-item .inner-definition.active').html(oldCont);
      $('.definition-item .inner-definition.active').css('height', '200px');
      $('.definition-item .inner-definition.active').removeClass('active');
      oldCont = $loadCont.html();
      $loadCont.addClass('active');
      $loadCont.html('');
      openPage(url, $loadCont);
      $loadCont.css('height', 'auto');
    }
  });

}
