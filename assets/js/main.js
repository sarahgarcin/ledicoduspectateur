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
        var that = this, xhr, coord;
        
        if (that.querySelector("#placeholder")) {
            return; // avoid div stacking
        }
        
        coord = that.getBoundingClientRect();
        
        console.log(coord);
        console.log(that);
         
        that.classList.add("is-active");
        
        xhr = new XMLHttpRequest();
        xhr.open("post", this.getAttribute("data-target"));
        xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
        
        xhr.onload = function getRes() {
            var placeholder = document.createElement("div");
            placeholder.id = "placeholder";
            placeholder.className = "placeholder";
            placeholder.innerHTML = this.response;
//            console.log(placeholder);
            byId("pagedefinitions").appendChild(placeholder);
    
            placeholder.style.border = "1px solid red";
            placeholder.style.left = that.offsetLeft + "px";
            placeholder.style.top = that.offsetTop + "px";
//            log("placeholder.offsetTop");
//            log(that.offsetTop);
//            log(placeholder.getBoundingClientRect());
        }

        xhr.send();
        e.preventDefault();
    }



}
