<?php
$xp     = getinstance();
$data   = $xp->database->rawSelect("SELECT a.url,a.judul FROM berita a WHERE status='published' ORDER BY readed DESC LIMIT 5");
?>

    <div class=" " id="profil" >
  
 
       <ul class="nav nav-profil">
       <li class="title">Profil</li>
         <li >Tanggal Lahir 8 mei 1995 </li>
        <li >lulusan 2013 </li>
 <li>Bekerja di Xpresi Design</li>
           <li class="no-border-bottom">Kuliah di Uiversitas Gadjah Mada </li>
           
    </ul>

    </div>