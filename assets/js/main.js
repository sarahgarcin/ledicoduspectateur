$(document).ready(function() {

    $(document).foundation();
    init();
    
});


function init() {

    // api dodoc 
    // affiche les publications dans le site
    var rechargerLaPage = $('main').attr('data-recharge');
    if(rechargerLaPage !== undefined && rechargerLaPage !== ''){
      console.log('test', rechargerLaPage);
      setInterval(function(){
        location.reload();
      },rechargerLaPage * 1000);
    }
    
    var nomPubli = $('main').attr('data-publi');

    if(nomPubli !== undefined){
      fetch('https://dodoc.ledicoduspectateur.net/api/publications/'+nomPubli, {
      method: 'GET',
        headers: {
          "session-password": btoa('dico2021')
        }
      }).then(response => {
        if (!response.ok) throw new Error(response.status);
        return response.json();
      }).then(data => {
        var medias = data[nomPubli].medias;
        for(var page in data[nomPubli].pages){

          $('.publi-content').append('<div id="'+data[nomPubli].pages[page].id+'"></div>');
        }
        for (var media in medias) {
          console.log(medias[media]);
          var mediaName = medias[media].slugMediaName;
          var folderName = medias[media].slugProjectName;
          var mediaType; 

          if(medias[media]._source_media_meta !== undefined){
            mediaType = medias[media]._source_media_meta.type;
          }
          else if(medias[media].type !== undefined){
            mediaType = medias[media].type;
          }
          else{
            mediaType = 'none';
          }

          // console.log("mediaType = ", mediaType);

          var page_id = medias[media].page_id;
          if(mediaType == 'text'){
            var mediaContent = medias[media].content;
            $('#'+page_id).append('<div class="publi-element" style="width:'+medias[media].width+'mm; height:'+medias[media].height+'mm; transform:translate('+medias[media].x+'mm, '+medias[media].y+'mm)">'+mediaContent+'</div>');
          }
          else if(mediaType == "rectangle"){
            var rect = medias[media];
            var height = rect.height;
            var width = rect.width;
            var x = rect.x;
            var y = rect.y;
            var opacity = rect.opacity;
            var color = rect.fill_color;
            var strokeColor = rect.stroke_color;
            var strokeW = rect.stroke_width;
            var blend = rect.blend_mode;
            $('#'+page_id).append('<div class="publi-element" style="width:'+width+'mm; height:'+height+'mm; transform:translate('+x+'mm, '+y+'mm); opacity:0.3; background:#0000D2; border: '+strokeW*2+'px solid '+strokeColor+'; mix-blend-mode:color;"></div>');
          }
          else if(mediaType == 'image'){
            var image; 
            if(medias[media]._source_media_meta !== undefined){
              image = medias[media]._source_media_meta;
            }
            else{
              image = medias[media];
            }
            
            var mediaImageName = image.thumbs[2].path;
            var mediaImageSrc = 'https://dodoc.ledicoduspectateur.net/'+mediaImageName;
            // console.log('image', mediaImageSrc);
            $('#'+page_id).append('<div class="publi-element" style="width:'+medias[media].width+'mm; height:'+medias[media].height+'mm; transform:translate('+medias[media].x+'mm, '+medias[media].y+'mm)"><figure><img src="'+mediaImageSrc+'"></figure></div>');
          }
          else if(mediaType == "video"){
            var video;
            if(medias[media]._source_media_meta !== undefined){
              video = medias[media]._source_media_meta;
            }
            else{
              video = medias[media];
            }

            var mediaVideoPoster = 'https://dodoc.ledicoduspectateur.net/'+ video.thumbs[0].thumbsData[2].path;
            var mediaVideoSrc = 'https://dodoc.ledicoduspectateur.net/'+medias[media].slugProjectName+ '/'+ video.media_filename;
            // console.log('vidéo', mediaVideoSrc);
            $('#'+page_id).append('<div class="publi-element" style="width:'+medias[media].width+'mm; height:'+medias[media].height+'mm; transform:translate('+medias[media].x+'mm, '+medias[media].y+'mm)"><video poster="'+mediaVideoPoster+'" src="'+mediaVideoSrc+'" preload="none" controls></video></div>');
          }
          else if(mediaType == 'audio'){
            var audio;
            if(medias[media]._source_media_meta !== undefined){
              audio = medias[media]._source_media_meta;
            }
            else{
              audio = medias[media];
            }

            var mediaAudioSrc = 'https://dodoc.ledicoduspectateur.net/'+folderName+ '/'+ audio.media_filename;
            $('#'+page_id).append('<div class="publi-element" style="width:'+medias[media].width+'mm; height:'+medias[media].height+'mm; transform:translate('+medias[media].x+'mm, '+medias[media].y+'mm)"><audio src="'+mediaAudioSrc+'" controls></video></div>');

          }
        }

      });
    }

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
      });

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
      $(this).find('span').html('⌃');
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

  // var colorCouv = $('.page.cover').attr('data-color');
  // $('.page.cover').css({
  //   "background": colorCouv
  // });
    
  // print
  // supprimer le texte Lire 
  if($('body').attr("data-template") == "print"){
    $('a').each(function(){
      console.log($(this).html());
      if($(this).html() == "Lire"){
        console.log($(this));
        $(this).remove();
      }
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
};

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
