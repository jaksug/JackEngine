<?php
    $xp     = getinstance(); 
    if($xp->user->status) {
        $id = $xp->user->id;
?>
<div id="topper" class="container"> 
</div>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner" id="top-menu">
        <div class="container" id="user-menu">
            <a href="<?php echo domain();?>" class="brand span3"><img src="<?php echo domain();?>media/images/logo_mini.png"/></a>
            <div class="span5">
                <div class="row-fluid">
                    <input id="cari-top" class="span12"  autocomplete="off" placeholder="Temukan Sesuatu ..." name="q" " type="text"><i id="icon-cari" class="icon-search"></i>
                </div>
            </div>
        <div class="span4">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-th-list"></span></a>
        <ul class="nav">  <li><a href="<?php echo domain();?>"><i class="icon-home"></i> Beranda</a></li></ul>
        <div  class=" nav-collapse collapse">
             <ul class="nav pull-right">
    
                <li class="dropdown">
                
                    <a class=" dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-th"></i></a>
                    <ul class="dropdown-menu">
                    
                
                    <li><a href="<?php echo domain();?>z/berita/">Berita</a></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>p/sejarah-smk-negeri-1-gunung-putri">Sejarah</a></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>laman/profil/visi-misi">Visi misi</a></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>laman/profil/sarana-dan-prasarana-fasilitas-pendidikan">Sarana</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>laman/profil/prestasi">Prestasi</a></li>
                        <li class="dropdown">
                    <a class=" dropdown-toggle" data-toggle="dropdown" href="#">Program Keahlian <i class="caret"></i></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="<?php echo domain();?>profil/las">Teknik Pengelasan</a></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>profil/ilg">Teknik Instrumentasi Logam</a></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>profil/elind">Teknik Elektonika Industri</a></li>
                   
                        <li><a tabindex="-1" href="<?php echo domain();?>profil/kimia_industri">Kimia Industri</a></li>
                    </ul>
                </li>
                    </ul>
                </li>
                
    <?php
    if($xp->user->level == 'user' || $xp->user->level == 'siswa' ) {
        
    ?>
  <li class="dropdown">
  
                    <a class=" dropdown-toggle" id="btn-brt"  href="#"><i class="icon-comment"></i></a>
                    <ul class="dropdown-menu tmb-brt" id="tmb-brt">
                    <div class="chat-head">
                    <ul class="nav"><li><a href="#"><i class="icon icon-refresh"></i></a></li>
                    <li><label class="styled-select">
                    <select><option>Karyadi</option></select></label></li>
                    </ul>
                    </div>
                    <div id="curhat-data">
                    
                    <?php 
  $xp->database->select('*');
  $xp->database->from('curhat');
  $xp->database->where("x_id='$id' OR  balasan='$id'");
   $xp->database->order('id','DESC');
   $xp->database->execute();
        $data  = $xp->database->fetchAll();
foreach($data as $x){
    if($x['balasan']!= $id) {
          echo '<div  cur_id="'.$x['id'].'" class=" cur-dat pull-right"><div class="curhatan-bal"><b>'.$x['nama'].'</b><br />'.$x['curhatan'].'<i title="Hapus" class="icon icon-remove" no="'.$x['id'].'"></i></div></div>';

    } else {
        echo '<div class=" cur-dat" cur_id="'.$x['id'].'"><a href="'.domain().'"><img title="'.$x['nama'].'" width="45" src="'.domain().avatar($x['x_id']).'"/> </a><div class="curhatan"><b class="chat-nama">'.$x['nama'].'</b><i title="Hapus" class="icon icon-remove" no="'.$x['id'].'"></i><br />'.$x['curhatan'].'</div></div>';

    }
  
}
  ?></div>
                        <form method="post" action="<?php echo domain();?>?z=user&act=curhat" id="curhat-form">
                      <textarea name="x-curhat" id="curhat" placeholder="Ceritakan sesuatu ....."></textarea>
                      <div class="bot-foot">
                      <div class="rahasia">
                      <input name="rahasiakan" id="rahasiakan" type="checkbox" class="pull-left" /><p class="pull-left">rahasiakan saya</p></div>
                      <button type="submit" class="btn pull-right" id="btn-foot">Ungkapkan</button>
                      </form>
                      </div>
                    </ul>
                </li>
   
    <?php } else if($xp->user->level == 'konselor') {
     ?>
       <li class="dropdown">
  
                    <a class=" dropdown-toggle" id="btn-brt"  href="#"><i class="icon-comment"></i> Konseling<i class="caret"></i></a>
                    <ul class="dropdown-menu" id="tmb-brt">
                    <div id="curhat-data" class="konselor">
                    <?php 
  $xp->database->select('*');
  $xp->database->from('curhat');
  $xp->database->where("dibalas='0'");
   $xp->database->order('id','ASC');
   $xp->database->execute();
        $data  = $xp->database->fetchAll();
foreach($data as $x){
    echo '<div class=" cur-dat konseling" cur_id="'.$x['id'].'">
    <div><a href="'.domain().'"><img title="'.$x['nama'].'" width="45" src="'.domain().'media/img/avatar.jpeg"/> </a><div class="curhatan"><b>'.$x['nama'].'</b><br />'.$x['curhatan'].'</div>
    <div class="cur-kom"><form cur_id="'.$x['id'].'" class="form-balas" method="post" action="'.domain().'z/user/balas/'.$x['x_id'].'"><textarea class="txt-balas" placeholder="balas curhatan ..... " name="balasan"></textarea>
    <ul class="nav"><li><a>Lihat percakapan</a></li><li><a >Hapus</a></li><li><button type="submit" class="btn btn-small">Balas</button></li></ul>
    <input class="cur-for" type="hidden" name="id" value="'.$x['id'].'"/>
    </form>
    </div>
    </div></div>';
}
  ?></div>
                    </ul>
                </li>
     <?php   
    } 
    $data       = $xp->database->rawSelect("SELECT * FROM th_kategori"); 
    ?>

   <li class="dropdown">
                    <a class=" dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-pencil"></i></i></a>
                    <ul class="dropdown-menu chat-box">
                    <form id="form-thread" action="<?php echo domain();?>z/home/tambah_thread" method="post">
                    
                    <div class="chat-head"> 
                    <label class="styled-select">
                    <select name="kategori">
                <?php
                foreach( $data as $x){
                    echo '<option value="'.$x['id'].'">'.$x['nama'].'</option>';
                }
                ?>?
                </select></label></div>
                    <div class="chat-konten">
                    <input style="width:340px" type="text" name="judul" placeholder="Judul" />
                <?php echo input_token();?> 
       <textarea name="pos" id="home-add" placeholder="Bagikan sesuatu ..... "></textarea>
       </div>
       <div class="chat-foot">
       <input type="submit" value="Bagikan" class="btn pull-right" />
       </form>
       </div>
                    </ul>
                </li> 
  <li class="dropdown">
  
                    <a class=" dropdown-toggle" data-toggle="dropdown" href="#"><i class=" icon-user"></i> Akun </i></a>
                    <ul class="dropdown-menu">
                    <li >
                    <a href="<?php echo domain();?>z/administrasi">Administrasi</a>
               
                </li> 
        <li ><a href="<?php echo domain();?>profil/<?php echo$xp->user->username;?> "><i class=" icon-user"></i> Profil</a></li>
        <li ><a href="<?php echo domain();?>z/user/pengaturan/ "><i class=" icon-cog"></i> Pengaturan</a></li>
                     <li><a href="<?php echo domain();?>/i/logout"><i class="icon-off"></i> Logout</a></li> 
                    </ul>
                </li> 
  
     </ul>
        <ul class="nav pull-left">
         <?php  if($xp->user->level != 'user'){
        
    ?>
    <!-- 
     
                <li class="dropdown" >
                    <a class=" dropdown-toggle" data-toggle="dropdown" href="<?php echo domain();?>administrasi/">Administrasi</a>
                    
                </li> -->
                
                <?php }?>

   </ul>
            </div></div>
        </div>
    </div>
</div>

<?php
    } else {
        
    
?>
<div id="luhur">
        <div class="container">  
            <div class="row-fluid" >
                  <div class=" span6" id="logo">
                    <a href="<?php echo domain();?>"><img src="<?php echo domain();?>media/images/logo.png" /></a>
                </div>
                <div class="span6 row-fluid">
                <form method="post" id="cari" action="<?php echo domain();?>i/search">
                    
                        <input class="span9 "  autocomplete="off" placeholder="Temukan Sesuatu ..." name="q" size="16" type="text">
                         <button type="submit" class="btn btn-warning pull-right span3" type="button">Telusuri!</button>                        
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
<div id="menu">

 <div class="container ">
<div class="navbar "  >

    <div class="navbar-inner" >
        
          
<?php

          if($xp->plugin == 'user'  AND $xp->request['method'] == 'pengaturan'){
?>
 <ul class="nav">
        <li class="active"><a href="<?php echo domain();?>z/user/pengaturan/"><i class="icon-white icon-cog"></i> Umum</a></li>
        <li><a href="<?php echo domain();?>z/user/pengaturan/password/"><i class="icon-white icon-lock"></i> Password</a></li>
        <li><a href="<?php echo domain();?>z/user/pengaturan/profil"><i class="icon-white icon-user"></i> Profil</a></li>
        </ul>
        <ul class="nav pull-right">
        <li><a href="#"><i class="icon-white icon-home"></i> Beranda</a></li>
        </ul>

<?php
    } else {
    $xp     = getinstance();
    if( $xp->plugin == 'home' ) {
        $id     = 'data_menu';
        if($xp->cache->valid($id)){
            $data   = $xp->cache->get($id);
        } else {
            $xp->cache->hapus($id);
            $data   = $xp->database->rawselect("SELECT * FROM th_kategori");
            $xp->cache->set($id,$data);
        }
?>
            <ul class="nav">
                <li><a href="<?php echo domain();?>z/home"><i class="icon-home icon-white"></i> Home</a></li>
            <?php foreach( $data as $x ) {
                    echo ' <li><a href="'.domain().'z/home/kategori/'.$x['url'].'">'.$x['nama'].'</a></li>';
                
            } ?>     
            </ul>
            <ul class="nav pull-right">
              
                <li><a href="<?php echo domain();?>"><i class="icon-home icon-white"></i> SMKN 1 Gunungputri</a></li>
            </ul>
<?php
    } else if($xp->plugin == 'administrasi') {
?>
        <ul class="nav">
            <li><a href="<?php echo domain();?>administrasi"><i class="icon icon-home icon-white"></i> Dahsboard</a></li>
              <li class="dropdown">
                    <a class=" dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-white icon-list-alt"></i> Berita <i class="caret"></i></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="<?php echo domain();?>administrasi/post/tambah">Tambah</a></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>administrasi/post/">Semua Berita</a></li>
                         <li class="divider"></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>administrasi/post/kategori/">Kategori</a></li>
             
                    </ul>
                </li>
                <li><a href="<?php echo domain();?>administrasi/komentar/"><i class="icon icon-comment icon-white"></i> Komentar</a></li>
                  <li class="dropdown">
                    <a class=" dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon icon-white icon-th-large"></i> Plugin <i class="caret"></i></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="<?php echo domain();?>administrasi/video"><i class="icon-facetime-video"></i> Video</a></li>
                          <li><a tabindex="-1" href="<?php echo domain();?>administrasi/galeri"><i class="icon-picture"></i> Geleri</a></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>administrasi/plugin"><i class="icon-cog"></i> Manager</a></li>
                        
                    </ul>
                </li>
                <?php
                if($xp->user->level == 'admin') {
                ?>
                <li class="dropdown">
                    <a class=" dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon icon-white icon-user"></i> Pengguna <i class="caret"></i></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="<?php echo domain();?>administrasi/user/tambah">Tambah</a></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>administrasi/user/">Semua Pengguna</a></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>administrasi/user/aktivasi/">Aktivasi</a></li>
                        
                    </ul>
                </li>
                 
                <li><a href="<?php echo domain();?>administrasi/komentar/"><i class="icon icon-cog icon-white"></i> Pengaturan</a></li>
                 
                <?php } else {?>
                    <li><a href="<?php echo domain();?>z/user/pengaturan/"><i class="icon icon-user icon-white"></i> Profil</a></li>
                <?php } ?>
                
        </ul>
        <ul class="nav pull-right"><li class="pull-right"><a href="<?php echo domain();?>"><i class="icon-white icon-home"></i> Situs</a></li></ul>
<?php
    } elseif( $xp->plugin == 'bk') {
?>
           <ul class="nav">
                  <li><a href="<?php echo domain();?>z/bk/">Bimbingan Konseling</a></li>
                <li><?php echo anchor('bk','','Bimbingan Konseling');?></li>
              
            </ul>
            <ul class="nav pull-right">
              
                <li><a href="<?php echo domain();?>"><i class="icon-home"></i> SMKN 1 Gunungputri</a></li>
            </ul>
<?php

    } else {
      if($xp->mobile){
?>

            <ul class="nav">
                  <li><a href="<?php echo domain();?>"><i class="icon-home icon-white"></i> Beranda</a></li>
                    <li><a href="<?php echo domain();?>z/berita/">Berita</a></li>
                    <li><a href="<?php echo domain();?>z/berita/kategori/profil">Profil</a></li>
                    <li><a href="<?php echo domain();?>z/user/tipe/Program-Keahlian/">Program Keahlian</a></li>
                    <li><a href="<?php echo domain();?>z/user/tipe/kesiswaan">Kesiswaan</a></li>
                    </ul>
<?php
      } else{
        
      

?>  
            <ul class="nav">
                  <li><a href="<?php echo domain();?>"><i class="icon-home icon-white"></i> Beranda</a></li>
                    <li><a href="<?php echo domain();?>z/berita/">Berita</a></li>
                <li class="dropdown">
                    <a class=" dropdown-toggle" data-toggle="dropdown" href="#">Profil <i class="caret"></i></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="<?php echo domain();?>p/sejarah-smk-negeri-1-gunung-putri">Sejarah</a></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>laman/profil/visi-misi">Visi misi</a></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>laman/profil/sarana-dan-prasarana-fasilitas-pendidikan">Sarana</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>laman/profil/prestasi">Prestasi</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class=" dropdown-toggle" data-toggle="dropdown" href="#">Program Keahlian <i class="caret"></i></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="<?php echo domain();?>profil/las">Teknik Pengelasan</a></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>profil/ilg">Teknik Instrumentasi Logam</a></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>profil/elind">Teknik Elektonika Industri</a></li>
                   
                        <li><a tabindex="-1" href="<?php echo domain();?>profil/kimia_industri">Kimia Industri</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class=" dropdown-toggle" data-toggle="dropdown" href="#">Organisasi Sekolah <i class="caret"></i></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="<?php echo domain();?>profil/osis">OSIS</a></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>profil/mpk">MPK</a></li>
                   
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="<?php echo domain();?>/z/x">Ekstrakulikuler</a></li>
                    </ul>
                </li>
                 <li><a href="<?php echo domain();?>z/bk/">Bimbingan Konseling</a></li>
        
                 <li class="dropdown">
                    <a class=" dropdown-toggle" data-toggle="dropdown" href="#">Lainnya <i class="icon-th-large icon-white"></i></a>
                    <ul class="dropdown-menu">
      <li><a href="<?php echo domain();?>z/home"><i class=" icon-comment"></i> Home</a></li>
       <li><a href="<?php echo domain();?>z/galeri"><i class=" icon-picture"></i> Galeri</a></li>
       <li><a href="<?php echo domain();?>z/video"><i class="icon-facetime-video"></i> Video</a></li>
      
                    </ul>
                </li> 
            </ul>
<?php } }?>
        </div></div>
    </div>
</div>
<?php
}
    
    }
?>

<style>
.konseling:hover{
    background: #ccc;
    cursor: pointer;
}
#xp-load{
    position: fixed;
    top:-10px;
    left: 40%;
    height: 20px;
    right:40%;
    padding: 10px;
}
#curhat-data{
    max-height:300px;
   float: left;
   width: 350px;
overflow-x: hidden;
overflow-y: scroll;
}

.konselor{
     max-height:350px!important;
}
.cur-dat{
    float: left;
    width: 370px;
    margin: 0 -17px 5px 0px;
  padding: 4px;
  
}
.cur-dat img{
    float: left;
    margin-left: -17px;
}
.rahasia{
    float: left;
    margin-top: 10px;
}
.cur-dat .icon-remove{
    position: absolute;
    float: left;
    margin: 0px;
    cursor: pointer;
    
}
.chat-nama{
    width: 230px!important;
    float: left;
}
.cur-dat .icon-remove:hover{
    
}
#curhat{
    width: 335px;
    height: 70px;
    resize: vertical;
}
.cur-kom{
    display: none;
}
.curhatan{
    float: left;
    width:250px;
    background:#ddd ;
    padding: 10px;
    border-radius: 5px;
margin-left: 10px;
    border: 1px solid #ddd;
}
.curhatan-bal{
    float: left;
    width:230px;
    background:#ddd ;
    padding: 10px;
    border-radius: 5px;

    border: 1px solid #ddd;
}
.curhatan:before{
     display: inline-block;
  width: 0;
  height: 0;
  vertical-align: top;
  border-right: 7px solid #ddd;
  border-top: 7px solid transparent;
  border-bottom: 7px solid transparent;
  margin: 0 250px 0 -247px;
  content: "";
}
.curhatan-bal:after{
     display: inline-block;
  width: 0;
  height: 0;
  vertical-align: top;
  border-left: 7px solid #ddd;
  border-top: 7px solid transparent;
  border-bottom: 7px solid transparent;
  margin: -30px 0px 0px 240px;
  content: "";
}
#curhat-form{
    background: #ededed;
    float: left;
    margin: 0px -10px -10px;
    padding: 12.5px;
    border-top: 1px solid #ccc;
}
.bal-img{
    float: left;
    margin-left: 0;
    margin-right: -17px;
}
#curhat-data .aktif:hover{
    background: #fff;
}
.cur-kom{
    border-bottom: 1px solid #ccc;
  
   float: left;
}
.cur-kom textarea{
    resize: vertical;
    width: 315px;
     margin-top: 10px;
}
.cur-kom ul li button{
    padding: 4px 8px;
}
.cur-kom ul li a{
    font-size:14px!important;
}
.tmb-brt{
padding: 10px;
width:350px;
max-height: 472px;
 overflow-y: visible;
 border-radius: 0;

}
.bot-foot{
    border-top: 1px solid #ddd;
}
#btn-foot{
    padding: 4px 10px;
    
}
#xp-admin{
   
    max-height: 500px;
    z-index: 10000;
    overflow-y: scroll;
}

</style>
<style>
#adm-area{
    border-bottom: 1px solid #ddd;
}
.page-title{
    
}
.page-title h3{
    margin-top: 5px;
}
.page-title h3 i{
    margin-top: 7px;
}
.chat-head{
    border-bottom: 1px solid #ccc;
    margin: -10px -10px 0;
    padding: 5px 10px;
    background: #ededed;
    float: left;
    width: 350px;
    height: 30px;
}
.chat-head li a{
    padding: 5px 7px!important;
}
.chat-head li a:hover{
    background: #fff!important;
}
#adm-close{
    margin: -55px -60px -20px -20px;
    float: right;
   
   
   padding: 20px;
}
#adm-block a{
    padding: 40px 0;
    background: #eee;
    border-radius: 0;
}
#adm-block a i{
    margin-right: 10px;
}
#adm-main{
    padding: 0 20px;
    width: 1060px;
}

/*home*/
#home-add{
    width: 340px;
    height: 300px;
    resize: vertical;
}
.chat-box{
    padding: 10px;
}
.chat-konten{
    padding: 10px 0;
    float: left;
   
}
.styled-select select {
   background: transparent;
   width: 268px;
   padding: 5px;
   font-size: 16px;
   line-height: 1;
   border: 0;
   border-radius: 0;
   height: 34px;
   -webkit-appearance: none;
   }
   .styled-select {
   width: 240px;
   height: 34px;
   overflow: hidden;
   background: url(new_arrow.png) no-repeat right #ddd;
   border: 1px solid #ccc;
   }
   
.styled-select select option:hover{
    background: #d0d!important;
}
</style>
