$(document).ready(function(){
	
	$(document).foundation();
	init();

});


function init(){

	$(document).keydown(function(e){
    //CTRL + V keydown combo
    // console.log(e.keyCode);
    if(e.ctrlKey && e.keyCode == 87){
      console.log("I've been pressed!");
      if($('.grid').hasClass('active')){
      	$('.grid').hide().removeClass('active');
      }
      else{
      	$('.grid').show().addClass('active');
      }
    }
	});

 


}

