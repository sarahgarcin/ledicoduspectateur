$(document).ready(function() {

    $(document).foundation();
    init();

});


function init() {

    // Functions qui peuvent être utiles sur plusieurs pages
    $('.close-button').on('click',function(){
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
    $('.definition').on('click', function(e){
        var url = $(this).attr("data-target");
        var $loadCont = $(this).next('.loadPage');
        console.log(url);
        e.preventDefault();
        if($loadCont.hasClass('active')){
            $loadCont.removeClass('active');
            $loadCont.html('');
        }
        else{
            $('.loadPage').removeClass('active');
            $('.loadPage').html('');
            openPage(url, $loadCont);
        }
    });



}

function closePopUp($this){
    $this.parent('.wrapper').hide();
}

function openPage(url, target){
  $.ajax({
   url: url,
    success: function(data) {
       target.append(data).addClass('active');
    }
  });
}
