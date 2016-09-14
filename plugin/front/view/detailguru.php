<div class="row-fluid">
<div class="span12 widget"  id="guru">
<div class="row-fluid ">
    <div class="span2 ">

    <img class="w" src="img/listi_2.jpg"/><br />
    
    </div>
    <div class="span10 ">    <h3 style="padding: 0 10px;margin:0 0" class=" "><?php echo ucfirst($data[0]['nama']);?></h3>
        <div class="btn-group" id="guru-nav">
 <a href="?act=guru&id=<?php echo $_GET['id'];?>" class="btn"><i class="icon-share icon"></i> Aktivitas</a>
        <a href="?act=guru&id=<?php echo $_GET['id'];?>&profil" class="btn"><i class="icon icon-user"></i> Profil</a>
        <a class="btn"><i class="icon  icon-download-alt"></i> Download</a>
        <div class="segitiga" id="guru-nav-aktif"></div>
    </div>
       
    </div></div>
</div>
<div class="span12 widget" id="guru-head">
<?php if(isset( $_GET['profil'])) { ?>
    Nama    : <?php echo ucfirst($data[0]['nama']);?><br />
    Jabatan : <?php echo ucfirst($data[0]['tipe']);?><br />
<?php
} else {
    if( count($data2 < 1) ) {
        echo 'belum ada aktivitas';
    } else {
    foreach($data2 as $r){
        $isi= $r['isi'];
        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $isi, $image);
        $judul    = strip_tags(cut(20, $r['judul']),'<p>');
        
        if(isset($image['src'])){
              $ekspresi = strip_tags(substr($r['isi'],0,600),'<p><img><a><li><span><b><u><i><ul>'); 
        echo '<div class="span11 berita_list " >
                <div class="span12">  <h2>'.$judul.'</h2></div>
                <div class="span12 row-fluid">            
                    <div class="span4"><img src="'.$image[0]['src'].'"/>'.'</div>
                    <div class="span8">                         
                        <p>'.$ekspresi.' ...</p>
                    </div>
                </div>     
                <div class="span12">                     
                    <a class="btn" href="?p='.$r['id'].'">Selengkapnya &raquo;</a>
                </div>
            </div> ';
        }
        else{
              $ekspresi = strip_tags(substr($r['isi'],0,400),'<p><img><a><li><span><b><u><i><ul>'); 
              echo ' <div class="span11 berita_list" >
            <h2>'.$judul.'</h2>
            <p>'.$ekspresi.' ...</p>
            <p><a class="btn" href="?p='.$r['id'].'">Selengkapnya &raquo;</a></p>
        </div>
      ';
       }}
      }
      } ?>
</div></div>
