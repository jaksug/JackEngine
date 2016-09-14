 <?php 
if(!defined('XP-ENGINE')) exit(NO_ACCESS);
/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
?> 
<div class="row-fluid">
    <div class="span8 ">
        <div class="row-fluid">
            <div class="page-title">
                Berita Terbaru<i class="icon-th-large pull-right icon-white"></i>
            </div>
   <?php
    foreach($data as $r){
        $isi= $r['isi'];
        $time = explode('-',$r['time']);
        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $isi, $image);
        $judul    = strip_tags(cut(20, $r['judul']),'<p>');
        if(isset($image['src'])){
                 $ekspresi = cut(400,strip_tags($r['isi'],'<p><a><li><u><i><ul>')); 
              echo '<div class="pos row-fluid">
                        <div class="span2 tanggal"><h1 class="tgl">'.$time[0].'</h1><h5 class="bln">'.$time[1].'-'.$time[2].'</h5></div>
                        <div class="span10">
                            <img src="'.$image['src'].'"/>
                
                            <a href="'.alamat('p',$r['url'],'').'"><h2 class="pos-judul">'.$judul.'</h2></a>
                             <div class="pos-info">
                                <a href="'.domain().'profil/'.$r['xp_nama'].'"><i class="icon-user icon-white"></i> '.ucfirst($r['nama']).'</a>
                                <i class="icon-comment icon-white"></i> 30 comment
                            </div>
                            '.$ekspresi.'
                        <div class="baca"><a href="'.alamat('p',$r['url'],'').'"><i>Selengkapnya &rarr;</i></a></div>
                        </div>
             </div>
        ';
        } else {
              $ekspresi = strip_tags(substr($r['isi'],0,400),'<p><a><li><u><i><ul>'); 
              $link     = '?p='.$r['id'];
              echo ' <div class="pos row-fluid">
                        <div class="span2 tanggal"><h1 class="tgl">'.$time[0].'</h1><h5 class="bln">'.$time[1].'-'.$time[2].'</h5></div>
                        <div class="span10">
              
                            <a href="'.alamat('p',$r['url'],'').'"><h2  class="pos-judul">'.$judul.'</h2></a>
                            <div class="pos-info">
                                <a href="'.domain().'profil/'.$r['xp_nama'].'"><i class="icon-user icon-white"></i> '.ucfirst($r['nama']).'</a>  
                                <i class="icon-comment icon-white"></i> 30 comment
                            </div>
                             '.$ekspresi.'
              <div class="baca"><a href="'.alamat('p',$r['url'],'').'"><i>Selengkapnya &rarr;</i></a></div>
                        </div>
             
            
             </div>
      ';
       }
      
      } 
      if( $berita > 0 ) {
        
      
      ?>
      
         <div class="pagination pagination-centered">
              <ul>
              <?php 
              if( $page == 1 ) {
                  
                    echo '<li class="disabled tetep"><a href="#">&laquo;</a></li>';
              } else {
                  $nomor = $page-1;
                    echo '<li><a href="'.domain().'berita/page/'.$nomor.'">&laquo;</a></li>';
              }
             
             for( $x = 1; $x <= $jumlah; $x++ ) {
                if( $x == $page ) {
                    echo '   <li class="active tetep"><a href="#">'.$x.'</a></li>';
                } else {
                    echo '  <li><a href="'.domain().'berita/page/'.$x.'">'.$x.'</a></li>';
                }
              
             }
             if( $page < $jumlah ) {
                    $nomor = $page+1;
                    echo '  <li><a href="'.domain().'berita/page/'.$nomor.'">&raquo;</a></li>';
             } else {
                    echo '  <li class="disabled tetep"><a href="#">&raquo;</a></li>';
             }
             ?>
              
             </ul>
            </div>
     <?php
     } else {
        echo ' Maaf belum ada berita ';
     }
     ?>
  
    </div>
    
    </div>
    <div class="span4">
      <div class="row-fluid">
    <?php
    $ieu = getinstance();
      $ieu->widget('auraku');
          
            ?>
    </div>
    </div>
</div>  


