<div class="row-fluid">
<div class="span12 widget"  id="guru">
<div class="pull-left" id="prog-name"><?php echo  $data[0]['nama'];?></div>
<img src="assets/img/elind.jpg" />

<div class="btn-group pull-right " id="prog-nav">
 <a href="?act=guru&id=<?php echo $_GET['id'];?>" class="btn" id="ac"><i class="icon-share icon"></i> Aktivitas</a>
        <a href="?act=guru&id=<?php echo $_GET['id'];?>&profil" class="btn"><i class="icon icon-user"></i> Profil</a>
        <a class="btn"><i class="icon  icon-download-alt"></i> Download</a>
</div>
</div>
<div class="span12 widget" id="guru-head">
Berita
</div></div>

<script>$('.lihat').click(function(e){
    e.preventDefault();
    var url =$(this).attr('href'),x=url+'&ajax=true';

    if(url!='#') {
        History.pushState({state:1,rand:Math.random()}, "State 1", url);
        $('#notif').fadeIn();
        $.ajax({
            type: "GET",
             dataType: "json",
            url: x,
            cache:true,
                success: function(x){            
                    $('#zona').html(x.konten);
                     $('#notif').fadeOut();
                     $('.dropdown').removeClass('open');
                    
                }
    });    
    }
    
})</script>