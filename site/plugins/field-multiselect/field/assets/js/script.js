!function(e){var t=function(t){var i=this;return this.display=e(t),this.placeholder=i.display.find(".placeholder"),this.field=i.display.parents(".field"),this.label=i.field.find(".label"),this.readonly=i.display.data("readonly"),this.modal=i.field.parents(".modal-content"),this.list=i.display.next(),this.checkboxes=i.list.find('input[type="checkbox"]'),this.search=i.list.find(".search-bar"),this.canSearch=i.display.data("search"),this.selected=[],this.add=function(e){e={order:e.parents(".list-item").index(),name:e.val(),value:e.parent().text()};var t=i.addToStore(e);i.addToDisplay(e,t)},this.addToStore=function(e){return i.selected.push(e),i.sort(e)},this.addToDisplay=function(e,t){var n='<span class="item" title="'+e.name+'">'+e.value+"</span>";t>0?i.display.find(".item").eq(t-1).after(n):i.display.prepend(n)},this.prepopulateSelected=function(){i.checkboxes.filter(":checked").each(function(){i.add(e(this))})},this.remove=function(e){var t=e.val();i.removeFromStore(t),i.removeFromDisplay(t)},this.removeFromStore=function(t){i.selected=e.grep(i.selected,function(e){return e.name!=t})},this.removeFromDisplay=function(e){i.display.find('span[title="'+e+'"]').remove()},this.sort=function(t){if(i.selected.sort(function(e,t){return e.order-t.order}),void 0!==t){var n=e.map(i.selected,function(e,i){return e.name==t.name?i:void 0});return n[0]}},this.filterSearch=function(){var t=i.search.val(),n=i.list.find("ul").children(),s=new RegExp("("+t+")","ig");n.each(function(){i.filterSearchItem(e(this),s)})},this.filterSearchItem=function(e,t){var i=e.find("span"),n=i.text().match(t);if(null===n)e.css({display:"none"});else{var s=i.text().replace(t,"<b>$1</b>");i.html(s),e.css({display:"block"})}},this.resetSearch=function(){i.search.val(""),i.list.find("ul").children().each(function(){i.resetSearchItem(e(this))})},this.resetSearchItem=function(e){var t=e.find("span");t.html(t.text()),e.css({display:"block"})},this.setupSearch=function(){i.search.on("input",i.filterSearch),i.field.on("keydown",function(e){27!=e.keyCode&&27!=e.which||(""===i.search.val()?i.toggleDropdown():i.resetSearch())})},this.togglePlacehoder=function(){i.selected.length>0?i.placeholder.hide():i.placeholder.show()},this.toggleDropdown=function(){i.resetSearch(),i.list.toggle(),i.display.toggleClass("input-is-focused"),i.display.hasClass("input-is-focused")&&i.search.focus(),i.modalize()},this.hideDropdown=function(){i.list.hide(),i.display.removeClass("input-is-focused"),i.modalize("remove")},this.setupDropdown=function(){i.display.add(i.label).on("click",i.toggleDropdown);var t=e(i.modal.length>0?".modal-content":document);t.bind("click",function(t){i.display.hasClass("input-is-focused")&&!i.field.has(e(t.target)).length&&i.hideDropdown()}),i.field.on("keydown",function(e){i.keybindings(e)})},this.changeCheckbox=function(e){e.is(":checked")?i.add(e):i.remove(e),i.togglePlacehoder()},this.setupCheckboxes=function(){i.checkboxes.on("change",function(){i.changeCheckbox(e(this))})},this.currentNavigated=function(){var e=i.list.find(".list-item--focused");return 0===e.length||e.is(":visible")?e:(e.removeClass("list-item--focused"),i.currentNavigated())},this.changeNavigated=function(){var e=i.currentNavigated();if(0!==e.length){var t=e.find(".checkbox");t.prop("checked",!t.prop("checked")),t.trigger("change")}},this.navigateUp=function(e){if(0!==e.length){if(next=e.prevAll(".list-item:visible").first(),0!==next.length)return next;i.search.focus(),i.list.scrollTop(0)}return{length:0}},this.navigateDown=function(e){return 0===e.length?i.list.find(".list-item:visible").first():(next=e.nextAll(".list-item:visible").first(),0!==next.length?next:(i.search.focus(),void i.list.scrollTop(0)))},this.navigateDropdown=function(e){var t,n=i.currentNavigated();t="up"===e?i.navigateUp(n):i.navigateDown(n),n.removeClass("list-item--focused"),0!==t.length&&(i.scrollDropdown(t),t.addClass("list-item--focused"))},this.scrollDropdown=function(e){var t=i.search.outerHeight(),n=i.search.offset().top,s=i.list.innerHeight()-t,o=i.list.scrollTop(),a=e.outerHeight(),l=e.offset().top-n;l>s+o?i.list.scrollTop(o+a):o>l&&i.list.scrollTop(o-a)},this.keybindings=function(e){i.display.hasClass("input-is-focused")?9==e.which?(i.hideDropdown(),i.display.focus(),e.preventDefault()):38==e.which?i.navigateDropdown("up"):40==e.which?i.navigateDropdown("down"):13==e.which&&(i.changeNavigated(),e.preventDefault()):9!=e.which&&38!=e.which&&i.toggleDropdown()},this.modalize=function(t){var n=e(window).height()+e(window).scrollTop();if(i.modal.length>0){var s=i.modal.offset().top+i.modal.height();n>s&&("remove"==t?i.modal.removeClass("overflowing"):i.modal.toggleClass("overflowing"))}},this.init=function(){i.prepopulateSelected(),i.togglePlacehoder(),i.readonly||(i.setupDropdown(),i.setupCheckboxes(),1==i.canSearch&&i.setupSearch())},this.init()};e.fn.multiselect=function(){return this.each(function(){if(e(this).data("multiselect"))return e(this).data("multiselect");var i=new t(this);return e(this).data("multiselect",i),i})}}(jQuery);