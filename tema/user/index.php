<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="jaka suganda" />
	<title><include="title"/></title>
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="<include="domain"/>/media/css/skill.css" rel="stylesheet">
    <link rel="shortcut icon" href="<include="domain"/>media/img/favicon.ico" />
    <link id="Google-Font-css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans%3An%2Ci%2Cb%2Cbi%7CDroid+Serif%3An%2Ci%2Cb%2Cbi%7CMerriweather%3An%2Ci%2Cb%2Cbi%7C&amp;ver=3.4" type="text/css" media="all">    
<style>
#luhur{
   
    
}
.profil-background{
   
    height: 50px;
    padding: 00px 0 0 0;
    margin-bottom: -20px;
}
.profil-konten .nav{
    
}
#prof-nav .nav{
    padding-left: 20px;
    
}
.profil-nama{
    margin: 14px 0 0 -20px!important;
}
.profil-about{
    height: 50px;
    margin-top: -10px;
    margin-left: 100px;
    padding: 5px 20px;
  
}
.profil-about .label{
    float: right;
    padding: 10px 20px;
    font-size: 18px;
    margin-top: 10px;
    margin-right: -10px;
}
.profil-konten{
  
    margin-top: 50px;
    border-top: 1px solid #ccc;
border-bottom: 1px solid #ccc;
height: 37px;
    
}
.tentang,#kontak{
    background: rgb(98, 104, 107);
    margin-left: 0px!important;
    border-radius: 3px;
    margin-bottom: 20px;
    padding: 10px 20px;
    color: #fff;
}
.tentang b,#kontak b{
    font-size: 15px;
    font-weight: normal;
}
.tentang{
    margin-left: 10px!important;
}
.tentang:before{
        
margin: -20px 0px 0 250px!important;
position: absolute;

  display: inline-block;
  border-left: 15px solid transparent;
  border-bottom: 15px solid rgb(98, 104, 107);
  border-right: 15px solid transparent;

  content: '';
  float: right;
}
.profil-pos-judul{
    border-bottom: 1px solid  rgb(53, 155, 237);
}
</style>
</head>
<body>
    <?php 
    if( isset( $_SESSION['noscript']) ) {
    echo '  <div id="noscript" class="alert">
                <div class="container">
                    <strong>Perhatian!</strong> Anda tengah dalam mode tanpa javascript, aktifkan JavaScript untuk <a href="'.domain().'z/noscript/beralih"><strong>beralih ke mode JavaScript</strong></a>
                </div>
            </div>';
    }?>          
    <div id="luhur">
        <div class="konten">  
            <div class="row-fluid" >
                <div class=" span6" id="logo">
                    <a href="<?php echo domain();?>"><img src="<include="domain"/>media/images/logo.png" /></a>
                </div>
                <div class="span6">
                <form method="post" action="<include="domain"/>i/search">
                    <div class="input-append  span12" id="cari">
                        <button type="submit" class="btn btn-warning pull-right" type="button">Telusuri!</button><input class="span9 pull-right"  autocomplete="off" placeholder="Temukan Sesuatu ..." name="q" size="16" type="text">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <include="menu"/>
    <div class="konten " id="konten"  >
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
    <script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/js/bootstrap.min.js"></script>
    <script>
    $('.tetep').click(function(e){   
        e.preventDefault();
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
</body>
</html>
   