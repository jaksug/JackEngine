<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);
    $core = getInstance();      

?>
  <div class="page-header">
                <div class="row-fluid">
           
                    <div class=" span7" style="margin-top: 10px;" >
                        <a href="." title="SMKN 1 GUNUNG PUTRI" ><img src="img/logo.png" /></a>
                    </div>
                    <div class="span5 " >
                       <div class=" span12 input-append  "id="pencarian">
                            <input autocomplete="off" id="xp-pencarian" class="span8" placeholder="temukan sesuatu..." id="appendedInputButtons" size="16" type="text"><button class="btn btn-warning" type="button"> <i class="icon icon-white icon-search"></i> Telusuri</button>
                        </div>
                        <ul class="nav span12">
                            <li class="dropdown" id="top-pencarian">
                                <ul class="dropdown-menu" id="cari-box">
                                    <div class="segitiga"></div>
                                    <div id="search-content"></div>
                                
                                
                                    <div id="search-loading">
                                        <li class="divider"></li>
                                        <li><a><img src="img/loader.gif" /> searching...</a></li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
 <div class="navbar">
<div class="navbar-inner" id="menu">
    <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
        <div class="nav-collapse collapse">
            <ul class="nav" id="luhur"> 
                <li><a href="<?php echo domain();?>"><span class="icon icon-home"></span> Beranda</a></li>
                <li class="dropdown">
                    <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Profil<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                        <li><a href="?laman=sejarah">Sejarah</a></li>
                        <li><a href="?laman=sarana">Sarana</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Kepala Sekolah</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Program Keahlian<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                        <li><a href="?act=prog&nama=elind">Teknik Elektronika Industri</a></li>
                        <li><a href="#">Kimia Industri</a></li>
                        <li><a href="#">Teknik Pengelasan</a></li>
                        <li><a href="#">Teknik Pengelasan</a></li>
                    </ul>
                </li>  
                <li class="dropdown"><a href="?act=guru" id="drop2" role="button" class="dropdown-toggle" >Guru</a></li>
                <li class="dropdown">
                    <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Siswa <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                        <li><a href="#">Osis</a></li>
                        <li><a href="#">MPK</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Ekstrakulikuler</a></li>
                    </ul>
                </li>
                <li><a href="?p"><span class="icon "></span> Berita</a></li>
            </ul>
            <ul class="nav pull-right">
            <?php if(!$core->user->status) { ?>
                <li class="dropdown">
                    <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Login <b class="icon icon-lock"></b></a>
                    <ul class="dropdown-menu" id="login" role="menu" aria-labelledby="drop2">
                        <form method="post" accept-charset="" action="?act=login"><br />
                            Username  
                            <input class="span3" type="text" placeholder="Username or Email" value="" name="xp-log-ide"></input><br />
                            Password
                            <input class="psw span3" type="password" placeholder="Password" value="" name="xp-log-pass"></input><br />
                            <li class="divider"></li>
                            <button class="btn btn-success pull-right" type="submit">Login</button> 
                        </form>
                    </ul>
                </li>
            <?php } ?>    
            </ul>
        </div>
    </div>
</div>
</div>
<script>$('#luhur li a').click(function(e){ e.preventDefault();ajax_goto($(this).attr('href'),'#zona');});</script>