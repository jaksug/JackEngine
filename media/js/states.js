(function($){
    $.fn.xpState = function(set){
        var standar = $.extend( {
            state   : '#xp-main',
            home    : 'http://localhost/engine/',
            homeAct : '?act=beranda&',
            param   : 'ajax=true'
        }, set),
        ini = $(this),
        atur = $.extend({},standar, atur);
        return this.each(function(){
            ini.click(function(e){
                e.preventDefault();
                var url = this.href,xps;
                if(url==atur.home) xps=atur.homeAct+atur.param;
                else xps = url+'&'+atur.param;
                history.pushState(null, null, url);
                getState(xps);   
            });     
        });
        function getState(a){
            $("#xp-load").slideDown(1000);
            $('.load-konten').html('Meload Halaman');
            $.ajax({
                type: "GET",
                url: a,
                dataType: "json",
                cache:true,
                success: function(x){            
                    $(atur.state).html(x.konten);
                    $('.load-konten').html('Selesai memuat halaman');
                    setTimeout(function(){
                        $("#xp-load").slideUp(2000); 
                    },5000)
                    
                }
            });
        }
    };
})(jQuery);

