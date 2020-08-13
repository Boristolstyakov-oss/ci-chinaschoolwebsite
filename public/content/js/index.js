;$(function(){
    'use strict';

    var siderbar=$("#siderbar"),
        mask=$("#mask"),
        back=$("#back"),        
        siderbaron=$(".siderbaron");
    

    function showSiderBar(){
        mask.fadeIn();
        siderbar.css('right',0);

    }
    function hideSiderBar(){
        mask.fadeOut();
        siderbar.css('right',-siderbar.width())
    }
     function backToTOP(){
        $('html,body').animate({
            scrollTop:0
        },800)
    }
    function exact(){
        if($(window).scrollTop() > 50)
           {
              
               siderbar.css('top',0)
            //    nav.css('background-color',"#ccc")
           }
        else
           {
               siderbar.css('top',50)
                // nav.css('background-color',"transparent")
            }
        
        if($(window).scrollTop() > $(window).height())
           {
               back.fadeIn();
               siderbar.css('top',0)
            //    nav.css('background-color',"#ccc")
           }
        else
           {
               back.fadeOut();
                // nav.css('background-color',"transparent")
            }
    }
    function scroll(){
        nav.css('background-color',"#ccc")
    }
    siderbaron.on("click",showSiderBar)
    mask.on("click",hideSiderBar)
    back.on("click",backToTOP)
    $(window).on("scroll",exact)
    $(window).trigger('scroll')

        
})