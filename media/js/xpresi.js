
(function($){
    $.fn.Xpresi = function(set){
        var d = $.extend( {
            data    : ''
        }, set),
        i = $(this),
        a = $.extend({},d, a);
        return this.each(function(){
                for (var x = 0; x < a.data.konten.length; x++) {
                        var xp =a.data.konten[x];
                   	    $(i).append("\
                    <li class='xp-eksp-li ' id_post='"+xp.id+"'>\
                        <div class='xp-eks-li-l'>\
                            <img class='xp-aura' src='' />\
                        </div>\
                        <div class='xp-eks-li-r'>\
                            <p><a href='?zona=ekspreser&id="+xp.xp_id+"' class='xp_n'></a>\
                        </div>\
                        <img width='50px' src='foto/tia.jpg'/>"+xp.ekspresi+"\
                        <div >\
                            <a class='xp-tgp-link' id_post='"+xp.eks_id+"'>Tanggapi</a>\
                        </div>\
                    </li>");}
        });
    };
})(jQuery);

