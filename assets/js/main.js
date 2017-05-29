$(document).ready(function() {

    $(document).foundation();
    init();

});


function init() {

    //    $(document).keydown(function(e) {
    //        //CTRL + V keydown combo
    //        // console.log(e.keyCode);
    //        if (e.ctrlKey && e.keyCode == 87) {
    //            console.log("I've been pressed!");
    //            if ($('.grid').hasClass('active')) {
    //                $('.grid').hide().removeClass('active');
    //            } else {
    //                $('.grid').show().addClass('active');
    //            }
    //        }
    //
    //    });
    //    
    function log(d) {
        "use strict";
        window.console.log(d);
    };

    function select(sCSS) {
        "use strict";
        return document.querySelector(sCSS);
    };

    function selectAll(sCSS) {
        "use strict";
        return document.querySelectorAll(sCSS);
    }

    function byId(id) {
        "use strict";
        return document.getElementById(id);
    };

    var defs, i, url;

    defs = selectAll(".definition");
    for (i = 0; i < defs.length; i += 1) {
        defs[i].onclick = displayDef;
    }


    function displayDef(e) {
        e.preventDefault();
        url = $(this).data('target');
//        log(url);
        $.ajax({
            url: url,
            success: function(data) {
//                console.log(data);
                console.log(typeof(data));
//                $(".random-div").append(data);
//                if(data == )
            }
        });

    }



}
