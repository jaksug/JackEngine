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
$ieu = getinstance();
?> 
<div class="row-fluid profil">
    
    <div class="span8 row-fluid">
    <div class="profil-background ">
    <div class="row-fluid" id="u-info">
    <div class="span2 ">
        <img class="img-rounded" src="<?php echo domain(). $aura;?>" />
    </div>
    <div class="span10 row-fluid">
        <div class="profil-about row-fluid span12">
             <h3 class="span8 profil-nama"><?php echo $nama;?></h3> 
             <p class="label">
                <?php 
                if( $tipe == 'jurusan') {
                    echo 'Program Keahlian';
                } else {
                    echo ucfirst($tipe);
                }
                ?>
             </p>
        </div>
         <div class="profil-konten">
        
 
    <ul class="nav nav-pills pull-right">
    <li><a href="#"><i class="icon-share-alt"></i> Post</a></li>
    <li><a href="#"><i class="icon-pencil"></i> Kontak</a></li>
     <li><a href="#tentang"><i class="icon-user"></i> Tentang</a></li>
    </ul>
    
    </div>
    </div>
    <div class=" span6" id="kontak"><b><i class="icon-info-sign icon-white"></i> Kontak <?php echo '</b><br />'. $tentang;?>
    </div>
    <div class="tentang span6" id="tentang"><b><i class="icon-info-sign icon-white"></i> Tentang <?php echo '   '.$nama.'</b><br />'. $tentang;?>
    </div>
    
    </div>
       
    </div>
   
    