/*Add Comment*/ 
$('.p_com').live("click",function(x){
    var id = $(this).attr('p_id'),a = $('#xpresi_'+id+' .com_area'),b=$(a).val(),d = 'x_comment='+ b;
    $.ajax({
        type: "POST",
        url: "?act=add_comment&id="+id+'&ajax=true',
        data: d,
        dataType: 'json',
        cache: false,
        success: function(x){
            $(a).val('');
           
            $('#xpresi_'+id+' .comment_list').append('<div class="comment_item">'+x.konten.comment+'<span class="icon icon-remove pull-right"</div>');
        }
    });       
});
$('.open-comment').live("click",function(x){x.preventDefault();var ID = $(this).attr("cid");$("#xpresi_"+ID+ " .xpresi_comment").slideToggle('slow');return false;});	
$('.comment_item').hover(function(){$('#'+$(this).attr('id')+' .-com').toggle();});
$('.-com').live("click",function(x){
    var id = $(this).attr('id').replace('-cb','');
    $.ajax({
    type: "POST",
    url: "?act=remove_comment&id="+id,
    cache: false,
    success: function(html){
        $('#com_'+id).hide();
    }    
    });
});
/*search*/
$("#xp-pencarian").keyup(function() {
    var x = $(this).val(),d = 'q='+ x;
    if(x=='')
        $("#top-pencarian").removeClass('open');
    else{
        $('#search-loading').show();
        $("#top-pencarian").addClass('open');
        $.ajax({
            type: "POST",
            url: "?act=search&ajax=19",
            data: d,
            cache: false,
            success: function(x){
                $("#top-pencarian").addClass('open');
                $("#search-content").html(x);
                $('#search-loading').hide();
            }
        });
    }return false;    
});