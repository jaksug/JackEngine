<div class="komentar " id="daftar-komentar">
<div class="ijo" style="margin-bottom: 0;">Komentar</div>

<?php

$xp = getInstance();
foreach( $data as $d) {
    echo '
   
    <div class="komen-list  row-fluid">
    <div class="komen-item">
        <div class="span1"><img class="img-circle" src="'.domain().'media/profil/'.$d['aura'].'"/>
        </div>
        <div class="span11 komen">
            <a href="'.domain().'profil/'.$d['xp_nama'].'"><b>'.$d['nama'].'</b></a>
            <div>'.$d['comment'].'</div>
        </div></div>
    </div>';
}
?>
</div>