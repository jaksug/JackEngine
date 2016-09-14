<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="jaka suganda" />
	<title><include="title"/></title>
     
     <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet"> 
    
   
    <link href="<include="domain"/>/media/css/skill.css" rel="stylesheet">
    <link rel="shortcut icon" href="<include="domain"/>media/img/favicon.ico" />
    
    <link id="Google-Font-css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans%3An%2Ci%2Cb%2Cbi%7CDroid+Serif%3An%2Ci%2Cb%2Cbi%7CMerriweather%3An%2Ci%2Cb%2Cbi%7C&amp;ver=3.4" type="text/css" media="all">    
 <script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
</head>
<body>
   <include="loader"/>
    <include="menu"/>
    <div class="container"  >
        <div  id="post">
            <include="zona"/>
        </div>
    </div>
    <footer>
        <div class="container ">
            <div class="foot-tengah">
                <ul class="nav nav-pills ">
                <li><a href="http://www.positiflabs.com/jaksu">&copy; Jaka Suganda 2013</a</li>
                <li><a href="<include="domain"/>"> SMKN 1 Gunungputri</a></li>
                <li><a href="<include="domain"/>z/home"> Home</a></li>
                <li><a href="<include="domain"/>z/galeri">Galeri</a></li>
                <li><a href="<include="domain"/>z/video">Video</a></li>
                <li><a href="<include="domain"/>z/bk"> Bimbingan Konseling</a></li>
            </ul>
            </div>
            
        </div>
      
    </footer>
   
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/js/bootstrap.min.js"></script>   
    <style>
    .list li{
        display: inline;
        list-style: none;
        margin-right: 10px;
    }
    </style>
   
    <script>
    var domain = "http://localhost/skill/";
    $('.tetep').click(function(e){   
        e.preventDefault();
    });
    $("#ke-ranjang").on("click", function(){
        var link = $(this).attr('href');
    $.ajax({
                type: "GET",
                url: link,
                dataType: "json",
                cache:true,
                success: function(x){
                    
                    
                    
                }
            });
    });
    $("[data-toggle=modal]").click(function(event) {
            $('#loader').show(); 
            event.preventDefault(); 
            obj = '#myModal .galeri-inner';
            
            rel = $(this).attr('rel');
            
   var a=parseInt($(this).attr('data_id'));
   
            $(obj).html('<div id="loader"><img src="<?php echo domain();?>media/img/loader.gif" /> Tengah memuat ....</div>');
                $.ajax({
                type: "GET",
                url: rel,
                dataType: "json",
                cache:true,
                success: function(data){ 
                     $(obj).html(data.konten);
                     $(this).attr('open','true');
                     history.pushState('', '', rel);
                     $("#next").attr('rel',a+1);
                }
            });  
        });
        $(".close").click(function(event) {
                history.back();  
        });   
        
        
           
    </script>
    <script>
    var yang_lalu = '';
    function getState(a,b){
            $("#xp-load").slideDown(1000);
            $('.load-konten').html('Meload Halaman');
            $.ajax({
                type: "GET",
                url: a,
                dataType: "json",
                cache:true,
                success: function(x){
                    if(x.status==true){
                         history.pushState(null, null, a);
                         
                        $(b).html(x.konten);
                    $('.load-konten').html('Selesai memuat halaman');
                    setTimeout(function(){
                        $("#xp-load").slideUp(2000); 
                    },5000)
                    } else {
                        $('.load-konten').html('halaman tidak ditemukan');
                    }
                    
                    
                }
            });
        }
        function ajax(a,b){
               $(a).on('click','a',function(e){
       
        var href = $(this).attr('href');
       
            if(href.match(document.domain)){
                 e.preventDefault();      
                getState(href,b);
            }
        
        
    });
        }

       ajax("#xp-admin","#adm-konten");
$('#btn-brt').click(function(e){
    $('#tmb-brt').toggle();
    e.preventDefault();
    
});

$('#adm-btn').click(function(e){
    $('#adm-place').toggle();
    $('#adm-place .dropdown-menu').toggle();
     var href = $(this).attr('href');
     e.preventDefault();
     yang_lalu = document.domain+'/skill'  ;
     getState(href,'#adm-konten')
             
});
$('#adm-close').click(function(e){
    $('#adm-place').toggle();
    $('#adm-place .dropdown-menu').toggle();
   
    e.preventDefault();
    history.back();
    
});

$('#curhat-form').submit(function(e){
    var rahasia = $("#rahasiakan").val();
    var curhat = $('#curhat').val();
    dat = "x-curhat="+curhat,"rahasikan="+rahasia;  
    e.preventDefault();
    ini = $(this),act=$(this).attr('action');
    
     $.ajax({
                type: "POST",
                url: act,
                data: $(ini).serialize(),
                cache:true,
                dataType: "json",
                success: function(x){
                    if(curhat!=''){
                        $('#curhat-data').prepend('<div class=" cur-dat"><a href="http://127.0.0.1/skill/"><img title="jaksu" width="45" src="http://127.0.0.1/skill/media/img/avatar.jpeg"/> </a><div class="curhatan">'+curhat+'<div class="icon icon-remove"></div></div></div>');
                   $('#curhat').val(''); 
                   alert(x.konten);
                    }
                }
            });
});
$('.form-balas').submit(function(e){
    e.preventDefault();
  
    var balas = $('.txt-balas',this).val(),ke=$('.cur-for',this).val(),dat="balasan="+balas+",id="+ke,act = $(this).attr('action'),ini=$(this),id=$(this).attr('cur_id');
    alert(dat);
     $.ajax({
                type: "POST",
                url: act,
                data: $(ini).serialize(),
                cache:true,
                success: function(x){
                  $("[cur_id*='"+id+"']").fadeOut(1000);
                    $('.txt-balas',ini).val('');
                }
            });
});

$('#form-thread').submit(function(e){
    e.preventDefault();
  
    var act = $(this).attr('action'),ini=$(this);
  
     $.ajax({
                type: "POST",
                url: act,
                data: $(ini).serialize(),
                cache:true,
                dataType: "json",
                success: function(x){
                  $('#form-thread textarea').val('');
                  $('#form-thread input[type*="text"]').val('');
                  alert(x.konten);
                }
            });
});

$('#add-reply').submit(function(e){
    e.preventDefault();
  
    var act = $(this).attr('action'),ini=$(this);
  
     $.ajax({
                type: "POST",
                url: act,
                data: $(ini).serialize(),
                cache:true,
                success: function(x){
                  $('#add-reply textarea').val('');
                 
                }
            });
});

$(document).on("mouseover",'.cur-dat',function(){
$(".icon-remove",this).show();
});
$(document).on("mouseout",'.cur-dat',function(){
$(".icon-remove",this).hide();
});
$('.konselor .cur-dat').on('click',function(){
    $(".cur-kom",this).show();
    $(this).addClass('aktif');
});

$('.icon-remove').on('click',function(){
    var id = $(this).attr('no');
     $.ajax({
                type: "GET",
                url: domain+"z/user/curhat_hapus/"+id,
                cache:true,
                success: function(x){
                  $("[cur_id*='"+id+"']").fadeOut(1000);
                    
                }
            });
});

$('#video-komen').submit(function(e){
    e.preventDefault();
  
    var act = $(this).attr('action'),ini=$(this);
  
     $.ajax({
                type: "POST",
                url: act,
                data: $(ini).serialize(),
                cache:true,
                success: function(x){
                  $('#video-komen textarea').val('');
                 
                }
            });
});

 window.addEventListener('popstate',function(e){
        getState(location.pathname,'#adm-konten');
    });
</script>
<!-- <script type="text/javascript">
$('#tmb-brt').on("mouseout",function(){
    $("#curhat-data").css('overflow','hidden');
    $('.curhatan').css('width','270px');
});
if($("#curhat-data").height()>=300){
        $("#curhat-data").css({"overflow-y":"scroll"});
    $('.curhatan').css('width','250px');
    } else {
         $("#curhat-data").css({"overflow-y":"hidden"});
    }
$('#tmb-brt').on("mouseover",function(){ 
    if($("#curhat-data").height()>=300){
        $("#curhat-data").css({"overflow-y":"scroll"});
    $('.curhatan').css('width','250px');
    } else {
         $("#curhat-data").css({"overflow-y":"hidden"});
    }
});
	 ajax('#post');
        ajax('#main-menu');
 
    window.addEventListener('popstate',function(e){
        getState(location.pathname,'#post');
    });

</script> -->
</body>
</html>
   